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
	
	login: '%s se přihlásil.',
	logout: '%s se odhlásil.',
	logoutTimeout: '%s byl odhlášen (překročen timeout).',
	logoutIP: '%s byl odhlášen (neplatná IP adresa).',
	logoutKicked: '%s byl vyhozen.',
	channelEnter: '%s vstoupil do místnosti.',
	channelLeave: '%s odešel z místnosti.',
	privmsg: '(šeptá)',
	privmsgto: '(šeptá %s)',
	invite: '%s tě zve do místnosti %s.',
	inviteto: 'Tvoje pozvání %s do místnosti %s bylo odesláno.',
	uninvite: '%s odmítl pozvání do pokoje %s.',
	uninviteto: 'Tvoje pozvání %s do pokoje %s bylo odmítnuto.',	
	queryOpen: 'Soukromý rozhovor s %s byl započat.',
	queryClose: 'Soukromý rozhovor s %s byl ukončen.',
	ignoreAdded: '%s byl přidán do seznamu ignorovaných.',
	ignoreRemoved: '%s byl odebrán ze seznamu ignorovaných.',
	ignoreList: 'Seznam ignorovaných:',
	ignoreListEmpty: 'Seznam je prázdný...',
	who: 'Přihlášení uživatelé:',
	whoChannel: 'Uživatelé, přihlášení v místnosti %s:',
	whoEmpty: 'Tady nikdo není...',
	list: 'Dostupné místnosti:',
	bans: 'Vyhození uživatelé:',
	bansEmpty: 'Seznam je prázdný...',
	unban: 'Uživatel %s byl omilostněn.',
	whois: 'Uživatel %s - IP adresa:',
	whereis: 'Uživatel %s je v místnosti %s.',
	roll: '%s hodil %s a vyhrává %s.',
	nick: '%s se nyní jmenuje %s.',
	toggleUserMenu: 'Vyvolej/zhasni uživatelskou nabídku pro %s',
	userMenuLogout: 'Odhlásit',
	userMenuWho: 'Seznam přihlášených uživatelů',
	userMenuList: 'Seznam místností',
	userMenuAction: 'Co právě dělám',
	userMenuRoll: 'Hodit kostkou',
	userMenuNick: 'Změnit jméno uživatele',
	userMenuEnterPrivateRoom: 'Vstoupit do soukromé místnosti',
	userMenuSendPrivateMessage: 'Poslat soukromou zprávu',
	userMenuDescribe: 'Co právě dělám (soukromě)',
	userMenuOpenPrivateChannel: 'Zahájit soukromý rozhovor',
	userMenuClosePrivateChannel: 'Ukončit soukromý rozhovor',
	userMenuInvite: 'Pozvat',
	userMenuUninvite: 'Odmítnout pozvání',
	userMenuIgnore: 'Ignorovat/Přijmout',
	userMenuIgnoreList: 'Seznam ignorovaných uživatelů',
	userMenuWhereis: 'Zobrazit místnost',
	userMenuKick: 'Vyhodit/Zablokovat',
	userMenuBans: 'Seznam vyhozených uživatelů',
	userMenuWhois: 'Zobrazit IP adresu',
	unbanUser: 'Omilostnit uživatele %s',
	joinChannel: 'Vstoupit do místnosti %s',
	cite: '%s prohlásil:',
	urlDialog: 'Zadej, prosím adresu (URL) stránky:',
	deleteMessage: 'Vymazat zprávu',
	deleteMessageConfirm: 'Opravdu vymazat tuto zprávu ?',
	errorCookiesRequired: 'Pro tento chat je nutno povolit Cookies.',
	errorUserNameNotFound: 'Chyba: Uživatel %s nebyl nalezen.',
	errorMissingText: 'Chyba: Schází text zprávy.',
	errorMissingUserName: 'Chyba: Schází jméno uživatele.',
	errorInvalidUserName: 'Chyba: Neplatné jméno uživatele.',
	errorUserNameInUse: 'Chyba: Jméno uživatele už je používáno.',
	errorMissingChannelName: 'Chyba: Schází název místnosti.',
	errorInvalidChannelName: 'Chyba: Neplatný název místnosti: %s',
	errorPrivateMessageNotAllowed: 'Chyba: Soukromé zprávy nejsou povoleny.',
	errorInviteNotAllowed: 'Chyba: Nejsi oprávněn zvát do této místnosti.',
	errorUninviteNotAllowed: 'Chyba: Nejsi oprávněn odmítat pozvání z této místnosti.',
	errorNoOpenQuery: 'Chyba: Nebyl zahájen žádný soukromý rozhovor.',
	errorKickNotAllowed: 'Chyba: Nemáš právo vyhodit %s.',
	errorCommandNotAllowed: 'Chyba: Tento příkaz není povolen: %s',
	errorUnknownCommand: 'Chyba: Neznámý příkaz: %s',
	errorMaxMessageRate: 'Chyba: Překročil jsi maximální počet zpráv za minutu.',
	errorConnectionTimeout: 'Chyba: Čas připojení vypršel. Připoj se znovu.',
	errorConnectionStatus: 'Chyba: Stav připojení: %s',
	errorSoundIO: 'Chyba: Nepodařilo se přehrát zvukový soubor (Flash IO Error).',
	errorSocketIO: 'Chyba: Nepodařilo se připojení k serveru (Flash IO Error).',
	errorSocketSecurity: 'Chyba: Připojení k serveru selhalo (Flash Security Error).',
	errorDOMSyntax: 'Chyba: Neplatná syntaxe DOM (DOM ID: %s).'
	
}