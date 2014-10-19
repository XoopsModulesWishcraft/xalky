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
	
	login: '%s logt in.',
	logout: '%s logt uit.',
	logoutTimeout: '%s werd uitgelogd (Timeout).',
	logoutIP: '%s is uitgelogd (Invalid IP address).',
	logoutKicked: '%s is uitgelogd (Kick door admin of moderator).',
	channelEnter: '%s komt het kanaal binnen.',
	channelLeave: '%s verlaat het kanaal.',
	privmsg: '(fluistert)',
	privmsgto: '(fluistert naar %s)',
	invite: '%s nodigt je uit om naar %s te komen.',
	inviteto: 'Je uitnodiging naar %s om het kanaal %s te bezoeken, werd verstuurd.',
	uninvite: '%s annuleert de uitnodiging van kanaal %s.',
	uninviteto: 'De annulatie van je uitnodiging aan %s voor het kanaal %s werd verstuurd.',
	queryOpen: 'Privékanaal geopend naar %s.',
	queryClose: 'Privékanaal naar %s wordt gesloten.',
	ignoreAdded: '%s toegevoegd aan de negeer lijst.',
	ignoreRemoved: '%s werd verwijderd van de negeerlijst.',
	ignoreList: 'Genegeerde gebruikers:',
	ignoreListEmpty: 'Er zijn geen genegeerde gebruikers.',
	who: 'Online Gebruikers:',
	whoChannel: 'Online Users in channel %s:',
	whoEmpty: 'Er zijn geen gebruikers in het gekozen kanaal.',
	list: 'Beschikbare kanalen:',
	bans: 'Gebande gebruikers:',
	bansEmpty: 'Er zijn geen gebande gebruikers.',
	unban: 'Ban van gebruiker %s opgeheven.',
	whois: 'Gebruiker %s - IP adres:',
	whereis: 'User %s is in channel %s.',
	roll: '%s smijt %s en krijgt %s.',
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
	joinChannel: 'Betreed kanaal %s',
	cite: '%s zei:',
	urlDialog: 'Gelieve het (URL) adres van de webpagina in te geven:',
	deleteMessage: 'Delete this chat message',
	deleteMessageConfirm: 'Really delete the selected chat message?',
	errorCookiesRequired: 'Cookies moeten aangeschakeld zijn voor deze chat.',
	errorUserNameNotFound: 'Fout: Gebruiker %s werd niet gevonden.',
	errorMissingText: 'Fout: Ontbrekende berichttekst.',
	errorMissingUserName: 'Fout: Ontbrekende Gebruikersnaam.',
	errorInvalidUserName: 'Error: Invalid username.',
	errorUserNameInUse: 'Error: Username already in use.',
	errorMissingChannelName: 'Fout: Ontbrekende kanaalnaam.',
	errorInvalidChannelName: 'Fout: Ongeldige kanaalnaam: %s',
	errorPrivateMessageNotAllowed: 'Error: Private berichten zijn niet toegestaan.',
	errorInviteNotAllowed: 'Fout: Je bent niet geautoriseerd om iemand uit te nodigen naar dit kanaal.',
	errorUninviteNotAllowed: 'Fout: Je bent niet geautoriseerd om een uitnodiging naar iemand te annuleren op dit kanaal.',
	errorNoOpenQuery: 'Fout: Er is geen privékanaal geopend.',
	errorKickNotAllowed: 'Fout: Je ben niet geautoriseerd om %s te kicken.',
	errorCommandNotAllowed: 'Fout: Opdracht is niet toegestaan: %s',
	errorUnknownCommand: 'Fout: Onbekende opdracht: %s',
	errorMaxMessageRate: 'Error: You exceeded the maximum number of messages per minute.',
	errorConnectionTimeout: 'Fout: Connection timeout. Gelieve opnieuw te proberen.',
	errorConnectionStatus: 'Fout: Verbindingsstatus: %s',
	errorSoundIO: 'Error: Failed to load sound file (Flash IO Error).',
	errorSocketIO: 'Error: Connection to socket server failed (Flash IO Error).',
	errorSocketSecurity: 'Error: Connection to socket server failed (Flash Security Error).',
	errorDOMSyntax: 'Error: Invalid DOM Syntax (DOM ID: %s).'
	
}