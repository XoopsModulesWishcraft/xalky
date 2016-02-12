<div>
	<span class="menu">
		<a class="button" href="?option=home">Home</a>
		<a class="button" href="http://community.xalky.com/viewforum.php?f=135" target="_blank">Tutorials</a>
		<a class="button" href="?option=add">Add User</a>		
		<a class="button" href="?option=users">Find User</a>
		<a class="button" href="?option=profiles">Profiles</a>
		<a class="button" href="?option=transcripts">Transcripts</a>
		<a class="button"  href="?option=bans">Bans</a>
		<a class="button"  href="?option=rooms">Rooms</a>
		<a class="button"  href="?option=groups">Groups</a>
		<?php if(file_exists("../plugins/adver/index.php")){?>
			<a class="button" href="?option=adverts">Adverts</a>
		<?php }?>
		<a class="button" href="?option=settings">Settings</a>
		<?php if(file_exists("../plugins/games/index.php")){?>
			<a class="button" href="?option=games">Games</a>
		<?php }?>
		<?php if(!$CONFIG['CMS']){?>
			<a class="button" href="?option=email">Email</a>
		<?php }?>
		
		<?php if(file_exists("../plugins/subs/index.php")){?>
			<a class="button" href="?option=subscriptions">Subs</a>
		<?php }?>
		
		<a class="button" href="?option=database">Database</a>
		<a class="button" href="?option=logout">Logout</a>
	</span>
</div>

<div style="clear:both;">

<div style="height: 5px;"></div>