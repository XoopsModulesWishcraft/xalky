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
	
	login: '%s دخول.',
	logout: '%s خروج.',
	logoutTimeout: '%s تم تسجيل الخروج (Timeout).',
	logoutIP: '%s تم تسجيل الخروج (Invalid IP address).',
	logoutKicked: '%s تم تسجيل الخروج (Kicked).',
	channelEnter: '%s دخول المحطة.',
	channelLeave: '%s خروج.',
	privmsg: '(رسالة خاصة)',
	privmsgto: '(رسالة خاصة الى %s)',
	invite: '%s يدعوك الى %s.',
	inviteto: 'دعوتك لـ %s للإنضمام الى %s تم ارسالها.',
	uninvite: '%s الغاء دعوتك من %s.',
	uninviteto: 'الغاء الدعوة من %s للـ %s تم ارسالها.',	
	queryOpen: 'تم فتح نافذة خاصة مع %s.',
	queryClose: 'النافذة الخاصة مع %s تم غلقها.',
	ignoreAdded: 'اضيف %s الى قائمة التجاهل.',
	ignoreRemoved: 'حذف %s من قائمة التجاهل.',
	ignoreList: 'اعضاء متجاهلين:',
	ignoreListEmpty: 'لا يوجد اعضاء تم تجاهلهم.',
	who: 'المستخدمين المتواجدين:',
	whoChannel: 'Online Users in channel %s:',
	whoEmpty: 'لا يوجد اعضاء بهذه المحطة.',
	list: 'المحطات المتوفرة:',
	bans: 'اعضاء محجوبين:',
	bansEmpty: 'لا يوجد اعضاء محجوبين.',
	unban: 'حظر العضو %s تم الغائه.',
	whois: 'الأى بى للعضو %s:',
	whereis: 'User %s is in channel %s.',
	roll: '%s rolls %s and gets %s.',
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
	joinChannel: 'الإنضمام للمحطة %s',
	cite: '%s كتب:',
	urlDialog: 'من فضلك ادخل الرابط (URL) لعنوان الأنترنت:',
	deleteMessage: 'Delete this chat message',
	deleteMessageConfirm: 'Really delete the selected chat message?',
	errorCookiesRequired: 'الكوكييز مطلوبة لهذا الشات.',
	errorUserNameNotFound: 'خطأ: العضو %s لم يتم العثور عليه.',
	errorMissingText: 'خطأ: نص الرسالة مفقود.',
	errorMissingUserName: 'خطأ: اسم المستخدم مفقود.',
	errorInvalidUserName: 'Error: Invalid username.',
	errorUserNameInUse: 'Error: Username already in use.',
	errorMissingChannelName: 'خطأ: اسم المحطة مفقود.',
	errorInvalidChannelName: 'خطأ: اسم المحطة غير صحيح: %s',
	errorPrivateMessageNotAllowed: 'خطأ: غير مسموح بالرسائل الخاصة.',
	errorInviteNotAllowed: 'خطأ: غير مسموح بدعوة الأخرين.',
	errorUninviteNotAllowed: 'خطأ: غير مسموح بإلغاء دعوات الأخرين.',
	errorNoOpenQuery: 'خطأ: لم يتم فتح اى نوافذ خاصة.',
	errorKickNotAllowed: 'خطأ: غير مسموح لك بطرد احد %s.',
	errorCommandNotAllowed: 'خطأ: غير مسموح بالأمر: %s',
	errorUnknownCommand: 'خطأ: امر غير معروف: %s',
	errorMaxMessageRate: 'Error: You exceeded the maximum number of messages per minute.',
	errorConnectionTimeout: 'خطأ: وقت الأتصال استنفذ. من فضلك حاول مرة اخرى.',
	errorConnectionStatus: 'خطأ: حالة الأتصال: %s',
	errorSoundIO: 'Error: Failed to load sound file (Flash IO Error).',
	errorSocketIO: 'Error: Connection to socket server failed (Flash IO Error).',
	errorSocketSecurity: 'Error: Connection to socket server failed (Flash Security Error).',
	errorDOMSyntax: 'Error: Invalid DOM Syntax (DOM ID: %s).'
	
}