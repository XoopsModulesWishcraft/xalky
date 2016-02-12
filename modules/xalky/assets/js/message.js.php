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

require_once(dirname(dirname(__DIR__))."/includes/config.php");

/**
 * Declare header
*/

header("content-type: application/x-javascript");

?>
/**
 * Xalky - Javascript Messaging - XOOPS Chat Rooms
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
 * add message
 *
 */

var message;
var isPrivate = '';
var hideAdmins = 1;
var autoApprove = 1;
var lastMessageTxt = '';

function xalkyAddMessage(inputMDiv,displayMDiv)
{
	if(digitalCredits == '1' && displayMDiv.search(/pcontent_/i) != '-1')
	{
		var digitalCreditCount = document.getElementById('digitalCreditsID').innerHTML;

		if(digitalCreditCount <= 0)
		{
			/* create messages */
			var digitalCreditMessageA = "You have 0 digitalCredits left. Please purchase more digitalCredits to continue this private conversation.";
			var digitalCreditMessageB = " has 0 digitalCredits left.";
		
			/* show sender 'you have no ecredits' */
			message = "../images/notice.gif|"+stextColour+"|"+stextSize+"|"+stextFamily+"|"+digitalCreditMessageA+"|1";
			xalkyMessageDIV('1',userID,displayMDiv,showMessages+1,message,'beep_high.mp3','','');
			
			/* show receiver that 'sender has no ecredits' */			
			message = "../images/notice.gif|"+stextColour+"|"+stextSize+"|"+stextFamily+"|"+digitalCreditMessageB+"|1";
			
			/* send data */
			outbound(displayMDiv);

			/* clear message input field */
			xalkyClearInput(inputMDiv);
			return false;
		}
	}
	
	if(groupChat == 0)
	{
		xalkyShowBox("system","220","300","200","",lang6);
		return false;		
	}

	if(groupPrivateChat == 0 && document.getElementById('whisperID').value != '')
	{
		xalkyShowBox("system","220","300","200","",lang6);
		return false;		
	}

	if(isSilenced == 1)
	{
		xalkyShowBox("system","220","300","200","",lang7+" "+silent+" "+lang8);
		return false;
	}

	if(moderatedXalky == 1)
	{
		autoApprove = 0;

		if(admin || moderator || speaker)
		{
			autoApprove = 1;	
		}

		if(autoApprove == 0)
		{
			xalkyShowBox("system","220","300","200","",lang9);
		}
	}

	// if user is trying to flood the chat room
	if(lastPost < floodXalky)
	{
		xalkyShowBox("system","220","300","200","",lang10);
		return false;
	}
	
	// default sfx
	sfx = 'beep_high.mp3';

	// get user message
	message = document.getElementById(inputMDiv).value;
	
	message = message.replace(/&/gi,"&amp;");
	message = message.replace(/</gi,"&#60;");
	message = message.replace(/>/gi,"&#62;");
	message = message.replace(/`/gi,"&#96;");
	message = message.replace(/'/gi,"&#39;");
	message = message.replace(/"/gi,"&#34;");
	message = message.replace(/%/gi,"&#37;");
	message = message.replace(/\|/gi,"&#127;");

	// if usergroup cannot post videos
	if(groupVideo == 0 && message.indexOf("http://youtu.be/") != -1)
	{
		xalkyShowBox("system","220","300","200","",lang6);
		return false;		
	}

	// check message length
	if(message.length > <?php echo $xalkyConfig['maxChars'];?>)
	{
		var maxChars  = "Your message contains <span style='colour:red;'>"+message.length+"</span> characters, please shorten your message.";
		    maxChars += "<br><br>";				
		    maxChars += "Max Allowed Characters: <span style='colour:green;'><?php echo $xalkyConfig['maxChars'];?></span>";
		
		xalkyShowBox("system","220","300","200","",maxChars);
		return false;
	}
	
	// anti spam filter for repeated messages
	if(message == lastMessageTxt)
	{
		var antiSpam  = "Sorry, your message has been marked as spam and will not be sent. Please do not send the same message repeatedly.";
			
		xalkyShowBox("system","220","300","200","",antiSpam);
		return false;
	}	

	lastMessageTxt = message;
	
	// filter badwords in message
	message = filterBadword(message);	

	// check whisper contains a message
	if(message.replace(/\s/g,"") == "")
	{
		xalkyShowBox("system","220","300","200","",lang11);
		return false;
	}	

	var mStatus = 0;
	var iRC = '';

	// IRC commands
	ircCommand = message.split(" ");

	// IRC action
	if(ircCommand[0] == '/me')
	{
		message  = " " + message.slice(ircCommand[0].length+1) + " ...";

		iRC = '1';
	}

	// IRC broadcast
	if(ircCommand[0] == '/broadcast')
	{
		if(admin || moderator)
		{
			sfx = 'beep_high.mp3';

			message  = "BROADCAST " + encodeURI(message.slice(ircCommand[0].length));

			iRC = '1';
		}
		else
		{
			xalkyShowBox("system","220","300","200","",lang45);
			return false;
		}
	}

	// IRC ringbell
	if(ircCommand[0] == '/ringbell')
	{
		sfx = 'ringbell.mp3';

		message  = message.slice(ircCommand[0].length+1) + " "+lang12+" ... ";

		iRC = '1';
	}

	// IRC sfx
	if(ircCommand[0] == '/play')
	{
		// check /play contains a SFX 
		if(!ircCommand[1] || ircCommand[1].replace(/\s/g,"") == "")
		{
			xalkyShowBox("system","220","300","200","",lang13);
			return false;
		}

		// check the SFX exists
		// convert SFX array to string then search string for match
		if(xalkySFX.toString().lastIndexOf(ircCommand[1]+".mp3") == -1)
		{
			xalkyShowBox("system","200","300","200","",lang14);

			// display SFX window
			// now user can choose from list
			createSFX();xalkyToogleBox('sFXWin');

			return false;
		}

		sfx = "sfx/"+ircCommand[1]+".mp3";

		message  = "** "+message.slice(ircCommand[0].length+1)+" **";

	}

	// IRC roll dice
	if(ircCommand[0] == '/roll')
	{
		// check /roll contains dice (eg. 2d4) 
		if(!ircCommand[1] || ircCommand[1].replace(/\s/g,"") == "")
		{
			xalkyShowBox("system","220","300","200","",lang15);
			return false;
		}

		var diceRoll = ircCommand[1].split("d");

		var x = 1;
		var totalRoll = 0;
		var diceScore = 0;
		var diceModifier = '';
		var singleRoll = new Array();

		// roll each dice
		for (x = 1; x <= diceRoll[0]; x++)
		{
			singleRoll[x-1] = Math.floor(Math.random()*diceRoll[1]+1)
		}

		// add total of all dice rolled
		for (x = 0; x < singleRoll.length; x++)
		{
			totalRoll += Math.floor(singleRoll[x]);
		}

		// include dice modifier
		if(Number(ircCommand[2]))
		{
			diceModifier = Number(ircCommand[2]);
		}

		// format result
		diceScore = "( Result: "+singleRoll+", "+diceModifier+" Total: "+Number(totalRoll+diceModifier)+" )";

		message = message +" "+diceScore;

	}

	// add bold font
	if(mBold == 1)
	{
		message = "[b]"+message+" [/b]";
	}

	// add italic font
	if(mItalic == 1)
	{
		message = "[i]"+message+" [/i]";
	}

	// add italic font
	if(mUnderline == 1)
	{
		message = "[u]"+message+" [/u]";
	}

	// search message for line breaks
	var addLineBreaks = 0;
	if(message.search(/(\r\n|\n|\r)/gm) != '-1')
	{
		addLineBreaks = 1;
	}

	// IRC whisper
	if(document.getElementById('whisperID').value != '')
	{
		isPrivate = document.getElementById('whisperID').value;

		sfx = 'beep_high.mp3';

		message  = " &#187; " + encodeURI(isPrivate) + ": " + encodeURI(message);

		iRC = '1';
	}
	
	message = userAvatar+"|"+textColour+"|"+textSize+"|"+textFamily+"|"+message+"|"+iRC+"|"+addLineBreaks;

	// update users text style (cookie)
	xalkyCreateCookie('xalkyTextStyle',encodeURI(mBold+"|"+mItalic+"|"+mUnderline+"|"+textColour+"|"+textSize+"|"+textFamily),30);

	// send data to database
	outbound(displayMDiv);

	// create message
	if(autoApprove)
	{
		xalkyMessageDIV(mStatus, userID, displayMDiv, showMessages+1, message, sfx, userName, '','');
	}

	// clear message input field
	xalkyClearInput(inputMDiv);

	// restart flood counter
	lastPost = 1;
	
	// create bot reponse
	if(sentryBot == 1 && Number(sentryBotRoomID) == Number(roomID) && displayMDiv == 'chatContainer')
	{
		xalkySentryBot(message,userName);
	}	

}

/*
 * send message to database
 *
 */
var sendReq = getXmlHttpRequestObject();
function outbound(displayMDiv)
{
	message = message.replace(/\+/gi,"&#43;");

	var param = '?';

	param += '&userID=' + userID;
	param += '&umid=' + displayMDiv;
	param += '&uroom=' + roomID;
	param += '&uname=' + encodeURI(userName);
	param += '&toname=' + encodeURI(isPrivate);
	param += '&umessage=' + encodeURIComponent(message);
	param += '&usfx=' + escape(sfx);	

	// if ready to send message to DB
	if (sendReq.readyState == 4 || sendReq.readyState == 0) 
	{
		sendReq.open("POST", '<?php $xalkyConfig['chatroomUrl']; ?>/outbound.php?rnd='+ Math.random(), true);
		sendReq.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		sendReq.onreadystatechange = xalkySendChat;
		sendReq.send(param);
	}

	// reset isPrivate 
	isPrivate = '';

}

/*
 * send avatar to database
 *
 */
function xalkySendAvatar()
{
	var param = '?';

	param += '&uname=' + encodeURI(userName);
	param += '&uavatar=' + escape(userAvatar);	

	// if ready to send message to DB
	if (sendReq.readyState == 4 || sendReq.readyState == 0) 
	{
		sendReq.open("POST", '<?php $xalkyConfig['chatroomUrl']; ?>/outbound.php?rnd='+ Math.random(), true);
		sendReq.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		sendReq.onreadystatechange = xalkySendChat;
		sendReq.send(param);
	}

}

function xalkySendChat()
{
	// empty
}

/*
 * get message from database
 *
 */
var receiveMesReq = getXmlHttpRequestObject();
var showHistory = 1;
function xalkyGetMessages() 
{
	var singleRoom = '';

	if(totalRooms == '1')
	{
		singleRoom = roomID;
	}

	if (receiveMesReq.readyState == 4 || receiveMesReq.readyState == 0) 
	{
		receiveMesReq.open("GET", '<?php $xalkyConfig['chatroomUrl']; ?>/inbound.php?roomID='+roomID+'&history='+showHistory+'&last='+lastMessageID+'&s='+singleRoom+'&rnd='+ Math.random(), true);
		receiveMesReq.onreadystatechange = xalkyMessages; 
		receiveMesReq.send(null);
	}
			
}

// function for handling the messages

var mTimer = setInterval('xalkyGetMessages();',refreshRate);
var xmlError = 0;
var roomNameStr;
var digitalCredits = 0;
var moderatedXalky = 0;

function xalkyMessages() 
{
	if (receiveMesReq.readyState == 4) 
	{
		var xmldoc = receiveMesReq.responseXML;

		if(xmldoc == null)
		{
			if(xmlError < 3)
			{
				if(xmlError == 2)
				{
					// if error, alert user and try to reconnect to database
					xalkyShowBox("system","200","300","200","",lang16);
				}

				// update the error count
				xmlError += 1;

				// lets try and get the data again
				xalkyGetMessages();
				return false;
			}
			else
			{
				// oops, connection has now failed 3 times
				// this could be for the following reasons,
				// a) incorrect data file name
				// b) database not responding
				// c) server under too much load to respond in time
				xalkyShowBox("system","220","300","200","",lang17);
				return false;
			}
		}		

		// userroom data
		roomNameStr = '';
		
		for (var i = 0; i < xmldoc.getElementsByTagName("userrooms").length;)
		{
			// for each room
			var userRooms = xmldoc.getElementsByTagName("userrooms")[i].childNodes[0].nodeValue;
			
			// split message data
			var userRoomsArray = userRooms.split("||");

			// moderated chat
			moderatedXalky = userRoomsArray[6];

			xalkyCreateSelectRoomDIV(
						userRoomsArray[2], 
						userRoomsArray[1],
						userRoomsArray[5]
					);

			xalkyCreateRoomDIV(
						userRoomsArray[2], 
						userRoomsArray[1],
						userRoomsArray[5]
					);

			// create room name str
			roomNameStr = roomNameStr + "|" + userRoomsArray[2].toLowerCase() + "|";

			// if room is deleted, remove from userlist and select box
			if(userRoomsArray[5] == Number(1))
			{
				xalkyDropDIV("select_"+userRoomsArray[1],'roomSelect')

				xalkyDropRoomDIV("room_"+userRoomsArray[1]);

				roomNameStr = roomNameStr.replace("|" + userRoomsArray[2].toLowerCase() + "|","");
			}

			// update room users count
			if(document.getElementById("userCount_"+userRoomsArray[1]))
			{
				document.getElementById("userCount_"+userRoomsArray[1]).innerHTML = 0;
			}	
			
			// loop
			i++;
		}
		
		// userlist data
		if(sentryBot == 1)
		{
			// if single room mode, add sentryBot to each room
			if(totalRooms == '1')
			{
				sentryBotRoomID = roomID;
			}

			xalkyUsersDIV('-1', '-1', sentryBotName, sentryBotAvi, '0', sentryBotRoomID, sentryBotRoomID, '1','','','');	
		}
		
		for (var i = 0; i < xmldoc.getElementsByTagName("userlist").length;)
		{
			// for each room
			var userList = xmldoc.getElementsByTagName("userlist")[i].childNodes[0].nodeValue;
			
			// split message data
			var userListArray = userList.split("||");
	
			if(userID == userListArray[0])
			{
				groupCams = userListArray[15];
				groupWatch = userListArray[16];
				groupChat = userListArray[17];
				groupPrivateChat = userListArray[18];
				groupRooms = userListArray[19];
				groupVideo = userListArray[20];				
			}

			// enable digitalCredits
			digitalCredits = userListArray[13];

			// update digitalCredits total
			if(document.getElementById("digitalCreditsID") && userListArray[0] == userID)
			{
				document.getElementById("digitalCreditsID").innerHTML = userListArray[14];
			}

			if(digitalCredits == 0)
			{
				document.getElementById("icondigitalCredits").style.visibility = 'hidden';
			}

			if(userID == userListArray[0])
			{
				admin = Number(userListArray[7]);
				moderator = Number(userListArray[8]);
				speaker = Number(userListArray[9]);
			}			
			
			// all users
			xalkyUsersDIV(
						userListArray[0],
						userListArray[1],
						userListArray[2],
						userListArray[3],
						userListArray[4],
						userListArray[6],
						userListArray[5],
						userListArray[10],
						userListArray[11],
						userListArray[12],
						userListArray[7],
						userListArray[8],
						userListArray[9],
						userListArray[21],
						userListArray[22],
						userListArray[23]
				);

			// loop
			i++;
		}
		
		// message data
		for (var i = 0; i < xmldoc.getElementsByTagName("usermessage").length;)
		{
			// for each room
			var userMessage = xmldoc.getElementsByTagName("usermessage")[i].childNodes[0].nodeValue;	

			if(typeof(xmldoc.getElementsByTagName("usermessage")[i].textContent) != "undefined")
			{
				// firefox has a node limit of 4096 characters, so we 
				// use textContent.length instead to get the user message
				var userMessage = xmldoc.getElementsByTagName("usermessage")[i].textContent;							
			}
			else
			{
				// all other browsers
				if(xmldoc.getElementsByTagName("usermessage")[i].childNodes[0].nodeValue)
				{
					var userMessage = xmldoc.getElementsByTagName("usermessage")[i].childNodes[0].nodeValue;
				}
			}				

			// split message data
			var userMessageArray = userMessage.split("}{");
			
			// create message 
			xalkyMessageDIV(
						'0', 
						userMessageArray[1], 
						userMessageArray[2], 
						showMessages+1, 
						userMessageArray[5], 
						userMessageArray[7],
						userMessageArray[3],
						userMessageArray[4],
						userMessageArray[8]
					);

			lastMessageID = userMessageArray[0];	

			// loop
			i++;			
		}
			
		if(showHistory == 1)
		{
			xalkyMessageDIV(
							'0',
							userID,
							displayMDiv,
							-2,
							'1|'+stextColour+'|'+stextSize+'|'+stextFamily+'|** '+userName+' '+publicEntry,
							'beep_high.mp3',
							'',
							'',
							''
						);

			showHistory = 0;
		}

	}

}

/*
 * whisper user
 *
 */
function xalkyWhispherUser(touserName)
{
	// check if user is whispering to themselves :P
	if(touserName.toLowerCase() == decodeURI(userName.toLowerCase()))
	{
		xalkyShowBox("system","220","300","200","",lang18);
		return false;
	}

	// set message input
	document.getElementById('whisperID').value = decodeURI(touserName);
}

/*
 * ring bell
 *
 */
function xalkyRingBell(inputMDiv,displayMDiv)
{
	// set message input
	document.getElementById(inputMDiv).value = "/ringbell";

	// send message
	xalkyAddMessage(inputMDiv,displayMDiv);
}

/*
 * clear & focus message input field
 *
 */
function xalkyClearInput(displayMDiv)
{
	// clear message input
	document.getElementById(displayMDiv).value = '';

	// focus message input
	document.getElementById(displayMDiv).focus();
}


/*
 * create message div 
 *
 */
var initDoSilence;
var doTextAdverts = 0;
var lastMessageText;
var lastMessageName;
function xalkyMessageDIV(mStatus, mUID, mDiv, mID, message, sfx, mUser, mToUser, mTime)
{
	message	= decodeURI(message);

	// prevent duplicate messages
	if(mUser.toLowerCase() == lastMessageName && message == lastMessageText)
	{
		return false;
	}
	
   // global delete message (admin/mods)
   if( message.search("DELETEMESSAGE_") != -1 )
   {
      var deleteMessage = message.replace("DELETEMESSAGE_","");
         deleteMessage = deleteMessage.split("|");

      // remove any bold fonts from message
         deleteMessage[4] = deleteMessage[4].replace(/\[b\]/gi, "");
         deleteMessage[4] = deleteMessage[4].replace(/\[\/b\]/gi, "");
      
      // remove any italic fonts from message      
         deleteMessage[4] = deleteMessage[4].replace(/\[i\]/gi, "");
         deleteMessage[4] = deleteMessage[4].replace(/\[\/i\]/gi, "");
      
      // remove any underline fonts from message      
         deleteMessage[4] = deleteMessage[4].replace(/\[u\]/gi, "");
         deleteMessage[4] = deleteMessage[4].replace(/\[\/u\]/gi, "");
      
      // remove any spaces from message      
         deleteMessage[4] = deleteMessage[4].replace(/ /gi, "");   
         
      xalkyDropMessages(deleteMessage[4]);
      return false;
   }	
	
	lastMessageText = message;
	lastMessageName = mUser;
	
	// if message history is enabled 
	// dont load old command messages
   	if(
	showHistory && message.search("BROADCAST") != -1 ||
	showHistory && message.search("KICK") != -1 || 
	showHistory && message.search("WEBCAM_REQUEST") != -1 || 
	showHistory && message.search("WEBCAM_ACCEPT") != -1
	)
   	{
      	return false;
   	}	

	if(message == 'SILENCE' && mToUser.toLowerCase() == userName.toLowerCase())
	{
		isSilenced = 1;
		xalkyShowBox("system","220","300","200","",lang7+" "+silent+" "+lang8);
		initDoSilence = setInterval('xalkySilence()',1000);
		return false;
	}

	if(message == 'SILENCE' && mToUser.toLowerCase() != userName.toLowerCase())
	{
		return false;
	}

	if(message == 'KICK' && mToUser.toLowerCase() == userName.toLowerCase())
	{
		xalkyLogout('kick');
		return false;
	}

	if(message == 'KICK' && mToUser.toLowerCase() != userName.toLowerCase())
	{
		return false;
	}

	if(message == 'BAN' && mToUser.toLowerCase() == userName.toLowerCase())
	{
		xalkyLogout('ban');
		return false;
	}

	if(message == 'BAN' && mToUser.toLowerCase() != userName.toLowerCase())
	{
		return false;
	}

	if(mUser && blockedList.indexOf("|"+mUID+"|") != '-1')
	{
		return false;
	}

	// if user has receive PM disabled
	if(mDiv != 'chatContainer' && (userRPM == 'false' || userRPM == false))
	{
		return false;
	}

	// create private window if not open
	pDiv = mDiv.replace("pcontent_","");
	ppDiv = pDiv.split("_");

	// create private chat window if not exists
	if(mUID != userID && mDiv != 'chatContainer' && mToUser.toLowerCase() == userName.toLowerCase())
	{
	
		// if message history is enabled 
		// dont load old private messages
		if(showHistory)
		{
			return false;
		}
	
		// if div isnt created
		if(!document.getElementById(mDiv))
		{
			if(ppDiv[0] != userID)
			{
				// this user is receiver, new PM
				xalkyPrivateChat(userName,mUser,userID,mUID);
			}
			else
			{
				// this user is sender (initilised PM)
				// eg. this user crashed or lost connection
				// catches any closed PM that a receiver still has open
				xalkyPrivateChat(userName,mUser,mUID,userID);
			}

		}
		
	}

	// create new message div
	if(!document.getElementById(mID))
	{	
		// create div
		var ni = document.getElementById(mDiv);
		var newdiv = document.createElement('div');
		newdiv.setAttribute("id",mTime);
	
		// webcam options
		showStreamUID = message.split("||");

		if(showStreamUID[0] == 'WEBCAM_ACCEPT' && mToUser.toLowerCase() == userName.toLowerCase())
		{
			viewCam(mToUser,mUser,showStreamUID[1],mUID);
			return false;
		}

		// add avatar and HTML formatting
      	message = message.replace(/\[b\]/gi, "<b>");
      	message = message.replace(/\[\/b\]/gi, "</b>");
      	message = message.replace(/\[i\]/gi, "<i>");
      	message = message.replace(/\[\/i\]/gi, "</i>");
      	message = message.replace(/\[u\]/gi, "<u>");
      	message = message.replace(/\[\/u\]/gi, "</u>");
		message = message.replace(/\[\[/gi, "<");
		message = message.replace(/\]\]/gi, ">");

		messageArray = message.split("|");	

		// assign entry sfx
		if(messageArray[4].indexOf(publicEntry) != -1)
		{
			sfx = 'doorbell.mp3';
		}

		// assign exit sfx
		if(messageArray[4].indexOf(publicExit) != -1)
		{
			sfx = 'door_close.mp3';
		}

		// format smilies in message
		messageArray[4] = xalkyAddSmilie(messageArray[4]);
		
		// show broadcast message
		var broadcast = messageArray[4];
		    broadcast = broadcast.replace("<b>","");
		    broadcast = broadcast.replace("<u>","");
		    broadcast = broadcast.replace("<i>","");
		    broadcast = broadcast.replace("</b>","");
		    broadcast = broadcast.replace("</u>","");
		    broadcast = broadcast.replace("</i>","");
		    broadcast = broadcast.split(" ");

		if(broadcast[0] == 'BROADCAST')
		{
			xalkyShowBox("system","220","300","200","",decodeURI(messageArray[4].replace("BROADCAST","")));
			return false;
		}

		// check for emails
		if(enableEmail)
		{
			messageArray[4] = messageArray[4].replace(/([\w.-]+@[\w.-]+\.[\w]+)/gi, "<a href='mailto:$1'>$1</a>");
		}
		
		// enable youtube videos
		// url must contain youtu.be format   
		// eg. http://youtu.be/ctAu4DgSheI
      
		var showYouTube = 0;
		if ( messageArray[4].search(/youtube.com\/watch/gi) > -1 )	
		{
			xalkyShowBox("system","320","400","200","","To post a Youtube video, please use the Youtube share url.<p><img src='images/youtube_share_url.jpg'></p>");
			return false;			
		}		
		
		if( messageArray[4].search(/https:\/\/youtu.be\//gi) > -1 )		
		{
		    messageArray[4] = messageArray[4].replace("<b>","");
		    messageArray[4] = messageArray[4].replace("<u>","");
		    messageArray[4] = messageArray[4].replace("<i>","");
		    messageArray[4] = messageArray[4].replace("</b>","");
		    messageArray[4] = messageArray[4].replace("</u>","");
		    messageArray[4] = messageArray[4].replace("</i>","");				
		
			var getVideoID = messageArray[4].split("/");
			messageArray[4] = '<br><iframe width="420" height="315" src="https://www.youtube.com/embed/'+getVideoID[3]+'" frameborder="0" allowfullscreen></iframe>';
			showYouTube = 1;
		}		

		// check for urls
		if(enableUrl && !showYouTube)
		{
			messageArray[4] = messageArray[4].replace(/(http[s]?:\/\/[\S]+)/gi, "<a href='$1' target='_blank'>$1</a>");
		}

		/* new styling format */
		var displayName = mUser+":&nbsp;";
		var newMessage = "<table><tr>";
		
		// if user is allowing anyone to view webcam
		if(messageArray[4] == 'WEBCAM_REQUEST' && mToUser.toLowerCase() == userName.toLowerCase() && (userRWebcam == 'true' || userRWebcam == true))
		{
			acceptViewWebcam(encodeURI(mUser));
			return false;
		}

		// if user requires permission to view webcam
		if(messageArray[4] == 'WEBCAM_REQUEST' && mToUser.toLowerCase() == userName.toLowerCase())
		{
			displayName = "";
			messageArray[4] = decodeURI(mUser) + "&nbsp;"+lang19+" <span style='cursor:pointer' onclick='acceptViewWebcam(\""+encodeURI(mUser)+"\");xalkyShowBox(\"system\",\"220\",\"300\",\"200\",\"\",\""+lang20+" "+mUser+" "+lang21+"\");'>"+lang22+"</span> "+lang23+" <span style='cursor:pointer' onclick='xalkyShowBox(\"system\",\"200\",\"300\",\"200\",\"\",\""+lang24+" "+mUser+" "+lang21+"\");'>"+lang25+"</span> "+lang26;
		}

		// entry/exit message
		if(messageArray[0]=='1')
		{
			displayName = "";
			newMessage = "";
		}

		// welcome/IRC/whisper message
		if(messageArray[5]=='1')
		{
			displayName = mUser;
		}

		// format messages with line breaks
		if(messageArray[6]=='1')
		{
			messageArray[4] = "<pre style='white-space: pre-wrap;'>"+messageArray[4]+"</pre>";
		}
		
		// normal message
		if(mStatus == 0)
		{
			newdiv.className = 'chatMessage';				
		}

		// welcome message
		if(mStatus == 1)
		{
			newdiv.className = 'welcomeMessage';
		}	
		
		// format messages - classic/modern
		userMessStyle = document.getElementById("userMessStyle").checked;
		if(messageArray[0] == '../images/notice.gif' || messageArray[0] == '1' || userMessStyle == false)
		{
			var displayName = mUser+":&nbsp;";
			
			if(messageArray[0] == '1')
			{
				displayName = "";
			}
			
			var newMessage = "";
			
				if(document.getElementById("userAvatarsON").checked==true && messageArray[0] != '1')
				{			
					newMessage = "<img style='vertical-align:middle;' src='<?php $xalkyConfig['chatroomUrl']; ?>/assets/avatars/40/"+messageArray[0]+"'>&nbsp;";		
				}
				
				newMessage += "<span id='username' style='cursor:pointer;' onclick='xalkyWhispherUser(\""+mUser+"\")'>"+displayName+"</span>";
				newMessage += "<span style='colour:" + messageArray[1] + ";font-size:" + messageArray[2] + ";font-family:" + messageArray[3] + ";'>" + messageArray[4] + "</span>";

				// show delete global message icon
				if( mTime > 0 && ( admin || moderator) )
				{
					newMessage += "<span class='deleteMessage' title='Remove This Message' onclick='xalkyDropGM(\""+mTime+"\")'></span>";
				}
		}
		else
		{
			/* new modern message format */
			if(mUser.toLowerCase() == userName.toLowerCase())
			{
				newdiv.className = 'chatMessageBackground';	
				
				var newMessage = "<table style='float:right;margin-right:5px;'><tr>";
					newMessage += "<td><div class='right_arrow_box' style='height:auto;text-align:left;colour:" + messageArray[1] + ";font-size:" + messageArray[2] + ";font-family:" + messageArray[3] + ";'>"+messageArray[4]+"</div></td>";		
					
					if(document.getElementById("userAvatarsON").checked==true)
					{
						newMessage += "<td style='width:50px;'><img src='<?php $xalkyConfig['chatroomUrl']; ?>/assets/avatars/40/"+messageArray[0]+"'></td>";
					}
					
					newMessage += "</tr></table>";
					newMessage += "<div style='clear:both;'>";
			}
			else
			{
				newdiv.className = 'chatMessageBackground';	
				
				var newMessage = "<table style='float:left;'><tr>";	
				
					if(document.getElementById("userAvatarsON").checked==true)
					{			
						newMessage += "<td style='width:50px;'><img src='<?php $xalkyConfig['chatroomUrl']; ?>/assets/avatars/40/"+messageArray[0]+"'></td>";
					}
					
					newMessage += "<td style='vertical-align:middle;'><div class='left_arrow_box' style='height:auto;colour:" + messageArray[1] + ";font-size:" + messageArray[2] + ";font-family:" + messageArray[3] + ";'>";
					
					// show delete global message icon
					if( mTime > 0 && ( admin || moderator) )
					{
						newMessage += "<span class='deleteMessage' title='Remove This Message' onclick='xalkyDropGM(\""+mTime+"\")'></span>";
					}					
					
					newMessage += "<span id='username' style='cursor:pointer;' onclick='xalkyWhispherUser(\""+mUser+"\")'>"+displayName+"</span><br>"+messageArray[4]+"</div></td>";			
					newMessage += "</tr></table>";
					newMessage += "<div style='clear:both;'>";
			}
		}
		
		// shout filter
		if(enableShoutFilter)
		{
			newMessage = newMessage.toLowerCase();
		}

		// show message
		newMessage = newMessage.replace(/&#127;/gi,"\|");
		newdiv.innerHTML = decodeURIComponent(newMessage);

		if(ni != null)
		{
			ni.appendChild(newdiv);
		}

		// update div count
		showMessages += 1;
	}	

	// trim messages
	xalkyCountMessages(mDiv);
	
	// control the auto scroll
	if(document.getElementById(mDiv) && document.getElementById('autoScrollID').checked==true)
	{
		var chat_div = document.getElementById(mDiv);
		chat_div.scrollTop = chat_div.scrollHeight;			
	}

	// if private window is minimised, show alert
	if(mDiv != 'chatContainer')
	{
		if(document.getElementById(pDiv) && document.getElementById(pDiv).style.visibility == 'visible')		
		{
			if(mUser.toLowerCase() != userName.toLowerCase() && document.getElementById("psendbox_"+pDiv).style.visibility != 'visible')
			{
				xalkyAlert(pDiv);			
			}
		}
		
		if(document.getElementById(pDiv) && document.getElementById(pDiv).style.visibility != 'visible')
		{
			document.getElementById(pDiv).style.visibility = 'visible';
			document.getElementById("pcontent_"+pDiv).style.visibility = 'visible';
			document.getElementById("pmenuBar_"+pDiv).style.visibility = 'visible';
			document.getElementById("psendbox_"+pDiv).style.visibility = 'visible';
			document.getElementById("pmenuWin_"+pDiv).style.visibility = 'visible';
		}

	}

	// show text adverts
	if(textAdverts && !ppDiv[1])
	{
		if(doTextAdverts == showTextAdverts)
		{
			doTextAdverts = 0;

			var sta = setTimeout('xalkyTextAdverts();',2000)
		}
		else
		{
			doTextAdverts += 1;
		}
	}

	// play sound
	var playSounds = 0;

	if(document.getElementById('soundsID').checked==true && sfx == 'beep_high.mp3')
	{
		xalkySound(sfx);
	}

	if(document.getElementById('entryExitID').checked==true && (sfx == 'doorbell.mp3' || sfx == 'door_close.mp3'))
	{
		xalkySound(sfx);
	}

	if(document.getElementById('sfxID').checked==true && xalkySFX.toString().lastIndexOf(sfx) == -1 && (sfx != 'doorbell.mp3' && sfx != 'door_close.mp3' && sfx != 'beep_high.mp3'))
	{
		xalkySound(sfx);
	}

}

/*
 * delete global message
 *
 */
function xalkyDropGM(deleteGMID)
{
   // set message input
   document.getElementById('optionsBar').value = "DELETEMESSAGE_"+deleteGMID;

   // send message
   xalkyAddMessage('optionsBar','chatContainer');
}

/*
 * show text adverts
 * 
 */
function xalkyTextAdverts()
{
	if(advertDesc[0])
	{
		xalkyMessageDIV('0', '-1', 'chatContainer', showMessages+1, '<?php $xalkyConfig['chatroomUrl']; ?>/assets/images/notice.gif|'+stextColour+'|'+stextSize+'|'+stextFamily+'|'+advertDesc[Math.floor(Math.random()*advertDesc.length)], 'beep_high.mp3', 'AdBot', '', '');	
	}
}

/*
 * silence the user
 * 
 */
var s = 0;
function xalkySilence()
{
	s += 1;

	if(s > (silent*60))
	{
		xalkyShowBox("system","220","300","200","",lang27);

		clearInterval(initDoSilence);

		s = 0;

		isSilenced = 0;
	}
}

/*
 * highlight pm title bar (if pm is minimised)
 * 
 */
function xalkyAlert(pDiv)
{
	document.getElementById("ptitle_"+pDiv).style.backgroundColour = newPMmin;
}

/*
 * trim total messages in chat window
 *
 */ 
function xalkyCountMessages(pDiv)
{
	if(document.getElementById(pDiv))
	{
		var parentCount = document.getElementById(pDiv);
		var childCount = parentCount.getElementsByTagName('div').length;

		// if message divs greater than total message divs
		if(childCount > totalMessages)
		{
			var trimMessages = document.getElementById(pDiv);
  			trimMessages.removeChild(trimMessages.firstChild);
		}
	}

}

/*
 * delete message div 
 *
 */
function xalkyDropMessages(divID)
{
	// if div exists
	if(document.getElementById(divID))
	{
		// remove div
		var d = document.getElementById('chatContainer');
		var olddiv = document.getElementById(divID);
		d.removeChild(olddiv);
	}

}

/*
 * use enter key as submit 
 *
 */
function xalkySubmit(xalkyfield,e,inputMDiv,displayMDiv,pXalky)
{
	var keycode;
	if (window.event) keycode = window.event.keyCode;
	else if (e) keycode = e.which;
	else return true;

	if (keycode == 13)
	{
		// send message
		isPrivate = pXalky;
		xalkyAddMessage(inputMDiv,displayMDiv);
		return false;
	}
	else return true;
}