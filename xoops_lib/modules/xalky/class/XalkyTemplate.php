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

// Class to handle HTML templates
class XalkyTemplate {

	var $xalkyChat;
	var $_regExpTemplateTags;
	var $_templateFile;
	var $_contentType;
	var $_content;
	var $_parsedContent;

	// Constructor:
	function XalkyTemplate(&$xalkyChat, $templateFile, $contentType=null) {
		$this->xalkyChat = $xalkyChat;
		$this->_regExpTemplateTags = '/\[(\w+?)(?:(?:\/)|(?:\](.+?)\[\/\1))\]/se';		
		$this->_templateFile = $templateFile;
		$this->_contentType = $contentType;
	}

	function display()
	{
		include $GLOBALS['xoops']->path('/header.php');
		$GLOBALS['xoopsTpl']->assign('xalky_options', array_merge($this->xalkyChat->_config, $this->getConfigurations()));
		$GLOBALS['xoopsTpl']->assign('xalky_language', $this->xalkyChat->_lang);
		$GLOBALS['xoopsTpl']->assign('xoops_pagetitle', $this->xalkyChat->getLang('title') . " :|: " . $GLOBALS['xoopsConfig']['sitename']);
		$file = str_replace(array('html','htm', 'tpl'), 'php', basename($this->_templateFile));
		if (file_exist(_XALKY_LIB_PATH . 'templates' . DIRECTORY_SEPARATOR .  $file))
			include _XALKY_LIB_PATH . 'templates' . DIRECTORY_SEPARATOR .  $file;
		echo $GLOBALS['xoopsTpl']->display($this->_templateFile);
		include $GLOBALS['xoops']->path('/footer.php');		
	}
	
	function getParsedContent() {
		if(!$this->_parsedContent) {
			$this->parseContent();
		}
		return $this->_parsedContent;
	}

	function getContent() {
		if(!$this->_content) {
			$this->_content = XalkyFileSystem::getFileContents($this->_templateFile);
		}
		return $this->_content;
	}

	function parseContent() {
		$this->_parsedContent = $this->getContent();
		// Remove the XML declaration if the content-type is not xml:		
		if($this->_contentType && (strpos($this->_contentType,'xml') === false)) {
			$doctypeStart = strpos($this->_parsedContent, '<!DOCTYPE ');
			if($doctypeStart !== false) {
				// Removing the XML declaration (in front of the document type) prevents IE<7 to go into "Quirks mode":
				$this->_parsedContent = substr($this->_parsedContent, $doctypeStart);	
			}		
		}
	}

