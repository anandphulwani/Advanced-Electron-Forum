<?php

if(!defined('AEF'))
{
die('Hacking Attempt');
}

function manug_theme(){

global $globals, $theme, $user_group, $post_group;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Manage User Groups');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/usergroups.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Manage User Groups</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	This is the place for managing the User Groups of the board.
	</td>
	</tr>
	
	</table>
	<br /><br />
	
	<table width="100%" cellpadding="5" cellspacing="1" class="cbor">
	<tr>
	<td class="adcbg" colspan="7">
	User Groups
	</td>
	</tr>
	
	<tr align="center">
	<td class="adcbg2" width="50%">
	<b>Name</b>
	</td>
	<td class="adcbg2" width="25%">
	<b>Stars</b>
	</td>
	<td class="adcbg2" width="10%">
	<b>Edit</b>
	</td>
	<td class="adcbg2" width="15%">
	<b>Delete</b>
	</td>
	</tr>
	
	<?php
	
	foreach($user_group as $uk => $uv){
	
	echo '<tr>
	<td class="adbg" align="left">
	<font color="'.$user_group[$uk]['mem_gr_colour'].'">'.$user_group[$uk]['mem_gr_name'].'</font>
	</td>
	<td class="adbg">';
	for($i = 1; $i <= $user_group[$uk]['image_count']; $i++){
	echo '<img src="'.$theme['images'].$user_group[$uk]['image_name'].'" />';
	}
	echo '</td>
	<td class="adbg" align="center">
	<a href="'.$globals['index_url'].'act=admin&adact=ug&seadact=editug&ugid='.$user_group[$uk]['member_group'].'">Edit</a>
	</td>
	<td class="adbg" align="center">
	<a href="'.$globals['index_url'].'act=admin&adact=ug&seadact=delug&ugid='.$user_group[$uk]['member_group'].'">Delete</a>
	</td>
	</tr>';
	
	}		
	
	?>
	
	</table>
	<br />
	
	<table width="100%" cellpadding="5" cellspacing="1" class="cbor">
	<tr>
	<td class="adcbg" colspan="7">
	Post Groups
	</td>
	</tr>
	
	<tr align="center">
	<td class="adcbg2" width="40%">
	<b>Name</b>
	</td>
	<td class="adcbg2" width="25%">
	<b>Stars</b>
	</td>
	<td class="adcbg2" width="10%">
	<b>Posts</b>
	</td>
	<td class="adcbg2" width="10%">
	<b>Edit</b>
	</td>
	<td class="adcbg2" width="15%">
	<b>Delete</b>
	</td>
	</tr>
	
	<?php
	
	foreach($post_group as $pk => $pv){
	
	echo '<tr>
	<td class="adbg" align="left">
	<font color="'.$post_group[$pk]['mem_gr_colour'].'">'.$post_group[$pk]['mem_gr_name'].'</font>
	</td>
	<td class="adbg">';
	for($i = 1; $i <= $post_group[$pk]['image_count']; $i++){
	echo '<img src="'.$theme['images'].$post_group[$pk]['image_name'].'" />';
	}
	echo '</td>
	<td class="adbg" align="center">
	'.$post_group[$pk]['post_count'].'
	</td>
	<td class="adbg" align="center">
	<a href="'.$globals['index_url'].'act=admin&adact=ug&seadact=editug&ugid='.$post_group[$pk]['member_group'].'">Edit</a>
	</td>
	<td class="adbg" align="center">
	<a href="'.$globals['index_url'].'act=admin&adact=ug&seadact=delug&ugid='.$post_group[$pk]['member_group'].'">Delete</a>
	</td>
	</tr>';
	
	}		
	
	?>
	
	</table>
	<br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	<tr>
	<td align="center" class="adbg">
	<form method="get" action="<?php echo $globals['url'];?>" name="addgroup">
	<input type="hidden" name="seadact" value="addug" />
	<?php
	foreach($_GET as $k => $v){
	echo ($k == 'seadact' ? '' : '<input type="hidden" name="'.$k.'" value="'.$v.'" />' );
	}
	?>
	<select name="ugid">
	<?php
	foreach($user_group as $uk => $uv){
	echo '<option value="'.$user_group[$uk]['member_group'].'">'.$user_group[$uk]['mem_gr_name'].'</option>';	
	}
	?>
	</select>&nbsp;&nbsp;<input type="submit" value="Add New User Group" />
	</form>
	</td>
	</tr>	
	</table>
	
	<?php	
	
	adminfoot();
	
}

