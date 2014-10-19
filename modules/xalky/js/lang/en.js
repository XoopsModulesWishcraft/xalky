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
	
	login: '%s logs into the Chat.',
	logout: '%s logs out of the Chat.',
	logoutTimeout: '%s has been logged out (Timeout).',
	logoutIP: '%s has been logged out (Invalid IP address).',
	logoutKicked: '%s has been logged out (Kicked).',
	channelEnter: '%s enters the channel.',
	channelLeave: '%s leaves the channel.',
	privmsg: '(whispers)',
	privmsgto: '(whispers to %s)',
	invite: '%s invites you to join %s.',
	inviteto: 'Your invitation to %s to join channel %s has been sent.',
	uninvite: '%s uninvites you from channel %s.',
	uninviteto: 'Your uninvitation to %s for channel %s has been sent.',	
	queryOpen: 'Private channel opened to %s.',
	queryClose: 'Private channel to %s closed.',
	ignoreAdded: 'Added %s to the ignore list.',
	ignoreRemoved: 'Removed %s from the ignore list.',
	ignoreList: 'Ignored Users:',
	ignoreListEmpty: 'No ignored Users listed.',
	who: 'Online Users:',
	whoChannel: 'Online Users in channel %s:',
	whoEmpty: 'No online users in the given channel.',
	list: 'Available channels:',
	bans: 'Banned Users:',
	bansEmpty: 'No banned Users listed.',
	unban: 'Ban of user %s revoked.',
	whois: 'User %s - IP address:',
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
	joinChannel: 'Join channel %s',
	cite: '%s said:',
	urlDialog: 'Please enter the address (URL) of the webpage:',
	deleteMessage: 'Delete this chat message',
	deleteMessageConfirm: 'Really delete the selected chat message?',
	errorCookiesRequired: 'Cookies are required for this chat.',
	errorUserNameNotFound: 'Error: User %s not found.',
	errorMissingText: 'Error: Missing message text.',
	errorMissingUserName: 'Error: Missing username.',
	errorInvalidUserName: 'Error: Invalid username.',
	errorUserNameInUse: 'Error: Username already in use.',
	errorMissingChannelName: 'Error: Missing channel name.',
	errorInvalidChannelName: 'Error: Invalid channel name: %s',
	errorPrivateMessageNotAllowed: 'Error: Private messages are not allowed.',
	errorInviteNotAllowed: 'Error: You are not allowed to invite someone to this channel.',
	errorUninviteNotAllowed: 'Error: You are not allowed to uninvite someone from this channel.',
	errorNoOpenQuery: 'Error: No private channel open.',
	errorKickNotAllowed: 'Error: You are not allowed to kick %s.',
	errorCommandNotAllowed: 'Error: Command not allowed: %s',
	errorUnknownCommand: 'Error: Unknown command: %s',
	errorMaxMessageRate: 'Error: You exceeded the maximum number of messages per minute.',
	errorConnectionTimeout: 'Error: Connection timeout. Please try again.',
	errorConnectionStatus: 'Error: Connection status: %s',
	errorSoundIO: 'Error: Failed to load sound file (Flash IO Error).',
	errorSocketIO: 'Error: Connection to socket server failed (Flash IO Error).',
	errorSocketSecurity: 'Error: Connection to socket server failed (Flash Security Error).',
	errorDOMSyntax: 'Error: Invalid DOM Syntax (DOM ID: %s).'
	
}