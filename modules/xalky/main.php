<?php 
/**
 * Xalky - Footer Preloader - XOOPS Chat Rooms
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

$ftype = str_replace(".php", "", basename(__FILE__));

global $xalkyConfig, $xalkyModule, $loginError;
$GLOBALS['xoTheme']->addScript(XOOPS_URL . '/modules/xalky/assets/js/language.js');
$GLOBALS['xoTheme']->addScript(XOOPS_URL . '/modules/xalky/assets/js/settings.js');
$GLOBALS['xoTheme']->addScript(XOOPS_URL . '/modules/xalky/assets/js/XmlHttpRequest.js');
$GLOBALS['xoTheme']->addScript(XOOPS_URL . '/modules/xalky/assets/js/cookie.js');
$GLOBALS['xoTheme']->addScript(XOOPS_URL . '/modules/xalky/assets/js/divLayout.js');
$GLOBALS['xoTheme']->addScript(XOOPS_URL . '/modules/xalky/assets/js/message.js');
$GLOBALS['xoTheme']->addScript(XOOPS_URL . '/modules/xalky/assets/js/functions.js');
$GLOBALS['xoTheme']->addScript(XOOPS_URL . '/modules/xalky/assets/js/private.js');
$GLOBALS['xoTheme']->addScript(XOOPS_URL . '/modules/xalky/assets/js/userlist.js');
$GLOBALS['xoTheme']->addScript(XOOPS_URL . '/modules/xalky/assets/js/newroom.js');
$GLOBALS['xoTheme']->addScript(XOOPS_URL . '/modules/xalky/assets/js/swfobject.js');
$GLOBALS['xoTheme']->addScript(XOOPS_URL . '/modules/xalky/assets/js/playSnd.js');
$GLOBALS['xoTheme']->addScript(XOOPS_URL . '/modules/xalky/assets/js/sentryBotRes.js');
$GLOBALS['xoTheme']->addScript(XOOPS_URL . '/modules/xalky/assets/js/sentryBot.js');
if (file_exists($GLOBALS['xoops']->path('/modules/xalky/templates/'.$xalkyConfig['template'] .'/style.css')))
	$GLOBALS['xoTheme']->addStylesheet(XOOPS_URL . '/modules/xalky/templates/'.$xalkyConfig['template'] .'/style.css');
if (file_exists($GLOBALS['xoops']->path('/modules/xalky/templates/'.$xalkyConfig['template'] .'/xalky_'.$ftype.'.css')))
	$GLOBALS['xoTheme']->addStylesheet(XOOPS_URL . '/modules/xalky/templates/'.$xalkyConfig['template'] .'/xalky_'.$ftype.'.css');
if (file_exists($GLOBALS['xoops']->path('/modules/xalky/templates/'.$xalkyConfig['template'] .'/xalky_'.$ftype.'.js')))
	$GLOBALS['xoTheme']->addScript(XOOPS_URL . '/modules/xalky/templates/'.$xalkyConfig['template'] .'/xalky_'.$ftype.'.js');

$GLOBALS['xoTheme']->addScript('', array('language'=>"javascript", 'type'=>"text/javascript"), "
/* user details */
var userName = '".$_SESSION['xalky']['username'] ."';
var userID = '".$_SESSION['xalky']['userid'] ."';
var userAvatar = '".$_SESSION['xalky']['avatar'] ."';
var roomOwner = '".$_SESSION['xalky']['room-owner-userid'] ."';
var blockedList = '".$_SESSION['xalky']['blocked-list'] ."';

/* room details */
var totalRooms = '".$_SESSION['xalky']['total-rooms'] ."';
var roomID = '".$_SESSION['xalky']['room-id'] ."';
var currRoom = '".$_SESSION['xalky']['room-id'] ."';
var prevRoom = '".$_SESSION['xalky']['previous-room-id'] ."';
var publicWelcome = '".$_SESSION['xalky']['room-welcome'] ."';

/* last message ID */
var lastMessageID = '".$_SESSION['xalky']['last-message-id'] ."';");
$GLOBALS['xoopsTpl']->display($GLOBALS['xoops']->path('/modules/xalky/templates/'.$xalkyConfig['template'] .'/xalky_'.$ftype.'.html'));