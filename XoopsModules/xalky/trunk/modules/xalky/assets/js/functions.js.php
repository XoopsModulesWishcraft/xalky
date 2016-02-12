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

require_once(dirname(dirname(__DIR__))."/include/session.php");
require_once(dirname(dirname(__DIR__))."/include/config.php");

/**
 * Declare header
*/

header("content-type: application/x-javascript");

?>
/**
 * Xalky - General Functions - XOOPS Chat Rooms
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
 * init all
 *
 */
function xalkyIntialise()
{
	xalkyResizeDivs();
	xalkyDisplayAdverts();
	xalkyGetCookie();
	xalkyEditSettings();

	xalkySwitchStatus(userRPM,"allowPM");
	xalkySwitchStatus(userRWebcam,"viewMyCamID");
	xalkySwitchStatus(userEntryExitSFX,"entryExitID");
	xalkySwitchStatus(userNewMessageSFX,"soundsID");
	xalkySwitchStatus(userSFX,"sfxID");
	xalkySwitchStatus(userAvatarsON,"userAvatarsON");
	xalkySwitchStatus(userMessStyle,"userMessStyle");	

	xalkyOptionsMenu('optionsIcons','optionsBar','chatContainer','menuWin');

	if(publicWelcome == "")
	{
		publicWelcome = lang1;
	}

	var entryWelcome = "../images/notice.gif|"+stextColour+"|"+stextSize+"|"+stextFamily+"|"+publicWelcome+"|1";
	var entryNotice = "1|"+stextColour+"|"+stextSize+"|"+stextFamily+"|** "+userName+" "+publicEntry;
	var entryMessages = "../images/notice.gif|"+stextColour+"|"+stextSize+"|"+stextFamily+"|Displaying last messages ...|1";

	xalkyMessageDIV('1',userID,displayMDiv,1,entryWelcome,'doorbell.mp3','','');

	if(invisibleOn == 1 && (admin == 1 && hide == 1))
	{
		// empty
	}
	else
	{
		if(dispLastMess > 1)
		{
			xalkyMessageDIV('0',userID,displayMDiv,2,entryMessages,'beep_high.mp3','','');
		}

		xalkyRoomLogout();
		xalkyRoomLogin();
	}

	xalkyGetMessages();
	xalkyRoomHeaders();
}

/*
 * Array indexOf method (for unsupported browsers)
 * https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/Array/indexOf
 */	
if (!Array.prototype.indexOf) {
	Array.prototype.indexOf = function (searchElement /*, fromIndex */ ) {
		"use strict";
		if (this == null) {
			throw new TypeError();
		}
		var t = Object(this);
		var len = t.length >>> 0;
		if (len === 0) {
			return -1;
		}
		var n = 0;
		if (arguments.length > 1) {
			n = Number(arguments[1]);
			if (n != n) { // shortcut for verifying if it's NaN
				n = 0;
			} else if (n != 0 && n != Infinity && n != -Infinity) {
				n = (n > 0 || -1) * Math.floor(Math.abs(n));
			}
		}
		if (n >= len) {
			return -1;
		}
		var k = n >= 0 ? n : Math.max(len - Math.abs(n), 0);
		for (; k < len; k++) {
			if (k in t && t[k] === searchElement) {
				return k;
			}
		}
		return -1;
	}
}

/*
 * show room headers 
 *
 */
function xalkyRoomHeaders()
{
	var i = 1;

	for (i=1;i<=totalRooms;i++)
	{
		if(roomID != i)
		{
			if(document.getElementById("room_"+i))
			{
				xalkyToggleHeader('room_'+i);
			}
		}

	}

}

/*
 * login message
 *
 */
function xalkyRoomLogin()
{
	roomID = currRoom;

	message = "1|"+stextColour+"|"+stextSize+"|"+stextFamily+"|** "+userName+" "+publicEntry;

	// send login message
	var login = setTimeout('outbound(displayMDiv);',1000);
}

/*
 * xalkyLogout message
 *
 */
function xalkyRoomLogout()
{
	// remove user from current room
	xalkyDropUsersDIV(userID,roomID);

	// insert xalkyLogout message in prev room
	if(currRoom != prevRoom)
	{
		roomID = prevRoom;

		message = "1|"+stextColour+"|"+stextSize+"|"+stextFamily+"|** "+userName+" "+publicExit;

		// send xalkyLogout message
		outbound(displayMDiv);
	}
}

/*
 * focus windows 
 *
 */
var zIndex = 100;
function xalkyFocus(divID)
{
	// if div exists
	if(document.getElementById(divID))
	{
		// assign div zIndex
		document.getElementById(divID).style.zIndex = zIndex;

		if(zIndex >= 31000)
		{
			zIndex = 30000;
		}
		else
		{
			zIndex += 1;
		}

	}
}

/*
 * toggle headers 
 *
 */
