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

<meta name="viewport" content="width=device-width, target-densityDpi=device-dpi, initial-scale=1, user-scalable=no" />		
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link type="text/css" rel="stylesheet" href="templates/<?php echo $xalkyConfig['template'];?>/style.css"> 
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="includes/lang.js.php"></script>
<script type="text/javascript" src="includes/settings.js.php"></script>
<script type="text/javascript" src="js/XmlHttpRequest.js.php"></script>
<script type="text/javascript" src="js/cookie.js.php"></script>
<script type="text/javascript" src="js/divLayout.js.php"></script>
<script type="text/javascript" src="js/message.js.php"></script>
<script type="text/javascript" src="js/functions.js.php"></script>
<script type="text/javascript" src="js/private.js.php"></script>
<script type="text/javascript" src="js/userlist.js.php"></script>
<script type="text/javascript" src="js/newRoom.js.php"></script>
<script type="text/javascript" src="js/swfobject.js"></script>
<script type="text/javascript" src="js/playSnd.js"></script>

<!-- SentryBot -->
<script type="text/javascript" src="js/sentryBotRes.js.php"></script>
<script type="text/javascript" src="js/sentryBot.js.php"></script>

<?php echo @showPlugins('main');?>

<script language="javascript" type="text/javascript">
<!--

/* user details */
var userName = '<?php echo $username;?>';
var userID = <?php echo $userid;?>;
var userID = '<?php echo $id;?>';
var userAvatar = '<?php echo $avatar;?>';
var roomOwner = <?php echo $roomOwner;?>;
var blockedList = '<?php echo $blockedList;?>';

/* room details */
var totalRooms = <?php echo $totalRooms;?>;
var roomID = <?php echo $roomID;?>;
var currRoom = <?php echo $roomID;?>;
var prevRoom = <?php echo $prevRoom;?>;
var publicWelcome = "<?php echo $roomDesc;?>";

/* last message ID */
var lastMessageID = <?php echo $lastMessageID;?>;

//-->
</script>

</head> 
<body id="body" class="body">

<div id="mainContainer" class="mainContainer">

	<div id="topContainer" class="topContainer"></div> 

	<div id="logoContainer" class="logoContainer"></div> 

	<div id="adverContainer" class="adverContainer"></div> 

	<div id="chatContainer" class="chatContainer" style="background-image:url('images/<?php echo $roomBg;?>');"></div>

	<img id="roomIcon" class="roomIcon" src="templates/<?php echo $xalkyConfig['template'];?>/images/rooms.png" alt="" onclick="newRoom('<?php if($_GET['sID']){?>0<?php }else{?>1<?php }?>');">

	<div id="roomCreate" class="roomCreate">

		<span><?php echo _MN_XALKY_CONST129;?><input class="roomInput" type="text" id="roomName" name="roomName" value=""></span>
		<span><?php echo _MN_XALKY_CONST130;?><input class="roomInput" type="text" id="roomPass" name="roomPass" value=""></span>
		<br><br>
		<span><input class="roomButtons" type="button" name="roombutton" value="<?php echo _MN_XALKY_CONST131;?>" onclick="addRoom();">&nbsp;<input class="roomButtons" type="button" name="" value="<?php echo _MN_XALKY_CONST132;?>" onclick="newRoom('0');"></span>

	</div>

	<select id="roomSelect" class="roomSelect" onchange="changeRooms(this.value);"></select>

	<div id="userContainer" class="userContainer"></div>

	<div id="optionsContainer" class="optionsContainer">

		<div class="optionsIcons" id="optionsIcons"></div>

		<textarea class="optionsBar" id="optionsBar" rows="10" cols="5" onKeyPress="return submitenter(this,event,'optionsBar','chatContainer','');" onfocus="changeMessBoxStyle('optionsBar');"></textarea>

		<span class="optionsSelectStatus">
			<span id="uwhisperID">
				<?php echo _MN_XALKY_CONST160;?>: <input class="whisper" type="text" id="whisperID">&nbsp;
			</span>	
			<input type="checkbox" id="autoScrollID" checked><?php echo _MN_XALKY_CONST135;?>&nbsp;
			<span id="icondigitalCredits" class="icondigitalCredits" style="cursor:pointer;" onclick='showInfoBox("ecredits","550","600","25","templates/<?php echo $xalkyConfig['template'];?>/ecredits.php","");'><?php echo _MN_XALKY_CONST109;?>: <span id="digitalCreditsID"></span></span>
		</span>

		<input class="optionsSend" id="optionsSend" type="button" value="<?php echo _MN_XALKY_CONST136;?>" onclick="addMessage('optionsBar','chatContainer')">

		<?php if(!$_GET['sID']){?>
			<input class="optionsLogout" id="optionsLogout" type="button" value="<?php echo _MN_XALKY_CONST137;?>" onclick="logout('0');">
		<?php }?>

	</div>

	<div id="menuWin" class="menuWin"></div>

	<div id="settingsWin" class="settingsWin"></div>

	<div id="pWin" class="pWin"></div>

	<div id="playSndDiv"></div>

</div>

<div id="oInfo" class="oInfo"></div>
</body> 
</html>