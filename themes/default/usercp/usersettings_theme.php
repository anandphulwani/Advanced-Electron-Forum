<?php

function emailpmset_theme(){

global $theme, $user, $globals, $error;

	//The global User CP Headers
	usercphead();
	
	error_handle($error);

	?>

<form action="" method="post" name="emailpmset">

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td>
<table width="100%" cellpadding="0" cellspacing="0"><tr>
<td class="ucpcbgl"></td>
<td class="ucpcbg">Email &amp; PM Preferences</td>
<td class="ucpcbgr"></td>		
</tr>
</table>
</td>
</tr>

<tr>
<td class="cbgbor">

<table width="100%" cellpadding="2" cellspacing="1">
	
	<tr>
	<td class="ucpfcbg1" colspan="2" align="center">
	<img src="<?php echo $theme['images'];?>usercp/emailpmsettings.gif" />
	</td>
	</tr>
	
	<tr>
	<td class="ucpcbg1" colspan="2" align="center"><b>Email Settings</b><br />
	</td>
	</tr>
	
	<tr>
	<td class="ucpflc" width="60%"><b>Recieve Email From Admins</b><br />
	<font class="ucpfexp">Recieve Email Notifications from Administrators on important issues, notices, updates etc.</font>
	</td>
	<td class="ucpfrc" align="center">
	<input type="radio" name="adminemail" value="1" <?php echo (($user['adminemail'] == 1) ? 'checked="checked"' : '');?> /> Yes &nbsp;&nbsp;
    <input type="radio" name="adminemail" value="2" <?php echo (($user['adminemail'] == 2) ? 'checked="checked"' : '');?> /> No &nbsp;&nbsp;
    <input type="radio" name="adminemail" value="0" <?php echo (($user['adminemail'] == 0) ? 'checked="checked"' : '');?> /> Default
	</td>
	</tr>
	
	<tr>
	<td class="ucpflc"><b>Hide Email From Members</b><br />
	<font class="ucpfexp">This will hide your email address from other members of the Board.</font>
	</td>
	<td class="ucpfrc" align="center">
    <input type="radio" name="hideemail" value="1" <?php echo (($user['hideemail'] == 1) ? 'checked="checked"' : '');?> /> Yes &nbsp;&nbsp;
    <input type="radio" name="hideemail" value="2" <?php echo (($user['hideemail'] == 2) ? 'checked="checked"' : '');?> /> No &nbsp;&nbsp;
    <input type="radio" name="hideemail" value="0" <?php echo (($user['hideemail'] == 0) ? 'checked="checked"' : '');?> /> Default
	</td>
	</tr>	
	
	<tr>
	<td class="ucpflc"><b>Automatic Subscription</b><br />
	<font class="ucpfexp">Should you subscribe automatically to the topics you start or if you reply to a topic.</font>
	</td>
	<td class="ucpfrc" align="center">
    <input type="radio" name="subscribeauto" value="1" <?php echo (($user['subscribeauto'] == 1) ? 'checked="checked"' : '');?> /> Yes &nbsp;&nbsp;
    <input type="radio" name="subscribeauto" value="2" <?php echo (($user['subscribeauto'] == 2) ? 'checked="checked"' : '');?> /> No &nbsp;&nbsp;
    <input type="radio" name="subscribeauto" value="0" <?php echo (($user['subscribeauto'] == 0) ? 'checked="checked"' : '');?> /> Default
	</td>
	</tr>	
	
	<tr>
	<td class="ucpflc"><b>Send New Reply</b><br />
	<font class="ucpfexp">If you have subscribed to a topic then should the Email Notification include the new post in it.</font>
	</td>
	<td class="ucpfrc" align="center">
    <input type="radio" name="sendnewreply" value="1" <?php echo (($user['sendnewreply'] == 1) ? 'checked="checked"' : '');?> /> Yes &nbsp;&nbsp;
    <input type="radio" name="sendnewreply" value="2" <?php echo (($user['sendnewreply'] == 2) ? 'checked="checked"' : '');?> /> No &nbsp;&nbsp;
    <input type="radio" name="sendnewreply" value="0" <?php echo (($user['sendnewreply'] == 0) ? 'checked="checked"' : '');?> /> Default
	</td>
	</tr>		
	
	<tr>
	<td class="ucpcbg1" colspan="2" align="center"><b>Personal Message Settings</b><br />
	</td>
	</tr>	
	
	<tr>
	<td class="ucpflc"><b>Notify New PM by Email</b><br />
	<font class="ucpfexp">Should new Personal Messages be notified to you by email.</font>
	</td>
	<td class="ucpfrc" align="center">
    <input type="radio" name="pm_email_notify" value="1" <?php echo (($user['pm_email_notify'] == 1) ? 'checked="checked"' : '');?> /> Yes &nbsp;&nbsp;
    <input type="radio" name="pm_email_notify" value="2" <?php echo (($user['pm_email_notify'] == 2) ? 'checked="checked"' : '');?> /> No &nbsp;&nbsp;
    <input type="radio" name="pm_email_notify" value="0" <?php echo (($user['pm_email_notify'] == 0) ? 'checked="checked"' : '');?> /> Default
	</td>
	</tr>	
	
	<tr>
	<td class="ucpflc"><b>Pop-Up Notification of New PM</b><br />
	<font class="ucpfexp">Show me a Pop-Up message on receiving ne PM's.</font>
	</td>
	<td class="ucpfrc" align="center">
    <input type="radio" name="pm_notify" value="1" <?php echo (($user['pm_notify'] == 1) ? 'checked="checked"' : '');?> /> Yes &nbsp;&nbsp;
    <input type="radio" name="pm_notify" value="2" <?php echo (($user['pm_notify'] == 2) ? 'checked="checked"' : '');?> /> No &nbsp;&nbsp;
    <input type="radio" name="pm_notify" value="0" <?php echo (($user['pm_notify'] == 0) ? 'checked="checked"' : '');?> /> Default
	</td>
	</tr>
	
	<tr>
	<td class="ucpflc"><b>Save Every Outgoing PM</b><br />
	<font class="ucpfexp">If enabled a copy of every PM you send will be saved in the Outbox.</font>
	</td>
	<td class="ucpfrc" align="center">
    <input type="radio" name="saveoutgoingpm" value="1" <?php echo (($user['saveoutgoingpm'] == 1) ? 'checked="checked"' : '');?> /> Yes &nbsp;&nbsp;
    <input type="radio" name="saveoutgoingpm" value="2" <?php echo (($user['saveoutgoingpm'] == 2) ? 'checked="checked"' : '');?> /> No &nbsp;&nbsp;
    <input type="radio" name="saveoutgoingpm" value="0" <?php echo (($user['saveoutgoingpm'] == 0) ? 'checked="checked"' : '');?> /> Default
	</td>
	</tr>
	
	<tr>
	<td class="ucpflc" colspan="2" align="center">
	<input type="submit" name="editemailpmset" value="Save Changes" />
	<input type="submit" name="defaultemailpmset" value="Use Default" />
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


function forumset_theme(){

global $theme, $user, $globals, $error, $themes, $lang_folders;

	//The global User CP Headers
	usercphead();
	
	error_handle($error);

	?>

<form action="" method="post" name="forumset">

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td>
<table width="100%" cellpadding="0" cellspacing="0"><tr>
<td class="ucpcbgl"></td>
<td class="ucpcbg">Board Preferences</td>
<td class="ucpcbgr"></td>		
</tr>
</table>
</td>
</tr>

<tr>
<td class="cbgbor">

<table width="100%" cellpadding="2" cellspacing="1">
	
	<tr>
	<td class="ucpfcbg1" colspan="2" align="center">
	<img src="<?php echo $theme['images'];?>usercp/boardsettings.gif" />
	</td>
	</tr>	
	
	<tr>
	<td class="ucpflc" width="60%"><b>User Theme</b><br />
	<font class="ucpfexp">Choose the theme that you want to use.</font>
	</td>
	<td class="ucpfrc" align="center">
<script type="text/javascript">
function preview_theme(id){
	redirect_url = '<?php echo $globals['url'].'/index.php?'.getallGET(array('thid'));?>';
	thid = $(id).value;
	if(thid != 0){		
		window.location = redirect_url+'&thid='+thid;
	}
}
</script>
	<select name="user_theme" id="themeselector" >		
	<?php
	
	echo '<option value="0" '.((isset($_POST['user_theme']) && (int)trim($_POST['user_theme']) == 0) ? 'selected="selected"' : ($user['user_theme'] == 0 ? 'selected="selected"' : '' ) ).' >Use Board Default</option>';
	
	foreach($themes as $tk => $tv){
	
		echo '<option value="'.$themes[$tk]['thid'].'" '.((isset($_POST['user_theme']) && (int)trim($_POST['user_theme']) == $themes[$tk]['thid']) ? 'selected="selected"' : ($user['user_theme'] == $themes[$tk]['thid'] ? 'selected="selected"' : '' ) ).' >'.$themes[$tk]['th_name'].'</option>';
	
	}
	
	?>
	</select>&nbsp;&nbsp;&nbsp;
	<a href="javascript:preview_theme('themeselector')"><b>Preview</b></a>
	</td>
	</tr>	
	
    <tr>
	<td class="ucpflc"><b>Language :</b><br />
	<font class="ucpfexp">Choose the language you want to use on this board.</font>
	</td>
	<td class="ucpfrc">
	&nbsp;&nbsp;&nbsp;<select name="language" />
	<?php
    
    foreach($lang_folders as $k => $v){

        echo '<option value="'.$v.'" '.(empty($_POST['language']) && $user['language'] == $v ? 'selected="selected"' : (trim($_POST['language']) == $v ? 'selected="selected"' : '') ).'>'.ucfirst($v).'</option>';
        
    }
    
    ?>
    </select>
	</td>
	</tr>
    
	<tr>
	<td class="ucpflc"><b>Show Sigs</b><br />
	<font class="ucpfexp">Show me the Signatures in Posts and PM's.</font>
	</td>
	<td class="ucpfrc" align="center">
    <input type="radio" name="showsigs" value="1" <?php echo (($user['showsigs'] == 1) ? 'checked="checked"' : '');?> /> Yes &nbsp;&nbsp;
    <input type="radio" name="showsigs" value="2" <?php echo (($user['showsigs'] == 2) ? 'checked="checked"' : '');?> /> No &nbsp;&nbsp;
    <input type="radio" name="showsigs" value="0" <?php echo (($user['showsigs'] == 0) ? 'checked="checked"' : '');?> /> Default
	</td>
	</tr>
	
	<tr>
	<td class="ucpflc"><b>Show Avatars</b><br />
	<font class="ucpfexp">Show me the Avatars in Posts and PM's.</font>
	</td>
	<td class="ucpfrc" align="center">
    <input type="radio" name="showavatars" value="1" <?php echo (($user['showavatars'] == 1) ? 'checked="checked"' : '');?> /> Yes &nbsp;&nbsp;
    <input type="radio" name="showavatars" value="2" <?php echo (($user['showavatars'] == 2) ? 'checked="checked"' : '');?> /> No &nbsp;&nbsp;
    <input type="radio" name="showavatars" value="0" <?php echo (($user['showavatars'] == 0) ? 'checked="checked"' : '');?> /> Default
	</td>
	</tr>	
	
	<tr>
	<td class="ucpflc"><b>Show Smileys</b><br />
	<font class="ucpfexp">Show me the Smiley images in Posts and PM's.</font>
	</td>
	<td class="ucpfrc" align="center">
    <input type="radio" name="showsmileys" value="1" <?php echo (($user['showsmileys'] == 1) ? 'checked="checked"' : '');?> /> Yes &nbsp;&nbsp;
    <input type="radio" name="showsmileys" value="2" <?php echo (($user['showsmileys'] == 2) ? 'checked="checked"' : '');?> /> No &nbsp;&nbsp;
    <input type="radio" name="showsmileys" value="0" <?php echo (($user['showsmileys'] == 0) ? 'checked="checked"' : '');?> /> Default
	</td>
	</tr>	
	
	<tr>
	<td class="ucpflc"><b>Fast Reply</b><br />
	<font class="ucpfexp">If fast reply is enabled then show the fast reply ON or OFF by default.</font>
	</td>
	<td class="ucpfrc" align="center">
    <input type="radio" name="autofastreply" value="1" <?php echo (($user['autofastreply'] == 1) ? 'checked="checked"' : '');?> /> Yes &nbsp;&nbsp;
    <input type="radio" name="autofastreply" value="2" <?php echo (($user['autofastreply'] == 2) ? 'checked="checked"' : '');?> /> No &nbsp;&nbsp;
    <input type="radio" name="autofastreply" value="0" <?php echo (($user['autofastreply'] == 0) ? 'checked="checked"' : '');?> /> Default
	</td>
	</tr>		
	
	<tr>
	<td class="ucpflc"><b>Show Images</b><br />
	<font class="ucpfexp">Show me the Images images in Posts and PM's.</font>
	</td>
	<td class="ucpfrc" align="center">
    <input type="radio" name="showimgs" value="1" <?php echo (($user['showimgs'] == 1) ? 'checked="checked"' : '');?> /> Yes &nbsp;&nbsp;
    <input type="radio" name="showimgs" value="2" <?php echo (($user['showimgs'] == 2) ? 'checked="checked"' : '');?> /> No &nbsp;&nbsp;
    <input type="radio" name="showimgs" value="0" <?php echo (($user['showimgs'] == 0) ? 'checked="checked"' : '');?> /> Default
	</td>
	</tr>
	
	<tr>
	<td class="ucpflc"><b>Anonymous Status</b><br />
	<font class="ucpfexp">On sign-in what should your anonymous status be.</font>
	</td>
	<td class="ucpfrc" align="center">
    <input type="radio" name="i_am_anon" value="1" <?php echo (($user['i_am_anon'] == 1) ? 'checked="checked"' : '');?> /> Yes &nbsp;&nbsp;
    <input type="radio" name="i_am_anon" value="2" <?php echo (($user['i_am_anon'] == 2) ? 'checked="checked"' : '');?> /> No &nbsp;&nbsp;
    <input type="radio" name="i_am_anon" value="0" <?php echo (($user['i_am_anon'] == 0) ? 'checked="checked"' : '');?> /> Default
	</td>
	</tr>
	
    <tr>
	<td class="ucpflc" colspan="2" align="center">
	<b>Time Zone:</b> <select name="timezone" style="font-size:11px">
		<option value="-12" <?php echo (($user['timezone'] == -12) ? 'selected="selected"' : '');?> >(GMT -12:00) Eniwetok, Kwajalein</option>
		<option value="-11" <?php echo (($user['timezone'] == -11) ? 'selected="selected"' : '');?> >(GMT -11:00) Midway Island, Samoa</option>
		<option value="-10" <?php echo (($user['timezone'] == -10) ? 'selected="selected"' : '');?> >(GMT -10:00) Hawaii</option>
		<option value="-9" <?php echo (($user['timezone'] == -9) ? 'selected="selected"' : '');?> >(GMT -9:00) Alaska</option>
		<option value="-8" <?php echo (($user['timezone'] == -8) ? 'selected="selected"' : '');?> >(GMT -8:00) Pacific Time (US &amp; Canada)</option>
		<option value="-7" <?php echo (($user['timezone'] == -7) ? 'selected="selected"' : '');?> >(GMT -7:00) Mountain Time (US &amp; Canada)</option>
		<option value="-6" <?php echo (($user['timezone'] == -6) ? 'selected="selected"' : '');?> >(GMT -6:00) Central Time (US &amp; Canada), Mexico City</option>
		<option value="-5" <?php echo (($user['timezone'] == -5) ? 'selected="selected"' : '');?> >(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima</option>
		<option value="-4" <?php echo (($user['timezone'] == -4) ? 'selected="selected"' : '');?> >(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz</option>
		<option value="-3.5" <?php echo (($user['timezone'] == -3.5) ? 'selected="selected"' : '');?> >(GMT -3:30) Newfoundland</option>
		<option value="-3" <?php echo (($user['timezone'] == -3) ? 'selected="selected"' : '');?> >(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
		<option value="-2" <?php echo (($user['timezone'] == -2) ? 'selected="selected"' : '');?> >(GMT -2:00) Mid-Atlantic</option>
		<option value="-1" <?php echo (($user['timezone'] == -1) ? 'selected="selected"' : '');?> >(GMT -1:00 hour) Azores, Cape Verde Islands</option>
		<option value="0" <?php echo (($user['timezone'] == 0) ? 'selected="selected"' : '');?> >(GMT) Western Europe Time, London, Lisbon, Casablanca</option>
		<option value="1" <?php echo (($user['timezone'] == 1) ? 'selected="selected"' : '');?> >(GMT +1:00 hour) Brussels, Copenhagen, Madrid, Paris</option>
		<option value="2" <?php echo (($user['timezone'] == 2) ? 'selected="selected"' : '');?> >(GMT +2:00) Kaliningrad, South Africa</option>
		<option value="3" <?php echo (($user['timezone'] == 3) ? 'selected="selected"' : '');?> >(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
		<option value="3.5" <?php echo (($user['timezone'] == 3.5) ? 'selected="selected"' : '');?> >(GMT +3:30) Tehran</option>
		<option value="4" <?php echo (($user['timezone'] == 4) ? 'selected="selected"' : '');?> >(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
		<option value="4.5" <?php echo (($user['timezone'] == 4.5) ? 'selected="selected"' : '');?> >(GMT +4:30) Kabul</option>
		<option value="5" <?php echo (($user['timezone'] == 5) ? 'selected="selected"' : '');?> >(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
		<option value="5.5" <?php echo (($user['timezone'] == 5.5) ? 'selected="selected"' : '');?> >(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option>
		<option value="6" <?php echo (($user['timezone'] == 6) ? 'selected="selected"' : '');?> >(GMT +6:00) Almaty, Dhaka, Colombo</option>
		<option value="7" <?php echo (($user['timezone'] == 7) ? 'selected="selected"' : '');?> >(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
		<option value="8" <?php echo (($user['timezone'] == 8) ? 'selected="selected"' : '');?> >(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
		<option value="9" <?php echo (($user['timezone'] == 9) ? 'selected="selected"' : '');?> >(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
		<option value="9.5" <?php echo (($user['timezone'] == 9.5) ? 'selected="selected"' : '');?> >(GMT +9:30) Adelaide, Darwin</option>
		<option value="10" <?php echo (($user['timezone'] == 10) ? 'selected="selected"' : '');?> >(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
		<option value="11" <?php echo (($user['timezone'] == 11) ? 'selected="selected"' : '');?> >(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option>
		<option value="12" <?php echo (($user['timezone'] == 12) ? 'selected="selected"' : '');?> >(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
	</select>
	</td>
	</tr>
    
	<tr>
	<td class="ucpflc" colspan="2" align="center">
	<input type="submit" name="editforumset" value="Save Changes" />
	<input type="submit" name="defaultforumset" value="Use Default" />
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


function themeset_theme(){

global $globals, $theme, $error, $themes, $theme_registry, $onload;
	
	//Admin Headers includes Global Headers
	usercphead('User Theme Settings');
	
	error_handle($error);

if(!empty($theme_registry)){

?>

<form action="" method="post" name="themeset">
<script language="JavaScript" src="<?php echo $theme['url'].'/js/tabber.js';?>" type="text/javascript">
</script>
<script type="text/javascript">
tabs = new tabber;
tabs.tabs = new Array('<?php echo implode('\', \'', array_keys($theme_registry));?>');
tabs.tabwindows = new Array('<?php echo implode('_win\', \'', array_keys($theme_registry));?>_win');
addonload('tabs.init();');
</script>
    
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td>
<table width="100%" cellpadding="0" cellspacing="0"><tr>
<td class="ucpcbgl"></td>
<td class="ucpcbg">Theme Settings</td>
<td class="ucpcbgr"></td>		
</tr>
</table>
</td>
</tr>

<tr>
<td class="cbgbor">

    <table width="100%" cellpadding="2" cellspacing="1">
    
    <tr>
    <td class="ucpflc">
<?php

$categories = array_keys($theme_registry);

foreach($categories as $c){

	echo '<a href="javascript:tabs.tab(\''.$c.'\')" class="tab" id="'.$c.'"><b>'.ucfirst($c).'</b></a>';

}

?>
</td>
</tr>

<tr>
<td style="padding:0px;">
<?php

foreach($theme_registry as $ck => $cv){

echo '<table width="100%" cellpadding="2" cellspacing="1" class="cbgbor" id="'.$ck.'_win">';

foreach($theme_registry[$ck] as $k => $v){
	
echo '<tr>
	<td width="40%" class="ucpflc">
	<b>'.$theme_registry[$ck][$k]['shortexp'].'</b>
	'.(empty($theme_registry[$ck][$k]['exp']) ? '' : '<br />
	<font class="adexp">'.$theme_registry[$ck][$k]['exp'].'</font>').'
	</td>
	<td class="ucpflc" align="left">        
	&nbsp;&nbsp;&nbsp;&nbsp;'.call_user_func_array('html_'.$theme_registry[$ck][$k]['type'], array($k, $theme_registry[$ck][$k]['value'])).'
	</td>
	</tr>';
		
	}
	
echo '</table>';

}

?>
    </td>
    </tr>

    <tr>
    <td align="center" class="ucpflc">
    <input type="submit" name="editthemeset" value="Edit Settings" />
    <input type="submit" name="defaultthemeset" value="Use Default" />
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
	
		echo '<br /><br /><table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="left" class="ucpflc">
		Sorry, it seems that there are no user settings present in this theme.
		</td>
		</tr>	
	</table>';
	
	}
	
	usercpfoot();
	
}



function html_text($name, $default){

return '<input type="text" name="'.$name.'" value="'.(empty($_POST[$name]) ? $default : $_POST[$name]).'" size="40" />';

}

function html_checkbox($name, $default){

return '<input type="checkbox" name="'.$name.'" '.(empty($_POST[$name]) ? (empty($default) ? '' : 'checked="checked"') : 'checked="checked"').' />';

}

function html_textarea($name, $default){

return '<textarea name="'.$name.'">'.(empty($_POST[$name]) ? $default : $_POST[$name]).'</textarea>';

}

?>