<?php

function usercphead($title = ''){

global $globals, $theme, $ucpact;
	
	//Global Headers
	aefheader($title);
	
	echo '<link rel="stylesheet" type="text/css" href="'.$theme['url'].'/usercp.css" />
	<br />
	<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
	<td width="20%" valign="top" style="padding-right:10px">

	<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f3f2f2">      
      <tr>
		<td class="ucpsidehead">
		&nbsp;&nbsp;&nbsp;<img src="'.$theme['images'].'usercp/profile.gif" />&nbsp;&nbsp;&nbsp;Profile
		</td>
	  <tr>
      <tr>
		<td class="'.($ucpact == 'profile' ? 'ucpsidesel' : 'ucpsidelink').'">
		<a href="'.$globals['index_url'].'act=usercp&ucpact=profile">General</a>
		</td>
	  <tr>
      <tr>
		<td class="'.($ucpact == 'account' ? 'ucpsidesel' : 'ucpsidelink').'">
		<a href="'.$globals['index_url'].'act=usercp&ucpact=account">Account</a>
		</td>
	  <tr>
      <tr>
		<td class="'.($ucpact == 'signature' ? 'ucpsidesel' : 'ucpsidelink').'">
		<a href="'.$globals['index_url'].'act=usercp&ucpact=signature">Signature</a>
		</td>
	  <tr>
      <tr>
		<td class="'.($ucpact == 'avatar' ? 'ucpsidesel' : 'ucpsidelink').'">
		<a href="'.$globals['index_url'].'act=usercp&ucpact=avatar">Avatar</a>
		</td>
	  <tr>
      <tr>
		<td class="'.($ucpact == 'personalpic' ? 'ucpsidesel' : 'ucpsidelink').'">
		<a href="'.$globals['index_url'].'act=usercp&ucpact=personalpic">Personal Picture</a>
		</td>
	  <tr>
      
      <tr>
		<td class="ucpsidehead">
		&nbsp;&nbsp;&nbsp;<img src="'.$theme['images'].'usercp/pm.gif" />&nbsp;&nbsp;Messages
		</td>
	  <tr>
      <tr>
		<td class="'.($ucpact == 'inbox' ? 'ucpsidesel' : 'ucpsidelink').'">
		<a href="'.$globals['index_url'].'act=usercp&ucpact=inbox">&nbsp;&nbsp;&nbsp;<img src="'.$theme['images'].'smallarrow.gif" /> &nbsp;Inbox</a>
		</td>
	  <tr>
      <tr>
		<td class="'.($ucpact == 'drafts' ? 'ucpsidesel' : 'ucpsidelink').'">
		<a href="'.$globals['index_url'].'act=usercp&ucpact=drafts">&nbsp;&nbsp;&nbsp;<img src="'.$theme['images'].'smallarrow.gif" /> &nbsp;Drafts</a>
		</td>
	  <tr>
      <tr>
		<td class="'.($ucpact == 'sentitems' ? 'ucpsidesel' : 'ucpsidelink').'">
		<a href="'.$globals['index_url'].'act=usercp&ucpact=sentitems">&nbsp;&nbsp;&nbsp;<img src="'.$theme['images'].'smallarrow.gif" /> &nbsp;Sent Items</a>
		</td>
	  <tr>
      <tr>
		<td class="'.($ucpact == 'writepm' ? 'ucpsidesel' : 'ucpsidelink').'">
		<a href="'.$globals['index_url'].'act=usercp&ucpact=writepm">Compose</a>
		</td>
	  <tr>
      <tr>
		<td class="'.($ucpact == 'emptyfolders' ? 'ucpsidesel' : 'ucpsidelink').'">
		<a href="'.$globals['index_url'].'act=usercp&ucpact=emptyfolders">Empty Folders</a>
		</td>
	  <tr>
      <tr>
		<td class="'.($ucpact == 'searchpm' ? 'ucpsidesel' : 'ucpsidelink').'">
		<a href="'.$globals['index_url'].'act=usercp&ucpact=searchpm">Search</a>
		</td>
	  <tr>
      <tr>
		<td class="'.($ucpact == 'trackpm' ? 'ucpsidesel' : 'ucpsidelink').'">
		<a href="'.$globals['index_url'].'act=usercp&ucpact=trackpm">Track</a>
		</td>
	  <tr>
      <tr>
		<td class="'.($ucpact == 'prunepm' ? 'ucpsidesel' : 'ucpsidelink').'">
		<a href="'.$globals['index_url'].'act=usercp&ucpact=prunepm">Prune</a>
		</td>
	  <tr>
      
      <tr>
		<td class="ucpsidehead">
		&nbsp;&nbsp;&nbsp;<img src="'.$theme['images'].'usercp/settings.gif" />&nbsp;&nbsp;&nbsp;Settings
		</td>
	  <tr>
      <tr>
		<td class="'.($ucpact == 'forumset' ? 'ucpsidesel' : 'ucpsidelink').'">
		<a href="'.$globals['index_url'].'act=usercp&ucpact=forumset">Board</a>
		</td>
	  <tr>
      <tr>
		<td class="'.($ucpact == 'emailpmset' ? 'ucpsidesel' : 'ucpsidelink').'">
		<a href="'.$globals['index_url'].'act=usercp&ucpact=emailpmset">Email &amp; PM</a>
		</td>
	  <tr>
      <tr>
		<td class="'.($ucpact == 'themeset' ? 'ucpsidesel' : 'ucpsidelink').'">
		<a href="'.$globals['index_url'].'act=usercp&ucpact=themeset&theme_id='.$globals['theme_id'].'">Theme</a>
		</td>
	  <tr>      
      
      <tr>
		<td class="ucpsidehead">
		&nbsp;&nbsp;&nbsp;<img src="'.$theme['images'].'usercp/notifications.gif" />&nbsp;&nbsp;Notifications
		</td>
	  <tr>
      <tr>
		<td class="'.($ucpact == 'topicsub' ? 'ucpsidesel' : 'ucpsidelink').'">
		<a href="'.$globals['index_url'].'act=usercp&ucpact=topicsub">Topic</a>
		</td>
	  <tr>
      <tr>
		<td class="'.($ucpact == 'forumsub' ? 'ucpsidesel' : 'ucpsidelink').'">
		<a href="'.$globals['index_url'].'act=usercp&ucpact=forumsub">Forum</a>
		</td>
	  <tr>      
    </table>
	
    </td>
    
	<td valign="top">
    
    <div class="ucptab">
	<table width="100%" border="0" cellpadding="4" cellspacing="0">
	<tr>
    
    <td valign="bottom" align="center" '.(in_array($ucpact, array('profile', 'account', 'signature', 'avatar', 'personalpic')) ? 'class="ucpicosel"' : 'onmouseover="this.className=\'ucpicoon\'" onmouseout="this.className=\'ucpiconor\'" class="ucpiconor" onclick="window.location=\''.$globals['index_url'].'act=usercp&ucpact=profile\'"').' width="25%">
    <img src="'.$theme['images'].'usercp/profile.gif" /><br />
    <div class="icoexp">Profile</div>
    </td>
    
    <td valign="bottom" align="center" '.(in_array($ucpact, array('showpm', 'showsentpm', 'inbox', 'sentitems', 'drafts', 'trackpm', 'writepm', 'searchpm', 'sendsaved', 'prunepm', 'emptyfolders', 'delpm')) ? 'class="ucpicosel"' : 'onmouseover="this.className=\'ucpicoon\'" onmouseout="this.className=\'ucpiconor\'" class="ucpiconor" onclick="window.location=\''.$globals['index_url'].'act=usercp&ucpact=inbox\'"').' width="25%">
    <img src="'.$theme['images'].'usercp/pm.gif" /><br />
    <div class="icoexp">Messages</div>
    </td>
    
    <td valign="bottom" align="center" '.(in_array($ucpact, array('emailpmset', 'forumset', 'themeset')) ? 'class="ucpicosel"' : 'onmouseover="this.className=\'ucpicoon\'" onmouseout="this.className=\'ucpiconor\'" class="ucpiconor" onclick="window.location=\''.$globals['index_url'].'act=usercp&ucpact=forumset\'"').' width="25%">
    <img src="'.$theme['images'].'usercp/settings.gif" /><br />
    <div class="icoexp">Settings</div>
    </td>
    
    <td valign="bottom" align="center" '.(in_array($ucpact, array('topicsub', 'forumsub')) ? 'class="ucpicosel"' : 'onmouseover="this.className=\'ucpicoon\'" onmouseout="this.className=\'ucpiconor\'" class="ucpiconor" onclick="window.location=\''.$globals['index_url'].'act=usercp&ucpact=topicsub\'"').' width="25%">
    <img src="'.$theme['images'].'usercp/notifications.gif" /><br />
    <div class="icoexp">Notifications</div>
    </td>
    
	</tr>
	</table>
    <table width="100%" border="0" cellpadding="4" cellspacing="0" class="ucpsubtab">
		<tr>';
		
		if(in_array($ucpact, array('profile', 'account', 'signature', 'avatar', 'personalpic'))){
		
			echo '<td class="'.($ucpact == 'profile' ? 'ucpstsel' : 'ucpst').'" align="center">
			<a href="'.$globals['index_url'].'act=usercp&ucpact=profile">General</a>
			</td>
			<td class="'.($ucpact == 'account' ? 'ucpstsel' : 'ucpst').'" align="center">
			<a href="'.$globals['index_url'].'act=usercp&ucpact=account">Account</a>
			</td>
			<td class="'.($ucpact == 'signature' ? 'ucpstsel' : 'ucpst').'" align="center">
			<a href="'.$globals['index_url'].'act=usercp&ucpact=signature">Signature</a>
			</td>
			<td class="'.($ucpact == 'avatar' ? 'ucpstsel' : 'ucpst').'" align="center">
			<a href="'.$globals['index_url'].'act=usercp&ucpact=avatar">Avatar</a>
			</td>
			<td class="'.($ucpact == 'personalpic' ? 'ucpstsel' : 'ucpst').'" align="center" width="25%">
			<a href="'.$globals['index_url'].'act=usercp&ucpact=personalpic">Personal Picture</a>
			</td>';
		
		}elseif(in_array($ucpact, array('showpm', 'showsentpm', 'inbox', 'sentitems', 'drafts', 'trackpm', 'writepm', 'searchpm', 'delpm', 'emptyfolders', 'prunepm', 'sendsaved'))){
		
			echo '<td class="'.($ucpact == 'inbox' ? 'ucpstsel' : 'ucpst').'" align="center">
			<a href="'.$globals['index_url'].'act=usercp&ucpact=inbox">Inbox</a>
			</td>
			<td class="'.($ucpact == 'drafts' ? 'ucpstsel' : 'ucpst').'" align="center">
			<a href="'.$globals['index_url'].'act=usercp&ucpact=drafts">Drafts</a>
			</td>
			<td class="'.($ucpact == 'sentitems' ? 'ucpstsel' : 'ucpst').'" align="center">
			<a href="'.$globals['index_url'].'act=usercp&ucpact=sentitems">Sent</a>
			</td>
			<td class="'.($ucpact == 'writepm' ? 'ucpstsel' : 'ucpst').'" align="center">
			<a href="'.$globals['index_url'].'act=usercp&ucpact=writepm">Compose</a>
			</td>
			<td class="'.($ucpact == 'emptyfolders' ? 'ucpstsel' : 'ucpst').'" align="center">
			<a href="'.$globals['index_url'].'act=usercp&ucpact=emptyfolders">Empty</a>
			</td>
			<td class="'.($ucpact == 'searchpm' ? 'ucpstsel' : 'ucpst').'" align="center">
			<a href="'.$globals['index_url'].'act=usercp&ucpact=searchpm">Search</a>
			</td>
			<td class="'.($ucpact == 'trackpm' ? 'ucpstsel' : 'ucpst').'" align="center">
			<a href="'.$globals['index_url'].'act=usercp&ucpact=trackpm">Track</a>
			</td>
			<td class="'.($ucpact == 'prunepm' ? 'ucpstsel' : 'ucpst').'" align="center">
			<a href="'.$globals['index_url'].'act=usercp&ucpact=prunepm">Prune</a>
			</td>';
		
		}elseif(in_array($ucpact, array('forumset', 'themeset', 'emailpmset'))){
		
			echo '<td class="'.($ucpact == 'forumset' ? 'ucpstsel' : 'ucpst').'" align="center">
			<a href="'.$globals['index_url'].'act=usercp&ucpact=forumset">Board</a>
			</td>
			<td class="'.($ucpact == 'emailpmset' ? 'ucpstsel' : 'ucpst').'" align="center">
			<a href="'.$globals['index_url'].'act=usercp&ucpact=emailpmset">Email & PM</a>
			</td>
			<td class="'.($ucpact == 'themeset' ? 'ucpstsel' : 'ucpst').'" align="center">
			<a href="'.$globals['index_url'].'act=usercp&ucpact=themeset&theme_id='.$globals['theme_id'].'">Theme</a>
			</td>';
		
		}elseif(in_array($ucpact, array('topicsub', 'forumsub'))){
		
			echo '<td class="'.($ucpact == 'topicsub' ? 'ucpstsel' : 'ucpst').'" align="center" width="15%">
			<a href="'.$globals['index_url'].'act=usercp&ucpact=topicsub">Topic</a>
			</td>
			<td class="'.($ucpact == 'forumsub' ? 'ucpstsel' : 'ucpst').'" align="left">
			<a href="'.$globals['index_url'].'act=usercp&ucpact=forumsub">Forum</a>
			</td>';
		
		}
		
		echo '</tr>
	</table>
    </div>
    <br />';
	
}//end function User CP head


function usercpfoot(){

global $globals, $theme;

echo '</td>
	</tr>
	</table><br /><br />';
	
	//Global footers
	aeffooter();

}//end function adminfoot

?>