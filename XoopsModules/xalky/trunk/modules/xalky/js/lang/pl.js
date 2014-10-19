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

	login: '%s wszedł na czat.',
	logout: '%s wyszedł na czat.',
	logoutTimeout: '%s został rozłączony (Przekroczony czas połączenia).',
	logoutIP: '%s został rozłączony (Nieprawidłowy adres IP).',
	logoutKicked: '%s został wyrzucony.',
	channelEnter: '%s wszedł do pokoju.',
	channelLeave: '%s wyszedł z pokoju.',
	privmsg: '(szept)',
	privmsgto: '(szept do %s)',
	invite: '%s zaprasza Cię do pokoju %s.',
	inviteto: 'Twoje zaprosznie dla %s do wejścia do pokoju %s zostało wysłane.',
	uninvite: '%s cofa zaproszenie do pokoju %s.',
	uninviteto: 'Twoje zaproszenie dla %s do wejścia do pokoju %s zostało wycofane.',	
	queryOpen: 'Prywatna rozmowa z %s rozpoczęta.',
	queryClose: 'Prywatna rozmowa z %s zakończona.',
	ignoreAdded: '%s dodany do listy ignorowanych.',
	ignoreRemoved: '%s usunięty z listy ignorowanych.',
	ignoreList: 'Ignorowani użytkownicy:',
	ignoreListEmpty: 'Brak ignorowanych użytkowników.',
	who: 'Użytkownicy online:',
	whoChannel: 'Użytkownicy online w pokoju %s:',
	whoEmpty: 'W wybranym pokoju nikogo obecnie nie ma.',
	list: 'Dostępne pokoje:',
	bans: 'Zablokowani użytkownicy:',
	bansEmpty: 'Brak zablokowanych użytkowników',
	unban: 'Blokada dla %s zdjęta.',
	whois: 'Adres IP użytkownika %s:',
	whereis: 'Użytkownik %s jest w pokoju %s.',
	roll: '%s rzuca kostką %s i uzyskuje wynik(i): %s.',
	nick: '%s zmienia nick na %s.',
	toggleUserMenu: 'Włącz/wyłącz menu użytkownika %s',
	userMenuLogout: 'Wyloguj',
	userMenuWho: 'Użytkownicy online',
	userMenuList: 'Dostępne pokoje',
	userMenuAction: 'Napisz co teraz robisz',
	userMenuRoll: 'Rzuć kostką',
	userMenuNick: 'Zmień nick',
	userMenuEnterPrivateRoom: 'Wejdź do prywatnego pokoju',
	userMenuSendPrivateMessage: 'Wyślij prywatną wiadomość',
	userMenuDescribe: 'Napisz prywatnie co teraz robisz',
	userMenuOpenPrivateChannel: 'Rozpocznij prywatną rozmowę',
	userMenuClosePrivateChannel: 'Zakończ prywatną rozmowę',
	userMenuInvite: 'Zaproś',
	userMenuUninvite: 'Wycofaj zaproszenie',
	userMenuIgnore: 'Ignoruj/akceptuj',
	userMenuIgnoreList: 'Lista ignorowanych użytkowników',
	userMenuWhereis: 'Pokaż pokój',
	userMenuKick: 'Wyrzuć/Zablokuj',
	userMenuBans: 'Lista zablokowanych użytkowników',
	userMenuWhois: 'Pokaż IP',
	unbanUser: 'Zdejmij blokadę dla użytkownika %s',
	joinChannel: 'Wejdź do pokoju %s',
	cite: '%s powiedział:',
	urlDialog: 'Podaj adres (URL) strony:',
	deleteMessage: 'Usuń tę wiadomość',
	deleteMessageConfirm: 'Na pewno usunać tę wiadomość?',
	errorCookiesRequired: 'Do poprawnego działania czat wymaga obsługi Cookies.',
	errorUserNameNotFound: 'Błąd: Użytkownik %s nie został znaleziony.',
	errorMissingText: 'Błąd: Nie wpisano tekstu.',
	errorMissingUserName: 'Błąd: Nie wpisano nicka.',
	errorInvalidUserName: 'Error: Invalid username.',
	errorUserNameInUse: 'Error: Username already in use.',
	errorMissingChannelName: 'Błąd: Nie wpisano nazwy pokoju.',
	errorInvalidChannelName: 'Błąd: Nieprawidłowa nazwa pokoju: %s',
	errorPrivateMessageNotAllowed: 'Błąd: Prywatne wiadomości zostały zablokowane.',
	errorInviteNotAllowed: 'Błąd: Nie możesz wysyłać zaproszeń do tego pokoju.',
	errorUninviteNotAllowed: 'Błąd: Nie możesz cofać zaproszeń z tego pokoju.',
	errorNoOpenQuery: 'Błąd: Brak prywatnych rozmów.',
	errorKickNotAllowed: 'Błąd: Nie możesz wyrzucić użytkownika %s.',
	errorCommandNotAllowed: 'Błąd: Nieprawidłowe polecenie: %s',
	errorUnknownCommand: 'Błąd: Nieznane polecenie: %s',
	errorMaxMessageRate: 'Błąd: Przekroczyłeś maksymalną liczbę wiadomości wysyłanych w ciągu minuty. Poczekaj chwilę...',
	errorConnectionTimeout: 'Błąd: Czas połączenia przekroczony. Spróbuj ponownie.',
	errorConnectionStatus: 'Błąd: Stan połączenia: %s',
	errorSoundIO: 'Błąd: nie można pobrać pliku dźwiękowego (Flash IO Error).',
	errorSocketIO: 'Bład: nie można połączyć się z serwerem (Flash IO Error).',
	errorSocketSecurity: 'Błąd: Połączenie z serwerem nie powiodło się (Flash Security Error).',
	errorDOMSyntax: 'Błąd: Nieprawidłowa składnia DOM (DOM ID: %s).'

}