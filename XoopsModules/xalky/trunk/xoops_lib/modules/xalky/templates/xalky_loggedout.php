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
	$GLOBALS['xoTheme']->addScript(_XALKY_JS_URL . '/lang/'._LANGCODE.'.js', array('type'=> 'text/javascript'), '', _LANGCODE.'.js');
	$GLOBALS['xoTheme']->addScript(_XALKY_JS_URL . '/config.js', array('type'=> 'text/javascript'), '', 'config.js');
	$GLOBALS['xoTheme']->addScript(_XALKY_JS_URL . '/FABridge.js', array('type'=> 'text/javascript'), '', 'FABridge.js');
	$GLOBALS['xoTheme']->addScript('', array('type'=> 'text/javascript'), "$( document ).ready(function() {
				document.getElementById('userNameField').focus();
				if(!xalkyChat.isCookieEnabled()) {
					var node = document.createElement('div');
					var text = document.createTextNode(xalkyChatLang['errorCookiesRequired']);
					node.appendChild(text);
					document.getElementById('errorContainer').appendChild(node);
				}
			}
			});", sha1('initializeLoginPage()'));
	$GLOBALS['xoTheme']->addScript('', array('type'=> 'text/javascript'), "
			xalkyChatConfig.sessionName = '" . $_SESSION['xalky']['config']['sessionName'] . "';
			xalkyChatConfig.cookieExpiration = parseInt('" . $_SESSION['xalky']['config']['sessionCookieLifeTime'] . "');
			xalkyChatConfig.cookiePath = '" . $_SESSION['xalky']['config']['sessionCookiePath'] . "';
			xalkyChatConfig.cookieDomain = '" . $_SESSION['xalky']['config']['sessionCookiePath'] . "';
			xalkyChatConfig.cookieSecure = '" . $_SESSION['xalky']['config']['sessionCookieSecure'] . "';
			xalkyChat.init(xalkyChatConfig, xalkyChatLang, true, true, false);", sha1(microtime(true)));

	
?>