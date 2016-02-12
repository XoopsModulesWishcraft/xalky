<?php
/**
 * xoAppUrl Smarty compiler plug-in
 *
 * See the enclosed file LICENSE for licensing information.
 * If you did not receive this file, get it at http://www.fsf.org/copyleft/gpl.html
 *
 * @copyright   The XOOPS project http://www.xoops.org/
 * @license     GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @author		Skalpa Keo <skalpa@xoops.org>
 * @package		xos_opal
 * @subpackage	xos_opal_Smarty
 * @since       2.0.14
 * @version		$Id: compiler.xoAppUrl.php 12033 2013-09-14 03:16:44Z beckmi $
 */

/**
 * Inserts the A Href for Modal of Xalky
 *
 */
function smarty_compiler_xalkyModal($argStr, &$compiler)
{
	$moduleHandler = xoops_getHandler('module');
	$xalkyModule = $moduleHandler->getByDirname(basename(dirname(__DIR__)));
	if (is_object($xalkyModule))
	{
    	return "<a id=\"xalky\" href=\"#xalkyModal\">".$xalkyModule->getVar('name')."</a>";
	}
}
