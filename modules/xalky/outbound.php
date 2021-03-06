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
include("functions.php");
include("config.php");

/*
* set time of last post
*
*/

$_SESSION['userLastPost'] = getTime();

/*
* check data before sending to DB
*
*/ 

function checkData($data)
{
	$key = 'index.php?xalkyLogout';

	$pos = strpos(strtolower($data), $key);

	if ($pos !== false) 
	{
		die($data." contains invalid characters");
	}
	else
	{
		return $data;
	}

}

function checkNumeric($data)
{
	if(!is_numeric($data))
	{
		die($data." value not numeric");		
	}
	else
	{
		return $data;
	} 
}

/*
* digitalCredits
*
*/

if(isset($_POST['digitalCreditID']))
{
	if(checkNumeric($_POST['digitalCreditID']) && $_POST['digitalCreditStatus'] == 'on')
	{
		$_SESSION['digitalCreditsInit'] = '1';

		if(!checkNumeric($_POST['digitalCreditID']))
		{
			 $_POST['digitalCreditID'] = '0';
		}

		$_SESSION['digitalCreditsAwardTo'] = $_POST['digitalCreditID'];
		$_SESSION['digitalCredits_start'] = date("U");
	}
	else
	{
		unset($_SESSION['digitalCreditsInit']);
		unset($_SESSION['digitalCreditsAwardTo']);
		unset($_SESSION['digitalCredits_start']);
	}
}

/*
* send data to database
*
*/