function xalkyToggleHeader(headerID,subID)
{
	if(document.getElementById(headerID).style.height != '24px')
	{
		document.getElementById(headerID).style.height = '24px';
		document.getElementById(headerID).style.overflow = 'hidden';

		if(subID) // pXalkyWin
		{
			document.getElementById(headerID).style.width = "180px";
			document.getElementById("pcontent_"+subID).style.visibility = 'hidden';
			document.getElementById("psendbox_"+subID).style.visibility = 'hidden';
		}
	}
	else
	{
		document.getElementById(headerID).style.height = "auto";
		
		if(subID)
		{
			document.getElementById(headerID).style.height = "300px";
			document.getElementById(headerID).style.width = "400px";

			document.getElementById("ptitle_"+subID).style.backgroundColour = newPM;
			document.getElementById("pcontent_"+subID).style.visibility = 'visible';
			document.getElementById("psendbox_"+subID).style.visibility = 'visible';
		}
	}
}

/*
 * display adverts container 
 *
 */
function xalkyDisplayAdverts()
{
	if(advertsOn == 0 && document.getElementById("advertContainer"))
	{
		document.getElementById("advertContainer").style.visibility = 'hidden';
	}
}

/*
 * change rooms 
 *
 */
function xalkyChangeRooms(roomID)
{
	window.location = '?roomID='+roomID;
}

/*
 * toggle divs 
 *
 */
var topLevel = 100;
function xalkyToogleBox(szDivID)
{
	if(document.layers)	   //NN4+
	{
		if(document.layers[szDivID].visibility == "visible")
		{
			document.layers[szDivID].visibility = "hidden";
		}
		else
		{
			document.layers[szDivID].zIndex = topLevel++;
			document.layers[szDivID].visibility = "visible"; 
		}

	}
	else if(document.getElementById)	  //gecko(NN6) + IE 5+
	{
		var obj = document.getElementById(szDivID);

		if(obj.style.visibility == "visible")
		{
			obj.style.visibility = "hidden";
		}
		else
		{
			obj.style.zIndex = topLevel++;
			obj.style.visibility = "visible";
		}

	}
	else if(document.all)	// IE 4
	{
			
		if(document.all[szDivID].style.visibility == "visible")
		{
			document.all[szDivID].style.visibility = "hidden";
		}
		else
		{
			document.all[szDivID].style.zIndex = topLevel++;
			document.all[szDivID].style.visibility = "visible"; 
		}
	}

	if(topLevel > 32000)
	{
		topLevel = 10;
	}
}

/*
 * init avatar menu
 *
 */
function xalkyAvatars(inputMDiv, displayMDiv, nWin)
{
	xalkyCreateMessage('avatarsWin',nWin);

	if(displayMDiv != 'chatContainer')
	{
		document.getElementById('avatarsWin').style.bottom = '66px';
	}

	xalkyCreateMenu(inputMDiv,displayMDiv,'avatarsWin',totalAvatars,loopAvatars);
	xalkyToogleBox('avatarsWin');
}

/*
 * init sfx menu
 *
 */
function xalkySFX(inputMDiv,displayMDiv, nWin)
{
	xalkyCreateMessage('sFXWin',nWin);

	if(displayMDiv != 'chatContainer')
	{
		document.getElementById('sFXWin').style.bottom = '66px';
	}

	xalkyCreateMenu(inputMDiv,displayMDiv,'sFXWin',totalSFX,'1');
	xalkyToogleBox('sFXWin');
}

/*
 * init smilie menu
 *
 */
function xalkySmilies(inputMDiv, displayMDiv, nWin)
{
	xalkyCreateMessage('smiliesWin',nWin);

	if(displayMDiv != 'chatContainer')
	{
		document.getElementById('smiliesWin').style.bottom = '66px';
	}

	xalkyCreateMenu(inputMDiv,displayMDiv,'smiliesWin',totalSmilies,loopSmilies);
	xalkyToogleBox('smiliesWin');	
}

/*
 * init style window
 *
 */
function xalkyStyles(inputMDiv, displayMDiv, nWin)
{
	xalkyCreateMessage('coloursWin',nWin);
	xalkyCreateMenu(inputMDiv,displayMDiv,'coloursWin',totalColours,loopColours);
	xalkyToogleBox('coloursWin');

	xalkyCreateMessage('fontfamilyWin',nWin);
	xalkyCreateMenu(inputMDiv,displayMDiv,'fontfamilyWin',totalFontFamily,loopFontFamily);
	xalkyToogleBox('fontfamilyWin');

	xalkyCreateMessage('fontsizeWin',nWin);
	xalkyCreateMenu(inputMDiv,displayMDiv,'fontsizeWin',totalFontSize,loopFontSize);
	xalkyToogleBox('fontsizeWin');

	if(displayMDiv != 'chatContainer')
	{
		document.getElementById('coloursWin').style.bottom = '66px';
		document.getElementById('fontfamilyWin').style.bottom = '66px';
		document.getElementById('fontsizeWin').style.bottom = '66px';
	}
}

