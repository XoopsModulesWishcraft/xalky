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

global $xalkyConfig, $xalkyModule;

$xalkyConfig = array();
$configHandler = xoops_getHandler('config');
$moduleHandler = xoops_getHandler('module');
$xalkyModule = $moduleHandler->getByDirname(basename(dirname(__DIR__)));
if (is_object($xalkyModule))
{
	foreach($configHandler->getConfigList($xalkyModule->getVar('mid')) as $key => $value)
	{
		if (strpos($key, "_"))
		{
			$parts = explode("_", $key);
			$base = $parts[0];
			unset($parts[0]);
			$xalkyConfig[$base][implode("_", $parts)] = $value;
		} else {
			$xalkyConfig[$key] = $value;
		}
	}
} else
	die(_MI_XALKY_ERROR_NOMODULE_OBJECT);
?>