//Edit User Groups
function editug_theme(){

global $globals, $theme, $error, $user_group;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Edit User Groups');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/usergroups.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Edit User Groups</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	This is the place for editing a User Group.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="editugform">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Edit User Groups
		</td>
		</tr>
	
		<tr>
		<td width="45%" class="adbg">
		<b>User Group Name :</b><br />
		<font class="adexp">The name of the user group.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="mem_gr_name" value="<?php echo (empty($_POST['mem_gr_name']) ? $user_group['mem_gr_name'] : $_POST['mem_gr_name']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>User Group Color :</b><br />
		<font class="adexp">The color that will be used for the members of this user group.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="mem_gr_colour" value="<?php echo (empty($_POST['mem_gr_colour']) ? $user_group['mem_gr_colour'] : $_POST['mem_gr_colour']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>User Group Image :</b><br />
		<font class="adexp">The user group image(stars). This file must be present in the themes image directory.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="image_name" value="<?php echo (empty($_POST['image_name']) ? $user_group['image_name'] : $_POST['image_name']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Number of Star Image :</b><br />
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="image_count" value="<?php echo (empty($_POST['image_count']) ? $user_group['image_count'] : $_POST['image_count']);?>" />
		</td>
		</tr>
		
		
		<?php		
		if(!in_array($user_group['member_group'], array(-3,-1,0,1,3))){
		echo '<tr>
		<td class="adbg">
		<b>Post Based :</b><br />
		<font class="adexp">Is this user group based on post count. <br />
		<b>If it is a Post Based Group you do not need to fill in the below data for the permissions.</b></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="post_based" '.(isset($_POST['post_based']) || $user_group['post_count'] != -1 ? 'checked="checked"' : '' ).' />
		</td>
		</tr>';
		echo '<tr>
		<td class="adbg">
		<b>Number of Posts :</b><br />
		<font class="adexp">Minimum number of posts to be a member of this user group.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="post_count" value="'.(empty($_POST['post_count']) ? $user_group['post_count'] : $_POST['post_count']).'" />
		</td>
		</tr>';
		}		
		?>
		
	</table>
	
	<br /><br />
	
	<?php
		
	$admin_per = array('can_admin' => array('yn', 'Can Administrate the Board', ''),
		'allow_html' => array('yn', 'Can post HTML Code', 'Even Javascript will be executed'),		
		'view_ip' => array('yn', 'Can view IP Addresses of users', ''),				
		'view_offline_board' => array('yn', 'Can use the board even when in maintainence', '')
		);
	
	$forum_per = array('view_forum' => array('yn', 'Can view the forum', ''),
		'can_search' => array('yn', 'Can use the search', ''),
		'can_email_mem' => array('yn', 'Can email members', ''),
		'can_email_friend' => array('yn', 'Can email friends', 'Just an email feature'),
		'view_active' => array('yn', 'Can view Active users list', ''),
		'hide_online' => array('yn', 'Can hide own Online status', ''),
		'view_anonymous' => array('yn', 'Can view Anonymous members', ''),
		'view_members' => array('yn', 'Can view the Members list', ''),
		'view_stats' => array('yn', 'Can view Board Statistics', ''),
		'view_calendar' => array('yn', 'Can view the Calendar', '')
		);
		
	$profile_per = array('prefix' => array('inputtext', 'Prefix', ''),
		'suffix' => array('inputtext', 'Suffix', ''),
		'use_avatar' => array('yn', 'Can use avatars from the board', ''),
		'url_avatar' => array('yn', 'Can specify URL Avatar', ''),
		'upload_avatar' => array('yn', 'Can Upload own Avatar', ''),
		'can_view_profile' => array('yn', 'Can View Members profile', ''),
		'can_edit_own_profile' => array('yn', 'Can edit own profile', ''),
		'can_edit_other_profile' => array('yn', 'Can edit others profile', ''),
		'can_del_own_account' => array('yn', 'Can delete their own account', ''),
		'can_del_other_account' => array('yn', 'Can delete others account', ''),
		'can_ban_user' => array('yn', 'Can Ban Users', ''),	
		);
	
	$topic_per = array('can_post_topic' => array('yn', 'Can start topics'),
		'can_edit_own_topic' => array('yn', 'Edit own topics', ''),
		'can_edit_other_topic' => array('yn', 'Edit others topic', ''),
		'can_del_own_topic' => array('yn', 'Delete own topics', ''),
		'can_del_other_topic' => array('yn', 'Delete others topic', ''),
		'approve_topics' => array('yn', 'Approve topics', 'Approval System should be enabled'),
		'can_merge_topics' => array('yn', 'Merge Topics', ''),
		'can_merge_posts' => array('yn', 'Merge Posts', ''),
		'can_split_topics' => array('yn', 'Split Topics', ''),
		'can_email_topic' => array('yn', 'Email Topics to Friends', ''),
		'can_make_sticky' => array('yn', 'Sticky Topics', ''),
		'can_move_own_topic' => array('yn', 'Move own topics', ''),
		'can_move_other_topic' => array('yn', 'Move others topic', ''),
		'can_lock_own_topic' => array('yn', 'Lock own topics', ''),
		'can_lock_other_topic' => array('yn', 'Lock others topic', ''),
		'can_announce_topic' => array('yn', 'Announce Topics', ''),
		'notify_new_posts' => array('yn', 'Subscribe to topics', ''),
		'notify_new_topics' => array('yn', 'Subscribe to forums', ''),
		'has_priviliges' => array('yn', 'Has priviliges', '')
		);
		
	$post_per = array('can_reply' => array('yn', 'Reply to topics', ''),
		'can_edit_own' => array('yn', 'Edit own posts', ''),
		'can_edit_other' => array('yn', 'Edit other posts', ''),
		'can_del_own_post' => array('yn', 'Delete own posts', ''),
		'can_del_other_post' => array('yn', 'Delete others post', ''),
		'approve_posts' => array('yn', 'Approve posts', 'Approval System should be enabled'),
		'can_report_post' => array('yn', 'Can Report Posts', '')
		);
		
	$poll_per = array('can_view_poll' => array('yn', 'View Polls', ''),
		'can_vote_polls' => array('yn', 'Vote in polls', ''),
		'can_post_polls' => array('yn', 'Can start polls topics', ''),
		'can_edit_own_poll' => array('yn', 'Edit own polls', ''),
		'can_edit_other_poll' => array('yn', 'Edit others poll', ''),
		'add_poll_topic_own' => array('yn', 'Add a poll in self started topics', ''),
		'add_poll_topic_other' => array('yn', 'Add a poll in topics started by others', ''),
		'can_rem_own_poll' => array('yn', 'Remove self started polls', ''),
		'can_rem_other_poll' => array('yn', 'Remove polls started by others', ''),
		);
		
	$att_per = array('can_attach' => array('yn', 'Can attach files', ''),
		'can_view_attach' => array('yn', 'Download attachments', ''),
		'can_remove_attach' => array('yn', 'Remove Attachments', ''),
		'max_attach' => array('inputtext', 'Max attachment size allowed', 'In KB\'s')
		);
		
	$news_per = array('can_submit_news' => array('yn', 'Can submit news', ''),
		'can_approve_news' => array('yn', 'Can approve submitted news', ''),
		'can_edit_news' => array('yn', 'Can edit news articles', ''),
		'can_delete_news' => array('yn', 'Can delete nws articles', '')
		);
		
	$pm_per = array('can_use_pm' => array('yn', 'Can use PM system', ''),
		'max_stored_pm' => array('inputtext', 'Max. Number of storable PM', 'Put \'0\' for unlimited.'),
		'max_mass_pm' => array('inputtext', 'Max. Number users allowed to mass PM?', 'Put \'0\' for unlimited.'),
		'can_report_pm' => array('yn', 'Can repost PM', '')
		);
	
	$shoutbox_per = array('can_shout' => array('yn', 'Can shout', 'Will allow him to see and use the shoutbox'),
		'can_del_shout' => array('yn', 'Can Delete Shouts', 'If enabled the users of this group will be able to delete shouts')
		);
			
	$permissions = array('Topic Permissions' => $topic_per,
					'Posting Permissions' => $post_per,
					'Poll Permissions' => $poll_per,
					'Attachments Permissions' => $att_per,
					'News Permissions' => $news_per,
					'Personal Message Permissions' => $pm_per,
					'Administration Permissions' => $admin_per,
					'General Board Permissions' => $forum_per,
					'Profile options' => $profile_per,
					'Shout Box Permissions' => $shoutbox_per
					);
	
	//No you cant do it for admins
	if($user_group['member_group'] != 1){
	
	echo '<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
		<tr>
		<td class="adcbg" colspan="2">
		Permissions
		</td>
		</tr>';
	
	foreach($permissions as $k => $v){
	
	echo '<tr>
	<td class="adcbg2" colspan="2">
	'.$k.'
	</td>
	</tr>';
	
	foreach($v as $pk => $pv){
	
	echo '<tr>
	<td class="adbg" width="50%">
	'.$pv[1].' :<br />
	'.(empty($pv[2]) ? '' : '<font class="adexp">'.$pv[2].'</font>').'
	</td>
	<td class="adbg" align="left">
	&nbsp;&nbsp;&nbsp;&nbsp;'.call_user_func($pv[0], $pk).'
	</td>
	</tr>';
	
	}
	
	}
	
	echo '<tr>
	<td class="adbg" width="50%" valign="top">
	Show a message to this group :<br />
	<font class="adexp">Type in as much as you want. BBC is also allowed.</font>
	</td>
	<td class="adbg" align="left">
	&nbsp;&nbsp;&nbsp;&nbsp;<textarea cols="30" rows="5" name="group_message">'.(empty($_POST['group_message']) ? $user_group['group_message'] : $_POST['group_message']).'</textarea>
	</td>
	</tr>
	
	
	</table>	
	<br /><br />';
	}		
	?>
	
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="editug" value="Submit" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}

