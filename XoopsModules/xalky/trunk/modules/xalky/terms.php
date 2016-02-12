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

include("../../includes/session.php");
include("../../includes/functions.php");
include("../../lang/".getLang(''));
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head> 
<title><?php echo @copyrightTitle();?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link type="text/css" rel="stylesheet" href="style.css">

<style>

.hr
{
	border: 1px solid #333333;
}

.text
{
	font-family: Verdana, Arial;
	font-size: 12px;
	font-style: normal;
	colour: #FFFFFF;
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

.obody
{
	margin: 5px 5px 0 5px;
	padding: 0 0 0 0;	
	background-colour: #999999;	
}
</style>

</head>
<body class="obody">

<div class="pageheader">TERMS &amp; CONDITIONS</div>

<hr class="hr">

<p class="text">
	Your terms &amp; conditions appear here.
</p>

<!-- do not edit below -->
<p style="text-align:center;">
	<input class="button" type="button" name="close" value="<?php echo _MN_XALKY_CONST128;?>" onclick="parent.closeMdiv('terms');">
</p>

</body>
</html>