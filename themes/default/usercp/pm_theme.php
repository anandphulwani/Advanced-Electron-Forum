<?php

function inbox_theme(){

global $user, $logged_in, $globals, $theme;
global $inbox, $foldercount;

	//The global User CP Headers
	usercphead('Inbox');
	?>
	<script type="text/javascript">
	function gotopage(val){
		
		gourl = '<?php echo $globals['index_url'];?>act=usercp&ucpact=inbox&pmfpg='
		
		//alert (gourl+val);
		
		window.location = gourl+val;
	
	}
	</SCRIPT>
	<?php
	echo '<select onchange="gotopage(this.value)" name="gotopage" align="right">';
	
	$num_pages = ceil($foldercount[0]/$globals['pmnumshowinfolders']);
	
	for($i = 1; $i <= (empty($num_pages) ? 1 : $num_pages); $i++){
	
		echo '<option value="'.$i.'" '.((isset($_GET['pmfpg']) && trim($_GET['pmfpg']) == $i ) ? 'selected="selected"' : '' ).' >'.$i.'</option>';
	
	}
	
	echo '</select><br /><br />';
	
	echo '
	<form method="post" action="" name="inboxform">
	<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
	<td>
	<table width="100%" cellpadding="0" cellspacing="0"><tr>
	<td class="ucpcbgl"></td>
	<td class="ucpcbg">Inbox</td>
	<td class="ucpcbgr"></td>		
	</tr>
	</table>
	</td>
	</tr>
	
	<tr>
	<td class="cbgbor">
	
	<table width="100%" cellpadding="2" cellspacing="1">
	<tr>
	<td class="ucpfcbg1" colspan="4" align="center">
	<img src="'.$theme['images'].'usercp/inbox.gif" />
	</td>
	</tr>
	<tr>
	<td class="ucpcbg1" align="left" width="5%">
	<input type=checkbox onClick="check(document.getElementsByName(\'list[]\'), this)" value="0">
	</td>
	<td class="ucpcbg1" align="left" width="20%">
	Sender
	</td>
	<td class="ucpcbg1" align="left" width="37%">
	Subject
	</td>
	<td class="ucpcbg1" align="left" width="33%">
	Date
	</td>
	</tr>';
	
	//Check do we have some PM's or no
	if(!empty($inbox)){
	
		foreach($inbox as $ik => $iv){
		
			echo '<tr>
			<td class="pmfwbg" align="left">
			<input type=checkbox name="list[]" value="'.$iv['pmid'].'">
			</td>
			<td class="pmfwbg" align="left">
			<a href="'.$globals['index_url'].'mid='.$iv['pm_from'].'">'.$iv['sender'].'</a>
			</td>
			<td class="pmfwbg" align="left">
			'.((empty($iv['pm_read_time'])) ? '<b>' : '').'<a href="'.$globals['index_url'].'act=usercp&ucpact=showpm&pmid='.$iv['pmid'].'">'.$iv['pm_subject'].'</a>'.((empty($iv['pm_read_time'])) ? '</b>' : '').'
			</td>
			<td class="pmfwbg" align="left">
			'.(datify($iv['pm_time'])).'
			</td>
			</tr>';
		
		}
		
		echo '<tr>
			<td class="pmfwbg" align="left" colspan="5">
			<input type="submit" name="deleteselinbox" value="Delete Selected">
			</td>
			</tr>';
	
	}else{
	
		echo '<td class="pmfwbg" align="center" colspan="5">
			There are no messages in your inbox folder.
			</td>';
		
	}

	echo '</table>
	
	</td>
</tr>

<tr>
<td><img src="'.$theme['images'].'cbotsmall.png" width="100%" height="10"></td>
</tr>
</table>
	
	</form>';
	
	echo '<br /><br /><select onchange="gotopage(this.value)" name="gotopage" align="right">';
	
	$num_pages = ceil($foldercount[0]/$globals['pmnumshowinfolders']);
	
	for($i = 1; $i <= (empty($num_pages) ? 1 : $num_pages); $i++){
	
		echo '<option value="'.$i.'" '.((isset($_GET['pmfpg']) && trim($_GET['pmfpg']) == $i ) ? 'selected="selected"' : '' ).' >'.$i.'</option>';
	
	}
	
	echo '</select>';
	
	//The global User CP Footers
	usercpfoot();


}


