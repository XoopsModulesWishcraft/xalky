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
 * Class XalkyNetworking
 *
 */
class XalkyNetworking extends XoopsObject
{
	
    /**
     *
     */
    function __construct()
    {
    	
        $this->XoopsObject();
   		$this->initVar('id', XOBJ_DTYPE_TXTBOX, md5(null.microtime(false)), false, 32);
   		$this->initVar('type', XOBJ_DTYPE_ENUM, 'ipv4', true, false, false, false, array('ipv4','ipv6'));
   		$this->initVar('ipaddy', XOBJ_DTYPE_TXTBOX, '', false, 64);
   		$this->initVar('netbios', XOBJ_DTYPE_TXTBOX, '', false, 198);
   		$this->initVar('domain', XOBJ_DTYPE_TXTBOX, '', false, 128);
   		$this->initVar('country', XOBJ_DTYPE_TXTBOX, '', false, 3);
   		$this->initVar('region', XOBJ_DTYPE_TXTBOX, '', false, 128);
   		$this->initVar('city', XOBJ_DTYPE_TXTBOX, '', false, 128);
   		$this->initVar('postcode', XOBJ_DTYPE_TXTBOX, '', false, 15);
   		$this->initVar('timezone', XOBJ_DTYPE_TXTBOX, '', false, 10);
        $this->initVar('longitude', XOBJ_DTYPE_FLOAT, 0, false);
        $this->initVar('latitude', XOBJ_DTYPE_FLOAT, 0, false);
        $this->initVar('credits', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('messages', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('privates', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('owned', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('users', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('created', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('last', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('whoisids', XOBJ_DTYPE_ARRAY, array(), false);
    }

}

/**
 * Class XalkyNetworkingHandler
 */
class XalkyNetworkingHandler extends XoopsPersistableObjectHandler
{

    /**
     * @param null|object $db
     */
    function __construct(&$db)
    {
        parent::__construct($db, "xalky_networking", 'XalkyNetworking', 'id', 'referer');
    }

}
