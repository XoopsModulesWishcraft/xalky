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
 * @see			http://sourceforge.net/projects/chronolabsapi/
 * @see			http://labs.coop
 * @version     1.0.5
 * @since		1.0.1
 */


global $xalkyConfig, $xalkyModule, $loginError;

/*
* include files
*
*/
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'mainfile.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . "include" . DIRECTORY_SEPARATOR. "ini.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "include" . DIRECTORY_SEPARATOR. "session.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "include" . DIRECTORY_SEPARATOR. "config.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "include" . DIRECTORY_SEPARATOR. "functions.php";

/*
 * include language file
 *
 */
xoops_loadLanguage('main', basename(__DIR__));

/*
 * check software
 *
 */
xalkyValidSoftware();

/*
 * reset login errors
 *
 */

$loginError = '';
if(xalkyGetUsersOnline('1') >= $xalkyConfig['maxUsers'] && !isset($_GET['xalkyLogout']))
{
	$loginError = _MN_XALKY_CONST200;
	$GLOBALS['xalkyContent'] = __DIR__ . DIRECTORY_SEPARATOR . "login.php";
	return true;
}

/*
 * cms integration
 *
 */
if($xalkyConfig['CMS'] && !isset($_GET['xalkyLogout']))
{
	// cookie login
	if($_REQUEST['uname'])
	{

		if(isset($_COOKIE['login']))
		{
			// assign user details
			$_REQUEST['userName'] = $_REQUEST['uname'];
			$_SESSION['username'] = $_REQUEST['uname'];
			$_SESSION['userid'] = $_REQUEST['userID'];

			// unset login
			setcookie($_COOKIE['login'],'',time()-3600);
		}
		else
		{
			die("Login error, please try again.");
		}
	}

	// session login
	if(!$_SESSION['username'])
	{
		// include files
		include("cms.php");

		// session login
		if(XALKY_LOGIN && $uname)
		{
			// assign user details
			$_SESSION['username'] = $uname;
			$_SESSION['userid'] = $userID;
		}

	}

	// add user
	addUser('');

	// assign default room login
	if(!$_REQUEST['roomID'])
	{
		$_REQUEST['roomID'] = '1';

		// version 6 used room names, in 7 and above we use room id instead
		if(isset($_REQUEST['room']) && is_numeric($_REQUEST['room']))
		{
			$_REQUEST['roomID'] = $_REQUEST['room'];
		}
	}
	
	// if js login, redirect to index.php
	if(isset($_REQUEST['uname']) && isset($_COOKIE['login']))
	{		
		// unset login
		setcookie($_COOKIE['login'],'',time()-3600);
		header('Location: index.php');
	}
}

/*
 * check events
 *
 */
$loginError = xalkyCheckEvent();
if($loginError)
{
	$GLOBALS['xalkyContent'] = __DIR__ . DIRECTORY_SEPARATOR . "login.php";
	return true;
}

/*
 * get transcripts
 *
 */
if(isset($_GET['transcripts']) && isset($_GET['roomID']))
{
	$GLOBALS['xalkyContent'] = __DIR__ . DIRECTORY_SEPARATOR . "transcripts.php";
	return true;
}

/*
 * reset digitalCredit sessions
 *
 */
if($_SESSION['digitalCreditsInit'])
{
	unset($_SESSION['digitalCreditsInit']);
	unset($_SESSION['digitalCreditsAwardTo']);
	unset($_SESSION['digitalCredits_start']);
}

/*
 * xalkyLogout user
 *
 */
if(isset($_REQUEST['xalkyLogout']) && isset($_SESSION['userid']))
{
	xalkyLogoutUser($_SESSION['userid'],$_SESSION['roomid']);

	if($_REQUEST['xalkyLogout'] == 'kick')
	{
		xalkyBanKickUser('KICK', $_SESSION['userid']);
	}

	unset($_SESSION['username']);
	unset($_SESSION['userid']);
	unset($_SESSION['roomid']);
	unset($_SESSION['guest']);

	$loginError = _MN_XALKY_CONST5;

	if($xalkyConfig['CMS'])
	{
		die($loginError);
	}
	else
	{
		$GLOBALS['xalkyContent'] = __DIR__ . DIRECTORY_SEPARATOR . "login.php";
		return true;
	}
}

/*
 * check room is set
 *
 */
if(!$_REQUEST['roomID'][0])
{
	$GLOBALS['xalkyContent'] = __DIR__ . DIRECTORY_SEPARATOR . "login.php";
	return true;
}