function sentitems_theme(){

global $user, $logged_in, $globals, $theme;
global $sentitems, $foldercount;

	//The global User CP Headers
	usercphead('Sent Items');
	?>
	<script type="text/javascript">
	function gotopage(val){
		
		gourl = '<?php echo $globals['index_url'];?>act=usercp&ucpact=sentitems&pmfpg='
		
		//alert (gourl+val);
		
		window.location = gourl+val;
	
	}
	</SCRIPT>
	<?php
	echo '<select onchange="gotopage(this.value)" name="gotopage" align="right">';
	
	$num_pages = ceil($foldercount[1]/$globals['pmnumshowinfolders']);
	
	for($i = 1; $i <= (empty($num_pages) ? 1 : $num_pages); $i++){
	
		echo '<option value="'.$i.'" '.((isset($_GET['pmfpg']) && trim($_GET['pmfpg']) == $i ) ? 'selected="selected"' : '' ).' >'.$i.'</option>';
	
	}
	
	echo '</select><br /><br />';
	
	echo '
	<form method="post" action="" name="sentitemsform">
	<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
	<td>
	<table width="100%" cellpadding="0" cellspacing="0"><tr>
	<td class="ucpcbgl"></td>
	<td class="ucpcbg">Sent Items</td>
	<td class="ucpcbgr"></td>		
	</tr>
	</table>
	</td>
	</tr>
	
	<tr>
	<td class="cbgbor">
	<table width="100%" cellpadding="2" cellspacing="1">
	<tr>
	<td class="ucpfcbg1" colspan="4" align="center">
	<img src="'.$theme['images'].'usercp/sent.gif" />
	</td>
	</tr>
	<tr>
	<td class="ucpcbg1" align="left" width="5%">
	<input type=checkbox onClick="check(document.getElementsByName(\'list[]\'), this)" value="0">
	</td>
	<td class="ucpcbg1" align="left" width="20%">
	Sent To
	</td>
	<td class="ucpcbg1" align="left" width="37%">
	Subject
	</td>
	<td class="ucpcbg1" align="left" width="33%">
	Date
	</td>
	</tr>';
	
	//Check do we have some PM's or no
	if(!empty($sentitems)){
	
		foreach($sentitems as $ik => $iv){
		
			echo '<tr>
			<td class="pmfwbg" align="left">
			<input type=checkbox name="list[]" value="'.$iv['pmid'].'">
			</td>
			<td class="pmfwbg" align="left">
			<a href="'.$globals['index_url'].'mid='.$iv['pm_to'].'">'.$iv['reciever'].'</a>
			</td>
			<td class="pmfwbg" align="left">
			<a href="'.$globals['index_url'].'act=usercp&ucpact=showsentpm&pmid='.$iv['pmid'].'">'.$iv['pm_subject'].'</a>
			</td>
			<td class="pmfwbg" align="left">
			'.(datify($iv['pm_time'])).'
			</td>
			</tr>';
		
		}
		
		echo '<tr>
			<td class="pmfwbg" align="left" colspan="5">
			<input type="submit" name="deleteselsent" value="Delete Selected">
			</td>
			</tr>';
	
	}else{
	
		echo '<td class="pmfwbg" align="center" colspan="5">
			There are no messages
			</td>';
		
	}

	echo '</table>
	
	</td>
	</tr>
	
	<tr>
<td><img src="'.$theme['images'].'cbotsmall.png" width="100%" height="10"></td>
</tr>

	</table>
	
	</form>';
		
	echo '<br /><br /><select onchange="gotopage(this.value)" name="gotopage" align="right">';
	
	$num_pages = ceil($foldercount[1]/$globals['pmnumshowinfolders']);
	
	for($i = 1; $i <= (empty($num_pages) ? 1 : $num_pages); $i++){
	
		echo '<option value="'.$i.'" '.((isset($_GET['pmfpg']) && trim($_GET['pmfpg']) == $i ) ? 'selected="selected"' : '' ).' >'.$i.'</option>';
	
	}
	
	echo '</select>';
	
	//The global User CP Footers
	usercpfoot();


}


function drafts_theme(){

global $user, $logged_in, $globals, $theme;
global $drafts, $foldercount;

	//The global User CP Headers
	usercphead('Drafts');
	?>
	<script type="text/javascript">
	function gotopage(val){
		
		gourl = '<?php echo $globals['index_url'];?>act=usercp&ucpact=drafts&pmfpg='
		
		//alert (gourl+val);
		
		window.location = gourl+val;
	
	}
	</SCRIPT>
	<?php
	echo '<select onchange="gotopage(this.value)" name="gotopage" align="right">';
	
	$num_pages = ceil($foldercount[2]/$globals['pmnumshowinfolders']);
	
	for($i = 1; $i <= (empty($num_pages) ? 1 : $num_pages); $i++){
	
		echo '<option value="'.$i.'" '.((isset($_GET['pmfpg']) && trim($_GET['pmfpg']) == $i ) ? 'selected="selected"' : '' ).' >'.$i.'</option>';
	
	}
	
	echo '</select><br /><br />';
	
	echo '
	<form method="post" action="" name="draftsform">
	<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
	<td>
	<table width="100%" cellpadding="0" cellspacing="0"><tr>
	<td class="ucpcbgl"></td>
	<td class="ucpcbg">Drafts</td>
	<td class="ucpcbgr"></td>		
	</tr>
	</table>
	</td>
	</tr>
	
	<tr>
	<td class="cbgbor">
	
	<table width="100%" cellpadding="2" cellspacing="1">
	<tr>
	<td class="ucpfcbg1" colspan="4" align="center">
	<img src="'.$theme['images'].'usercp/drafts.gif" />
	</td>
	</tr>
	<tr>
	<td class="ucpcbg1" align="left" width="5%">
	<input type=checkbox onClick="check(document.getElementsByName(\'list[]\'), this)" value="0">

	</td>
	<td class="ucpcbg1" align="left" width="20%">
	Sending To
	</td>
	<td class="ucpcbg1" align="left" width="37%">
	Subject
	</td>
	<td class="ucpcbg1" align="left" width="33%">
	Saved Date
	</td>
	</tr>';
	
	//Check do we have some PM's or no
	if(!empty($drafts)){
	
		foreach($drafts as $ik => $iv){
			
			//First Lets Build up the recievers array
			foreach($iv['rec_usernames'] as $rk => $rv){
			
				$recievers[] = '<a href="'.$globals['index_url'].'mid='.$iv['rec_id'][$rk].'">'.$rv.'</a>';
			
			}
			/*echo '<pre>';
			print_r($recievers);
			echo '</pre>';*/
			
			echo '<tr>
			<td class="pmfwbg" align="left">
			<input type=checkbox name="list[]" value="'.$iv['pmid'].'">
			</td>
			<td class="pmfwbg" align="left">
			'.(implode(', ', $recievers)).'
			</td>
			<td class="pmfwbg" align="left">
			<a href="'.$globals['index_url'].'act=usercp&ucpact=sendsaved&pmid='.$iv['pmid'].'">'.$iv['pm_subject'].'</a>
			</td>
			<td class="pmfwbg" align="left">
			'.(datify($iv['pm_time'])).'
			</td>
			</tr>';
			
			//Unset the VAR we set
			unset($recievers);
		
		}
		
		echo '<tr>
			<td class="pmfwbg" align="left" colspan="5">
			<input type="submit" name="deleteseldrafts" value="Delete Selected">
			</td>
			</tr>';
	
	}else{
	
		echo '<td class="pmfwbg" align="center" colspan="5">
			There are no messages
			</td>';
		
	}

	echo '</table>
	
	</td>
	</tr>
		
	<tr>
<td><img src="'.$theme['images'].'cbotsmall.png" width="100%" height="10"></td>
</tr>

	</table>
	
	</form>';
	
	echo '<br /><br /><select onchange="gotopage(this.value)" name="gotopage" align="right">';
	
	$num_pages = ceil($foldercount[2]/$globals['pmnumshowinfolders']);
	
	for($i = 1; $i <= (empty($num_pages) ? 1 : $num_pages); $i++){
	
		echo '<option value="'.$i.'" '.((isset($_GET['pmfpg']) && trim($_GET['pmfpg']) == $i ) ? 'selected="selected"' : '' ).' >'.$i.'</option>';
	
	}
	
	echo '</select>';
	
	//The global User CP Footers
	usercpfoot();


}



