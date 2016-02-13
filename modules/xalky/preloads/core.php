<?php
/**
 * Xalky - Core Preloader - XOOPS Chat Rooms
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
// defined('XOOPS_ROOT_PATH') || die('XOOPS root path not defined');

/**
 * Class XalkyCorePreload
 */
class XalkyCorePreload extends XoopsPreloadItem
{

	/**
	 * @param $args
	 */
	function eventCoreIncludeCommonEnd($args)
	{
		// Sets Randomisation Seeds for MT_RAND() Function
		$parts = explode(".", microtime(true));
		mt_srand(mt_rand(-microtime(true), microtime(true))/$parts[1]);
		mt_srand(mt_rand(-microtime(true), microtime(true))/$parts[1]);
		mt_srand(mt_rand(-microtime(true), microtime(true))/$parts[1]);
		mt_srand(mt_rand(-microtime(true), microtime(true))/$parts[1]);
		$parts = explode(".", microtime(true));
		mt_srand(mt_rand(-microtime(true), microtime(true))/$parts[1]);
		mt_srand(mt_rand(-microtime(true), microtime(true))/$parts[1]);
		mt_srand(mt_rand(-microtime(true), microtime(true))/$parts[1]);
		mt_srand(mt_rand(-microtime(true), microtime(true))/$parts[1]);
		$parts = explode(".", microtime(true));
		mt_srand(mt_rand(-microtime(true), microtime(true))/$parts[1]);
		mt_srand(mt_rand(-microtime(true), microtime(true))/$parts[1]);
		mt_srand(mt_rand(-microtime(true), microtime(true))/$parts[1]);
		mt_srand(mt_rand(-microtime(true), microtime(true))/$parts[1]);
		
		// Sets Contextual Headers with Encryption Blowfish Keys for Discovery method
		header('Xalky-URL-Site: '. XOOPS_URL);
		header('Xalky-URL-Chat: '. XOOPS_URL . '/modules/xalky/');
		header('Xalky-API-Callback: '. XOOPS_URL . '/modules/xalky/%s/callback.api');
		header('Xalky-API-Data: '. XOOPS_URL . '/modules/xalky/data/callback.api');
		header('Xalky-API-Profile: '. XOOPS_URL . '/modules/xalky/profile/callback.api');
		header('Xalky-AES-Support: Yes');
		header('Xalky-Peer-Sitename: '.$GLOBALS['xoopsConfig']['sitename']);
		header('Xalky-Peer-Slogan: '.$GLOBALS['xoopsConfig']['slogan']);
		header('Xalky-Peer-Email: '.$GLOBALS['xoopsConfig']['admin_email']);
		header('Xalky-Peer-ID: '.($GLOBALS['xalkyPeerID'] = self::getPeerID()));
		if (!is_array($_SESSION['xalkyOldIssuedSalt']))
			$_SESSION['xalkyOldIssuedSalt'] = array();
		if (isset($_SESSION['xalkyIssuedSalt']))
			$_SESSION['xalkyOldIssuedSalt'][microtime(true)] = $_SESSION['xalkyIssuedSalt'];
		header('Xalky-AES-Salt: '. ($_SESSION['xalkyIssuedSalt'] = $GLOBALS['xalkyIssuedSalt'] = self::getSalt(0,127,'')));
	}
    
    /**
     * Generates a Blowfish Cipher Salt
     * 
     * @param number $level
     * @param number $maximum
     * @param string $ret
     */
    private function getSalt($level = 0, $maximum = 127, $ret = '')
    {
    	if ($level<=$maximum)
    	switch ((string)mt_rand(0,4))
    	{
	    	case "0":
	    		$ret .= chr(mt_rand(ord('a'), ord('z')));
	    		break;
	    	case "1":
	    		$ret .= chr(mt_rand(ord('A'), ord('Z')));
	    		break;
	    	case "2":
	    		$ret .= chr(mt_rand(ord('0'), ord('9')));
	    		break;
	    	case "3":
	    		$ret .= chr(mt_rand(ord('!'), ord('|')));
	    		break;
    		case "4":
    			$ret .= chr(mt_rand(ord('@'), ord('?')));
    			break;
    	}
    	else
    		return $ret;
    	return self::getSalt(++$level, $maximum, $ret);
    }
    
	/**
	 * Gets the Peer ID for Xalky
	 */
    private function getPeerID()
    {
    	return md5(NULL);
    }
}
