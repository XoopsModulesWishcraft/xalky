<?php
/**
 * PingTrax Constructor for Plugin's
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
 * @see			http://sourceforge.net/projects/chronolabsapi/
 * @see			http://labs.coop
 * @version     1.0.1
 * @since		1.0.1
 */


$modversion                   = array();
$modversion['name']           = _MI_PINGTRAX_NAME;
$modversion['version']        = 1.01;
$modversion['description']    = _MI_PINGTRAX_DESC;
$modversion['author']         = "Simon Antony Roberts";
$modversion['credits']        = "Chronolabs";
$modversion['help']           = 'page=help';
$modversion['license']        = 'GNU GPL 3.0 or later';
$modversion['license_url']    = "labs.coop/briefs/legal/general-public-licence/13,3.html";
$modversion['image']          = "images/logo.png";
$modversion['dirname']        = basename(__DIR__);
$modversion['dirmoduleadmin'] = '/Frameworks/moduleclasses/moduleadmin';
$modversion['icons16']        = '../../Frameworks/moduleclasses/icons/16';
$modversion['icons32']        = '../../Frameworks/moduleclasses/icons/32';

//about
$modversion["module_status"]       = "Beta";
$modversion['release_date']        = '2015/12/08';
$modversion["module_website_url"]  = "http://labs.coop/";
$modversion["module_website_name"] = "Chronolabs";
$modversion['min_php']             = '5.3.7';
$modversion['min_xoops']           = "2.5.7";
$modversion['min_admin']           = '1.1';
$modversion['min_db']              = array(
    										'mysql'  => '5.0.7',
    										'mysqli' => '5.0.7'
									 );

// Admin menu
// Set to 1 if you want to display menu generated by system module
$modversion['system_menu'] = 1;

// Admin things
$modversion['hasAdmin']   = 1;
$modversion['adminindex'] = "admin/admin.php";
$modversion['adminmenu']  = "admin/menu.php";

// Mysql file
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";

// Table
$modversion['tables'][]	=	'pingtrax_items';
$modversion['tables'][]	=	'pingtrax_items_pings';
$modversion['tables'][]	=	'pingtrax_items_sitemaps';
$modversion['tables'][]	=	'pingtrax_pings';
$modversion['tables'][]	=	'pingtrax_sitemaps';

// Scripts to run upon installation or update
$modversion['onInstall'] = "include/install.php";
//$modversion['onUpdate']  = "include/update.php";

// Templates
$modversion['templates']                   = array();
//$modversion['templates'][1]['file']        = '';
//$modversion['templates'][1]['description'] = '';
//$modversion['templates'][4]['file'] = 'pm_lookup.tpl';
//$modversion['templates'][4]['description'] = '';

// Menu
$modversion['hasMain'] = 0;

$modversion['config']   = array();
$modversion['config'][] = array(
    'name'        => 'default_feed_url',
    'title'       => '_MI_PINGTRAX_DEFAULT_FEED_URL',
    'description' => '_MI_PINGTRAX_DEFAULT_FEED_URL_DESC',
    'formtype'    => 'text',
    'valuetype'   => 'text',
    'default'     => '%xoops_url%/backend.php'
);

$modversion['config'][] = array(
		'name'        => 'pings_sleep_till',
		'title'       => '_MI_PINGTRAX_PINGS_SLEEP_TILL',
		'description' => '_MI_PINGTRAX_PINGS_SLEEP_TILL_DESC',
		'formtype'    => 'select',
		'valuetype'   => 'int',
		'options'	  => array(_MI_PINGTRAX_TIME_RANDOM => 0, _MI_PINGTRAX_TIME_15M => 900, _MI_PINGTRAX_TIME_30M => 1800, _MI_PINGTRAX_TIME_1HR => 3600, _MI_PINGTRAX_TIME_2HR => (3600*2), _MI_PINGTRAX_TIME_3HR =>(3600*3),
							   _MI_PINGTRAX_TIME_4HR => (3600*4), _MI_PINGTRAX_TIME_5HR => (3600*5), _MI_PINGTRAX_TIME_6HR => (3600*6), _MI_PINGTRAX_TIME_7HR => (3600*7), _MI_PINGTRAX_TIME_8HR => (3600*8), _MI_PINGTRAX_TIME_9HR => (3600*9),
							   _MI_PINGTRAX_TIME_10HR => (3600*10), _MI_PINGTRAX_TIME_11HR => (3600*11), _MI_PINGTRAX_TIME_12HR => (3600*12), _MI_PINGTRAX_TIME_14HR => (3600*14), _MI_PINGTRAX_TIME_16HR =>(3600*16), _MI_PINGTRAX_TIME_24HR =>(3600*24)),
		'default'     => 3600 * mt_rand(1,12)
);

$modversion['config'][] = array(
		'name'        => 'sitemaps_sleep_till',
		'title'       => '_MI_PINGTRAX_SITEMAPS_SLEEP_TILL',
		'description' => '_MI_PINGTRAX_SITEMAPS_SLEEP_TILL_DESC',
		'formtype'    => 'select',
		'valuetype'   => 'int',
		'options'	  => array(_MI_PINGTRAX_TIME_RANDOM => 0, _MI_PINGTRAX_TIME_15M => 900, _MI_PINGTRAX_TIME_30M => 1800, _MI_PINGTRAX_TIME_1HR => 3600, _MI_PINGTRAX_TIME_2HR => (3600*2), _MI_PINGTRAX_TIME_3HR =>(3600*3),
							   _MI_PINGTRAX_TIME_4HR => (3600*4), _MI_PINGTRAX_TIME_5HR => (3600*5), _MI_PINGTRAX_TIME_6HR => (3600*6), _MI_PINGTRAX_TIME_7HR => (3600*7), _MI_PINGTRAX_TIME_8HR => (3600*8), _MI_PINGTRAX_TIME_9HR => (3600*9),
							   _MI_PINGTRAX_TIME_10HR => (3600*10), _MI_PINGTRAX_TIME_11HR => (3600*11), _MI_PINGTRAX_TIME_12HR => (3600*12), _MI_PINGTRAX_TIME_14HR => (3600*14), _MI_PINGTRAX_TIME_16HR =>(3600*16), _MI_PINGTRAX_TIME_24HR =>(3600*24)),
		'default'     => 3600 * mt_rand(1,12)
);

// Blocks

$modversion["blocks"][1]    = array(
		"file"            => "pingtrax_blocks.php",
		"name"            => "Trackbacks Cloud",
		"description"     => "Show tackbacksd",
		"show_func"       => "pingtrax_trackbacks_block_show",
		"edit_func"       => "pingtrax_trackbacks_block_edit",
		"options"         => "",
		"template"        => "trackbacks_block.html",
);

