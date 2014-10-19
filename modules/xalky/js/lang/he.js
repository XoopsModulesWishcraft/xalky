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
 * @subpackage		javascript
 * @description		Chronolabs XOOPS Module for Chat and Walky Talky Services
 * 
 */
// Ajax Chat language Object:
var xalkyChatLang = {
	
	login: '%s נכנס לתוך הצאט.',
	logout: '%s יוצא מהצאט.',
	logoutTimeout: '%s הוצא מהצאט (היה לא זמין).',
	logoutIP: '%s הוצא מהצאט (כתובת מחשב בלתי חוקית).',
	logoutKicked: '%s הוצא מהצאט (הועף/נבעט).',
	channelEnter: '%s נכנס לתוך הערוץ.',
	channelLeave: '%s יוצא מהערוץ.',
	privmsg: '(לוחש)',
	privmsgto: '(לוחש ל%s)',
	invite: '%s מזמין אותך להצטרף לערוץ %s.',
	inviteto: 'ההזמנה שלך עבור %s להצטרף לערוץ %s נשלחה.',
	uninvite: '%s ביטל את הזמנתו לערוץ %s.',
	uninviteto: 'ביטול ההזמנה שלך עבור %s להצטרף לערוץ %s נשלח.',
	queryOpen: 'ערוץ פרטי עבור %s נפתח.',
	queryClose: 'ערוץ פרטי עבור %s נסגר.',
	ignoreAdded: 'המשתמש %s נוסף לרשימת ההתעלמות.',
	ignoreRemoved: 'המשתמש %s נמחק מרשימת ההתעלמות.',
	ignoreList: 'משתמשים אשר אתה מתעלם מהם:',
	ignoreListEmpty: 'אין משתמשים ברשימה.',
	who: 'משתמשים מחוברים:',
	whoChannel: 'Online Users in channel %s:',
	whoEmpty: 'אין משתמשים מחוברים בערוץ.',
	list: 'ערוצים פתוחים:',
	bans: 'משתמשים חסומים:',
	bansEmpty: 'אין משתמשים חסומים.',
	unban: 'בוטלה החסימה נגד המשתמש %s.',
	whois: 'כתובת המחשב של המשתמש %s:',
	whereis: 'User %s is in channel %s.',
	roll: '%s מגלגל %s ומקבל %s.',
	nick: '%s is now known as %s.',
	toggleUserMenu: 'Toggle user menu for %s',
	userMenuLogout: 'Logout',
	userMenuWho: 'List online users',
	userMenuList: 'List available channels',
	userMenuAction: 'Describe action',
	userMenuRoll: 'Roll dice',
	userMenuNick: 'Change username',
	userMenuEnterPrivateRoom: 'Enter private room',
	userMenuSendPrivateMessage: 'Send private message',
	userMenuDescribe: 'Send private action',
	userMenuOpenPrivateChannel: 'Open private channel',
	userMenuClosePrivateChannel: 'Close private channel',
	userMenuInvite: 'Invite',
	userMenuUninvite: 'Uninvite',
	userMenuIgnore: 'Ignore/Accept',
	userMenuIgnoreList: 'List ignored users',
	userMenuWhereis: 'Display channel',
	userMenuKick: 'Kick/Ban',
	userMenuBans: 'List banned users',
	userMenuWhois: 'Display IP',
	unbanUser: 'Revoke ban of user %s',
	joinChannel: 'הצטרף לערוץ %s',
	cite: '%s אמר:',
	urlDialog: 'אנא הכנס את כתובת האינטרנט (URL) של הדף:',
	deleteMessage: 'Delete this chat message',
	deleteMessageConfirm: 'Really delete the selected chat message?',
	errorCookiesRequired: 'הצאט מבקש עוגיות כדי לפעול. אנא רד לחנות לקנות.',
	errorUserNameNotFound: 'שגיאה: המשתמש %s לא נמצא.',
	errorMissingText: 'שגיאה: חסר טקסט בהודעה.',
	errorMissingUserName: 'שגיאה: חסר שם משתמש.',
	errorInvalidUserName: 'Error: Invalid username.',
	errorUserNameInUse: 'Error: Username already in use.',
	errorMissingChannelName: 'שגיאה: חסר שם ערוץ.',
	errorInvalidChannelName: 'שגיאה: שם ערוץ לא חוקי: %s',
	errorPrivateMessageNotAllowed: 'שגיאה: הודעות פרטיות אסורות לשימוש.',
	errorInviteNotAllowed: 'שגיאה: אסור לך להזמין אנשים לערוץ זה.',
	errorUninviteNotAllowed: 'שגיאה: אסור לך לבטל הזמנות של אנשים לערוץ זה.',
	errorNoOpenQuery: 'שגיאה: ערוץ פרטי לא פתוח.',
	errorKickNotAllowed: 'שגיאה: אסור לך להעיף את %s.',
	errorCommandNotAllowed: 'שגיאה: פקודה אסורה: %s',
	errorUnknownCommand: 'שגיאה: פקודה לא ידועה: %s',
	errorMaxMessageRate: 'Error: You exceeded the maximum number of messages per minute.',
	errorConnectionTimeout: 'שגיאה: זמן חיבור פג. אנא נסה שנית.',
	errorConnectionStatus: 'שגיאת חיבור: %s',
	errorSoundIO: 'Error: Failed to load sound file (Flash IO Error).',
	errorSocketIO: 'Error: Connection to socket server failed (Flash IO Error).',
	errorSocketSecurity: 'Error: Connection to socket server failed (Flash Security Error).',
	errorDOMSyntax: 'Error: Invalid DOM Syntax (DOM ID: %s).'
	
}