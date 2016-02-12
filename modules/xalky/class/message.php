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


/**
 * Class XalkyMessage
 *
 */
class XalkyMessage extends XoopsObject
{
	
    /**
     *
     */
    function __construct()
    {
    	
        $this->XoopsObject();
   		$this->initVar('msg-id', XOBJ_DTYPE_TXTBOX, md5(null), true, 32);
   		$this->initVar('peer-id', XOBJ_DTYPE_TXTBOX, md5(null), true, 32);
   		$this->initVar('peering-id', XOBJ_DTYPE_TXTBOX, md5(null), true, 32);
   		$this->initVar('user-id', XOBJ_DTYPE_TXTBOX, md5(null), true, 32);
   		$this->initVar('room-id', XOBJ_DTYPE_TXTBOX, md5(null), false, 32);
   		$this->initVar('to-user-id', XOBJ_DTYPE_TXTBOX, md5(null), false, 32);
   		$this->initVar('to-peer-id', XOBJ_DTYPE_TXTBOX, md5(null), false, 32);
   		$this->initVar('message', XOBJ_DTYPE_TXTBOX, '', false, 500);
        $this->initVar('sfx', XOBJ_DTYPE_OTHER, '', false, 45);
        $this->initVar('sent', XOBJ_DTYPE_ENUM, 'No', true, false, false, false, array('Yes','No'));
        $this->initVar('sent-peers', XOBJ_DTYPE_ENUM, 'No', true, false, false, false, array('Yes','No'));
        $this->initVar('when', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('zone', XOBJ_DTYPE_TXTBOX, date_default_timezone_get(), false, 64);
    }

}

/**
 * Class XalkyMessageHandler
 */
class XalkyMessageHandler extends XoopsPersistableObjectHandler
{

    /**
     * @param null|object $db
     */
    function __construct(&$db)
    {
        parent::__construct($db, "xalky_message", 'XalkyMessage', 'id', 'referer');
    }

}