/*
 * options menu
 * to hide icons in private windows,
 * if(ndiv.search("pmenuBar_")){}
 */
function xalkyOptionsMenu(ndiv,nBar,nContainer,nWin)
{
	<?php if ($xalkyConfig['smilies']){?>
	document.getElementById(ndiv).innerHTML  = '<span alt="'+lang52+'" title="'+lang52+'" id="smilies" class="iconSmilies" onmouseover="this.className=\'iconSmiliesOver\'" onmouseout="this.className=\'iconSmilies\'" onclick="xalkySmilies(\''+nBar+'\',\''+nContainer+'\',\''+nWin+'\');"></span>';
	<?php }?>

	<?php if ($xalkyConfig['xalkyRingBell']){?>	
	document.getElementById(ndiv).innerHTML += '<span alt="'+lang53+'" title="'+lang53+'" id="ringbell" class="iconRingbell" onmouseover="this.className=\'iconRingbellOver\'" onmouseout="this.className=\'iconRingbell\'" onclick="xalkyRingBell(\''+nBar+'\',\''+nContainer+'\')"></span>';
	<?php }?>
	
	<?php if ($xalkyConfig['textStyles']){?>
	document.getElementById(ndiv).innerHTML += '<span alt="'+lang54+'" title="'+lang54+'" id="style" class="iconStyle" onmouseover="this.className=\'iconStyleOver\'" onmouseout="this.className=\'iconStyle\'" onclick="xalkyStyles(\''+nBar+'\',\''+nContainer+'\',\''+nWin+'\');"></span>';
	<?php }?>
	
	<?php if ($xalkyConfig['userAvatars']){?>
	document.getElementById(ndiv).innerHTML += '<span alt="'+lang55+'" title="'+lang55+'" id="avatar" class="iconAvatar" onmouseover="this.className=\'iconAvatarOver\'" onmouseout="this.className=\'iconAvatar\'" onclick="xalkyAvatars(\''+nBar+'\',\''+nContainer+'\',\''+nWin+'\')"></span>';
	<?php }?>
	
	if(xalkySFX[0])
	{
		<?php if ($xalkyConfig['playSFX']){?>
		document.getElementById(ndiv).innerHTML += '<span alt="'+lang56+'" title="'+lang56+'" id="sounds" class="iconSounds" onmouseover="this.className=\'iconSoundsOver\'" onmouseout="this.className=\'iconSounds\'" onclick="xalkySFX(\''+nBar+'\',\''+nContainer+'\',\''+nWin+'\')"></span>';
		<?php }?>
	}

	if(ndiv.search("pmenuBar_"))
	{
		<?php if ($xalkyConfig['clearScreen']){?>
		document.getElementById(ndiv).innerHTML += '<span alt="'+lang57+'" title="'+lang57+'" id="rubber" class="iconRubber" onmouseover="this.className=\'iconRubberOver\'" onmouseout="this.className=\'iconRubber\'" onclick=\'xalkyClearScreen();\'></span>';
		<?php }?>
		
		<?php if ($xalkyConfig['userSettings']){?>
		document.getElementById(ndiv).innerHTML += '<span alt="'+lang58+'" title="'+lang58+'" id="edit" class="iconEdit" onmouseover="this.className=\'iconEditOver\'" onmouseout="this.className=\'iconEdit\'" onclick=\'xalkyEditSettings();\'></span>';
		<?php }?>
	}
	
	<?php if ($xalkyConfig['chatHistory']){?>
	document.getElementById(ndiv).innerHTML += '<span alt="'+lang59+'" title="'+lang59+'" id="transcripts" class="iconTranscripts" onmouseover="this.className=\'iconTranscriptsOver\'" onmouseout="this.className=\'iconTranscripts\'" onclick=\'xalkyShowBox("viewTranscripts","400","600","100","index.php?transcripts=1&roomID="+roomID,"");\'></span>';
	<?php }?>
	
	<?php if ($xalkyConfig['chatHelp']){?>
	document.getElementById(ndiv).innerHTML += '<span alt="'+lang60+'" title="'+lang60+'" id="help" class="iconHelp" onmouseover="this.className=\'iconHelpOver\'" onmouseout="this.className=\'iconHelp\'" onclick=\'xalkyNewWindow("help/index.php")\'></span>';
	<?php }?>
		
	<?php if(file_exists("../plugins/share/index.php")){ ?>
	document.getElementById(ndiv).innerHTML += '<span alt="'+lang62+'" title="'+lang62+'" id="share" class="iconShare" onmouseover="this.className=\'iconShareOver\'" onmouseout="this.className=\'iconShare\'" onclick=\'xalkyShowBox("shareFiles","280","300","260","plugins/share/","");\'></span>';
	<?php }?>
	
	<?php if(file_exists("../plugins/games/index.php")){ ?>
	document.getElementById(ndiv).innerHTML += '<span alt="'+lang61+'" title="'+lang61+'" id="playGames" class="iconGames" onmouseover="this.className=\'iconGamesOver\'" onmouseout="this.className=\'iconGames\'" onclick=\'xalkyShowBox("games","370","418","260","plugins/games/","");\'></span>';	
	<?php }?>
	
	/* do not edit */
	if(showCopyright)
	{
		document.getElementById(ndiv).innerHTML += '<span alt="'+lang63+'" title="'+lang63+'" id="copyright" class="iconCopyright" onmouseover="this.className=\'iconCopyrightOver\'" onmouseout="this.className=\'iconCopyright\'" onclick=\'xalkyShowBox("xalkyCopyright","220","300","200","",xalkyCopyright());\'></span>';
	}
}

