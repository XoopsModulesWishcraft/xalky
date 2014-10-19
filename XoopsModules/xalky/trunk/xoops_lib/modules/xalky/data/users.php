<?php
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
 * @subpackage		library
 * @description		Chronolabs XOOPS Module for Chat and Walky Talky Services
 * 
 */


$guests = file(_XALKY_GUESTS_FILE);
$admins = file(_XALKY_ADMINS_FILE);
$moderators = file(_XALKY_MODERATORS_FILE);
$users = file(_XALKY_USERS_FILE);
$channels = array_keys(file(_XALKY_CHANNELS_FILE));

// guest users:
$users = array();
$i=0;
foreach($guests as $guest) {
	$parts = explode("|", $guest);
	if (isset($parts[0]) && isset($parts[1])) {
		$users[$i] = array();
		$users[$i]['userRole'] = _XALKY_GUEST;
		if (empty($parts[0]))
			$users[$i]['userName'] = NULL;
		else
			$users[$i]['userName'] = $parts[0];
		if (empty($parts[1]))
			$users[$i]['password'] = NULL;
		else
			$users[$i]['password'] = $parts[1];
		$users[$i]['channels'] = $channels;
		++$i;
	}
	
}

// admin users:
foreach($admins as $admin) {
	$parts = explode("|", $admin);
	if (isset($parts[0]) && isset($parts[1])) {
		$users[$i] = array();
		$users[$i]['userRole'] = _XALKY_ADMIN;
		if (empty($parts[0]))
			$users[$i]['userName'] = NULL;
		else
			$users[$i]['userName'] = $parts[0];
		if (empty($parts[1]))
			$users[$i]['password'] = NULL;
		else
			$users[$i]['password'] = $parts[1];
		$users[$i]['channels'] = $channels;
		++$i;
	}
}

// moderator users:
foreach($moderators as $moderator) {
	$parts = explode("|", $moderator);
	if (isset($parts[0]) && isset($parts[1])) {
		$users[$i] = array();
		$users[$i]['userRole'] = _XALKY_MODERATOR;
		if (empty($parts[0]))
			$users[$i]['userName'] = NULL;
		else
			$users[$i]['userName'] = $parts[0];
		if (empty($parts[1]))
			$users[$i]['password'] = NULL;
		else
			$users[$i]['password'] = $parts[1];
		$users[$i]['channels'] = $channels;
		++$i;
	}
}

// registered users:
foreach($users as $user) {
	$parts = explode("|", $user);
	if (isset($parts[0]) && isset($parts[1])) {
		$users[$i] = array();
		$users[$i]['userRole'] = _XALKY_USER;
		if (empty($parts[0]))
			$users[$i]['userName'] = NULL;
		else
			$users[$i]['userName'] = $parts[0];
		if (empty($parts[1]))
			$users[$i]['password'] = NULL;
		else
			$users[$i]['password'] = $parts[1];
		$users[$i]['channels'] = $channels;
		++$i;
	}
}
?>