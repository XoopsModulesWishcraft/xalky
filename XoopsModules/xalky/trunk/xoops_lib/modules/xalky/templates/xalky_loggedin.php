<?php
/*
 * Chronolabs XOOPS Chat Module - xALKY
 * 
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 
 * @copyright 		Chronolabs Cooperative http://labs.coop
 * @license 		General Software Licence (https://web.labs.coop/public/legal/general-software-license/10,3.html)
 * @package 		xalky
 * @since 			1.111
 * @author 			Antony Cipher <cipher@labs.coop>
 * @author 			Simon Roberts <meshy@labs.coop>
 * @subpackage		templates
 * @description		Chronolabs XOOPS Module for Chat and Walky Talky Services
 * 
 */

	$GLOBALS['xoTheme']->addScript('browse.php?Frameworks/jquery/jquery.js');
	$GLOBALS['xoTheme']->addScript(_XALKY_JS_URL . '/modal.js', array('type'=> 'text/javascript'), '', 'modal.js');
	$GLOBALS['xoTheme']->addScript(_XALKY_JS_URL . '/xalky.js', array('type'=> 'text/javascript'), '', 'xalky.js');
	$GLOBALS['xoTheme']->addScript(_XALKY_JS_URL . '/custom.js', array('type'=> 'text/javascript'), '', 'custom.js');
	$GLOBALS['xoTheme']->addScript(_XALKY_JS_URL . '/lang/'._LANGCODE.'.js', array('type'=> 'text/javascript'), '', _LANGCODE.'.js');
	$GLOBALS['xoTheme']->addScript(_XALKY_JS_URL . '/config.js', array('type'=> 'text/javascript'), '', 'config.js');
	$GLOBALS['xoTheme']->addScript(_XALKY_JS_URL . '/FABridge.js', array('type'=> 'text/javascript'), '', 'FABridge.js');
	$GLOBALS['xoTheme']->addScript('', array('type'=> 'text/javascript'), "function toggleContainer(containerID, hideContainerIDs) {
				if(hideContainerIDs) {
					for(var i=0; i<hideContainerIDs.length; i++) {
						xalkyChat.showHide(hideContainerIDs[i], 'none');	
					}
				}		
				xalkyChat.showHide(containerID);
				if(typeof arguments.callee.styleProperty == 'undefined') {
					if(typeof isIElt7 != 'undefined') {
						arguments.callee.styleProperty = 'marginRight';
					} else {
						arguments.callee.styleProperty = 'right';
					}
				}
				var containerWidth = document.getElementById(containerID).offsetWidth;
				if(containerWidth) {
					document.getElementById('xalkyList').style[arguments.callee.styleProperty] = (containerWidth+28)+'px';	
				} else {
					document.getElementById('xalkyList').style[arguments.callee.styleProperty] = '20px';
				}				
			}

			function initialize() {
				xalkyChat.updateButton('audio', 'audioButton');
				xalkyChat.updateButton('autoScroll', 'autoScrollButton');
				document.getElementById('bbCodeSetting').checked = xalkyChat.getSetting('bbCode');
				document.getElementById('bbCodeImagesSetting').checked = xalkyChat.getSetting('bbCodeImages');
				document.getElementById('bbCodeColorsSetting').checked = xalkyChat.getSetting('bbCodeColors');
				document.getElementById('hyperLinksSetting').checked = xalkyChat.getSetting('hyperLinks');
				document.getElementById('lineBreaksSetting').checked = xalkyChat.getSetting('lineBreaks');
				document.getElementById('emoticonsSetting').checked = xalkyChat.getSetting('emoticons');
				document.getElementById('autoFocusSetting').checked = xalkyChat.getSetting('autoFocus');
				document.getElementById('maxMessagesSetting').value = xalkyChat.getSetting('maxMessages');
				document.getElementById('wordWrapSetting').checked = xalkyChat.getSetting('wordWrap');
				document.getElementById('maxWordLengthSetting').value = xalkyChat.getSetting('maxWordLength');
				document.getElementById('dateFormatSetting').value = xalkyChat.getSetting('dateFormat');
				document.getElementById('persistFontColorSetting').checked = xalkyChat.getSetting('persistFontColor');
				for(var i=0; i<document.getElementById('audioVolumeSetting').options.length; i++) {
					if(document.getElementById('audioVolumeSetting').options[i].value == xalkyChat.getSetting('audioVolume')) {
						document.getElementById('audioVolumeSetting').options[i].selected = true;
						break;
					}
				}
				xalkyChat.fillSoundSelection('soundReceiveSetting', xalkyChat.getSetting('soundReceive'));
				xalkyChat.fillSoundSelection('soundSendSetting', xalkyChat.getSetting('soundSend'));
				xalkyChat.fillSoundSelection('soundEnterSetting', xalkyChat.getSetting('soundEnter'));
				xalkyChat.fillSoundSelection('soundLeaveSetting', xalkyChat.getSetting('soundLeave'));
				xalkyChat.fillSoundSelection('soundChatBotSetting', xalkyChat.getSetting('soundChatBot'));
				xalkyChat.fillSoundSelection('soundErrorSetting', xalkyChat.getSetting('soundError'));
				document.getElementById('blinkSetting').checked = xalkyChat.getSetting('blink');
				document.getElementById('blinkIntervalSetting').value = xalkyChat.getSetting('blinkInterval');
				document.getElementById('blinkIntervalNumberSetting').value = xalkyChat.getSetting('blinkIntervalNumber');
			}

			xalkyChatConfig.loginChannelID = parseInt('" . $_SESSION['xalky']['config']['LOGIN_CHANNEL_ID'] . "');
			xalkyChatConfig.sessionName = '" . $_SESSION['xalky']['config']['SESSION_NAME'] . "';
			xalkyChatConfig.cookieExpiration = parseInt('" . $_SESSION['xalky']['config']['COOKIE_EXPIRATION'] . "');
			xalkyChatConfig.cookiePath = '" . $_SESSION['xalky']['config']['COOKIE_PATH'] . "';
			xalkyChatConfig.cookieDomain = '" . $_SESSION['xalky']['config']['COOKIE_DOMAIN'] . "';
			xalkyChatConfig.cookieSecure = '" . $_SESSION['xalky']['config']['COOKIE_SECURE'] . "';
			xalkyChatConfig.xalkyBotName = decodeURIComponent('" . $_SESSION['xalky']['config']['CHAT_BOT_NAME'] . "');
			xalkyChatConfig.xalkyBotID = '" . $_SESSION['xalky']['config']['CHAT_BOT_ID'] . "';
			xalkyChatConfig.allowUserMessageDelete = parseInt('" . $_SESSION['xalky']['config']['ALLOW_USER_MESSAGE_DELETE'] . "');
			xalkyChatConfig.inactiveTimeout = parseInt('" . $_SESSION['xalky']['config']['INACTIVE_TIMEOUT'] . "');
			xalkyChatConfig.privateChannelDiff = parseInt('" . $_SESSION['xalky']['config']['PRIVATE_CHANNEL_DIFF'] . "');
			xalkyChatConfig.privateMessageDiff = parseInt('" . $_SESSION['xalky']['config']['PRIVATE_MESSAGE_DIFF'] . "');
			xalkyChatConfig.showChannelMessages = parseInt('" . $_SESSION['xalky']['config']['SHOW_CHANNEL_MESSAGES'] . "');
			xalkyChatConfig.messageTextMaxLength = parseInt('" . $_SESSION['xalky']['config']['MESSAGE_TEXT_MAX_LENGTH'] . "');
			xalkyChatConfig.socketServerEnabled = parseInt('" . $_SESSION['xalky']['config']['SOCKET_SERVER_ENABLED'] . "');
			xalkyChatConfig.socketServerHost = decodeURIComponent('" . $_SESSION['xalky']['config']['SOCKET_SERVER_HOST'] . "');
			xalkyChatConfig.socketServerPort = parseInt('" . $_SESSION['xalky']['config']['SOCKET_SERVER_PORT'] . "');
			xalkyChatConfig.socketServerChatID = parseInt('" . $_SESSION['xalky']['config']['SOCKET_SERVER_XALKY_ID'] . "');
		
			xalkyChat.init(xalkyChatConfig, xalkyChatLang, true, true, true, initialize);", sha1(microtime(true)));
	
	$animay= array('top', 'bottom', 'left', 'right');
	$GLOBALS['xoTheme']->addScript('', array('type'=> 'text/javascript'), "$( document ).ready(function() {
		$('.xalky').modal({
			target : '#xalky',
			animation : '" . $animay[mt_rand(0, 3)] . "',
			position : 'center'
		});
	});", 'modal');
?>