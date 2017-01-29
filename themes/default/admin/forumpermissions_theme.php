<?php

if(!defined('AEF'))
{
die('Hacking Attempt');
}

//A global part to appear
function fpermissions_global(){

global $globals, $theme, $categories;

	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/forums.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Forum Permission Options</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	In this section you can create, edit and delete special forum permission sets for different user groups. A user group like guests could be given permissions to post in selected forums if they dont have the global permissions to post. But a user group having a global permission to post could still post even if he does not have the forum permissions and is permitted to view the forum. Also if forum permissions for a user group are not created the global permissions of that group will be applied. Please Click on the User Group Name besides the Forum Name to edit it.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
}


//This is the theme that is for the management of the forums
function fpermissionsmanage_theme(){

global $globals, $theme, $categories, $forums, $fpermissions;
	
	adminhead('Administration Center - Manage Forum Permissions');
	
	fpermissions_global();
	
	echo '<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr><td class="adcbg">Edit Forum Permissions</td></tr>';
	
	//The for loop for the categories
	foreach($categories as $c => $cv){
		
		echo '<tr>
		<td class="adcbg2" height="18" colspan="3">
		<b>'.$categories[$c]['name'].'</b>
		</td>
		</tr>';
		
		if(isset($forums[$c])){
			
			//The for loop for the forums within the category
			foreach($forums[$c] as $f => $v){
								
				$dasher = "";
				
				for($t = 0; $t < $forums[$c][$f]['board_level']; $t++){
				
					$dasher .= "&nbsp;&nbsp;&nbsp;&nbsp;";
					
				}
				
				echo '<tr>
				
				<td class="adbg" width="65%" height="'.(($forums[$c][$f]['in_board'] == 1)?'18':'25').'" >'.$dasher.(($forums[$c][$f]['in_board'] == 1)?'|--':'').$forums[$c][$f]['fname'];
				
				//Are there any forumpermission sets for this forum
				if(!empty($fpermissions[$forums[$c][$f]['fid']])){
				
					$fpug = array();
					
					foreach($fpermissions[$forums[$c][$f]['fid']] as $fp => $fv){
					
						$fpug[] = '<a href="'.$globals['index_url'].'act=admin&adact=fpermissions&seadact=editfpermissions&fpfid='.$forums[$c][$f]['fid'].'&fpug='.$fv['fpugid'].'">'.$fv['mem_gr_name'].'</a>';
					
					}					
					
					echo '&nbsp;-&nbsp;'.(implode(', ', $fpug));
				
				}
				
				echo '</td>
				
				</tr>';
				
							
			}//End of forums loop
		
		}else{
			echo '<tr>
				
				<td class="adbg" width="65%" height="18">
				--
				</td>
				
				</tr>';
		}
		
	}//End of Categories loop
	
	echo '</table>';

	adminfoot();

}//End of function



function editfpermissions_theme(){

global $globals, $theme, $categories, $forums, $fpermissions, $fpfid, $fpugid;
	
	adminhead('Administration Center - Edit Forum Permissions');
	
	fpermissions_global();
	
	?>
	
	<form action="" method="post" name="editfpermissions">
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td class="adcbg" colspan="2" style="height:25px">
		Edit Forum Permissions
		</td>
		</tr>
				
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Start Topics:</b><br />
		With this a user will be able to start a new topic in this forum.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="checkbox" name="can_post_topic" <?php echo (isset($_POST['can_post_topic']) ? 'checked="checked"' : (($fpermissions[$fpfid][$fpugid]['can_post_topic']) ? 'checked="checked"' : '') );?> />		
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Reply to Topics:</b><br />
		Should the group be allowed to post in topics in this forum.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="checkbox" name="can_reply" <?php echo (isset($_POST['can_reply']) ? 'checked="checked"' : (($fpermissions[$fpfid][$fpugid]['can_reply']) ? 'checked="checked"' : '') );?> />		
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Vote in Polls:</b><br />
		Should the group be allowed to vote in polls in this forum.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="checkbox" name="can_vote_polls" <?php echo (isset($_POST['can_vote_polls']) ? 'checked="checked"' : (($fpermissions[$fpfid][$fpugid]['can_vote_polls']) ? 'checked="checked"' : '') );?> />		
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Start Polls:</b><br />
		Should the group be allowed to start polls in this forum.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="checkbox" name="can_post_polls" <?php echo (isset($_POST['can_post_polls']) ? 'checked="checked"' : (($fpermissions[$fpfid][$fpugid]['can_post_polls']) ? 'checked="checked"' : '') );?> />		
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Can Attach files:</b><br />
		Should the group be allowed to attach files while posting in this forum.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="checkbox" name="can_attach" <?php echo (isset($_POST['can_attach']) ? 'checked="checked"' : (($fpermissions[$fpfid][$fpugid]['can_attach']) ? 'checked="checked"' : '') );?> />		
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Can Download Attachments:</b><br />
		Should the group be allowed to Download Attachments in this forum.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="checkbox" name="can_view_attach" <?php echo (isset($_POST['can_view_attach']) ? 'checked="checked"' : (($fpermissions[$fpfid][$fpugid]['can_view_attach']) ? 'checked="checked"' : '') );?> />		
		</td>
		</tr>
		
		<tr>
		<td class="adbg" height="30" colspan="2" align="center">
		<input type="submit" name="editfpermissions" value="Submit Changes" />
		<input type="submit" name="deletefpermissions" value="Delete Permission Set" />		
		</td>
		</tr>
			
	</table>
	
	<?php

	adminfoot();

}



