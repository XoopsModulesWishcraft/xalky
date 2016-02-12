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

require_once (dirname(dirname(__DIR__))."/include/config.php");

/**
 * Declare header
*/

header("content-type: application/x-javascript");

?>
/**
 * Xalky - New Room - XOOPS Chat Rooms
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
 * init ajax object
 *
 */

//Define XmlHttpRequest
var updateUserRooms = getXmlHttpRequestObject();

/*
 * show create room div
 *
 */
function xalkyNewRoom($id)
{
	if(groupRooms == 0)
	{
		xalkyShowBox("system","220","300","200","",lang6);
		return false;			
	}

	if($id == '1')
	{
		// show create room
		document.getElementById("roomCreate").style.visibility = 'visible';
	}
	else
	{
		// hide create room
		document.getElementById("roomCreate").style.visibility = 'hidden';
	}

}

/*
 * add room
 *
 */
function xalkyAddRoom()
{
	// get new room name
	var xalkyNewRoomName = "|" + document.getElementById("roomName").value.toLowerCase() + "|";
	
   	// check for white space (no url)
    whSpc = new RegExp(/^\s+$/);

	// check if room already exists
	if(whSpc.test(document.getElementById("roomName").value.toLowerCase()) || roomNameStr.indexOf(xalkyNewRoomName)!= '-1')
	{
		xalkyShowBox("system","220","300","200","",lang28);

		return false;
	}

	// check for badwords/chars
	var checkRoomName = filterBadword(xalkyNewRoomName.replace(/\|/g,""));
		checkRoomName = checkRoomName.split("");

	for (i=0; i < checkRoomName.length; i++)
	{
		if(badChars.indexOf("|"+checkRoomName[i]+"|") != '-1')
		{
			// check for badwords
			if(checkRoomName[i] == '*')
			{
				checkRoomName[i] = '****';
			}

			// check for space
			if(checkRoomName[i] == ' ')
			{
				checkRoomName[i] = 'space';
			}

			xalkyShowBox("system","220","300","200","","Room name contains illegal characters [ "+checkRoomName[i]+" ]");

			return false;
		}
	}

	var param = '?';
	param += '&xalkyAddRoom=1';
	param += '&xalkyNewRoomName=' + encodeURIComponent(document.getElementById("roomName").value);
	param += '&xalkyNewRoomOwner=' + userID;
	param += '&xalkyNewRoomPass='+ document.getElementById("roomPass").value;

	// if ready to send message to DB
	if (updateUserRooms.readyState == 4 || updateUserRooms.readyState == 0)
	{

		updateUserRooms.open("POST", '<?php $xalkyConfig['chatroomUrl']; ?>/outbound.php', true);
		updateUserRooms.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		updateUserRooms.onreadystatechange = xalkySendBlock;
		updateUserRooms.send(param);

		// visual confirm
		xalkyShowBox("system","220","300","200","",lang29);

	}

	// clr input fields
	document.getElementById("roomName").value = '';
	document.getElementById("roomPass").value = '';

	// hide room creator
	xalkyNewRoom('0');

}

function xalkySendBlock()
{	
	// empty
}