/*
 * create edit div
 *
 */
function xalkyEditSettings()
{
	// if div does not exist
	if(!document.getElementById("editDiv"))
	{
		// create div
		var ni = document.getElementById('settingsWin');
		var newdiv = document.createElement('editDiv');

		newdiv.setAttribute("id","editDiv");
		newdiv.className = "editWin";
		newdiv.innerHTML  = '<div style="text-align:right;" class="roomheader" onclick="xalkyToogleBox(\'editDiv\')"><img src="<?php $xalkyConfig['chatroomUrl']; ?>/assets/images/close.gif"></div>';		
		newdiv.innerHTML += '<div>&nbsp;</div>';
		newdiv.innerHTML += '<div><input type="checkbox" id="allowPM" onclick="xalkyUpdateSettings()"> '+lang46+'&nbsp;</div>';
		newdiv.innerHTML += '<div><input type="checkbox" id="viewMyCamID" onclick="xalkyUpdateSettings()"> '+lang47+'&nbsp;</div>';
		newdiv.innerHTML += '<div><input type="checkbox" id="entryExitID" onclick="xalkyUpdateSettings()"> '+lang48+'&nbsp;</div>';
		newdiv.innerHTML += '<div><input type="checkbox" id="soundsID" onclick="xalkyUpdateSettings()"> '+lang49+'&nbsp;</div>';
		newdiv.innerHTML += '<div><input type="checkbox" id="sfxID" onclick="xalkyUpdateSettings()"> '+lang50+'&nbsp;</div>';
		newdiv.innerHTML += '<div><input type="checkbox" id="userAvatarsON" onclick="xalkyUpdateSettings()"> Display User Avatars&nbsp;</div>';			
		newdiv.innerHTML += '<div><input type="checkbox" id="userMessStyle" onclick="xalkyUpdateSettings()"> Modern Message Style&nbsp;</div>';	
		newdiv.innerHTML += '<div>&nbsp;</div>';
		newdiv.innerHTML += '<div>&nbsp;</div>';
		newdiv.innerHTML += '<div>&nbsp;'+lang51+': <select id="selectStatusID" onchange="xalkySendStatus(this.value);"></select></div>';
		newdiv.innerHTML += '<div>&nbsp;</div>';

		ni.appendChild(newdiv);
	}
	else
	{
		document.getElementById("editDiv").style.visibility = 'visible';
	}

	xalkyStatusSelectOptions();
}

/*
 * update user settings
 *
 */
function xalkyUpdateSettings()
{
	userRPM = document.getElementById('allowPM').checked;
	userRWebcam = document.getElementById('viewMyCamID').checked;
	userEntryExitSFX = document.getElementById('entryExitID').checked;
	userNewMessageSFX = document.getElementById('soundsID').checked;
	userSFX = document.getElementById('sfxID').checked;
	userAvatarsON = document.getElementById('userAvatarsON').checked;
	userMessStyle = document.getElementById('userMessStyle').checked;	

	xalkyCreateCookie('xalkyOptions',encodeURI(userRPM+"|"+userRWebcam+"|"+userEntryExitSFX+"|"+userNewMessageSFX+"|"+userSFX+"|"+userAvatarsON+"|"+userMessStyle),30);
}

/*
 * switch settings status
 *
 */
function xalkySwitchStatus(value,div)
{
	if(value == 'false' || value == false)
	{
		var newStatus = false;
	}
	else
	{
		var newStatus = true;
	}

	document.getElementById(div).checked = newStatus;
}

/*
 * create menu div
 *
 */
function xalkyCreateMessage(ndiv,nWin)
{
	if(document.getElementById(ndiv))
	{
		var el = document.getElementById(ndiv);
		el.parentNode.removeChild(el);
	}

	if(!document.getElementById(ndiv))
	{
		document.getElementById(nWin).innerHTML  += '<div id="'+ndiv+'" class="'+ndiv+'"></div>';
	}
}

/*
 * close menu div
 *
 */