function createfpermissions_theme(){

global $globals, $theme, $categories, $forums, $fpermissions, $fpfid, $fpugid, $error, $mother_options, $user_group;
	
	adminhead('Administration Center - Edit Forum Permissions');
	
	fpermissions_global();
		
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="editfpermissions">
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		
		<tr>
		<td class="adcbg" colspan="2" style="height:25px">
		Create Forum Permissions
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Forum:</b><br />
		Choose the forum to which this Permission Set will apply.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<select name="fpfid" style="font-family:Verdana; font-size:11px">
		
		<?php 
		
		foreach($mother_options as $i => $iv){
		
			echo '<option value="'.$mother_options[$i][0].'" '.((isset($_POST['fpfid']) && trim($_POST['fpfid']) == $mother_options[$i][0] ) ? 'selected="selected"' : '').'>
			'.$mother_options[$i][1].'
			</option>';
			
		}//End of for loop
		
		?>
		</select>
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>User Group:</b><br />
		Choose the User Group to which this Permission Set will apply.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;	
		
		<select name="fpugid" style="font-family:Verdana; font-size:11px">
		
		<?php 
		
		foreach($user_group as $ug => $uv){
		
			echo '<option value="'.$ug.'" '.((isset($_POST['fpugid']) && trim($_POST['fpugid']) == $ug ) ? 'selected="selected"' : '').'>
			'.$user_group[$ug]['mem_gr_name'].'
			</option>';
			
		}//End of for loop
		
		?>
		</select>
		</td>
		</tr>
			
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Start Topics:</b><br />
		With this a user will be able to start a new topic in this forum.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="checkbox" name="can_post_topic" <?php echo (isset($_POST['can_post_topic']) ? 'checked="checked"' : '' );?> />		
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Reply to Topics:</b><br />
		Should the group be allowed to post in topics in this forum.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="checkbox" name="can_reply" <?php echo (isset($_POST['can_reply']) ? 'checked="checked"' : '' );?> />		
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Vote in Polls:</b><br />
		Should the group be allowed to vote in polls in this forum.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="checkbox" name="can_vote_polls" <?php echo (isset($_POST['can_vote_polls']) ? 'checked="checked"' : '' );?> />		
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Start Polls:</b><br />
		Should the group be allowed to start polls in this forum.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="checkbox" name="can_post_polls" <?php echo (isset($_POST['can_post_polls']) ? 'checked="checked"' : '' );?> />		
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Can Attach files:</b><br />
		Should the group be allowed to attach files while posting in this forum.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="checkbox" name="can_attach" <?php echo (isset($_POST['can_attach']) ? 'checked="checked"' : '' );?> />		
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Can Download Attachments:</b><br />
		Should the group be allowed to Download Attachments in this forum.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="checkbox" name="can_view_attach" <?php echo (isset($_POST['can_view_attach']) ? 'checked="checked"' : '' );?> />		
		</td>
		</tr>
		
		<tr>
		<td class="adbg" height="30" colspan="2" align="center">
		<input type="submit" name="createfpermissions" value="Create" />		
		</td>
		</tr>
			
	</table>
	
	<?php

	adminfoot();

}

?>