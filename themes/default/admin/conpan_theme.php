<?php

//////////////////////////////////////////////////////////////
//===========================================================
// conpan_theme.php(Admin)
//===========================================================
// AEF : Advanced Electron Forum 
// Version : 1.0.6
// Inspired by Pulkit and taken over by Electron
// ----------------------------------------------------------
// Started by: Electron, Ronak Gupta, Pulkit Gupta
// Date:       23rd Jan 2006
// Time:       15:00 hrs
// Site:       http://www.anelectron.com/ (Anelectron)
// ----------------------------------------------------------
// Please Read the Terms of use at http://www.anelectron.com
// ----------------------------------------------------------
//===========================================================
// (c)Electron Inc.
//===========================================================
//////////////////////////////////////////////////////////////

if(!defined('AEF')){
die('Hacking Attempt');
}


function coreset_theme(){

global $globals, $theme, $l, $error;
	
	//Admin Headers includes Global Headers
	adminhead($l['cp_core_set']);
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/controlpanel.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen"><?php echo $l['core_set'];?></font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	<?php echo $l['core_set_exp'];?>
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="coresetform">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		<?php echo $l['core_set'];?>
		</td>
		</tr>
	
		<tr>
		<td width="45%" class="adbg">
		<b><?php echo $l['board_url'];?></b><br />
		<font class="adexp"><?php echo $l['board_url_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="url" value="<?php echo (empty($_POST['url']) ? $globals['url'] : $_POST['url']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['site_name'];?></b><br />
		<font class="adexp"><?php echo $l['site_name_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="sn" value="<?php echo (empty($_POST['sn']) ? $globals['sn'] : $_POST['sn']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['board_email'];?></b><br />
		<font class="adexp"><?php echo $l['board_email_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="board_email" value="<?php echo (empty($_POST['board_email']) ? $globals['board_email'] : $_POST['board_email']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['aef_folder'];?></b><br />
		<font class="adexp"><?php echo $l['aef_folder_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="server_url" value="<?php echo (empty($_POST['server_url']) ? $globals['server_url'] : $_POST['server_url']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['aef_main_files'];?></b><br />
		<font class="adexp"><?php echo $l['aef_main_files_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="mainfiles" value="<?php echo (empty($_POST['mainfiles']) ? $globals['mainfiles'] : $_POST['mainfiles']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['themes_folder'];?></b><br />
		<font class="adexp"><?php echo $l['themes_folder_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="themesdir" value="<?php echo (empty($_POST['themesdir']) ? $globals['themesdir'] : $_POST['themesdir']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['cookie_name'];?></b><br />
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="cookie_name" value="<?php echo (empty($_POST['cookie_name']) ? $globals['cookie_name'] : $_POST['cookie_name']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['compress_output'];?></b><br />
		<font class="adexp"><?php echo $l['compress_output_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="gzip" <?php echo ($globals['gzip'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>

	</table>
	
	<br /><br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="editcoreset" value="<?php echo $l['submit'];?>" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}


function mysqlset_theme(){

global $globals, $theme, $l, $error;
	
	//Admin Headers includes Global Headers
	adminhead($l['cp_mysql']);
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/controlpanel.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen"><?php echo $l['mysql_set'];?></font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	<?php echo $l['mysql_set_exp'];?>
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="mysqlsetform">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		<?php echo $l['mysql_set'];?>
		</td>
		</tr>
	
		<tr>
		<td width="45%" class="adbg">
		<b><?php echo $l['server'];?></b><br />
		<font class="adexp"><?php echo $l['server_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="server" value="<?php echo (empty($_POST['server']) ? $globals['server'] : $_POST['server']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['mysql_user'];?></b><br />
		<font class="adexp"><?php echo $l['mysql_user_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="user" value="<?php echo (empty($_POST['user']) ? $globals['user'] : $_POST['user']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['mysql_pass'];?></b><br />
		<font class="adexp"><?php echo $l['mysql_pass_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" size="40"  name="password" value="<?php echo (empty($_POST['password']) ? $globals['password'] : $_POST['password']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['mysql_database'];?></b><br />
		<font class="adexp"><?php echo $l['mysql_database_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="database" value="<?php echo (empty($_POST['database']) ? $globals['database'] : $_POST['database']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['mysql_prefix'];?></b><br />
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="dbprefix" value="<?php echo (empty($_POST['dbprefix']) ? $globals['dbprefix'] : $_POST['dbprefix']);?>" />
		</td>
		</tr>
		
	</table>
	
	<br /><br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="editmysqlset" value="Submit" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}


function onoff_theme(){

global $globals, $theme, $l, $error;
	
	//Admin Headers includes Global Headers
	adminhead($l['cp_on_off']);
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/controlpanel.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen"><?php echo $l['board_on_off'];?></font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	<?php echo $l['board_on_off_exp'];?>
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="onoffform">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		<?php echo $l['board_on_off'];?>
		</td>
		</tr>
		
		<tr>
		<td width="45%" class="adbg">
		<b><?php echo $l['turn_board_off'];?></b><br />
		<font class="adexp"><?php echo $l['turn_board_off_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="maintenance"	<?php echo ($globals['maintenance'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['maintenance_subject'];?></b>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="maintenance_subject" value="<?php echo (empty($_POST['maintenance_subject']) ? $globals['maintenance_subject'] : $_POST['maintenance_subject']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['maintenance_message'];?></b>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<textarea cols="40" rows="6" name="maintenance_message" ><?php echo (empty($_POST['maintenance_message']) ? $globals['maintenance_message'] : $_POST['maintenance_message']);?></textarea>
		</td>
		</tr>
		
		
		
	</table>
	
	<br /><br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="editonoff" value="<?php echo $l['submit'];?>" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}


//Board mail settings
function mailset_theme(){

global $globals, $theme, $l, $error;
	
	//Admin Headers includes Global Headers
	adminhead($l['cp_mail_set']);
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/controlpanel.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen"><?php echo $l['mail_set'];?></font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	<?php echo $l['mail_set_exp'];?>
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="mailsetform">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		<?php echo $l['mail_set'];?>
		</td>
		</tr>
		
		<tr>
		<td width="45%" class="adbg">
		<b><?php echo $l['mail_delivery_method'];?></b><br />
		<font class="adexp"><?php echo $l['mail_delivery_method_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<select name="mail">
		<option value="1" <?php echo (isset($_POST['mail']) && $_POST['mail'] == 1 ? 'selected="selected"' : ($globals['mail'] == 1 ? 'selected="selected"' : '' ));?> ><?php echo $l['php_mail'];?></option>
		<option value="0" <?php echo (isset($_POST['mail']) && $_POST['mail'] == 0 ? 'selected="selected"' : ($globals['mail'] == 0 ? 'selected="selected"' : '' ));?> ><?php echo $l['smtp'];?></option>
		</select>
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['smtp_server'];?></b>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="mail_server" value="<?php echo (empty($_POST['mail_server']) ? $globals['mail_server'] : $_POST['mail_server']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['smtp_port'];?></b>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="mail_port" value="<?php echo (empty($_POST['mail_port']) ? $globals['mail_port'] : $_POST['mail_port']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['smtp_username'];?></b>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="mail_user" value="<?php echo (empty($_POST['mail_user']) ? $globals['mail_user'] : $_POST['mail_user']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['smtp_pass'];?></b>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="mail_pass" value="<?php echo (empty($_POST['mail_pass']) ? $globals['mail_pass'] : $_POST['mail_pass']);?>" />
		</td>
		</tr>
		
	</table>
	
	<br /><br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="editmailset" value="<?php echo $l['submit'];?>" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}


//Board General settings
function genset_theme(){

global $globals, $theme, $error, $lang_folders, $l;
	
	//Admin Headers includes Global Headers
	adminhead($l['cp_gen_set']);
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/controlpanel.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen"><?php echo $l['gen_set'];?></font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	<?php echo $l['gen_set_exp'];?>
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="gensetform">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		<?php echo $l['gen_set'];?>
		</td>
		</tr>
		
		<tr>
		<td width="45%" class="adbg">
		<b><?php echo $l['enable_notifications'];?></b><br />
		<font class="adexp"><?php echo $l['enable_notifications_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="notifications"	<?php echo ($globals['notifications'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
        
        <tr>
		<td width="45%" class="adbg">
		<b><?php echo $l['subscribe_auto'];?></b><br />
		<font class="adexp"><?php echo $l['subscribe_auto_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="subscribeauto"	<?php echo ($globals['subscribeauto'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['session_timeout'];?></b><br />
		<font class="adexp"><?php echo $l['session_timeout_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="session_timeout" value="<?php echo (empty($_POST['session_timeout']) ? $globals['session_timeout'] : $_POST['session_timeout']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['last_activity_time'];?></b><br />
		<font class="adexp"><?php echo $l['last_activity_time_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="last_active_span" value="<?php echo (empty($_POST['last_active_span']) ? $globals['last_active_span'] : $_POST['last_active_span']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['make_login_compulsory'];?></b><br />
		<font class="adexp"><?php echo $l['make_login_compulsory_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="only_users" <?php echo ($globals['only_users'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['maitain_daily_stats'];?></b>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="stats" <?php echo ($globals['stats'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['members_hide_email'];?></b>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="memhideemail" <?php echo ($globals['memhideemail'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['see_member_details'];?></b>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="showmemdetails" <?php echo ($globals['showmemdetails'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
        
        <tr>
		<td class="adbg">
		<b><?php echo $l['users_visited_today'];?></b><br />
		<font class="adexp"><?php echo $l['users_visited_today_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="users_visited_today" <?php echo ($globals['users_visited_today'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
        
        <tr>
		<td class="adbg">
		<b><?php echo $l['show_groups'];?> :</b><br />
		<font class="adexp"><?php echo $l['show_groups_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="show_groups" <?php echo ($globals['show_groups'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['active_users_list'];?></b><br />
		<font class="adexp"><?php echo $l['active_users_list_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="maxactivelist" value="<?php echo (empty($_POST['maxactivelist']) ? $globals['maxactivelist'] : $_POST['maxactivelist']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['num_members_list'];?></b><br />
		<font class="adexp"><?php echo $l['num_members_list_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="maxmemberlist" value="<?php echo (empty($_POST['maxmemberlist']) ? $globals['maxmemberlist'] : $_POST['maxmemberlist']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['num_subscriptions_list'];?></b><br />
		<font class="adexp"><?php echo $l['num_subscriptions_list_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="numsubinpage" value="<?php echo (empty($_POST['numsubinpage']) ? $globals['numsubinpage'] : $_POST['numsubinpage']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['num_recent_posts'];?></b><br />
		<font class="adexp"><?php echo $l['num_recent_posts_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="recent_posts" value="<?php echo (empty($_POST['recent_posts']) ? $globals['recent_posts'] : $_POST['recent_posts']);?>" />
		</td>
		</tr>
        
        <tr>
		<td class="adbg">
		<b><?php echo $l['language'];?></b><br />
       	<font class="adexp"><?php echo $l['default_language'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<select name="language" />
        <?php
        
		foreach($lang_folders as $k => $v){
	
			echo '<option value="'.$v.'" '.(empty($_POST['language']) && $globals['language'] == $v ? 'selected="selected"' : (trim($_POST['language']) == $v ? 'selected="selected"' : '') ).'>'.ucfirst($v).'</option>';
			
		}
		
		?>
        </select>
		</td>
		</tr>
        
        <tr>
		<td class="adbg">
		<b><?php echo $l['report_posts'];?> :</b>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="report_posts" <?php echo (isset($_POST['report_posts']) ? 'checked="checked"' : ($globals['report_posts'] ? 'checked="checked"' : ''));?> />
		</td>
		</tr>
                
        <tr>
		<td class="adcbg2" colspan="2">
        <?php echo $l['forum_settings'];?>
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['count_in_board'];?></b><br />
       <font class="adexp"><?php echo $l['count_in_board_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="countinboardposts" <?php echo (isset($_POST['countinboardposts']) ? 'checked="checked"' : ($globals['countinboardposts'] ? 'checked="checked"' : ''));?> />
		</td>
		</tr>
        
		<tr>
		<td class="adcbg2" colspan="2">
        <?php echo $l['news_settings'];?>
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['enable_news_system'];?></b><br />
       <font class="adexp"><?php echo $l['enable_news_system_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="enablenews" <?php echo (isset($_POST['enablenews']) ? 'checked="checked"' : ($globals['enablenews'] ? 'checked="checked"' : ''));?> />
		</td>
		</tr>
        
        <tr>
		<td class="adcbg2" colspan="2">
        <?php echo $l['rss_settings'];?>
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><?php echo $l['rss_recent'];?></b><br />
		<font class="adexp"><?php echo $l['rss_recent_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="20"  name="rss_recent" value="<?php echo (empty($_POST['rss_recent']) ? $globals['rss_recent'] : $_POST['rss_recent']);?>" />
		</td>
		</tr>
        		
	</table>
	
	<br /><br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="editgenset" value="<?php echo $l['submit'];?>" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}


//Shoutbox settings
function shoutboxset_theme(){

global $globals, $theme, $error, $l;
	
	//Admin Headers includes Global Headers
	adminhead($l['cp_shout_box_set']);
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/chat.gif">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen"><?php echo $l['shout_box'];?></font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	<?php echo $l['shout_box_exp'];?>
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="shoutboxsetform">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		<?php echo $l['shout_box_set'];?>
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="45%">
		<b><?php echo $l['enable_shoutbox'];?></b><br />
        <font class="adexp"><?php echo $l['enable_shoutbox_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="enableshoutbox" <?php echo (isset($_POST['enableshoutbox']) ? 'checked="checked"' : ($globals['enableshoutbox'] ? 'checked="checked"' : ''));?> />
		</td>
		</tr>
        
        <tr>
		<td class="adbg">
		<b><?php echo $l['num_shouts'];?></b><br />
		<font class="adexp"><?php echo $l['num_shouts_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="shouts" value="<?php echo (empty($_POST['shouts']) ? $globals['shouts'] : $_POST['shouts']);?>" />
		</td>
		</tr>
        
        <tr>
		<td class="adbg">
		<b><?php echo $l['shout_life'];?></b><br />
		<font class="adexp"><?php echo $l['shout_life_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="shoutboxtime" value="<?php echo (empty($_POST['shoutboxtime']) ? $globals['shoutboxtime'] : $_POST['shoutboxtime']);?>" />
		</td>
		</tr>        
        
        <tr>
		<td class="adbg">
		<b><?php echo $l['enable_smilies'];?></b><br />
        <font class="adexp"><?php echo $l['enable_smilies_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="shoutbox_emot" <?php echo (isset($_POST['shoutbox_emot']) ? 'checked="checked"' : ($globals['shoutbox_emot'] ? 'checked="checked"' : ''));?> />
		</td>
		</tr>
        
        <tr>
		<td class="adbg">
		<b><?php echo $l['enable_normal_bbc'];?></b><br />
        <font class="adexp"><?php echo $l['enable_normal_bbc_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="shoutbox_nbbc" <?php echo (isset($_POST['shoutbox_nbbc']) ? 'checked="checked"' : ($globals['shoutbox_nbbc'] ? 'checked="checked"' : ''));?> />
		</td>
		</tr>
        
        <tr>
		<td class="adbg">
		<b><?php echo $l['enable_special_bbc'];?></b><br />
        <font class="adexp"><?php echo $l['enable_special_bbc_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="shoutbox_sbbc" <?php echo (isset($_POST['shoutbox_sbbc']) ? 'checked="checked"' : ($globals['shoutbox_sbbc'] ? 'checked="checked"' : ''));?> />
		</td>
		</tr>
        
        <tr>
		<td class="adbg" colspan="2" align="center">
        <input type="submit" name="editshoutboxset" value="<?php echo $l['submit'];?>" />
		</td>
		</tr>
		
	</table>
	
	<br /><br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
   		<tr>
		<td class="adcbg" colspan="2">
		<?php echo $l['delete_all_shouts'];?>
		</td>
		</tr>
		
        <tr>
		<td class="adbg" width="45%">
		<b><?php echo $l['start_count_again'];?></b><br />
        <font class="adexp"><?php echo $l['start_count_again_exp'];?></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="truncatetable" checked="checked" />
		</td>
		</tr>
        
		<tr>
		<td align="center" class="adbg" colspan="2">
		<input type="submit" name="delallshouts" value="<?php echo $l['delete'];?>" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}



//Updates
function updates_theme(){

global $globals, $theme, $error, $info, $l;
	
	//Admin Headers includes Global Headers
	adminhead($l['cp_update_aef']);
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="0" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/updates.gif">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen"><?php echo $l['update_aef'];?></font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	<?php echo $l['update_aef_exp'];?></b>.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="updatesform">
	<table width="100%" cellpadding="5" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adbg" width="45%">
		<b><?php echo $l['current_version'];?></b>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $globals['version'];?>
		</td>
		</tr>
        
        <tr>
		<td class="adbg">
		<b>Latest Version :</b>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<?php echo (empty($info['version']) ? $l['not_connect_aef'] : $info['version']);?>
		</td>
		</tr>
        
        <tr>
		<td class="adbg" colspan="2">
		<?php echo $info['message'];?>
		</td>
		</tr>
        
        <tr>
		<td class="adbg" colspan="2" align="center">
        <input type="submit" name="update" value="<?php echo $l['submit'];?>" <?php echo (empty($info['link']) ? 'disabled="disabled"' : '');?> />
		</td>
		</tr>
		
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}


?>
