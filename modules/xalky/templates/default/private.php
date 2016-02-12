<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html> 
<head> 
<title><?php echo copyrightTitle();?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link type="text/css" rel="stylesheet" href="templates/<?php echo $CONFIG['template'];?>/style.css">

<style>

.privateLogin
{
	margin:  0 0 0 0; 
	padding: 2px 2px 2px 2px; 
	border: 1px solid #84B2DE;
	background-color: #FFFFFF;
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
	background-color: #666666;
	color: #FFFFFF;
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
	color: #333333;
	width: 100%;
}

.privateloginUserTableHeader
{ 
	padding: 2px 2px 2px 34px; 
	padding-left: 30px;
	background-color: #666666;
	font-weight: bold;
	font-size: 13px;
	height: 20px;
	color: #FFFFFF;

	-moz-border-radius: 3px;
	border-radius: 3px;	

	background-image: url('templates/default/images/icon.png');
	background-repeat: no-repeat;
}

.linka A:link {text-decoration: none; color: #333333;}
.linka A:visited {text-decoration: none; color: #333333;}
.linka A:active {text-decoration: none; color: #333333;}
.linka A:hover {text-decoration: underline; color: #333333;}

</style>

</head> 
<body class="body" style="text-align: center;">

	<div style="height: 100px">&nbsp;</div>

	<div id="privateLogin" class="privateLogin">

		<form method="post" action="index.php?roomID=<?php echo $_REQUEST['roomID'];?>" name="privateRoom">
		<table class="privateloginUserTable">
		<tr><td class="privateloginUserTableHeader" colspan="2"><?php echo C_LANG139;?></td></tr>
		<tr><td><?php echo C_LANG115;?></td><td><input class="privateloginInput" type="text" name="roomPass" value=""></td></tr>
		<tr><td>&nbsp;</td><td><input class="privateloginSubmit" type="submit" name="plogin" value="<?php echo C_LANG122;?>"></td></tr>
		<tr><td colspan="2">&nbsp;</td></tr>
		<tr><td colspan="2" align="right"><span class="linka"><a href="index.php?roomID=<?php echo $CONFIG['defaultRoom'];?>"><?php echo C_LANG140;?></a></span></td></tr>
		</table>
		</form>

	</div>

</body>
</html>