<?php

if(!defined('AEF'))
{
die('Hacking Attempt');
}


function fileback_theme(){

global $globals, $theme, $error;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - File and Folder Backup');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/fileback.gif">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">File and Folder Backup</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	This feature will allow you to backup the files and folder of your AEF board. You can backup a particular folder also within AEF.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="filebackform">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Backup options
		</td>
		</tr>
		
		<tr>
		<td width="40%" class="adbg">
		<b>Folder :</b><br />
		<font class="adexp">The folder you want to backup.</font>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" size="45"  name="folderpath" value="<?php echo (empty($_POST['folderpath']) ? $globals['server_url'] : $_POST['folderpath']);?>" />
		</td>
		</tr>
				
		<tr>
		<td class="adbg">
		<b>Compression :</b>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="radio"  name="compression" value="zip" <?php echo (empty($_POST['compression']) ? 'checked="checked"' : ($_POST['compression'] == 'zip' ? 'checked="checked"' : ''));?> />&nbsp;Zip&nbsp;&nbsp;
        <input type="radio"  name="compression" value="tar" <?php echo (isset($_POST['compression']) && $_POST['compression'] == 'tar' ? 'checked="checked"' : '');?> />&nbsp;Tar&nbsp;&nbsp;
        <input type="radio"  name="compression" value="tgz" <?php echo (isset($_POST['compression']) && $_POST['compression'] == 'tgz' ? 'checked="checked"' : '');?> />&nbsp;Tgz&nbsp;&nbsp;
        <input type="radio"  name="compression" value="tbz" <?php echo (isset($_POST['compression']) && $_POST['compression'] == 'tbz' ? 'checked="checked"' : '');?> />&nbsp;Tbz&nbsp;&nbsp;
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b>Store locally :</b><br />
		<font class="adexp">If you want to download the archived file now please <b>do not</b> fill this text box. If you want to store the archived file locally on this server then please specify the path.</font>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" size="45"  name="localpath" value="<?php echo (empty($_POST['localpath']) ? '' : $_POST['localpath']);?>" />
		</td>
		</tr>
				
	</table>
	
	<br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="startfileback" value="Submit" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}


function dbback_theme(){

global $globals, $theme, $error, $dbtables;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Database Backup');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/db.gif">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Database Backup</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	In this section of the board you can backup your AEF Boards database. Please take regular backups of your Database.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="dbbackform">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Database Backup Options
		</td>
		</tr>
		
		<tr>
		<td width="40%" class="adbg">
		<b>Tables :</b><br />
		<font class="adexp">Select the tables you want to backup.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<select name="tables[]" multiple="multiple" size="8" id="tables">
        <?php
		$tables = $dbtables;
		ksort($tables);
		
		foreach($tables as $k => $v){
			echo '<option value="'.$k.'" '.(isset($_POST['tables']) && in_array($k, $_POST['tables']) ? 'selected="selected"' : (empty($_POST['tables']) ? 'selected="selected"' : '')).'>'.$v.'</option>';
		}
		?>
        </select><br />
        &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" onclick="selectall('tables', true);" name="selall" />Select All&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" onclick="selectall('tables', false);" name="selall" />Unselect All
        <script language="JavaScript" type="text/javascript">
		function selectall(id, val){
			for(var i = 0; i < $(id).options.length; i++){
				$(id).options[i].selected = val;
			}
		};
		</script>
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><input type="checkbox" name="structure" <?php echo (isset($_POST['dbback']) ? (isset($_POST['structure']) ? 'checked="checked"' : '' ) : 'checked="checked"') ;	?> />Structure :</b>
		</td>
		<td class="adbg" align="left">
        &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="droptable" <?php echo (isset($_POST['dbback']) ? (isset($_POST['droptable']) ? 'checked="checked"' : '' ) : 'checked="checked"') ;	?> />Add <b>DROP TABLE</b><br />
        &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="ifnotexists" <?php echo (isset($_POST['dbback']) ? (isset($_POST['ifnotexists']) ? 'checked="checked"' : '' ) : 'checked="checked"') ;	?> />Add <b>IF NOT EXISTS</b><br />
        &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="autoincrement" <?php echo (isset($_POST['dbback']) ? (isset($_POST['autoincrement']) ? 'checked="checked"' : '' ) : '') ;	?> />Add <b>Auto Increment</b> values<br />
        &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="backquotes" <?php echo (isset($_POST['dbback']) ? (isset($_POST['backquotes']) ? 'checked="checked"' : '' ) : 'checked="checked"') ;	?> />Enclose table and field names with <b>backquotes</b><br />
		</td>
		</tr>
		
		<tr>
		<td class="adbg">
		<b><input type="checkbox" name="data" <?php echo (isset($_POST['dbback']) ? (isset($_POST['data']) ? 'checked="checked"' : '' ) : 'checked="checked"') ;	?> />Data :</b>
		</td>
		<td class="adbg" align="left">
        &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="delayed" <?php echo (isset($_POST['dbback']) ? (isset($_POST['delayed']) ? 'checked="checked"' : '' ) : '') ;	?> />Use Delayed inserts<br />
        &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="ignore" <?php echo (isset($_POST['dbback']) ? (isset($_POST['ignore']) ? 'checked="checked"' : '' ) : '') ;	?> />Use Ignore inserts<br />
		</td>
		</tr>
        
        <tr>
		<td class="adbg">
		<b>Compression :</b>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="radio"  name="compression" value="none" <?php echo (empty($_POST['compression']) ? 'checked="checked"' : (isset($_POST['compression']) && $_POST['compression'] == 'none' ? 'checked="checked"' : ''));?> />&nbsp;None&nbsp;&nbsp;
         <input type="radio"  name="compression" value="zip" <?php echo (isset($_POST['compression']) && $_POST['compression'] == 'zip' ? 'checked="checked"' : '');?> />&nbsp;Zip&nbsp;&nbsp;
        <input type="radio"  name="compression" value="gzip" <?php echo (isset($_POST['compression']) && $_POST['compression'] == 'gzip' ? 'checked="checked"' : '');?> />&nbsp;GZip&nbsp;&nbsp;
        <input type="radio"  name="compression" value="bzip" <?php echo (isset($_POST['compression']) && $_POST['compression'] == 'bzip' ? 'checked="checked"' : '');?> />&nbsp;BZip&nbsp;&nbsp;
        
		</td>
		</tr>
        
        <tr>
		<td class="adbg">
		<b>Store locally :</b><br />
		<font class="adexp">If you want to download the archived file now please <b>do not</b> fill this text box. If you want to store the archived file locally on this server then please specify the path.</font>
		</td>
		<td class="adbg" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" size="45"  name="localpath" value="<?php echo (empty($_POST['localpath']) ? '' : $_POST['localpath']);?>" />
		</td>
		</tr>
		
	</table>
	
	<br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="dbback" value="Submit" />
		</td>
		</tr>
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}

?>