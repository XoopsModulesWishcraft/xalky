<?php
/**
 * Xalky - Talks like a cockatoo - XOOPS Chat Rooms
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright   Chronolabs Cooperative http://sourceforge.net/projects/chronolabs/
 * @license     GNU GPL 3 (http://labs.coop/briefs/legal/general-public-licence/13,3.html)
 * @author      Simon Antony Roberts <wishcraft@users.sourceforge.net>
 * @see			http://sourceforge.net/projects/xoops/
 * @see			http://sourceforge.net/projects/chronolabs/
 * @see			http://sourceforge.net/projects/chronolabsapis/
 * @see			http://labs.coop
 * @version     1.0.5
 * @since		1.0.1
 */

/*
* include files
*
*/

include("ini.php");
include("session.php");
include("config.php");
include("functions.php");

/*
* Send headers to prevent IE cache
*
*/

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" ); 
header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" ); 
header("Cache-Control: no-cache, must-revalidate" ); 
header("Pragma: no-cache" );
header("Content-Type: text/xml; charset=utf-8");

/*
* check users permissions
*
*/

list($admin,$mod,$speaker) = adminPermissions();

/*
* update user
*
*/

updateUser($_GET['roomID']);

/*
* virtual credits
*
*/

virtualCredits();

/*
* digitalCredits
*
*/

if($_SESSION['digitalCreditsInit'] == '1')
{
	if($_SESSION['digitalCreditsAwardTo'] != $_SESSION['xalkyProfileID'])
	{
		digitalCredits($_SESSION['digitalCreditsAwardTo']);
	}
}

/*
* start XML file
*
*/

$xml = '<?xml version="1.0" ?><root>';

/*
* moderated chat plugin
* hides messages from users
*/

if($xalkyConfig['moderatedXalkyPlugin'])
{
	if(!getAdmin($_SESSION['username']) && !getModerator($_SESSION['username']) && !getSpeaker($_SESSION['username']))
	{
		$_GET['history'] = 1;
		$showApproved = '';
	}
}

/*
* get messages from database
*
*/

$userLogout = '';

try {
	$dbh = db_connect();
	
	if($_GET['history'] == 0)
	{
		$params = array(
		'room' => makeSafe($_GET['roomID']),
		'last' => makeSafe($_GET['last']),
		'username' => makeSafe($_SESSION['username'])		
		);
		$query = "SELECT id, userID, mid, username, tousername, message, sfx, room, messtime 
				  FROM xalky_message
				  WHERE room = :room AND id > :last AND tousername = '' AND username != :username 
				  OR room = :room AND id > :last AND tousername = :username
				  OR id > :last AND tousername = :username
				  OR room = :room AND id > :last AND share = '1' AND tousername = :username
				  OR room = :room AND id > :last AND share = '1' AND username = :username
				  ";
	}
	else
	{
		$totalMessages = $xalkyConfig['dispLastMess'] + 1;
	
		$params = array(
		'room' => makeSafe($_GET['roomID']),
		'last' => makeSafe($_GET['last']),
		'username' => makeSafe($_SESSION['username'])	
		);
		$query = "SELECT id, userID, mid, username, tousername, message, sfx, room, messtime 
				  FROM xalky_message
				  WHERE room = :room AND id > :last AND tousername = ''
				  OR room = :room AND id > :last AND tousername = :username
				  OR id > :last AND tousername = :username
				  OR id > :last AND share = '1' AND tousername = :username
				  OR id > :last AND share = '1' AND username = :username
				  LIMIT ".$totalMessages."
				  ";
	}

	$action = $dbh->prepare($query);
	$action->execute($params);
				
	foreach ($action as $i) 
	{
		if(!$i['username'])
		{
			die("error: username value null");
		}

		$xml .= '<usermessage>';
		
		$xml .= $i['id']."}{";
		$xml .= $i['userID']."}{";
		$xml .= $i['mid']."}{";
		$xml .= stripslashes($i['username'])."}{";	
		
		// if tousername is null
		if(!$i['tousername'])
		{
			$i['tousername']='_';
		}	
		
		$xml .= stripslashes($i['tousername'])."}{";
		$xml .= stripslashes(urldecode($i['message']))."}{";	
		$xml .= $i['room']."}{";
		$xml .= $i['sfx']."}{";
		$xml .= $i['messtime']."";
		
		$xml .= '</usermessage>';	

		// check if user has been silenced
		// if so, set silence start time
		if($i['message'] == 'SILENCE' && $i['tousername'] == $_SESSION['username'])
		{
			if(!$_SESSION['silenceStart'] || $_SESSION['silenceStart'] < date("U")-($xalkyConfig['silent']*60))
			{
				$_SESSION['silenceStart'] = date("U");
			}
		}
	}

	$dbh = null;
}
catch(PDOException $e) 
{
	$error  = "Action: Get Messages\n";
	$error .= "File: ".basename(__FILE__)."\n";	
	$error .= 'PDOException: '.$e->getCode(). '-'. $e->getMessage()."\n\n";

	debugError($error);
}

/*
* get users from database
* 
*/

// check users within last 5 mins
$onlineTime = getTime()-300;

// set offline time
$offlineTime = getTime()-$xalkyConfig['activeTimeout'];

