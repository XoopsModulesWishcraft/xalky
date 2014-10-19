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

// Class to provide static encoding methods
class XalkyEncoding {

	// Helper function to store special chars as we cannot use static class members in PHP4:
	function getSpecialChars() {
		static $specialChars;
		if(!$specialChars) {
			// As &apos; is not supported by IE, we use &#39; as replacement for "'":
			$specialChars = array('&'=>'&amp;', '<'=>'&lt;', '>'=>'&gt;', "'"=>'&#39;', '"'=>'&quot;');	
		}
		return $specialChars;
	}

	// Helper function to store Regular expression for NO-WS-CTL as we cannot use static class members in PHP4:
	function getRegExp_NO_WS_CTL() {
		static $regExp_NO_WS_CTL;
		if(!$regExp_NO_WS_CTL) {
			// Regular expression for NO-WS-CTL, non-whitespace control characters (RFC 2822), decimal 1–8, 11–12, 14–31, and 127:
			$regExp_NO_WS_CTL = '/[\x0\x1\x2\x3\x4\x5\x6\x7\x8\xB\xC\xE\xF\x10\x11\x12\x13\x14\x15\x16\x17\x18\x19\x1A\x1B\x1C\x1D\x1E\x1F\x7F]/';
		}
		return $regExp_NO_WS_CTL;
	}

	function convertEncoding($str, $charsetFrom, $charsetTo) {
		if(function_exists('mb_convert_encoding')) {
			return mb_convert_encoding($str, $charsetTo, $charsetFrom);
		}
		if(function_exists('iconv')) {
			return iconv($charsetFrom, $charsetTo, $str);
		}
		if(($charsetFrom == 'UTF-8') && ($charsetTo == 'ISO-8859-1')) {
			return utf8_decode($str);
		}
		if(($charsetFrom == 'ISO-8859-1') && ($charsetTo == 'UTF-8')) {
			return utf8_encode($str);
		}
		return $str;
	}

	function htmlEncode($str, $contentCharset='UTF-8') {
		switch($contentCharset) {
			case 'UTF-8':
				// Encode only special chars (&, <, >, ', ") as entities:
				return XalkyEncoding::encodeSpecialChars($str);
				break;
			case 'ISO-8859-1':
			case 'ISO-8859-15':
				// Encode special chars and all extended characters above ISO-8859-1 charset as entities, then convert to content charset:
				return XalkyEncoding::convertEncoding(XalkyEncoding::encodeEntities($str, 'UTF-8', array(
					0x26, 0x26, 0, 0xFFFF,	// &
					0x3C, 0x3C, 0, 0xFFFF,	// <
					0x3E, 0x3E, 0, 0xFFFF,	// >
					0x27, 0x27, 0, 0xFFFF,	// '
					0x22, 0x22, 0, 0xFFFF,	// "
					0x100, 0x2FFFF, 0, 0xFFFF	// above ISO-8859-1
				)), 'UTF-8', $contentCharset);
				break;
			default:
				// Encode special chars and all characters above ASCII charset as entities, then convert to content charset:
				return XalkyEncoding::convertEncoding(XalkyEncoding::encodeEntities($str, 'UTF-8', array(
					0x26, 0x26, 0, 0xFFFF,	// &
					0x3C, 0x3C, 0, 0xFFFF,	// <
					0x3E, 0x3E, 0, 0xFFFF,	// >
					0x27, 0x27, 0, 0xFFFF,	// '
					0x22, 0x22, 0, 0xFFFF,	// "
					0x80, 0x2FFFF, 0, 0xFFFF	// above ASCII
				)), 'UTF-8', $contentCharset);
		}
	}

	function encodeSpecialChars($str) {
		return strtr($str, XalkyEncoding::getSpecialChars());
	}

	function decodeSpecialChars($str) {
		return strtr($str, array_flip(XalkyEncoding::getSpecialChars()));
	}

	function encodeEntities($str, $encoding='UTF-8', $convmap=null) {
		if($convmap && function_exists('mb_encode_numericentity')) {
			return mb_encode_numericentity($str, $convmap, $encoding);
		}
		return htmlentities($str, ENT_QUOTES, $encoding);
	}

	function decodeEntities($str, $encoding='UTF-8', $htmlEntitiesMap=null) {
		// Due to PHP bug #25670, html_entity_decode does not work with UTF-8 for PHP versions < 5:
		if(function_exists('html_entity_decode') && version_compare(phpversion(), 5, '>=')) {
			// Replace numeric and literal entities:
			$str = html_entity_decode($str, ENT_QUOTES, $encoding);
			// Replace additional literal HTML entities if an HTML entities map is given:
			if($htmlEntitiesMap) {
				$str = strtr($str, $htmlEntitiesMap);
			}
		} else {
			// Replace numeric entities:
			$str = preg_replace('~&#([0-9]+);~e', 'XalkyEncoding::unicodeChar("\\1")', $str);
			$str = preg_replace('~&#x([0-9a-f]+);~ei', 'XalkyEncoding::unicodeChar(hexdec("\\1"))', $str);
			// Replace literal entities:
			$htmlEntitiesMap = $htmlEntitiesMap ? $htmlEntitiesMap : array_flip(get_html_translation_table(HTML_ENTITIES, ENT_QUOTES));
			$str = strtr($str, $htmlEntitiesMap);
		}
		return $str;
	}

	function unicodeChar($c) {
		if($c <= 0x7F) {
			return chr($c);
		} else if($c <= 0x7FF) {
			return chr(0xC0 | $c >> 6) . chr(0x80 | $c & 0x3F);
		} else if($c <= 0xFFFF) {
			return chr(0xE0 | $c >> 12) . chr(0x80 | $c >> 6 & 0x3F)
										. chr(0x80 | $c & 0x3F);
		} else if($c <= 0x10FFFF) {
			return chr(0xF0 | $c >> 18) . chr(0x80 | $c >> 12 & 0x3F)
										. chr(0x80 | $c >> 6 & 0x3F)
										. chr(0x80 | $c & 0x3F);
		} else {
			return null;
		}
	}

	function removeUnsafeCharacters($str) {
		// Remove NO-WS-CTL, non-whitespace control characters (RFC 2822), decimal 1–8, 11–12, 14–31, and 127:
		return preg_replace(XalkyEncoding::getRegExp_NO_WS_CTL(), '', $str);
	}

}
?>