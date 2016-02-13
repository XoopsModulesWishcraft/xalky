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

// Enable custom login details



// Enter your CMS Global values below
if (!is_object($GLOBALS['xoopsUser'])) {
	define('XALKY_LOGIN',false); // 0 OFF, 1 ON
} else {
	define('XALKY_LOGIN',true); // 0 OFF, 1 ON
	define('XALKY_USERNAME',$GLOBALS['xoopsUser']->getVar('uname')); // username
	define('XALKY_USERID',$GLOBALS['xoopsUser']->getVar('uid')); // userid
}
if(defined('XALKY_USERID') || empty(constant('XALKY_USERID')))
{
	die("userid value is null");
}
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
	if(XALKY_LOGIN){
		// assign username
		$uname = XALKY_USERNAME;
		if(!XALKY_USERID){
			// userid empty
			$userID = '-1';
		}else{
			// assign userid
			$userID = XALKY_USERID;
		}
	}
	if(!$remotely_hosted && !XALKY_LOGIN){
		global $xoTheme;
		$xoTheme->addScript('', array(), '<!-- 
		function xalkyGetCookieVal (offset) {
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
	    		return xalkyGetCookieVal (j);
	    		i = document.cookie.indexOf(" ", i) + 1;
	    		if (i == 0) break;
	  		}
	  		return null;
		}
		if(GetCookie("login") == null){ 
			window.location="error.php";
		}
		// -->'); 
	}
?>
		
		