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

echo "/**
 * Xalky - Settings for Xalky Chatrooms - XOOPS Chat Rooms
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
\n\n";

// profileOn
$profileOn = $xalkyConfig['profileOn'];

// profileUrl
$profileUrl = $xalkyConfig['profileUrl'];

// profileRef
$profileRef = $xalkyConfig['profileRef'];

// privateOn
$privateOn = $xalkyConfig['privateOn'];

// whisperOn
$whisperOn = $xalkyConfig['whisperOn'];

// advertsOn
$advertsOn = $xalkyConfig['advertsOn'];

// webcamsOn
$webcamsOn = $xalkyConfig['webcamsOn'];

// enableUrl
$enableUrl = $xalkyConfig['enableUrl'];

// enableEmail
$enableEmail = $xalkyConfig['enableEmail'];

// enableShoutFilter
$enableShoutFilter = $xalkyConfig['enableShoutFilter'];

// floodXalky
$floodXalky = $xalkyConfig['floodXalky'];

// defaultSFX
$defaultSFX = $xalkyConfig['defaultSFX'];

// newPm
$newPm = $xalkyConfig['newPm'];

// newPmMin
$newPmMin = $xalkyConfig['newPmMin'];

// refreshRate
$refreshRate = $xalkyConfig['refreshRate'];

// displayMDiv
$displayMDiv = $xalkyConfig['displayMDiv'];

// totalMessages
$totalMessages = $xalkyConfig['totalMessages'];

// showMessages
$showMessages = $xalkyConfig['showMessages'];

// avatars
$avatars = explode(",", $xalkyConfig['avatars']);
$avatars_count = count($avatars)-1;

// badwords
$badwords = explode(",", urldecode($xalkyConfig['badwords']));
$badwords_count = count($badwords)-1;

// font colour
$font_colour = explode(",", $xalkyConfig['font_colour']);
$font_colour_count = count($font_colour)-1;

// font size
$font_size = explode(",", $xalkyConfig['font_size']);
$font_size_count = count($font_size)-1;

// font size
$font_family = explode(",", $xalkyConfig['font_family']);
$font_family_count = count($font_family)-1;

// sfx
$sfx = explode(",", $xalkyConfig['sfx']);
$sfx_count = count($sfx)-1;

// smilies text
$smilies_text = explode(",", $xalkyConfig['smilies_text']);
$smilies_text_count = count($smilies_text)-1;

// sfx
$smilies_images = explode(",", $xalkyConfig['smilies_images']);
$smilies_images_count = count($smilies_images)-1;

// adverts
$textAdverts = $xalkyConfig['textAdverts'];
$advertsDesc = $xalkyConfig['textAdvertsDesc'];
$textAdvertsRate = $xalkyConfig['textAdvertsRate'];

// user status messages
$userStatusMes = $xalkyConfig['userStatusMes'];

// show time stamp (messages)
$showTimeStamp = $xalkyConfig['showTimeStamp'];

// integrated with CMS
$integrated = $xalkyConfig['integrated'];

// digitalCredits
$digitalCredits = $xalkyConfig['digitalCredits'];

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
echo "var xalkyAvatars=new Array(); ";

for ($i = 0; $i <= $avatars_count; $i++)
{
	echo 'xalkyAvatars['.$i.']="'.$avatars[$i].'"; ';
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
echo "var xalkyColour=new Array(); ";

for ($i = 0; $i <= $font_colour_count; $i++)
{
	echo 'xalkyColour['.$i.']="'.$font_colour[$i].'"; ';
}

/*
* create Font Size array 
*
*/

echo "var totalFontSize = ".$font_size_count."; ";
echo "var loopFontSize = 1; ";
echo "var xalkyFontSize=new Array(); ";

for ($i = 0; $i <= $font_size_count; $i++)
{
	echo 'xalkyFontSize['.$i.']="'.$font_size[$i].'"; ';
}

/*
* create Font Family array 
*
*/

echo "var totalFontFamily = ".$font_family_count."; ";
echo "var loopFontFamily = 1; ";
echo "var xalkyFontFamily=new Array(); ";

for ($i = 0; $i <= $font_family_count; $i++)
{
	echo 'xalkyFontFamily['.$i.']="'.$font_family[$i].'"; ';
}

/*
* create SFX array 
*
*/

echo "var totalSFX = ".$sfx_count."; ";
echo "var xalkySFX=new Array(); ";

for ($i = 0; $i <= $sfx_count; $i++)
{
	echo 'xalkySFX['.$i.']="'.$sfx[$i].'"; ';
}

/*
* create smilie array 
*
*/

echo "var totalSmilies = ".$smilies_text_count."; ";
echo "var loopSmilies = 5; ";
echo "var xalkySmilies=new Array(); ";

for ($i = 0; $i <= $smilies_text_count-1; $i++)
{
	echo 'xalkySmilies['.$i.']="'.addslashes($smilies_text[$i]).'"; ';
}

/*
* create smilie image array 
*
*/

echo "var xalkySmiliesImg=new Array(); ";

for ($i = 0; $i <= $smilies_images_count-1; $i++)
{
	echo 'xalkySmiliesImg['.$i.']="<img style=\'vertical-align:middle;\' src=\'smilies/'.$smilies_images[$i].'\'>"; ';
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

echo "var groupChat = ".$_SESSION['groupChat']."; ";
echo "var groupPrivateChat = ".$_SESSION['groupPrivateChat']."; ";
echo "var groupCams = ".$_SESSION['groupCams']."; ";
echo "var groupWatch = ".$_SESSION['groupWatch']."; ";
echo "var groupRooms = ".$_SESSION['groupRooms']."; ";
echo "var groupVideo = ".$_SESSION['groupVideo']."; ";

if(!isset($_SESSION['groupChat']))
{
	echo "var groupCams = 0; ";
	echo "var groupWatch = 0; ";
	echo "var groupChat = 0; ";
	echo "var groupPrivateChat = 0; ";
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
	echo "initDoSilence = setInterval('xalkySilence()',1000); ";
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
* idle xalkyLogout timeout
*
*/

echo "var idleLogoutTimeout = ".$xalkyConfig['idleLogoutTimeout']."; ";

/* 
* copyright 
*
*/

echo "var showCopyright = ".xalkyRemBrand()."; ";

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