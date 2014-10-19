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

	login: '%s logger inn på Chat.',
	logout: '%s logger ut av Chat.',
	logoutTimeout: '%s har blitt utlogget (Tidsbegrensning).',
	logoutIP: '%s har blitt logget ut (Ugyldig IP Adresse).',
	logoutKicked: '%s har blitt logget ut (sparket ut).',
	channelEnter: '%s kommer inn på kanalen.',
	channelLeave: '%s forlater kanalen.',
	privmsg: '(hviskere)',
	privmsgto: '(hvisker til %s)',
	invite: '%s inviterer deg til å delta %s.',
	inviteto: 'Din invitasjon til %s å delta på kanal %s er sendt.',
	uninvite: '%s trekker din invitasjon fra kanal %s.',
	uninviteto: 'Din tilbaketrekkning av invitasjon til %s for kanal %s er sendt.', 
	queryOpen: 'Privat kanal åpnet til %s.',
	queryClose: 'Privat kanal til %s er stengt.',
	ignoreAdded: 'Lagt %s til listen over ignorerte brukere.',
	ignoreRemoved: 'Fjernet %s fra liste over ignorerte brukere.',
	ignoreList: 'Ignorerte Brukere:',
	ignoreListEmpty: 'Ingen ignorerte brukere på lista.',
	who: 'Påloggede Brukere:',
	whoChannel: 'Online Users in channel %s:',
	whoEmpty: 'Ingen påloggede brukere på valgt kanal.',
	list: 'Tilgjenglige kanaler:',
	bans: 'Utsparkede Brukere:',
	bansEmpty: 'Ingen utsparkede brukere på lista.',
	unban: 'Bruker %s fjernet fra liste over utsparkede brukere.',
	whois: 'Bruker %s - IP adresse:',
	whereis: 'User %s is in channel %s.',
	roll: '%s triller %s og får %s.',
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
	joinChannel: 'Delta på kanal %s',
	cite: '%s sa:',
	urlDialog: 'Skriv inn adressen (URL) på web siden:',
	deleteMessage: 'Delete this chat message',
	deleteMessageConfirm: 'Really delete the selected chat message?',
	errorCookiesRequired: 'Cookies er påkrevet på denne chatten.',
	errorUserNameNotFound: 'Feil: Bruker %s ble ikke funnet.',
	errorMissingText: 'Feil: Mangler meldingstekst.',
	errorMissingUserName: 'Feil: Mangler Brukernavn.',
	errorInvalidUserName: 'Error: Invalid username.',
	errorUserNameInUse: 'Error: Username already in use.',
	errorMissingChannelName: 'Feil: Mangler navn på kanal.',
	errorInvalidChannelName: 'Feil: Feil navn på kanal: %s',
	errorPrivateMessageNotAllowed: 'Feil: Private meldinger ikke tillatt.',
	errorInviteNotAllowed: 'Feil: Du har ikke lov til å invitere noen til denne kanalen.',
	errorUninviteNotAllowed: 'Feil: Du har ikke lov til å fjerne invitasjon til noen brukere på denne kanalen.',
	errorNoOpenQuery: 'Feil: Ingen private kanaler er åpne.',
	errorKickNotAllowed: 'Feil: Du har ikke lov til å sparke ut %s.',
	errorCommandNotAllowed: 'Feil: Kommando ikke tillatt: %s',
	errorUnknownCommand: 'Feil: Ukjent kommando: %s',
	errorMaxMessageRate: 'Error: You exceeded the maximum number of messages per minute.',
	errorConnectionTimeout: 'Feil: Oppkoblingstid utgått. Forsøk forsøk igjen.',
	errorConnectionStatus: 'Feil: Oppkoblingsstatus: %s',
	errorSoundIO: 'Error: Failed to load sound file (Flash IO Error).',
	errorSocketIO: 'Error: Connection to socket server failed (Flash IO Error).',
	errorSocketSecurity: 'Error: Connection to socket server failed (Flash Security Error).',
	errorDOMSyntax: 'Error: Invalid DOM Syntax (DOM ID: %s).'

}