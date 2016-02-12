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
 * @see			http://sourceforge.net/projects/chronolabsapi/
 * @see			http://labs.coop
 * @version     1.0.5
 * @since		1.0.1
 */

global $xalkyConfig;
require_once(dirname(dirname(__DIR__))."/includes/ini.php");
require_once(dirname(dirname(__DIR__))."/includes/session.php");
require_once(dirname(dirname(__DIR__))."/includes/config.php");
require_once(dirname(dirname(__DIR__))."/includes/functions.php");

/**
 * Declare header
*/

header("content-type: application/x-javascript");


/*
* get settings from db
*
*/

try {
	$dbh = db_connect();
	$params = array('');
	$query = "SELECT *   
			  FROM xalky_config
			  LIMIT 1
			  ";							
	$action = $dbh->prepare($query);
	$action->execute($params);
				
	foreach ($action as $i) 
	{	
		// profileOn
		$profileOn = $i['profileOn'];

		// profileUrl
		$profileUrl = $i['profileUrl'];

		// profileRef
		$profileRef = $i['profileRef'];

		// privateOn
		$privateOn = $i['privateOn'];

		// whisperOn
		$whisperOn = $i['whisperOn'];

		// advertsOn
		$advertsOn = $i['advertsOn'];

		// webcamsOn
		$webcamsOn = $i['webcamsOn'];

		// enableUrl
		$enableUrl = $i['enableUrl'];

		// enableEmail
		$enableEmail = $i['enableEmail'];

		// enableShoutFilter
		$enableShoutFilter = $i['enableShoutFilter'];

		// floodXalky
		$floodXalky = $i['floodXalky'];

		// defaultSFX
		$defaultSFX = $i['defaultSFX'];

		// newPm
		$newPm = $i['newPm'];

		// newPmMin
		$newPmMin = $i['newPmMin'];

		// refreshRate
		$refreshRate = $i['refreshRate'];

		// displayMDiv
		$displayMDiv = $i['displayMDiv'];

		// totalMessages
		$totalMessages = $i['totalMessages'];

		// showMessages
		$showMessages = $i['showMessages'];

		// avatars
		$avatars = explode(",", $i['avatars']);
		$avatars_count = count($avatars)-1;

		// badwords
		$badwords = explode(",", urldecode($i['badwords']));
		$badwords_count = count($badwords)-1;

		// font colour
		$font_colour = explode(",", $i['font_colour']);
		$font_colour_count = count($font_colour)-1;

		// font size
		$font_size = explode(",", $i['font_size']);
		$font_size_count = count($font_size)-1;

		// font size
		$font_family = explode(",", $i['font_family']);
		$font_family_count = count($font_family)-1;

		// sfx
		$sfx = explode(",", $i['sfx']);
		$sfx_count = count($sfx)-1;

		// smilies text
		$smilies_text = explode(",", $i['smilies_text']);
		$smilies_text_count = count($smilies_text)-1;

		// sfx
		$smilies_images = explode(",", $i['smilies_images']);
		$smilies_images_count = count($smilies_images)-1;

		// adverts
		$textAdverts = $i['textAdverts'];
		$advertsDesc = $i['textAdvertsDesc'];
		$textAdvertsRate = $i['textAdvertsRate'];

		// user status messages
		$userStatusMes = urldecode($i['userStatusMes']);

		// show time stamp (messages)
		$showTimeStamp = $i['showTimeStamp'];

		// integrated with CMS
		$integrated = $i['integrated'];

		// digitalCredits
		$digitalCredits = $i['digitalCredits'];
	}
	
	$dbh = null;
}
catch(PDOException $e) 
{
	$error  = "Function: ".__FUNCTION__."\n";
	$error .= "File: ".basename(__FILE__)."\n";	
	$error .= 'PDOException: '.$e->getCode(). '-'. $e->getMessage()."\n\n";

	debugError($error);
}	
/*
* declare content header
*
*/

header("content-type: application/x-javascript");

/*
* profile details
*
*/

echo "var profileOn = ".$profileOn."; ";
echo "var profileUrl = '".$profileUrl."'; ";
echo "var profileRef = ".$profileRef."; ";

/*
* enable private chat
*
*/

echo "var privateOn = ".$privateOn."; ";

/*
* enable whisper
*
*/

echo "var whisperOn = ".$whisperOn."; ";

/*
* enable webcams
*
*/

