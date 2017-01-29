<?php

if(!defined('AEF')){

	die('Hacking Attempt');

}

function adminindex_theme(){

global $globals, $adnews, $theme, $onload;
	
	//Pass to onload to initialize a JS
	$onload['aefinfo'] = 'load_aef_info()';

	//Admin Headers includes Global Headershttp://www.anelectron.com/aefinfo.js
	adminhead('Administration Center');
		
	?><script language="javascript" type="text/javascript" src="http://www.anelectron.com/aefinfo.js"></script>
	<script type="text/javascript">
function load_aef_info(){
	$('aefnews').style.width = $('aefnewsholder').offsetWidth;
	//The news
	if(typeof(aef_news) == 'undefined'){
		$('aefnews').innerHTML = 'Could not connect to <a href="http://www.anelectron.com/">Anelectron.com</a> for the latest news.';
	}else{
		var newsstr = '';
		for(x in aef_news){
			newsstr = newsstr+'<div class="aefnewshead">'+aef_news[x][0]+'</div>'+'<div class="aefnewsblock">'+aef_news[x][1]+'</div><br />';
		}
		$('aefnews').innerHTML = newsstr;
	}
	//The current version
	if(typeof(aef_latest_version) == 'undefined'){
		$('newaefversion').innerHTML = '<i>No Info</i>';
	}else{
		$('newaefversion').innerHTML = aef_latest_version;
	}
}
</script>
	<table width="100%" cellpadding="0" cellspacing="5" border="0">
	<tr>
	
	<td width="60%">
	
<table width="100%" cellpadding="0" cellspacing="0">			
<tr>
<td>
<table width="100%" cellpadding="0" cellspacing="0"><tr>
<td class="tthl"></td>
<td class="tthc" align="left"><b>News</b></td>
<td class="tthr"></td>		
</tr>
</table>
</td>
</tr>

<tr>
<td width="100%" class="cbgbor" height="125" valign="top" id="aefnewsholder">
<div class="aefnews" id="aefnews"></div>
</td>
</tr>
</table>
		
	</td>
	
	<td>
	
<table width="100%" cellpadding="0" cellspacing="0">			
<tr>
<td>
<table width="100%" cellpadding="0" cellspacing="0"><tr>
<td class="tthl"></td>
<td class="tthc" align="left"><b>Board Info</b></td>
<td class="tthr"></td>		
</tr>
</table>
</td>
</tr>

<tr>
<td width="100%" style="line-height:180%;" class="cbgbor" height="125" valign="top">
<div class="aefnews"><b>PHP Version</b> : <?php echo phpversion();?><br />
<b>MySQL Version</b> : <?php echo mysql_get_server_info();?><br />
<b>AEF Version</b> : <?php echo $globals['version'];?><br />
<b>Latest AEF Version</b> : <span id="newaefversion"></span>
</div>
</td>
</tr>
</table>
	
	</td>
	
	</tr>
	</table>
	
	<table width="100%" cellpadding="4" cellspacing="10">
	<tr>
	
	<td width="10%" valign="top">
	<img src="<?php echo $theme['images'];?>admin/support.png">
	</td>
	
	<td width="40%" valign="top">	
	<font class="adgreen">Support</font><br />
	<table cellpadding="0" cellspacing="0" class="adlink">
	<tr><td><a href="http://www.anelectron.com/">Anelectron.com</a></td></tr>
	<tr><td><a href="http://faq.anelectron.com/">FAQ</a></td></tr>
	</table>	
	</td>
	
	<td width="10%">
	<img src="<?php echo $theme['images'];?>admin/controlpanel.png">
	</td>
	
	<td width="40%" valign="top">	
	<font class="adgreen">Control Panel</font><br />
	<table cellpadding="0" cellspacing="0" class="adlink">
	<tr><td><a href="<?php echo $globals['index_url'];?>act=admin&adact=conpan&seadact=coreset">Core Settings</a></td></tr>
	<tr><td><a href="<?php echo $globals['index_url'];?>act=admin&adact=conpan&seadact=mysqlset">MySQL Configuration</a></td></tr>
	</table>	
	</td>
	
	</tr>
	
	<tr>
	
	<td width="10%" valign="top">
	<img src="<?php echo $theme['images'];?>admin/categories.png">
	</td>
	
	<td width="40%" valign="top">	
	<font class="adgreen">Categories</font><br />
	<table cellpadding="0" cellspacing="0" class="adlink">
	<tr><td><a href="<?php echo $globals['index_url'];?>act=admin&adact=categories">Manage Categories</a></td></tr>
	<tr><td><a href="<?php echo $globals['index_url'];?>act=admin&adact=categories&seadact=createcat">Create New</a></td></tr>
	</table>	
	</td>
	
	<td width="10%">
	<img src="<?php echo $theme['images'];?>admin/forums.png">
	</td>
	
	<td width="40%" valign="top">	
	<font class="adgreen">Forums</font><br />
	<table cellpadding="0" cellspacing="0" class="adlink">
	<tr><td><a href="<?php echo $globals['index_url'];?>act=admin&adact=forums">Manage Forums</a></td></tr>
	<tr><td><a href="<?php echo $globals['index_url'];?>act=admin&adact=fpermissions">Forum Permissions</a></td></tr>
	</table>	
	</td>
	
	</tr>
	
	
	<tr>
	
	<td width="10%" valign="top">
	<img src="<?php echo $theme['images'];?>admin/users.png">
	</td>
	
	<td width="40%" valign="top">	
	<font class="adgreen">Users</font><br />
	<table cellpadding="0" cellspacing="0" class="adlink">
	<tr><td><a href="<?php echo $globals['index_url'];?>act=admin&adact=users&seadact=proacc">Profile & Account</a></td></tr>
	<tr><td><a href="<?php echo $globals['index_url'];?>act=admin&adact=ug&seadact=manug">Manage User Groups</a></td></tr>
	</table>	
	</td>
	
	<td width="10%">
	<img src="<?php echo $theme['images'];?>admin/emailpm.png">
	</td>
	
	<td width="40%" valign="top">	
	<font class="adgreen">Email and PM</font><br />
	<table cellpadding="0" cellspacing="0" class="adlink">
	<tr><td><a href="<?php echo $globals['index_url'];?>act=admin&adact=conpan&seadact=mailset">Mail Settings</a></td></tr>
	<tr><td><a href="<?php echo $globals['index_url'];?>act=admin&adact=users&seadact=pmset">PM Settings</a></td></tr>
	</table>	
	</td>
	
	</tr>
	
	<tr>
	
	<td width="10%" valign="top">
	<img src="<?php echo $theme['images'];?>admin/topicposts.png">
	</td>
	
	<td width="40%" valign="top">	
	<font class="adgreen">Topics and Posts</font><br />
	<table cellpadding="0" cellspacing="0" class="adlink">
	<tr><td><a href="<?php echo $globals['index_url'];?>act=admin&adact=tpp&seadact=topics">Topic Settings</a></td></tr>
	<tr><td><a href="<?php echo $globals['index_url'];?>act=admin&adact=tpp&seadact=posts">Post Settings</a></td></tr>
	</table>	
	</td>
	
	<td width="10%">
	<img src="<?php echo $theme['images'];?>admin/smileys.png">
	</td>
	
	<td width="40%" valign="top">	
	<font class="adgreen">Smileys</font><br />
	<table cellpadding="0" cellspacing="0" class="adlink">
	<tr><td><a href="<?php echo $globals['index_url'];?>act=admin&adact=smileys&seadact=smman">Manage Smileys</a></td></tr>
	<tr><td><a href="<?php echo $globals['index_url'];?>act=admin&adact=smileys&seadact=smset">Smiley Settings</a></td></tr>
	</table>	
	</td>
	
	</tr>
	
	</table>
	
			
	<?php
	
	//Admin footers includes Global footers
	adminfoot();
}



?>