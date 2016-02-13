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
 * @see			http://sourceforge.net/projects/chronolabsapis/
 * @see			http://labs.coop
 * @version     1.0.5
 * @since		1.0.1
 */


/**
 * Class XalkyRooms
 *
 */
class XalkyRooms extends XoopsObject
{
	
    /**
     *
     *
     */
    function __construct()
    {
    	
        $this->XoopsObject();
   		$this->initVar('room-id', XOBJ_DTYPE_TXTBOX, md5(null), false, 32);
   		$this->initVar('peer-id', XOBJ_DTYPE_TXTBOX, md5(null), false, 32);
   		$this->initVar('linux-name', XOBJ_DTYPE_TXTBOX, '', false, 64);
        $this->initVar('title-name', XOBJ_DTYPE_TXTBOX, '', false, 100);
        $this->initVar('description', XOBJ_DTYPE_TXTBOX, '', false, 400);
        $this->initVar('background', XOBJ_DTYPE_TXTBOX, '', false, 255);
        $this->initVar('owner-user-id', XOBJ_DTYPE_TXTBOX, md5(null), false, 32);
        $this->initVar('password', XOBJ_DTYPE_TXTBOX, '', false, 32);
        $this->initVar('admins', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('moderators', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('bans', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('kicks', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('peers', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('users', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('created', XOBJ_DTYPE_INT, 0, false);
    }

}

/**
 * Class XalkyRoomsHandler
 */
class XalkyRoomsHandler extends XoopsPersistableObjectHandler
{

    /**
     * @param null|object $db
     */
    function __construct(&$db)
    {
        parent::__construct($db, "xalky_rooms", 'XalkyRooms', 'room-id', 'linux-name');
    }

}
