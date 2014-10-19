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
	
	login: '%s входит в чат.',
	logout: '%s выходит из чата.',
	logoutTimeout: '%s вышел из чата по таймоуту.',
	logoutIP: '%s вышел из чата (неверный IP адрес).',
	logoutKicked: '%s был вышвырнут из чата (Kicked).',
	channelEnter: '%s присоединяется к каналу.',
	channelLeave: '%s покидает канал.',
	privmsg: '(приватное сообщение)',
	privmsgto: '(приватное сообщение %s)',
	invite: '%s приглашает Вас присоединиться к %s.',
	inviteto: 'Ваше приглашение %s присоедениться к каналу %s было успешно отправлено.',
	uninvite: '%s отзывает Ваше приглашение из канала %s.',
	uninviteto: 'Вы отозвали приглашение пользователю %s для канала %s.',
	queryOpen: 'Приватный канал открыт к %s.',
	queryClose: 'Приватный канал к %s закрыт.',
	ignoreAdded: '%s добавлен в игнорлист.',
	ignoreRemoved: '%s удален из игнорлиста.',
	ignoreList: 'Игнорируемые пользователи:',
	ignoreListEmpty: 'Игнорируемых пользователей не найдено.',
	who: 'Пользователи:',
	whoChannel: 'Пользователи в канале %s:',
	whoEmpty: 'В данном канале нет пользователей.',
	list: 'Доступные каналы:',
	bans: 'Забаненные пользователи:',
	bansEmpty: 'Нет забаненных пользователей.',
	unban: 'Пользователь %s разбанен.',
	whois: 'Пользователь %s - IP адрес:',
	whereis: 'Пользователь %s находится в канале %s.',
	roll: '%s кинул кубики %s. Результат %s.',
	nick: '%s сменил имя на %s.',
	toggleUserMenu: 'Меню пользователя %s',
	userMenuLogout: 'Выйти',
	userMenuWho: 'Список пользователей',
	userMenuList: 'Список каналов',
	userMenuAction: 'Действие',
	userMenuRoll: 'Бросить кубик',
	userMenuNick: 'Сменить имя',
	userMenuEnterPrivateRoom: 'Войти в комнату',
	userMenuSendPrivateMessage: 'Отправить приватное сообщение',
	userMenuDescribe: 'Приватное действие',
	userMenuOpenPrivateChannel: 'Открыть приватный канал',
	userMenuClosePrivateChannel: 'Закрыть приватный канал',
	userMenuInvite: 'Пригласить',
	userMenuUninvite: 'Отменить приглашение',
	userMenuIgnore: 'Игнорировать/Принять',
	userMenuIgnoreList: 'Список игнорируемых',
	userMenuWhereis: 'В каком канале?',
	userMenuKick: 'Выкинуть/Забанить',
	userMenuBans: 'Список забаненных',
	userMenuWhois: 'Показать IP',
	unbanUser: 'Отменить бан пользователя %s',
	joinChannel: ' %s присоединился к каналу',
	cite: '%s сказал:',
	urlDialog: 'Пожалуйста введети адрес (URL) Web-страницы:',
	deleteMessage: 'Удалить сообщение',
	deleteMessageConfirm: 'Вы действительно хотите удалить это сообщение?',
	errorCookiesRequired: 'Необходимо включить Cookies.',
	errorUserNameNotFound: 'Ошибка: Пользователь %s не найдет.',
	errorMissingText: 'Ошибка: Отсутствует текст сообщения.',
	errorMissingUserName: 'Ошибка: Отсутствует имя.',
	errorInvalidUserName: 'Error: Invalid username.',
	errorUserNameInUse: 'Error: Username already in use.',
	errorMissingChannelName: 'Ошибка: Отсутствует имя канала.',
	errorInvalidChannelName: 'Ошибка: Не верное имя канала: %s',
	errorPrivateMessageNotAllowed: 'Ошибка: Приватные сообщения не разрешены.',
	errorInviteNotAllowed: 'Ошибка: У Вас нет прав приглашать кого-либо в этот канал.',
	errorUninviteNotAllowed: 'Ошибка: У Вас нет прав отозвать приглашение из этого канала.',
	errorNoOpenQuery: 'Ошибка: Приватный канал не открыт.',
	errorKickNotAllowed: 'Ошибка: У Вас нет прав забанить %s.',
	errorCommandNotAllowed: 'Ошибка: Команда недоступна: %s',
	errorUnknownCommand: 'Ошибка: Неизвестная команда: %s',
	errorMaxMessageRate: 'Ошибка: Вы превысили ограничение на количество сообщений, отправленных за минуту.',
	errorConnectionTimeout: 'Ошибка: Соединение не установлено. Пожалуйста, попробуйте еще раз.',
	errorConnectionStatus: 'Ошибка: Статус соединения: %s',
	errorSoundIO: 'Ошибка: Не получается загрузить звуковой файл (Flash IO Error).',
	errorSocketIO: 'Ошибка: Не удалось открыть сокет (Flash IO Error).',
	errorSocketSecurity: 'Ошибка: Не удалость открыть сокет (Flash Security Error).',
	errorDOMSyntax: 'Ошибка: Некорректный синтаксис DOM (DOM ID: %s).'
	
}