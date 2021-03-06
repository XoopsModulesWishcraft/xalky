
<div>

<span class="result">
	&nbsp;<?php echo $result;?>
</span>

<table class="table">
<tr><td class="header"><b>Welcome to the Administration Control Panel</b></td></tr>
</table>

<br>

<table class="table">
<tr><td class="header"><b>Information &amp; Additional Resources</b></td></tr>
<tr><td>&#187;&nbsp;[<a href='http://xalky.com/community/' target='_blank'>Community Forum</a>] - "How to?" Tutorials and User to User support for Xalky software.</td></tr>
<tr><td>&#187;&nbsp;[<a href='http://xalky.com/news.php' target='_blank'>Latest News</a>] - For the lastest news from Xalky.</td></tr>
<tr><td>&#187;&nbsp;[<a href='http://xalky.com/clients.php' target='_blank'>Client Area</a>] - For all updates &amp; patches for the Xalky software.</td></tr>
<tr><td>&nbsp;</td></tr>
</table>

<br>

<table class="table">
<tr><td class="header"><b>Latest News &amp; Updates</b></td></tr>
<tr><td><iframe scrolling="yes" style="height:140px;width:99%;border:1px solid #84B2DE;overflow-x:hidden;background-colour:#FFFFFF;" src="http://xalky.com/pcr_newsfeed.txt">Iframes are not supported.</iframe></td></tr>
</table>

<br>

<table class="table">
<tr><td class="header"><b>Xalky Room Version</b></td></tr>
<tr><td>You are currently using version <?php echo $xalkyConfig['version'];?></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&#187; [<a href="http://xalky.com/clients.php" target="_blank">Download Updates</a>]</td></tr>
</table>

<br>

<table class="table">
<tr><td class="header"><b>Available Plugins</b></td></tr>
<tr><td>The following plugins have been found in the <i>/plugins/</i> folder,</td></tr>
<tr><td>
	<?php $plugins = 0; ?>
	<?php if(file_exists("../plugins/rembrand/index.php")){?><i>Remove Branding,</i> <?php $plugins = 1; }?>
	<?php if(file_exists("../plugins/adver/index.php")){?><i>Adverts,</i> <?php $plugins = 1; }?>
	<?php if(file_exists("../plugins/events/index.php")){?><i>Events,</i> <?php $plugins = 1; }?>
	<?php if(file_exists("../plugins/games/index.php")){?><i>Games,</i> <?php $plugins = 1; }?>
	<?php if(file_exists("../plugins/invisible/index.html")){?><i>Invisible Admins,</i> <?php $plugins = 1; }?>
	<?php if(file_exists("../plugins/login_gallery/index.php")){?><i>Login Gallery,</i> <?php $plugins = 1; }?>
	<?php if(file_exists("../plugins/moderated_chat/index.php")){?><i>Moderated Xalky,</i> <?php $plugins = 1; }?>
	<?php if(file_exists("../plugins/share/index.php")){?><i>Share Files,</i> <?php $plugins = 1; }?>
	<?php if(file_exists("../plugins/webcams/index.html")){?><i>Webcams,</i> <?php $plugins = 1; }?> 
	<?php if($plugins == 0){?><i>None</i><?php }?>
</td></tr>
<tr><td>&nbsp;</td></tr>
<?php if(file_exists("../mobile/index.php")){?>
	<tr><td>The Mobile plugin has been found in the folder 'mobile'.</td></tr>
<?php }?>	
<tr><td>&#187; [<a href="http://xalky.com/plugins.php" target="_blank">Get More Plugins</a>]</td></tr>
</table>

<br>

<table class="table">
<tr><td class="header"><b>Server Details</b></td></tr>
<tr><td>&#187; Domain Name: <?php echo $_SERVER['SERVER_NAME'];?></td></tr>
</table>

<br>

<table class="table">
<tr><td class="header"><b>Login IP &amp; Browser Details</b></td></tr>
<tr><td>&#187; Browser: <?php echo $_SERVER['HTTP_USER_AGENT'];?></td></tr>
<tr><td>&#187; UserIP: <?php echo getIP();?></td></tr>
<tr><td>&nbsp;</td></tr>
</table>

</div>
