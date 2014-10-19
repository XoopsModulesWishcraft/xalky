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
	
	login: '%s entra al Chat.',
	logout: '%s sale del Chat.',
	logoutTimeout: '%s se ha desconectado (Tiempo de espera agotado).',
	logoutIP: '%s se ha desconectado (Direccion IP no valida).',
	logoutKicked: '%s se ha desconectado (Pateado).',
	channelEnter: '%s entra en el canal.',
	channelLeave: '%s se va del canal.',
	privmsg: '(susurra)',
	privmsgto: '(susurra a %s)',
	invite: '%s te invita a unirte a %s.',
	inviteto: 'Su invitaci�n a %s para unirse al canal %s se ha enviado.',
	uninvite: '%s le retira la invitaci�n del canal %s.',
	uninviteto: 'Su retirada de invitaci�n a %s para el canal %s se ha enviado.',	
	queryOpen: 'Privado abierto a %s.',
	queryClose: 'Privado cerrado a %s.',
	ignoreAdded: 'Agregado %s a la lista de usuarios ignorados.',
	ignoreRemoved: 'Eliminado %s de la lista de usuarios ignorados.',
	ignoreList: 'Usuarios ignorados',
	ignoreListEmpty: 'Lista de usuarios no ignorados.',
	who: 'Usuarios conectados:',
	whoChannel: 'Usuarios conectados en el canal %s:',
	whoEmpty: 'No hay usuarios conectados en este momento.',
	list: 'Canales disponibles:',
	bans: 'Usuarios Baneados:',
	bansEmpty: 'No se han listado usuarios baneados.',
	unban: 'Ban del usuario %s retirado.',
	whois: 'Usuario %s - Direccion IP:',
	whereis: 'Usuario %s est� en el canal %s.',
	roll: '%s lanza %s y obtiene un %s.',
	nick: '%s es ahora %s.',
	toggleUserMenu: 'Abrir/Cerrar men� del usuario %s',
	userMenuLogout: 'Desconectar',
	userMenuWho: 'Mostrar usuarios conectados',
	userMenuList: 'Mostrar canales disponibles',
	userMenuAction: 'Describir acci�n',
	userMenuRoll: 'Tirar dado',
	userMenuNick: 'Cambiar Nombre de Usuario',
	userMenuEnterPrivateRoom: 'Entrar en canal privado',
	userMenuSendPrivateMessage: 'Enviar mensaje privado',
	userMenuDescribe: 'Enviar acci�n privada',
	userMenuOpenPrivateChannel: 'Abrir canal privado',
	userMenuClosePrivateChannel: 'Cerrar canal privado',
	userMenuInvite: 'Invitar',
	userMenuUninvite: 'Quitar invitaci�n',
	userMenuIgnore: 'Ignorar/Aceptar',
	userMenuIgnoreList: 'Mostrar usuarios ignorados',
	userMenuWhereis: 'Mostrar canal',
	userMenuKick: 'Patada/Ban',
	userMenuBans: 'Mostrar usuarios baneados',
	userMenuWhois: 'Mostrar la IP',
	unbanUser: 'Quitar el ban al usuario %s',
	joinChannel: 'Entrar al canal %s',
	cite: '%s dijo:',
	urlDialog: 'Por favor intruduzca la direcci�n (URL) de la p�gina web:',
	deleteMessage: 'Borrar este mensaje del chat',
	deleteMessageConfirm: 'Really delete the selected chat message?',
	errorCookiesRequired: 'Se necesitan las Cookies para este chat.',
	errorUserNameNotFound: 'Error: usuario %s no se ha encontrado.',
	errorMissingText: 'Error: Mensaje perdido.',
	errorMissingUserName: 'Error: Usuario no encontrado.',
	errorInvalidUserName: 'Error: Nombre de usuario no v�lido.',
	errorUserNameInUse: 'Error: Nombre de usuario est� en uso.',
	errorMissingChannelName: 'Error: No se encuentra el canal.',
	errorInvalidChannelName: 'Error: Nombre invalido del canal: %s',
	errorPrivateMessageNotAllowed: 'Error: No se permiten mensajes privados.',
	errorInviteNotAllowed: 'Error: No est� autorizado a invitar a alguien a este canal.',
	errorUninviteNotAllowed: 'Error: No est� autorizado a quitar la invitaci�n a alguien de este canal.',
	errorNoOpenQuery: 'Error: Ning�n privado abierto.',
	errorKickNotAllowed: 'Error: No est� autorizado a patear a %s.',
	errorCommandNotAllowed: 'Error: Comando no permitido: %s',
	errorUnknownCommand: 'Error: Comando desconocido: %s',
	errorMaxMessageRate: 'Error: Ha sobrepasado el n�mero m�ximo de mensajes por minuto.',
	errorConnectionTimeout: 'Error: Connection timeout. Please try again.',
	errorConnectionStatus: 'Error: Estado de la conexi�n: %s',
	errorSoundIO: 'Error: No se ha podido cargar el fichero de sonido (Error IO Flash).',
	errorSocketIO: 'Error: No se ha podido conectar al servidor socket (Error IO Flash).',
	errorSocketSecurity: 'Error: No se ha podido conectar al servidor socket (Error Seguridad Flash).',
	errorDOMSyntax: 'Error: Sintaxis DOM No V�lida (DOM ID: %s).'
	
}