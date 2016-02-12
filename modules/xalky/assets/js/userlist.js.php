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
require_once(dirname(dirname(__DIR__))."/includes/config.php");

/**
 * Declare header
*/

header("content-type: application/x-javascript");

?>
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
 

var share = 0;

/*
* create users div 
*
*/

function createUsersDiv(uuserID, userID, uUser, uAvatar, uWebcam, uPrevRoom, uRoom, uActivity, uStatus, uWatch, uAdmin, uModerator, uSpeaker, uActive, uLastActive, uIP)
{	
	// sender has closed webcam window
	if(document.getElementById("cam_"+uuserID) && uWebcam == 0)
	{
		// close viewers window
		deleteWebcamDiv("cam_"+uuserID,"pWin",uuserID);
	}
	
	// viewer has no digitalCredits, close cam window
	if(document.getElementById("cam_"+uuserID) && digitalCredits == 1)
	{
		// close viewers window
		if(Number(document.getElementById("digitalCreditsID").innerHTML) < 1)
		{
			deleteWebcamDiv("cam_"+uuserID,"pWin",uuserID);
		}
	}

	var showAdminID = '';
	var uBlock = 1;

	if(uAdmin == 1)
	{
		showAdminID = ' (A) ';
		uBlock = 0;
	}

	var showModeratorID = '';

	if(uModerator == 1)
	{
		showModeratorID = ' (M) ';
		uBlock = 0;
	}

	var showSpeakerID = '';

	if(uSpeaker == 1)
	{
		showSpeakerID = ' (S) ';
		uBlock = 0;
	}

	// user is active
	if(uActivity == 1)
	{
		// if div exists
		if(!document.getElementById("userlist_"+uuserID+uRoom))
		{
			// create div
			var ni = document.getElementById("room_"+uRoom);

			var newdiv = document.createElement('div');
			newdiv.setAttribute("id","userlist_"+uuserID+uRoom);
			newdiv.className = "userlist";
			
			// show username
			if(webcamsOn)
			{
				newdiv.innerHTML = "<div><span style='float:left;'><img id='avatar_"+uuserID+"' style='vertical-align:middle;' src='avatars/"+uAvatar+"'>&nbsp;<span onclick='userPanel(\""+userName+"\",\""+uUser+"\",\""+uuserID+"\",\""+uRoom+"\",\""+userID+"\",\""+uAvatar+"\",\""+uBlock+"\",\""+uIP+"\")'>"+decodeURI(uUser)+showAdminID+showModeratorID+showSpeakerID+"</span><span id='ustatusID_"+uuserID+"'></span></span><span style='float:right;'><img id='watch_"+uuserID+"' style='vertical-align:middle;' src='images/inv.gif'><img id='webcam_"+uuserID+"' style='vertical-align:middle;' src='images/inv.gif'></span></div>";
			}
			else
			{
				newdiv.innerHTML = "<div><span style='float:left;'><img id='avatar_"+uuserID+"' style='vertical-align:middle;' src='avatars/"+uAvatar+"'>&nbsp;<span onclick='userPanel(\""+userName+"\",\""+uUser+"\",\""+uuserID+"\",\""+uRoom+"\",\""+userID+"\",\""+uAvatar+"\",\""+uBlock+"\",\""+uIP+"\")'>"+decodeURI(uUser)+showAdminID+showModeratorID+showSpeakerID+"</span><span id='ustatusID_"+uuserID+"'></span></span></div>";
			}

			ni.appendChild(newdiv);
		}

		// remove user(s) divs from previous room
		if(uPrevRoom != uRoom && document.getElementById("userlist_"+uuserID+uPrevRoom))
		{
			// remove user from userlist
			deleteDiv("userlist_"+uuserID+uPrevRoom,"room_"+uPrevRoom);
		}

		// update user room count
		updateUserRoomCount(uRoom, '1');

		// update users avatar
		updateAvatar(uuserID, uAvatar, uRoom);

		// show blocked user icon
		if(uUser && blockedList.indexOf("|"+uuserID+"|") != '-1')
		{
			updateAvatar(uuserID, 'block.gif', uRoom);
		}

		// show watching webcam icon
		if(webcamsOn)
		{
			if(uWatch && uWatch.indexOf(","+userID+",") != '-1')
			{
				updateWatchingWebcamStatus(uuserID, '1');
			}
			else
			{
				updateWatchingWebcamStatus(uuserID, '0');
			}
		}

		// update webcam status
		if(webcamsOn)
		{
			updateWebcamStatus(uuserID,uWebcam);
		}

		// update user status message
		updateUserStatusMes(uuserID,uStatus);	

	}
	else
	{
		// remove user from userlist
		deleteDiv("userlist_"+uuserID+uRoom,"room_"+uRoom);

		// logout user
		if(Number(userID) == Number(uuserID))
		{
			logout();
		}
	}

	// check if user has sent a message, if not
	// the idle period exceeded, show user is idle
	if(document.getElementById("ustatusID_"+uuserID) && (Number(uActive) - Number(uLastActive)) > Number(idleTimeout))
	{
		document.getElementById("ustatusID_"+uuserID).innerHTML = " [Idle]";
	}

	// if user exceeds inactive auto logout value
	if((Number(uActive) - Number(uLastActive)) > Number(idleLogoutTimeout))
	{
		// remove user from userlist
		deleteDiv("userlist_"+uuserID+uRoom,"room_"+uRoom);

		// logout user
		if(Number(userID) == Number(uuserID))
		{
			logout();
		}
	}

}