if($_POST)
{
	// default share
	$share = '0';

	// check data
	$_POST['umessage'] = !isset($_POST['umessage']) ? "" : checkData($_POST['umessage']);

	// check data & strip tags
	$_POST['toname'] = !isset($_POST['toname']) ? "" : checkData(strip_tags($_POST['toname']));
	$_POST['umid'] = !isset($_POST['umid']) ? "" : checkData(strip_tags($_POST['umid']));
	$_POST['xalkyNewRoomName'] = !isset($_POST['xalkyNewRoomName']) ? "" : checkData(strip_tags($_POST['xalkyNewRoomName']));
	
	// check data is numeric
	$_POST['userID'] = !isset($_POST['userID']) ? "0" : checkNumeric($_POST['userID']);
	$_POST['room'] = !isset($_POST['room']) ? "0" : checkNumeric($_POST['room']);
	$_POST['xalkyAddRoom'] = !isset($_POST['xalkyAddRoom']) ? "0" : checkNumeric($_POST['xalkyAddRoom']);
	$_POST['xalkyNewRoomOwner'] = !isset($_POST['xalkyNewRoomOwner']) ? "0" : checkNumeric($_POST['xalkyNewRoomOwner']);
	$_POST['status'] = !isset($_POST['status']) ? "0" : checkNumeric($_POST['status']);
	$_POST['status'] = !isset($_POST['status']) ? "0" : checkNumeric($_POST['status']);
	
	// send message
	if(isset($_POST['umessage']) && !empty($_POST['umessage']))
	{
		// get senders permissions
		list($admin,$mod,$speaker) = adminPermissions();
		
		// get toUser permissions
		list($toUseradmin,$toUsermod,$toUserspeaker) = toUserPermissions($_POST['toname']);		
	
		// if kick or ban, for mobile compatibility 
		$explodeMessage = explode('|', $_POST['umessage']);
		if((!$admin && !$mod) && ($explodeMessage[4] == '/kick' || $explodeMessage[4] == '/ban'))
		{		
			die("cannot /kick or /ban, incorrect permissions");
		}
		
		// if kick or ban
		if($_POST['umessage'] == 'KICK' || $_POST['umessage'] == 'BAN')
		{
			// if user is admin or mod
			if($admin || $mod)
			{
				// prevent admins from kicking each other
				if($toUseradmin)
				{
					return;				
				}
				else
				{
					// ban/kick user
					banKickUser($_POST['umessage'], $_POST['toname']);
				}				
			}

			// if user is room owner
			if($_POST['umessage'] == 'KICK' && getRoomOwner())
			{
				// prevent admins from kicking each other
				if($toUseradmin)
				{
					return;				
				}
				else
				{
					// ban/kick user
					banKickUser($_POST['umessage'], $_POST['toname']);
				}	
			}
		}

		// if silence
		if($_POST['umessage'] == 'SILENCE' && (!$admin && !$mod && !getRoomOwner()))
		{
			die("cannot silence, incorrect permissions");
		} 
		
		// prevent admins/mods from being silenced
		if(!$admin && ($_POST['umessage'] == 'SILENCE' && ($toUseradmin || $toUsermod)))
		{
            die("cannot silence admins/mods, incorrect permissions");
		}	
		
		// prevent admins/mods from being kicked
		if(!$admin && ($_POST['umessage'] == 'KICK' && ($toUseradmin || $toUsermod)))
		{
            die("cannot kick admins/mods, incorrect permissions");
		}		
		
		// if public webcam view, add stream id
		if($_POST['umessage'] == 'WEBCAM_ACCEPT')
		{
			$_POST['umessage'] = 'WEBCAM_ACCEPT||'.$_SESSION['xalkyStreamID'];
		}
		
		// check for delete global message
		$DELETEMESSAGE = strpos($_POST['umessage'], 'DELETEMESSAGE_');

		if ($DELETEMESSAGE === false)
		{
			// do nothing, DELETEMESSAGE_ not found
		}
		else
		{
			// if user is not admin/mod
			if(!$admin && !$mod)
			{
				// do not send the message
				die("user not authorized to delete global messages");
			}
		}		

		// send message

		$chatMessTableName = "xalky_message";

		if($xalkyConfig['moderatedXalkyPlugin'] && moderatedXalky())
		{
			$chatMessTableName = "xalky_moderated";

			if($admin || $mod || $speaker)
			{
				$chatMessTableName = "xalky_message";
			}	
		}

		if(!file_exists("../sounds/".$_POST['usfx']))
		{
			$_POST['usfx'] = "beep_high.mp3";
		}

		// add message to db
		// message = userAvatar+"|"+textColour+"|"+textSize+"|"+textFamily+"|"+message+"|"+iRC+"|"+addLineBreaks;
		// runs some pre checks for message
		// if any fail, DONT submit data, data is invalid

		$checkMessage = explode("|",$_POST['umessage']);

		if($checkMessage[4])
		{
			// prevent any malicious doc path injections for avatars
			$checkMessage[0] = str_replace("../","",$checkMessage[0]);

			// check file exists
			if($checkMessage[0]!='0' && $checkMessage[0]!='1' && !file_exists(dirname(dirname(__FILE__))."/avatars/".$checkMessage[0]))
			{
				die("avatar is invalid");
			}

			// is text colour valid?
			if(!ctype_alnum(str_replace("#","",$checkMessage[1])))
			{
				die("text colour is invalid");
			}

			// is text size valid?
			if(!is_numeric(str_replace("px","",$checkMessage[2])))
			{
				die("text size is invalid");
			}

			// is text family valid?
			// check for alphanumeric value
			if(!ctype_alnum(str_replace(" ","",$checkMessage[3])))
			{
				die("text family is invalid");
			}

			// is IRC numeric?
			if($checkMessage[5] && !is_numeric($checkMessage[5]))
			{
				die("IRC value is invalid");
			}

			// is linebreaks numeric?
			if($checkMessage[6] && !is_numeric($checkMessage[6]))
			{
				die("linebreak value is invalid");
			}

			// is message shared? (eg. broadcast)
			if(
				stristr($checkMessage[4],"BROADCAST") && $admin || 
				stristr($checkMessage[4],"BROADCAST") && $mod 
			)
			{ $share = '1'; }

			if(
				stristr($checkMessage[4],"BROADCAST") && !$admin && 
				stristr($checkMessage[4],"BROADCAST") && !$mod 
			)
			{ die("incorrect permissions"); }
		}

		// if intelli-bot is enabled
		if($xalkyConfig['sentryBot'] && !$_POST['uname'] && $_SESSION['username'])
		{
			$senderName = $xalkyConfig['sentryBotName'];			
		}
		else
		{
			$senderName = $_SESSION['username'];
		}

		// if user is not silenced
		if(!$_SESSION['silenceStart'] || $_SESSION['silenceStart'] < ( date("U") - $xalkyConfig['silent']*60 ) )	
		{
			unset($_SESSION['silenceStart']);

         	if(!$senderName || empty($senderName))
         	{
            	die("invalid username");
         	}
		
			// add message
			try {
				$dbh = db_connect();
				$params = array(
				'userID' => makeSafe($_POST['userID']),
				'mid' => makeSafe($_POST['umid']),
				'username' => makeSafe($senderName), 
				'tousername' => makeSafe($_POST['toname']), 
				'message' => makeSafe($_POST['umessage']), 
				'sfx' => makeSafe($_POST['usfx']),
				'room' => makeSafe($_POST['uroom']),
				'share' => $share,
				'messtime' => getTime()
				);
				$query = "INSERT INTO ".$chatMessTableName."
										(
											userID,
											mid,
											username, 
											tousername, 
											message, 
											sfx,
											room,
											share,
											messtime
										) 
										VALUES 
										(
											:userID,
											:mid,
											:username, 
											:tousername, 
											:message, 
											:sfx,
											:room,
											:share,
											:messtime
										)
										";
				$action = $dbh->prepare($query);
				$action->execute($params);
				$dbh = null;
			}
			catch(PDOException $e) 
			{
				$error  = "Action: Send Message to DB\n";
				$error .= "File: ".basename(__FILE__)."\n";	
				$error .= 'PDOException: '.$e->getCode(). '-'. $e->getMessage()."\n\n";
				
				debugError($error);
			}			

			// update users active time
			try {
				$dbh = db_connect();
				$params = array(
				'lastActive' => getTime(),
				'username' => makeSafe($_SESSION['username']),
				);
				$query = "UPDATE xalky_users 
						  SET lastActive = :lastActive
						  WHERE username = :username
						  ";							
				$action = $dbh->prepare($query);
				$action->execute($params);	
				$dbh = null;
			}
			catch(PDOException $e) 
			{
				$error  = "Action: Update Users Active Time\n";
				$error .= "File: ".basename(__FILE__)."\n";	
				$error .= 'PDOException: '.$e->getCode(). '-'. $e->getMessage()."\n\n";

				debugError($error);
			}			
		}
	}

	// update avatar
	if(isset($_POST['uavatar']))
	{
		if(file_exists("../avatars/".$_POST['uavatar']))
		{
			try {
				$dbh = db_connect();
				$params = array(
				'avatar' => makeSafe($_POST['uavatar']),
				'username' => makeSafe($_SESSION['username'])
				);
				$query = "UPDATE xalky_users
						  SET avatar = :avatar
						  WHERE username = :username
						  ";							
				$action = $dbh->prepare($query);
				$action->execute($params);	
				$dbh = null;
			}
			catch(PDOException $e) 
			{
				$error  = "Action: Post Avatar\n";
				$error .= "File: ".basename(__FILE__)."\n";	
				$error .= 'PDOException: '.$e->getCode(). '-'. $e->getMessage()."\n\n";

				debugError($error);
			}			
		}
	}

	// add user room
	if(isset($_POST['xalkyAddRoom']))
	{
		// password encryption
		if(!empty($_POST['xalkyNewRoomPass']))
		{
			$_POST['xalkyNewRoomPass'] = md5($_POST['xalkyNewRoomPass']);
		}

		// check room exists
		try {
			$dbh = db_connect();
			$params = array(
			'xalkyNewRoomName' => makeSafe($_POST['xalkyNewRoomName'])
			);
			$query = "SELECT roomname   
					  FROM xalky_rooms  
					  WHERE roomname = :xalkyNewRoomName
					  LIMIT 1
					  ";							
			$action = $dbh->prepare($query);
			$action->execute($params);
			$count = $action->rowCount();
			
			$dbh = null;
		}
		catch(PDOException $e) 
		{
			$error  = "Action: Check Room Exists\n";
			$error .= "File: ".basename(__FILE__)."\n";	
			$error .= 'PDOException: '.$e->getCode(). '-'. $e->getMessage()."\n\n";

			debugError($error);
		}			

		if($count < 1)
		{
			// if room doesnt exist
			if($_POST['xalkyNewRoomName'])
			{
				if(validChars($_POST['xalkyNewRoomName']))
				{
					die("invalid room name");
				}

				// create room
				try {
					$dbh = db_connect();
					$params = array(
					'id' => getTime(),
					'roomname' => makeSafe($_POST['xalkyNewRoomName']),
					'roomowner' => makeSafe($_POST['xalkyNewRoomOwner']), 
					'roompassword' => makeSafe($_POST['xalkyNewRoomPass']), 
					'roomusers' => '0', 
					'roomcreated' => getTime()
					);
					$query = "INSERT INTO xalky_rooms
										(
											id,
											roomname,
											roomowner, 
											roompassword, 
											roomusers, 
											roomcreated
										) 	
										VALUES 
										(
											:id,
											:roomname,
											:roomowner, 
											:roompassword, 
											:roomusers, 
											:roomcreated
										)
										";							
					$action = $dbh->prepare($query);
					$action->execute($params);	
					$dbh = null;
				}
				catch(PDOException $e) 
				{
					$error  = "Action: Add New Room\n";
					$error .= "File: ".basename(__FILE__)."\n";	
					$error .= 'PDOException: '.$e->getCode(). '-'. $e->getMessage()."\n\n";

					debugError($error);
				}				

			}
	
		}
		else
		{
			try {
				$dbh = db_connect();
				$params = array(
				'roomcreated' => getTime(),
				'xalkyNewRoomName' => makeSafe($_POST['xalkyNewRoomName'])
				);
				$query = "UPDATE xalky_rooms 
						  SET roomcreated = :roomcreated 
						  WHERE roomname = :xalkyNewRoomName
						  ";							
				$action = $dbh->prepare($query);
				$action->execute($params);	
				$dbh = null;
			}
			catch(PDOException $e) 
			{
				$error  = "Action: Update Room\n";
				$error .= "File: ".basename(__FILE__)."\n";	
				$error .= 'PDOException: '.$e->getCode(). '-'. $e->getMessage()."\n\n";

				debugError($error);
			}			
		}
	}

	// update webcam status
	if(isset($_POST['xalkyWebcamIs']))
	{
		$result = '0';

		if($_POST['xalkyWebcamIs'] == 'on')
		{
			$webcamStatus = '1';
			$result = '1';
		}

		if($_POST['xalkyWebcamIs'] == 'off')
		{
			$webcamStatus = '0';
			$result = '1';
		}

		if($result == '1')
		{
			try {
				$dbh = db_connect();
				$params = array(
				'webcamStatus' => makeSafe($webcamStatus),
				'username' => makeSafe($_SESSION['username'])
				);
				$query = "UPDATE xalky_users 
						  SET webcam = :webcamStatus
						  WHERE username = :username
						  ";							
				$action = $dbh->prepare($query);
				$action->execute($params);	
				$dbh = null;
			}
			catch(PDOException $e) 
			{
				$error  = "Action: Update Webcam Status\n";
				$error .= "File: ".basename(__FILE__)."\n";	
				$error .= 'PDOException: '.$e->getCode(). '-'. $e->getMessage()."\n\n";

				debugError($error);
			}			
		}

	}

	// watching cam
	if(isset($_POST['watching']))
	{
		try {
			$dbh = db_connect();
			$params = array(
			'watching' => makeSafe($_POST['watching']),
			'username' => makeSafe($_SESSION['username'])
			);
			$query = "UPDATE xalky_users 
					  SET watching = :watching
					  WHERE username = :username
					  ";							
			$action = $dbh->prepare($query);
			$action->execute($params);	
			$dbh = null;
		}
		catch(PDOException $e) 
		{
			$error  = "Action: Watching Cam\n";
			$error .= "File: ".basename(__FILE__)."\n";	
			$error .= 'PDOException: '.$e->getCode(). '-'. $e->getMessage()."\n\n";

			debugError($error);
		}		
	}

	// update user status
	if(isset($_POST['status']) && ctype_alnum($_POST['status']))
	{
		try {
			$dbh = db_connect();
			$params = array(
			'status' => makeSafe($_POST['status']),
			'username' => makeSafe($_SESSION['username'])
			);
			$query = "UPDATE xalky_users 
					  SET status = :status
					  WHERE username = :username
					  ";							
			$action = $dbh->prepare($query);
			$action->execute($params);	
			$dbh = null;
		}
		catch(PDOException $e) 
		{
			$error  = "Action: Update User Status\n";
			$error .= "File: ".basename(__FILE__)."\n";	
			$error .= 'PDOException: '.$e->getCode(). '-'. $e->getMessage()."\n\n";

			debugError($error);
		}		
	}

	// update blocked list
	if(isset($_POST['xalkyBlockList']))
	{
		try {
			$dbh = db_connect();
			$params = array(
			'blocked' => makeSafe($_POST['xalkyBlockList']),
			'username' => makeSafe($_SESSION['username'])
			);
			$query = "UPDATE xalky_users 
					  SET blocked = :blocked
					  WHERE username = :username
					  ";							
			$action = $dbh->prepare($query);
			$action->execute($params);	
			$dbh = null;
		}
		catch(PDOException $e) 
		{
			$error  = "Action: Update Blocked List\n";
			$error .= "File: ".basename(__FILE__)."\n";	
			$error .= 'PDOException: '.$e->getCode(). '-'. $e->getMessage()."\n\n";

			debugError($error);
		}			
	}
}

?>