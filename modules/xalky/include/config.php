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
 * @subpackage		kernel
 * @description		Chronolabs XOOPS Module for Chat and Walky Talky Services
 * 
 */


// Define Xalky Chat user roles:
define('_XALKY_CHATBOT',		4);
define('_XALKY_ADMIN',		3);
define('_XALKY_MODERATOR',		2);
define('_XALKY_USER',		1);
define('_XALKY_GUEST',		0);

// Xalky Chat config parameters:
$config = array();

// Available languages:
$config['langAvailable'] = array('ar','bg','bp','ca','cy','cz','de','dk','el','en','es','et','fi','fr','gl','he','hr','hu','in','it','ka','kr','ja','nl','no','pl','ro','ru','sk','sl','sr','sv','tr','uk','zh','zh-tw');
// Default language:
$config['langDefault'] = _LANGCODE;
// Language names:
$config['langNames'] = array('ar'=>'عربي','bg'=>'Български','bp'=>'Português (Brasil)','ca'=>'Català','cy'=>'Cymraeg','cz'=>'Česky','de'=>'Deutsch','dk'=>'Dansk','el'=>'Ελληνικα','en'=>'English','es'=>'Español',
	'et'=>'Eesti','fi'=>'Suomi','fr'=>'Français','gl'=>'Galego','he'=>'עברית','hr' => 'Hrvatski','hu' => 'Magyar','in'=>'Bahasa Indonesia','it'=>'Italiano','ja'=>'日本語','ka'=>'ქართული','kr'=>'한 글','nl'=>'Nederlands',
	'no'=>'Norsk','pl'=> 'Polski','ro'=>'România','ru'=>'Русский','sk'=> 'Slovenčina','sl'=>'Slovensko','sr'=>'Srpski','sv'=> 'Svenska','tr'=>'Türkçe','uk'=>'Українська','zh'=>'中文 (简体)','zh- tw'=>'中文 (繁體)');

// Available styles:
$config['styleAvailable'] = array('beige','black','grey','Oxygen','Lithium','Sulfur','Cobalt','Mercury','Radium','prosilver','subsilver2','subblack2','subSilver','Core','MyBB','vBulletin');
// Default style:
$config['styleDefault'] = $GLOBALS['xoopsModuleConfig']['defaultstyle'];

// The encoding used for the XHTML xalky:
$config['xalkyEncoding'] = _CHARSET;
// The encoding of the data source, like userNames and channelNames:
$config['sourceEncoding'] = _CHARSET;
// The xalky-type of the XHTML page (e.g. "text/html", will be set dependent on browser capabilities if set to null):
$config['xalkyType'] = null;

// Session name used to identify the session cookie:
$config['sessionName'] = 'xalky-' . $GLOBALS['xoopsConfig']['session_name'];
// Prefix added to every session key:
$config['sessionKeyPrefix'] = 'xalky--';
// The lifetime of the language, style and setting cookies in days:
$config['sessionCookieLifeTime'] = $GLOBALS['xoopsConfig']['session_expire'];
// The path of the cookies, '/' allows to read the cookies from all directories:
$config['sessionCookiePath'] = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// The domain of the cookies, defaults to the hostname of the server if set to null:
$config['sessionCookiePath'] = '.'.$_SERVER['HTTP_HOST'];
// If enabled, cookies must be sent over secure (SSL/TLS encrypted) connections:
$config['sessionCookieSecure'] = null;

// Default channelName used together with the defaultChannelID if no channel with this ID exists:
$config['defaultChannelName'] = $GLOBALS['xoopsModuleConfig']['defaultchannel'];
// ChannelID used when no channel is given:
$config['defaultChannelID'] = 0;
// Defines an array of channelIDs (e.g. array(0, 1)) to limit the number of available channels, will be ignored if set to null:
$config['limitChannelList'] = null;

// UserID plus this value are private channels (this is also the max userID and max channelID):
$config['privateChannelDiff'] = 500000000;
// UserID plus this value are used for private messages:
$config['privateMessageDiff'] = 1000000000;

// Enable/Disable private Channels:
$config['allowPrivateChannels'] = $GLOBALS['xoopsModuleConfig']['privatechannels'];
// Enable/Disable private Messages:
$config['allowPrivateMessages'] = $GLOBALS['xoopsModuleConfig']['privatemessages'];

// Private channels should be distinguished by either a prefix or a suffix or both (no whitespace):
$config['privateChannelPrefix'] = $GLOBALS['xoopsModuleConfig']['channelprefix'];
// Private channels should be distinguished by either a prefix or a suffix or both (no whitespace):
$config['privateChannelSuffix'] = $GLOBALS['xoopsModuleConfig']['channelsuffix'];

// If enabled, users will be logged in automatically as guest users (if allowed), if not authenticated:
$config['forceAutoLogin'] = $GLOBALS['xoopsModuleConfig']['autologin'];

// Defines if login/logout and channel enter/leave are displayed:
$config['showChannelMessages'] = $GLOBALS['xoopsModuleConfig']['showmessages'];

// If enabled, the xalky will only be accessible for the admin:
$config['xalkyClosed'] = $GLOBALS['xoopsModuleConfig']['closed'];
// Defines the timezone offset in seconds (-126060 to 126060) - if null, the server timezone is used:
$config['timeZoneOffset'] = null;
// Defines the hour of the day the xalky is opened (0 - closingHour):
$config['openingHour'] = $GLOBALS['xoopsModuleConfig']['openinghour'];
// Defines the hour of the day the xalky is closed (openingHour - 24):
$config['closingHour'] = $GLOBALS['xoopsModuleConfig']['closinghour'];
// Defines the weekdays the xalky is opened (0=Sunday to 6=Saturday):
$config['openingWeekDays'] = $GLOBALS['xoopsModuleConfig']['opendays'];

