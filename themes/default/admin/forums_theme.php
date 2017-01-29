<?php

if(!defined('AEF'))
{
die('Hacking Attempt');
}

//A global part to appear
function forum_global(){

global $globals, $theme, $categories;

	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/forums.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Board Options</font><br />
		
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	This is the central control of Forums. Here you can edit a Forum/Board and also delete them.
	Please becareful when deleting a Forum/Board as these actions are irreversible.<br />
	Here you can also choose to edit their order and also select the Member Groups who can see a particular Board.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
}


//This is the theme that is for the management of the forums
function forummanage_theme(){

global $globals, $theme, $categories, $forums;
	
	adminhead('Administration Center - Manage Forums');
	
	forum_global();
	
	echo '<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr><td class="adcbg" colspan="3">Edit Boards</td></tr>';
	
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
				
				<td class="adbg" width="65%" height="'.(($forums[$c][$f]['in_board'] == 1)?'18':'25').'" >'.$dasher.(($forums[$c][$f]['in_board'] == 1)?'|--':'').$forums[$c][$f]['fname'].'
				</td>
				
				<td class="adbg" align="center">
				<a href="'.$globals['index_url'].'act=admin&adact=forums&seadact=editforum&editforum='.$forums[$c][$f]['fid'].'">Edit
				</a>
				</td>
				
				<td class="adbg" align="center">
				<a href="'.$globals['index_url'].'act=admin&adact=forums&seadact=deleteforum&forum='.$forums[$c][$f]['fid'].'">Delete
				</a>
				</td>
				
				</tr>';
				
							
			}//End of forums loop
		
		}else{
			echo '<tr>
				
				<td class="adbg" width="65%" height="18">
				--
				</td>
				
				<td class="adbg" align="center">
				-
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


//This fuction is to edit a forum
function editforum_theme(){

global $globals, $theme, $categories, $forums, $board, $orderoptions, $member_group, $mother_options, $currentmother, $error, $samelevel, $themes;
	
	adminhead('Administration Center - Edit a Forum');
	
	forum_global();
	
	error_handle($error, '100%');
	
	?>
	<form action="" method="post" name="editboard">
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td class="adcbg" colspan="2" style="height:25px">
		General Options
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Mother Forums:</b>
		</td>
		<td class="adbg">

&nbsp;&nbsp;&nbsp;&nbsp;
		
		<select onchange="getneworder()" name="editmother" style="font-family:Verdana; font-size:11px" id="fmother">
		
		<?php 
		
		foreach($mother_options as $i => $iv){
		
			echo '<option value="'.$mother_options[$i][0].'" '.((isset($_POST['editmother']) && trim($_POST['editmother']) == $mother_options[$i][0] ) ? 'selected="selected"' : (($mother_options[$i][0] == $currentmother) ? 'selected="selected"' : '')).'>
			'.$mother_options[$i][1].'
			</option>';
			
		}//End of for loop
		
		?>
		</select>
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Order:</b>
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<select name="forder" style="font-family:Verdana; font-size:11px" id="forder">	
		
		<?php
		
		//Find the order and make the array
		for($o=1; $o <= count($samelevel); $o++){		
			
			echo '<option value="'.$o.'" '.((isset($_POST['forder']) && (int)trim($_POST['forder']) == $o ) ? 'selected="selected"' : (($board['forum_order'] == $o) ? 'selected="selected"' : '')).'>'.$o.'</option>';
			
		}		
		?>
		</select>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<span id="loadstatus">
		</span>
<script language="JavaScript" type="text/javascript">

bydefault = '<?php echo $currentmother;?>';
numorder = $('forder').length;
defaultorder = <?php echo $board['forum_order'];?>;
//alert(defaultorder);
//alert(bydefault);
//alert(defaultorder);

function LoadStatus(itsinner){
	$('loadstatus').innerHTML = itsinner;
}

function getneworder(){
	mother = $('fmother').value;
	//alert(mother);
	//alert(bydefault);
	if(mother != bydefault){	
		LoadStatus('<img src="<?php echo $theme['images'];?>admin/loading.gif"> Refreshing Order List ...');
		AJAX('<?php echo $globals['index_url'];?>act=admin&adact=forums&seadact=ajax&motherforum='+mother, 'PrintOrder(re)');
	}else{
		//Remove the old order list
		while ($('forder').length > 0) {
			$('forder').remove(0);
		} 
		//Create the new order list
		for (var i = 1; i <= numorder; i++) {
			var newopt = document.createElement('option');
			newopt.text = i;
			newopt.value = i;
			try{
				$('forder').add(newopt, null); // standards compliant; doesn't work in IE
			}catch(ex){
				$('forder').add(newopt); // IE only
			}
		}
		//This is to make the default order as selected
		$('forder').selectedIndex = defaultorder - 1;
		LoadStatus('');
	}
};

function PrintOrder(resp){
	//Remove the old order list
	while ($('forder').length > 0) {
		$('forder').remove(0);
	}
	resp = parseInt(resp);
	//If there is some problem
	if(isNaN(resp)){
		LoadStatus('Unable to Retrieve Data.');
		var newopt = document.createElement('option');
		newopt.text = 'Last';
		newopt.value = 0;
		try{
			$('forder').add(newopt, null); // standards compliant; doesn't work in IE
		}catch(ex){
			$('forder').add(newopt); // IE only
		}
		return false;
	}
	//Create the new order list
	for (var i = 1; i <= resp; i++) {
		var newopt = document.createElement('option');
		newopt.text = i;
		newopt.value = i;
		try{
			$('forder').add(newopt, null); // standards compliant; doesn't work in IE
		}catch(ex){
			$('forder').add(newopt); // IE only
		}
	}
	//This is to make the last row as selected
	$('forder').selectedIndex = resp - 1;
	LoadStatus('');
};

</script>
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Forum Status:</b><br />
		This allows members to post or Locks the Board. Doesn't apply to Moderators and Admins.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<select name="fstatus" style="font-family:Verdana; font-size:11px">	
		
		<?php 
		if($board['status']){
			echo '<option value="1" selected="selected">Active</option>
				<option value="0">Locked</option>';
		}else{
			echo '<option value="1">Active</option>
				<option value="0" selected="selected">Locked</option>';
		}
		?>
		
		</select>
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Redirect Forum:</b><br />
		Enter a URL to which this forum will be redirected to.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input name="fredirect" <?php echo ( (isset($_POST['fredirect'])) ? 'value="'.$_POST['fredirect'].'"' : 'value="'.$board['fredirect'].'"' );?> size="30" />
		</td>
		</tr>
		
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Forum Icon:</b><br />
		Enter a URL of a image if you want to give this forum a special icon.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input name="fimage" <?php echo ( (isset($_POST['fimage'])) ? 'value="'.$_POST['fimage'].'"' : 'value="'.$board['fimage'].'"' );?> size="30" />
		</td>
		</tr>
		
		
	</table>
	<br />
	<br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td class="adcbg" colspan="2" style="height:25px">
		Forum Options
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Name of Forum:</b>
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="text" name="fname" <?php echo ( (isset($_POST['fname'])) ? 'value="'.$_POST['fname'].'"' : 'value="'.$board['fname'].'"' );?> size="30" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Forum Description:</b><br />
		A little description about this Board.<br />
		You may use HTML.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<textarea name="fdesc" cols="30" rows="5"><?php echo ( (isset($_POST['fdesc'])) ? $_POST['fdesc'] : $board['description'] );?></textarea>
		
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Deafult Theme :</b><br />
		Choose the default theme for this Board.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<select name="ftheme" >
		
		<?php
		
		echo '<option value="0" '.((isset($_POST['ftheme'])) ? (((int) trim($_POST['ftheme']) == 0 ) ? 'selected="selected"' : '' ) : (empty($board['id_skin']) ? 'selected="selected"' : '')).' >Use Board Default</option>';
		
		foreach($themes as $tk => $tv){
		
			echo '<option value="'.$themes[$tk]['thid'].'" '.((isset($_POST['ftheme']) && (int)trim($_POST['ftheme']) == $tk ) ? 'selected="selected"' : (($board['id_skin'] == $tk && !empty($board['id_skin'])) ? 'selected="selected"' : '')).' >'.$themes[$tk]['th_name'].'</option>';
		
		}
		
		?>
		</select>
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Rules Title:</b><br />
		The title of the rules if rules are set for the forum.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="text" name="frulestitle" <?php echo ( (isset($_POST['frulestitle'])) ? 'value="'.$_POST['frulestitle'].'"' : 'value="'.$board['frulestitle'].'"' );?> size="40" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Forum Rules:</b><br />
		These rules will be displayed in the forum topic index. You may use HTML and Javascript.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<textarea name="frules" cols="40" rows="5"><?php echo ( (isset($_POST['frules'])) ? $_POST['frules'] : $board['frules'] );?></textarea>
			
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Enable RSS Feeds :</b><br />
		If enabled, recent posts in this forum will have its own RSS Feeds Page. Set the Number of posts to be shown in the feeds. Zero - 0 to disable.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="text" size="20"  name="rss" value="<?php echo (empty($_POST['rss']) ? $board['rss'] : $_POST['rss']);?>" />
		</td>
		</tr>
        
        <tr>
		<td class="adbg" width="40%" height="30">
		<b>Topic Feeds :</b><br />
		If enabled, the latest posts in a topic will have its own RSS Feeds Page. Set the Number of posts to be shown in the feeds. Zero - 0 to disable.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="text" size="20"  name="rss_topic" value="<?php echo (empty($_POST['rss_topic']) ? $board['rss_topic'] : $_POST['rss_topic']);?>" />
		</td>
		</tr>
	</table>
	<br />
	<br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td class="adcbg" colspan="2" style="height:25px">
		Member Group Settings
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30" valign="top">
		<br />
		<b>Member Groups Allowed:</b><br />
		Select the Member Groups that will be allowed to view the forum.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		
		<table>
		<?php
		
		foreach($member_group['all'] as $m => $mv){
			
			echo '<tr>
				<td>
				'.$member_group['all'][$m]['mem_gr_name'].'
				</td>
				<td>
				<input type="checkbox" name="member['.$m.']" '.(isset($_POST['member'][$m]) ? 'checked="checked"' : (isset($member_group['presentlyallowed'][$m]) ? 'checked="checked"' : '' ) ).' />
				</td>
				</tr>';
		
		}
		
		
		?>
		</table>
		
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Increase Member Posts:</b><br />
		On posting Topics or Replies Should Members post count increase.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="checkbox" name="inc_mem_posts" <?php echo (isset($_POST['inc_mem_posts']) ? 'checked="checked"' : (($board['inc_mem_posts']) ? 'checked="checked"' : '') );?> />		
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Override Theme:</b><br />
		If the member has selected his own theme on the Forum then this Option will enforce the theme you selected as default for this Board.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="checkbox" name="override_skin" <?php echo (isset($_POST['override_skin']) ? 'checked="checked"' : (($board['override_skin']) ? 'checked="checked"' : '') );?> />		
		</td>
		</tr>
		
	</table>
	<br />
	<br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2" style="height:25px">
		Post Settings
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Allow Polls :</b><br />
		Should polls be allowed in this board.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="checkbox" name="allow_poll" <?php echo (isset($_POST['allow_poll']) ? 'checked="checked"' : (($board['allow_poll']) ? 'checked="checked"' : '') );?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Allow HTML :</b><br />
		Should Members who have Permissions be allowed to post HTML.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="checkbox" name="allow_html" <?php echo (isset($_POST['allow_html']) ? 'checked="checked"' : (($board['allow_html']) ? 'checked="checked"' : '') );?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Quick Reply :</b><br />
		This will display a Quick Reply Box at the end of each Topic.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="checkbox" name="quick_reply" <?php echo (isset($_POST['quick_reply']) ? 'checked="checked"' : (($board['quick_reply']) ? 'checked="checked"' : '') );?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Moderate Topics :</b><br />
		If enabled then every topic in this forum will be visible only when someone having permissions approves it.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="checkbox" name="mod_topics" <?php echo (isset($_POST['mod_topics']) ? 'checked="checked"' : (($board['mod_topics']) ? 'checked="checked"' : '') );?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Moderate Posts :</b><br />
		If enabled then every post in this forum will be visible only when someone having permissions approves it.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="checkbox" name="mod_posts" <?php echo (isset($_POST['mod_posts']) ? 'checked="checked"' : (($board['mod_posts']) ? 'checked="checked"' : '') );?> />
		</td>
		</tr>
		
	</table>
	<br />
	<br />	
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="editboard" value="Edit Forum" />
		</td>
		</tr>	
	</table>
	</form>
	
	<?php
	
	//Admin footers includes Global footers
	adminfoot();

}//End of function

//This fuction is to create a forum
function createforum_theme(){

global $globals, $theme, $categories, $forums, $board, $orderoptions, $member_group, $mother_options, $currentmother, $error, $samelevel, $themes, $postcodefield;
		
	adminhead('Administration Center - Create a Forum');
	
	forum_global();
	
	error_handle($error, '100%');
	
	?>
	<form action="" method="post" name="createboard">
	<?php echo $postcodefield;?>
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td class="adcbg" colspan="2" style="height:25px">
		General Options
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Mother Forums:</b>
		</td>
		<td class="adbg">
		&nbsp;&nbsp;&nbsp;&nbsp;
		
		<select onchange="getneworder()" name="fmother" style="font-family:Verdana; font-size:11px" id="fmother">
		<option value="sm" selected="selected">-----Select Mother-----</option>
		<?php 
		
		foreach($mother_options as $i => $iv){
		
			echo '<option value="'.$mother_options[$i][0].'" '.((isset($_POST['editmother']) && trim($_POST['editmother']) == $mother_options[$i][0] ) ? 'selected="selected"' : '').'>
			'.$mother_options[$i][1].'
			</option>';
			
		}//End of for loop
		
		?>
		</select>
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Order:</b>
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<select name="forder" style="font-family:Verdana; font-size:11px" id="forder" disabled="disabled">		
		<option value="1">1</option>
		</select>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<span id="loadstatus">
		</span>
<script language="JavaScript" type="text/javascript">
bydefault = 'sm';
numorder = $('forder').length;
defaultorder = '';
//alert(defaultorder);
//alert(bydefault);
//alert(defaultorder);

function LoadStatus(itsinner){
	$('loadstatus').innerHTML = itsinner;
}

function getneworder(){
	mother = $('fmother').value;
	//alert(mother);
	//alert(bydefault);
	if(mother != bydefault){	
		LoadStatus('<img src="<?php echo $theme['images'];?>admin/loading.gif"> Refreshing Order List ...');
		AJAX('<?php echo $globals['index_url'];?>act=admin&adact=forums&seadact=ajax&motherforum='+mother, 'PrintOrder(re)');
	}else{
		//Remove the old order list
		while ($('forder').length > 0) {
			$('forder').remove(0);
		} 
		//Create the new order list
		for (var i = 1; i <= numorder; i++) {
			var newopt = document.createElement('option');
			newopt.text = i;
			newopt.value = i;
			try{
				$('forder').add(newopt, null); // standards compliant; doesn't work in IE
			}catch(ex){
				$('forder').add(newopt); // IE only
			}
		}
		//This is to make the default order as selected
		$('forder').disabled = true;
		LoadStatus('');
	}
};

function PrintOrder(resp){
	//Remove the old order list
	while ($('forder').length > 0) {
		$('forder').remove(0);
	}
	resp = parseInt(resp);
	//If there is some problem
	if(isNaN(resp)){
		LoadStatus('Unable to Retrieve Data.');
		var newopt = document.createElement('option');
		newopt.text = 'Last';
		newopt.value = 0;
		try{
			$('forder').add(newopt, null); // standards compliant; doesn't work in IE
		}catch(ex){
			$('forder').add(newopt); // IE only
		}
		$('forder').disabled = false;
		return false;
	}
	//Create the new order list
	for (var i = 1; i <= resp; i++) {
		var newopt = document.createElement('option');
		newopt.text = i;
		newopt.value = i;
		try{
			$('forder').add(newopt, null); // standards compliant; doesn't work in IE
		}catch(ex){
			$('forder').add(newopt); // IE only
		}
	}
	//This is to make the last row as selected
	$('forder').selectedIndex = resp - 1;
	$('forder').disabled = false;
	LoadStatus('');
};
	
</script>
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Forum Status:</b><br />
		This allows members to post or Locks the Board. Doesn't apply to Moderators and Admins.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<select name="fstatus" style="font-family:Verdana; font-size:11px">		
		
		<option value="1" selected>Active</option>
		<option value="0">Locked</option>
		
		</select>
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Redirect Forum:</b><br />
		Enter a URL to which this forum will be redirected to.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input name="fredirect" <?php echo ( (isset($_POST['fredirect'])) ? 'value="'.$_POST['fredirect'].'"' : '' );?> size="30" />
		</td>
		</tr>
		
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Forum Icon:</b><br />
		Enter a URL of a image if you want to give this forum a special icon.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input name="fimage" <?php echo ( (isset($_POST['fimage'])) ? 'value="'.$_POST['fimage'].'"' : '' );?> size="30" />
		</td>
		</tr>
		
	</table>
	<br />
	<br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td class="adcbg" colspan="2" style="height:25px">
		Forum Options
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Name of Forum:</b>
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="text" name="fname" <?php echo ( (isset($_POST['fname'])) ? 'value="'.$_POST['fname'].'"' : '' );?> size="30" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Forum Description:</b><br />
		A little description about this Board.<br />
		You may use HTML.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<textarea name="fdesc" cols="30" rows="5"><?php echo ( (isset($_POST['fdesc'])) ? $_POST['fdesc'] : '' );?></textarea>
		
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Deafult Theme :</b><br />
		Choose the default theme for this Board.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<select name="ftheme" >
		
		<?php
		
		echo '<option value="0" '.((isset($_POST['ftheme'])) ? (((int) trim($_POST['ftheme']) == -1 ) ? 'selected="selected"' : '' ) : '' ).' >Use Board Default</option>';
		
		foreach($themes as $tk => $tv){
		
			echo '<option value="'.$themes[$tk]['thid'].'" '.((isset($_POST['ftheme']) && (int)trim($_POST['ftheme']) == $tk ) ? 'selected="selected"' : '' ).' >'.$themes[$tk]['th_name'].'</option>';
		
		}
		
		?>
		</select>
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Rules Title:</b><br />
		The title of the rules if rules are set for the forum.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="text" name="frulestitle" <?php echo ( (isset($_POST['frulestitle'])) ? 'value="'.$_POST['frulestitle'].'"' : '' );?> size="40" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Forum Rules:</b><br />
		These rules will be displayed in the forum topic index. You may use HTML and Javascript.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<textarea name="frules" cols="40" rows="5"><?php echo ( (isset($_POST['frules'])) ? $_POST['frules'] : '' );?></textarea>       
			
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Enable RSS Feeds :</b><br />
		If enabled, recent posts in this forum will have its own RSS Feeds Page. Set the Number of posts to be shown in the feeds. Zero - 0 to disable.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="text" size="20"  name="rss" value="<?php echo (empty($_POST['rss']) ? '0' : $_POST['rss']);?>" />
		</td>
		</tr>
        
        <tr>
		<td class="adbg" width="40%" height="30">
		<b>Topic Feeds :</b><br />
		If enabled, the latest posts in a topic will have its own RSS Feeds Page. Set the Number of posts to be shown in the feeds. Zero - 0 to disable.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="text" size="20"  name="rss_topic" value="<?php echo (empty($_POST['rss_topic']) ? '0' : $_POST['rss_topic']);?>" />
		</td>
		</tr>
				
	</table>
	<br />
	<br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td class="adcbg" colspan="2" style="height:25px">
		Member Group Settings
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30" valign="top">
		<br />
		<b>Member Groups Allowed:</b><br />
		Select the Member Groups that will be allowed to view the forum.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		
		<table>
		<?php
		
		foreach($member_group['all'] as $m => $mv){
			
			echo '<tr>
				<td>
				'.$member_group['all'][$m]['mem_gr_name'].'
				</td>
				<td>
				<input type="checkbox" name="member['.$m.']" '.(isset($_POST['member'][$m]) ? 'checked="checked"' : '' ).' />
				</td>
				</tr>';
		
		}
		
		
		?>
		</table>
		
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Increase Member Posts:</b><br />
		On posting Topics or Replies Should Members post count increase.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="checkbox" name="inc_mem_posts" <?php echo (isset($_POST['inc_mem_posts']) ? 'checked="checked"' : 'checked="checked"' );?> />		
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Override Theme:</b><br />
		If the member has selected his own theme on the Forum then this Option will enforce the theme you selected as default for this Board.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="checkbox" name="override_skin" <?php echo (isset($_POST['override_skin']) ? 'checked="checked"' : '' );?> />		
		</td>
		</tr>
		
	</table>
	<br />
	<br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2" style="height:25px">
		Post Settings
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Allow Polls :</b><br />
		Should polls be allowed in this board.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="checkbox" name="allow_poll" <?php echo (isset($_POST['allow_poll']) ? 'checked="checked"' : 'checked="checked"' );?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Allow HTML :</b><br />
		Should Members who have Permissions be allowed to post HTML.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="checkbox" name="allow_html" <?php echo (isset($_POST['allow_html']) ? 'checked="checked"' : 'checked="checked"' );?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Quick Reply :</b><br />
		This will display a Quick Reply Box at the end of each Topic.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="checkbox" name="quick_reply" <?php echo (isset($_POST['quick_reply']) ? 'checked="checked"' : '' );?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Moderate Topics :</b><br />
		If enabled then every topic in this forum will be visible only when someone having permissions approves it.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="checkbox" name="mod_topics" <?php echo (isset($_POST['mod_topics']) ? 'checked="checked"' : '' );?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Moderate Posts :</b><br />
		If enabled then every post in this forum will be visible only when someone having permissions approves it.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="checkbox" name="mod_posts" <?php echo (isset($_POST['mod_posts']) ? 'checked="checked"' : '' );?> />
		</td>
		</tr>
		
	</table>
	<br />
	<br />	
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="createboard" value="Create Forum" />
		</td>
		</tr>	
	</table>
	</form>
	
	<?php
	
	//Admin footers includes Global footers
	adminfoot();

}


function ajax_getneworder_theme(){

	

}




//This fuction is to delete a forum
function deleteforum_theme(){

global $globals, $theme, $categories, $forums, $board, $mother_options, $mother_options_in, $error, $samelevel, $postcodefield;
		
	adminhead('Administration Center - Delete a Forum');
	
	forum_global();
	
	error_handle($error, '100%');
	
	?>
	<form action="" method="post" name="deleteboard">
	<?php echo $postcodefield;?>
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td class="adcbg" colspan="2" style="height:25px">
		Deleting Options
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Delete Forums:</b>
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="forumname" disabled="disabled" value="<?php echo $board['fname'];?>" size="30" />	
		<!--<select name="deltop" style="font-family:Verdana; font-size:11px" disabled="disabled" >		
		<option value="1" <?php echo ((isset($_POST['deltop']) && (int)trim($_POST['deltop']) == 1 ) ? 'selected="selected"' : '' );?> >Delete Forums</option>
		<option value="2" <?php echo ((isset($_POST['deltop']) && (int)trim($_POST['deltop']) == 2 ) ? 'selected="selected"' : '' );?> >Shift Topics</option>
		</select>-->
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Shift Inboards to :</b><br />
		If there are any In Boards shift them to.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;	
		<select name="shiftinto" style="font-family:Verdana; font-size:11px">
		
		<?php 
		
		foreach($mother_options as $i => $iv){
		
			echo '<option value="'.$mother_options[$i][0].'" '.((isset($_POST['shifttopto']) && trim($_POST['shifttopto']) == $mother_options[$i][0] ) ? 'selected="selected"' : '' ).'>
			'.$mother_options[$i][1].'
			</option>';
			
		}//End of for loop
		
		?>
		</select>
		</td>
		</tr>
	
		<tr>
		<td align="center" class="adbg" colspan="2">
		<input type="submit" name="deleteforum" value="Confirm Delete" />
		</td>
		</tr>	
	</table>
	</form>
	
	<?php
	
	//Admin footers includes Global footers
	adminfoot();

}





function forumreorder_theme(){

global $globals, $theme, $categories, $error, $onload, $dmenus,$mother_options , $reoforums;
	
	//Pass to onload to initialize a JS
	if(!empty($reoforums)){
	
		$onload['forumreoder'] = 'init_reoder()';
		
	}
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Reorder Forums');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/categories.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Reorder Forums</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	This is the place for changing the Forum order in which they appear throughout the Board. First select the Parent the forums of which you wish to reorder. <b>Drag and Drop</b> the Forum box and put them in the order you like.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="forumreorderform">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Reorder Forums
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="40%" height="30">
		<b>Select Parent :</b><br />
		Select the parent the forums of which you want to reorder. Please select only those Parents which have more than two forums.
		</td>
		<td class="adbg">&nbsp;&nbsp;&nbsp;&nbsp;	
		<select name="parent" style="font-family:Verdana; font-size:11px" id="parent" onchange="jumptoparent()">
		<option value="sm" selected="selected">-----Select Parent-----</option>
		<?php 
		
		foreach($mother_options as $i => $iv){
		
			echo '<option value="'.$mother_options[$i][0].'" '.((isset($_GET['parent']) && trim($_GET['parent']) == $mother_options[$i][0] ) ? 'selected="selected"' : '' ).'>
			'.$mother_options[$i][1].'
			</option>';
			
		}//End of for loop
		
		?>
		</select>
<script type="text/javascript">
function jumptoparent(){
	var par = $('parent').value;
	window.location = '<?php echo $globals['index_url'].'act=admin&adact=forums&seadact=forumreorder&parent=';?>'+par;
}
</script>
		</td>
		</tr>

	</table>
	<br /><br />
	
	<?php if(!empty($reoforums)){
?>
	
<table width="60%" cellpadding="0" cellspacing="0" align="center" border="0">
<tr><td id="for_reorder_pos" width="100%"></td></tr>
</table>
	<br /><br />
	<script type="text/javascript">

//The array id of all the elements to be reordered
reo_r = new Array(<?php echo implode(', ', array_keys($reoforums));?>);

//The id of the table that will hold the elements
reorder_holder = 'for_reorder_pos';

//The prefix of the Dom Drag handle for every element
reo_ha = 'forha';

//The prefix of the Dom Drag holder for every element(the parent of every element)
reo_ho = 'for';

//The prefix of the Hidden Input field for the reoder value for every element
reo_hid = 'forhid';

</script>
<?php js_reorder();?>

	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		 <?php
	$temp = 1;
	foreach($reoforums as $k => $v){
		
		$dmenus[] = '<div id="for'.$k.'">
<table cellpadding="0" cellspacing="0" class="catreo" id="forha'.$k.'" onmousedown="this.style.zIndex=\'1\'" onmouseup="this.style.zIndex=\'0\'">
<tr><td>
&nbsp;&nbsp;'.$v.'
</td></tr>
</table>
</div>';	
	
	echo '<input type="hidden" name="for['.$k.']" value="'.$temp.'" id="forhid'.$k.'" />';	
	
	$temp = $temp + 1;
	
	}
	
	?>
		<input type="submit" name="forumreorder" value="Re Order" />
		</td>
		</tr>	
	</table>
	
<?php

}

?> 
   
	</form>
	
	<?php	
	
	adminfoot();
	
}

?>