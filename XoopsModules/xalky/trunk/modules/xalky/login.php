<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html> 
<head> 
<title><?php echo @copyrightTitle();?></title>

<!--[if IE 9]>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8"> 
<![endif]--> 

<!--[if lt IE 9]>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7"> 
<![endif]-->

<meta name="viewport" content="width=device-width, target-densityDpi=device-dpi, initial-scale=1, user-scalable=no">		
<meta name="apple-mobile-web-app-capable" content="yes">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="">
<meta name="description" content="">
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="includes/lang.js.php"></script>
<script type="text/javascript" src="js/XmlHttpRequest.js.php"></script>
<script type="text/javascript" src="includes/settings.js.php"></script>
<script type="text/javascript" src="js/functions.js.php"></script>

<?php echo showPlugins('login');?>

<link type="text/css" rel="stylesheet" href="templates/<?php echo $xalkyConfig['template'];?>/style.css">

<style type="text/css">

.loginBody
{
	margin: 0 0 0 0px; 
	padding: 0 0 0 0; 
	background-color: #FFFFFF;
	background-image:url('templates/<?php echo $xalkyConfig['template'];?>/images/background.jpg');	
	background-repeat:repeat-x;
	font-family: Verdana, Arial;
	font-size: 12px;
	font-style: normal;
}

.backgroundContainer
{
	margin-top: 42px;
	height: 460px;
	width: 100%;

    background: url(<?php echo $xalkyConfig['loginImage'];?>) no-repeat center center fixed;
    -webkit-background-size: cover; /* For WebKit*/
    -moz-background-size: cover;    /* Mozilla*/
    -o-background-size: cover;      /* Opera*/
    background-size: cover;         /* Generic*/		
}

.loginContainer
{
	margin: 0 0 0 0; 
	padding: 40px 10px 0px 10px; 
	border: 0px solid #84B2DE;
	height: 420px;
	width: 900px;
	margin: 0 auto;
}

.loginLeft
{
	margin: 0px 0 0 0; 
	padding: 2px 2px 2px 2px; 
	height: 380px !important;
	height: 428px;
	width: 528px;
	text-align: left;
	display: inline;
	float: left;
}

.loginRight
{
	margin: 10px 0 0 0; 
	padding: 2px 2px 2px 2px; 
	border: 0px solid #84B2DE;
	height: 380px;
	width: 260px;
	text-align: center;
	display: inline;
	float: right;
}

.loginSubmit
{
	height: 24px;
	width: 140px;
	color: #FFFFFF;
	cursor: pointer;
	font-weight: bold;
	background-image: url('templates/<?php echo $xalkyConfig['template'];?>/images/loginbutton.gif');
	background-repeat: no-repeat;
}

.loginInput
{
	height: 14px;
	width: 140px;
	border: 1px solid #CCCCCC;
	
	-moz-border-radius: 5px;
	border-radius: 5px;	
}

.loginSelect
{
	height: 20px;
	width: 140px;
	border: 1px solid #CCCCCC;
	
	-moz-border-radius: 5px;
	border-radius: 5px;		
}

.loginUserTable
{
	text-align: left; 
	color: #333333;
	width: auto;
	-moz-border-radius: 3px;
	border-radius: 3px;		
}

.loginUserTableHeader
{ 
	padding: 2px 2px 2px 34px; 
	background-color: #666666;
	font-weight: bold;
	font-size: 13px;
	height: 20px;
	color: #FFFFFF;

	-moz-border-radius: 3px;
	border-radius: 3px;	

	background-image: url('templates/<?php echo $xalkyConfig['template'];?>/images/icon.png');
	background-repeat: no-repeat;	
}

.loginUserLatestNews
{
	color: #FFFFFF;
	min-height: 100px;
}

.loginFooter
{
	min-height: 200px;
	width: 100%;
	background-color: #FFFFFF;
}

.latestMembers
{
	min-height: 110px;
	width: 100%;
	background-color: #E2E2E2;
	padding-bottom: 10px;
}

.copyright
{
	padding-top:10px;
	padding-right:10px;	
	text-align: center;
	color: #333333;
	font-size: 12px;
	width: 900px;
	margin: 0 auto;
	border: 0px solid #84B2DE;	
}

.loginButton
{
	margin-top: 50px;
	cursor: pointer;
}

.registerButton
{
	margin-top: 10px;
	cursor: pointer;
}

