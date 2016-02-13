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
 * Class XalkyPeering
 *
 */
class XalkyPeering extends XoopsObject
{
    /**
     *
     */
    function __construct()
    {
    	
        $this->XoopsObject();
   		$this->initVar('peering-id', XOBJ_DTYPE_TXTBOX, md5(XOOPS_DB_NAME.microtime().XOOPS_DB_PASS.XOOPS_URL), false, 32);
   		$this->initVar('local-room-id', XOBJ_DTYPE_TXTBOX, md5(null), false, 32);
        $this->initVar('remote-room-id', XOBJ_DTYPE_TXTBOX, md5(null), false, 32);
        $this->initVar('drop-link-pass', XOBJ_DTYPE_TXTBOX, md5(''), false, 32);
        $this->initVar('local-owner-user-id', XOBJ_DTYPE_TXTBOX, md5(null), false, 32);
        $this->initVar('remote-owner-user-id', XOBJ_DTYPE_TXTBOX, md5(null), false, 32);
        $this->initVar('callback-peer-id', XOBJ_DTYPE_TXTBOX, md5(null), false, 32);
        $this->initVar('callback-name', XOBJ_DTYPE_TXTBOX, '', false, 250);
        $this->initVar('callback-uri', XOBJ_DTYPE_TXTBOX, '', false, 250);
        $this->initVar('seeder-peer-id', XOBJ_DTYPE_TXTBOX, md5(null), false, 32);
        $this->initVar('seeder-name', XOBJ_DTYPE_TXTBOX, '', false, 250);
        $this->initVar('seeder-uri', XOBJ_DTYPE_TXTBOX, '', false, 250);
        $this->initVar('local-users', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('remote-users', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('send-messages', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('recieved-messages', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('local-aes', XOBJ_DTYPE_ENUM, 'Yes', true, false, false, false, array('Yes','No'));
        $this->initVar('local-aes-salt', XOBJ_DTYPE_TXTBOX, '', false, 128);
        $this->initVar('remote-aes', XOBJ_DTYPE_ENUM, 'Yes', true, false, false, false, array('Yes','No'));
        $this->initVar('remote-aes-salt', XOBJ_DTYPE_TXTBOX, '', false, 128);
        $this->initVar('room-seeder', XOBJ_DTYPE_ENUM, 'Yes', true, false, false, false, array('Yes','No'));
        $this->initVar('room-save', XOBJ_DTYPE_ENUM, 'Yes', true, false, false, false, array('Yes','No'));
        $this->initVar('remote-ping', XOBJ_DTYPE_FLOAT, 0, false);
        $this->initVar('remote-down', XOBJ_DTYPE_ENUM, 'Yes', true, false, false, false, array('Yes','No'));
        $this->initVar('started', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('last-message', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('last-ping', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('delay-ping', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('finished', XOBJ_DTYPE_INT, 0, false);
    }

}

/**
 * Class XalkyPeeringHandler
 */
class XalkyPeeringHandler extends XoopsPersistableObjectHandler
{

    /**
     * @param null|object $db
     */
    function __construct(&$db)
    {
        parent::__construct($db, "xalky_peering", 'XalkyPeering', 'peering-id', 'drop-link-pass');
    }

}