/*
 * check username is valid
 *
 */
if(!isset($_SESSION['username']) && empty($_REQUEST['userName']))
{
	$loginError = _MN_XALKY_CONST1;
	$GLOBALS['xalkyContent'] = __DIR__ . DIRECTORY_SEPARATOR . "login.php";
	return true;
}

if(empty($_REQUEST['userName']) && isset($_REQUEST['login']))
{
	$loginError = _MN_XALKY_CONST1;
	$GLOBALS['xalkyContent'] = __DIR__ . DIRECTORY_SEPARATOR . "login.php";
	return true;
}

if(isset($_REQUEST['userName']))
{
	$loginError = xalkyValidChars($_REQUEST['userName']);
	if($loginError)
	{
		$GLOBALS['xalkyContent'] = __DIR__ . DIRECTORY_SEPARATOR . "login.php";
		return true;
	}

}

if($_POST['userName'])
{
	unset($_SESSION['guest']);
}

/*
 * if user is not guest and password is empty
 * 
 */
if(!$_POST['isGuest'] && isset($_POST['userPass']) && empty($_POST['userPass']))
{
	$loginError = _MN_XALKY_CONST6;
	$GLOBALS['xalkyContent'] = __DIR__ . DIRECTORY_SEPARATOR . "login.php";
	return true;
}

/*
 * delete any empty rooms created by users 
 */
xalky_delete_expired_rooms();

/*
 * count total rooms
 *
 */
$totalRooms = xalkyTotalRooms();
if($xalkyConfig['singleRoom'] || $_REQUEST['singleRoom'])
{
	$totalRooms = '1';
}

/*
 * get previous room id
 * 
 */

$prevRoom = xalkyPrevRoom();

if(empty($prevRoom))
{
	$prevRoom = '1';
}

/*
 * create user
 *
 */
if(isset($_SESSION['username']))
{
		$_REQUEST['userName'] = $_SESSION['username'];
}
if(isset($_SESSION['userid']))
{
		$_REQUEST['userId'] = $_SESSION['userid'];
}
if(empty($_REQUEST['userId']))
{
	$_REQUEST['userId'] = '-1';
}

list($username,$userid,$loginError) = xalkyCreateUser(
                     $_REQUEST['userName'],
                     $_REQUEST['userId'],
                     $_REQUEST['userPass'],
                     $_REQUEST['genderID'],
                     isset($_REQUEST['login']),
                     isset($_POST['isGuest'])
                  );

if(isset($_REQUEST['login']) && $loginError)
{
	$GLOBALS['xalkyContent'] = __DIR__ . DIRECTORY_SEPARATOR . "login.php";
	return true;
}

/*
 * get create room details
 * 
 */
$roomPass = '';
if(isset($_REQUEST['roomPass']))
{
		$roomPass = $_REQUEST['roomPass'];		
}
list($roomID,$roomOwnerID) = xalkyChatRoomID($_REQUEST['roomID'],$roomPass);
list($roomBg,$roomDesc) = xalkyChatRoomDesc($roomID);

/*
 * get user details
 *
 */
$guestUser = '0';
if($_POST['isGuest'])
{
	xalkyUpdateGuestAvatar($_REQUEST['genderID']);
}

list($id,$avatar,$loginError,$blockedList,$guestUser) = xalkyGetUser($prevRoom,$roomID);

/*
 * assign user group
 *
 */
xalkyGetUserGroup($_SESSION['userGroup']);

/*
 * final check for user login error
 *
 */
if($loginError)
{
	// if single room mode, ignore user name not found error
	// this is only an option for multi user rooms and cms
	if($xalkyConfig['singleRoom'] && $loginError == _MN_XALKY_CONST17)
	{
		$loginError = '';
	}

	$GLOBALS['xalkyContent'] = __DIR__ . DIRECTORY_SEPARATOR . "login.php";
	return true;
}

/*
 * assign room owner
 *
 */
$roomOwner = '0';
if($id == $roomOwnerID)
{
	$roomOwner = '1';
}

/*
 * silence duration
 *
 */
$silent = $xalkyConfig['silent'];

/*
 * get room last message id
 *
 */
$lastMessageID = xalkyGetLastMessageID($roomID);

/*
 * alls ok, include main template
 *
 */
$GLOBALS['xalkyContent'] = __DIR__ . DIRECTORY_SEPARATOR . "main.php";
return true;

?>