//////////////////////////////////////
// This function is the theme to Send new PM's.
//////////////////////////////////////
function writepm_theme(){

global $theme, $globals, $logged_in, $postcodefield, $error, $user, $smileys, $smileycode, $smileyimages, $reply, $pmto, $dmenus;

	//The global User CP Headers
	usercphead('Write a PM');

	error_handle($error, '90%');

	//Include the WYSIWYG functions
	include_once($theme['path'].'/texteditor_theme.php');
	
	//Iframe for WYSIWYG
	$dmenus[] = '<iframe id="aefwysiwyg" style="width:420px; height:175px; visibility: hidden; left:0px; top:0px; position:absolute; border:1px solid #666666; background:#FFFFFF;" frameborder="0" marginheight="3" marginwidth="3"></iframe>';
	
?>
<script language="JavaScript" src="<?php echo $theme['url'].'/js/texteditor.js';?>" type="text/javascript">
</script>

<script type="text/javascript">
addonload('init_editor();');
function init_editor(){
	try_wysiwyg = <?php echo (empty($theme['wysiwyg']) ? 'false' : 'true');?>;
	editor = new aef_editor();
	editor.wysiwyg_id = 'aefwysiwyg';
	editor.textarea_id = 'pmbody';
	if(try_wysiwyg){
		editor.to_wysiwyg(true);//Directly try to pass to WYSIWYG Mode
	}
};
</script>

<script language="JavaScript" src="<?php echo $theme['url'].'/js/suggest.js';?>" type="text/javascript"></script>

<form action=""  method="post" name="writepmform" onsubmit="editor.onsubmit();">

<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
	<td>
	<table width="100%" cellpadding="0" cellspacing="0"><tr>
	<td class="ucpcbgl"></td>
	<td class="ucpcbg">Send New Personal Message</td>
	<td class="ucpcbgr"></td>		
	</tr>
	</table>
	</td>
	</tr>
	
	<tr>
	<td class="cbgbor">

<table width="100%" cellpadding="1" cellspacing="1">

	<tr>
	<td class="ucpfcbg1" colspan="4" align="center">
	<img src="<?php echo $theme['images'];?>usercp/compose.gif" />
	</td>
	</tr>
    
	<tr>
	<td width="18%" class="ucplc">Recipients</td>
	<td class="ucprc"><input type="text" size="45" maxlength="50" id="pmrecipients" name="pmrecipients"  value="<?php
	if(!empty($_POST['pmrecipients'])){
		echo $_POST['pmrecipients'];
	}elseif(!empty($reply['pm_from'])){
		echo $reply['sender'];
	}elseif(!empty($pmto)){
		echo $pmto;
	}?>" onkeyup="handlesuggest(event, 'pmrecipients')" onkeydown="handlekeys(event)" autocomplete=off onblur="setTimeout(hidesuggest, 1000);" suggesturl="<?php echo $globals['index_url'];?>act=suggest" />
	</td>
	</tr>
	
	<tr>
	<td width="18%" class="ucplc">Subject</td>
	<td class="ucprc"><input type="text" size="45" maxlength="50" name="pmsubject" value="<?php echo (empty($_POST['pmsubject']) ? (empty($reply['pm_subject']) ? '' : $reply['pm_subject']) : $_POST['pmsubject']);?>" /></td>
	</tr>
	
	<tr>
	<td width="18%" class="ucplc">Formatting</td>
	<td class="ucprc">
	<?php editor_buttons('editor');?>
	</td>
	</tr>
	
	<?php editor_smileys('editor', $globals['pmusesmileys']);?>
	
	<tr>
	<td width="18%" class="ucplc">Message</td>
	<td class="ucprc"><textarea name="pmbody" rows="13" cols="65" id="pmbody" onchange="storeCaret(this);" onkeyup="storeCaret(this);" onclick="storeCaret(this);" onselect="storeCaret(this);" /><?php echo (empty($_POST['pmbody']) ? (empty($reply['pm_body']) ? '' : '[quote]'.$reply['pm_body'].'[/quote]') : $_POST['pmbody']);?></textarea>
	<?php echo $postcodefield;/*The most important thing*/?>
	</td>
	</tr>
	
	<tr>
	<td width="18%" class="ucplc">Options</td>
	<td class="ucprc">
		<table cellpadding="1" cellspacing="1">
		
		<tr>
		<td>
		<input type="checkbox" name="trackpm" />
		</td>
		<td>
		<b>Track</b> this Message</td>
		</tr>
		
		<tr>
		<td>
		<input type="checkbox" name="pmsaveinsentitems" <?php echo (($globals['pmsaveinsentitems']) ? 'checked="checked"' : '') ;?> />
		</td>
		<td>
		<b>Save</b> a copy in 'Sent Items' Folder</td>
		</tr>
		
		</table>
		
	</td>
	</tr>
	
	<tr>
	<td colspan="2" class="ucprc" style="text-align:center">
	<input type="submit" name="sendpm" value="Send PM"/>
	<input type="submit" name="savepm" value="Save and Send Later"/>
	</td>
	</tr>

</table>

</td>
</tr>
	
	<tr>
<td><img src="<?php echo $theme['images'];?>cbotsmall.png" width="100%" height="10"></td>
</tr>

</table>

</form>
	
	<?php	
	
	//The global User CP Footers
	usercpfoot();


}


