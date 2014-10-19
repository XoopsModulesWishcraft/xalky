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
 * @subpackage		classes
 * @description		Chronolabs XOOPS Module for Chat and Walky Talky Services
 * 
 */

class XalkyMessages extends XoopsObject
{

	 function __construct()
	 {
		 $this->initVar('id', XOBJ_DTYPE_INT, null, true);
		 $this->initVar('userID', XOBJ_DTYPE_INT, null, false);
		 $this->initVar('userName', XOBJ_DTYPE_TXTBOX, null, false, 64);
		 $this->initVar('userID', XOBJ_DTYPE_INT, 0, false);
		 $this->initVar('userRole', XOBJ_DTYPE_INT, 0, false);
		 $this->initVar('channel', XOBJ_DTYPE_INT, 0, false);
		 $this->initVar('time', XOBJ_DTYPE_INT, 0, false);
		 $this->initVar('ip', XOBJ_DTYPE_OTHER, null);
		 $this->initVar('text', XOBJ_DTYPE_OTHER, null);
	 }
 
}

class XalkyMessagesHandler extends XoopsPersistableObjectHandler
{
 
	 function __construct(&$db)
	 {
	 	parent::__construct($db, "xalky_messages", "XalkyMessages", "id");
	 }

}