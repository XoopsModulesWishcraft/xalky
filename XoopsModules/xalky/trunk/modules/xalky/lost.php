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

include("../../include/ini.php");
include("../../include/session.php");
include("../../include/functions.php");
include("../../lang/".getLang(''));

// captcha
$showCaptcha = getCaptchaText();

// send user new password
if($_POST){$result = resetPassword($_POST);}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head> 
<title><?php echo @copyrightTitle();?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link type="text/css" rel="stylesheet" href="style.css">

<style>
.text
{
	font-family: Verdana, Arial;
	font-size: 12px;
	font-style: normal;
	colour: #FFFFFF;
}
.sbutton
{
	height: 22px;
	width: 160px;
	border: 1px solid #333333;
	background-colour: #666666;
	colour: #FFFFFF;
	cursor: pointer;
	
	-moz-border-radius: 5px;
	border-radius: 5px;		
}
.sinput
{
	width: 162px;
	border: 1px solid #666666; 
	-moz-border-radius: 5px;
	border-radius: 5px;
}
.obody
{
	margin: 5px 5px 0 5px;
	padding: 0 0 0 0;	
	background-colour: #999999;
}
.pageheader
{ 
	padding: 2px 2px 2px 34px; 
	background-colour: #666666;
	font-weight: bold;
	font-size: 13px;
	height: 20px;
	colour: #FFFFFF;
	font-family: Verdana, Arial;
	font-size: 12px;
	
	-moz-border-radius: 3px;
	border-radius: 3px;	

	background-image: url('images/icon.png');
	background-repeat: no-repeat;	
}

.sCaptcha
{
	colour: #ffffff;
	border: 1px solid #eeeeee;
	padding: 2px;
	-moz-border-radius: 5px;
	border-radius: 5px;	
}
</style>

</head>
<body class="obody">

<div class="pageheader"><?php echo _MN_XALKY_CONST116;?></div>

<p class="text">
	<?php echo _MN_XALKY_CONST126;?>

	<?php if($result){echo "<br><br>Result: ".$result;}?>
</p>

<p>
	<form method="post" name="newpass" action="lost.php" style="text-align:center;">
		<input type="hidden" name="sCaptcha" value="<?php echo $showCaptcha;?>">
		<table>
		<tr><td class="text" align="left"><?php echo _MN_XALKY_CONST121;?>:&nbsp;<input class="sinput" type="text" name="userEmail" value=""></td></tr>
		<tr><td class="text" align="left"><?php echo _MN_XALKY_CONST156;?>:&nbsp;<input class="sCode" type="text" size="6" name="uCaptcha" value="">&nbsp;<span class="sCaptcha">&nbsp;<?php echo $showCaptcha;?>&nbsp;</span></td></tr>		
		<tr><td align="right"><input class="sbutton" type="submit" name="sendPass" value="<?php echo _MN_XALKY_CONST127;?>"></td></tr>
		</table>
	</form>
</p>

<!-- do not edit below -->
<p style="text-align:center;">
	<input class="button" type="button" name="close" value="<?php echo _MN_XALKY_CONST128;?>" onclick="parent.xalkyCloseMessage('lost');">
</p>

</body>
</html>