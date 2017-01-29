<?php

if(!defined('AEF')){

	die('Hacking Attempt');
	
}


function manskin_theme(){

global $globals, $theme, $error, $themes;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Theme Manager');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/themes.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Theme Manager</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	This is the place for changing the Boards Default Theme. Also you can change the theme of every member.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="manskinform">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Theme Manager
		</td>
		</tr>
				
		<tr>
		<td width="45%" class="adbg">
		<b>Default Theme :</b><br />
		<font class="adexp">The boards default theme.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;
		<select name="theme_id">
		<?php
		foreach($themes as $k => $v){
		echo '<option value="'.$themes[$k]['thid'].'" '.(isset($_POST['theme_id']) && $_POST['theme_id'] == $themes[$k]['thid'] ? 'selected="selected"' : ($globals['theme_id'] == $themes[$k]['thid'] ? 'selected="selected"' : '' )).' >'.$themes[$k]['th_name'].'</option>';
		}		
		?>
		</select>
		</td>
		</tr>
        		
		<tr>
		<td class="adbg">
		<b>Can user choose their theme ?</b><br />
		<font class="adexp">This will allow users to choose from the installed themes on the board.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="choose_theme"	<?php echo ($globals['choose_theme'] ? 'checked="checked"' : '');?> />
		</td>
		</tr>
        
        <tr>
		<td class="adbg" colspan="2" align="center">
		<input type="submit" name="editskin" value="Submit" />
		</td>
		</tr>
		
	</table>
	
	<br /><br />
	
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Reset Paths and URLs of themes
		</td>
		</tr>
				
		<tr>
		<td width="45%" class="adbg">
		<b>Base Path :</b><br />
		<font class="adexp">Reset all theme base paths to the one given.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="45"  name="path" value="<?php echo (empty($_POST['path']) ? $globals['themesdir'] : $_POST['path']);?>" />
		</td>
		</tr>
        		
		<tr>
		<td class="adbg">
		<b>Base URL</b><br />
		<font class="adexp">This will reset the base URLs of all the themes to the one given.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="45"  name="url" value="<?php echo (empty($_POST['url']) ? $globals['url'].'/themes' : $_POST['url']);?>" />
		</td>
		</tr>
        
        <tr>
		<td class="adbg" colspan="2" align="center">
		<input type="submit" name="resetpaths" value="Reset Paths and URLs" />
		</td>
		</tr>
		
	</table>
	
	</form>
	
    <script language="javascript" src="http://www.anelectron.com/themes.js" type="text/javascript"></script>
    
	<?php
	
	adminfoot();
	
}



function import_theme(){

global $globals, $theme, $error;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Import a theme');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/themes.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Import Themes</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	Here you can Install some new themes for the board.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="importform" enctype="multipart/form-data">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="3">
		Import Skin
		</td>
		</tr>
		
		<tr>
        <td width="5%" class="adbg"><input type="radio" name="importtype" id="fromfolder" value="1" <?php echo ((isset($_POST['importtype']) && ((int)$_POST['importtype'] == 1)) ? 'checked="checked"' : '');?> /></td>
		<td width="35%" class="adbg">
		<b>From a folder:</b><br />
		<font class="adexp">Specify the path of the theme.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="45"  name="folderpath" value="<?php echo (empty($_POST['th_path']) ? $globals['themesdir'].'/' : $_POST['th_path']);?>" onfocus="$('fromfolder').checked = true;" />
		</td>
		</tr>
        
        <tr>
        <td class="adbg"><input type="radio" name="importtype" id="fromweb" value="2" <?php echo ((isset($_POST['importtype']) && ((int)$_POST['importtype'] == 2)) ? 'checked="checked"' : '');?> /></td>
		<td class="adbg">
		<b>From the web:</b><br />
		<font class="adexp">Specify the URL of the theme on the net. The theme file must be a compressed archive (zip, tgz, tbz2, tar)</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="weburl" value="<?php echo (empty($_POST['weburl']) ? '' : $_POST['weburl']);?>" onfocus="$('fromweb').checked = true;" />
		</td>
		</tr>
        
        <tr>
        <td class="adbg"><input type="radio" name="importtype" id="fromfile" value="3" <?php echo ((isset($_POST['importtype']) && ((int)$_POST['importtype'] == 3)) ? 'checked="checked"' : '');?> /></td>
		<td class="adbg">
		<b>From a file on the server:</b><br />
		<font class="adexp">Specify the path of the compressed theme file (zip, tgz, tbz2, tar).</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40"  name="filepath" value="<?php echo (empty($_POST['filepath']) ? $globals['themesdir'].'/' : $_POST['filepath']);?>" onfocus="$('fromfile').checked = true;" />
		</td>
		</tr>
		
          <tr>
        <td class="adbg"><input type="radio" name="importtype" id="fromcomp" value="4" <?php echo ((isset($_POST['importtype']) && ((int)$_POST['importtype'] == 4)) ? 'checked="checked"' : '');?> /></td>
		<td class="adbg">
		<b>From a file on your computer:</b><br />
		<font class="adexp">Attach the compressed theme file (zip, tgz, tbz2, tar).</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" size="35"  name="uploadtheme" onfocus="$('fromcomp').checked = true;" />
		</td>
		</tr>
        
	</table>
	
	<br /><br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="importskin" value="Import" />
		</td>
		</tr>	
	</table>
	
	</form>
	
    <script language="javascript" src="http://www.anelectron.com/themes.js" type="text/javascript"></script>
    
	<?php
	
	adminfoot();
	
}