function xalkyCloseMessage(ndiv)
{
	if(document.getElementById(ndiv))
	{
		var el = document.getElementById(ndiv);
		el.parentNode.removeChild(el);
	}
}

/*
 * create menu - (using all js array values)
 * 
 */
var nClass = '';
function xalkyCreateMenu(inputMDiv,displayMDiv,ndiv,ntotal,nloop)
{
	var i=0;
	var iLoop = 1;

	document.getElementById(ndiv).innerHTML = '';

	document.getElementById(ndiv).innerHTML = '<div style="text-align:right;" class="roomheader" onclick=xalkyCloseMessage("'+ndiv+'")><img src="images/close.gif"></div>';

	if(ndiv == 'avatarsWin')
	{
		// create custom avatar upload div
		document.getElementById(ndiv).style.width = "320px";		
		
		var ni = document.getElementById(ndiv);
		var newdiv = document.createElement('iframe');
			newdiv.setAttribute("id","xalkyAvatarUpload");
			newdiv.src = "avatars/upload.php";
			newdiv.height="140";
			newdiv.width="310";
			newdiv.frameBorder="0";
			
		ni.appendChild(newdiv);		
		
		document.getElementById(ndiv).innerHTML += "<br/>";
		document.getElementById(ndiv).innerHTML += "OR, choose a default avatar below,";		
		document.getElementById(ndiv).innerHTML += "<br/><br/>";
	}
	
	for (i = 0; i <= ntotal; i++)
	{
		if(ndiv == 'smiliesWin' && xalkySmilies[i])
		{
			document.getElementById(ndiv).innerHTML += '<span onclick=xalkyAddSmiley("'+inputMDiv+'","'+xalkySmilies[i]+'");xalkyToogleBox("'+ndiv+'"); title="'+xalkySmilies[i]+'" alt="'+xalkySmilies[i]+'"/>'+xalkySmiliesImg[i]+'</span>';
		}

		if(ndiv == 'avatarsWin')
		{
			var showAvatar = 1;
		
			if(xalkyAvatars[i] == 'pc.gif')
			{
				var showAvatar = 0;
			}
			
			if(xalkyAvatars[i] == 'phone.gif')
			{
				var showAvatar = 0;
			}
			
			if(xalkyAvatars[i] == '')
			{
				var showAvatar = 0;
			}			
			
			if(showAvatar)
			{
				document.getElementById(ndiv).innerHTML += '<span style="padding: 2px 2px 2px 2px;" onclick="xalkyAddAvatar(\''+inputMDiv+'\',\''+xalkyAvatars[i]+'\');xalkyUpdateAvatar(\''+userID+'\', \''+xalkyAvatars[i]+'\');xalkySendAvatar();" /><img src="avatars/'+xalkyAvatars[i]+'"></span>';
			}
		}

		if(ndiv == 'fontfamilyWin')
		{
			nClass = 'highliteOff';

			if(xalkyFontFamily[i] == textFamily)
			{
				nClass = 'highliteOn';
			}

			document.getElementById(ndiv).innerHTML += '<div class="'+nClass+'" onmouseover="this.className=\'highliteOn\'" onmouseout="this.className=\'highliteOff\'" style="font-family:'+xalkyFontFamily[i]+'" alt="'+xalkyFontFamily[i]+'" title="'+xalkyFontFamily[i]+'" onclick="xalkyAddFontFamily(\''+xalkyFontFamily[i]+'\');xalkyChangeMessageStyle(\''+inputMDiv+'\');" />'+xalkyFontFamily[i]+'</div>';

			nClass = '';
		}

		if(ndiv == 'fontsizeWin')
		{
			nClass = 'highliteOff';

			if(xalkyFontSize[i].toLowerCase() == textSize.toLowerCase())
			{
				nClass = 'highliteOn';
			}

			if(mBold == 1)
			{
				document.getElementById(ndiv).style.fontWeight="900";	
			}

			if(mUnderline == 1)
			{
				document.getElementById(ndiv).style.textDecoration="underline";	
			}

			if(mItalic == 1)
			{
				document.getElementById(ndiv).style.fontStyle="italic";	
			}

			document.getElementById(ndiv).style.colour = textColour;

			document.getElementById(ndiv).innerHTML += '<div class="'+nClass+'" onmouseover="this.className=\'highliteOn\'" onmouseout="this.className=\'highliteOff\'" style="font-size:'+xalkyFontSize[i]+';" alt="'+xalkyFontSize[i]+'" title="'+xalkyFontSize[i]+'" onclick="xalkyAddFontSize(\''+xalkyFontSize[i]+'\');xalkyChangeMessageStyle(\''+inputMDiv+'\');" />'+lang2+'</div>';

			nClass = '';
		}

		if(ndiv == 'coloursWin')
		{
			document.getElementById(ndiv).innerHTML += '<span style="padding: 2px 2px 2px 2px;background-colour:'+xalkyColour[i]+'" alt="'+xalkyColour[i]+'" title="'+xalkyColour[i]+'" onclick="xalkyAddColour(\''+xalkyColour[i]+'\');xalkyChangeMessageStyle(\''+inputMDiv+'\');" />&nbsp;</span>';
		}

		if(ndiv == 'sFXWin')
		{
			document.getElementById(ndiv).innerHTML += '<div class="highliteOff" onmouseover="this.className=\'highliteOn\'" onmouseout="this.className=\'highliteOff\'"><img src="sounds/sfx/speaker.gif" onclick="xalkySound(\'sfx/'+xalkySFX[i]+'\');" alt="'+lang3+'" title="'+lang3+'">&nbsp;<span style="padding: 2px 2px 2px 2px;" onclick="xalkyAddSFX(\''+inputMDiv+'\',\''+displayMDiv+'\',\''+xalkySFX[i].replace(/.mp3/i,"")+'\');"/>'+xalkySFX[i].replace(/.mp3/i,"")+'</span></div>';
		}

		if(iLoop >= nloop)
		{
			if(ndiv != 'fontfamilyWin' && ndiv != 'fontsizeWin' && ndiv != 'sFXWin')
			{
				document.getElementById(ndiv).innerHTML += '<br />';
			}

			iLoop = 0;

		}

		iLoop += 1;
	}

	if(ndiv == 'fontfamilyWin')
	{
		var isBoldChecked = '';
		var isUnderlineChecked = '';
		var isItalicChecked = '';

		if(mBold == 1)
		{
			isBoldChecked = 'checked';
		}

		document.getElementById(ndiv).innerHTML += '<span class="highliteOff" onmouseover="this.className=\'highliteOn\'" onmouseout="this.className=\'highliteOff\'" /><input type="checkbox" id="bold" onclick="xalkyAddFontBold();xalkyChangeMessageStyle(\''+inputMDiv+'\');" '+isBoldChecked+'><b>B</b></span>';

		if(mUnderline == 1)
		{
			isUnderlineChecked = 'checked';	
		}

		document.getElementById(ndiv).innerHTML += '<span class="highliteOff" onmouseover="this.className=\'highliteOn\'" onmouseout="this.className=\'highliteOff\'" /><input type="checkbox" id="underline" onclick="xalkyAddFontUnderline();xalkyChangeMessageStyle(\''+inputMDiv+'\');" '+isUnderlineChecked+'><u>U</u></span>';

		if(mItalic == 1)
		{
			isItalicChecked = 'checked';	
		}

		document.getElementById(ndiv).innerHTML += '<span class="highliteOff" onmouseover="this.className=\'highliteOn\'" onmouseout="this.className=\'highliteOff\'" /><input type="checkbox" id="italic" onclick="xalkyAddFontItalic();xalkyChangeMessageStyle(\''+inputMDiv+'\');" '+isItalicChecked+'><i>I</i></span>';
	}

}

