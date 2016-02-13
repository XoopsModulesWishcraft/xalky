<?php
/**
 * Xalky - Talks like a cockatoo - XOOPS Chat Rooms
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

/*
* include files
* 
*/

include("../include/ini.php");
include("../include/session.php");
include("../include/db.php");
include("../include/config.php");
include("../include/functions.php");
include("../lang/".getLang(''));

/*
* check profile id is number
* 
*/

if(isset($_GET['id']) && !is_numeric($_GET['id']))
{
	die("Invalid Profile ID");
}

/*
* check edit value is number
* 
*/

if(isset($_GET['edit']) && $_GET['edit'] != '1')
{
	die("Invalid Edit Value");
}

/*
* check user is editing their own profile
* 
*/ 

if(isset($_REQUEST['edit']) && $_SESSION['xalkyProfileID'] != $_REQUEST['id'] || isset($_REQUEST['edit']) && isset($_SESSION['guest']))
{
	die("You do not have the correct permissions to edit this profile");
}

/*
* update user profile
*
*/

if(isset($_POST['edit']) && isset($_SESSION['xalkyProfileID']))
{
	$profileUpdated = updateProfile(
						$_SESSION['xalkyProfileID'],
						$_POST['profileRealname'],
						$_POST['profileAge'],
						$_POST['profileGender'],
						$_POST['uploadedfile'],
						$_POST['del'],
						$_POST['imgID'],
						$_POST['profileLocation'],
						$_POST['profileHobbies'],
						$_POST['profileAboutme'],
						$_POST['profilePass'],
						$_POST['profileEmail']
					);		
}

/*
* get user details
* 
*/

list(
	$username,
	$realname,
	$age,
	$gender,
	$location,
	$hobbies,
	$aboutme,
	$imgID,
	$email

	) = userProfileInfo($_GET['id']);

/*
* set default profile values if fields null
*
*/

$def = " - ";

$realname = empty($realname) ? $def : $realname;
$age = empty($age) ? $def : $age;
$gender = empty($gender) ? $def : $gender;
$location = empty($location) ? $def : $location;
$hobbies = empty($hobbies) ? $def : $hobbies;
$aboutme = empty($aboutme) ? $def : $aboutme;

/*
* include template
*
*/

include("../templates/".$xalkyConfig['template']."/profile.php");

?>