function searchpm_theme(){

global $theme, $user, $globals, $error, $themes, $pms;

	//The global User CP Headers
	usercphead();
	
	if(empty($pms)){
	
	error_handle($error);

	?>

<form action="" method="post" name="searchpm">

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td>
<table width="100%" cellpadding="0" cellspacing="0"><tr>
<td class="ucpcbgl"></td>
<td class="ucpcbg">Search PM Options</td>
<td class="ucpcbgr"></td>		
</tr>
</table>
</td>
</tr>

<tr>
<td class="cbgbor">

<table width="100%" cellpadding="4" cellspacing="1">

	<tr>
	<td class="ucpfcbg1" colspan="5" align="center">
	<img src="<?php echo $theme['images'];?>usercp/searchpm.gif" />
	</td>
	</tr>
	
	<tr>
	<td width="30%" class="ucpflc" align="right"><b>Search : </b></td>
	<td class="ucpflc">
	<select name="folder">
	<option value="0">Inbox</option>
	<option value="1">Sent Items</option>
	<option value="2">Drafts</option>
	</select>
	</td> 
	</tr>
	
	<tr>
	<td width="30%" class="ucpflc" align="right"><b>From : </b></td>
	<td class="ucpflc"><input type="text" name="from" <?php echo 'value="'.((isset($_POST['from'])) ? $_POST['from'] : '').'"';?> size="40" /></td> 
	</tr>
	
	<tr>
	<td class="ucpflc" align="right"><b>To : </b></td>
	<td class="ucpflc"><input type="text" name="to" <?php echo 'value="'.((isset($_POST['to'])) ? $_POST['to'] : '').'"';?> size="40" /></td> 
	</tr>
	
	<tr>
	<td class="ucpflc" align="right"><b>Subject : </b></td>
	<td class="ucpflc"><input type="text" name="subject" <?php echo 'value="'.((isset($_POST['subject'])) ? $_POST['subject'] : '').'"';?> size="40" /></td> 
	</tr>
	
	<tr>
	<td class="ucpflc" align="right"><b>Has the words : </b></td>
	<td class="ucpflc"><input type="text" name="hasthewords" <?php echo 'value="'.((isset($_POST['hasthewords'])) ? $_POST['hasthewords'] : '').'"';?> size="40" /></td> 
	</tr>
	
	<tr>
	<td class="ucpflc" align="right"><b>Doesn't have : </b></td>
	<td class="ucpflc"><input type="text" name="doesnthave" <?php echo 'value="'.((isset($_POST['doesnthave'])) ? $_POST['doesnthave'] : '').'"';?> size="40" /></td> 
	</tr>
		
	<tr>
	<td class="ucpflc" colspan="5" align="center">
	<input type="submit" name="searchpm" value="Search" />
	</td>
	</tr>
	
</table>


</td>
</tr>
	
	<tr>
<td><img src="<?php echo $theme['images'];?>cbotsmall.png" width="100%" height="10"></td>
</tr>

</table>


</form>

	<?php
	
	
	}else{
	
	echo '<b>Search Results : </b><br />';
	
	foreach($pms as $p => $pm){
		
	//The PM Subject
	echo '<br /><table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td>
<table width="100%" cellpadding="0" cellspacing="0"><tr>
<td class="ucpcbgl"></td>
<td class="ucpcbg">'.$pm['pm_subject'].'</td>
<td class="ucpcbgr"></td>		
</tr>
</table>
</td>
</tr>

<tr>
<td class="cbgbor">

<table width="100%" cellpadding="1" cellspacing="0">

<tr>
	<td class="pmsender" width="20%">	
	'.(empty($pm['sender']) ? '' : '<a href="'.$globals['index_url'].'mid='.$pm['id'].'">'.$pm['sender'].'</a>').'	
	'.(empty($pm['receiver']) ? '' : '<a href="'.$globals['index_url'].'mid='.$pm['id'].'">'.$pm['receiver'].'</a>');
	if(!empty($pm['rec_usernames'])){
	
		//First Lets Build up the recievers array
		foreach($pm['rec_usernames'] as $rk => $rv){
		
			$recievers[] = '<a href="'.$globals['index_url'].'mid='.$pm['rec_id'][$rk].'">'.$rv.'</a>';
		
		}
		
		echo implode(', ', $recievers);
	
	}
	echo '</td>
	<td class="pmdate" width="80%">	
	<div style="float:right">
	'.((!$pm['pm_folder']) ? '<a href="'.$globals['index_url'].'act=usercp&ucpact=writepm&reply='.$pm['pmid'].'">
	Reply</a> | ' : '').'
	<a href="'.$globals['index_url'].'act=usercp&ucpact=delpm&pm='.$pm['pmid'].'&folder='.$pm['pm_folder'].'">
	Delete
	</a>
	</div>
	<img src="'.$theme['images'].'postedon.png">&nbsp;'.$pm['pm_time'].'	
	</td>
	</tr>
	';	
	
	//The PM body
	echo '<tr>
	<td class="pm" align="left" valign="top" colspan="2" >
	'.$pm['pm_body'].'
	</td>
	</tr>
	
	</table>

	</td>
	</tr>
	
	<tr>
	<td colspan="2"><img src="'.$theme['images'].'cbotsmall.png" width="100%" height="10"></td>
	</tr>
	</table>';
	
	}
	
	
	}	
	
	//The global User CP Footers
	usercpfoot();
	
}


