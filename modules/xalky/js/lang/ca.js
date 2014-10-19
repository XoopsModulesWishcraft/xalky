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
	login: '%s ha entrat al xat.',
	logout: '%s ha sortit del xat.',
	logoutTimeout: '%s s\'ha desconnectat (Temps d\'espera esgotat).',
	logoutIP: '%s s\'ha desconnectat (Adreça IP no vàlida).',
	logoutKicked: '%s s\'ha desconnectat (Patejat).',
	channelEnter: '%s entra al canal.',
	channelLeave: '%s se\'n va del canal.',
	privmsg: '(xiuxiueigs)',
	privmsgto: '(xiuxiueigs a %s)',
	invite: '%s et convida a unir-te a %s.',
	inviteto: 'El teu convit a %s per a unir-se a %s ha estat enviat.',
	uninvite: '%s no et convida a %s.',
	uninviteto: 'El teu no convit a  %s per al canal %s ha estat enviat',	
	queryOpen: 'Canal privat obert %s.',
	queryClose: 'Canal privat tancat %s tancat',
	ignoreAdded: 'Agregat %s a la llista de usuaris ignorats.',
	ignoreRemoved: 'Eliminant %s de la llista de usuaris ignorats.',
	ignoreList: 'Usuaris ignorats',
	ignoreListEmpty: 'Llista d\'usuaris no ignorats.',
	who: 'Usuaris connectats:',
	whoChannel: 'Usuaris en línia al canal %s:',
	whoEmpty: 'No hi ha usuaris connectats ara.',
	list: 'Canals disponibles:',
	bans: 'Usuaris Bannejats:',
	bansEmpty: 'No s\'han registrat usuaris bannejats.',
	unban: 'Ban de l\'usuari %s revocat.',
	whois: 'Usuari %s - Adreça IP:',
	whereis: 'L\'usuari %s és al canal %s.',
	roll: '%s tirà els daus %s i aconsegueix %s.',
	nick: '%s es fa dir ara %s.',
	toggleUserMenu: 'Tanca menu de l\'usuari per a %s',
	userMenuLogout: 'Tancar sessió',
	userMenuWho: 'Llista d\'usuaris en línia',
	userMenuList: 'Llista de canals disponibles',
	userMenuAction: 'Descriure una acció',
	userMenuRoll: 'Tirar daus',
	userMenuNick: 'Canviar el nom de l\'usuari',
	userMenuEnterPrivateRoom: 'Entrar en un lloc privat',
	userMenuSendPrivateMessage: 'Enviar un missatge privat',
	userMenuDescribe: 'Enviar una acció privada',
	userMenuOpenPrivateChannel: 'Obrir un canal privat',
	userMenuClosePrivateChannel: 'Tancar un canal privat',
	userMenuInvite: 'Convidar',
	userMenuUninvite: 'Desconvidar',
	userMenuIgnore: 'Ignorar/Acceptar',
	userMenuIgnoreList: 'Llista d\'usuaris ignorats',
	userMenuWhereis: 'Visualitzar el canal',
	userMenuKick: 'Pateig/Banneig',
	userMenuBans: 'Llista d\'usuaris banejats',
	userMenuWhois: 'Mostrar IP',
	unbanUser: 'Cancel·lar banejament de usuari %s',
	joinChannel: 'Unir-se al canal %s',
	cite: '%s va dir:',
	urlDialog: 'Si us plau, introdueix la adreça (URL) de la pàgina web:',
	deleteMessage: 'Esborra aquest missatge',
	deleteMessageConfirm: 'Realment vols esborrar el missatge seleccionat?',
	errorCookiesRequired: 'Les galetes són necessaries per aquest xat .',
	errorUserNameNotFound: 'Error: usuari %s no s\'ha trobat.',
	errorMissingText: 'Error: Missatge perdut.',
	errorMissingUserName: 'Error: Usuari no trobat.',
	errorInvalidUserName: 'Error: Nom d\'usuari no vàlid.',
	errorUserNameInUse: 'Error: El nom d\'usuari ja està en ús.',
	errorMissingChannelName: 'Error: No es troba el canal.',
	errorInvalidChannelName: 'Error: nombre del canal invàlid: %s',
	errorPrivateMessageNotAllowed: 'Error: Els missatges privats no t\'estan permesos.',
	errorInviteNotAllowed: 'Error: No t\'està permés convidar a ningú a aquest canal.',
	errorUninviteNotAllowed: 'Error: No t\'està permés desconvidar ningú d\'aquest canal.',
	errorNoOpenQuery: 'Error: Cap canal privat obert.',
	errorKickNotAllowed: 'Error: No t\'està permés expulsar a ningú %s.',
	errorCommandNotAllowed: 'Error: Ordre desconeguda: %s',
	errorUnknownCommand: 'Error: Ordre desconeguda: %s',
	errorMaxMessageRate: 'Error: has excedit el màxim nombre de missatges per minut.',
	errorConnectionTimeout: 'Error: Temps d\'espera de la connexió expirat. Reintenta-ho de nou.',
	errorConnectionStatus: 'Error: Estat de la connexió: %s',
	errorSoundIO: 'Error: No ha estat possible carregar el so (Flash IO Error).',
	errorSocketIO: 'Error: La connexió al servidor ha fallat (Flash IO Error).',
	errorSocketSecurity: 'Error: La connexió al servidor ha fallat (Flash Security Error).',
	errorDOMSyntax: 'Error: Sintaxi DOM invàlida (DOM ID: %s).'
	
}