.copyright A:link {text-decoration: none; color: #333333;}
.copyright A:visited {text-decoration: none; color: #333333;}
.copyright A:active {text-decoration: none; color: #333333;}
.copyright A:hover {text-decoration: underline; color: #333333;}

.link A:link {text-decoration: none; color: #333333;}
.link A:visited {text-decoration: none; color: #333333;}
.link A:active {text-decoration: none; color: #333333;}
.link A:hover {text-decoration: underline; color: #333333;}

</style>

<script type="text/javascript">

$(document).ready(function() {
  $(document).on('focus', ':input', function() {
    $(this).attr('autocomplete', 'off');
  });
});

function hideshow(divID)
{
	if(divID == "login")
	{		
		if(document.getElementById('login').style.display=="block")
		{
			document.getElementById('login').style.display="none"
		}
		else
		{
			document.getElementById('login').style.display="block"		
		}
		
		document.getElementById('register').style.display="none";
	}
		
	if(divID == "register")
	{
		if(document.getElementById('register').style.display=="block")
		{
			document.getElementById('register').style.display="none"
		}
		else
		{
			document.getElementById('register').style.display="block"		
		}
		
		document.getElementById('login').style.display="none";
	}	
}
</script>

</head> 
<body id="loginBody" class="loginBody" >

<?php if($loginError){?>
	<div class="welcomeMessage" style="position: fixed; top: 0px; z-index: 100; width: 100%;text-align: center;"><?php echo $loginError;?></div>	
<?php }?>

<div id="backgroundContainer"  class="backgroundContainer">

	<div id="loginContainer" class="loginContainer">
		
		<div id="logoContainer" class="logoContainer"></div>
			
		<div id="adverContainer" class="adverContainer"></div> 	

		<div id="loginRight" class="loginRight">
		
			<div id="loginButton" class="loginButton">
				<img onclick="hideshow('login')" src="templates/<?php echo $xalkyConfig['template'];?>/images/loginButton.png" alt="">
			</div>		
		
			<div id="login" style="display:none;">
				<form style="height:210px;" method="post" action="index.php" name="doLogin">
				<input type="hidden" name="login" value="1">
				<table class="loginUserTable">
				<tr><td>&nbsp;</td><td><?php if($xalkyConfig['guestMode']){?><input class="" type="checkbox" name="isGuest" value="1" onclick="toggleLoginPass()"><?php echo C_LANG114;?><?php }?>&nbsp;</td></tr>
				<tr><td><?php echo C_LANG54;?></td><td><input class="loginInput" type="text" name="userName" value="" maxlength="16"></td></tr>
				<tr id="pass"><td><?php echo C_LANG115;?></td><td><input class="loginInput" type="password" name="userPass" value=""></td></tr>
				<tr id="lostpass"><td>&nbsp;</td><td><span class="link"><a href="javascript:void(0);" onclick='showInfoBox("lost","260","400","200","templates/<?php echo $xalkyConfig['template'];?>/lost.php","");'><?php echo C_LANG116;?></a></span></td></tr>
				<tr><td><?php echo C_LANG117;?></td><td>

					<select name="roomID" class="loginSelect">
						<?php echo getUserRooms($_GET['roomID']);?>
					</select>

				</td></tr>
				<tr><td><?php echo C_LANG118;?></td><td>

					<select name="langID" class="loginSelect">
						<?php echo showLang();?>
					</select>

				</td></tr>
				<tr><td><?php echo C_LANG119;?></td><td>

					<select name="genderID" class="loginSelect">
						<?php echo getUserGenders('0');?>
					</select>

				</td></tr>
				<tr><td>&nbsp;</td><td><input type="image" style="height:22px;width:140px;" src="templates/<?php echo $xalkyConfig['template'];?>/images/login.jpg" name="newLogin" alt="Login"></td></tr>		
				<tr><td colspan="2">&nbsp;</td></tr>
				</table>
				</form>
			</div>
			
			<?php if(!$xalkyConfig['disableRegistration']){?>
				<div id="registerButton" class="registerButton">
					<img onclick="hideshow('register')" src="templates/<?php echo $xalkyConfig['template'];?>/images/registerButton.png" alt="">
				</div>	
				
				<div id="register" style="display:none;">			
					<form method="post" action="index.php" name="doReg">
					<input type="hidden" name="reg" value="1">
					<table class="loginUserTable">
					<tr><td colspan="2">&nbsp;</td></tr>
					<tr><td><?php echo C_LANG54;?>*</td><td><input class="loginInput" type="text" name="rUsername" value=""></td></tr>
					<tr><td><?php echo C_LANG115;?>*</td><td><input class="loginInput" type="password" name="rPassword" value=""></td></tr>
					<tr><td><?php echo C_LANG121;?>*</td><td><input class="loginInput" type="text" name="rEmail" value=""></td></tr>
					<tr><td>&nbsp;</td><td><input class="" type="checkbox" name="terms" value="1"><span class="link"><a href="javascript:void(0);" onclick='showInfoBox("terms","400","600","100","templates/<?php echo $xalkyConfig['template'];?>/terms.php","");'><?php echo C_LANG123;?></a></span></td></tr>
					<tr><td>&nbsp;</td><td><input type="image" style="height:22px;width:140px;" src="templates/<?php echo $xalkyConfig['template'];?>/images/register.jpg" name="newRegister" alt="Register"></td></tr>
					</table>
					</form>
				</div>
			<?php }?>

		</div>

		<div id="loginLeft" class="loginLeft">

			<table class="loginUserTable">
			<tr class="loginUserLatestNews"><td><?php echo getLoginNews();?><br><br></td></tr>
			</table>

		</div>
	</div>
	
</div>

<div class="latestMembers">
	<div id="latestMembers"></div>
</div>	
	
<div class='copyright'>
	<?php if($xalkyConfig['usersOnline']){?>
		<span class="link" style="float:left"><a href="javascript:void(0);" onclick='showInfoBox("online","300","320","100","templates/<?php echo $xalkyConfig['template'];?>/online.php","");'><?php echo C_LANG113;?>: <?php echo getUsersOnline('1');?></a>&nbsp;</span>
	<?php } ?>
	<span style="float:right;"><?php echo copyrightFooter();?></span>
	<div style="clear:both"></div>
</div>	

<div id="oInfo" class="oInfo"></div>

</body>
</html>