//////////////////////////////////////
// This function is the theme to Send new PM's.
//////////////////////////////////////
function sendsaved_theme(){

global $theme, $postcodefield, $error, $user, $smileys, $smileycode, $smileyimages, $emoticons, $popup_emoticons, $globals, $draft, $dmenus;

	//The global User CP Headers
	usercphead('Drafts');

	error_handle($error, '90%');
	
	//Include the WYSIWYG functions
	include_once($theme['path'].'/texteditor_theme.php');
	
	//Iframe for WYSIWYG
	$dmenus[] = '<iframe id="aefwysiwyg" style="width:420px; height:175px; visibility: hidden; left:0px; top:0px; position:absolute; border:1px solid #666666; background:#FFFFFF;" frameborder="0" marginheight="3" marginwidth="3"></iframe>';
	
?>
<script language="JavaScript" src="<?php echo $theme['url'].'/js/texteditor.js';?>" type="text/javascript">
</script>

<script type="text/javascript">
addonload('init_editor();');
function init_editor(){
	try_wysiwyg = <?php echo (empty($theme['wysiwyg']) ? 'false' : 'true');?>;
	editor = new aef_editor();
	editor.wysiwyg_id = 'aefwysiwyg';
	editor.textarea_id = 'pmbody';
	if(try_wysiwyg){
		editor.to_wysiwyg(true);//Directly try to pass to WYSIWYG Mode
	}
};
</script>

<script language="JavaScript" src="<?php echo $theme['url'].'/js/suggest.js';?>" type="text/javascript"></script>
<center>

<form action=""  method="post" name="sendsavedform" onsubmit="editor.onsubmit();">

<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
	<td>
	<table width="100%" cellpadding="0" cellspacing="0"><tr>
	<td class="ucpcbgl"></td>
	<td class="ucpcbg">Drafts</td>
	<td class="ucpcbgr"></td>		
	</tr>
	</table>
	</td>
	</tr>
	
	<tr>
	<td class="cbgbor">

<table width="100%" cellpadding="1" cellspacing="1">
	
    <tr>
	<td class="ucpfcbg1" colspan="2" align="center">
	<img src="<?php echo $theme['images'];?>usercp/compose.gif" />
	</td>
	</tr>
    
	<tr>
	<td width="18%" class="ucplc">Recipients</td>
	<td class="ucprc"><input type="text" size="45" maxlength="50" name="pmrecipients" <?php echo 'value="'.((isset($_POST['pmrecipients'])) ? $_POST['pmrecipients'] : $draft['rec_usernames']).'"';?> onkeyup="handlesuggest(event, 'pmrecipients')" onkeydown="handlekeys(event)" autocomplete=off  onblur="setTimeout(hidesuggest, 1000);" suggesturl="<?php echo $globals['index_url'];?>act=suggest" id="pmrecipients" />
	</td>
	</tr>
	
	<tr>
	<td width="18%" class="ucplc">Subject</td>
	<td class="ucprc"><input type="text" size="45" maxlength="50" name="pmsubject" <?php echo 'value="'.((isset($_POST['pmsubject'])) ? $_POST['pmsubject'] : $draft['pm_subject']).'"';?> /></td>
	</tr>
	
	<tr>
	<td width="18%" class="ucplc">Formatting</td>
	<td class="ucprc">
	<?php editor_buttons('editor');?>
	</td>
	</tr>
	
	<?php editor_smileys('editor', $globals['pmusesmileys']);?>
	
	<tr>
	<td width="18%" class="ucplc">Message</td>
	<td class="ucprc"><textarea name="pmbody" rows="13" cols="65" id="pmbody" onchange="storeCaret(this);" onkeyup="storeCaret(this);" onclick="storeCaret(this);" onselect="storeCaret(this);" /><?php echo (empty($_POST['pmbody']) ? (empty($draft['pm_body']) ? '' : $draft['pm_body']) : $_POST['pmbody']);?></textarea>
	<?php echo $postcodefield;/*The most important thing*/?>
	</td>
	</tr>
	
	<tr>
	<td width="18%" class="ucplc">Options</td>
	<td class="ucprc">
		<table cellpadding="1" cellspacing="1">
		
		<tr>
		<td>
		<input type="checkbox" name="trackpm" />
		</td>
		<td>
		<b>Track</b> this Message</td>
		</tr>
		
		<tr>
		<td>
		<input type="checkbox" name="pmsaveinsentitems" <?php echo (($globals['pmsaveinsentitems']) ? 'checked="checked"' : '') ;?> />
		</td>
		<td>
		<b>Save</b> a copy in 'Sent Items' Folder</td>
		</tr>
		
		</table>
		
	</td>
	</tr>
	
	<tr>
	<td colspan="2" class="ucprc" style="text-align:center">
	<input type="submit" name="sendpm" value="Send PM"/>
	<input type="submit" name="savepm" value="Save and Send Later"/>
	</td>
	</tr>

</table>

</td>
</tr>

<tr>
<td><img src="<?php echo $theme['images'];?>cbotsmall.png" width="100%" height="10"></td>
</tr>
</table>

</form>
	
	<?php	
	
	//The global User CP Footers
	usercpfoot();


}


