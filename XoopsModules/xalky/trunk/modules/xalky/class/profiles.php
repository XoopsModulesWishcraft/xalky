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
 * Class XalkyProfiles
 *
 */
class XalkyProfiles extends XoopsObject
{
	
    /**
     *
     *
     */
    function __construct()
    {
    	
        $this->XoopsObject();
   		$this->initVar('profile-id', XOBJ_DTYPE_INT, null, false);
   		$this->initVar('peer-uid', XOBJ_DTYPE_INT, null, false);
   		$this->initVar('peering-id', XOBJ_DTYPE_TXTBOX, md5(NULL), false, 32);
   		$this->initVar('peer-id', XOBJ_DTYPE_TXTBOX, md5(NULL), false, 32);
   		$this->initVar('peer-uname', XOBJ_DTYPE_TXTBOX, '', false, 64);
   		$this->initVar('peer-name', XOBJ_DTYPE_TXTBOX, '', false, 64);
   		$this->initVar('peer-profile-url', XOBJ_DTYPE_TXTBOX, '', false, 250);
        $this->initVar('peer-avatar-url', XOBJ_DTYPE_TXTBOX, '', false, 250);
    }

}

/**
 * Class XalkyProfilesHandler
 */
class XalkyProfilesHandler extends XoopsPersistableObjectHandler
{

    /**
     * @param null|object $db
     */
    function __construct(&$db)
    {
        parent::__construct($db, "xalky_profiles", 'XalkyProfiles', 'id', 'referer');
    }

}