function yn($name){

global $user_group;

return '<input type="radio" name="'.$name.'" value="1" '.(isset($_POST[$name]) && $_POST[$name] == 1 ? 'checked="checked"' : ($user_group[$name] == 1 ? 'checked="checked"' : '') ).' />&nbsp;Yes&nbsp;&nbsp;<input type="radio" name="'.$name.'" value="0" '.(isset($_POST[$name]) && $_POST[$name] == 0 ? 'checked="checked"' : (empty($user_group[$name]) ? 'checked="checked"' : '') ).' />&nbsp;No';

}

function inputtext($name){

global $user_group;

return '<input type="text" name="'.$name.'" value="'.(empty($_POST[$name]) ? $user_group[$name] : $_POST[$name]).'" size="30" />';

}

//Add User Groups
function addug_theme(){

global $globals, $theme, $error, $user_group;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Add User Groups');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/usergroups.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Add User Groups</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	This is the place for adding a User Group.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="addugform">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Add User Groups
		</td>
		</tr>
	
		<tr>
		<td width="45%" class="adbg">
		<b>User Group Name :</b><br />
		<font class="adexp">The name of the user group.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="mem_gr_name" value="<?php echo (empty($_POST['mem_gr_name']) ? '' : $_POST['mem_gr_name']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>User Group Color :</b><br />
		<font class="adexp">The color that will be used for the members of this user group.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="mem_gr_colour" value="<?php echo (empty($_POST['mem_gr_colour']) ? '' : $_POST['mem_gr_colour']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>User Group Image :</b><br />
		<font class="adexp">The user group image(stars). This file must be present in the themes image directory.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="image_name" value="<?php echo (empty($_POST['image_name']) ? '' : $_POST['image_name']);?>" />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Number of Star Image :</b><br />
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="image_count" value="<?php echo (empty($_POST['image_count']) ? '' : $_POST['image_count']);?>" />
		</td>
		</tr>
		
		
		<tr>
		<td class="adbg">
		<b>Post Based :</b><br />
		<font class="adexp">Is this user group based on post count. <br />
		<b>If it is a Post Based Group you do not need to fill in the below data for the permissions.</b></font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="post_based" <?php echo (isset($_POST['post_based']) ? 'checked="checked"' : '' )?> />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Number of Posts :</b><br />
		<font class="adexp">Minimum number of posts to be a member of this user group.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="post_count" value="<?php echo (empty($_POST['post_count']) ? '' : $_POST['post_count']);?>" />
		</td>
		</tr>
		
	</table>
	
	<br /><br />
	
	<?php
		
	$admin_per = array('can_admin' => array('yn', 'Can Administrate the Board', ''),
		'allow_html' => array('yn', 'Can post HTML Code', 'Even Javascript will be executed'),		
		'view_ip' => array('yn', 'Can view IP Addresses of users', ''),				
		'view_offline_board' => array('yn', 'Can use the board even when in maintainence', '')
		);
	
	$forum_per = array('view_forum' => array('yn', 'Can view the forum', ''),
		'can_search' => array('yn', 'Can use the search', ''),
		'can_email_mem' => array('yn', 'Can email members', ''),
		'can_email_friend' => array('yn', 'Can email friends', 'Just an email feature'),
		'view_active' => array('yn', 'Can view Active users list', ''),
		'hide_online' => array('yn', 'Can hide own Online status', ''),
		'view_anonymous' => array('yn', 'Can view Anonymous members', ''),
		'view_members' => array('yn', 'Can view the Members list', ''),
		'view_stats' => array('yn', 'Can view Board Statistics', ''),
		'view_calendar' => array('yn', 'Can view the Calendar', '')
		);
		
	$profile_per = array('prefix' => array('inputtext', 'Prefix', ''),
		'suffix' => array('inputtext', 'Suffix', ''),
		'use_avatar' => array('yn', 'Can use avatars from the board', ''),
		'url_avatar' => array('yn', 'Can specify URL Avatar', ''),
		'upload_avatar' => array('yn', 'Can Upload own Avatar', ''),
		'can_view_profile' => array('yn', 'Can View Members profile', ''),
		'can_edit_own_profile' => array('yn', 'Can edit own profile', ''),
		'can_edit_other_profile' => array('yn', 'Can edit others profile', ''),
		'can_del_own_account' => array('yn', 'Can delete their own account', ''),
		'can_del_other_account' => array('yn', 'Can delete others account', ''),
		'can_ban_user' => array('yn', 'Can Ban Users', ''),	
		);
	
	$topic_per = array('can_post_topic' => array('yn', 'Can start topics'),
		'can_edit_own_topic' => array('yn', 'Edit own topics', ''),
		'can_edit_other_topic' => array('yn', 'Edit others topic', ''),
		'can_del_own_topic' => array('yn', 'Delete own topics', ''),
		'can_del_other_topic' => array('yn', 'Delete others topic', ''),
		'approve_topics' => array('yn', 'Approve topics', 'Approval System should be enabled'),
		'can_merge_topics' => array('yn', 'Merge Topics', ''),
		'can_merge_posts' => array('yn', 'Merge Posts', ''),
		'can_split_topics' => array('yn', 'Split Topics', ''),
		'can_email_topic' => array('yn', 'Email Topics to Friends', ''),
		'can_make_sticky' => array('yn', 'Sticky Topics', ''),
		'can_move_own_topic' => array('yn', 'Move own topics', ''),
		'can_move_other_topic' => array('yn', 'Move others topic', ''),
		'can_lock_own_topic' => array('yn', 'Lock own topics', ''),
		'can_lock_other_topic' => array('yn', 'Lock others topic', ''),
		'can_announce_topic' => array('yn', 'Announce Topics', ''),
		'notify_new_posts' => array('yn', 'Subscribe to topics', ''),
		'notify_new_topics' => array('yn', 'Subscribe to forums', ''),
		'has_priviliges' => array('yn', 'Has priviliges', '')
		);
		
	$post_per = array('can_reply' => array('yn', 'Reply to topics', ''),
		'can_edit_own' => array('yn', 'Edit own posts', ''),
		'can_edit_other' => array('yn', 'Edit other posts', ''),
		'can_del_own_post' => array('yn', 'Delete own posts', ''),
		'can_del_other_post' => array('yn', 'Delete others post', ''),
		'approve_posts' => array('yn', 'Approve posts', 'Approval System should be enabled'),
		'can_report_post' => array('yn', 'Can Report Posts', '')
		);
		
	$poll_per = array('can_view_poll' => array('yn', 'View Polls', ''),
		'can_vote_polls' => array('yn', 'Vote in polls', ''),
		'can_post_polls' => array('yn', 'Can start polls topics', ''),
		'can_edit_own_poll' => array('yn', 'Edit own polls', ''),
		'can_edit_other_poll' => array('yn', 'Edit others poll', ''),
		'add_poll_topic_own' => array('yn', 'Add a poll in self started topics', ''),
		'add_poll_topic_other' => array('yn', 'Add a poll in topics started by others', ''),
		'can_rem_own_poll' => array('yn', 'Remove self started polls', ''),
		'can_rem_other_poll' => array('yn', 'Remove polls started by others', ''),
		);
		
	$att_per = array('can_attach' => array('yn', 'Can attach files', ''),
		'can_view_attach' => array('yn', 'Download attachments', ''),
		'can_remove_attach' => array('yn', 'Remove Attachments', ''),
		'max_attach' => array('inputtext', 'Max attachment size allowed', 'In KB\'s')
		);
		
	$news_per = array('can_submit_news' => array('yn', 'Can submit news', ''),
		'can_approve_news' => array('yn', 'Can approve submitted news', ''),
		'can_edit_news' => array('yn', 'Can edit news articles', ''),
		'can_delete_news' => array('yn', 'Can delete nws articles', '')
		);
		
	$pm_per = array('can_use_pm' => array('yn', 'Can use PM system', ''),
		'max_stored_pm' => array('inputtext', 'Max. Number of storable PM', 'Put \'0\' for unlimited.'),
		'max_mass_pm' => array('inputtext', 'Max. Number users allowed to mass PM?', 'Put \'0\' for unlimited.'),
		'can_report_pm' => array('yn', 'Can repost PM', '')
		);
	
	$shoutbox_per = array('can_shout' => array('yn', 'Can shout', 'Will allow him to see and use the shoutbox'),
		'can_del_shout' => array('yn', 'Can Delete Shouts', 'If enabled the users of this group will be able to delete shouts')
		);
			
	$permissions = array('Topic Permissions' => $topic_per,
					'Posting Permissions' => $post_per,
					'Poll Permissions' => $poll_per,
					'Attachments Permissions' => $att_per,
					'News Permissions' => $news_per,
					'Personal Message Permissions' => $pm_per,
					'Administration Permissions' => $admin_per,
					'General Board Permissions' => $forum_per,
					'Profile options' => $profile_per,
					'Shout Box Permissions' => $shoutbox_per
					);
	
	
	echo '<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
		<tr>
		<td class="adcbg" colspan="2">
		Permissions
		</td>
		</tr>';
	
	foreach($permissions as $k => $v){
	
	echo '<tr>
	<td class="adcbg2" colspan="2">
	'.$k.'
	</td>
	</tr>'; 
	
	foreach($v as $pk => $pv){
	
	echo '<tr>
	<td class="adbg" width="50%">
	'.$pv[1].' :<br />
	'.(empty($pv[2]) ? '' : '<font class="adexp">'.$pv[2].'</font>').'
	</td>
	<td class="adbg" align="left">
	&nbsp;&nbsp;&nbsp;&nbsp;'.call_user_func($pv[0], $pk).'
	</td>
	</tr>';
	
	}
	
	}
	
	echo '<tr>
	<td class="adbg" width="50%" valign="top">
	Show a message to this group :<br />
	<font class="adexp">Type in as much as you want. BBC is also allowed.</font>
	</td>
	<td class="adbg" align="left">
	&nbsp;&nbsp;&nbsp;&nbsp;<textarea cols="30" rows="5" name="group_message">'.(empty($_POST['group_message']) ? $user_group['group_message'] : $_POST['group_message']).'</textarea>
	</td>
	</tr>
	
	
	</table>	
	<br /><br />';

	?>
	
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="addug" value="Submit" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}


?>