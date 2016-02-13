<?php
/**
 * Xalky - Ping/Pong Functions - XOOPS Chat Rooms
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright   Chronolabs Cooperative http://sourceforge.net/projects/chronolabs/
 * @license     GNU GPL 3 (http://labs.coop/briefs/legal/general-public-licence/13,3.html)
 * @author      Simon Antony Roberts <wishcraft@users.sourceforge.net>
 * @see			http://sourceforge.net/projects/xoops/
 * @see			http://sourceforge.net/projects/chronolabs/
 * @see			http://sourceforge.net/projects/chronolabsapis/
 * @see			http://labs.coop
 * @version     1.0.5
 * @since		1.0.1
 */
	require_once __DIR__ . DIRECTORY_SEPARATOR . 'header.php';
	
	if (function_exists("http_response_code"))
		http_response_code(200);
	extract($_POST);
	$hostname = parse_url($from, PHP_URL_HOST);
	ini_set('date.timezone', $zone);
	xoops_load("XoopsCache")
	if (!$pings = XoopsCache::read("ping-peers"))
		$pings = array();
	$pings[$hostname]['next'] = microtime(true) + 360;
	$pings[$hostname]['ping-mt'] = $microtime;
	$pings[$hostname]['pong-mt'] = (float)microtime(true);
	$pings[$hostname]['trip-ms'] = $pings[$hostname]['pong-mt']-$pings[$hostname]['ping-mt']*1000;
	XoopsCache::write("ping-peers", $pings, 3600*24*7*8);
	die(json_encode($pings[$hostname]));
?>