// Enable/Disable guest logins:
$config['allowGuestLogins'] = $GLOBALS['xoopsModuleConfig']['allowguests'];
// Enable/Disable write access for guest users - if disabled, guest users may not write messages:
$config['allowGuestWrite'] = $GLOBALS['xoopsModuleConfig']['allowguestswrite'];
// Allow/Disallow guest users to choose their own userName:
$config['allowGuestUserName'] = $GLOBALS['xoopsModuleConfig']['allowguestusername'];
// Guest users should be distinguished by either a prefix or a suffix or both (no whitespace):
$config['guestUserPrefix'] = $GLOBALS['xoopsModuleConfig']['guestprefix'];
// Guest users should be distinguished by either a prefix or a suffix or both (no whitespace):
$config['guestUserSuffix'] = $GLOBALS['xoopsModuleConfig']['guestsuffix'];
// Guest userIDs may not be lower than this value (and not higher than privateChannelDiff):
$config['minGuestUserID'] = 1;

// Allow/Disallow users to change their userName (Nickname):
$config['allowNickChange'] = $GLOBALS['xoopsModuleConfig']['allownickchange'];
// Changed userNames should be distinguished by either a prefix or a suffix or both (no whitespace):
$config['changedNickPrefix'] = $GLOBALS['xoopsModuleConfig']['nickprefix'];
// Changed userNames should be distinguished by either a prefix or a suffix or both (no whitespace):
$config['changedNickSuffix'] = $GLOBALS['xoopsModuleConfig']['nicksuffix'];

// Allow/Disallow registered users to delete their own messages:
$config['allowUserMessageDelete'] = $GLOBALS['xoopsModuleConfig']['usermsgdelete'];

// The userID used for ChatBot messages:
$config['xalkyBotID'] = 2147483647;
// The userName used for ChatBot messages
$config['xalkyBotName'] = $GLOBALS['xoopsModuleConfig']['botname'];

// Minutes until a user is declared inactive (last status update) - the minimum is 2 minutes:
$config['inactiveTimeout'] = $GLOBALS['xoopsModuleConfig']['inactivetimeout'];
// Interval in minutes to check for inactive users:
$config['inactiveCheckInterval'] = $GLOBALS['xoopsModuleConfig']['inactiveinterval'];

// Defines if messages are shown which have been sent before the user entered the channel:
$config['requestMessagesPriorChannelEnter'] = $GLOBALS['xoopsModuleConfig']['priorchannel'];
// Defines an array of channelIDs (e.g. array(0, 1)) for which the previous setting is always true (will be ignored if set to null):
$config['requestMessagesPriorChannelEnterList'] = $GLOBALS['xoopsModuleConfig']['priorchannellist'];
// Max time difference in hours for messages to display on each request:
$config['requestMessagesTimeDiff'] = $GLOBALS['xoopsModuleConfig']['timediff'];
// Max number of messages to display on each request:
$config['requestMessagesLimit'] = $GLOBALS['xoopsModuleConfig']['limit'];

// Max users in xalky (does not affect moderators or admins):
$config['maxUsersLoggedIn'] = $GLOBALS['xoopsModuleConfig']['maxusers'];
// Max userName length:
$config['userNameMaxLength'] = $GLOBALS['xoopsModuleConfig']['namemaxlength'];
// Max messageText length:
$config['messageTextMaxLength'] = $GLOBALS['xoopsModuleConfig']['maxchars'];
// Defines the max number of messages a user may send per minute:
$config['maxMessageRate'] = $GLOBALS['xoopsModuleConfig']['msgrate'];

// Defines the default time in minutes a user gets banned if kicked from a moderator without ban minutes parameter:
$config['defaultBanTime'] =$GLOBALS['xoopsModuleConfig']['bantime'];

// Argument that is given to the handleLogout JavaScript method:
$config['logoutData'] = $GLOBALS['xoopsModuleConfig']['logoutpath'];

// If true, checks if the user IP is the same when logged in:
$config['ipCheck'] = $GLOBALS['xoopsModuleConfig']['ipcheck'];

// Defines the max time difference in hours for logs when no period or search condition is given:
$config['logsRequestMessagesTimeDiff'] = 1;
// Defines how many logs are returned on each logs request:
$config['logsRequestMessagesLimit'] = 10;

// Defines the earliest year used for the logs selection:
$config['logsFirstYear'] = 2007;

// Defines if old messages are purged from the database:
$config['logsPurgeLogs'] = false;
// Max time difference in days for old messages before they are purged from the database:
$config['logsPurgeTimeDiff'] = 365;

// Defines if registered users (including moderators) have access to the logs (admins are always granted access):
$config['logsUserAccess'] = false;
// Defines a list of channels (e.g. array(0, 1)) to limit the logs access for registered users, includes all channels the user has access to if set to null:
$config['logsUserAccessChannelList'] = null;

// Defines if the socket server is enabled:
$config['socketServerEnabled'] = false;
// Defines the hostname of the socket server used to connect from client side (the server hostname is used if set to null):
$config['socketServerHost'] = null;
// Defines the IP of the socket server used to connect from server side to broadcast update messages:
$config['socketServerIP'] = '127.0.0.1';
// Defines the port of the socket server:
$config['socketServerPort'] = 1935;
// This ID can be used to distinguish between different xalky installations using the same socket server:
$config['socketServerChatID'] = 0;

if (!isset($_SESSION['xalky']['config']) || md5(json_encode($_SESSION['xalky']['config'])) != md5(json_encode($config)))
	$_SESSION['xalky']['config'] = $config;
?>
