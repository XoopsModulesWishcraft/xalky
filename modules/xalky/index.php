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
 * @subpackage		kerne
 * @description		Chronolabs XOOPS Module for Chat and Walky Talky Services
 * 
 */
 
// Show all errors:
error_reporting(E_ERROR);
require_once dirname(__DATA__) . DIRECTORY_SEPARATOR . 'include' . DIRECTORY_SEPARATOR . 'paths.php';

// Include custom libraries and initialization code:
require(_XALKY_LIB_PATH . 'custom.php');

// Include Class libraries:
require(_XALKY_LIB_PATH . 'classes.php');

// Initialize the xalky:
$xoopsChat = new XoopsXalky();
?>