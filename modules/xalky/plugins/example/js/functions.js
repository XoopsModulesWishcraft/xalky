
/*
* show xalkyplugin
* 
*/

function xalkyplugin()
{
	var xalkyPluginTitle = 'My Plugin';
	var xalkyPluginUrl = 'plugins/example/index.php';
	var xalkyPluginImage = 'plugins/example/images/image.gif';
	var xalkyPluginHeight = '100';
	var xalkyPluginDiv = 'xalkyPluginDiv';
	var xalkyPluginShowContent = 'showMyPluginContent';
	var xalkyPluginContent = 'xalkyPluginContent';

	/**

	DO NOT EDIT BELOW

	**/

	// if div does not exist
	if(!document.getElementById(xalkyPluginDiv))
	{
		// create div
		var ni = document.getElementById('userContainer');
		var newdiv = document.createElement('div');

		newdiv.setAttribute("id",xalkyPluginDiv);
		newdiv.className = "";
		newdiv.innerHTML = '<div class="roomheader" onclick="xalkyToggleHeader(\''+xalkyPluginDiv+'\');"><img style="vertical-align:middle;" src="'+xalkyPluginImage+'">&nbsp;'+xalkyPluginTitle+'</div>';
		newdiv.innerHTML += '<div id="'+xalkyPluginShowContent+'"></div>';

		ni.appendChild(newdiv);
	}

	// if div does not exist
	if(!document.getElementById(xalkyPluginContent))
	{
		// create div

		var ni = document.getElementById(xalkyPluginShowContent);
		var newdiv = document.createElement('iframe');

		newdiv.setAttribute("id",xalkyPluginContent);
		newdiv.src = xalkyPluginUrl;
		newdiv.height = xalkyPluginHeight;
		newdiv.width = "220";
		newdiv.frameBorder = "0";

		ni.appendChild(newdiv);

	}

}