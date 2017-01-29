<?php

if(!defined('AEF'))
{
die('Hacking Attempt');
}


function manval_theme(){

global $globals, $theme, $members, $error, $count;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Manage Validating');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/userapprove.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Manage Validating</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	Below is a list of members on the board who are to validate their accounts.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>

	<form method="get" action="<?php echo $globals['index_url'];?>" name="sortform" >
	<table width="100%" class="cbor" cellpadding="6" cellspacing="1">		
	<tr>
	<td>		
	<input type="hidden" name="act" value="admin" />
	<input type="hidden" name="adact" value="approvals" />
	<input type="hidden" name="seadact" value="manval" />
	<input type="hidden" name="mpg" value="<?php echo (empty($_GET['mpg']) ? '' : $_GET['mpg'] );?>" />
	Sort by: <select name="sortby">
	<option value="1" <?php echo (!empty($_GET['sortby']) && trim($_GET['sortby']) == 1 ? ' selected="selected"' : '');?> >User ID</option>
	<option value="2" <?php echo (!empty($_GET['sortby']) && trim($_GET['sortby']) == 2 ? ' selected="selected"' : '');?> >Username</option>
	<option value="3" <?php echo (!empty($_GET['sortby']) && trim($_GET['sortby']) == 3 ? ' selected="selected"' : '');?> >Email</option>
	<option value="4" <?php echo (!empty($_GET['sortby']) && trim($_GET['sortby']) == 4 ? ' selected="selected"' : '');?> >Registration Time</option>
	</select>
	&nbsp;&nbsp;
	<select name="order">
	<option value="1" <?php echo (!empty($_GET['order']) && trim($_GET['order']) == 1 ? ' selected="selected"' : '');?> >Ascending</option>
	<option value="2" <?php echo (!empty($_GET['order']) && trim($_GET['order']) == 2 ? ' selected="selected"' : '');?> >Descending</option>
	</select>&nbsp;&nbsp;&nbsp;&nbsp;
	Page : <select name="mpg">	
	<?php 
	if(empty($count)){
	
	echo '<option value="1" >1</option>';
	
	}else{
	$num_pages = ceil($count/$globals['maxmemberlist']);
	
	for($i = 1; $i <= $num_pages; $i++){
	
		echo '<option value="'.$i.'" '.((isset($_GET['mpg']) && trim($_GET['mpg']) == $i ) ? 'selected="selected"' : '' ).' >'.$i.'</option>';
	
	}
	}
	?>
	</select>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" value="Go" />
	</td>				
	</tr>		
	</table>
	</form>
	
	<br />
		<script type="text/javascript">
	<!-- Begin
	//var checkflag = "false";
	function check(field, checker) {
	
	//alert(checker);
	
		if (checker.value == "0") {
		
			for (i = 0; i < field.length; i++) {
		 
			field[i].checked = true;}
			//checkflag = "true";
			checker.value = "1";
		  
		}else{
		
			for (i = 0; i < field.length; i++) {
			  
				field[i].checked = false; 
				
			}
			
			//checkflag = "false";
			checker.value = "0";
		
		}
		
	}
	//  End -->
	</script>
	<form action="" method="post" name="manvalform">
	
	<table width="100%" class="cbor" cellpadding="6" cellspacing="1">		
	<tr>
	<td align="right">		
	With Selected : <select name="dothis">
	<option value="1" <?php echo (!empty($_GET['dothis']) && trim($_GET['dothis']) == 1 ? ' selected="selected"' : '');?> >Activate</option>
	<option value="2" <?php echo (!empty($_GET['dothis']) && trim($_GET['dothis']) == 2 ? ' selected="selected"' : '');?> >Activate and Send Mail</option>
	<option value="3" <?php echo (!empty($_GET['dothis']) && trim($_GET['dothis']) == 3 ? ' selected="selected"' : '');?> >Delete</option>
	<option value="4" <?php echo (!empty($_GET['dothis']) && trim($_GET['dothis']) == 4 ? ' selected="selected"' : '');?> >Delete and Send Mail</option>
	</select>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" value="Go" />		
	</td>				
	</tr>		
	</table>
	
	<br />
	
	<?php
	
	//The first row that is Headers
	echo'<table width="100%" class="cbor" cellpadding="6" cellspacing="1">
	
	<tr>
	<td class="ttcbg" width="10%">ID</td>
	<td class="ttcbg" width="20%" align="center">Username</td>
	<td class="ttcbg" width="35%" align="center">Email</td>
	<td class="ttcbg" width="30%" align="center">Registered On</td>
	<td class="ttcbg" width="5%" align="center">
	<input type=checkbox onClick="check(document.getElementsByName(\'uid[]\'), this)" value="0">
	</td>
	</tr>';
	
	if(empty($members)){
	
		echo '<tr>
		
		<td class="ucpflc" colspan="5">
		There are no members who have to activate their accounts.
		</td>
		
		</tr>';
	
	}else{
	
	
	foreach($members as $m => $mv){
	
		echo '<tr>
		
		<td class="ucpflc">
		<a href="'.$globals['index_url'].'mid='.$members[$m]['id'].'">'.$members[$m]['id'].'</a>
		</td>
		
		<td class="ucpflc">
		<a href="'.$globals['index_url'].'mid='.$members[$m]['id'].'">'.$members[$m]['username'].'</a>
		</td>
		
		<td class="ucpflc">
		<a href="mailto:'.$members[$m]['email'].'">'.$members[$m]['email'].'</a>
		</td>
		
		<td class="ucpflc" align="left">
		'.date("F j, Y", $members[$m]['r_time']).'
		</td>
		
		<td class="ucpflc">
		<input type=checkbox name="uid[]" value="'.$members[$m]['id'].'">
		</td>';
		
		echo '</tr>';
		
		}
		
	}
	
	echo '</table>	
	</form>';
		
	adminfoot();
	
}