/*
 * update message box text style
 *
 */
function xalkyChangeMessageStyle(div)
{
	document.getElementById(div).style.colour = textColour;
	document.getElementById(div).style.fontFamily = textFamily;
	document.getElementById(div).style.fontSize = textSize;

	document.getElementById(div).style.fontWeight= "normal";
		document.getElementById(div).style.fontStyle= "normal";
	document.getElementById(div).style.textDecoration = "none";

	if(mBold == 1)
	{
		document.getElementById(div).style.fontWeight= "bold";
	}

	if(mItalic == 1)
	{
		document.getElementById(div).style.fontStyle= "italic";
	}

	if(mUnderline == 1)
	{
		document.getElementById(div).style.textDecoration = "underline";
	}


}

/*
 * add smilie to message 
 *
 */
function xalkyAddSmilie(nSmilie)
{
	for (i = 0; i <= totalSmilies; i++)
	{
		nSmilie = nSmilie.split(xalkySmilies[i]).join(xalkySmiliesImg[i]);
	}

	return nSmilie;
}

/*
 * add smilie to messagebar 
 *
 */
function xalkyAddSmiley(inputMDiv,code)
{
	var pretext = document.getElementById(inputMDiv).value;
	this.code = code;
	document.getElementById(inputMDiv).focus();
	document.getElementById(inputMDiv).value = pretext + code;
}

/*
 * update users avatar 
 *
 */
function xalkyAddAvatar(inputMDiv,nAvatar)
{
	// update avatar
	userAvatar = nAvatar;

	// close avatar window
	xalkyToogleBox("avatarsWin");

	// focus message input
	document.getElementById(inputMDiv).focus();
}

/*
 * play SFX 
 *
 */
function xalkyAddSFX(inputMDiv,displayMDiv,sfx)
{
	// clear message input
	document.getElementById(inputMDiv).value = '';

	// add SFX to message input
	document.getElementById(inputMDiv).value = '/play '+sfx;

	// send message
	xalkyAddMessage(inputMDiv,displayMDiv);

	// close SFX window
	xalkyToogleBox('sFXWin');
		
}

