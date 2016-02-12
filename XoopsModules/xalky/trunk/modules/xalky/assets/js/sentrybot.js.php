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

global $xalkyConfig;
require_once (dirname(dirname(__DIR__))."/include/config.php");

/**
 * Declare header
*/

header("content-type: application/x-javascript");

?>
/**
 * Xalky - sentryBot engine - XOOPS Chat Rooms
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

var sentryBot = <?php echo $xalkyConfig['sentryBot'];?>;
var sentryBotName = '<?php echo $xalkyConfig['sentryBotName'];?>';
var sentryBotAvi = '<?php echo $xalkyConfig['sentryBotAvi'];?>';
var sentryBotRoomID = '<?php echo $xalkyConfig['sentryBotRoomID'];?>';

var iWarning = 0;

function xalkySentryBot(ursMessage, itoUserName)
{
	var iResponse = '';

	ursMessage = ursMessage.toLowerCase();

	// welcome messages

	var i = 0;

	for(i=0;i<uEntryResponse.length;i++)
	{
		if(ursMessage.search(uEntryResponse[i]) != '-1')
		{
			iResponse = iEntryResponse[Math.floor(Math.random()*iEntryResponse.length)];
		}
	}

	// exit messages

	var i = 0;

	for(i=0;i<uExitResponse.length;i++)
	{
		if(ursMessage.search(uExitResponse[i]) != '-1')
		{
			iResponse = iExitResponse[Math.floor(Math.random()*iExitResponse.length)];
		}

	}

	// help messages

	var i = 0;

	for(i=0;i<uHelpResponse.length;i++)
	{
		if(ursMessage.search(uHelpResponse[i]) != '-1')
		{
			iResponse = iHelpResponse[Math.floor(Math.random()*iHelpResponse.length)];
		}

	}

	// warning messages

	if (ursMessage.indexOf("****") != -1)
	{
		iResponse = lang5;

		iWarning += 1;
	}

	// sentryBot response

	if(iResponse)
	{
		var toName = '';

		var iMessage = sentryBotAvi+"|"+stextColour+"|"+stextSize+"|"+stextFamily+"|"+iResponse;

		if(iWarning == 2)
		{
			xalkyMessageDIV('0', '-1', 'chatContainer', showMessages+1, 'SILENCE', 'beep_high.mp3', sentryBotName, itoUserName, '');
		}

		if(iWarning >= 3)
		{
			xalkyMessageDIV('0', '-1', 'chatContainer', showMessages+1, 'KICK', 'beep_high.mp3', sentryBotName, itoUserName, '');
		}

		xalkySendSentryBot('chatContainer','',iMessage);
	}

}

/*
 * send sentryBot message
 *
 */
var sendBotReq = getXmlHttpRequestObject();
function xalkySendSentryBot(div,itoUserName,iMessage)
{
	var param = '?';

	param += '&userID=-1';
	param += '&umid='+div;
	param += '&uroom=' + roomID;
	param += '&toname=' + encodeURI(itoUserName);
	param += '&umessage=' + encodeURIComponent(iMessage);
	param += '&usfx=' + escape('beep_high.mp3');	

	// if ready to send message to DB
	if (sendBotReq.readyState == 4 || sendBotReq.readyState == 0) 
	{
		sendBotReq.open("POST", '<?php echo $xalkyConfig['chatroomUrl']; ?>/outbound.xml?rnd='+ Math.random(), true);
		sendBotReq.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		sendBotReq.onreadystatechange = xalkySendChat;
		sendBotReq.send(param);
	}
}