/*
* update watching webcam status
*
*/ 

function updateWatchingWebcamStatus(id,status)
{
	if(status == '1')
	{
		document.getElementById("watch_"+id).src = 'plugins/webcams/images/eyes.gif';
	}
	else
	{
		document.getElementById("watch_"+id).src = 'images/inv.gif';
	}
}

/*
* update user status
*
*/ 

function updateUserStatusMes(id,status)
{
	var showStatus = '';

	if(status != userStatusMes[0] && status != userStatusMes[1] && status != '0' && status != '1' && id != '-1')
	{
		showStatus = "&nbsp;["+decodeURI(userStatusMes[status])+"]";
	}

	document.getElementById("ustatusID_"+id).innerHTML = showStatus;
}

/*
* update webcam status
*
*/ 

function updateWebcamStatus(id,status)
{
	if(status == '1')
	{
		document.getElementById("webcam_"+id).src = 'plugins/webcams/images/mini.gif';
	}
	else
	{
		document.getElementById("webcam_"+id).src = 'images/inv.gif';
	}
}

/*
* update user room count
*
*/

function updateUserRoomCount(uRoom, value)
{
	var newCount = document.getElementById("room_"+uRoom).children.length - 1;
	
	document.getElementById("userCount_"+uRoom).innerHTML = newCount;
}

/*
* update avatar
*
*/

function updateAvatar(userID, uAvatar, uRoom)
{
	// get path to current avatar
	// split path into array
	var avatarFilePath = document.getElementById("avatar_"+userID).src.split("/");

	// get length of path array
	var avatarFileName = avatarFilePath.length;

	// get the avatar file name
	avatarFileName = Number(avatarFileName)-1;

	// if avatar has changed, update avatar
	if(avatarFilePath[avatarFileName] != uAvatar)
	{
		document.getElementById("avatar_"+userID).src = "avatars/"+uAvatar;
	}
}

/*
* delete users div 
*
*/

function removeUsersDiv(userID, uRoom)
{
	// if div exists
	if(document.getElementById("userlist_"+userID))
	{
		// remove div
		var d = document.getElementById("room_"+uRoom);
		var oldDiv = document.getElementById("userlist_"+userID);
		d.remove(oldDiv);
	}

}

/*
* create select room list
*
*/

function createSelectRoomdiv(room, roomid, roomdel)
{
	var sel = document.getElementById('roomSelect');

	if(!document.getElementById("select_"+roomid))
	{
		var opt = document.createElement("option");
		opt.setAttribute("id","select_"+roomid);
		opt.value = roomid;
		opt.text = decodeURI(room.replace(/\+/g," "));		

		if(roomID == roomid)
		{
			opt.setAttribute('selected','selected');	
		}

  		try 
		{
			// standards compliant; doesn't work in IE
    		sel.add(opt, null); 
  		}
  		catch(ex)
		{
			// IE only
    		sel.add(opt);
  		}

	}

}

