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
 * Class XalkyCallbacks
 *
 */
class XalkyCallbacks extends XoopsObject
{
	
    /**
     *
     */
    function __construct()
    {
    	
        $this->XoopsObject();
   		$this->initVar('when', XOBJ_DTYPE_INT, time(), true);
        $this->initVar('uri', XOBJ_DTYPE_TXTBOX, '', true, 250);
        $this->initVar('timeout', XOBJ_DTYPE_INT, 30, false);
        $this->initVar('connection', XOBJ_DTYPE_INT, 30, false);
        $this->initVar('data', XOBJ_DTYPE_ARRAY, array(), false);
        $this->initVar('queries', XOBJ_DTYPE_ARRAY, array(), false);
        $this->initVar('fails', XOBJ_DTYPE_INT, 0, false);
    }

}

/**
 * Class XalkyCallbacksHandler
 */
class XalkyCallbacksHandler extends XoopsPersistableObjectHandler
{

    /**
     * @param null|object $db
     */
    function __construct(&$db)
    {
        parent::__construct($db, "xalky_callbacks", 'XalkyCallbacks', 'when', 'uri');
    }

}