echo "var webcamsOn = ".$webcamsOn."; ";

/*
* enable banners
*
*/

echo "var advertsOn = ".$advertsOn."; ";

/*
* enable urls
*
*/

echo "var enableUrl = ".$enableUrl."; ";

/*
* enable emails
*
*/

echo "var enableEmail = ".$enableEmail."; ";

/*
* enable shout filter
*
*/

echo "var enableShoutFilter = ".$enableShoutFilter."; ";

/*
* flood filter
* allow new post every X seconds
*/

echo "var floodXalky = ".$floodXalky."; "; 

/*
* default sfx
*
*/

echo "var sfx = '".$defaultSFX."'; ";

/*
* title bar colour for private messages
*
*/

echo "var newPM = '".$newPm."'; ";

/*
* displays when private window minimised
*
*/

echo "var newPMmin = '".$newPmMin."'; ";

/*
* refresh rate
* 1 sec = 1000
*/

echo "var refreshRate = ".$refreshRate."; "; 

/*
* chat messages container
*
*/

echo "var displayMDiv = 'chatContainer'; ";

/*
* max screen messages 
*
*/

echo "var totalMessages = ".$totalMessages."; "; 

/*
* reset message count
*
*/

echo "var showMessages = ".$showMessages."; "; 


/*
* show avatar array
*
*/

echo "var totalAvatars = ".$avatars_count."; ";
echo "var loopAvatars = 6; ";
echo "var myAvatars=new Array(); ";

for ($i = 0; $i <= $avatars_count; $i++)
{
	echo 'myAvatars['.$i.']="'.$avatars[$i].'"; ';
}

/*
* replace badwords
*
*/

$badword_replacement = "****";

echo "function filterBadword(nBadword){ ";
echo "var badwordReplacement = '".$badword_replacement."'; ";

if($badwords['0'])
{
	for ($i = 0; $i <= $badwords_count; $i++)
	{
		echo "nBadword = nBadword.replace(/".$badwords[$i]."/gi,badwordReplacement); ";
	}
}

echo "return nBadword; } ";

/*
* create Font Colour array  
*
*/

echo "var totalColours = ".$font_colour_count."; ";
echo "var loopColours = 12; ";
echo "var myColour=new Array(); ";

for ($i = 0; $i <= $font_colour_count; $i++)
{
	echo 'myColour['.$i.']="'.$font_colour[$i].'"; ';
}

/*
* create Font Size array 
*
*/

echo "var totalFontSize = ".$font_size_count."; ";
echo "var loopFontSize = 1; ";
echo "var myFontSize=new Array(); ";

for ($i = 0; $i <= $font_size_count; $i++)
{
	echo 'myFontSize['.$i.']="'.$font_size[$i].'"; ';
}

/*
* create Font Family array 
*
*/

echo "var totalFontFamily = ".$font_family_count."; ";
echo "var loopFontFamily = 1; ";
echo "var myFontFamily=new Array(); ";

for ($i = 0; $i <= $font_family_count; $i++)
{
	echo 'myFontFamily['.$i.']="'.$font_family[$i].'"; ';
}

/*
* create SFX array 
*
*/

echo "var totalSFX = ".$sfx_count."; ";
echo "var mySFX=new Array(); ";

for ($i = 0; $i <= $sfx_count; $i++)
{
	echo 'mySFX['.$i.']="'.$sfx[$i].'"; ';
}

/*
* create smilie array 
*
*/

echo "var totalSmilies = ".$smilies_text_count."; ";
echo "var loopSmilies = 5; ";
echo "var mySmilies=new Array(); ";

for ($i = 0; $i <= $smilies_text_count-1; $i++)
{
	echo 'mySmilies['.$i.']="'.addslashes($smilies_text[$i]).'"; ';
}

/*
* create smilie image array 
*
*/

echo "var mySmiliesImg=new Array(); ";

for ($i = 0; $i <= $smilies_images_count-1; $i++)
{
	echo 'mySmiliesImg['.$i.']="<img style=\'vertical-align:middle;\' src=\'smilies/'.$smilies_images[$i].'\'>"; ';
}

/*
* text adverts
*
*/

echo "var textAdverts = ".$textAdverts."; ";
echo "var showTextAdverts = ".$textAdvertsRate."; ";

