
<script type="text/javascript">
<!--
function confirmDelete(id)
{
	var answer = confirm("Are you sure you want to delete: ID "+id+" ? \r\n\r\nNOTE: This action cannot be undone.")
	if (answer){
		window.location = "index.php?option=subscriptions&del="+id;
	}
	else{
		return false;
	}
}
//-->
</script>
<div>

<span class="result">
	&nbsp;<?php echo $result;?>
</span>

<form action="index.php?option=subscriptions" method="post" name="subs">
<input type="hidden" name="update" value="1">
		<?php echo $html;?>

</form>

</div>
