<?php

function usercpindex_theme(){

global $globals, $theme;

	//The global User CP Headers
	usercphead('Users Control Panel');
	
	?>
<table width="100%" cellpadding="4" cellspacing="4" border="0">

<tr>
<td width="50%">

<table width="100%" cellpadding="1" cellspacing="1" onmouseover="this.className='ucpon'" onmouseout="this.className='ucpnor'" class="ucpnor" border="0" onclick="window.location='<?php echo $globals['index_url'];?>act=usercp&ucpact=profile'">
<tr>
<td width="30%"><img src="<?php echo $theme['images'];?>usercp/general.gif" /></td>
<td class="ucpicol"><font class="ucpihtxt">Your Profile</font><br />
Change your profile, lets the members know something about you.</td>
</tr>
</table>

</td>

<td width="50%">

<table width="100%" cellpadding="1" cellspacing="1" onmouseover="this.className='ucpon'" onmouseout="this.className='ucpnor'" class="ucpnor" border="0" onclick="window.location='<?php echo $globals['index_url'];?>act=usercp&ucpact=account'">
<tr>
<td width="30%"><img src="<?php echo $theme['images'];?>usercp/account.gif" /></td>
<td class="ucpicol"><font class="ucpihtxt">Account Settings</font><br />
Here you can change your password, set a secret question and answer for password retrieval.</td>
</tr>
</table>

</td>
</tr>

<tr>
<td width="50%">

<table width="100%" cellpadding="1" cellspacing="1" onmouseover="this.className='ucpon'" onmouseout="this.className='ucpnor'" class="ucpnor" border="0" onclick="window.location='<?php echo $globals['index_url'];?>act=usercp&ucpact=inbox'">
<tr>
<td width="30%"><img src="<?php echo $theme['images'];?>usercp/inbox.gif" /></td>
<td class="ucpicol"><font class="ucpihtxt">Inbox</font><br />
Check your inbox for some messages send to you by others.</td>
</tr>
</table>

</td>

<td width="50%">

<table width="100%" cellpadding="1" cellspacing="1" onmouseover="this.className='ucpon'" onmouseout="this.className='ucpnor'" class="ucpnor" border="0" onclick="window.location='<?php echo $globals['index_url'];?>act=usercp&ucpact=writepm'">
<tr>
<td width="30%"><img src="<?php echo $theme['images'];?>usercp/compose.gif" /></td>
<td class="ucpicol"><font class="ucpihtxt">Compose PM</font><br />
Send a new Personal Message to members on the board.</td>
</tr>
</table>

</td>
</tr>

<tr>
<td width="50%">

<table width="100%" cellpadding="1" cellspacing="1" onmouseover="this.className='ucpon'" onmouseout="this.className='ucpnor'" class="ucpnor" border="0" onclick="window.location='<?php echo $globals['index_url'];?>act=usercp&ucpact=searchpm'">
<tr>
<td width="30%"><img src="<?php echo $theme['images'];?>usercp/searchpm.gif" /></td>
<td class="ucpicol"><font class="ucpihtxt">Search PM</font><br />
Search through all the Personal Messages.</td>
</tr>
</table>

</td>

<td width="50%">

<table width="100%" cellpadding="1" cellspacing="1" onmouseover="this.className='ucpon'" onmouseout="this.className='ucpnor'" class="ucpnor" border="0" onclick="window.location='<?php echo $globals['index_url'];?>act=usercp&ucpact=emptyfolders'">
<tr>
<td width="30%"><img src="<?php echo $theme['images'];?>usercp/bin.gif" /></td>
<td class="ucpicol"><font class="ucpihtxt">Recycle PM</font><br />
Here you can empty certain Personal Message Folders.</td>
</tr>
</table>

</td>
</tr>

<tr>
<td width="50%">

<table width="100%" cellpadding="1" cellspacing="1" onmouseover="this.className='ucpon'" onmouseout="this.className='ucpnor'" class="ucpnor" border="0" onclick="window.location='<?php echo $globals['index_url'];?>act=usercp&ucpact=emailpmset'">
<tr>
<td width="30%"><img src="<?php echo $theme['images'];?>usercp/emailpmsettings.gif" /></td>
<td class="ucpicol"><font class="ucpihtxt">Email & PM Settings</font><br />
In this section you can change your email and personal message settings.</td>
</tr>
</table>

</td>

<td width="50%">

<table width="100%" cellpadding="1" cellspacing="1" onmouseover="this.className='ucpon'" onmouseout="this.className='ucpnor'" class="ucpnor" border="0" onclick="window.location='<?php echo $globals['index_url'];?>act=usercp&ucpact=forumset'">
<tr>
<td width="30%"><img src="<?php echo $theme['images'];?>usercp/boardsettings.gif" /></td>
<td class="ucpicol"><font class="ucpihtxt">Forum Settings</font><br />
Personalise the board the way you want it to.</td>
</tr>
</table>

</td>
</tr>

<tr>
<td width="50%">

<table width="100%" cellpadding="1" cellspacing="1" onmouseover="this.className='ucpon'" onmouseout="this.className='ucpnor'" class="ucpnor" border="0" onclick="window.location='<?php echo $globals['index_url'];?>act=usercp&ucpact=topicsub'">
<tr>
<td width="30%"><img src="<?php echo $theme['images'];?>usercp/topicnotifications.gif" /></td>
<td class="ucpicol"><font class="ucpihtxt">Topic Subscriptions</font><br />
Here you can manage all the topics you have subscribed to.</td>
</tr>
</table>

</td>

<td width="50%">

<table width="100%" cellpadding="1" cellspacing="1" onmouseover="this.className='ucpon'" onmouseout="this.className='ucpnor'" class="ucpnor" border="0" onclick="window.location='<?php echo $globals['index_url'];?>act=usercp&ucpact=forumsub'">
<tr>
<td width="30%"><img src="<?php echo $theme['images'];?>usercp/forumnotifications.gif" /></td>
<td class="ucpicol"><font class="ucpihtxt">Forum Subscriptions</font><br />
Here you can manage all the forum subscriptions.</td>
</tr>
</table>

</td>
</tr>

</table>
	<?php	
	
	//The global User CP Footers
	usercpfoot();

}



?>