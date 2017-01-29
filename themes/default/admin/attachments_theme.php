<?php

if(!defined('AEF')){

	die('Hacking Attempt');

}


function attset_theme(){

global $globals, $theme, $error;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Attachment Settings');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/attachments.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Attachment Settings</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	This is the place for changing the Attachment settings of the board.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="attsetform">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Attachment Settings
		</td>
		</tr>
	
		<tr>
		<td width="45%" class="adbg">
		<b>Allow Downloads:</b><br />
		<font class="adexp">If disabled no one will be allowed to download any attachment.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="attachmentmode" <?php echo ($globals['attachmentmode'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Allow New Attachments:</b><br />
		<font class="adexp">If disabled no one will be allowed to upload any new attachment.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="allownewattachment" <?php echo ($globals['allownewattachment'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Attachment Directory :</b><br />
		<font class="adexp">The directory where all attachments will be stored.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="attachmentdir" value="<?php echo (empty($_POST['attachmentdir']) ? $globals['attachmentdir'] : $_POST['attachmentdir']);?>" />
		</td>
		
		<tr>
		<td class="adbg">
		<b>Max Attachments per post :</b><br />
		<font class="adexp">The maximum number of attachments per post.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="maxattachmentpost" value="<?php echo (empty($_POST['maxattachmentpost']) ? $globals['maxattachmentpost'] : $_POST['maxattachmentpost']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Max size per attachment :</b><br />
		<font class="adexp">The maximum size(in KB) of an attachment.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="maxattachsize" value="<?php echo (empty($_POST['maxattachsize']) ? $globals['maxattachsize'] : $_POST['maxattachsize']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Max size per post :</b><br />
		<font class="adexp">The maximum size(in KB) of all attachments in a post.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="maxattachsizepost" value="<?php echo (empty($_POST['maxattachsizepost']) ? $globals['maxattachsizepost'] : $_POST['maxattachsizepost']);?>" />
		</td>
		</tr>		
		
		<tr>
		<td class="adbg">
		<b>Show Image Attachment:</b><br />
		<font class="adexp">If enabled image attachments will be showed in posts.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="attachmentshowimage" <?php echo ($globals['attachmentshowimage'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Attachment URL :</b><br />
		<font class="adexp">The attachment URL to display image attachments.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="attachmenturl" value="<?php echo (empty($_POST['attachmenturl']) ? $globals['attachmenturl'] : $_POST['attachmenturl']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Max Image Width :</b><br />
		<font class="adexp">The maximum width of the image attachment that will be displayed in posts.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="attachmentshowimagemaxwidth" value="<?php echo (empty($_POST['attachmentshowimagemaxwidth']) ? $globals['attachmentshowimagemaxwidth'] : $_POST['attachmentshowimagemaxwidth']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Max Image Height :</b><br />
		<font class="adexp">The maximum height of the image attachment that will be displayed in posts.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="attachmentshowimagemaxheight" value="<?php echo (empty($_POST['attachmentshowimagemaxheight']) ? $globals['attachmentshowimagemaxheight'] : $_POST['attachmentshowimagemaxheight']);?>" />
		</td>
		</tr>
		
		
	</table>
	
	<br /><br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="editattset" value="Submit" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}

function attmime_theme(){

global $globals, $theme, $mimetypes;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Attachment Types');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/attachments.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Attachment Types</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	This is the place for managing the Attachment Types of the board.
	</td>
	</tr>
	
	</table>
	<br /><br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	<tr>
	<td class="adcbg" colspan="5">
	Allowed Extensions and Mimetypes
	</td>
	</tr>
	
	<tr align="center">
	<td class="adcbg2" height="18" width="10%">
	<b>Icon</b>
	</td>
	<td class="adcbg2" width="25%">
	<b>Extension</b>
	</td>
	<td class="adcbg2" width="35%">
	<b>Mimetype</b>
	</td>
	<td class="adcbg2" width="15%">
	<b>Edit</b>
	</td>
	<td class="adcbg2" width="15%">
	<b>Delete</b>
	</td>
	</tr>
	
	<?php
	
	if(empty($mimetypes)){
	
	echo '<tr>
	<td class="adbg" colspan="5">
	No allowed extensions were found.
	</td>
	</tr>';
	
	}else{
	
	foreach($mimetypes as $mk => $mv){
	
	echo '<tr>
	<td class="adbg">
	<img src="'.$globals['url'].'/mimetypes/'.$mimetypes[$mk]['atmt_icon'].'">
	</td>
	<td class="adbg">
	.'.$mimetypes[$mk]['atmt_ext'].'
	</td>
	<td class="adbg">
	'.$mimetypes[$mk]['atmt_mimetype'].'
	</td>
	<td class="adbg" align="center">
	<a href="'.$globals['index_url'].'act=admin&adact=attach&seadact=editmime&atmtid='.$mimetypes[$mk]['atmtid'].'">Edit</a>
	</td>
	<td class="adbg" align="center">
	<a href="'.$globals['index_url'].'act=admin&adact=attach&seadact=delmime&atmtid='.$mimetypes[$mk]['atmtid'].'">Delete</a>
	</td>
	</tr>';
	
	}		
	
	}
	
	?>
	
	</table>
	<br />
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	<tr>
	<td align="center" class="adbg">
	<input type="button" value="Add New Type"  onclick="javascript:window.location='<?php echo $globals['index_url'].'act=admin&adact=attach&seadact=addmime';?>'" />
	</td>
	</tr>	
	</table>
	
	<?php	
	
	adminfoot();
	
}

//Edit Mimetypes
function editmime_theme(){

global $globals, $theme, $error, $mimetype;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Edit Attachment Types');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/attachments.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen"> Edit Attachment Types</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	This is the place for editing the Attachment Types that are allowed.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="editmimeform">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Edit Attachment Types
		</td>
		</tr>
	
		<tr>
		<td width="45%" class="adbg">
		<b>Extension :</b><br />
		<font class="adexp">The extension of the attachment files to be allowed for uploads.(No '.' is required)</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="atmt_ext" value="<?php echo (empty($_POST['atmt_ext']) ? $mimetype['atmt_ext'] : $_POST['atmt_ext']);?>" />
		</td>
		</tr>
		
		<tr>
		<td width="45%" class="adbg">
		<b>Mime type :</b><br />
		<font class="adexp">The mimetype of the allowed extension.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="atmt_mimetype" value="<?php echo (empty($_POST['atmt_mimetype']) ? $mimetype['atmt_mimetype'] : $_POST['atmt_mimetype']);?>" />
		</td>
		</tr>
		
		<tr>
		<td width="45%" class="adbg">
		<b>File type icon :</b><br />
		<font class="adexp">This is the icon that represents the allowed file type. The icon must be present in the 'mimetypes' folder in the root directory.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="atmt_icon" value="<?php echo (empty($_POST['atmt_icon']) ? $mimetype['atmt_icon'] : $_POST['atmt_icon']);?>" />
		</td>
		</tr>
		
        <tr>
		<td class="adbg">
		<b>Allow in posts :</b><br />
		<font class="adexp">If checked then this file type attachments will be accepted in posts.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="atmt_posts" <?php echo (empty($_POST['atmt_posts']) ? (empty($mimetype['atmt_posts']) ? '' : 'checked="checked"') : 'checked="checked"');?> />
		</td>
		</tr>
        
		<tr>
		<td class="adbg">
		<b>Allow in avatars :</b><br />
		<font class="adexp">If checked then this file type will be accepted for avatars.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="atmt_avatar" <?php echo (empty($_POST['atmt_avatar']) ? (empty($mimetype['atmt_avatar']) ? '' : 'checked="checked"') : 'checked="checked"');?> />
		</td>
		</tr>
        
		<tr>
		<td class="adbg">
		<b>Is image :</b><br />
		<font class="adexp">Is this file type an image extension ?</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="atmt_isimage" <?php echo (empty($_POST['atmt_isimage']) ? (empty($mimetype['atmt_isimage']) ? '' : 'checked="checked"') : 'checked="checked"');?> />
		</td>
		</tr>
        
	</table>
	
	<br /><br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="editmime" value="Submit" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}


//Edit Mimetypes
function addmime_theme(){

global $globals, $theme, $error;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Add Attachment Types');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>users.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Add Attachment Types</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	This is the place for adding the Attachment Types that are allowed.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="addmimeform">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Add Attachment Types
		</td>
		</tr>
	
		<tr>
		<td width="45%" class="adbg">
		<b>Extension :</b><br />
		<font class="adexp">The extension of the attachment files to be allowed for uploads.(No '.' is required)</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="atmt_ext" value="<?php echo (empty($_POST['atmt_ext']) ? '' : $_POST['atmt_ext']);?>" />
		</td>
		</tr>
		
		<tr>
		<td width="45%" class="adbg">
		<b>Mime type :</b><br />
		<font class="adexp">The mimetype of the allowed extension.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="atmt_mimetype" value="<?php echo (empty($_POST['atmt_mimetype']) ? '' : $_POST['atmt_mimetype']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>File type icon :</b><br />
		<font class="adexp">This is the icon that represents the allowed file type. The icon must be present in the 'mimetypes' folder in the root directory.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="atmt_icon" value="<?php echo (empty($_POST['atmt_icon']) ? '' : $_POST['atmt_icon']);?>" />
		</td>
		</tr>
        
		<tr>
		<td class="adbg">
		<b>Allow in posts :</b><br />
		<font class="adexp">If checked then this file type attachments will be accepted in posts.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="atmt_posts" <?php echo (empty($_POST['atmt_posts']) ? '' : 'checked="checked"');?> />
		</td>
		</tr>
        
		<tr>
		<td class="adbg">
		<b>Allow in avatars :</b><br />
		<font class="adexp">If checked then this file type will be accepted for avatars.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="atmt_avatar" <?php echo (empty($_POST['atmt_avatar']) ? '' : 'checked="checked"');?> />
		</td>
		</tr>
        
		<tr>
		<td class="adbg">
		<b>Is image :</b><br />
		<font class="adexp">Is this file type an image extension ?</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="atmt_isimage" <?php echo (empty($_POST['atmt_isimage']) ? '' : 'checked="checked"');?> />
		</td>
		</tr>
	
	</table>
	
	<br /><br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="addmime" value="Submit" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}


?>