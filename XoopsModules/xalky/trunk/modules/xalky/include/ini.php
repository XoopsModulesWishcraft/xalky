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

/*
* set the error reporting level
* http://uk.php.net/error_reporting
*/

error_reporting(E_ALL & ~E_NOTICE);

/*
* enable display errors
* set to 0 for production servers 
* 0 Off - 1 On
*/

ini_set("display_errors", true);

/*
* enable log errors
* 0 Off - 1 On
*/

ini_set("log_errors", true);

/*
* if error logging enabled above
* file to save error messages too
*/

ini_set("error_log", dirname(__DIR__)."/error_log.txt");	

/*
* Sets the default timezone used by all date/time functions in a script
* PHP 5 >= 5.1.0
* http://php.net/manual/en/function.date-default-timezone-set.php
*/

if(phpversion() >= '5.1.0')
{
	date_default_timezone_set("UTC");
}

?>