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
	
	login: '%s betritt den Chat.',
	logout: '%s verlässt den Chat.',
	logoutTimeout: '%s wurde ausgeloggt (Timeout).',
	logoutIP: '%s wurde ausgeloggt (Ungültige IP-Adresse).',
	logoutKicked: '%s wurde ausgeloggt (Ausschluss).',
	channelEnter: '%s betritt den Raum.',
	channelLeave: '%s verlässt den Raum.',
	privmsg: '(flüstert)',
	privmsgto: '(flüstert zu %s)',
	invite: '%s lädt dich ein den Raum %s zu betreten.',
	inviteto: 'Deine Einladung an %s den Raum %s zu betreten wurde versendet.',
	uninvite: '%s hat dich wieder ausgeladen den Raum %s zu betreten.',
	uninviteto: 'Deine Ausladung an %s den Raum %s zu betreten wurde versendet.',	
	queryOpen: 'Privater Kanal zu %s geöffnet.',
	queryClose: 'Privater Kanal zu %s geschlossen.',
	ignoreAdded: '%s wurde auf die Ignorier-Liste gesetzt.',
	ignoreRemoved: '%s wurde von der Ignorier-Liste entfernt.',
	ignoreList: 'Ignorierte Benutzer:',
	ignoreListEmpty: 'Keine Benutzer werden ignoriert.',
	who: 'Benutzer online:',
	whoChannel: 'Benutzer online im Raum %s:',
	whoEmpty: 'Keine Benutzer online im angegebenen Kanal.',
	list: 'Verfügbare Räume:',
	bans: 'Ausgeschlossene Nutzer:',
	bansEmpty: 'Keine ausgeschlossenen Nutzer vorhanden.',
	unban: 'Ausschluss des Benutzers %s aufgehoben.',
	whois: 'Benutzer %s - IP-Adresse:',
	whereis: 'Benutzer %s ist im Raum %s.',
	roll: '%s würfelt %s und erhält %s.',
	nick: '%s heißt jetzt %s.',
	toggleUserMenu: 'Benutzer-Menü für %s anzeigen/ausblenden',
	userMenuLogout: 'Logout',
	userMenuWho: 'Online Benutzer auflisten',
	userMenuList: 'Verfügbare Räume auflisten',
	userMenuAction: 'Aktion beschreiben',
	userMenuRoll: 'Würfeln',
	userMenuNick: 'Benutzernamen ändern',
	userMenuEnterPrivateRoom: 'Privaten Raum betreten',
	userMenuSendPrivateMessage: 'Private Nachricht schicken',
	userMenuDescribe: 'Private Aktion schicken',
	userMenuOpenPrivateChannel: 'Privaten Kanal öffnen',
	userMenuClosePrivateChannel: 'Privaten Kanal schließen',
	userMenuInvite: 'Einladen',
	userMenuUninvite: 'Ausladen',
	userMenuIgnore: 'Ignorieren / Akzeptieren',
	userMenuIgnoreList: 'Ignorierte Benutzer auflisten',
	userMenuWhereis: 'Raum anzeigen',
	userMenuKick: 'Ausschließen / Verbannen',
	userMenuBans: 'Ausgeschlossene Benutzer auflisten',
	userMenuWhois: 'IP anzeigen',
	unbanUser: 'Ausschluss von %s aufheben',
	joinChannel: 'Raum %s betreten',
	cite: '%s sagte:',
	urlDialog: 'Bitte die Adresse (URL) der Webseite eingeben:',
	deleteMessage: 'Diese Chat-Nachricht löschen',
	deleteMessageConfirm: 'Die ausgewählte Chat-Nachricht wirklich löschen?',
	errorCookiesRequired: 'Cookies werden für diesen Chat benötigt.',
	errorUserNameNotFound: 'Fehler: Benutzer %s wurde nicht gefunden.',
	errorMissingText: 'Fehler: Nachrichtentext fehlt.',
	errorMissingUserName: 'Fehler: Benutzername fehlt.',
	errorInvalidUserName: 'Fehler: Ungültiger Benutzername.',
	errorUserNameInUse: 'Fehler: Benutzername schon vergeben.',
	errorMissingChannelName: 'Fehler: Raumname fehlt.',
	errorInvalidChannelName: 'Fehler: Ungültiger Raumname: %s',
	errorPrivateMessageNotAllowed: 'Fehler: Private Nachrichten sind nicht erlaubt.',
	errorInviteNotAllowed: 'Fehler: Du kannst niemanden zu diesem Raum Einladen.',
	errorUninviteNotAllowed: 'Fehler: Du kannst niemanden von diesem Raum Ausladen.',
	errorNoOpenQuery: 'Fehler: Kein privater Kanal offen.',
	errorKickNotAllowed: 'Fehler: Du kannst %s nicht ausschließen.',
	errorCommandNotAllowed: 'Fehler: Befehl nicht erlaubt: %s',
	errorUnknownCommand: 'Fehler: Unbekannter Befehl: %s',
	errorMaxMessageRate: 'Fehler: Du hast die maximale Anzahl an Nachrichten pro Minute überschritten.',
	errorConnectionTimeout: 'Fehler: Verbindungsabbruch. Bitte erneut versuchen.',
	errorConnectionStatus: 'Fehler: Verbindungsstatus: %s',
	errorSoundIO: 'Fehler: Laden einer Sound-Datei fehlgeschlagen (Flash IO Error).',
	errorSocketIO: 'Fehler: Verbindung zum Socket Server fehlgeschlagen (Flash IO Error).',
	errorSocketSecurity: 'Fehler: Verbindung zum Socket Server fehlgeschlagen (Flash Security Error).',
	errorDOMSyntax: 'Error: Invalid DOM Syntax (DOM ID: %s).'
	
}