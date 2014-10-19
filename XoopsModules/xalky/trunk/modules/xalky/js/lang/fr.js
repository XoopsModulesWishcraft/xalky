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
	
	login: '%s se connecte au Chat.',
	logout: '%s se déconnecte du Chat.',
	logoutTimeout: '%s a été déconnecté (Temps écoulé).',
	logoutIP: '%s a été déconnecté (Adresse IP invalide).',
	logoutKicked: '%s a été déconnecté (Éjecté).',
	channelEnter: '%s entre dans le salon.',
	channelLeave: '%s sort du salon.',
	privmsg: '(murmure)',
	privmsgto: '(murmure à l’oreille de %s)',
	invite: '%s vous invite à rejoindre %s.',
	inviteto: 'Votre invation pour %s à rejoindre le salon %s a bien été envoyée.',
	uninvite: '%s annule son invitation pour le salon %s.',
	uninviteto: 'Votre annulaton d’invitation pour %s au salon %s a bien été envoyée.',	
	queryOpen: 'Salon privé ouvert sous le titre %s.',
	queryClose: 'Le salon privé %s a été fermé.',
	ignoreAdded: '%s a été ajouté à la liste des personnes ignorées.',
	ignoreRemoved: '%s a été enlevé de la liste des personnes ignorées.',
	ignoreList: 'Utilisateurs ignorés:',
	ignoreListEmpty: 'Aucun utilisateur ignoré référencé.',
	who: 'Utilisateurs en ligne:',
	whoChannel: 'Utilisateurs en ligne dans le salon %s :',
	whoEmpty: 'Aucun utilisateur en ligne dans le salon concerné.',
	list: 'Salons disponibles :',
	bans: 'Utilisateurs bannis :',
	bansEmpty: 'Aucun utilisateur banni référencé.',
	unban: 'Le ban de l’utilisateur %s a été levé.',
	whois: 'Utilisateur %s - Adresse IP:',
	whereis: 'L’utilisateur %s est dans le salon %s.',
	roll: '%s jette %s et obtient %s.',
	nick: '%s est maintenant %s.',
	toggleUserMenu: 'Montrer/cacher menu pour %s',
	userMenuLogout: 'Déconnexion',
	userMenuWho: 'Liste membres en ligne',
	userMenuList: 'Liste salons disponibles',
	userMenuAction: 'Décrire une action',
	userMenuRoll: 'Jeter un dé',
	userMenuNick: 'Changer nom',
	userMenuEnterPrivateRoom: 'Rejoindre un salon privé',
	userMenuSendPrivateMessage: 'Envoyer un message privé',
	userMenuDescribe: 'Envoyer une action privé',
	userMenuOpenPrivateChannel: 'Ouvrir un salon privé',
	userMenuClosePrivateChannel: 'Fermer un salon privé',
	userMenuInvite: 'Inviter',
	userMenuUninvite: 'Uninvite',
	userMenuIgnore: 'Ignorer/Accepter',
	userMenuIgnoreList: 'Liste utilisateurs ignorés',
	userMenuWhereis: 'Montrer les salons',
	userMenuKick: 'Éjecter/bannir',
	userMenuBans: 'Liste utilisateurs bannis',
	userMenuWhois: 'Display IP',
	unbanUser: 'Revoke ban of user %s',
	joinChannel: 'Rejoindre le salon %s',
	cite: '%s a dit:',
	urlDialog: 'Veuillez entrer l’addresse (URL) de la page web:',
	deleteMessage: 'Effacer ce message',
	deleteMessageConfirm: 'Effacer le message selectionné ?',
	errorCookiesRequired: 'Ce Chat requiert l’acceptation des cookies.',
	errorUserNameNotFound: 'Erreur : Utilisateur %s introuvable.',
	errorMissingText: 'Erreur : Texte du message manquant.',
	errorMissingUserName: 'Erreur : Nom d’utilisateur manquant.',
	errorMissingChannelName: 'Erreur : Nom de salon manquant.',
	errorInvalidChannelName: 'Erreur : Mauvais nom de salon: %s',
	errorPrivateMessageNotAllowed: 'Erreur : Les messages privés sont interdits.',
	errorInviteNotAllowed: 'Erreur : Vous n’êtes pas autorisé à inviter quelqu’un à ce salon.',
	errorUninviteNotAllowed: 'Erreur : Vous n’êtes pas autorisé à annuler une invitation à ce salon.',
	errorNoOpenQuery: 'Erreur : Aucun salon privé ouvert.',
	errorKickNotAllowed: 'Erreur : Vous n’êtes pas autorisé à éjecter %s.',
	errorCommandNotAllowed: 'Erreur : Commande interdite: %s',
	errorUnknownCommand: 'Erreur : Commande inconnue: %s',
	errorMaxMessageRate: 'Error : You exceeded the maximum number of messages per minute.',
	errorConnectionTimeout: 'Erreur : Temps de connexion écoulé. Veuillez réessayer.',
	errorConnectionStatus: 'Erreur : Statut de connexion: %s',
	errorSoundIO: 'Erreur : Impossible de charger le fichier son (Erreur E/S Flash).',
	errorSocketIO: 'Erreur : Connexion au serveur échouée (Erreur E/S Flash).',
	errorSocketSecurity: 'Erreur : Connexion au serveur échouée (Erreur de sécurité Flash).',
	errorDOMSyntax: 'Erreur : Syntaxe DOM invalide (ID DOM : %s).'
	
}

 	  	 
