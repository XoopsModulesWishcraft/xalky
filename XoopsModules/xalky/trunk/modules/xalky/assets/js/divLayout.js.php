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

header("content-type: application/x-javascript");

?>
/**
 * Xalky - Resize main divs - XOOPS Chat Rooms
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

function xalkyResizeDivs()
{
	var w = 0, h = 0;

	// check browser type and get window sizes
  	if( typeof( window.innerWidth ) == 'number' ) 
	{
    	// Non-IE
    	w = window.innerWidth;
		h = window.innerHeight;
 	} 
	else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) 
	{
    	// IE 6+ in 'standards compliant mode'
    	w = document.documentElement.clientWidth;
    	h = document.documentElement.clientHeight;
  	} 
	else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) 
	{
    	// IE 4 compatible
    	w = document.body.clientWidth;
    	h = document.body.clientHeight;
  	}

	// set main container width
	document.getElementById("mainContainer").style.width = (w - 7) + "px";
	document.getElementById("mainContainer").style.height = (h - 7) + "px";

	// set the width of the userlist
	var userWidth = 236;

	// set the width of the chat screen
	var chatWidth = (w - userWidth) - 29;

	// new chat window width
	document.getElementById("chatContainer").style.width = chatWidth + "px";

	// new chat window height
	document.getElementById("chatContainer").style.height = (h - 224) + "px";

	// new user window width
	document.getElementById("userContainer").style.width = userWidth + "px";

	// new user window height
	document.getElementById("userContainer").style.height = (h - 120) + "px";

	// new top window width
	document.getElementById("topContainer").style.width = (w - 19) + "px";

	// new options window width
	document.getElementById("optionsContainer").style.width = ((w - userWidth) - 25) + "px";

	// new options message bar width
	document.getElementById("optionsBar").style.width = ((w - userWidth) - 125) + "px";

	// new options icon bar width
	document.getElementById("optionsIcons").style.width = ((w - userWidth) - 125) + "px";
	
	// disable whisper
	if(!whisperOn && document.getElementById("uwhisperID"))
	{	
		document.getElementById("uwhisperID").style.display = "none";			
	}	
}

window.onresize = function() 
{
	xalkyResizeDivs();
}