// get users
try {
	$dbh = db_connect();
	
	if($_REQUEST['s'])
	{ // if single room
		$params = array(
		'active' => $onlineTime,
		'room' => makeSafe($_GET['roomID'])		
		);
		$query = "SELECT id, username, userid, prevroom, room, avatar, webcam, active, online, status, watching, digitalCredits, guest, lastActive, userIP, admin, moderator, speaker 
				  FROM xalky_users 
				  WHERE username != '' 
				  AND active > :active
				  AND room = :room
				  GROUP BY room, username ASC
				";		
	}
	else
	{
		$params = array(
		'active' => $onlineTime
		);
		$query = "SELECT id, username, userid, prevroom, room, avatar, webcam, active, online, status, watching, digitalCredits, guest, lastActive, userIP, admin, moderator, speaker 
				  FROM xalky_users 
				  WHERE username != '' 
				  AND active > :active
				  GROUP BY room, username ASC
				";			
	}
						
	$action = $dbh->prepare($query);
	$action->execute($params);
				
	foreach ($action as $i) 
	{
		$showAllUsers = 1;

		if(invisibleAdmins($i['username']))
		{
			$showAllUsers = 0;
		}

		if($showAllUsers == 1)
		{
			$i['userid'] = empty($i['userid']) ? "0" : $i['userid'];
			$i['room'] = empty($i['room']) ? "0" : $i['room'];
			
			$xml .= '<userlist>';		
			$xml .= $i['id']."||";
			$xml .= stripslashes($i['userid'])."||";
			$xml .= stripslashes($i['username'])."||";
			$xml .= stripslashes($i['avatar'])."||";
			$xml .= $i['webcam']."||";
			$xml .= $i['room']."||";
			$xml .= $i['prevroom']."||";
			$xml .= $i['admin']."||";
			$xml .= $i['moderator']."||";
			$xml .= $i['speaker']."||";		
			
			// set user to online
			$onlineStatus = '1';

			// if user hasnt been active within $offlineTime
			if($i['active'] < $offlineTime)
			{
				// set user to offline
				$onlineStatus = '0';

				if($i['online'] == '1')
				{
					// update user status
					xalkyLogoutUser($i['username'],$i['room']);
				}
			}

			$xml .= $onlineStatus."||";
			$xml .= $i['status']."||";
			
			if(!$i['watching'])
			{
				$i['watching'] ='0';
			}
			
			$i['watching'] = str_replace("|", ",", $i['watching']);				
			
			$xml .= $i['watching']."||";		
			$xml .= $xalkyConfig['digitalCreditsOn']."||";	
			$xml .= $i['digitalCredits']."||";	
			$xml .= $_SESSION['groupCams']."||";	
			$xml .= $_SESSION['groupWatch']."||";	
			$xml .= $_SESSION['groupChat']."||";	
			$xml .= $_SESSION['groupPrivateChat']."||";		
			$xml .= $_SESSION['groupRooms']."||";	
			$xml .= $_SESSION['groupVideo']."||";	
			$xml .= $i['active']."||";	
			$xml .= $i['lastActive']."||";	
			
			// if admin or mod, show users IP
			$ip = "0";
			
			if($admin || $mod)
			{
				$ip = $i['userIP'];
			}	
			
			$xml .= $ip."||";
			$xml .= '</userlist>';		
		}
	}

	$dbh = null;
}
catch(PDOException $e) 
{
	$error  = "Action: Get Users\n";
	$error .= "File: ".basename(__FILE__)."\n";	
	$error .= 'PDOException: '.$e->getCode(). '-'. $e->getMessage()."\n\n";

	debugError($error);
}

/*
* get rooms from database
* 
*/

try {
	$dbh = db_connect();
	
	if($_REQUEST['s'])
	{ // if single room
		$params = array(
		'roomID' => makeSafe($_GET['roomID'])
		);
		$query = "SELECT id, roomid, roomname, roomowner, roomusers, roomcreated     
				  FROM xalky_rooms 
				  WHERE id = :roomID 
				  ORDER BY ABS(id) ASC
				  ";	
	}
	else
	{ // if multi room
		$params = array(
		'userRoom' => 'User Room' 
		);
		$query = "SELECT id, roomid, roomname, roomowner, roomusers, roomcreated     
				  FROM xalky_rooms 
				  WHERE roomname != :userRoom
				  ORDER BY ABS(id) ASC
				  ";		
	}

	$action = $dbh->prepare($query);
	$action->execute($params);
				
	foreach ($action as $i) 
	{
		$xml .= '<userrooms>';
		
		$xml .= $i['id']."||";
		$xml .= $i['id']."||";
		$xml .= stripslashes($i['roomname'])."||";
		$xml .= $i['roomowner']."||";
		$xml .= $i['roomusers']."||";
		
		$deleteRoom = '0';

		if($i['roomusers'] == '0' && getTime()-60 >= $i['roomcreated'] && $i['roomowner'] != '1')
		{
			// was  - if($_REQUEST['s'] && !$xalkyConfig['one2onePlugin'])
			// did not delete users created rooms, so we updated it too,

			if(!$xalkyConfig['one2onePlugin'])
			{
				deleteUserRoom($i['id']);
				$deleteRoom = '1';
			}
		}

		$xml .= $deleteRoom."||";
		$xml .= moderatedXalky()."||";
		
		$xml .= '</userrooms>';

	}
	
	$dbh = null;
}
catch(PDOException $e) 
{
	$error  = "Action: Get Rooms\n";
	$error .= "File: ".basename(__FILE__)."\n";	
	$error .= 'PDOException: '.$e->getCode(). '-'. $e->getMessage()."\n\n";

	debugError($error);
}		

/*
* end XML file
*
*/

$xml .= '</root>';

/*
* show XML output
*
*/

echo $xml;

/*
* write/close session
* http://php.net/manual/en/function.session-write-close.php
*/

session_write_close();

?>