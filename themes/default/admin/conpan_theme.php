<?php

if(!defined('AEF'))
{
die('Hacking Attempt');
}


function coreset_theme(){

global $globals, $theme, $error;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Core Settings');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/controlpanel.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Core Settings</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	This is the place for changing the Core settings of the board. Please take great care while changing these settings as the Board will stop functioning if something is incorrect.
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
		Core Settings
		</td>
		</tr>
	
		<tr>
		<td width="45%" class="adbg">
		<b>Board URL :</b><br />
		<font class="adexp">The URL of the board.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="url" value="<?php echo (empty($_POST['url']) ? $globals['url'] : $_POST['url']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Site Name :</b><br />
		<font class="adexp">The name of the board.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="sn" value="<?php echo (empty($_POST['sn']) ? $globals['sn'] : $_POST['sn']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Board Email :</b><br />
		<font class="adexp">The email of the board.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="board_email" value="<?php echo (empty($_POST['board_email']) ? $globals['board_email'] : $_POST['board_email']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>AEF Folder :</b><br />
		<font class="adexp">The folder where all the AEF files are stored.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="server_url" value="<?php echo (empty($_POST['server_url']) ? $globals['server_url'] : $_POST['server_url']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>AEF Main Files :</b><br />
		<font class="adexp">The folder where all the Main AEF files are stored.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="mainfiles" value="<?php echo (empty($_POST['mainfiles']) ? $globals['mainfiles'] : $_POST['mainfiles']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Themes Folder :</b><br />
		<font class="adexp">The folder where all the themes reside.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="themesdir" value="<?php echo (empty($_POST['themesdir']) ? $globals['themesdir'] : $_POST['themesdir']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Cookie Name :</b><br />
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="cookie_name" value="<?php echo (empty($_POST['cookie_name']) ? $globals['cookie_name'] : $_POST['cookie_name']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Compress Output :</b><br />
		<font class="adexp">This will compress output and saves alot of bandwidth.</font>
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
		<input type="submit" name="editcoreset" value="Submit" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}


