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
 * Class XalkyWhois
 *
 */
class XalkyWhois extends XoopsObject
{
	
    /**
     *
     */
    function __construct()
    {
    	
        $this->XoopsObject();
   		$this->initVar('id', XOBJ_DTYPE_TXTBOX, md5(null), false, 32);
   		$this->initVar('whois', XOBJ_DTYPE_ARRAY, array(), false);
   		$this->initVar('emails', XOBJ_DTYPE_ARRAY, array(), false);
        $this->initVar('created', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('instances', XOBJ_DTYPE_INT, 0, false);
    }

}

/**
 * Class XalkyWhoisHandler
 */
class XalkyWhoisHandler extends XoopsPersistableObjectHandler
{

    /**
     * @param null|object $db
     */
    function __construct(&$db)
    {
        parent::__construct($db, "xalky_whois", 'XalkyWhois', 'id', 'referer');
    }

}
