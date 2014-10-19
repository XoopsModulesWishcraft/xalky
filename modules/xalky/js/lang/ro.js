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
	
	login: '%s se autentifică pe Chat.',
	logout: '%s iese de pe Chat.',
	logoutTimeout: '%s a fost scos de pe Chat (Timeout).',
	logoutIP: '%s a fost scos de pe Chat (Adresă IP incorectă).',
	logoutKicked: '%s a fost scos de pe Chat  (Dat afară).',
	channelEnter: '%s se alătură canalului.',
	channelLeave: '%s părăseşte canalul.',
	privmsg: '(şopteşte)',
	privmsgto: '(şopteşte lui %s)',
	invite: '%s vă invită să vă alăturaţi %s.',
	inviteto: 'Invitaţia trimisă de dumneavoastră către %s de a se alătura canalului %s a fost trimisă.',
	uninvite: '%s vă cere să paraşiţi canalul %s.',
	uninviteto: 'Cererea dumnevoastră către %s de a părăsi canalul %s a fost trimisă.',	
	queryOpen: 'Canal privat deschis către %s.',
	queryClose: 'Canalul privat către %s s-a închis.',
	ignoreAdded: 'Am adăugat utilizatorul %s la lista de utilizatori ignoraţi.',
	ignoreRemoved: 'Am şters utilizatorul %s din lista de utilizatori ignoraţi.',
	ignoreList: 'Utilizatori ignoraţi:',
	ignoreListEmpty: 'Nu a fost listat nici-un utilizator ignorat.',
	who: 'Utilizatori activi:',
	whoChannel: 'Online Users in channel %s:',
	whoEmpty: 'Nici-un utilzator activ in canalul respectiv.',
	list: 'Canale disponibile:',
	bans: 'Utilizatori care au accesul interzis la chat:',
	bansEmpty: 'Nu a fost listat nici-un utilizator care are accesul interzis.',
	unban: 'Interzicerea accesului pentru utilizatorul %s a fost revocată.',
	whois: 'Utilizatorul %s - adresă IP:',
	whereis: 'User %s is in channel %s.',
	roll: '%s aruncă %s si îi cade %s.',
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
	joinChannel: 'Alăturăte canalului %s',
	cite: '%s a spus:',
	urlDialog: 'Vă rugăm introduceţi adresa (URL) al paginii web:',
	deleteMessage: 'Delete this chat message',
	deleteMessageConfirm: 'Really delete the selected chat message?',
	errorCookiesRequired: 'Aveţi nevoie de cookies activate pentru acest chat.',
	errorUserNameNotFound: 'Eroare: Utilizatorul %s nu a fost găsit.',
	errorMissingText: 'Eroare: Nu aţi introdus nici-un text.',
	errorMissingUserName: 'Eroare: Nu aţi introdus nici-un nume de utilizator.',
	errorInvalidUserName: 'Error: Invalid username.',
	errorUserNameInUse: 'Error: Username already in use.',
	errorMissingChannelName: 'Eroare: Nu aţi introdus nici-un canal.',
	errorInvalidChannelName: 'Eroare: Nume de canal incorect: %s',
	errorPrivateMessageNotAllowed: 'Eroare: Mesajele private sunt interzise.',
	errorInviteNotAllowed: 'Eroare: Nu aveţi voie să invitaţi pe nimeni pe acest canal.',
	errorUninviteNotAllowed: 'Eroare: Nu aveţi voie sa cereţi cuiva de pe acest canal să părăsesca canalul.',
	errorNoOpenQuery: 'Eroare: Nici-un canal privat deschis.',
	errorKickNotAllowed: 'Eroare: Nu aveţi voie să dati afară pe %s.',
	errorCommandNotAllowed: 'Eroare: Comanda interzisă: %s',
	errorUnknownCommand: 'Eroare: Comanda necunoscută: %s',
	errorMaxMessageRate: 'Error: You exceeded the maximum number of messages per minute.',
	errorConnectionTimeout: 'Eroare: Connection timeout. Please try again.',
	errorConnectionStatus: 'Eroare: Statusul conexiunii: %s',
	errorSoundIO: 'Error: Failed to load sound file (Flash IO Error).',
	errorSocketIO: 'Error: Connection to socket server failed (Flash IO Error).',
	errorSocketSecurity: 'Error: Connection to socket server failed (Flash Security Error).',
	errorDOMSyntax: 'Error: Invalid DOM Syntax (DOM ID: %s).'
	
}