	function getConfigurations() {
		$config = array();
		$config['XALKY_URL'] = $this->xalkyChat->htmlEncode($this->xalkyChat->getChatURL());
		$config['LANG'] = $this->xalkyChat->htmlEncode($this->xalkyChat->getLang($tagContent));				
		$config['LANG_CODE'] = $this->xalkyChat->getLangCode();
		$config['BASE_DIRECTION'] = $this->getBaseDirectionAttribute();
		$config['CONTENT_ENCODING'] = $this->xalkyChat->getConfig('contentEncoding');
		$config['CONTENT_TYPE'] =  $this->_contentType;
		$config['LOGIN_URL'] =  ($this->xalkyChat->getRequestVar('view') == 'logs') ? './?view=logs' : './';
		$config['USER_NAME_MAX_LENGTH'] = $this->xalkyChat->getConfig('userNameMaxLength');
		$config['MESSAGE_TEXT_MAX_LENGTH'] = $this->xalkyChat->getConfig('messageTextMaxLength');
		$config['LOGIN_CHANNEL_ID'] =  $this->xalkyChat->getValidRequestChannelID();
		$config['SESSION_NAME'] =  $this->xalkyChat->getConfig('sessionName');
		$config['COOKIE_EXPIRATION'] = $this->xalkyChat->getConfig('sessionCookieLifeTime');
		$config['COOKIE_PATH'] =  $this->xalkyChat->getConfig('sessionCookiePath');
		$config['COOKIE_DOMAIN'] = $this->xalkyChat->getConfig('sessionCookieDomain');
		$config['COOKIE_SECURE'] = $this->xalkyChat->getConfig('sessionCookieSecure');
		$config['CHAT_BOT_NAME'] =  rawurlencode($this->xalkyChat->getConfig('xalkyBotName'));
		$config['CHAT_BOT_ID'] =  $this->xalkyChat->getConfig('xalkyBotID');
		if($this->xalkyChat->getConfig('allowUserMessageDelete'))
			$config['ALLOW_USER_MESSAGE_DELETE'] =  1;
		else
			$config['ALLOW_USER_MESSAGE_DELETE'] =  0;
		$config['INACTIVE_TIMEOUT'] =  $this->xalkyChat->getConfig('inactiveTimeout');
		$config['PRIVATE_CHANNEL_DIFF'] =  $this->xalkyChat->getConfig('privateChannelDiff');
		$config['PRIVATE_MESSAGE_DIFF'] =   $this->xalkyChat->getConfig('privateMessageDiff');
		if($this->xalkyChat->getConfig('showChannelMessages'))
			$config['SHOW_CHANNEL_MESSAGES'] =  1;
		else
			$config['SHOW_CHANNEL_MESSAGES'] =  0;
		if($this->xalkyChat->getConfig('socketServerEnabled'))
			$config['SOCKET_SERVER_ENABLED'] =  1;
		else
			$config['SOCKET_SERVER_ENABLED'] =  0;
		if($this->xalkyChat->getConfig('socketServerHost')) {
			$socketServerHost = $this->xalkyChat->getConfig('socketServerHost');
		} else {
			$socketServerHost = (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME']);
		}
		$config['SOCKET_SERVER_HOST'] =  rawurlencode($socketServerHost);
		$config['SOCKET_SERVER_PORT'] =  $this->xalkyChat->getConfig('socketServerPort');
		$config['SOCKET_SERVER_XALKY_ID'] =  $this->xalkyChat->getConfig('socketServerChatID');
		$config['CHANNEL_OPTIONS'] =  $this->getChannelOptionTags();
		$config['STYLE_OPTIONS'] =  $this->getStyleOptionTags();
		$config['LANGUAGE_OPTIONS'] =  $this->getLanguageOptionTags();
		$config['ERROR_MESSAGES'] =  $this->getErrorMessageTags();
		$config['LOGS_CHANNEL_OPTIONS'] =  $this->getLogsChannelOptionTags();
		$config['LOGS_YEAR_OPTIONS'] =  $this->getLogsYearOptionTags();
		$config['LOGS_MONTH_OPTIONS'] =  $this->getLogsMonthOptionTags();
		$config['LOGS_DAY_OPTIONS'] =  $this->getLogsDayOptionTags();
		$config['LOGS_HOUR_OPTIONS'] =  $this->getLogsHourOptionTags();
		return $config;
	}

	// Function to display alternating table row colors:
	function alternateRow($rowOdd='rowOdd', $rowEven='rowEven') {
		static $i;
		$i += 1;
		if($i % 2 == 0) {
			return $rowEven;
		} else {
			return $rowOdd;
		}
	}

	function getBaseDirectionAttribute() {
		$langCodeParts = explode('-', $this->xalkyChat->getLangCode());
		switch($langCodeParts[0]) {
			case 'ar':
			case 'he':
				return 'rtl';
			default:
				return 'ltr';
		}
	}

	function getStyleSheetLinkTags() {
		foreach($this->xalkyChat->getConfig('styleAvailable') as $style) {
			$alternate = ($style == $this->xalkyChat->getConfig('styleDefault')) ? '' : 'alternate ';
			$GLOBALS['xoTheme']->addStylesheet(XALKY_CSS_URL . rawurlencode($style), array('type'=>"text/css"), '', rawurlencode($style));
		}
	}

	function getChannelOptionTags() {
		$channelOptions = '';
		$channelSelected = false;
		foreach($this->xalkyChat->getChannels() as $key=>$value) {
			if($this->xalkyChat->isLoggedIn()) {
				$selected = ($value == $this->xalkyChat->getChannel()) ? ' selected="selected"' : '';
			} else {
				$selected = ($value == $this->xalkyChat->getConfig('defaultChannelID')) ? ' selected="selected"' : '';
			}
			if($selected) {
				$channelSelected = true;
			}
			$channelOptions .= '<option value="'.$this->xalkyChat->htmlEncode($key).'"'.$selected.'>'.$this->xalkyChat->htmlEncode($key).'</option>';
		}
		if($this->xalkyChat->isLoggedIn() && $this->xalkyChat->isAllowedToCreatePrivateChannel()) {
			// Add the private channel of the user to the options list:
			if(!$channelSelected && $this->xalkyChat->getPrivateChannelID() == $this->xalkyChat->getChannel()) {
				$selected = ' selected="selected"';
				$channelSelected = true;
			} else {
				$selected = '';
			}
			$privateChannelName = $this->xalkyChat->getPrivateChannelName();
			$channelOptions .= '<option value="'.$this->xalkyChat->htmlEncode($privateChannelName).'"'.$selected.'>'.$this->xalkyChat->htmlEncode($privateChannelName).'</option>';
		}
		// If current channel is not in the list, try to retrieve the channelName:
		if(!$channelSelected) {
			$channelName = $this->xalkyChat->getChannelName();
			if($channelName !== null) {
				$channelOptions .= '<option value="'.$this->xalkyChat->htmlEncode($channelName).'" selected="selected">'.$this->xalkyChat->htmlEncode($channelName).'</option>';
			} else {
				// Show an empty selection:
				$channelOptions .= '<option value="" selected="selected">---</option>';
			}
		}
		return $channelOptions;
	}

	function getStyleOptionTags() {
		$styleOptions = '';
		foreach($this->xalkyChat->getConfig('styleAvailable') as $style) {
			$selected = ($style == $this->xalkyChat->getConfig('styleDefault')) ? ' selected="selected"' : '';
			$styleOptions .= '<option value="'.$this->xalkyChat->htmlEncode($style).'"'.$selected.'>'.$this->xalkyChat->htmlEncode($style).'</option>';
		}
		return $styleOptions;
	}

	function getLanguageOptionTags() {
		$languageOptions = '';
		$languageNames = $this->xalkyChat->getConfig('langNames');
		foreach($this->xalkyChat->getConfig('langAvailable') as $langCode) {
			$selected = ($langCode == $this->xalkyChat->getLangCode()) ? ' selected="selected"' : '';
			$languageOptions .= '<option value="'.$this->xalkyChat->htmlEncode($langCode).'"'.$selected.'>'.$this->xalkyChat->htmlEncode($languageNames[$langCode]).'</option>';
		}
		return $languageOptions;
	}

	function getErrorMessageTags() {
		$errorMessages = '';
		foreach($this->xalkyChat->getInfoMessages('error') as $error) {
			$errorMessages .= '<div>'.$this->xalkyChat->htmlEncode($this->xalkyChat->getLang($error)).'</div>';
		}
		return $errorMessages;
	}

	function getLogsChannelOptionTags() {
		$channelOptions = '';
		$channelOptions .= '<option value="-3">------</option>';
		foreach($this->xalkyChat->getChannels() as $key=>$value) {
			if($this->xalkyChat->getUserRole() != _XALKY_ADMIN && $this->xalkyChat->getConfig('logsUserAccessChannelList') && !in_array($value, $this->xalkyChat->getConfig('logsUserAccessChannelList'))) {
				continue;
			}
			$channelOptions .= '<option value="'.$value.'">'.$this->xalkyChat->htmlEncode($key).'</option>';
		}
		$channelOptions .= '<option value="-1">'.$this->xalkyChat->htmlEncode($this->xalkyChat->getLang('logsPrivateChannels')).'</option>';
		$channelOptions .= '<option value="-2">'.$this->xalkyChat->htmlEncode($this->xalkyChat->getLang('logsPrivateMessages')).'</option>';
		return $channelOptions;
	}

	function getLogsYearOptionTags() {
		$yearOptions = '';
		$yearOptions .= '<option value="-1">----</option>';
		for($year=date('Y'); $year>=$this->xalkyChat->getConfig('logsFirstYear'); $year--) {
			$yearOptions .= '<option value="'.$year.'">'.$year.'</option>';
		}
		return $yearOptions;
	}
	
	function getLogsMonthOptionTags() {
		$monthOptions = '';
		$monthOptions .= '<option value="-1">--</option>';
		for($month=1; $month<=12; $month++) {
			$monthOptions .= '<option value="'.$month.'">'.sprintf("%02d", $month).'</option>';
		}
		return $monthOptions;
	}
	
	function getLogsDayOptionTags() {
		$dayOptions = '';
		$dayOptions .= '<option value="-1">--</option>';
		for($day=1; $day<=31; $day++) {
			$dayOptions .= '<option value="'.$day.'">'.sprintf("%02d", $day).'</option>';
		}
		return $dayOptions;
	}
	
	function getLogsHourOptionTags() {
		$hourOptions = '';
		$hourOptions .= '<option value="-1">-----</option>';
		for($hour=0; $hour<=23; $hour++) {
			$hourOptions .= '<option value="'.$hour.'">'.sprintf("%02d", $hour).':00</option>';
		}
		return $hourOptions;
	}

}
?>