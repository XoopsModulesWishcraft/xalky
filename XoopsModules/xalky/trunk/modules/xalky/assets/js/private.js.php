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

require_once (dirname(dirname(__DIR__))."/include/config.php");

/**
 * Declare header
*/

header("content-type: application/x-javascript");

?>
/**
 * Xalky - Private Chat Room - XOOPS Chat Rooms
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
 * create private chat div
 *
 */
var privateXalky = 0;
function xalkyPrivateChat(divPName,divToName,dPID,duserID)
{
	if(privateXalky == 1)
	{
		xalkyShowBox("system","220","300","200","",lang30);
		return false;
	}

	// to user
	if(divToName!=userName)
	{
		var uUser = divToName;
	}
	else
	{
		var uUser = divPName;
	}

	// window title
	var pTitle = uUser;

	// div name
	divPName = duserID+"_"+dPID;
	
	// prevent duplicate private chat windows 
	if(document.getElementById(dPID+"_"+duserID))
	{
		document.getElementById(dPID+"_"+duserID).style.visibility = 'visible';
		document.getElementById("pcontent_"+dPID+"_"+duserID).style.visibility = 'visible';
		document.getElementById("pmenuBar_"+dPID+"_"+duserID).style.visibility = 'visible';
		document.getElementById("psendbox_"+dPID+"_"+duserID).style.visibility = 'visible';
		document.getElementById("pmenuWin_"+dPID+"_"+duserID).style.visibility = 'visible';	
		
		return false;
	}	

	// if div exists
	if(!document.getElementById(divPName))
	{
		// create div
		var ni = document.getElementById("pWin");

		var newdiv = document.createElement('div');
		newdiv.setAttribute("id",divPName);
		newdiv.className = "pXalkyWin";

		// title
		newdiv.innerHTML = "<div id='ptitle_"+divPName+"' class='ptitle' style='cursor:move;' onclick=xalkyFocus(\""+divPName+"\")> <span style='float:left;'>&nbsp;<img style='vertical-align:middle;' src='<?php echo $xalkyConfig['chatroomUrl']; ?>/assets/avatars/online.gif'>&nbsp;"+decodeURI(pTitle)+"</span> <span style='float:right;'><span style='cursor:pointer;' onclick='xalkyPrivateChatWindow(\""+divPName+"\",\""+divPName+"\")'><img src='<?php echo $xalkyConfig['chatroomUrl']; ?>/assets/images/min.gif'></span>&nbsp;<span style='cursor:pointer;' onclick='xalkyClosePrivateChat(\""+divPName+"\");xalkyDigitalCreditsRequest(\""+divPName+"\",\"off\");xalkyPrivateChatCount();'><img src='<?php echo $xalkyConfig['chatroomUrl']; ?>/assets/images/close.gif'></span>&nbsp;</div>";

		// content
		newdiv.innerHTML += "<div id='pcontent_"+divPName+"' class='pcontent'></div>";

		// menu
		newdiv.innerHTML += "<div id='pmenuBar_"+divPName+"' class='pmenuBar'></div>";

		// sendbox
		newdiv.innerHTML += '<div id=\'psendbox_'+divPName+'\' class=\'psendbox\'><input type=\'text\' id=\'poptionsBar_'+divPName+'\' class="poptionsBar" onKeyPress="return xalkySubmit(this,event,\'poptionsBar_'+divPName+'\',\'pcontent_'+divPName+'\',\''+uUser+'\');" onfocus="xalkyChangeMessageStyle(\'poptionsBar_'+divPName+'\');"></textarea><input id="poptionsSend" class="poptionsSend" type="button" value="'+lang31+'" onclick="xalkySendPrivateMessage(\''+uUser+'\',\'poptionsBar_'+divPName+'\',\'pcontent_'+divPName+'\')"></div>';

		// menu win
		newdiv.innerHTML += "<div id='pmenuWin_"+divPName+"'></div>";

		ni.appendChild(newdiv);

		// add menu
		xalkyOptionsMenu('pmenuBar_'+divPName, 'poptionsBar_'+divPName, 'pcontent_'+divPName, 'pmenuWin_'+divPName);

		// focus window
		xalkyFocus(divPName);
		
		// drag window
		$( "#"+divPName ).draggable();
	}

	// if digitalCredits is enabled
	if(digitalCredits == 1 && Number(duserID) == Number(userID))
	{
		xalkyDigitalCreditsRequest(divPName,'on');
		privateXalky = 1;
	}
}

/*
 * reset private window count
 *
 */
function xalkyPrivateChatCount()
{
	privateXalky = 0;
}

/*
 * send private message
 *
 */
function xalkySendPrivateMessage(uUser,divPName1,divPName2)
{
	// send message
	isPrivate = uUser;
	xalkyAddMessage(divPName1,divPName2);
}

/*
 * minimise private div
 *
 */
function xalkyPrivateChatWindow(divID,userID)
{
	xalkyToggleHeader(divID, userID);
}

/*
 * close private div
 *
 */
function xalkyClosePrivateChat(divID)
{
	document.getElementById(divID).style.visibility = 'hidden';
	document.getElementById('pcontent_'+divID).style.visibility = 'hidden';
	document.getElementById('pmenuBar_'+divID).style.visibility = 'hidden';
	document.getElementById('psendbox_'+divID).style.visibility = 'hidden';
	document.getElementById('pmenuWin_'+divID).style.visibility = 'hidden';
}

/*
 * private chat is initiated
 * digitalCredits function
 */
function xalkyDigitalCreditsRequest(uuserID,status)
{
	uuserID = uuserID.replace(userID,'');
	uuserID = uuserID.replace("_",'');

	var param = '?';
	param += '&digitalCreditID=' + escape(uuserID);
	param += '&digitalCreditStatus=' + escape(status);	

	// if ready to send message to DB
	if (sendReq.readyState == 4 || sendReq.readyState == 0) 
	{
		sendReq.open("POST", '<?php echo $xalkyConfig['chatroomUrl']; ?>/outbound.xml?rnd='+ Math.random(), true);
		sendReq.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		sendReq.onreadystatechange = xalkySendChat;
		sendReq.send(param);
	}

}