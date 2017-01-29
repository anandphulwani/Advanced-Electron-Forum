<?php

if(!defined('AEF'))
{
die('Hacking Attempt');
}

//A global part to appear
function moderators_global(){

global $globals, $theme, $categories;

	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/users.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Moderator Options</font><br />
		
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	In this section you can create, edit and delete special users of a forum known as moderators. As the name suggests this group is mainly responsible for adminitering a particular forum. A forum could have more than one moderator. Also a moderator of a Parent Board does not give the use a moderatorship of the In Boards.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
}


//This is the theme that is for the management of the moderators
function managemoderators_theme(){

global $globals, $theme, $categories, $forums, $fpermissions;
	
	adminhead('Administration Center - Manage Moderators');
	
	moderators_global();
	
	echo '<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr><td class="adcbg" colspan="2">Edit Moderators</td></tr>';
	
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
				
				<td class="adbg" width="85%" height="'.(($forums[$c][$f]['in_board'] == 1)?'18':'25').'" >'.$dasher.(($forums[$c][$f]['in_board'] == 1)?'|--':'').$forums[$c][$f]['fname'];
				
				//Are there any moderators for this forum
				if(!empty($forums[$c][$f]['moderators'])){
				
					$mods = array();
					
					foreach($forums[$c][$f]['moderators'] as $mo => $mov){
					
						$mods[] = '<a href="'.$globals['index_url'].'mid='.$forums[$c][$f]['moderators'][$mo]['mod_mem_id'].'">'.$mov['username'].'</a>';
					
					}					
					
					echo '&nbsp;-&nbsp;'.(implode(', ', $mods));
				
				}
				
				echo '</td>
				
				<td class="adbg" align="center">
				<a href="'.$globals['index_url'].'act=admin&adact=moderators&seadact=edit&forum='.$forums[$c][$f]['fid'].'">Edit
				</a>
				</td>
				
				</tr>';
				
							
			}//End of forums loop
		
		}else{
			echo '<tr>
				
				<td class="adbg" width="85%" height="18">
				--
				</td>
				
				<td class="adbg" align="center">
				-
				</td>
				
				</tr>';
		}
		
	}//End of Categories loop
	
	echo '</table>';

	adminfoot();

}//End of function



function editmoderators_theme(){

global $globals, $theme, $categories, $forums, $error, $board;
	
	adminhead('Administration Center - Edit Forum Permissions');
	
	moderators_global();
	
	error_handle($error, '100%');
	
	//Are there any moderators for this forum
	if(!empty($board['moderators'])){
	
		$mods = array();
		
		foreach($board['moderators'] as $mo => $mov){
		
			$mods[] = $mov['username'];
		
		}
	
	}
	
	?>
	
	<script language="JavaScript" src="<?php echo $theme['url'].'/js/suggest.js';?>" type="text/javascript"></script>
    
	<form action="" method="post" name="editmoderators">
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td class="adcbg" colspan="2" style="height:25px">
		Edit Moderators of <?php echo $board['fname'];?>
		</td>
		</tr>
				
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Moderators Usernames:</b><br />
		Write the usernames of the members whom you want to give moderator rights. Seperate more than one username with a semicolon '<b>;</b>' (without the qoutes).
		</td>
		<td class="adbg" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="text" name="modusernames" <?php echo (isset($_POST['modusernames']) ? 'value="'.$_POST['modusernames'].'"' : ((!empty($mods)) ? 'value="'.(implode('; ', $mods)).'"' : '' ) );?> size="40" onkeyup="handlesuggest(event, 'modusernames')" onkeydown="handlekeys(event)" autocomplete=off style="position:absolute" onblur="setTimeout(hidesuggest, 1000);" suggesturl="<?php echo $globals['index_url'];?>act=suggest" id="modusernames" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg" height="30" colspan="2" align="center">
		<input type="submit" name="editmoderators" value="Submit Changes" />
		<input type="submit" name="deletemoderators" value="Delete Moderators" />		
		</td>
		</tr>
			
	</table>
	
	<?php

	adminfoot();

}

?>