/*
 * update selected Font Colour
 *
 */
function xalkyAddColour(nColour)
{
	// update avatar
	textColour = nColour;

	// update text sample window
	document.getElementById("fontsizeWin").style.colour=nColour;
}

/*
 * update selected Font Family
 *
 */
function xalkyAddFontFamily(nFont)
{
	// update font family
	textFamily = nFont;

	// update text sample window
	document.getElementById("fontsizeWin").style.fontFamily=nFont;
}

/*
 * update selected Font Size
 *
 */
function xalkyAddFontSize(nSize)
{
	// update font size
	textSize = nSize;
}
 
/*
 * update Bold for user text 
 *
 */
function xalkyAddFontBold()
{
	if(mBold == 0)
	{
		mBold = 1;

		// update text sample window
		document.getElementById("fontsizeWin").style.fontWeight="900";
	}
	else
	{
		mBold = 0;

		// update text sample window
		document.getElementById("fontsizeWin").style.fontWeight="normal";
	}

}

/*
 * update Underline for user text 
 *
 */
function xalkyAddFontUnderline()
{
	if(mUnderline == 0)
	{
		mUnderline = 1;

		// update text sample window
		document.getElementById("fontsizeWin").style.textDecoration="underline";
	}
	else
	{
		mUnderline = 0;

		// update text sample window
		document.getElementById("fontsizeWin").style.textDecoration="none";
	}

}

/*
 * update Italic for user text 
 *
 */
function xalkyAddFontItalic()
{
	if(mItalic == 0)
	{
		mItalic = 1;

		// update text sample window
		document.getElementById("fontsizeWin").style.fontStyle="italic";
	}
	else
	{
		mItalic = 0;

		// update text sample window
		document.getElementById("fontsizeWin").style.fontStyle="normal";
	}

}

/*
 * flood control
 *
 */
var lastPost = 1;
function xalkyFlooding()
{
	lastPost++;	
}
setInterval('xalkyFlooding();','1000');

/*
 * xalkyLogout user
 *
 */
function xalkyLogout(id)
{
	<?php 
	$room = '';
	
	if(isset($_SESSION['room']) && $xalkyConfig['singleRoom'])
	{
		$room = "roomID=".$_SESSION['room']."&";
	}
	?>
	
	window.location.replace("<?php $xalkyConfig['chatroomUrl']; ?>/index.php?<?php echo $room;?>xalkyLogout");
}

/*
 * create status select list
 *
 */
