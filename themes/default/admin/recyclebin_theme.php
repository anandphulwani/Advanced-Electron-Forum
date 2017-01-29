<?php

if(!defined('AEF'))
{
die('Hacking Attempt');
}

//A global part to appear
function recyclebin_global(){

global $globals, $theme, $categories;

	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/recyclebin.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Recycle Bin Settings</font><br />
	
	
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	In this area you can set up a recycle bin for every topic that will be deleted. This helps to keep the other forums clean and also makes it possible to save the deleted topics and posts. Please select a forum to be set up as a Recycle Bin.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
}


//This is the theme that is for the management of the forums
function recyclebin_theme(){

global $globals, $theme, $categories, $forums, $mother_options, $error;
	
	adminhead('Administration Center - Recycle Bin Settings');
	
	recyclebin_global();
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="editfpermissions">
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		
		<tr>
		<td class="adcbg" colspan="2" style="height:25px">
		Recycle Bin Settings
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Forum:</b><br />
		Choose the forum to which this Permission Set will apply.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<select name="rbfid" style="font-family:Verdana; font-size:11px">
		
		<?php 
		
		echo '<option value="0" '.((isset($_POST['rbfid']) && trim($_POST['rbfid']) == $mother_options[$i][0] ) ? 'selected="selected"' : '').'>
			None
			</option>';
			
		foreach($mother_options as $i => $iv){
		
			echo '<option value="'.$mother_options[$i][0].'" '.((isset($_POST['rbfid']) && trim($_POST['rbfid']) == $mother_options[$i][0] ) ? 'selected="selected"' : (($mother_options[$i][0] == (int) $globals['recyclebin']) ? 'selected="selected"' : '' ) ).'>
			'.$mother_options[$i][1].'
			</option>';
			
		}//End of for loop
		
		?>
		</select>
		</td>
		</tr>
		
		<tr>
		<td class="adbg" height="30" colspan="2" align="center">
		<input type="submit" name="setrecyclebin" value="Submit" />		
		</td>
		</tr>
			
	</table>
	
	<?php

	adminfoot();

}//End of function


?>