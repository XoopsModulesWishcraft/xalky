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
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html> 
<head> 
<title><?php echo copyrightTitle();?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link type="text/css" rel="stylesheet" href="templates/<?php echo $xalkyConfig['template'];?>/style.css">

<style>

.privateLogin
{
	margin:  0 0 0 0; 
	padding: 2px 2px 2px 2px; 
	border: 1px solid #84B2DE;
	background-colour: #FFFFFF;
	height: 110px;
	width: 260px;
	top: 100px;
	text-align: center;
	margin: 0 auto;
	
	-moz-border-radius: 8px;
	border-radius: 8px;		
}

.privateloginSubmit
{
	padding: 0 3px 5px 3px;
	height: 20px;
	width: 110px;
	border: 1px solid #333333;
	background-colour: #666666;
	colour: #FFFFFF;
	cursor: pointer;
	text-align: center;
	
	-moz-border-radius: 5px;
	border-radius: 5px;
}

.privateloginInput
{
	height: 14px;
	width: 140px;
	border: 1px solid #CCCCCC;
}

.privateloginUserTable
{
	text-align: left; 
	colour: #333333;
	width: 100%;
}

.privateloginUserTableHeader
{ 
	padding: 2px 2px 2px 34px; 
	padding-left: 30px;
	background-colour: #666666;
	font-weight: bold;
	font-size: 13px;
	height: 20px;
	colour: #FFFFFF;

	-moz-border-radius: 3px;
	border-radius: 3px;	

	background-image: url('templates/default/images/icon.png');
	background-repeat: no-repeat;
}

.linka A:link {text-decoration: none; colour: #333333;}
.linka A:visited {text-decoration: none; colour: #333333;}
.linka A:active {text-decoration: none; colour: #333333;}
.linka A:hover {text-decoration: underline; colour: #333333;}

</style>

</head> 
<body class="body" style="text-align: center;">

	<div style="height: 100px">&nbsp;</div>

	<div id="privateLogin" class="privateLogin">

		<form method="post" action="index.php?roomID=<?php echo $_REQUEST['roomID'];?>" name="privateRoom">
		<table class="privateloginUserTable">
		<tr><td class="privateloginUserTableHeader" colspan="2"><?php echo _MN_XALKY_CONST139;?></td></tr>
		<tr><td><?php echo _MN_XALKY_CONST115;?></td><td><input class="privateloginInput" type="text" name="roomPass" value=""></td></tr>
		<tr><td>&nbsp;</td><td><input class="privateloginSubmit" type="submit" name="plogin" value="<?php echo _MN_XALKY_CONST122;?>"></td></tr>
		<tr><td colspan="2">&nbsp;</td></tr>
		<tr><td colspan="2" align="right"><span class="linka"><a href="index.php?roomID=<?php echo $xalkyConfig['defaultRoom'];?>"><?php echo _MN_XALKY_CONST140;?></a></span></td></tr>
		</table>
		</form>

	</div>

</body>
</html>