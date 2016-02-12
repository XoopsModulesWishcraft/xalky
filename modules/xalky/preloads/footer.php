<?php
/**
 * Xalky - Footer Preloader - XOOPS Chat Rooms
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
// defined('XOOPS_ROOT_PATH') || die('XOOPS root path not defined');


require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'header.php';


/**
 * Class XalkyFooterPreload
 */
class XalkyFooterPreload extends XoopsPreloadItem
{

    /**
     * @param $args
     */
    function eventCoreHeaderAddmeta($args)
    {
        if (file_exists($GLOBALS['xalkyContent']) && is_object($GLOBALS['xoopsTpl']) && is_object($GLOBALS['xoTheme']))
        {
        	$GLOBALS['xoTheme']->addStylesheet('xoops.css');
        	$GLOBALS['xoTheme']->addScript('browse.php?Frameworks/jquery/jquery.js');
        	$GLOBALS['xoTheme']->addScript('browse.php?Frameworks/jquery/jquery.ui.js');
        	$GLOBALS['xoTheme']->addStylesheet(XOOPS_URL . '/modules/xalky/assets/css/normalize.min.css');
        	$GLOBALS['xoTheme']->addStylesheet(XOOPS_URL . '/modules/xalky/assets/css/animate.min.css');
        	$GLOBALS['xoTheme']->addScript(XOOPS_URL . '/modules/xalky/assets/js/animatedModal.js');
        	
        	ob_start();
        	include $GLOBALS['xalkyContent'];
        	$GLOBALS['xoopsTpl']->assign('modal_content',ob_get_clean());
        	ob_start();
        	$GLOBALS['xoopsTpl']->display(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'xalky_modal.html');
        	self::contentHTML(true, ob_get_clean());
        }
    }
    
    function eventCoreFooterEnd($args)
    {
    	echo "\n\n\n".self::contentHTML(false, '');
    }
    
    private function contentHTML($set = false, $html = '')
    {
    	static $_content = '';
    	switch ($set)
    	{
    		case false:
    			return $_content;
    			break;
    		case true:
    			$_content = $html;
    			break;
    	}
    	return true;
    	}
    }
}
