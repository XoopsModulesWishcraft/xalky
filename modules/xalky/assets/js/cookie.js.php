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


header("content-type: application/x-javascript");

?>
/**
 * Xalky - User Settings - XOOPS Chat Rooms
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

var userRPM = true;
var userRWebcam = false;
var userEntryExitSFX = true;
var userNewMessageSFX = true;
var userSFX = true;
var userAvatarsON = true;
var userMessStyle = false;	

/*
 * create cookie
 *
 */
function xalkyCreateCookie(name,value,days)
{
	if(days)
	{
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

xalkyCreateCookie('login','',-1);

/*
 * read cookie
 *
 */
function xalkyReadCookie(name)
{
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++)
	{
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}

	return null;
}

/*
 * get cookie
 *
 */
var gotCookie1 = xalkyReadCookie('xalkyTextStyle');
var gotCookie2 = xalkyReadCookie('xalkyOptions');

function xalkyGetCookie()
{
	if(gotCookie1)
	{
		gotCookie = decodeURI(gotCookie1).split("|");

		mBold = gotCookie[0];
		mItalic = gotCookie[1];
		mUnderline = gotCookie[2];
		textColour = gotCookie[3];
		textSize = gotCookie[4];
		textFamily = gotCookie[5];
	}

	if(gotCookie2)
	{
		gotCookie = decodeURI(gotCookie2).split("|");

		userRPM = gotCookie[0];
		userRWebcam = gotCookie[1];
		userEntryExitSFX = gotCookie[2];
		userNewMessageSFX = gotCookie[3];
		userSFX = gotCookie[4];
		userAvatarsON = gotCookie[5];
		userMessStyle = gotCookie[6];	
	}
}