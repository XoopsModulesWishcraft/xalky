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

	login: '%s Logger dig ind.',
	logout: '%s Logger dig ud.',
	logoutTimeout: '%s Er logget ud (Timeout).',
	logoutIP: '%s er logget ud (ugyldig IP addresse).',
	logoutKicked: '%s er logget ud (Kicked).',
	channelEnter: '%s kom ind i kanalen.',
	channelLeave: '%s forlod kanalen.',
	privmsg: '(hvisker)',
	privmsgto: '(hvisker til %s)',
	invite: '%s inviterede dig til at joine %s.',
	inviteto: 'Din invitation %s til at joine kanal %s er blevet sendt.',
	uninvite: '%s Du er nu ikke længere inviteret til %s.',
	uninviteto: 'Anullere invitation for %s på kanal %s.',	
	queryOpen: 'Privat kanal åben for %s.',
	queryClose: 'Privat kanal for %s lukket.',
	ignoreAdded: 'Tilføjede %s til ignorerings listen.',
	ignoreRemoved: 'fjernede %s fra ignorerings listen.',
	ignoreList: 'Ignorerede brugere:',
	ignoreListEmpty: 'Ingen ignorerede brugere.',
	who: 'Online brugere:',
	whoChannel: 'Online brugere på kanal %s:',
	whoEmpty: 'ingen online brugere på den angivne kanal.',
	list: 'Tilgængelige kanaler:',
	bans: 'Banlyste brugere:',
	bansEmpty: 'Ingen banlyste brugere på listen.',
	unban: 'Banlysning af %s ophævet.',
	whois: 'bruger %s - IP addresse:',
	whereis: 'brugeren %s er på kanal %s.',
	roll: '%s Kastede terninger %s og fik %s.',
	nick: '%s Er nu kendt som %s.',
	toggleUserMenu: 'skift bruger menu for %s',
	userMenuLogout: 'Log ud',
	userMenuWho: 'Vis online brugere',
	userMenuList: 'Vis tilgængelige kanaler',
	userMenuAction: 'Beskrivende handling',
	userMenuRoll: 'Kast terninger',
	userMenuNick: 'Skift brugernavn',
	userMenuEnterPrivateRoom: 'Gå ind i privat rum.',
	userMenuSendPrivateMessage: 'Send privat besked',
	userMenuDescribe: 'Send privat handling',
	userMenuOpenPrivateChannel: 'Åben privat kanal',
	userMenuClosePrivateChannel: 'Luk privat kanal',
	userMenuInvite: 'Inviter',
	userMenuUninvite: 'Anuller invitation',
	userMenuIgnore: 'Ignorer/Accepter',
	userMenuIgnoreList: 'Vis ignorerede brugere',
	userMenuWhereis: 'vis kanal',
	userMenuKick: 'Spark ud/Banlys',
	userMenuBans: 'Vis banlyste brugere',
	userMenuWhois: 'Vis IP adresse',
	unbanUser: 'Fjernede banlysning af brugere %s',
	joinChannel: 'Deltag i en kanal %s',
	cite: '%s sagde:',
	urlDialog: 'Venligst indsæt adressen (URL) for den pågældende hjemmeside:',
	deleteMessage: 'Fjern denne chat besked',
	deleteMessageConfirm: 'Vil du virkelig fjerne denne besked?',
	errorCookiesRequired: 'Cookies er nødvændige for denne chat',
	errorUserNameNotFound: 'FEJL: bruger %s ikke fundet.',
	errorMissingText: 'FEJL: Manglende besked.',
	errorMissingUserName: 'FEJL: Manglende brugernavn.',
	errorInvalidUserName: 'FEJL: Ugyldigt brugernavn.',
	errorUserNameInUse: 'FEJL: Brugernavnet er allerede i brug.',
	errorMissingChannelName: 'FEJL: Manglende kanal navn.',
	errorInvalidChannelName: 'FEJL: Ugyldigt kanal navn: %s',
	errorPrivateMessageNotAllowed: 'FEJL: Privat beskeder er ikke tilladt.',
	errorInviteNotAllowed: 'FEJL: Du har ikke tilstrækkelige rettigheder til at invitere til denne kanal.',
	errorUninviteNotAllowed: 'FEJL: Du har ikke tilstrækkelige rettigheder til at anullere invitationer for denne kanal.',
	errorNoOpenQuery: 'FEJL: Ingen privat kanal åben.',
	errorKickNotAllowed: 'FEJL: Du har ikke tilstrækkelige rettigheder til at sparke. %s.',
	errorCommandNotAllowed: 'FEJL: Kommando ikke tillad: %s',
	errorUnknownCommand: 'FEJL: Ukendt kommando: %s',
	errorMaxMessageRate: 'FEJL: Du har overskredet max antal beskeder per minut.',
	errorConnectionTimeout: 'FEJL: Forbindelses timeout. Prøv venligst igen.',
	errorConnectionStatus: 'FEJL: Status for forbindelse. %s',
	errorSoundIO: 'FEJL: Kunne ikke indlæse lydfil (Flash IO Fejl).',
	errorSocketIO: 'FEJL: Connection to socket server failed (Flash IO fejl).',
	errorSocketSecurity: 'FEJL: forbindelse til til socket server fejlede (Flash sikkerheds fejl).',
	errorDOMSyntax: 'FEJL: Ugyldig DOM Syntaks(DOM ID: %s).'
	
}
