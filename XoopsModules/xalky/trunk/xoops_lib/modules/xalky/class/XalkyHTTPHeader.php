<?php
/*
 * Chronolabs XOOPS Chat Module - xALKY
 * 
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 
 * @copyright 		Chronolabs Cooperative http://labs.coop
 * @license 		General Software Licence (https://web.labs.coop/public/legal/general-software-license/10,3.html)
 * @package 		xalky
 * @since 			1.111
 * @author 			Antony Cipher <cipher@labs.coop>
 * @author 			Simon Roberts <meshy@labs.coop>
 * @subpackage		classes
 * @description		Chronolabs XOOPS Module for Chat and Walky Talky Services
 * 
 */

// Class to manage HTTP header
class XalkyHTTPHeader {

	var $_contentType;
	var $_constant;
	var $_noCache;

	function XalkyHTTPHeader($encoding='UTF-8', $contentType=null, $noCache=true) {
		if($contentType) {
			$this->_contentType = $contentType.'; charset='.$encoding;
			$this->_constant = true;
		} else {
			if(isset($_SERVER['HTTP_ACCEPT']) && (strpos($_SERVER['HTTP_ACCEPT'],'application/xhtml+xml') !== false)) {
				$this->_contentType = 'application/xhtml+xml; charset='.$encoding;
			} else {
	 			$this->_contentType = 'text/html; charset='.$encoding;
			}
			$this->_constant = false;
		}
		$this->_noCache = $noCache;
	}

	// Method to send the HTTP header:
	function send() {
		// Prevent caching:
		if($this->_noCache) {
			header('Cache-Control: no-cache, must-revalidate');
			header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		}
		
		// Send the content-type-header:
		header('Content-Type: '.$this->_contentType);
		
		// Send vary header if content-type varies (important for proxy-caches):
		if(!$this->_constant) {
			header('Vary: Accept');
		}
	}
 
	// Method to return the content-type string:
	function getContentType() {
		// Return the content-type string:
		return $this->_contentType;
	}

}
?>