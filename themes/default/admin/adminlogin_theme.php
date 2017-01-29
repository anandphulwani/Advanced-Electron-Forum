<?php

if(!defined('AEF')){

	die('Hacking Attempt');

}



function adminlogin_theme(){

global $error, $globals, $theme, $user;

	//The header
	aefheader('Administration Center - Login');
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="adminloginform" >
<br />	
<table width="60%" cellpadding="0" cellspacing="0" align="center">
<tr>
<td>
<table width="100%" cellpadding="0" cellspacing="0"><tr>
<td class="pcbgl"></td>
<td class="pcbg" align="left">Security Login</td>
<td class="pcbgr"></td>		
</tr>
</table>
</td>
</tr>

<tr>
<td>
	
<table width="100%" cellpadding="5" cellspacing="1" class="cbgbor">

<tr>
<td class="ucpfcbg1" colspan="2" align="center">
<img src="<?php echo $theme['images'];?>admin/login.png" />
</td>
</tr>

<tr>
<td width="30%" class="etrc">
<b>Username :</b>
</td>
<td class="etrc" align="left">
<input type="text" size="40" name="aduser" value="<?php echo $user['username'];?>" disabled="disabled" />
</td>
</tr>

<tr>
<td width="30%" class="etrc">
<b>Password :</b>
</td>
<td class="etrc" align="left">
<input type="password" size="40" name="adpass" />
</td>
</tr>

<tr>
<td colspan="2" class="etrc" style="text-align:center">
<input type="submit" name="adminlogin" value="Submit" />
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
<script language="JavaScript" type="text/javascript">
document.forms.adminloginform.adpass.focus();
</script>
	
	<?php
	
	//The defualt footers
	aeffooter();

}





?>