function trackpm_theme(){

global $theme, $user, $globals, $read, $unread;

	//The global User CP Headers
	usercphead('Track Messages');
	
	
	/* Show the Read Ones first */
	
	echo '<form method="post" action="" name="trackreadform">
	
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td>
<table width="100%" cellpadding="0" cellspacing="0"><tr>
<td class="ucpcbgl"></td>
<td class="ucpcbg">Read PM</td>
<td class="ucpcbgr"></td>		
</tr>
</table>
</td>
</tr>

<tr>
<td class="cbgbor">
	
	<table width="100%" cellpadding="2" cellspacing="1">
	<tr>
	<td class="ucpcbg1" align="left" width="5%">
	&nbsp;
	</td>
	<td class="ucpcbg1" align="left" width="5%">
	<input type=checkbox onClick="check(document.getElementsByName(\'list[]\'), this)" value="0">
	</td>
	<td class="ucpcbg1" align="left" width="20%">
	Sent To
	</td>
	<td class="ucpcbg1" align="left" width="37%">
	Subject
	</td>
	<td class="ucpcbg1" align="left" width="33%">
	Read Date
	</td>
	</tr>';
	
	//Check do we have some PM's or no
	if(!empty($read)){
	
		foreach($read as $rk => $rv){
			
			echo '<tr>
			<td class="pmfwbg" align="left">
			<img src="'.$theme['images'].'pm.jpg" />
			</td>
			<td class="pmfwbg" align="left">
			<input type=checkbox name="list[]" value="'.$rv['pmid'].'">
			</td>
			<td class="pmfwbg" align="left">
			<a href="'.$globals['index_url'].'mid='.$rv['pm_to'].'">'.$rv['reciever'].'</a>
			</td>
			<td class="pmfwbg" align="left">
			'.$rv['pm_subject'].'
			</td>
			<td class="pmfwbg" align="left">
			'.$rv['pm_read_time'].'
			</td>
			</tr>';
			
		
		}
		
		echo '<tr>
			<td class="pmfwbg" align="left" colspan="5">
			<input type="submit" name="stoptrackread" value="Stop Tracking">
			</td>
			</tr>';
		
	
	}else{
	
		echo '<td class="pmfwbg" align="center" colspan="5">
			There are no messages
			</td>';
		
	}

	echo '</table>
	
	</td>
</tr>

<tr>
<td><img src="'.$theme['images'].'cbotsmall.png" width="100%" height="10"></td>
</tr>
</table>
	
		</form>
		<br />
		<br />';
		
	/* Ending - Show the Read Ones first */
	
	
	/* Show the Unread Ones now */
	
	echo '
	<form method="post" action="" name="trackunreadform">
	
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td>
<table width="100%" cellpadding="0" cellspacing="0"><tr>
<td class="ucpcbgl"></td>
<td class="ucpcbg">Unread PM</td>
<td class="ucpcbgr"></td>		
</tr>
</table>
</td>
</tr>

<tr>
<td class="cbgbor">
	
	<table width="100%" cellpadding="2" cellspacing="1">
	<tr>
	<td class="ucpcbg1" align="left" width="5%">
	&nbsp;
	</td>
	<td class="ucpcbg1" align="left" width="5%">
	<input type=checkbox onClick="check(document.getElementsByName(\'listu[]\'), this)" value="0">
	</td>
	<td class="ucpcbg1" align="left" width="20%">
	Sent To
	</td>
	<td class="ucpcbg1" align="left" width="37%">
	Subject
	</td>
	<td class="ucpcbg1" align="left" width="33%">
	Date Sent
	</td>
	</tr>';
	
	//Check do we have some PM's or no
	if(!empty($unread)){
	
		foreach($unread as $uk => $uv){
			
			echo '<tr>
			<td class="pmfwbg" align="left">
			<img src="'.$theme['images'].'pm.jpg" />
			</td>
			<td class="pmfwbg" align="left">
			<input type=checkbox name="listu[]" value="'.$uv['pmid'].'">
			</td>
			<td class="pmfwbg" align="left">
			<a href="'.$globals['index_url'].'mid='.$uv['pm_to'].'">'.$uv['reciever'].'</a>
			</td>
			<td class="pmfwbg" align="left">
			'.$uv['pm_subject'].'
			</td>
			<td class="pmfwbg" align="left">
			'.$uv['pm_time'].'
			</td>
			</tr>';
			
		
		}
		
		echo '<tr>
			<td class="pmfwbg" align="left" colspan="5">
			<input type="submit" name="stoptrackunread" value="Stop Tracking">
			</td>
			</tr>';
		
	
	}else{
	
		echo '<td class="pmfwbg" align="center" colspan="5">
			There are no messages
			</td>';
		
	}

	echo '</table>	

</td>
</tr>

<tr>
<td><img src="'.$theme['images'].'cbotsmall.png" width="100%" height="10"></td>
</tr>
</table>
</form>';
	
	/* Ending - Show the Unread Ones now */
	
	//The global User CP Footers
	usercpfoot();


}