function mysqlset_theme(){

global $globals, $theme, $error;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - MySQL Settings');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/controlpanel.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">MySQL Settings</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	This is the place for changing the MySQL settings of the board. Please take great care while changing these settings as the Board will stop functioning if something is incorrect.
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
		MySQL Settings
		</td>
		</tr>
	
		<tr>
		<td width="45%" class="adbg">
		<b>Server :</b><br />
		<font class="adexp">The server on which the database resides. Generally 'localhost'.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="server" value="<?php echo (empty($_POST['server']) ? $globals['server'] : $_POST['server']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>MySQL User :</b><br />
		<font class="adexp">The user of the MySQL database.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="user" value="<?php echo (empty($_POST['user']) ? $globals['user'] : $_POST['user']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>MySQL password :</b><br />
		<font class="adexp">The password of the MySQL database.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" size="40"  name="password" value="<?php echo (empty($_POST['password']) ? $globals['password'] : $_POST['password']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>MySQL database :</b><br />
		<font class="adexp">The name of the MySQL database.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="database" value="<?php echo (empty($_POST['database']) ? $globals['database'] : $_POST['database']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>MySQL DB Tables Prefix :</b>
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

global $globals, $theme, $error;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Turn Board On/Off');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/controlpanel.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Turn Board On/Off</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	Here you can put the board under maintenance mode.
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
		Turn Board On/Off
		</td>
		</tr>
		
		<tr>
		<td width="45%" class="adbg">
		<b>Turn Board Off :</b><br />
		<font class="adexp">Only permitted users will be able to see the board for maintenance purpose.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="maintenance"	<?php echo ($globals['maintenance'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Maintenance Subject :</b>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="maintenance_subject" value="<?php echo (empty($_POST['maintenance_subject']) ? $globals['maintenance_subject'] : $_POST['maintenance_subject']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Maintenance Message :</b>
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
		<input type="submit" name="editonoff" value="Submit" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}


//Board mail settings
function mailset_theme(){

global $globals, $theme, $error;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Mail Settings');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/controlpanel.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Mail Settings</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	Here you can manage Mail Settings for the board.
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
		Mail Settings
		</td>
		</tr>
		
		<tr>
		<td width="45%" class="adbg">
		<b>Mail Delivery Method :</b><br />
		<font class="adexp">Send mails using PHP mail() function or your SMTP server.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<select name="mail">
		<option value="1" <?php echo (isset($_POST['mail']) && $_POST['mail'] == 1 ? 'selected="selected"' : ($globals['mail'] == 1 ? 'selected="selected"' : '' ));?> >PHP Mail</option>
		<option value="0" <?php echo (isset($_POST['mail']) && $_POST['mail'] == 0 ? 'selected="selected"' : ($globals['mail'] == 0 ? 'selected="selected"' : '' ));?> >SMTP</option>
		</select>
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>SMTP Server :</b>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="mail_server" value="<?php echo (empty($_POST['mail_server']) ? $globals['mail_server'] : $_POST['mail_server']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>SMTP Port :</b>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="mail_port" value="<?php echo (empty($_POST['mail_port']) ? $globals['mail_port'] : $_POST['mail_port']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>SMTP Username :</b>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="mail_user" value="<?php echo (empty($_POST['mail_user']) ? $globals['mail_user'] : $_POST['mail_user']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>SMTP Password :</b>
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
		<input type="submit" name="editmailset" value="Submit" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}


//Board General settings
function genset_theme(){

global $globals, $theme, $error, $lang_folders;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - General Settings');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/controlpanel.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">General Settings</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	Here you can manage General Settings of the board.
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
		General Settings
		</td>
		</tr>
		
		<tr>
		<td width="45%" class="adbg">
		<b>Enable notifications :</b><br />
		<font class="adexp">If disabled all notifcations of topics and posts will be disabled.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="notifications"	<?php echo ($globals['notifications'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
        
        <tr>
		<td width="45%" class="adbg">
		<b>Subscribe Automatically :</b><br />
		<font class="adexp">The default while posting if notifications are enabled.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="subscribeauto"	<?php echo ($globals['subscribeauto'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Session Timeout :</b><br />
		<font class="adexp">Seconds before an unused session timeout.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="session_timeout" value="<?php echo (empty($_POST['session_timeout']) ? $globals['session_timeout'] : $_POST['session_timeout']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Last Activity Time :</b><br />
		<font class="adexp">The time gap from the last activity of a user to consider the user as active. (in minutes)</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="last_active_span" value="<?php echo (empty($_POST['last_active_span']) ? $globals['last_active_span'] : $_POST['last_active_span']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Make login compulsory :</b><br />
		<font class="adexp">If enabled all guests will have to login for browsing the forum.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="only_users" <?php echo ($globals['only_users'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Maitain daily stats :</b>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="stats" <?php echo ($globals['stats'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Allow members to hide their email :</b>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="memhideemail" <?php echo ($globals['memhideemail'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Can Guests see Member Details ?</b>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="showmemdetails" <?php echo ($globals['showmemdetails'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
        
        <tr>
		<td class="adbg">
		<b>Show Users Visited Today :</b><br />
		<font class="adexp">If enabled it will show the users who have visited today. It will be shown on the Board Index. (Will take One Query)</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="users_visited_today" <?php echo ($globals['users_visited_today'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
        
        <tr>
		<td class="adbg">
		<b>Show Groups on Index :</b><br />
		<font class="adexp">If enabled it will show the NON POST User Groups on the Index.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="show_groups" <?php echo ($globals['show_groups'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Active users to show in list :</b><br />
		<font class="adexp">The number of active users to show in the active users list.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="maxactivelist" value="<?php echo (empty($_POST['maxactivelist']) ? $globals['maxactivelist'] : $_POST['maxactivelist']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Num. Members to show in list :</b><br />
		<font class="adexp">The number of members to show in the members list.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="maxmemberlist" value="<?php echo (empty($_POST['maxmemberlist']) ? $globals['maxmemberlist'] : $_POST['maxmemberlist']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Num. subscriptions to show in list :</b><br />
		<font class="adexp">The number of subscriptions to show in the subscriptions list.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="numsubinpage" value="<?php echo (empty($_POST['numsubinpage']) ? $globals['numsubinpage'] : $_POST['numsubinpage']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Num. of Recent Posts :</b><br />
		<font class="adexp">The number of recent posts to show on the Main Index. Enter 0 - zero to disable. (Will take One Query) </font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="recent_posts" value="<?php echo (empty($_POST['recent_posts']) ? $globals['recent_posts'] : $_POST['recent_posts']);?>" />
		</td>
		</tr>
        
        <tr>
		<td class="adbg">
		<b>Language :</b><br />
       <font class="adexp">Choose the Board's default language.</font>
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
		<b>Enable Reporting of Posts :</b>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="report_posts" <?php echo (isset($_POST['report_posts']) ? 'checked="checked"' : ($globals['report_posts'] ? 'checked="checked"' : ''));?> />
		</td>
		</tr>
                
        <tr>
		<td class="adcbg2" colspan="2">
        Forum Settings
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Count In-Board Posts :</b><br />
       <font class="adexp">If this is enabled the inboard posts will also be counted.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="countinboardposts" <?php echo (isset($_POST['countinboardposts']) ? 'checked="checked"' : ($globals['countinboardposts'] ? 'checked="checked"' : ''));?> />
		</td>
		</tr>
        
		<tr>
		<td class="adcbg2" colspan="2">
        News Settings
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Enable the News System :</b><br />
       <font class="adexp">If this is enabled permitted users can submit news which can be approved by Admins.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="enablenews" <?php echo (isset($_POST['enablenews']) ? 'checked="checked"' : ($globals['enablenews'] ? 'checked="checked"' : ''));?> />
		</td>
		</tr>
        
        <tr>
		<td class="adcbg2" colspan="2">
        RSS Feeds Settings
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>RSS Feeds of Recent Posts :</b><br />
		<font class="adexp">The number of recent posts to show in the RSS Feeds. Enter 0 - zero to disable. </font>
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
		<input type="submit" name="editgenset" value="Submit" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}


//Shoutbox settings
function shoutboxset_theme(){

global $globals, $theme, $error;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Shout Box Settings');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/chat.gif">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Shout Box</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	Here you can manage the Shout Box of the board.
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
		Shout Box Settings
		</td>
		</tr>
		
		<tr>
		<td class="adbg" width="45%">
		<b>Enable ShoutBox :</b><br />
        <font class="adexp">This is a good feature if you want the users to interact easily.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="enableshoutbox" <?php echo (isset($_POST['enableshoutbox']) ? 'checked="checked"' : ($globals['enableshoutbox'] ? 'checked="checked"' : ''));?> />
		</td>
		</tr>
        
        <tr>
		<td class="adbg">
		<b>Number of Shouts :</b><br />
		<font class="adexp">This is the number of shouts to return on first-load or reload.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="shouts" value="<?php echo (empty($_POST['shouts']) ? $globals['shouts'] : $_POST['shouts']);?>" />
		</td>
		</tr>
        
        <tr>
		<td class="adbg">
		<b>Shout Life :</b><br />
		<font class="adexp">After this time limit a Shout is deleted to cleanup some space.(In Minutes)<br />Recommended time is 1440 Minutes i.e. one day. Zero - 0 for no limit.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="shoutboxtime" value="<?php echo (empty($_POST['shoutboxtime']) ? $globals['shoutboxtime'] : $_POST['shoutboxtime']);?>" />
		</td>
		</tr>        
        
        <tr>
		<td class="adbg">
		<b>Enable Smilies :</b><br />
        <font class="adexp">If checked smilies will be parsed in the shouts.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="shoutbox_emot" <?php echo (isset($_POST['shoutbox_emot']) ? 'checked="checked"' : ($globals['shoutbox_emot'] ? 'checked="checked"' : ''));?> />
		</td>
		</tr>
        
        <tr>
		<td class="adbg">
		<b>Enable Normal BBC :</b><br />
        <font class="adexp">This will enable normal bbc like bold, underline, italics, strike, sup, sub, left, center, right, hr, font size, font family and font color.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="shoutbox_nbbc" <?php echo (isset($_POST['shoutbox_nbbc']) ? 'checked="checked"' : ($globals['shoutbox_nbbc'] ? 'checked="checked"' : ''));?> />
		</td>
		</tr>
        
        <tr>
		<td class="adbg">
		<b>Enable Special BBC :</b><br />
        <font class="adexp">This will enable special bbc like URL, FTP, Email, Code, PHP, Quote, Images, Flash, List and autolinks. (We dont recommend this in the shoutbox)</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="shoutbox_sbbc" <?php echo (isset($_POST['shoutbox_sbbc']) ? 'checked="checked"' : ($globals['shoutbox_sbbc'] ? 'checked="checked"' : ''));?> />
		</td>
		</tr>
        
        <tr>
		<td class="adbg" colspan="2" align="center">
        <input type="submit" name="editshoutboxset" value="Submit" />
		</td>
		</tr>
		
	</table>
	
	<br /><br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
   		<tr>
		<td class="adcbg" colspan="2">
		Delete all Shouts
		</td>
		</tr>
		
        <tr>
		<td class="adbg" width="45%">
		<b>Start Count again :</b><br />
        <font class="adexp">This will truncate the shoutbox table and restart conuting. If it is not selected only the shouts will be deleted.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="truncatetable" checked="checked" />
		</td>
		</tr>
        
		<tr>
		<td align="center" class="adbg" colspan="2">
		<input type="submit" name="delallshouts" value="Delete" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}



//Updates
function updates_theme(){

global $globals, $theme, $error, $info;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Update AEF');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="0" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/updates.gif">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Update your board</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	Here you can install and update to the latest version of AEF. Before proceeding we request you to please <b>take a backup of your Database</b>.
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
		<b>Current Version :</b>
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
		&nbsp;&nbsp;&nbsp;&nbsp;<?php echo (empty($info['version']) ? '<i>Could not connect to AEF</i>' : $info['version']);?>
		</td>
		</tr>
        
        <tr>
		<td class="adbg" colspan="2">
		<?php echo $info['message'];?>
		</td>
		</tr>
        
        <tr>
		<td class="adbg" colspan="2" align="center">
        <input type="submit" name="update" value="Submit" <?php echo (empty($info['link']) ? 'disabled="disabled"' : '');?> />
		</td>
		</tr>
		
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}


?>