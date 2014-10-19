﻿/*
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
	
	login: '%s prijavljen-a na Klepetu.',
	logout: '%s odjavljen-a iz Klepeta.',
	logoutTimeout: '%s je prijava potekla (Timeout).',
	logoutIP: '%s je prijava potekla (Nepopolna IP adresa).',
	logoutKicked: '%s je prijava potekla (Kicked).',
	channelEnter: '%s je vstopil-a v sobo.',
	channelLeave: '%s odĹˇel-a iz sobe.',
	privmsg: '(privatno sporoÄŤilo)',
	privmsgto: '(se privatno pogovarja z %s)',
	invite: '%s vas vabi na razgovor v %s.',
	inviteto: 'VaĹˇe vabilo za razgovor z %s v sobi %s je poslano.',
	uninvite: '%s se ne Ĺľeli odzvati vaĹˇemu vabilu v sobi %s.',
	uninviteto: 'VaĹˇ preklic vabila za %s v sobi %s je poslano.',
	queryOpen: 'Privatna soba za %s je odprta.',
	queryClose: 'Privatna soba za %s je zaprta.',
	ignoreAdded: '%s je dodan na seznam ignoriranih.',
	ignoreRemoved: '%s je odstranjen iz seznama ignoriranih.',
	ignoreList: 'Ignorirani uporabniki:',
	ignoreListEmpty: 'Seznam ignoriranih uporabnikov je prazen.',
	who: 'Prisotni:',
	whoChannel: 'Prisotni v sobi %s:',
	whoEmpty: 'V tej sobi ni uporabnikov.',
	list: 'Dostopne sobe:',
	bans: 'Uporabniki s prepovedjo dostopa:',
	bansEmpty: 'Seznam uporabnikov s prepovedjo dostopa je prazen.',
	unban: 'Prepoved dostopa uporabniku je preklicana.',
	whois: 'Uporabnik %s - IP adresa:',
	whereis: 'Uporabnik %s je v sobi %s.',
	roll: '%s je vrgel %s Rezultat je: %s.',
	nick: '%s sedaj uporablja nick %s.',
	toggleUserMenu: 'Preklopi uporabniĹˇki meni za %s',
	userMenuLogout: 'Odjava',
	userMenuWho: 'Seznam prisotnih uporabnikov',
	userMenuList: 'Seznam dostopnih sob',
	userMenuAction: 'OpiĹˇi akcijo',
	userMenuRoll: 'Vrzi kocko',
	userMenuNick: 'Zamenjaj uporabniĹˇko ime',
	userMenuEnterPrivateRoom: 'Vstopi v privatno sobo',
	userMenuSendPrivateMessage: 'PoĹˇlji privatno sporoÄŤilo',
	userMenuDescribe: 'PoĹˇlji privatno akcijo',
	userMenuOpenPrivateChannel: 'Odpri privatno sobo',
	userMenuClosePrivateChannel: 'Zapri privatno sobo',
	userMenuInvite: 'Poklicati',
	userMenuUninvite: 'Preklicati',
	userMenuIgnore: 'Ignoriraj/Sprejemi',
	userMenuIgnoreList: 'Seznam ignoriranih uporabnikov',
	userMenuWhereis: 'PrikaĹľi sobo',
	userMenuKick: 'IzvrĹľeen/Prepovedan',
	userMenuBans: 'Seznam prepovedanih uporabnikov',
	userMenuWhois: 'PrikaĹľi IP adreso',
	unbanUser: 'Preklicati prepoved uporabniku %s',
	joinChannel: 'Vstopi v sobo %s',
	cite: '%s pravi:',
	urlDialog: 'Prosimo vas, vnesite naslov (URL) web strani:',
	deleteMessage: 'IzbriĹˇi to sporoÄŤilo',
	deleteMessageConfirm: 'Ali res izbriĹˇem izbrano sporoÄŤilo?',
	errorCookiesRequired: 'Pozor: uporaba piĹˇkotkov (cookies) je nujna za to klepetalnico!',
	errorUserNameNotFound: 'Napaka: uporabnik %s ni najden!',
	errorMissingText: 'Napaka: manjka besedilo sporoÄŤila!',
	errorMissingUserName: 'Napaka: manjka uporabniĹˇko ime!',
	errorInvalidUserName: 'Napaka: Nepravilno uporabniĹˇko ime!',
	errorUserNameInUse: 'Napaka: uporabniĹˇko ime je Ĺľe v uporabi!',
	errorMissingChannelName: 'Napaka: ni imena sobe!',
	errorInvalidChannelName: 'Napaka: napaÄŤno ime sobe: %s',
	errorPrivateMessageNotAllowed: 'Napaka: privatna sporoÄŤila niso dovoljena!',
	errorInviteNotAllowed: 'Napaka: Nimate dovoljenja, da lahko druge vabite v to sobo!',
	errorUninviteNotAllowed: 'Napaka: Nimate dovoljenja, da lahko druge vrĹľete iz te sobe!',
	errorNoOpenQuery: 'Napaka: Privatna soba ni odprta!',
	errorKickNotAllowed: 'NApaka: Nimate dovoljenja, da lahko vrĹľete %s',
	errorCommandNotAllowed: 'Napaka: Ukaz ni dozvoljen: %s',
	errorUnknownCommand: 'Napaka: Neznan ukaz: %s',
	errorMaxMessageRate: 'NApaka: Presegli ste najveÄŤje dovoljeno Ĺˇtevilo sporoÄŤil na minuto!.',
	errorConnectionTimeout: 'Napaka: ÄŤas povezave se je iztekel. Poskusite znova!',
	errorConnectionStatus: 'Napaka: Status povezave: %s',
	errorSoundIO: 'Napaka: ZvoÄŤne datoteke ni bilo mogoÄŤe naloĹľiti (Napaka Flash IO)!',
	errorSocketIO: 'Napaka: Povezava na server ni uspela (Napaka Flash IO)!',
	errorSocketSecurity: 'Napaka: Povezava na server ni uspela (Napaka Flash Security)!',
	errorDOMSyntax: 'Napaka: Nepopolna DOM Syntaxa (DOM ID: %s).'
	
}