function awapp_theme(){

global $globals, $theme, $members, $error, $count;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Users Awaiting Approval');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/userapprove.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Users Awaiting Approval</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	Below is a list of members on the board who require Admins Approval.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	<form method="get" action="<?php echo $globals['index_url'];?>" name="sortform" >
	<table width="100%" class="cbor" cellpadding="6" cellspacing="1">		
	<tr>
	<td>		
	<input type="hidden" name="act" value="admin" />
	<input type="hidden" name="adact" value="approvals" />
	<input type="hidden" name="seadact" value="awapp" />
	<input type="hidden" name="mpg" value="<?php echo (empty($_GET['mpg']) ? '' : $_GET['mpg'] );?>" />
	Sort by: <select name="sortby">
	<option value="1" <?php echo (!empty($_GET['sortby']) && trim($_GET['sortby']) == 1 ? ' selected="selected"' : '');?> >User ID</option>
	<option value="2" <?php echo (!empty($_GET['sortby']) && trim($_GET['sortby']) == 2 ? ' selected="selected"' : '');?> >Username</option>
	<option value="3" <?php echo (!empty($_GET['sortby']) && trim($_GET['sortby']) == 3 ? ' selected="selected"' : '');?> >Email</option>
	<option value="4" <?php echo (!empty($_GET['sortby']) && trim($_GET['sortby']) == 4 ? ' selected="selected"' : '');?> >Registration Time</option>
	</select>
	&nbsp;&nbsp;
	<select name="order">
	<option value="1" <?php echo (!empty($_GET['order']) && trim($_GET['order']) == 1 ? ' selected="selected"' : '');?> >Ascending</option>
	<option value="2" <?php echo (!empty($_GET['order']) && trim($_GET['order']) == 2 ? ' selected="selected"' : '');?> >Descending</option>
	</select>&nbsp;&nbsp;&nbsp;&nbsp;
	Page : <select name="mpg">	
	<?php 
	if(empty($count)){
	
	echo '<option value="1" >1</option>';
	
	}else{
	$num_pages = ceil($count/$globals['maxmemberlist']);
	
	for($i = 1; $i <= $num_pages; $i++){
	
		echo '<option value="'.$i.'" '.((isset($_GET['mpg']) && trim($_GET['mpg']) == $i ) ? 'selected="selected"' : '' ).' >'.$i.'</option>';
	
	}
	}
	?>
	</select>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" value="Go" />
	</td>				
	</tr>		
	</table>
	</form>
	
	<br />
		<script type="text/javascript">
	<!-- Begin
	//var checkflag = "false";
	function check(field, checker) {
	
	//alert(checker);
	
		if (checker.value == "0") {
		
			for (i = 0; i < field.length; i++) {
		 
			field[i].checked = true;}
			//checkflag = "true";
			checker.value = "1";
		  
		}else{
		
			for (i = 0; i < field.length; i++) {
			  
				field[i].checked = false; 
				
			}
			
			//checkflag = "false";
			checker.value = "0";
		
		}
		
	}
	//  End -->
	</script>
	<form action="" method="post" name="awappform">
	
	<table width="100%" class="cbor" cellpadding="6" cellspacing="1">		
	<tr>
	<td align="right">		
	With Selected : <select name="dothis">
	<option value="1" <?php echo (!empty($_GET['dothis']) && trim($_GET['dothis']) == 1 ? ' selected="selected"' : '');?> >Activate</option>
	<option value="2" <?php echo (!empty($_GET['dothis']) && trim($_GET['dothis']) == 2 ? ' selected="selected"' : '');?> >Activate and Send Mail</option>
	<option value="3" <?php echo (!empty($_GET['dothis']) && trim($_GET['dothis']) == 3 ? ' selected="selected"' : '');?> >Delete</option>
	<option value="4" <?php echo (!empty($_GET['dothis']) && trim($_GET['dothis']) == 4 ? ' selected="selected"' : '');?> >Delete and Send Mail</option>
	</select>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" value="Go" />		
	</td>				
	</tr>		
	</table>
	
	<br />
	
	<?php
	
	//The first row that is Headers
	echo'<table width="100%" class="cbor" cellpadding="6" cellspacing="1">
	
	<tr>
	<td class="ttcbg" width="10%">ID</td>
	<td class="ttcbg" width="20%" align="center">Username</td>
	<td class="ttcbg" width="35%" align="center">Email</td>
	<td class="ttcbg" width="30%" align="center">Registered On</td>
	<td class="ttcbg" width="5%" align="center">
	<input type=checkbox onClick="check(document.getElementsByName(\'uid[]\'), this)" value="0">
	</td>
	</tr>';
	
	if(empty($members)){
	
		echo '<tr>
		
		<td class="ucpflc" colspan="5">
		There are no members who require Admin approval.
		</td>
		
		</tr>';
	
	}else{
	
	
	foreach($members as $m => $mv){
	
		echo '<tr>
		
		<td class="ucpflc">
		<a href="'.$globals['index_url'].'mid='.$members[$m]['id'].'">'.$members[$m]['id'].'</a>
		</td>
		
		<td class="ucpflc">
		<a href="'.$globals['index_url'].'mid='.$members[$m]['id'].'">'.$members[$m]['username'].'</a>
		</td>
		
		<td class="ucpflc">
		<a href="mailto:'.$members[$m]['email'].'">'.$members[$m]['email'].'</a>
		</td>
		
		<td class="ucpflc" align="left">
		'.date("F j, Y", $members[$m]['r_time']).'
		</td>
		
		<td class="ucpflc">
		<input type=checkbox name="uid[]" value="'.$members[$m]['id'].'">
		</td>';
		
		echo '</tr>';
		
		}
		
	}
	
	echo '</table>	
	</form>';
		
	adminfoot();
	
}


