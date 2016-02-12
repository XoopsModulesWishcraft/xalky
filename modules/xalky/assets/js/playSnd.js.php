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

require_once (dirname(dirname(__DIR__))."/include/config.php");

/**
 * Declare header
*/

header("content-type: application/x-javascript");

?>
/**
 * Xalky - Play Sounds + SFX - XOOPS Chat Rooms
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
 * play sound
 *
 */
function xalkySound(playSound)
{
	var flashvars = {};
	flashvars.sndfilename = playSound;
	var params = {};
	params.play = "true";
	params.loop = "false";
	params.menu = "false";
	params.scale = "noscale";
	// params.wmode = "transparent";	
    params.height = "200";
    params.width = "200";
	params.bgcolour = "#FFFFFF";
	var attributes = {};
	attributes.align = "top";
	swfobject.embedSWF("<?php echo $xalkyConfig['chatroomUrl']; ?>/assets/swf/playSnd.swf", "playSndDiv", "100%", "1", "9.0.0", "<?php echo $xalkyConfig['chatroomUrl']; ?>/assets/swf/expressInstall.swf", flashvars, params, attributes);
}