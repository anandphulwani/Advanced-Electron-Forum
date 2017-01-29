<?php

if(!defined('AEF'))
{
die('Hacking Attempt');
}


function proacc_theme(){

global $globals, $theme, $error;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Profile and Account Settings');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/users.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Profile and Account Settings</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	In this place you can change some Profile and Account Settings of users.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="proaccform">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Profile Settings
		</td>
		</tr>
		
		<tr>
		<td width="40%" class="adbg">
		<b>Users text length :</b><br />
		<font class="adexp">The max length of the users text that is displayed in posts.</font>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" size="30"  name="userstextlen" value="<?php echo (empty($_POST['userstextlen']) ? $globals['userstextlen'] : $_POST['userstextlen']);?>" />
		</td>
		</tr>
				
		<tr>
		<td class="adbg">
		<b>Users WWW length :</b><br />
		<font class="adexp">The max length of the users website link if given.</font>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" size="30"  name="wwwlen" value="<?php echo (empty($_POST['wwwlen']) ? $globals['wwwlen'] : $_POST['wwwlen']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Custom title length :</b><br />
		<font class="adexp">The max length of the users customtitle if given.(Cannot be more than 100)</font>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" size="30"  name="customtitlelen" value="<?php echo (empty($_POST['customtitlelen']) ? $globals['customtitlelen'] : $_POST['customtitlelen']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Location length :</b><br />
		<font class="adexp">The max length of the users location text if given.(Cannot be more than 255)</font>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" size="30"  name="locationlen" value="<?php echo (empty($_POST['locationlen']) ? $globals['locationlen'] : $_POST['locationlen']);?>" />
		</td>
		</tr>
				
	</table>
	
	<br />
	
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Account Settings
		</td>
		</tr>
		
		<tr>
		<td width="40%" class="adbg">
		<b>Real name length :</b><br />
		<font class="adexp">The max length of the users realname that is displayed in his/her profile.</font>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" size="30"  name="realnamelen" value="<?php echo (empty($_POST['realnamelen']) ? $globals['realnamelen'] : $_POST['realnamelen']);?>" />
		</td>
		</tr>
				
		<tr>
		<td class="adbg">
		<b>Secret question length :</b><br />
		<font class="adexp">The max length of the users secret question that is used for password retrieval.</font>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" size="30"  name="secretqtlen" value="<?php echo (empty($_POST['secretqtlen']) ? $globals['secretqtlen'] : $_POST['secretqtlen']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Secret Answer max length :</b><br />
		<font class="adexp">The max length of the users secret answer.</font>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" size="30"  name="secretansmaxlen" value="<?php echo (empty($_POST['secretansmaxlen']) ? $globals['secretansmaxlen'] : $_POST['secretansmaxlen']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Secret Answer Min length :</b><br />
		<font class="adexp">The minimum length of the users secret answer.</font>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" size="30"  name="secretansminlen" value="<?php echo (empty($_POST['secretansminlen']) ? $globals['secretansminlen'] : $_POST['secretansminlen']);?>" />
		</td>
		</tr>
        
        <tr>
		<td class="adbg" width="40%">
		<b>Allow Username changes :</b>
        <font class="adexp">If enabled users will be able to change thier usernames in the User CP.</font>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="checkbox" name="change_username"	<?php echo ($globals['change_username'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
				
	</table>
	
	<br />
	
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Signature Settings
		</td>
		</tr>
		
        <tr>
		<td class="adbg" width="40%">
		<b>Enable Signature :</b>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="checkbox" name="enablesig"	<?php echo ($globals['enablesig'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
        
		<tr>
		<td class="adbg" width="40%">
		<b>Users Sig Max length :</b><br />
		<font class="adexp">The max length of the users signature.</font>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" size="30"  name="usersiglen" value="<?php echo (empty($_POST['usersiglen']) ? $globals['usersiglen'] : $_POST['usersiglen']);?>" />
		</td>
		</tr>
		
	</table>
	
	<br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="editproacc" value="Submit" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}


function avaset_theme(){

global $globals, $theme, $error;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Avatar Settings');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/users.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Avatar Settings</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	Here you can edit the Avatar settings for all the users of the board.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="avasetform">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Avatar Settings
		</td>
		</tr>
		
		<tr>
		<td width="40%" class="adbg">
		<b>Show avatars:</b><br />
		<font class="adexp">Show avatars in posts and PM's.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="showavatars" <?php echo ($globals['showavatars'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Avatar Directory :</b><br />
		<font class="adexp">The directory of avatar files from which users can choose their avatars.</font>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" size="40"  name="avatardir" value="<?php echo (empty($_POST['avatardir']) ? $globals['avatardir'] : $_POST['avatardir']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Avatar URL :</b><br />
		<font class="adexp">The URL of default avatar files for easy display.</font>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" size="40"  name="avatarurl" value="<?php echo (empty($_POST['avatarurl']) ? $globals['avatarurl'] : $_POST['avatarurl']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Upload Avatar Directory :</b><br />
		<font class="adexp">The directory to which users can upload their avatar files.</font>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" size="40"  name="uploadavatardir" value="<?php echo (empty($_POST['uploadavatardir']) ? $globals['uploadavatardir'] : $_POST['uploadavatardir']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Upload Avatar URL :</b><br />
		<font class="adexp">The URL of uploaded avatar files for easy display.</font>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" size="40"  name="uploadavatarurl" value="<?php echo (empty($_POST['uploadavatarurl']) ? $globals['uploadavatarurl'] : $_POST['uploadavatarurl']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Upload Avatar Max Size :</b><br />
		<font class="adexp">The maximum size in Bytes of user uploaded avatar files.</font>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" size="40"  name="uploadavatarmaxsize" value="<?php echo (empty($_POST['uploadavatarmaxsize']) ? $globals['uploadavatarmaxsize'] : $_POST['uploadavatarmaxsize']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Upload Avatar File Types :</b><br />
		<font class="adexp">The allowed file types for uploaded avatars. Seperate by ','(comma)</font>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" size="40"  name="avatartypes" value="<?php echo (empty($_POST['avatartypes']) ? $globals['avatartypes'] : $_POST['avatartypes']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Width x Height of Avatar :</b><br />
		<font class="adexp">The Maximum width and height of a Avatar of a user.(in pixels)</font>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" size="10"  name="av_width" value="<?php echo (empty($_POST['av_width']) ? $globals['av_width'] : $_POST['av_width']);?>" /> x <input type="text" size="10"  name="av_height" value="<?php echo (empty($_POST['av_height']) ? $globals['av_height'] : $_POST['av_height']);?>" />
		</td>
		</tr>
		
	</table>
	
	<br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="editavaset" value="Submit" />
		</td>
		</tr>
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}


function ppicset_theme(){

global $globals, $theme, $error;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Personal Picture Settings');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/users.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Personal Picture Settings</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	Here you can edit the Personal Picture settings for all the users of the board.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="ppicsetform">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Personal Picture Settings
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Upload Personal Picture Directory :</b><br />
		<font class="adexp">The directory to which the Personal Picture files are to be uploaded.</font>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" size="40"  name="uploadppicdir" value="<?php echo (empty($_POST['uploadppicdir']) ? $globals['uploadppicdir'] : $_POST['uploadppicdir']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Personal Picture URL :</b><br />
		<font class="adexp">The URL of uploaded Personal Picture files for easy display.</font>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" size="40"  name="uploadppicurl" value="<?php echo (empty($_POST['uploadppicurl']) ? $globals['uploadppicurl'] : $_POST['uploadppicurl']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Personal Picture Max Size :</b><br />
		<font class="adexp">The maximum size in Bytes of user uploaded Personal Picture files.</font>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" size="40"  name="uploadppicmaxsize" value="<?php echo (empty($_POST['uploadppicmaxsize']) ? $globals['uploadppicmaxsize'] : $_POST['uploadppicmaxsize']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Personal Picture File Types :</b><br />
		<font class="adexp">The allowed file types for uploaded Personal Picture. Seperate by ','(comma)</font>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" size="40"  name="ppictypes" value="<?php echo (empty($_POST['ppictypes']) ? $globals['ppictypes'] : $_POST['ppictypes']);?>" />
		</td>
		</tr>       
		
		<tr>
		<td class="adbg">
		<b>Width x Height of Avatar :</b><br />
		<font class="adexp">The Maximum width and height of a Avatar of a user.(in pixels)</font>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" size="10"  name="ppic_width" value="<?php echo (empty($_POST['ppic_width']) ? $globals['ppic_width'] : $_POST['ppic_width']);?>" /> x <input type="text" size="10"  name="ppic_height" value="<?php echo (empty($_POST['ppic_height']) ? $globals['ppic_height'] : $_POST['ppic_height']);?>" />
		</td>
		</tr>
	
	</table>
	
	<br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="editppicset" value="Submit" />
		</td>
		</tr>
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}

//Pm Settings theme
function pmset_theme(){

global $globals, $theme, $error;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Personal Message Settings');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/users.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Personal Message Settings</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	Here you can edit the Personal Message settings for all the users of the board.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="pmsetform">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Personal Message Settings
		</td>
		</tr>
		
		<tr>
		<td width="45%" class="adbg">
		<b>Enable PM :</b><br />
		<font class="adexp">Let the users use the Personal Message System</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="pmon" <?php echo ($globals['pmon'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Notify new PM :</b><br />
		<font class="adexp">When user logs in notify him about new PM or no.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="notifynewpm" <?php echo ($globals['notifynewpm'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Allow Smileys :</b><br />
		<font class="adexp">Allow smileys to be used in the PM system.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="pmusesmileys" <?php echo ($globals['pmusesmileys'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Save Outgoing PM :</b><br />
		<font class="adexp">Save the outgoing PM in the users 'Sent Items' folder.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="pmsaveinsentitems" <?php echo ($globals['pmsaveinsentitems'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Number of PM :</b><br />
		<font class="adexp">The number of PM to show on each page in the PM folders.</font>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" size="40"  name="pmnumshowinfolders" value="<?php echo (empty($_POST['pmnumshowinfolders']) ? $globals['pmnumshowinfolders'] : $_POST['pmnumshowinfolders']);?>" />
		</td>
		</tr>		
	
	</table>
	
	<br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="editpmset" value="Submit" />
		</td>
		</tr>
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}


?>