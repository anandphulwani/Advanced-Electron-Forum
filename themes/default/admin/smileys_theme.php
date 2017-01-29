<?php

if(!defined('AEF')){

	die('Hacking Attempt');

}

function smset_theme(){

global $globals, $theme, $error;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Smiley Settings');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/smileys.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Smiley Settings</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	This is the place for changing the Smiley settings for the board.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="smsetform">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Smiley Settings
		</td>
		</tr>
	
		<tr>
		<td width="35%" class="adbg">
		<b>Use Smileys :</b><br />
		<font class="adexp">This will enable smilies throughout the board.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="usesmileys" <?php echo ($globals['usesmileys'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
        
        <tr>
		<td width="35%" class="adbg">
		<b>Space Boundary :</b><br />
		<font class="adexp">If enabled smileys will be parsed only when a space boundary is there.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="smiley_space_boundary" <?php echo ($globals['smiley_space_boundary'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>

	</table>
	
	<br /><br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="editsmset" value="Submit" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}


function smman_theme(){

global $globals, $theme, $smileys, $smileyimages;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Manage Smileys');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/smileys.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Manage Smileys</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	This is the place for managing the smileys of the board.
	</td>
	</tr>
	
	</table>
	<br /><br />
	
	<table width="100%" cellpadding="5" cellspacing="1" class="cbor">
	<tr>
	<td class="adcbg" colspan="7">
	Current Smileys
	</td>
	</tr>
	
	<tr align="center">
	<td class="adcbg2" width="10%">
	<b>Smiley</b>
	</td>
	<td class="adcbg2" width="15%">
	<b>Code</b>
	</td>
	<td class="adcbg2" width="20%">
	<b>File Name</b>
	</td>
	<td class="adcbg2" width="20%">
	<b>Emotion</b>
	</td>
	<td class="adcbg2" width="10%">
	<b>Status</b>
	</td>
	<td class="adcbg2" width="10%">
	<b>Edit</b>
	</td>
	<td class="adcbg2" width="15%">
	<b>Delete</b>
	</td>
	</tr>
	
	<?php
	
	if(empty($smileys)){
	
	echo '<tr>
	<td class="adbg" colspan="5">
	No smileys were found.
	</td>
	</tr>';
	
	}else{
	
	foreach($smileys as $sk => $sv){
	
	echo '<tr>
	<td class="adbg" align="center">
	'.$smileyimages[$sk].'
	</td>
	<td class="adbg">
	'.$smileys[$sk]['smcode'].'
	</td>
	<td class="adbg">
	'.$smileys[$sk]['smfile'].'
	</td>
	<td class="adbg">
	'.$smileys[$sk]['smtitle'].'
	</td>
	<td class="adbg">
	'.($smileys[$sk]['smstatus'] ? 'Pop Up' : 'Form').'
	</td>
	<td class="adbg" align="center">
	<a href="'.$globals['index_url'].'act=admin&adact=smileys&seadact=editsm&smid='.$smileys[$sk]['smid'].'">Edit</a>
	</td>
	<td class="adbg" align="center">
	<a href="'.$globals['index_url'].'act=admin&adact=smileys&seadact=delsm&smid='.$smileys[$sk]['smid'].'">Delete</a>
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
	<input type="button" value="Add New Smiley"  onclick="javascript:window.location='<?php echo $globals['index_url'].'act=admin&adact=smileys&seadact=addsm';?>'" />
	</td>
	</tr>	
	</table>
	
	<?php	
	
	adminfoot();
	
}


function smreorder_theme(){

global $globals, $theme, $smileys, $smileyimages, $error, $onload, $dmenus;
	
	//Pass to onload to initialize a JS
	$onload['smreoder'] = 'init_reoder()';
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Reorder Smileys');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/smileys.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Reorder Smileys</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	This is the place for changing the Smiley order in which they appear while posting. <br /><b>Drag and Drop</b> the smiley box and put them in the order you like.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="smreorderform">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Reorder Smileys
		</td>
		</tr>

	</table>
    <br /><br />
    
<table width="60%" cellpadding="0" cellspacing="0" align="center" border="0">
<tr><td id="sm_reorder_pos" width="100%"></td></tr>
</table>
	<br /><br />
	<script type="text/javascript">

//The array id of all the elements to be reordered
reo_r = new Array(<?php echo implode(', ', array_keys($smileys));?>);

//The id of the table that will hold the elements
reorder_holder = 'sm_reorder_pos';

//The prefix of the Dom Drag handle for every element
reo_ha = 'smha';

//The prefix of the Dom Drag holder for every element(the parent of every element)
reo_ho = 'sm';

//The prefix of the Hidden Input field for the reoder value for every element
reo_hid = 'smhid';

</script>
<?php js_reorder();?>
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
         <?php
	$temp = 1;
	foreach($smileys as $sk => $sv){
	
		//echo '<div class="smreo" id="sm'.$sk.'">&nbsp;'.$smileyimages[$sk].'&nbsp;&nbsp;'.$smileys[$sk]['smtitle'].'</div>';
		
		$dmenus[] = '<div id="sm'.$sk.'">
<table cellpadding="0" cellspacing="0" class="smreo" id="smha'.$sk.'" onmousedown="this.style.zIndex=\'1\'" onmouseup="this.style.zIndex=\'0\'">
<tr><td>
&nbsp;'.$smileyimages[$sk].'&nbsp;&nbsp;'.$smileys[$sk]['smtitle'].'
</td></tr>
</table>
</div>';	
	
	echo '<input type="hidden" name="sm['.$sk.']" value="'.$temp.'" id="smhid'.$sk.'" />';	
	
	$temp = $temp + 1;
	
	}
	
	?>
		<input type="submit" name="smreorder" value="Re Order" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php	
	
	adminfoot();
	
} 
    

//Edit smiley
function editsm_theme(){

global $globals, $theme, $error, $smiley, $folders;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Edit Smileys');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/smileys.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Edit Smileys</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	This is the place for editing a smiley.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="editsmform">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Edit Smileys
		</td>
		</tr>
	
		<tr>
		<td width="45%" class="adbg">
		<b>Code :</b><br />
		<font class="adexp">The code of the smiley that will be used in posts and PM's.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="smcode" value="<?php echo (empty($_POST['smcode']) ? $smiley['smcode'] : $_POST['smcode']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Emotion :</b><br />
		<font class="adexp">The emotion of the smiley.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="smtitle" value="<?php echo (empty($_POST['smtitle']) ? $smiley['smtitle'] : $_POST['smtitle']);?>" />
		</td>
		</tr>
		
		
		<tr>
		<td class="adbg">
		<b>Display in post form :</b><br />
		<font class="adexp">If enabled the smiley will be displayed in the post form, otherwise it will be in the pop up box.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="smstatus" <?php echo (!$smiley['smstatus'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Folder :</b><br />
		<font class="adexp">The name of the folder in which the smiley image is there.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<select name="smfolder" disabled="disabled">
		<?php
		foreach($folders as $f){		
		echo '<option value="'.$f['name'].'" '.($f['name'] == $smiley['smfolder'] ? 'selected="selected"' : '' ).' >'.$f['name'].'</option>';
		}
		?></select>
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Smiley File :</b><br />
		<font class="adexp">The name of the file in the directory.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="smfile" value="<?php echo $smiley['smfile'];?>"  disabled="disabled" />
		</td>
		</tr>
		
	
	</table>
	
	<br /><br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="editsm" value="Submit" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}


//Add smiley
function addsm_theme(){

global $globals, $theme, $error, $smiley, $folders;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Add Smileys');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/smileys.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Add Smileys</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	This is the place for adding a smiley.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="addsmform" enctype="multipart/form-data">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Add Smileys
		</td>
		</tr>
	
		<tr>
		<td width="45%" class="adbg">
		<b>Code :</b><br />
		<font class="adexp">The code of the smiley that will be used in posts and PM's.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="smcode" value="<?php echo (empty($_POST['smcode']) ? '' : $_POST['smcode']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Emotion :</b><br />
		<font class="adexp">The emotion of the smiley.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="smtitle" value="<?php echo (empty($_POST['smtitle']) ? '' : $_POST['smtitle']);?>" />
		</td>
		</tr>
		
		
		<tr>
		<td class="adbg">
		<b>Display in post form :</b><br />
		<font class="adexp">If enabled the smiley will be displayed in the post form, otherwise it will be in the pop up box.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="smstatus" checked="checked" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Folder :</b><br />
		<font class="adexp">The name of the folder in which the smiley image is there.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<select name="smfolder">
		<?php
		foreach($folders as $f){		
		echo '<option value="'.$f['name'].'" '.(isset($_POST['smfolder']) && $_POST['smfolder'] == $f['name'] ? 'selected="selected"' : '' ).' >'.$f['name'].'</option>';
		}
		?></select>
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<input type="radio" name="filemethod" value="1" <?php echo (isset($_POST['filemethod']) && trim($_POST['filemethod']) == 1 ? 'checked="checked"' : '' );?> /><b>Smiley File :</b><br />
		<font class="adexp">The name of the file in the directory.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="smfile" value="<?php echo (empty($_POST['smfile']) ? '' : $_POST['smfile']);?>" />
		</td>
		</tr>
				 
		<tr>
		<td class="adbg">
		<input type="radio" name="filemethod" value="2" <?php echo (isset($_POST['filemethod']) && trim($_POST['filemethod']) == 2 ? 'checked="checked"' : '' );?>  /><b>Upload Smiley File :</b><br />
		<font class="adexp">The file will be uploaded in the selected directory.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" size="30"  name="smfile_u" value="<?php echo (empty($_POST['smfile']) ? '' : $_POST['smfile']);?>" />
		</td>
		</tr>
		
	
	</table>
	
	<br /><br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="addsm" value="Submit" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}

?>