function showpm_theme(){

global $user, $logged_in, $globals, $AEF_SESS, $theme;
global $pm;


	//The global User CP Headers
	usercphead();
		
	//Start the Table to show the PM in
	echo '<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td>
<table width="100%" cellpadding="0" cellspacing="0"><tr>
<td class="ucpcbgl"></td>
<td class="ucpcbg">'.$pm['pm_subject'].'</td>
<td class="ucpcbgr"></td>		
</tr>
</table>
</td>
</tr>

<tr>
<td class="cbgbor">

<table width="100%" cellpadding="2" cellspacing="0">
	
	<tr>
	<td class="pmsender" width="21%">
	<a href="'.$globals['index_url'].'mid='.$pm['id'].'">
	'.$pm['sender'].'
	</a>
	</td>
	<td class="pmdate" width="80%">	
	<div style="float:right">
	'.((!$pm['pm_folder']) ? '<a href="'.$globals['index_url'].'act=usercp&ucpact=writepm&reply='.$pm['pmid'].'">
	Reply</a> | ' : '').'
	<a href="'.$globals['index_url'].'act=usercp&ucpact=delpm&pm='.$pm['pmid'].'&folder='.$pm['pm_folder'].'">
	Delete
	</a>
	</div>
	<img src="'.$theme['images'].'postedon.png">&nbsp;'.$pm['pm_time'].'
	
	</td>
	</tr>
	';
	
	
	//The PM Sender Info
	echo '<tr>
	<td class="pmsenderinfo" valign="top">';
	
	if(!empty($pm['avatarurl'])){
	
		echo '<img src="'.$pm['avatarurl'][0].'" width="'.$pm['avatarurl'][1].'" height="'.$pm['avatarurl'][2].'" /><br />';
		
	}
	
	echo '<div class="pisub">Group: '.$pm['mem_gr_name'].'<br />';
	
	//If the user group has some images as per Group
	if($pm['image_count']){
	
		for($i = 0; $i < $pm['image_count']; $i++){
			echo '<img src="'.$theme['images'].$pm['image_name'].'">';
		}
		
		echo '</div>';
		
	}
	
	echo '
	'.(!empty($pm['post_gr_name']) ? '<div class="pisub">Post Group: '.$pm['post_gr_name'].'</div>':'').'
	'.(!empty($pm['posts']) ? '<div class="pisub">Posts: '.$pm['posts'].'</div>':'').'	
	<div class="pisub">Status: '.($pm['status'] ? '<img src="'.$theme['images'].'online.png" title="Online" />' : '<img src="'.$theme['images'].'offline.png" title="Offline" />').'</div>
	'.( (empty($pm['users_text'])) ? '' : '<br />'.$pm['users_text'] ).'
	</td>
	<td class="pm" align="left" valign="top">
	'.$pm['pm_body'];
	
	if(!empty($pm['sig'])){
	
		echo '<br /><br />-----------------------<br />'.$pm['sig'];
	
	}
	
	echo '</td>
	</tr>';
	
	echo '<tr>
	<td class="ptip">
	&nbsp;
	</td>
	<td class="specialrow">
	<a href="'.$globals['index_url'].'mid='.$pm['id'].'"><img src="'.$theme['images'].'profile.gif" title="View the profile of '.$pm['sender'].'" /></a>
	
	'.(!empty($pm['email']) ? '<a href="mailto:'.$pm['email'].'"><img src="'.$theme['images'].'email.gif" title="Send a email '.$pm['sender'].'" /></a>' : '').'
	
	'.($logged_in ? '<a href="'.$globals['index_url'].'act=usercp&ucpact=writepm&to='.$pm['id'].'"><img src="'.$theme['images'].'pmuser.gif" title="Send a PM '.$pm['sender'].'" /></a>' : '').'
	
	'.(!empty($pm['www']) ? '<a href="'.$pm['www'].'" target="_blank"><img src="'.$theme['images'].'www.gif" title="Visit the website of '.$pm['sender'].'" /></a>' : '').'
	
	'.(!empty($pm['msn']) ? '<a href="http://members.msn.com/'.$pm['msn'].'" target="_blank"><img src="'.$theme['images'].'msn.gif" title="View the MSN profile of '.$pm['sender'].'" /></a>' : '').'
	
	'.(!empty($pm['aim']) ? '<a href="aim:goim?screenname='.$pm['aim'].'&message=Hello+From+'.$globals['sn'].'" target="_blank"><img src="'.$theme['images'].'aim.gif" title="The AIM username of '.$pm['sender'].' is '.$pm['aim'].'" /></a>' : '').'
	
	'.(!empty($pm['yim']) ? '<a href="http://edit.yahoo.com/config/send_webmesg?.target='.$pm['yim'].'&.src=pg" target="_blank"><img src="'.$theme['images'].'yim.gif" title="The YIM identity of '.$pm['sender'].' is '.$pm['yim'].'" /></a>' : '').'
	
	</td>
	</tr>';

	
	//End of the table
	echo '</table>
</td>
</tr>

<tr>
<td><img src="'.$theme['images'].'cbotsmall.png" width="100%" height="10"></td>
</tr>
</table>';
	
	//The global User CP Footers
	usercpfoot();


}



