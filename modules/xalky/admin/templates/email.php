
<div>

<span class="result">
	&nbsp;<?php echo $result;?>
</span>

<?php echo print_r($_POST);?>

<form action ="index.php?option=email" method="post" name="xalkyMail">

	<table>

		<?php echo $html;?>
	

	</table>

</form>

<script language="javascript" type="text/javascript">
<!--
// submit form
function submitForm()
{
	document.xalkyMail.submit();
}

<?php if($_POST['totalSend']){?>
window.onload=function(){setTimeout('submitForm()','<?php echo $_POST['rateOfRefresh'] * 1000;?>');}
<?php }?>
//-->
</script>

</div>