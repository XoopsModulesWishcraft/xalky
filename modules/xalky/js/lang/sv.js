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
	
	login: '%s loggade in på Chatten.',
	logout: '%s loggade ut från Chatten.',
	logoutTimeout: '%s loggades ut (Timeout).',
	logoutIP: '%s loggades ut (Felaktig IPadress).',
	logoutKicked: '%s har loggats ut (Utsparkad).',
	channelEnter: '%s ansluter till kanalen.',
	channelLeave: '%s lämnade kanalen.',
	privmsg: '(Viskning)',
	privmsgto: '(Viskar till %s)',
	invite: '%s bjuder in dig att ansluta till %s.',
	inviteto: 'Din inbjudan till %s att ansluta till kanalen %s har skickats.',
	uninvite: '%s upphävde inbjudan till dig från kanalen %s.',
	uninviteto: 'Din uphävning av inbjudan till %s för kanalen %s har skickats.',	
	queryOpen: 'Privat kanal öppnad för %s.',
	queryClose: 'Privat kanal för %s är stängd.',
	ignoreAdded: '%s blev inlagd i ignoreringslistan.',
	ignoreRemoved: 'Ta bort %s från ignoreringslistan.',
	ignoreList: 'Ignorerade användare:',
	ignoreListEmpty: 'Inga ignorerade Användare.',
	who: 'Användare OnLine:',
	whoChannel: 'Användare OnLine i kanalen %s:',
	whoEmpty: 'Inga användare OnLine i kanalen.',
	list: 'Tillgängliga kanaler:',
	bans: 'Bannade Användare:',
	bansEmpty: 'Inga bannade Användare.',
	unban: 'Banningen av %s är upphävd.',
	whois: '%s - IPadress:',
	whereis: '%s är i kanalen %s.',
	roll: '%s rullar %s och får %s.',
	nick: '%s har bytt namn till %s.',
	toggleUserMenu: 'Skifta användarmeny för %s',
	userMenuLogout: 'Logga Ut',
	userMenuWho: 'Lista användare OnLine',
	userMenuList: 'Lista tillgängliga kanaler',
	userMenuAction: 'Beskriv händelse',
	userMenuRoll: 'Rulla tärningar',
	userMenuNick: 'Ändra användarnamn',
	userMenuEnterPrivateRoom: 'Gå in i privat rum',
	userMenuSendPrivateMessage: 'Skicka privat meddelande',
	userMenuDescribe: 'Skicka privat händelse',
	userMenuOpenPrivateChannel: 'Öppna privat kanal',
	userMenuClosePrivateChannel: 'Stäng privat kanal',
	userMenuInvite: 'Bjud in',
	userMenuUninvite: 'Upphäv inbjudan',
	userMenuIgnore: 'Ignorera/Acceptera',
	userMenuIgnoreList: 'Lista ignorerade användare',
	userMenuWhereis: 'Visa kanal',
	userMenuKick: 'Sparka ut/Banna',
	userMenuBans: 'Lista bannade användare',
	userMenuWhois: 'Visa IP',
	unbanUser: 'Upphäv banningen av %s',
	joinChannel: 'Anslut till kanalen %s',
	cite: '%s sa:',
	urlDialog: 'Skriv in adressen (URL) till websidan:',
	deleteMessage: 'Radera detta meddelande',
	deleteMessageConfirm: 'Vill du radera det valda meddelandet?',
	errorCookiesRequired: 'Cookies[kakor] krävs för denna Chat.',
	errorUserNameNotFound: 'Error: Användaren %s hittades inte.',
	errorMissingText: 'Error: Meddelandetext saknas.',
	errorMissingUserName: 'Error: Användarnamn saknas.',
	errorInvalidUserName: 'Error: Ogiltigt användarnamn.',
	errorUserNameInUse: 'Error: Användarnamnet används redan.',
	errorMissingChannelName: 'Error: Kanalnamn saknas.',
	errorInvalidChannelName: 'Error: Felaktigt kanalnamn: %s',
	errorPrivateMessageNotAllowed: 'Error: Privata meddelanden är inte tillåtna.',
	errorInviteNotAllowed: 'Error: Du saknar rättighet att bjuda in någon till denna kanalen.',
	errorUninviteNotAllowed: 'Error: Du saknar rättighet att upphäva en inbjudan till någon i denna kanalen.',
	errorNoOpenQuery: 'Error: Ingen privat kanal öppen.',
	errorKickNotAllowed: 'Error: Du saknar rättighet att sparka %s.',
	errorCommandNotAllowed: 'Error: Otillåtet kommando: %s',
	errorUnknownCommand: 'Error: Okänt kommando: %s',
	errorMaxMessageRate: 'Error: Du överskred det maxiamala antalet meddelanden per minut.',
	errorConnectionTimeout: 'Error: Anslutningen fick "timeout". Var vänlig och prova igen.',
	errorConnectionStatus: 'Error: Anslutningens status: %s',
	errorSoundIO: 'Error: Misslyckades att ladda ljudfil (Flash IO Error).',
	errorSocketIO: 'Error: Anslutningen till "socket server" misslyckades (Flash IO Error).',
	errorSocketSecurity: 'Error: Anslutningen till "socket server" misslyckades (Flash Security Error).',
	errorDOMSyntax: 'Error: Ogiltig DOM Syntax (DOM ID: %s).'

}