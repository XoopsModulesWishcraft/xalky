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

/*
* include files
*
*/

include("include/ini.php");
include("include/session.php");
include("include/config.php");
include("include/functions.php");

/*
* include language file
*
*/

include("lang/".getLang($_POST['langID']));

/*
* check software
*
*/

validSoftware();

/*
* reset login errors
*
*/

$loginError = '';

if(getUsersOnline('1') >= $xalkyConfig['maxUsers'] && !isset($_GET['xalkyLogout']))
{
	$loginError = _MN_XALKY_CONST200;

	include("templates/".$xalkyConfig['template']."/login.php");
	die;
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

$loginError = checkEvent();

if($loginError)
{
	include("templates/".$xalkyConfig['template']."/login.php");
	die;
}

/*
* get transcripts
*
*/

if(isset($_GET['transcripts']) && isset($_GET['roomID']))
{
	include("templates/".$xalkyConfig['template']."/transcripts.php");
	die;
}

/*
* confirm email register
*
*/

if(isset($_GET['nReg']) && isset($_GET['email']))
{
	$loginError = confirmReg($_GET['nReg'],$_GET['email']);

	include("templates/".$xalkyConfig['template']."/login.php");
	die;
}

/*
* register user
*
*/

if(isset($_POST['reg']))
{
	if(empty($_POST['rUsername']))
	{
		$loginError .= _MN_XALKY_CONST1."<br>";
	}
	else
	{
		$loginError .= validChars($_POST['rUsername']);
	}

	if(empty($_POST['rPassword']))
	{
		$loginError .= _MN_XALKY_CONST2."<br>";
	}

	if(empty($_POST['rEmail']))
	{
		$loginError .= _MN_XALKY_CONST3."<br>";
	}
	else
	{
		$loginError .= validEmail($_POST['rEmail']);
	}

	if(empty($_POST['terms']))
	{
		$loginError .= _MN_XALKY_CONST4."<br>";
	}

	if($loginError)
	{
		include("templates/".$xalkyConfig['template']."/login.php");
		die;	
	}
	else
	{
		$loginError = registerUser($_POST['rUsername'],$_POST['rPassword'],$_POST['rEmail']);

		include("templates/".$xalkyConfig['template']."/login.php");
		die;
	}	

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

if(isset($_REQUEST['xalkyLogout']) && isset($_SESSION['username']))
{
	xalkyLogoutUser($_SESSION['username'],$_SESSION['room']);

	if($_REQUEST['xalkyLogout'] == 'kick')
	{
		banKickUser('KICK', $_SESSION['username']);
	}

	unset($_SESSION['username']);
	unset($_SESSION['userid']);
	unset($_SESSION['room']);
	unset($_SESSION['guest']);

	$loginError = _MN_XALKY_CONST5;

	if($xalkyConfig['CMS'])
	{
		die($loginError);
	}
	else
	{
		include("templates/".$xalkyConfig['template']."/login.php");
		die;
	}
}

/*
* check room is set
*
*/

if(!$_REQUEST['roomID'][0])
{
	include("templates/".$xalkyConfig['template']."/login.php");
	die;
}

/*
* check username is valid
*
*/

if(!isset($_SESSION['username']) && empty($_REQUEST['userName']))
{
	$loginError = _MN_XALKY_CONST1;

	include("templates/".$xalkyConfig['template']."/login.php");
	die;
}

if(empty($_REQUEST['userName']) && isset($_REQUEST['login']))
{
	$loginError = _MN_XALKY_CONST1;

	include("templates/".$xalkyConfig['template']."/login.php");
	die;
}

if(isset($_REQUEST['userName']))
{
	$loginError = validChars($_REQUEST['userName']);

	if($loginError)
	{
		include("templates/".$xalkyConfig['template']."/login.php");
		die;
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

	include("templates/".$xalkyConfig['template']."/login.php");
	die;
}

/*
* delete any empty rooms created by users 
*/

delete_expired_rooms();

/*
* count total rooms
*
*/

$totalRooms = totalRooms();

if($xalkyConfig['singleRoom'] || $_REQUEST['singleRoom'])
{
	$totalRooms = '1';
}

/*
* get previous room id
* 
*/

$prevRoom = prevRoom();

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

list($username,$userid,$loginError) = createUser(
                     $_REQUEST['userName'],
                     $_REQUEST['userId'],
                     $_REQUEST['userPass'],
                     $_REQUEST['genderID'],
                     isset($_REQUEST['login']),
                     isset($_POST['isGuest'])
                  );

if(isset($_REQUEST['login']) && $loginError)
{
	include("templates/".$xalkyConfig['template']."/login.php");
	die;
}

/*
* check user has active subscription
*
*/

if(file_exists("plugins/subs/index.php"))
{
	include("plugins/subs/include/config.php");
	
	if($enable_subscriptions)
	{
		include("plugins/subs/include/functions.php");
		
		if(!checkActiveSub($username))
		{
			include("plugins/subs/index.php");
			die;
		}
	}
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

list($roomID,$roomOwnerID) = chatRoomID($_REQUEST['roomID'],$roomPass);

list($roomBg,$roomDesc) = chatRoomDesc($roomID);

/*
* get user details
*
*/

$guestUser = '0';

if($_POST['isGuest'])
{
	updateGuestAvatar($_REQUEST['genderID']);
}

list($id,$avatar,$loginError,$blockedList,$guestUser) = getUser($prevRoom,$roomID);

/*
* assign user group
*
*/

getUserGroup($_SESSION['userGroup']);

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

	// show login error
	include("templates/".$xalkyConfig['template']."/login.php");
	die;
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

$lastMessageID = getLastMessageID($roomID);

/*
* alls ok, include main template
*
*/

include("templates/".$xalkyConfig['template']."/main.php");

?>