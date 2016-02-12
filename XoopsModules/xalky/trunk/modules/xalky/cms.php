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


// INTEGRATION NOTES FOR CUSTOM DEVELOPERS

// You can insert your existing CMS user Global values into the 
// login procedure. Simply replace the values $_FOO['username'] 
// and $_FOO['userid'] with your SESSION, COOKIE or MySQL results.

// Example Code:

// define('C_CUSTOM_LOGIN','1'); // 0 OFF, 1 ON
// define('C_CUSTOM_USERNAME',$_SESSION['username']); // username
// define('C_CUSTOM_USERID',$_SESSION['userid']); // userid
// if(!isset($_SESSION['userid']) || empty($_SESSION['userid']))
// {
//	 die("userid value is null");
// }

// You will be able to link directly to the chat room by adding 
// an <a href> link to your web pages like shown below and only 
// registered users will be able to auto-login to your chat room.

// <a href="http://yoursite.com/xalky/">Xalky Room</a>


## CUSTOM INTEGRATION SETTINGS ##############


// Enable custom login details

define('C_CUSTOM_LOGIN','0'); // 0 OFF, 1 ON


// Enter your CMS Global values below

define('C_CUSTOM_USERNAME',$_FOO['username']); // username
define('C_CUSTOM_USERID',$_FOO['userid']); // userid

if(!isset($_FOO['userid']) || empty($_FOO['userid']))
{
	die("userid value is null");
}

## DO NOT EDIT BELOW THIS LINE ##############


// if remote login via CMS

	if($remotely_hosted){

		// check username isset
		if(!isset($_COOKIE["uname"])){

			header("Location: error.php");
			die;

		}

		// if userid is null, assign userid
		if(!isset($_COOKIE["userID"])){

			$userID='-1';

		}else{

			$userID=$_COOKIE["userID"];

		}

	}

// if custom login

	if(C_CUSTOM_LOGIN){

		// assign username
		$uname = C_CUSTOM_USERNAME;

		if(!C_CUSTOM_USERID){

			// userid empty
			$userID = '-1';

		}else{

			// assign userid
			$userID = C_CUSTOM_USERID;

		}

	}

// if default login

	if(!$remotely_hosted && !C_CUSTOM_LOGIN){

	?>

		<SCRIPT LANGUAGE="JavaScript1.2">
		<!-- 
		function getCookieVal (offset) {
	  		var endstr = document.cookie.indexOf (";", offset);
	  		if (endstr == -1)
	  		endstr = document.cookie.length;
	  		return unescape(document.cookie.substring(offset, endstr));
		}
		function GetCookie (name) {
	  		var arg = name + "=";
	  		var alen = arg.length;
	  		var clen = document.cookie.length;
	  		var i = 0;
	  		while (i < clen) {
	    		var j = i + alen;
	    		if (document.cookie.substring(i, j) == arg)
	    		return getCookieVal (j);
	    		i = document.cookie.indexOf(" ", i) + 1;
	    		if (i == 0) break;
	  		}
	  		return null;
		}
		if(GetCookie("login") == null){ 
			window.location="error.php";
		}
		// -->
		</SCRIPT>

<?php }?>