function uninstall_theme(){

global $globals, $theme, $error, $themes;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Uninstall Themes');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/themes.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Uninstall Themes</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	So you dont like some of the theme's you have installed. You can uninstall them here.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="uninstallform">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Uninstall Themes
		</td>
		</tr>
				
		<tr>
		<td width="45%" class="adbg">
		<b>Uninstall Theme :</b><br />
		<font class="adexp">Select the theme you want to uninstall.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;
		<select name="theme_id">
        <option value="0">Select Theme</option>
		<?php
		
		
		foreach($themes as $k => $v){
			
			if($k != 1){
		
			echo '<option value="'.$themes[$k]['thid'].'" '.(isset($_POST['theme_id']) && $_POST['theme_id'] == $themes[$k]['thid'] ? 'selected="selected"' : ($globals['theme_id'] == $themes[$k]['thid'] ? 'selected="selected"' : '' )).' >'.$themes[$k]['th_name'].'</option>';
			
			}
			
		}
		?>
		</select>
		</td>
		</tr>
        		
	</table>
	
	<br /><br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="uninstallskin" value="Submit" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}


function settings_theme(){

global $globals, $theme, $error, $themes, $theme_registry, $onload;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Edit Theme Settings');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/themes.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Edit Theme Settings</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	Here you can Edit Theme settings of different themes.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="settingsform">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Edit Theme Settings
		</td>
		</tr>
		
		<tr>
		<td width="40%" class="adbg">
		<b>Edit Settings of : </b><br />
		<font class="adexp">Select the theme the settings of which you wish to edit.</font>
		</td>
		<td class="adbg" align="left">
        <script type="text/javascript">
function change_theme_id(){
	redirect_url = '<?php echo $globals['url'].'/index.php?'.getallGET(array('theme_id'));?>';
	var theme_id = $('theme_id').value;	
	window.location = redirect_url+'&theme_id='+theme_id;
}
</script>
		&nbsp;&nbsp;&nbsp;&nbsp;<select name="id" id="theme_id" onchange="change_theme_id();">
	<?php
        
    foreach($themes as $tk => $tv){
    
        echo '<option value="'.$themes[$tk]['thid'].'" '.((isset($_GET['theme_id']) && (int)trim($_GET['theme_id']) == $themes[$tk]['thid']) ? 'selected="selected"' : '' ).' >'.$themes[$tk]['th_name'].'</option>';
    
    }
	
	?>
	</select>
		</td>
		</tr>
		
	</table>
<script language="JavaScript" src="<?php echo $theme['url'].'/js/tabber.js';?>" type="text/javascript">
</script>
<script type="text/javascript">
tabs = new tabber;
tabs.tabs = new Array('<?php echo implode('\', \'', array_keys($theme_registry));?>');
tabs.tabwindows = new Array('<?php echo implode('_win\', \'', array_keys($theme_registry));?>_win');
addonload('tabs.init();');
</script>    

	<br /><br />
<table width="100%" cellpadding="2" cellspacing="1" class="cbor">

<tr>
<td class="adcbg2" colspan="2" style="padding:4px;">
Settings
</td>
</tr>

<tr>
<td class="adbg">
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
	<td width="40%" class="adbg">
	<b>'.$theme_registry[$ck][$k]['shortexp'].'</b>
	'.(empty($theme_registry[$ck][$k]['exp']) ? '' : '<br />
	<font class="adexp">'.$theme_registry[$ck][$k]['exp'].'</font>').'
	</td>
	<td class="adbg" align="left">        
	&nbsp;&nbsp;&nbsp;&nbsp;'.call_user_func_array('html_'.$theme_registry[$ck][$k]['type'], array($k, $theme_registry[$ck][$k]['value'])).'
	</td>
	</tr>';
		
	}
	
	/*'a:5:{s:4:"name";s:8:"Electron";s:4:"path";s:50:"e:\program files\easyphp1-8\www\aef/themes/default";s:3:"url";s:35:"http://127.0.0.1/aef/themes/default";s:6:"images";s:43:"http://127.0.0.1/aef/themes/default/images/";s:5:"names";s:3:"sss";}';*/
echo '</table>';

}

?>
</td>
</tr>
</table>
    
    <br /><br />
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="editsettings" value="Edit Settings" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	adminfoot();
	
}



function html_text($name, $default){

return '<input type="text" name="'.$name.'" value="'.(empty($_POST[$name]) ? $default : $_POST[$name]).'" size="40" />';

}

function html_checkbox($name, $default){

return '<input type="checkbox" name="'.$name.'" '.(empty($_POST[$name]) ? (empty($default) ? '' : 'checked="checked"') : 'checked="checked"').' />';

}

function html_textarea($name, $default){

return '<textarea name="'.$name.'" cols="30" rows="4">'.(empty($_POST[$name]) ? $default : $_POST[$name]).'</textarea>';

}

?>