<?php

if(!defined('AEF'))
{
die('Hacking Attempt');
}


function regset_theme(){

global $globals, $theme, $error;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Registration Settings');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/users.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Registration Settings</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	This is the place for changing the registration settings for the new members.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="regsetform">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Registration Settings
		</td>
		</tr>
	
		<tr>
		<td width="35%" class="adbg">
		<b>New Registrations:</b><br />
		<font class="adexp">Should new registrations be allowed ?</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="allow_reg"	<?php echo ($globals['allow_reg'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Registration Method:</b><br />
		<font class="adexp">Choose the registration method</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;
		<select name="reg_method">
		<option value="1" <?php echo (isset($_POST['reg_method']) && $_POST['reg_method'] == 1 ? 'selected="selected"' : ($globals['reg_method'] == 1 ? 'selected="selected"' : '' ));?> >Immediate</option>
		<option value="2" <?php echo (isset($_POST['reg_method']) && $_POST['reg_method'] == 2 ? 'selected="selected"' : ($globals['reg_method'] == 2 ? 'selected="selected"' : '' ));?> >Email Validation</option>
		<option value="3" <?php echo (isset($_POST['reg_method']) && $_POST['reg_method'] == 3 ? 'selected="selected"' : ($globals['reg_method'] == 3 ? 'selected="selected"' : '' ));?> >By Admins</option>
		</select>
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Welcome Email:</b><br />
		<font class="adexp">Send a welcome email to the registered members.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="wel_email"	<?php echo ($globals['wel_email'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Notify Admin</b><br />
		<font class="adexp">Notify the Admin on new registration. </font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="reg_notify" <?php echo ($globals['reg_notify'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Max Username Length</b><br />
		<font class="adexp">Maximum length of a username.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="max_uname" value="<?php echo (empty($_POST['max_uname']) ? $globals['max_uname'] : $_POST['max_uname']);?>" />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Min Username Length</b><br />
		<font class="adexp">Minimum length of a username.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="min_uname" value="<?php echo (empty($_POST['min_uname']) ? $globals['min_uname'] : $_POST['min_uname']);?>" />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Max Password Length</b><br />
		<font class="adexp">Maximum length of a users password.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="max_pass" value="<?php echo (empty($_POST['max_pass']) ? $globals['max_pass'] : $_POST['max_pass']);?>" />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Min Password Length</b><br />
		<font class="adexp">Minimum length of a users password.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="min_pass" value="<?php echo (empty($_POST['min_pass']) ? $globals['min_pass'] : $_POST['min_pass']);?>" />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Confirmation Code</b><br />
		<font class="adexp">Should the security confirmation code be enabled.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="sec_conf" <?php echo ($globals['sec_conf'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Same PC Registrations</b><br />
		<font class="adexp">Should Registrations from the same compter be allowed.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="samepc_reg" <?php echo ($globals['samepc_reg'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
	</table>
	
	<br /><br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="editregset" value="Submit" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}


function agerest_theme(){

global $globals, $theme, $error;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Age Restrictions');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/users.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Age Restriction Settings</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	Here you can set a age limit for new members.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="agerestform">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Age Restriction Settings
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Age :</b><br />
		<font class="adexp">Age below which restrictions are applicable.<br />
		Enter 0(zero) to disable.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="age_limit" value="<?php echo (empty($_POST['v']) ? $globals['age_limit'] : $_POST['age_limit']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Action :</b><br />
		<font class="adexp">What to do if the applicants age is below the required age ?</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;
		<select name="age_rest_act">
		<option value="1" <?php echo (isset($_POST['age_rest_act']) && $_POST['age_rest_act'] == 1 ? 'selected="selected"' : '');?> >Reject Registration</option>
		<option value="2" <?php echo (isset($_POST['age_rest_act']) && $_POST['age_rest_act'] == 2 ? 'selected="selected"' : '');?> >Require Parent/Guardian Consent</option>
		</select>
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Address :</b><br />
		<font class="adexp">Address to which the Parental approval/consent is to be send.</font>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<textarea name="age_rest_act_address" cols="45" rows="6"><?php echo (empty($_POST['age_rest_act_address']) ? $globals['age_rest_act_address'] : $_POST['age_rest_act_address']);?></textarea>
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Fax :</b><br />
		<font class="adexp">Fax Number to which the Parental approval/consent is to be send.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="age_rest_act_fax" value="<?php echo (empty($_POST['age_rest_act_fax']) ? $globals['age_rest_act_fax'] : $_POST['age_rest_act_fax']);?>" />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Telephone :</b><br />
		<font class="adexp">Telephone Number for parents to contact for age restriction queries.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="age_rest_act_tele" value="<?php echo (empty($_POST['age_rest_act_tele']) ? $globals['age_rest_act_tele'] : $_POST['age_rest_act_tele']);?>" />
		</td>
		</tr>
		
	</table>
	
	<br /><br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="editagerestset" value="Submit" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}


function reserved_theme(){

global $globals, $theme, $error;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Set Reserved Names');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/users.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Set Reserved Names</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	Here you can set reserved usernames that can be used by members while registering.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="reservedform">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Set Reserved Names
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Reserved Names :</b><br />
		<font class="adexp">Enter the names that you would like to reserve.
		(One reserved word per line)</font>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<textarea name="reserved_names" cols="45" rows="6"><?php echo (empty($_POST['reserved_names']) ? $globals['reserved_names'] : $_POST['reserved_names']);?></textarea>
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Match Whole Words:</b><br />
		<font class="adexp">This will match 'admin' in 'admin' only and not in 'myadmin'.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="reserved_match_whole"	<?php echo ($globals['reserved_match_whole'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Case Insensitive Match:</b><br />
		<font class="adexp">This will match 'admin' in 'Admin' or 'ADMIN'.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="reserved_match_insensitive"	<?php echo ($globals['reserved_match_insensitive'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
	</table>
	
	<br /><br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="editreserved" value="Submit" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}


function logset_theme(){

global $globals, $theme, $error;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Log In Settings');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/users.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Log In Settings</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	Here you can set reserved usernames that can be used by members while registering.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="logsetform">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Log In Settings
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Login Attempts :</b><br />
		<font class="adexp">The max number of failed login attempts from a particular IP address.</font>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" size="30"  name="login_failed" value="<?php echo (empty($_POST['login_failed']) ? $globals['login_failed'] : $_POST['login_failed']);?>" />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Anonymous Login:</b><br />
		<font class="adexp">Allow users to sign in anonymously.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="anon_login" <?php echo ($globals['anon_login'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Security Code:</b><br />
		<font class="adexp">Show the user for security confirmation code when using the 'Forgot Password' or 'Forgot Username' feature. (Recommended)</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="fpass_sec_conf" <?php echo ($globals['fpass_sec_conf'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Smart Redirect:</b><br />
		<font class="adexp">If a guest browsing any forum page logs in then the user will be redirected to the previous page.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="smart_redirect" <?php echo ($globals['smart_redirect'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
	</table>
	
	<br /><br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="editlogset" value="Submit" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}

?>