/*
* create room list
*
*/

function createRoomsdiv(room,roomid,roomdel)
{
	// if div does not exist
	if(!document.getElementById("room_"+roomid))
	{
		// create div
		var ni = document.getElementById('userContainer');
		var newdiv = document.createElement('div');

		newdiv.setAttribute("id","room_"+roomid);
		newdiv.className = "";
		newdiv.innerHTML = '<div class="roomheader" onclick=toggleHeader("room_'+roomid+'");> <span style="float:left;"><img style="vertical-align:middle;" src="templates/<?php echo $xalkyConfig['template'];?>/images/rooms.png">&nbsp;'+decodeURI(room.replace(/\+/g," "))+'&nbsp;</span> <span style="float:right;" class="usercount">[<span id="userCount_'+roomid+'">0</span>]</span> </div>';

		ni.appendChild(newdiv);

		if(roomid != roomID)
		{
			document.getElementById("room_"+roomid).style.height = "28px";
			document.getElementById("room_"+roomid).style.overflow = "hidden";
		}
	}
}

/*
* delete room div 
*
*/

function removeRoomsDiv(divID)
{
	// if div exists
	if(document.getElementById(divID))
	{
		// remove div
		var d = document.getElementById('userContainer');
		var olddiv = document.getElementById(divID);
		d.removeChild(olddiv);
	}
}

/*
* userlist - user panel
* appears when you click a username
*/