if($textAdverts)
{
	$advertsDesc = explode(",", $advertsDesc);
	$advertsArrayLength = count($advertsDesc);

	echo "var advertDesc = new Array(); ";

	$x=0;

	for ($i = 0; $i < $advertsArrayLength; $i++)
	{
			if($_SESSION['room'] == $advertsDesc[$i][0])
			{
				echo 'advertDesc['.$x++.']="'.str_replace($advertsDesc[$i][0]."|", "", $advertsDesc[$i]).'"; ';
			}
	}

}

/*
* user status messages
*
*/

echo "var userStatusMes = new Array(); ";

$userStatusMes = explode(",", $userStatusMes);
$userStatusMesArrayLength = count($userStatusMes);

for ($i = 0; $i < $userStatusMesArrayLength; $i++)
{
	echo 'userStatusMes['.$i.']="'.$userStatusMes[$i].'"; ';
}

/*
* timestamp for messages
* 
*/

echo "var showMessageTimeStamp = ".$showTimeStamp."; ";

/*
* badwords/characters
*
*/

$_badwords = implode("|", badChars());
$_badwords = str_replace("'","\'",$_badwords);

echo "var badChars = '".$_badwords."'; ";

/*
* assign admin status
*
*/

if(isset($_SESSION['adminUser']))
{
	unset($_SESSION['adminUser']);
}

/* 
* user status 
*
*/

echo "var admin = ".getAdmin($_SESSION['username'])."; ";
echo "var moderator = ".getModerator($_SESSION['username'])."; ";
echo "var speaker = ".getSpeaker($_SESSION['username'])."; ";

/* 
* user messages 
*
*/

echo "var mBold = ".$xalkyConfig['text']['bold']."; ";
echo "var mItalic = ".$xalkyConfig['text']['italic']."; ";
echo "var mUnderline = ".$xalkyConfig['text']['underline']."; ";
echo "var textColour = '".$xalkyConfig['text']['colour']."'; ";
echo "var textSize = '".$xalkyConfig['text']['size']."'; ";
echo "var textFamily = '".$xalkyConfig['text']['family']."'; ";

/* 
* system messages 
*
*/

echo "var stextColour = '".$xalkyConfig['text']['colour']."'; ";
echo "var stextSize = '".$xalkyConfig['text']['size']."'; ";
echo "var stextFamily = '".$xalkyConfig['text']['family']."'; ";

/* 
* system variables 
*
*/

echo "var groupXalky = ".$_SESSION['groupXalky']."; ";
echo "var groupPXalky = ".$_SESSION['groupPXalky']."; ";
echo "var groupCams = ".$_SESSION['groupCams']."; ";
echo "var groupWatch = ".$_SESSION['groupWatch']."; ";
echo "var groupRooms = ".$_SESSION['groupRooms']."; ";
echo "var groupVideo = ".$_SESSION['groupVideo']."; ";

if(!isset($_SESSION['groupXalky']))
{
	echo "var groupCams = 0; ";
	echo "var groupWatch = 0; ";
	echo "var groupXalky = 0; ";
	echo "var groupPXalky = 0; ";
	echo "var groupRooms = 0; ";
	echo "var groupVideo = 0; ";	
}

/* 
* style folder 
*
*/

echo "var styleFolder = '".$xalkyConfig['template']."'; ";

/* 
* silent user
*
*/

echo "var silent = ".$xalkyConfig['silent']."; ";

/*
* silence length in minutes
* features built in anti cheat mode 
* (restarts silence counter on page reload)
*/

echo "var isSilenced = 0; ";

if($_SESSION['silenceStart'] > date("U")-($xalkyConfig['silent']*60))
{
	echo "isSilenced = 1; ";
	echo "initDoSilence = setInterval('doSilence()',1000); ";
}

/* 
* invisible 
*
*/

echo "var invisibleOn = 0; "; 
echo "var hide = 0; ";

/* 
* idle timeout 
*
*/

echo "var idleTimeout = ".$xalkyConfig['idleTimeout']."; ";

/* 
* idle logout timeout
*
*/

echo "var idleLogoutTimeout = ".$xalkyConfig['idleLogoutTimeout']."; ";

/* 
* copyright 
*
*/

echo "var showCopyright = ".remBrand()."; ";

/* 
* software version 
*
*/

echo "var version = '".$xalkyConfig['version']."'; "; 

/* 
* display last messages 
*
*/

echo "var dispLastMess = '".$xalkyConfig['dispLastMess']."'; "; 

?>