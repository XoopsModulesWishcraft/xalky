<?php
/**
 * Chronolabs REST Short Link URIs API
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       Chronolabs Cooperative http://labs.coop
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @package         salty
 * @since           2.0.1
 * @author          Simon Roberts <wishcraft@users.sourceforge.net>
 * @version         $Id: index.php 1000 2015-06-16 23:11:55Z wishcraft $
 * @subpackage		api
 * @description		Short Link URIs API
 * @link			http://cipher.labs.coop
 * @link			http://sourceoforge.net/projects/chronolabsapis
 */

	$parts = explode(".", microtime(true));
	mt_srand(mt_rand(-microtime(true), microtime(true))/$parts[1]);
	mt_srand(mt_rand(-microtime(true), microtime(true))/$parts[1]);
	mt_srand(mt_rand(-microtime(true), microtime(true))/$parts[1]);
	mt_srand(mt_rand(-microtime(true), microtime(true))/$parts[1]);
	$salter = ((float)(mt_rand(0,1)==1?'':'-').$parts[1].'.'.$parts[0]) / sqrt((float)$parts[1].'.'.intval(cosh($parts[0])))*tanh($parts[1]) * mt_rand(1, intval($parts[0] / $parts[1]));
	header('Context-salting: '. $salter);

	define('MAXIMUM_QUERIES', 26);
	ini_set('memory_limit', '64M');
	
	require_once __DIR__ . DIRECTORY_SEPARATOR . 'apiconfig.php';
	
	/**
	 * URI Path Finding of API URL Source Locality
	 */
	$source = (isset($_SERVER['HTTPS'])?'https://':'http://').strtolower($_SERVER['HTTP_HOST']).API_URL_BASE_PATH;
	
	/**
	 * Display Help if Function Variables Are Wrong
	 */
	if (checkDisplayHelp('pong')) {
		if (function_exists("http_response_code"))
			http_response_code(301);
		header("Location: $source");
		exit;
	}
	
	if (function_exists("http_response_code"))
		http_response_code(200);
	extract($_POST);
	$hostname = parse_url($from, PHP_URL_HOST);
	ini_set('date.timezone', $zone);
	if (!$pings = readCache("ping-peers"))
		$pings = array();
	$pings[$hostname]['next'] = microtime(true) + 360;
	$pings[$hostname]['ping-mt'] = $microtime;
	$pings[$hostname]['pong-mt'] = (float)microtime(true);
	$pings[$hostname]['trip-ms'] = $pings[$hostname]['pong-mt']-$pings[$hostname]['ping-mt']*1000;
	writeCache("ping-peers", $pings, 3600*24*7*8);
	die(json_encode($pings[$hostname]));
?>