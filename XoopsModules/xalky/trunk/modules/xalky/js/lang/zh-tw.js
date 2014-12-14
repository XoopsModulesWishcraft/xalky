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
	
	login: '%s已登入',
	logout: '%s已登出',
	logoutTimeout: '%s已登出（連線逾時）',
	logoutIP: '%s已登出（無效的IP address）',
	logoutKicked: '%s已登出（被踢掉了）',
	channelEnter: '%s已進入',
	channelLeave: '%s已離開',
	privmsg: '（悄悄話）',
	privmsgto: '（給 %s 的悄悄話）',
	invite: '%s 邀請您進入 %s .',
	inviteto: '請 %s 進入 %s 的邀請函已發送',
	uninvite: '%s 於 %s 收回了邀請函',
	uninviteto: '請 %s 進入 %s 的邀請函已收回',	
	queryOpen: '允許 %s 進入私人房',
	queryClose: '已不允許 %s 進入私人房',
	ignoreAdded: '增加 %s 至忽略清單',
	ignoreRemoved: '移除 %s 自忽略清單',
	ignoreList: '已忽略來自以下人士的訊息：',
	ignoreListEmpty: '忽略清單是空的。',
	who: '已上線會員：',
	whoChannel: '在 %s 的已上線會員：',
	whoEmpty: '沒有人在那裡。',
	list: '可進入的房間：',
	bans: '被禁止使用的人：',
	bansEmpty: '沒有被禁止使用的人。',
	unban: '開放之前被禁的使用者 %s ：',
	whois: '使用者 %s - IP address:',
	whereis: '使用者 %s 正在 %s 。',
	roll: '%s 擲了 %s 得到了 %s 。',
	nick: '%s 現在暱稱改為 %s',
	toggleUserMenu: '開啟為 %s 特製的功能表',
	userMenuLogout: '登出',
	userMenuWho: '顯示已上線會員',
	userMenuList: '顯示可進入的房間',
	userMenuAction: '描述動作',
	userMenuRoll: '擲骰子',
	userMenuNick: '換暱稱',
	userMenuEnterPrivateRoom: '進入私人房',
	userMenuSendPrivateMessage: '傳送悄悄話',
	userMenuDescribe: '傳送私人動作',
	userMenuOpenPrivateChannel: '允許進入私人房',
	userMenuClosePrivateChannel: '不允許進入私人房',
	userMenuInvite: '邀請某人（進入自己的私人房）',
	userMenuUninvite: '收回邀請',
	userMenuIgnore: '忽略／接受某人的訊息',
	userMenuIgnoreList: '顯示忽略清單',
	userMenuWhereis: '顯示所在地',
	userMenuKick: '踢掉／禁人',
	userMenuBans: '顯示被禁的使用者',
	userMenuWhois: '顯示 IP',
	unbanUser: '開放之前被禁的使用者 %s ',
	joinChannel: '進入 %s',
	cite: '%s 說：',
	urlDialog: '請輸入網址（URL）：',
	deleteMessage: '刪除這條訊息',
	deleteMessageConfirm: '真的要刪除這條訊息嗎？',
	errorCookiesRequired: '請打開Cookies！',
	errorUserNameNotFound: '錯誤：沒有使用者 %s ……',
	errorMissingText: '錯誤：未輸入訊息……',
	errorMissingUserName: '錯誤：未輸入使用者帳號……',
	errorInvalidUserName: '錯誤：帳號錯誤……',
	errorUserNameInUse: '錯誤：帳號使用中……',
	errorMissingChannelName: '錯誤：不存在的房間……',
	errorInvalidChannelName: '錯誤：不存在的房間： %s ……',
	errorPrivateMessageNotAllowed: '錯誤：不允許使用悄悄話功能……',
	errorInviteNotAllowed: '錯誤：不允許邀請別人來這裡……',
	errorUninviteNotAllowed: '錯誤：不允許收回邀請……',
	errorNoOpenQuery: '錯誤：沒有私人房是開放的……',
	errorKickNotAllowed: '錯誤：你不能把 %s 踢掉！',
	errorCommandNotAllowed: '錯誤：不允許使用的指令： %s ……',
	errorUnknownCommand: '錯誤：無法辨識的命令： %s ……',
	errorMaxMessageRate: '錯誤：已達到一分鐘所能發送的最大訊息數量……',
	errorConnectionTimeout: '錯誤：連線逾時，請再連一次……',
	errorConnectionStatus: '錯誤：連線狀態： %s ',
	errorSoundIO: '錯誤：無法讀取音效檔 (Flash IO Error).',
	errorSocketIO: '錯誤：無法連線到伺服器的socket (Flash IO Error).',
	errorSocketSecurity: '錯誤：無法連線到伺服器的socket (Flash Security Error).',
	errorDOMSyntax: '錯誤：無效的 DOM 語法 (DOM ID: %s).'
	
}