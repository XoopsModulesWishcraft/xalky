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

// Class to provide multibyte enabled string methods
class XalkyString {

	function subString($str, $start=0, $length=null, $encoding='UTF-8') {
		if($length === null) {
			$length = XalkyString::stringLength($str);
		}		
		if(function_exists('mb_substr')) {
			return mb_substr($str, $start, $length, $encoding);
		} else if(function_exists('iconv_substr')) {
			return iconv_substr($str, $start, $length, $encoding);
		} else {
			return substr($str, $start, $length);
		}
	}
	
	function stringLength($str, $encoding='UTF-8') {
		if(function_exists('mb_strlen')) {
			return mb_strlen($str, $encoding);
		} else if(function_exists('iconv_strlen')) {
			return iconv_strlen($str, $encoding);
		} else {
			return strlen($str);
		}
	}

}
?>