function userPanel(userName,uUser,uuserID,uRoom,userID,uAvatar,uBlock,uIP)
{
	// if user is Intelli-bot, disable options
	if(uUser.toLowerCase() == sentryBotName.toLowerCase())
	{
		return false;
	}
	// if div exists
	if(!document.getElementById("userpanel_"+uuserID+uRoom))
	{
		// create div
		var ni = document.getElementById("userlist_"+uuserID+uRoom);

		var newdiv = document.createElement('div');
		newdiv.setAttribute("id","userpanel_"+uuserID+uRoom);
		newdiv.className = "userInfo";

		// header
		newdiv.innerHTML = "<div class='userInfoTitle'><span style='float:left;'><img style='vertical-align:middle;' src='avatars/"+uAvatar+"'>&nbsp;"+decodeURI(uUser)+"</span><span style='float:right;' onclick='deleteDiv(\"userpanel_"+uuserID+uRoom+"\",\"userlist_"+uuserID+uRoom+"\")'><img src='images/close.gif'>&nbsp;</span></div>";

		// used for style formatting only
		newdiv.innerHTML += "<div style='height:2px;'>&nbsp;</div>";

		// private chat
		if(privateOn && userID != uuserID)
		{		
			// if user has no digitalCredits
			// disable option to send PM requests
			if(digitalCredits == 1 && document.getElementById("digitalCreditsID").innerHTML == '0')
			{
				newdiv.innerHTML += "<div onmouseover=\"this.className='highliteOn'\" onmouseout=\"this.className='highliteOff'\" onclick='showInfoBox(\"system\",\"220\",\"300\",\"200\",\"\",\""+lang32+"\")' class='highliteOff'><img style='vertical-align:middle;' src='templates/<?php echo $xalkyConfig['template'];?>/images/private.png'><span style='padding-left:11px;'>"+lang33+"</span></div>";
			}
			else
			{
				if(groupPXalky == 0)
				{
					newdiv.innerHTML += "<div onmouseover=\"this.className='highliteOn'\" onmouseout=\"this.className='highliteOff'\" onclick='showInfoBox(\"system\",\"220\",\"300\",\"200\",\"\",\""+lang6+"\")' class='highliteOff'><img style='vertical-align:middle;' src='templates/<?php echo $xalkyConfig['template'];?>/images/private.png'><span style='padding-left:11px;'>"+lang33+"</span></div>";
				}
				else
				{
					newdiv.innerHTML += "<div onmouseover=\"this.className='highliteOn'\" onmouseout=\"this.className='highliteOff'\" onclick='clearWhisper();deleteDiv(\""+userID+"_"+uuserID+"\",\"pWin\");createPXalkyDiv(\""+userName+"\",\""+uUser+"\",\""+uuserID+"\",\""+userID+"\");deleteDiv(\"userpanel_"+uuserID+uRoom+"\",\"userlist_"+uuserID+uRoom+"\")' class='highliteOff'><img style='vertical-align:middle;' src='templates/<?php echo $xalkyConfig['template'];?>/images/private.png'><span style='padding-left:11px;'>"+lang33+"</span></div>";
				}
			}
		}
		
		// whisper
		if(whisperOn && userID != uuserID)
		{
			// if user has no digitalCredits
			// disable option to send webcam requests
			if(digitalCredits == 1 && document.getElementById("digitalCreditsID").innerHTML == '0')
			{
				newdiv.innerHTML += "<div onmouseover=\"this.className='highliteOn'\" onmouseout=\"this.className='highliteOff'\" onclick='showInfoBox(\"system\",\"220\",\"300\",\"200\",\"\",\""+lang32+"\")' class='highliteOff'><img style='vertical-align:middle;' src='templates/<?php echo $xalkyConfig['template'];?>/images/private.png'><span style='padding-left:10px;'>"+lang34+"</span></div>";
			}
			else
			{
				if(groupPXalky == 0)
				{
					newdiv.innerHTML += "<div onmouseover=\"this.className='highliteOn'\" onmouseout=\"this.className='highliteOff'\" onclick='showInfoBox(\"system\",\"220\",\"300\",\"200\",\"\",\""+lang6+"\")' class='highliteOff'><img style='vertical-align:middle;' src='templates/<?php echo $xalkyConfig['template'];?>/images/private.png'><span style='padding-left:10px;'>"+lang34+"</span></div>";
				}
				else
				{
					newdiv.innerHTML += "<div onmouseover=\"this.className='highliteOn'\" onmouseout=\"this.className='highliteOff'\" onclick='whisperUser(\""+uUser+"\");deleteDiv(\"userpanel_"+uuserID+uRoom+"\",\"userlist_"+uuserID+uRoom+"\")' class='highliteOff'><img style='vertical-align:middle;' src='templates/<?php echo $xalkyConfig['template'];?>/images/private.png'><span style='padding-left:10px;'>"+lang34+"</span></div>";
				}

			}

		}

		// webcam
		if(webcamsOn && userID != uuserID)
		{

			// if user has no digitalCredits
			// disable option to send webcam requests
			if(digitalCredits == 1 && document.getElementById("digitalCreditsID").innerHTML == '0')
			{
				newdiv.innerHTML += "<div onmouseover=\"this.className='highliteOn'\" onmouseout=\"this.className='highliteOff'\" onclick='showInfoBox(\"system\",\"220\",\"300\",\"200\",\"\",\""+lang32+"\")' class='highliteOff'><img style='vertical-align:middle;' src='plugins/webcams/images/webcam.png'><span style='padding-left:6px;'>"+lang35+"</span></div>";
			}
			else
			{
				if(groupWatch == 0)
				{
					newdiv.innerHTML += "<div onmouseover=\"this.className='highliteOn'\" onmouseout=\"this.className='highliteOff'\" onclick='showInfoBox(\"system\",\"220\",\"300\",\"200\",\"\",\""+lang6+"\")' class='highliteOff'><img style='vertical-align:middle;' src='plugins/webcams/images/webcam.png'><span style='padding-left:6px;'>"+lang35+"</span></div>";
				}
				else
				{
					newdiv.innerHTML += "<div onmouseover=\"this.className='highliteOn'\" onmouseout=\"this.className='highliteOff'\" onclick='requestViewWebcam(\""+uUser+"\");deleteDiv(\"userpanel_"+uuserID+uRoom+"\",\"userlist_"+uuserID+uRoom+"\")' class='highliteOff'><img style='vertical-align:middle;' src='plugins/webcams/images/webcam.png'><span style='padding-left:6px;'>"+lang35+"</span></div>";
				}

			}

		}
		
		// profile
		if(profileRef)
		{
			var profileID = uUser;
		}
		else
		{
			var profileID = uuserID;
		}

		if(profileOn)
		{
			newdiv.innerHTML += "<div onmouseover=\"this.className='highliteOn'\" onmouseout=\"this.className='highliteOff'\" onclick='viewProfile(\""+profileID+"\",\""+uUser+"\");deleteDiv(\"userpanel_"+uuserID+uRoom+"\",\"userlist_"+uuserID+uRoom+"\")' class='highliteOff'><img style='vertical-align:middle;' src='templates/<?php echo $xalkyConfig['template'];?>/images/profile.png'><span style='padding-left:10px;'>"+lang36+"</span></div>";
		}

		if(userID != uuserID && share)
		{
			newdiv.innerHTML += "<div onmouseover=\"this.className='highliteOn'\" onmouseout=\"this.className='highliteOff'\" onclick='showInfoBox(\"shareFiles\",\"280\",\"300\",\"200\",\"plugins/share/?shareWithUser="+uUser+"\",\"\");' class='highliteOff'><img style='vertical-align:middle;' src='templates/<?php echo $xalkyConfig['template'];?>/images/share.png'><span style='padding-left:7px;'>Share Files</span></div>";
		}

		if(userID != uuserID && uBlock == 1)
		{
			// block user
			newdiv.innerHTML += "<div onmouseover=\"this.className='highliteOn'\" onmouseout=\"this.className='highliteOff'\" onclick='blockUsers(\"block\",\""+uuserID+"\");showInfoBox(\"system\",\"220\",\"300\",\"200\",\"\",\"You have blocked "+decodeURI(uUser)+"\");deleteDiv(\"userpanel_"+uuserID+uRoom+"\",\"userlist_"+uuserID+uRoom+"\")' class='highliteOff'><img style='vertical-align:middle;' src='templates/<?php echo $xalkyConfig['template'];?>/images/block.png'><span style='padding-left:10px;'>"+lang37+"</span></div>";

			// unblock user
			newdiv.innerHTML += "<div onmouseover=\"this.className='highliteOn'\" onmouseout=\"this.className='highliteOff'\" onclick='blockUsers(\"unblock\",\""+uuserID+"\");showInfoBox(\"system\",\"220\",\"300\",\"200\",\"\",\"You have unblocked "+decodeURI(uUser)+"\");deleteDiv(\"userpanel_"+uuserID+uRoom+"\",\"userlist_"+uuserID+uRoom+"\")' class='highliteOff'><img style='vertical-align:middle;' src='templates/<?php echo $xalkyConfig['template'];?>/images/unblock.png'><span style='padding-left:10px;'>"+lang38+"</span></div>";

			// report abuse
			newdiv.innerHTML += "<div onmouseover=\"this.className='highliteOn'\" onmouseout=\"this.className='highliteOff'\" onclick='showInfoBox(\"report\",\"280\",\"360\",\"200\",\"templates/"+styleFolder+"/report.php?id="+uUser+"\",\"\");;deleteDiv(\"userpanel_"+uuserID+uRoom+"\",\"userlist_"+uuserID+uRoom+"\")' class='highliteOff'><img style='vertical-align:middle;' src='templates/<?php echo $xalkyConfig['template'];?>/images/report.png'><span style='padding-left:7px;'>"+lang39+"</span></div>";
		}

		if(admin && userID != uuserID || moderator && userID != uuserID || roomOwner && userID != uuserID)
		{
			// silence
			newdiv.innerHTML += "<div onmouseover=\"this.className='highliteOn'\" onmouseout=\"this.className='highliteOff'\" onclick='adminControls(\""+uUser+"\",\"SILENCE\");deleteDiv(\"userpanel_"+uuserID+uRoom+"\",\"userlist_"+uuserID+uRoom+"\")' class='highliteOff'><img style='vertical-align:middle;' src='templates/<?php echo $xalkyConfig['template'];?>/images/tool.png'><span style='padding-left:10px;'>"+lang40+"</span></div>";

			// kick
			newdiv.innerHTML += "<div onmouseover=\"this.className='highliteOn'\" onmouseout=\"this.className='highliteOff'\" onclick='adminControls(\""+uUser+"\",\"KICK\");deleteDiv(\"userpanel_"+uuserID+uRoom+"\",\"userlist_"+uuserID+uRoom+"\")' class='highliteOff'><img style='vertical-align:middle;' src='templates/<?php echo $xalkyConfig['template'];?>/images/tool.png'><span style='padding-left:10px;'>"+lang41+"</span></div>";

			if(admin && userID != uuserID || moderator && userID != uuserID)
			{
				// ban
				newdiv.innerHTML += "<div onmouseover=\"this.className='highliteOn'\" onmouseout=\"this.className='highliteOff'\" onclick='adminControls(\""+uUser+"\",\"BAN\");deleteDiv(\"userpanel_"+uuserID+uRoom+"\",\"userlist_"+uuserID+uRoom+"\")' class='highliteOff'><img style='vertical-align:middle;' src='templates/<?php echo $xalkyConfig['template'];?>/images/tool.png'><span style='padding-left:10px;'>"+lang42+"</span></div>";
			}
			
		}
		
		if(admin && userID != uuserID || moderator && userID != uuserID)
		{		
			// show IP
			newdiv.innerHTML += "<div onmouseover=\"this.className='highliteOn'\" onmouseout=\"this.className='highliteOff'\" onclick=newWin('http://www.infosniper.net/index.php?ip_address="+uIP+"') class='highliteOff'><img style='vertical-align:middle;' src='templates/<?php echo $xalkyConfig['template'];?>/images/tool.png'><span style='padding-left:10px;'>IP: "+uIP+"</span></div>";
		}

		if(admin && userID == uuserID)
		{
			// admin area
			newdiv.innerHTML += "<div onmouseover=\"this.className='highliteOn'\" onmouseout=\"this.className='highliteOff'\" onclick=newWin('admin/') class='highliteOff'><img style='vertical-align:middle;' src='templates/<?php echo $xalkyConfig['template'];?>/images/tool.png'><span style='padding-left:10px;'>Admin Area</span></div>";
		}

		if(moderatedXalky == '1' && admin && userID == uuserID || moderatedXalky == '1' && moderator && userID == uuserID)
		{
			newdiv.innerHTML += "<div onmouseover=\"this.className='highliteOn'\" onmouseout=\"this.className='highliteOff'\" onclick='showInfoBox(\"mc\",\"400\",\"600\",\"100\",\"plugins/moderated_chat/index.php\",\"\");;deleteDiv(\"userpanel_"+uuserID+uRoom+"\",\"userlist_"+uuserID+uRoom+"\")' class='highliteOff'><img style='vertical-align:middle;' src='plugins/moderated_chat/images/moderatedchat.gif'><span style='padding-left:10px;'>"+lang43+"</span></div>";
		}

		ni.appendChild(newdiv);

	}

}