function xalkyStatusSelectOptions()
{
	var sel = document.getElementById('selectStatusID');

	var i = 0;

	for (i = 0; i < userStatusMes.length; i++)
	{
		if(!document.getElementById("selectStatusID_"+i))
		{
			var opt = document.createElement("option");
			opt.setAttribute("id","selectStatusID_"+i);
			opt.value = i;
			opt.text = decodeURI(userStatusMes[i]);

			if(opt.value == '1')
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

}

/*
 * update status
 *
 */
function xalkySendStatus(status)
{
	var param = '?';
	param += '&status=' + encodeURI(status);	

	// if ready to send message to DB
	if (sendReq.readyState == 4 || sendReq.readyState == 0) 
	{
		sendReq.open("POST", '<?php $xalkyConfig['chatroomUrl']; ?>/outbound.xml?rnd='+ Math.random(), true);
		sendReq.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		sendReq.onreadystatechange = xalkySendChat;
		sendReq.send(param);
	}

}

/*
 * send avatar to database
 *
 */
function xalkySendAvatar()
{
	var param = '?';
	param += '&uavatar=' + encodeURI(userAvatar);	

	// if ready to send message to DB
	if (sendReq.readyState == 4 || sendReq.readyState == 0) 
	{
		sendReq.open("POST", '<?php $xalkyConfig['chatroomUrl']; ?>/outbound.xml?rnd='+ Math.random(), true);
		sendReq.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		sendReq.onreadystatechange = xalkySendChat;
		sendReq.send(param);
	}

}

/*
 * block/unblock user
 *
 */
function xalkyBlockUsers(i,id)
{
	if(i=='block')
	{
		blockedList = blockedList + "|"+id+"|";
	}

	if(i=='unblock')
	{
		blockedList = blockedList.replace("|"+id+"|","");
	}

	var param = '?';
	param += '&xalkyBlockList=' + encodeURI(blockedList);	

	// if ready to send message to DB
	if (sendReq.readyState == 4 || sendReq.readyState == 0) 
	{
		sendReq.open("POST", '<?php $xalkyConfig['chatroomUrl']; ?>/outbound.xml?rnd='+ Math.random(), true);
		sendReq.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		sendReq.onreadystatechange = xalkySendChat;
		sendReq.send(param);
	}
}

/*
 * show/hide password field
 * used on login page
 */
var y = 1;
function xalkyLoginPassword()
{
	if(y)
	{
		var state = 'hidden';
		y = 0;	
	}
	else
	{
		var state = 'visible';
		y = 1;	
	}

	document.getElementById("pass").style.visibility = state;
	document.getElementById("lostpass").style.visibility = state;
}

/*
 * open new window
 *
 */
function xalkyNewWindow(url)
{
	window.open(url,'','');
}

/*
 * clear screen
 *
 */
function xalkyClearScreen()
{
	document.getElementById("chatContainer").innerHTML = '';
}

/*
 * show info box
 * xalkyShowBox("div name","height","width","top","url to file","text to display")
 * example: xalkyShowBox("lost","200","300","200","templates/default/lost.php","");
 * example: xalkyShowBox("system","200","300","200","","some text goes here");
 */
function xalkyShowBox(info,height,width,top,url,txt)
{
	// delete div if exists
	if(document.getElementById('oInfo'))
	{
		xalkyCloseMessage(info);
	}

	// create div
	var ni = document.getElementById('oInfo');

	if(url)
	{
		var newdiv = document.createElement('iframe');
		newdiv.frameBorder="0";
		newdiv.src = url;
	}
	
	if(info == 'games')
	{
		var newdiv = document.createElement('div');
		newdiv.innerHTML  = "<div class=\"userInfoTitle\" style=\"cursor:move;\"><b>"+lang61+"</b><span style='float:right;cursor:pointer;'><img src='images/close.gif' onclick='xalkyCloseMessage(\""+info+"\");'></span></div>";
		newdiv.innerHTML += "<div><iframe style='border:0;' src='"+url+"' width='"+(width)+"' height='"+(height-40)+"'></div>";	
	}
	
	if(info == 'shareFiles')
	{
		var newdiv = document.createElement('div');
		newdiv.innerHTML  = "<div class=\"userInfoTitle\" style=\"cursor:move;\"><b>"+lang62+"</b><span style='float:right;cursor:pointer;'><img src='images/close.gif' onclick='xalkyCloseMessage(\""+info+"\");'></span></div>";
		newdiv.innerHTML += "<div><iframe style='border:0;' src='"+url+"' width='"+(width)+"' height='"+(height-36)+"'></div>";	
	}

	if(info == 'viewTranscripts')
	{
		var newdiv = document.createElement('div');
		newdiv.innerHTML  = "<div class=\"userInfoTitle\" style=\"cursor:move;\"><b>"+lang59+"</b><span style='float:right;cursor:pointer;'><img src='images/close.gif' onclick='xalkyCloseMessage(\""+info+"\");'></span></div>";
		newdiv.innerHTML += "<div><iframe style='border:0;' src='"+url+"' width='"+(width)+"' height='"+(height-36)+"'></div>";	
	}	

	if(txt)
	{
		var newdiv = document.createElement('div');
		newdiv.innerHTML  = "<div class=\"userInfoTitle\" style=\"padding-top:3px;cursor:move;\"><b>"+lang4+"</b><span style='float:right;cursor:pointer;'><img src='images/close.gif' onclick='xalkyCloseMessage(\""+info+"\");'></span></div>";
		newdiv.innerHTML += "<div style=\"min-height:135px;padding-top:10px;\">"+txt+"</div>";
		newdiv.innerHTML += "<div><input class=\"button\" type=\"button\" name=\"close\" value=\"Close Window\" onclick='xalkyCloseMessage(\""+info+"\");'></div>";
	}

	newdiv.setAttribute("id",info);
	newdiv.className = "innerInfo";
	newdiv.style.height = height+"px";
	newdiv.style.width = width+"px";
	newdiv.style.top = top+"px";
	
	if(info == 'games' || info == 'shareFiles')
	{
		newdiv.style.overflow = "hidden";	
	}
	
	ni.appendChild(newdiv);

	document.getElementById("oInfo").style.visibility = "visible";
	document.getElementById(info).style.visibility = "visible";
	
	$( "#oInfo" ).draggable();
}
	
/*
 * copyright
 *
 */
function xalkyCopyright()
{
	var html = '';
		html += '<div style="text-align:left;padding-left:15px;padding-top:5px;padding-bottom:5px;">';
		html += 'Software: Xalky Chat-Rooms<br>';
		html += 'Version: '+version+'<br>';
		html += 'Developers: Simon Roberts<br><br>';
		html += 'Visit: <a href="http://labs.coop" target="_blank">http://labs.coop</a><br>';
		html += 'Support: <a href="https://sourceforge.net/projects/chronolabs" target="_blank">https://sourceforge.net/projects/chronolabs</a><br><br>';
		html += 'Copyright (&copy;) 2016-'+new Date().getFullYear()+' ~ All Rights Reserved.';
		html += '</div>';

	return html;
}