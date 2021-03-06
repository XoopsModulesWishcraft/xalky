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

include("../../include/session.php");
include("../../include/functions.php");
include("../../lang/".getLang(''));
// captcha
$showCaptcha = getCaptchaText();
// send email
if($_POST){$result = sendAdminEmail('1',$_POST['id'],$_POST['report']);}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head> 
<title><?php echo @copyrightTitle();?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link type="text/css" rel="stylesheet" href="style.css">

<style>

.table
{
	border: 0px;
}

.header
{
	font-weight: bold;
}

.row
{
	background-colour: #F5F5F5;
}

.sbody
{
	margin: 0 0 0 0; 
	padding: 0 0 0 0;
	background-colour: #CCCCCC;	
	font-family: Verdana, Arial;
	font-size: 12px;
	font-style: normal;
}

.sbutton
{
	height: 24px;
	width: 140px;
	border: 1px solid #333333;
	background-colour: #666666;
	colour: #FFFFFF;
	cursor: pointer;
	
	-moz-border-radius: 5px;
	border-radius: 5px;		
}

.sInput
{
	height: 60px;
	width: 200px;
	border: 1px solid #666666; 
	-moz-border-radius: 5px;
	border-radius: 5px;
	
}

.sCode
{
	border: 1px solid #666666; 
	-moz-border-radius: 5px;
	border-radius: 5px;
	
}

.sCaptcha
{
	colour: #000000;
	border: 1px solid #666666;
	padding: 2px;
	-moz-border-radius: 5px;
	border-radius: 5px;	
}

</style>

</head>
<body class="sbody">

<div class="roomheader">
	<div class="header" style='float:left;'><?php echo _MN_XALKY_CONST153;?></div>
	<div class="header" style='float:right;cursor:pointer;' onclick="parent.xalkyCloseMessage('report');"><img src='../../images/close.gif'></div>
</div>

<?php if(!$_POST){?>

	<form style="padding: 0 0 0 3px;" method="post" name="report" action="report.php">
		<input type="hidden" name="sCaptcha" value="<?php echo $showCaptcha;?>">
		<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>">
		<span><?php echo _MN_XALKY_CONST154;?>,</span><br><br>
		<table class="table">
		<tr><td><?php echo _MN_XALKY_CONST54;?>:</td><td><?php echo $_REQUEST['id'];?></td></tr>
		<tr><td valign="top"><?php echo _MN_XALKY_CONST155;?>:</td><td><textarea class="sInput" name="report" value=""></textarea></td></tr>
		<tr><td><?php echo _MN_XALKY_CONST156;?>:</td><td><input class="sCode" type="text" size="6" name="uCaptcha" value="">&nbsp;<span class="sCaptcha"><?php echo $showCaptcha;?></span></td></tr>
		<tr><td>&nbsp;</td><td><input class="sbutton" type="submit" name="send" value="<?php echo _MN_XALKY_CONST136;?>"></td></tr>
		</table>
	</form>

<?php }else{ ?>

	<p>&nbsp;<?php echo $result;?></p>

	<p>&nbsp;</p>

<?php }?>

<!-- do not edit below -->
<p style="text-align:center;">
	<input class="button" type="button" name="close" value="<?php echo _MN_XALKY_CONST128;?>" onclick="parent.xalkyCloseMessage('report');">
</p>

</body>
</html>