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
<title><?php echo @copyrightTitle();?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link type="text/css" rel="stylesheet" href="../templates/<?php echo $xalkyConfig['template'];?>/style.css">


<style>
.profileTable
{
	margin: 0 0 0 0; 
	padding: 2px 2px 2px 2px; 
	border: 1px solid #333333;
	background-colour: #CCCCCC;
	text-align: left;
	width: 320px;
	margin: 0 auto;
	
	-moz-border-radius: 8px;
	border-radius: 8px;		
}

.profileTableHeader
{ 
	background-colour: #EDF1FA;
	font-weight: bold;
	font-size: 13px;
	colour: #84B2DE;
}

.profileCopyright
{
	text-align: center;
	colour: #666666;
	font-size: 12px;
}

.profileHeader
{ 
	padding: 2px 2px 2px 34px; 
	background-colour: #666666;
	font-weight: bold;
	font-size: 13px;
	height: 20px;
	colour: #FFFFFF;

	-moz-border-radius: 3px;
	border-radius: 3px;	

	background-image: url('../templates/<?php echo $xalkyConfig['template'];?>/images/icon.png');
	background-repeat: no-repeat;	
}

.spacer1
{
	height: 100px;
}

.linka A:link {text-decoration: none; colour: #666666;}
.linka A:visited {text-decoration: none; colour: #666666;}
.linka A:active {text-decoration: none; colour: #666666;}
.linka A:hover {text-decoration: underline; colour: #666666;}
</style>

</head>
<body class="body" style="text-align: center;">

<div id="logoContainer" class="logoContainer"></div>

<div class="spacer1">&nbsp;</div>

<span style="colour: red;"><?php echo $profileUpdated;?></span>

<?php if(isset($_REQUEST['edit'])){?>
	<form enctype="multipart/form-data" action="index.php?id=<?php echo $_REQUEST['id'];?>" method="POST">
	<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_image_size;?>" />
	<input type="hidden" name="edit" value="<?php echo $_REQUEST['edit'];?>" />
<?php }?>

	<table class="profileTable">
	<tr><td colspan="2" class="profileHeader"><?php echo _MN_XALKY_CONST141;?></td></tr>
	<tr><td><?php echo _MN_XALKY_CONST54;?>:</td><td>

		<?php echo urldecode($username);?> 

		<?php if(!$_REQUEST['edit'] && $_SESSION['myProfileID'] == $_REQUEST['id']){?>
			&nbsp;<span class="linka">[<a href="index.php?id=<?php echo $_REQUEST['id'];?>&edit=1" <?php if(isset($_SESSION['guest'])){?>onclick="javascript:alert('Please register to edit your profile!');return false;"<?php }?> ><?php echo _MN_XALKY_CONST142;?></a>]</span>
		<?php }?>

	</td></tr>
	<tr><td><?php echo _MN_XALKY_CONST143;?>:</td><td>

		<?php if(isset($_REQUEST['edit'])){?>
			<input maxlength="64" type="text" name="profileRealname" value="<?php echo stripslashes(urldecode($realname));?>">
		<?php }else{?>
			<?php echo htmlspecialchars(stripslashes(urldecode($realname)));?>
		<?php }?>

	</td></tr>

	<?php if(isset($_REQUEST['edit'])){?>

		<tr><td align><?php echo _MN_XALKY_CONST115;?>:</td><td>

			<input maxlength="64" type="text" name="profilePass" value=""><br>

		</td></tr>
		<tr><td align>&nbsp;</td><td>

			<font size="1">(<?php echo _MN_XALKY_CONST144;?>)</font>

		</td></tr>
		<tr><td><?php echo _MN_XALKY_CONST121;?>:</td><td>

			<input maxlength="100" type="text" name="profileEmail" value="<?php echo urldecode($email);?>">

		</td></tr>

	<?php }?>

	<tr><td><?php echo _MN_XALKY_CONST145;?>:</td><td>

		<?php if(isset($_REQUEST['edit'])){?>
			<select name="profileAge">
				<?php echo getUserAge($age);?>
			</select>
		<?php }else{?>
			<?php echo $age;?>
		<?php }?>

	</td></tr>
	<tr><td><?php echo _MN_XALKY_CONST119;?>:</td><td>

		<?php if(isset($_REQUEST['edit'])){?>
			<select name="profileGender">
				<?php echo getUserGenders($gender);?>
			</select>
		<?php }else{?>
			<?php echo getProfileGenders($gender);?>
		<?php }?>

	</td></tr>
	<tr><td><?php echo _MN_XALKY_CONST146;?>:</td><td>

		<?php if(isset($_REQUEST['edit'])){?>
			<input type="file" name="uploadedfile">
			</td></tr>
			<tr><td>&nbsp;</td><td>
			<input type="checkbox" name="del" value="1"><?php echo _MN_XALKY_CONST147;?>
		<?php }else{?>
			<a href="view.php?id=<?php echo $_GET['id'];?>" target="_blank"><img src="view.php?id=<?php echo $_GET['id'];?>" height="110" width="120" border="0"></a>
		<?php }?>

	</td></tr>
	<tr><td><?php echo _MN_XALKY_CONST148;?>:</td><td>

		<?php if(isset($_REQUEST['edit'])){?>
			<input maxlength="64" type="text" name="profileLocation" value="<?php echo stripslashes(urldecode($location));?>">
		<?php }else{?>
			<?php echo htmlspecialchars(stripslashes(urldecode($location)));?>
		<?php }?>

	</td></tr>
	<tr><td><?php echo _MN_XALKY_CONST149;?>:</td><td>

		<?php if(isset($_REQUEST['edit'])){?>
			<input maxlength="64" type="text" name="profileHobbies" value="<?php echo stripslashes(urldecode($hobbies));?>">
		<?php }else{?>
			<?php echo htmlspecialchars(stripslashes(urldecode($hobbies)));?>
		<?php }?>

	</td></tr>
	<tr><td valign="top"><?php echo _MN_XALKY_CONST150;?>:</td><td valign="top">

		<?php if(isset($_REQUEST['edit'])){?>
			<textarea maxlength="500" name="profileAboutme" rows="5" cols="20"><?php echo stripslashes(urldecode($aboutme));?></textarea>
		<?php }else{?>
			<?php echo chunk_split(htmlspecialchars(stripslashes(urldecode($aboutme))),32,'&#8203;');?>
		<?php }?>

	</td></tr>
	<tr><td colspan="2" align="center" style="word-wrap: break-word;">&nbsp;

		<?php if(isset($_REQUEST['edit'])){?>
			<input class="button" type="submit" name="submit" value="<?php echo _MN_XALKY_CONST151;?>"><br><br>
			<span class="linka"><a href="index.php?id=<?php echo $_REQUEST['id'];?>"><?php echo _MN_XALKY_CONST152;?></a></span>
		<?php }?>

	</td></tr>
	</table>

<?php if(isset($_REQUEST['edit'])){?>
	</form>
<?php }?>

	<div class='profileCopyright'>
		<span class="linka"><?php echo copyrightFooter();?></span>
	</div>

</body>
</html>