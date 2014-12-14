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
	
	login: '%s prijavljen-a na Chat.',
	logout: '%s odjavljen-a sa Chata.',
	logoutTimeout: '%s je prijava istekla (Timeout).',
	logoutIP: '%s je prijava istekla (Invalid IP address).',
	logoutKicked: '%s je prijava istekla (Kicked).',
	channelEnter: '%s je ušao-la u sobu.',
	channelLeave: '%s izašao-la iz sobe.',
	privmsg: '(privatna poruka)',
	privmsgto: '(privatno razgovara sa %s)',
	invite: '%s vas poziva na razgovor u %s.',
	inviteto: 'Vaš poziv za razgovor sa %s u sobu %s je poslat.',
	uninvite: '%s vam otkazuje pozivnicu u sobi %s.',
	uninviteto: 'Vaše otkazivanje pozivnice za %s u sobi %s je poslato.',
	queryOpen: 'Privatna soba za %s je otvorena.',
	queryClose: 'Privatna soba za %s je zatvorena.',
	ignoreAdded: '%s je dodat u listu ignorisanih.',
	ignoreRemoved: '%s je uklonjen iz liste ignorisanih.',
	ignoreList: 'Ignorisani korisnici:',
	ignoreListEmpty: 'Lista ignorisanih korisnika je prazna.',
	who: 'Prisutni korisnici:',
	whoChannel: 'Prisutni korisnici u sobi %s:',
	whoEmpty: 'Nema prisutnih korisnika u toj sobi.',
	list: 'Dostupne sobe:',
	bans: 'Zabranjeni korisnici:',
	bansEmpty: 'Lista zabranjenih korisnika je prazna.',
	unban: 'Zabrana korisnika %s je povučena.',
	whois: 'Korisnik %s - IP adresa:',
	whereis: 'Korisnik %s je u sobi %s.',
	roll: '%s je bacio %s Rezultat %s.',
	nick: '%s je sada poznat kao %s.',
	toggleUserMenu: 'Preklopi korisnički meni za %s',
	userMenuLogout: 'Odjavljivanje',
	userMenuWho: 'Lista prisutnih korisnika',
	userMenuList: 'Lista dostupnih soba',
	userMenuAction: 'Opiši akciju',
	userMenuRoll: 'Baci kocku',
	userMenuNick: 'Promeni korisničko ime',
	userMenuEnterPrivateRoom: 'Uđi u privatnu sobu',
	userMenuSendPrivateMessage: 'Pošalji privatnu poruku',
	userMenuDescribe: 'Pošalji privatnu akciju',
	userMenuOpenPrivateChannel: 'Otvori privatnu sobu',
	userMenuClosePrivateChannel: 'Zatvori privatnu sobu',
	userMenuInvite: 'Pozvati',
	userMenuUninvite: 'Opozvati',
	userMenuIgnore: 'Ignorisati/Prihvatiti',
	userMenuIgnoreList: 'Lista ignorisanih korisnika',
	userMenuWhereis: 'Prikaži sobu',
	userMenuKick: 'Izbačen/Zabranjen',
	userMenuBans: 'Lista zabranjenih korisnika',
	userMenuWhois: 'Prikaži IP',
	unbanUser: 'Opozvati zabranu korisnika %s',
	joinChannel: 'Pristupi sobi %s',
	cite: '%s reče:',
	urlDialog: 'Molimo vas, unesite adresu (URL) web stranice:',
	deleteMessage: 'Delete this chat message',
	deleteMessageConfirm: 'Really delete the selected chat message?',
	errorCookiesRequired: 'Pažnja: kolačići su neophodni za ovaj Chat.',
	errorUserNameNotFound: 'Greška: korisnik %s nije pronađen.',
	errorMissingText: 'Greška: nedostaje tekst poruke.',
	errorMissingUserName: 'Greška: nedostaje korisničko ime.',
	errorInvalidUserName: 'Error: Invalid username.',
	errorUserNameInUse: 'Error: Username already in use.',
	errorMissingChannelName: 'Greška: nedostaje ime sobe.',
	errorInvalidChannelName: 'Greška: pogrešno ime sobe: %s',
	errorPrivateMessageNotAllowed: 'Greška: privatne poruke nisu dozvoljene.',
	errorInviteNotAllowed: 'Greška: Nije vam dozvoljeno da pozivate nekoga u ovu sobu.',
	errorUninviteNotAllowed: 'Greška: Nije vam dozvoljeno da nekoga opozovete iz ove sobe.',
	errorNoOpenQuery: 'Greška: Privatna soba nije otvorena.',
	errorKickNotAllowed: 'Greška: Nije vam dozvoljeno da izbacite %s.',
	errorCommandNotAllowed: 'Greška: Komanda nije dozvoljena: %s',
	errorUnknownCommand: 'Greška: Nepoznata komanda: %s',
	errorMaxMessageRate: 'Error: You exceeded the maximum number of messages per minute.',
	errorConnectionTimeout: 'Greška: Vreme konekcije je isteklo. Molimo vas pokušajte ponovo.',
	errorConnectionStatus: 'Greška: Status konekcije: %s',
	errorSoundIO: 'Error: Failed to load sound file (Flash IO Error).',
	errorSocketIO: 'Error: Connection to socket server failed (Flash IO Error).',
	errorSocketSecurity: 'Error: Connection to socket server failed (Flash Security Error).',
	errorDOMSyntax: 'Error: Invalid DOM Syntax (DOM ID: %s).'
	
}