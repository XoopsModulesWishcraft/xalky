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

global $xalkyConfig;
include(dirname(dirname(__DIR__))."/includes/config.php");

/**
 * Declare header
*/

header("content-type: application/x-javascript");

?>

/**
 * Xalky - sentryBot engine - XOOPS Chat Rooms
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

/*
 * user
 * welcome messages
 */
var uEntryResponse = new Array();
uEntryResponse[0]="hey"; 
uEntryResponse[1]="hello";

/*
 * sentryBot
 * welcome responses
 */
var iEntryResponse = new Array();
iEntryResponse[0]="hey"; 
iEntryResponse[1]="hello";
iEntryResponse[2]="hey there";
iEntryResponse[2]="welcome";

/*
 * user
 * goodbye responses
 */
var uExitResponse = new Array();
uExitResponse[0]="bye"; 
uExitResponse[1]="see yer";
uExitResponse[2]="outta here";

/*
 * sentryBot
 * goodbye responses
 */
var iExitResponse = new Array();
iExitResponse[0]="bye"; 
iExitResponse[1]="safe journey!";
iExitResponse[2]="thanks for visiting";

/*
 * user
 * help responses
 */
var uHelpResponse = new Array();
uHelpResponse[0]="help"; 
uHelpResponse[1]="question"; 
uHelpResponse[2]="assist"; 

/*
 * sentryBot
 * help responses
 */

var iHelpResponse = new Array();
iHelpResponse[0]="If you have a question about this chat room software, please visit http://labs.coop or email errors@labs.coop for assistance."; 
