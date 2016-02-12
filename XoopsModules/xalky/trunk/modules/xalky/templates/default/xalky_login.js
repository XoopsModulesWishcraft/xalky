
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