/*
* Clear whisper box when new private chat window is opened
*
*/

function clearWhisper()
{
   document.getElementById("whisperID").value = "";
}

/*
* admin functions
*
*/

function adminControls(tUser,doAction)
{
	var param = '?';
	param += '&userID=' + escape(userID);
	param += '&uname=' + escape(userName);
	param += '&toname=' + escape(tUser);
	param += '&umessage=' + escape(doAction);	
	param += '&uroom=' + roomID;
	param += '&usfx=' + escape(sfx);
	param += '&umid=' + displayMDiv;	

	// if ready to send message to DB
	if (sendReq.readyState == 4 || sendReq.readyState == 0) 
	{
		if(admin && userName != tUser || moderator && userName != tUser || roomOwner && userName != tUser)
		{
			sendReq.open("POST", 'includes/outbound.php?rnd='+ Math.random(), true);
			sendReq.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			sendReq.onreadystatechange = handleSendXalky;
			sendReq.send(param);
		}
		else
		{
			showInfoBox("system","220","300","200","",lang44);
		}

	}

}

/*
* userlist - view profile
*
*/

function viewProfile(userID,uUser)
{
	var win = window.open(profileUrl+userID,'','');
}

/*
* delete div
* 
*/

function deleteDiv(divID,divContainer)
{
	// if div exists
	if(document.getElementById(divID))
	{
		// remove div
		var d = document.getElementById(divContainer);
		var olddiv = document.getElementById(divID);
		d.removeChild(olddiv);
	}

}