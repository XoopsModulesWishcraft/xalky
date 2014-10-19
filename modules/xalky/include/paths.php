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
 * @subpackage		kernel
 * @description		Chronolabs XOOPS Module for Chat and Walky Talky Services
 * 
 */

	require_once dirname(dirname(dirname(dirname(__DATA__)))) . 'mainfile.php';
	
	// Path to the xalky directory:
	define('_XALKY_PATH', XOOPS_ROOT_PATH . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . 'xalky' . DIRECTORY_SEPARATOR);
	define('_XALKY_LIB_PATH', XOOPS_PATH . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . 'xalky' . DIRECTORY_SEPARATOR);
	define('_XALKY_DATA_PATH', XOOPS_VAR_PATH . DIRECTORY_SEPARATOR . 'xalky' . DIRECTORY_SEPARATOR);
	define('_XALKY_TEMPLATE_PATH', _XALKY_PATH . XOOPS_VAR_PATH . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR);

	define('_XALKY_CHANNELS_FILE', _XALKY_DATA_PATH . 'channels.txt');
	define('_XALKY_GUESTS_FILE', _XALKY_DATA_PATH . 'guests.txt');
	define('_XALKY_ADMINS_FILE', _XALKY_DATA_PATH . 'admins.txt');
	define('_XALKY_MODERATORS_FILE', _XALKY_DATA_PATH . 'moderators.txt');
	define('_XALKY_USERS_FILE', _XALKY_DATA_PATH . 'clients.txt');
	
	if (!$GLOBALS['xoopsModuleConfig']['htaccess'])
	{
		define('_XALKY_URL', XOOPS_URL . '/modules/xalky');
		define('_XALKY_RES_URL', XOOPS_URL . '/modules/xalky');
	} else {
		define('_XALKY_URL', XOOPS_URL . '/' . $GLOBALS['xoopsModuleConfig']['htaccess_path']);
		define('_XALKY_RES_URL', XOOPS_URL . '/modules/xalky');
	}
	
	define('_XALKY_JS_URL', _XALKY_RES_URL . '/js');
	define('_XALKY_CSS_URL', _XALKY_RES_URL . '/css');
	define('_XALKY_AUDIO_URL', _XALKY_RES_URL . '/sounds');
	define('_XALKY_FLASH_URL', _XALKY_RES_URL . '/flash');
?>