function prunepm_theme(){

global $theme, $user, $globals, $error, $foldercount;

	//The global User CP Headers
	usercphead();
	
	error_handle($error);


	?>
	
<form action=""  method="post" name="prunepmform">

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td>
<table width="100%" cellpadding="0" cellspacing="0"><tr>
<td class="ucpcbgl"></td>
<td class="ucpcbg">Prune Personal Messages</td>
<td class="ucpcbgr"></td>		
</tr>
</table>
</td>
</tr>

<tr>
<td class="cbgbor">

<table width="100%" cellpadding="1" cellspacing="1">
	
	<tr>
	<td class="ucpfcbg1" colspan="2" align="center">
	<img src="<?php echo $theme['images'];?>usercp/bin.gif" />
	</td>
	</tr>
	
	<tr>
	<td width="25%" class="ucpfrc"><b>Select Folder</b><br />
	<font class="ucpfexp">Select the folder you want to Prune the Messages of.</font></td>
	<td class="ucpflc">
	<select name="prunefolder">
	<option value="0">Inbox(<?php echo $foldercount[0];?>)</option>
	<option value="1">Sent Items(<?php echo $foldercount[1];?>)</option>
	<option value="2">Drafts(<?php echo $foldercount[2];?>)</option>
	<option value="3">All Folders(<?php echo $user['pm'];?>)</option>
	</select>
	</td>
	</tr>
	
	<tr>
	<td width="25%" class="ucpfrc"><b>Older Than</b><br />
	<font class="ucpfexp">Specify the Number of Days from today to Delete Messages Older than that.
	</font></td>
	<td class="ucpflc"><input type="text" size="10" maxlength="50" name="prunedays" /> Days</td>
	</tr>
	
	<tr>
	<td class="ucpflc" colspan="2" align="center">
	<input type="submit" name="prunesubmit" value="Prune" />
	</td>
	</tr>
	
</table>

</td>
</tr>

<tr>
<td><img src="<?php echo $theme['images'];?>cbotsmall.png" width="100%" height="10"></td>
</tr>
</table>

</form>
	
	<?php

	//The global User CP Footers
	usercpfoot();


}



function emptyfolders_theme(){

global $theme, $user, $globals, $error, $foldercount;

	//The global User CP Headers
	usercphead();
	
	error_handle($error);

	?>
	
<form action=""  method="post" name="emptyfolderform">

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td>
<table width="100%" cellpadding="0" cellspacing="0"><tr>
<td class="ucpcbgl"></td>
<td class="ucpcbg">Empty Folder</td>
<td class="ucpcbgr"></td>		
</tr>
</table>
</td>
</tr>

<tr>
<td class="cbgbor">

<table width="100%" cellpadding="1" cellspacing="1">
	
	<tr>
	<td class="ucpfcbg1" colspan="3" align="center">
	<img src="<?php echo $theme['images'];?>usercp/bin.gif" />
	</td>
	</tr>
	
	<tr>
	<td class="ucpcbg1" align="left">&nbsp;
	
	</td>
	<td class="ucpcbg1" align="left">
	Folder Name
	</td>
	<td class="ucpcbg1" align="left">
	Number of PM's
	</td>
	</tr>
	
	<tr>
	<td class="ucpflc" align="center">
	<input type="checkbox" name="emptyinbox" />
	</td>
	<td class="ucpflc" align="center">
	<b>Inbox</b>
	</td>
	<td class="ucpflc" align="center">
	<b><?php echo $foldercount[0];?></b>
	</td>
	</tr>
	
	<tr>
	<td class="ucpflc" align="center">
	<input type="checkbox" name="emptysentitems" />
	</td>
	<td class="ucpflc" align="center">
	<b>Sent Items</b>
	</td>
	<td class="ucpflc" align="center">
	<b><?php echo $foldercount[1];?></b>
	</td>
	</tr>
	
	<tr>
	<td class="ucpflc" align="center">
	<input type="checkbox" name="emptydrafts" />
	</td>
	<td class="ucpflc" align="center">
	<b>Drafts</b>
	</td>
	<td class="ucpflc" align="center">
	<b><?php echo $foldercount[2];?></b>
	</td>
	</tr>
	
	<tr>
	<td class="ucpflc" colspan="3" align="center">
	<input type="submit" name="emptyfoldersubmit" value="Empty Selected" />
	</td>
	</tr>
	
</table>

</td>
</tr>

<tr>
<td><img src="<?php echo $theme['images'];?>cbotsmall.png" width="100%" height="10"></td>
</tr>
</table>


</form>
	
	<?php

	//The global User CP Footers
	usercpfoot();


}

?>