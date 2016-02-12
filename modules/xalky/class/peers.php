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
 * Class XalkyPeers
 *
 */
class XalkyPeers extends XoopsObject
{
	
    /**
     *
     */
    function __construct()
    {
    	
        $this->XoopsObject();
   		$this->initVar('peer-id', XOBJ_DTYPE_TXTBOX, md5(null), false);
   		$this->initVar('peer-sitename', XOBJ_DTYPE_TXTBOX, '', false, 200);
   		$this->initVar('peer-slogan', XOBJ_DTYPE_TXTBOX, '', false, 200);
   		$this->initVar('peer-description', XOBJ_DTYPE_OTHER, '', false, 34999);
   		$this->initVar('peer-email', XOBJ_DTYPE_TXTBOX, '', false, 200);
        $this->initVar('api-uri', XOBJ_DTYPE_TXTBOX, '', false, 200);
        $this->initVar('api-uri-callback', XOBJ_DTYPE_TXTBOX, '', false, 200);
        $this->initVar('api-uri-profile', XOBJ_DTYPE_TXTBOX, '', false, 200);
        $this->initVar('api-uri-data', XOBJ_DTYPE_TXTBOX, '', false, 200);
        $this->initVar('aes-support', XOBJ_DTYPE_ENUM, 'Yes', true, false, false, false, array('Yes','No'));
        $this->initVar('remote', XOBJ_DTYPE_ENUM, 'No', true, false, false, false, array('Yes','No'));
        $this->initVar('seeder', XOBJ_DTYPE_ENUM, 'No', true, false, false, false, array('Yes','No'));
        $this->initVar('banned', XOBJ_DTYPE_ENUM, 'No', true, false, false, false, array('Yes','No'));
        $this->initVar('priviledged', XOBJ_DTYPE_ENUM, 'No', true, false, false, false, array('Yes','No'));
        $this->initVar('application', XOBJ_DTYPE_TXTBOX, '', false, 30);
        $this->initVar('version', XOBJ_DTYPE_TXTBOX, '1.0.1', false, 20);
        $this->initVar('heard', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('called', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('down', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('created', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('ping', XOBJ_DTYPE_FLOAT, 0, false);
        $this->initVar('ping-delay', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('ping-next', XOBJ_DTYPE_INT, 0, false);
    }

}

/**
 * Class XalkyPeersHandler
 */
class XalkyPeersHandler extends XoopsPersistableObjectHandler
{

    /**
     * @param null|object $db
     */
    function __construct(&$db)
    {
        parent::__construct($db, "xalky_peers", 'XalkyPeers', 'peer-id', 'peer-sitename');
    }

}
