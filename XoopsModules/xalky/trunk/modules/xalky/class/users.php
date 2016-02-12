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
 * Class XalkyUsers
 *
 */
class XalkyUsers extends XoopsObject
{
	
    /**
     *
     *`` varchar(32) NOT NULL,
  `` varchar(32) NOT NULL DEFAULT '',
  `peer-id` varchar(32) NOT NULL DEFAULT '',
  `userID` int(11) NOT NULL DEFAULT '0',
  `name` varchar(128) NOT NULL DEFAULT '',
  `uname` varchar(64) NOT NULL DEFAULT '',
  `gender` enum() NOT NULL DEFAULT 'Unknown',
  `dob` varchar(12) NOT NULL DEFAULT '',
  `ip-id` varchar(32) NOT NULL DEFAULT '',
  `` varchar(32) NOT NULL DEFAULT '',
  `` varchar(32) NOT NULL DEFAULT '',
  `` varchar(250) NOT NULL DEFAULT '',
  `` int(13) NOT NULL DEFAULT '0',
  `-active` int(13) NOT NULL DEFAULT '0',
  `` enum('Yes','No') NOT NULL DEFAULT 'No',
  `` enum('Yes','No') NOT NULL DEFAULT 'No',
  `` enum('Yes','No') NOT NULL DEFAULT 'No',
  `status` varchar(255) NOT NULL DEFAULT '',
  `` bigint(22) NOT NULL DEFAULT '0',
  `` bigint(22) NOT NULL DEFAULT '0',
  `` bigint(22) NOT NULL DEFAULT '0',
  `groups` varchar(300) NOT NULL DEFAULT '',
  `enabled` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `guest` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `admin` enum('Yes','No') NOT NULL DEFAULT 'No',
  `moderator` enum('Yes','No') NOT NULL DEFAULT 'No',
  `speaker` enum('Yes','No') NOT NULL DEFAULT 'No',
  `data` mediumtext,
     */
    function __construct()
    {
    	
        $this->XoopsObject();
   		$this->initVar('user-id', XOBJ_DTYPE_TXTBOX, md5(microtime(true).XOOPS_DB_HOST.null.XOOPS_URL.XOOPS_DB_PASS.NULL.XOOPS_DB_PREFIX), false, 32);
   		$this->initVar('peering-id', XOBJ_DTYPE_TXTBOX, md5(null), false, 32);
   		$this->initVar('peer-id', XOBJ_DTYPE_TXTBOX, md5(null), false, 32);
        $this->initVar('uid', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('name', XOBJ_DTYPE_TXTBOX, '', false, 128);
        $this->initVar('uname', XOBJ_DTYPE_TXTBOX, '', false, 64);
        $this->initVar('gender', XOBJ_DTYPE_ENUM, 'Unknown', false, false, false, false, array('Male','Female','Couple','Transsexual','Unknown'));
        $this->initVar('dob', XOBJ_DTYPE_TXTBOX, '', false, 12);
        $this->initVar('ip-id', XOBJ_DTYPE_TXTBOX, md5(null), false, 32);
        $this->initVar('previous-room-id', XOBJ_DTYPE_TXTBOX, md5(null), false, 32);
  		$this->initVar('current-room-id', XOBJ_DTYPE_TXTBOX, md5(null), false, 32);
        $this->initVar('avatar-url', XOBJ_DTYPE_TXTBOX, '', false, 250);
        $this->initVar('local-active', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('peer-active', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('kicked', XOBJ_DTYPE_ENUM, 'No', false, false, false, false, array('Yes','No'));
        $this->initVar('banned', XOBJ_DTYPE_ENUM, 'No', false, false, false, false, array('Yes','No'));
        $this->initVar('online', XOBJ_DTYPE_ENUM, 'No', false, false, false, false, array('Yes','No'));
        $this->initVar('status', XOBJ_DTYPE_TXTBOX, '', false, 255);
        $this->initVar('points-active', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('points-kicked', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('points-banned', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('groups', XOBJ_DTYPE_ARRAY, array(), false);
        $this->initVar('enabled', XOBJ_DTYPE_ENUM, 'Yes', false, false, false, false, array('Yes','No'));
        $this->initVar('guest', XOBJ_DTYPE_ENUM, 'Yes', false, false, false, false, array('Yes','No'));
        $this->initVar('admin', XOBJ_DTYPE_ENUM, 'No', false, false, false, false, array('Yes','No'));
        $this->initVar('moderator', XOBJ_DTYPE_ENUM, 'No', false, false, false, false, array('Yes','No'));
        $this->initVar('speaker', XOBJ_DTYPE_ENUM, 'No', false, false, false, false, array('Yes','No'));
        $this->initVar('data', XOBJ_DTYPE_ARRAY, array(), false);
    }

}

/**
 * Class XalkyUsersHandler
 */
class XalkyUsersHandler extends XoopsPersistableObjectHandler
{

    /**
     * @param null|object $db
     */
    function __construct(&$db)
    {
        parent::__construct($db, "xalky_users", 'XalkyUsers', 'id', 'referer');
    }

}
