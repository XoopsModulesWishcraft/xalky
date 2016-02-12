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
 * Class XalkyBlowfishing
 *
 */
class XalkyBlowfishing extends XoopsObject
{
	
    /**
     *
     */
    function __construct()
    {
        $this->XoopsObject();
   		$this->initVar('salt-id', XOBJ_DTYPE_TXTBOX, md5(microtime(true).XOOPS_DB_USER.XOOPS_DB_PASS.XOOPS_DB_NAME.XOOPS_DB_PREFIX.XOOPS_URL), true, 32);
   		$this->initVar('source-peer-id', XOBJ_DTYPE_TXTBOX, md5(NULL), true, 32);
   		$this->initVar('remote-peer-id', XOBJ_DTYPE_TXTBOX, md5(NULL), true, 32);
        $this->initVar('source-salt', XOBJ_DTYPE_TXTBOX, '', false, 128);
        $this->initVar('remote-salt', XOBJ_DTYPE_TXTBOX, '', false, 128);
        $this->initVar('created', XOBJ_DTYPE_INT, time(), false);
        $this->initVar('updated', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('expires', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('date-zone', XOBJ_DTYPE_TXTBOX, date_default_timezone_get(), false, 64);
    }

}

/**
 * Class XalkyBlowfishingHandler
 */
class XalkyBlowfishingHandler extends XoopsPersistableObjectHandler
{

    /**
     * @param null|object $db
     */
    function __construct(&$db)
    {
        parent::__construct($db, "xalky_blowfishing", 'XalkyBlowfishing', 'salt-id', 'remote-salt');
    }

}