function coppaapp_theme(){

global $globals, $theme, $members, $error, $count;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - COPPA Users Awaiting Approval');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/userapprove.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">COPPA Users Awaiting Approval</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	Below is a list of members on the board who require Admins Approval for their age restrictions.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	<form method="get" action="<?php echo $globals['index_url'];?>" name="sortform" >
	<table width="100%" class="cbor" cellpadding="6" cellspacing="1">		
	<tr>
	<td>		
	<input type="hidden" name="act" value="admin" />
	<input type="hidden" name="adact" value="approvals" />
	<input type="hidden" name="seadact" value="coppaapp" />
	<input type="hidden" name="mpg" value="<?php echo (empty($_GET['mpg']) ? '' : $_GET['mpg'] );?>" />
	Sort by: <select name="sortby">
	<option value="1" <?php echo (!empty($_GET['sortby']) && trim($_GET['sortby']) == 1 ? ' selected="selected"' : '');?> >User ID</option>
	<option value="2" <?php echo (!empty($_GET['sortby']) && trim($_GET['sortby']) == 2 ? ' selected="selected"' : '');?> >Username</option>
	<option value="3" <?php echo (!empty($_GET['sortby']) && trim($_GET['sortby']) == 3 ? ' selected="selected"' : '');?> >Email</option>
	<option value="4" <?php echo (!empty($_GET['sortby']) && trim($_GET['sortby']) == 4 ? ' selected="selected"' : '');?> >Registration Time</option>
	</select>
	&nbsp;&nbsp;
	<select name="order">
	<option value="1" <?php echo (!empty($_GET['order']) && trim($_GET['order']) == 1 ? ' selected="selected"' : '');?> >Ascending</option>
	<option value="2" <?php echo (!empty($_GET['order']) && trim($_GET['order']) == 2 ? ' selected="selected"' : '');?> >Descending</option>
	</select>&nbsp;&nbsp;&nbsp;&nbsp;
	Page : <select name="mpg">	
	<?php 
	if(empty($count)){
	
	echo '<option value="1" >1</option>';
	
	}else{
	$num_pages = ceil($count/$globals['maxmemberlist']);
	
	for($i = 1; $i <= $num_pages; $i++){
	
		echo '<option value="'.$i.'" '.((isset($_GET['mpg']) && trim($_GET['mpg']) == $i ) ? 'selected="selected"' : '' ).' >'.$i.'</option>';
	
	}
	}
	?>
	</select>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" value="Go" />
	</td>				
	</tr>		
	</table>
	</form>
	
	<br />
		<script type="text/javascript">
	<!-- Begin
	//var checkflag = "false";
	function check(field, checker) {
	
	//alert(checker);
	
		if (checker.value == "0") {
		
			for (i = 0; i < field.length; i++) {
		 
			field[i].checked = true;}
			//checkflag = "true";
			checker.value = "1";
		  
		}else{
		
			for (i = 0; i < field.length; i++) {
			  
				field[i].checked = false; 
				
			}
			
			//checkflag = "false";
			checker.value = "0";
		
		}
		
	}
	//  End -->
	</script>
	<form action="" method="post" name="coppaappform">
	
	<table width="100%" class="cbor" cellpadding="6" cellspacing="1">		
	<tr>
	<td align="right">		
	With Selected : <select name="dothis">
	<option value="1" <?php echo (!empty($_GET['dothis']) && trim($_GET['dothis']) == 1 ? ' selected="selected"' : '');?> >Activate</option>
	<option value="2" <?php echo (!empty($_GET['dothis']) && trim($_GET['dothis']) == 2 ? ' selected="selected"' : '');?> >Activate and Send Mail</option>
	<option value="3" <?php echo (!empty($_GET['dothis']) && trim($_GET['dothis']) == 3 ? ' selected="selected"' : '');?> >Delete</option>
	<option value="4" <?php echo (!empty($_GET['dothis']) && trim($_GET['dothis']) == 4 ? ' selected="selected"' : '');?> >Delete and Send Mail</option>
	</select>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" value="Go" />		
	</td>				
	</tr>		
	</table>
	
	<br />
	
	<?php
	
	//The first row that is Headers
	echo'<table width="100%" class="cbor" cellpadding="6" cellspacing="1">
	
	<tr>
	<td class="ttcbg" width="10%">ID</td>
	<td class="ttcbg" width="20%" align="center">Username</td>
	<td class="ttcbg" width="35%" align="center">Email</td>
	<td class="ttcbg" width="30%" align="center">Registered On</td>
	<td class="ttcbg" width="5%" align="center">
	<input type=checkbox onClick="check(document.getElementsByName(\'uid[]\'), this)" value="0">
	</td>
	</tr>';
	
	if(empty($members)){
	
		echo '<tr>
		
		<td class="ucpflc" colspan="5">
		There are no members who fall below age and require Admin approval.
		</td>
		
		</tr>';
	
	}else{
	
	
	foreach($members as $m => $mv){
	
		echo '<tr>
		
		<td class="ucpflc">
		<a href="'.$globals['index_url'].'mid='.$members[$m]['id'].'">'.$members[$m]['id'].'</a>
		</td>
		
		<td class="ucpflc">
		<a href="'.$globals['index_url'].'mid='.$members[$m]['id'].'">'.$members[$m]['username'].'</a>
		</td>
		
		<td class="ucpflc">
		<a href="mailto:'.$members[$m]['email'].'">'.$members[$m]['email'].'</a>
		</td>
		
		<td class="ucpflc" align="left">
		'.date("F j, Y", $members[$m]['r_time']).'
		</td>
		
		<td class="ucpflc">
		<input type=checkbox name="uid[]" value="'.$members[$m]['id'].'">
		</td>';
		
		echo '</tr>';
		
		}
		
	}
	
	echo '</table>	
	</form>';
		
	adminfoot();
	
}

?>