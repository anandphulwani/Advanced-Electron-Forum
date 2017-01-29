<?php

if(!defined('AEF'))
{
die('Hacking Attempt');
}

function cat_global(){

global $globals, $theme, $categories;

	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/categories.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Categories Options</font><br />
		
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	Here you can choose to edit a Category and also delete them by checking the Checkbox.
	Please becareful when deleting a Category as these actions are irreversible.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
}

//This is the theme that is for the management of the Categories
function catmanage_theme(){

global $globals, $theme, $categories, $dmenus;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Manage Board Categories');
	
	cat_global();
	
	$dmenus[] = '<div id="delcatprompt" class="pqr">
<table width="100%" cellspacing="0" cellpadding="0" id="delcatpromptha">
<tr>
<td class="dwhl"></td>
<td align="left" class="dwhc"><b>Shout Box</b></td>
<td align="right" class="dwhc"><a href="javascript:hideel(\'delcatprompt\')"><img src="'.$theme['images'].'close.gif"></a></td>
<td class="dwhr"></td>
</tr>
</table>

<table width="100%" cellspacing="0" cellpadding="4" class="dwbody">
<tr>
<td width="100%" valign="top">
Are you sure you want to delete this category ? If you delete this category all forums in this category will be deleted as well. Also the topics and posts in the forums of this category will be deleted as well. <b>These actions are irreversible</b>.<br /><br />
Are you sure you want to delete this category ?
</td>
</tr>
<tr>
<td style="padding:4px;" align="center">
<input type="button" onclick="redirectdeletecat();" value="Yes">&nbsp;&nbsp;<input type="button" onclick="hideel(\'delcatprompt\');" value="No">
</td>
</tr>
</table>
</div>

<script type="text/javascript">
Drag.init($("delcatpromptha"), $("delcatprompt"));
</script>';
	?>
<script type="text/javascript">

delcatpromptid = 'delcatprompt';
cat_id = 0;

function confirmdelete(cid){
	cat_id = cid;
	if(!isvisible(delcatpromptid)){
		$(delcatpromptid).style.left=((getwidth()/2)-($(delcatpromptid).offsetWidth/2))+"px";
		$(delcatpromptid).style.top=(scrolledy()+110)+"px";
		showel(delcatpromptid);
		smoothopaque(delcatpromptid, 0, 100, 10);
	}
};

function redirectdeletecat(){
	//alert(cat_id);
	window.location = '<?php echo $globals['index_url'].'act=admin&adact=categories&seadact=delcat&cid=';?>'+cat_id;
}

</script>

	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td class="cbg" colspan="3">Modify Categories</td>
	</tr>
	<?php
		
	foreach($categories as $c => $cv){
		
		echo '
		<tr>
		<td class="adbg" width="55%" height="30">
		<b>
		<a href="'.$globals['index_url'].'act=admin&adact=categories&seadact=editcat&editcat='.$categories[$c]['cid'].'">
		'.$categories[$c]['name'].'<br />		
		</a>
		</b>
		</td>
		
		<td class="adbg" align="center">
		<a href="'.$globals['index_url'].'act=admin&adact=categories&seadact=editcat&editcat='.$categories[$c]['cid'].'">
		Edit
		</a>
		</td>
		
		<td class="adbg" align="center">
		<a href="javascript:confirmdelete('.$categories[$c]['cid'].');">
		Delete
		</a>
		</td>
		
		</tr>';
		
	}
	
	
	?>
	</table>
	<?php

	//Admin footers includes Global footers
	adminfoot();

}


function editcat_theme(){

global $globals, $theme, $categories, $editcat, $orderoptions, $error, $editcategory;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Edit a Category');
	
	cat_global();
	
	error_handle($error, '100%');
	
	?>
	<form action="" method="post" name="editcat">
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td colspan="2" class="adcbg" align="center"><b>Edit Category</b></td>
	</tr>
	
	<tr>
	<td width="35%" class="adbg">
	<b>Order</b><br />
	The order in which each category will appear on the Boards Index.
	</td>
	<td class="adbg" align="left">
	&nbsp;&nbsp;&nbsp;&nbsp;<select name="catorder">
	<?php echo implode('', $orderoptions);?>
	</select>
	</td>
	</tr>
	
	<tr>
	<td width="35%" class="adbg">
	<b>Category Name</b><br />
	The name of the Category that will be displayed.
	</td>
	<td class="adbg" align="left">
	&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="50" maxlength="" name="catname" 
	<?php echo ( (isset($_POST['catname'])) ? 'value="'.$_POST['catname'].'"' : 'value="'.$editcategory['name'].'"' );?>/>
	</td>
	</tr>
	
	<tr>
	<td width="35%" class="adbg">
	<b>Collapsable</b><br />
	Is the user allowed to collapse the Category.
	</td>
	<td class="adbg" align="left">
	&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="catcollapse" 
	<?php if($editcategory['collapsable']){
	echo 'checked';
	}?>/>
	</td>
	</tr>
	
	<tr>
	<td colspan="2" class="adbg" align="center">
	<input type="submit" name="edit_cat" value="Edit"/>
	</td>
	</tr>
	
	</table>
	</form>
	<?php
	
	//Admin footers includes Global footers
	adminfoot();

}

function createcat_theme(){

global $globals, $theme, $categories, $orderoptions, $error;

	//Admin Headers includes Global Headers
	adminhead('Administration Center - Create a Category');
	
	cat_global();
	
	error_handle($error, '100%');
	
	?>
	<form action="" method="post" name="editcat">
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td colspan="2" class="adcbg" align="center">
	<b>Create a New Category</b>
	</td>
	</tr>
	
	<tr>
	<td width="35%" class="adbg">
	<b>Order</b><br />
	The order in which each category will appear on the Boards Index.
	</td>
	<td class="adbg" align="left">
	&nbsp;&nbsp;&nbsp;&nbsp;<select name="catorder">
	<?php echo implode('', $orderoptions);?>
	</select>
	</td>
	</tr>
	
	<tr>
	<td width="35%" class="adbg">
	<b>Category Name</b><br />
	The name of the Category that will be displayed.
	</td>
	<td class="adbg" align="left">
	&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="50" maxlength="" name="catname" <?php echo ( (isset($_POST['catname'])) ? 'value="'.$_POST['catname'].'"' : '' );?> />
	</td>
	</tr>
	
	<tr>
	<td width="35%" class="adbg">
	<b>Collapsable</b><br />
	Is the user allowed to collapse the Category.
	</td>
	<td class="adbg" align="left">
	&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="catcollapse" checked />
	</td>
	</tr>
	
	<tr>
	<td colspan="2" class="adbg" align="center">
	<input type="submit" name="createcat" value="Create"/>
	</td>
	</tr>
	
	</table>
	</form>
	<?php
	
	//Admin footers includes Global footers
	adminfoot();

}




function catreorder_theme(){

global $globals, $theme, $categories, $error, $onload, $dmenus;
	
	//Pass to onload to initialize a JS
	$onload['catreoder'] = 'init_reoder()';
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Reorder Categories');
	
	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/categories.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Reorder Categories</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	This is the place for changing the Category order in which they appear throughout the Board. <b>Drag and Drop</b> the Category box and put them in the order you like.
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
	error_handle($error, '100%');
	
	?>
	
	<form action="" method="post" name="catreorderform">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Reorder Categories
		</td>
		</tr>

	</table>
    <br /><br />
    
<table width="60%" cellpadding="0" cellspacing="0" align="center" border="0">
<tr><td id="cat_reorder_pos" width="100%"></td></tr>
</table>
	<br /><br />
	<script type="text/javascript">

//The array id of all the elements to be reordered
reo_r = new Array(<?php echo implode(', ', array_keys($categories));?>);

//The id of the table that will hold the elements
reorder_holder = 'cat_reorder_pos';

//The prefix of the Dom Drag handle for every element
reo_ha = 'catha';

//The prefix of the Dom Drag holder for every element(the parent of every element)
reo_ho = 'cat';

//The prefix of the Hidden Input field for the reoder value for every element
reo_hid = 'cathid';

</script>
<?php js_reorder();?>

	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
         <?php
	$temp = 1;
	foreach($categories as $ck => $cv){
		
		$dmenus[] = '<div id="cat'.$ck.'">
<table cellpadding="0" cellspacing="0" class="catreo" id="catha'.$ck.'" onmousedown="this.style.zIndex=\'1\'" onmouseup="this.style.zIndex=\'0\'">
<tr><td>
&nbsp;&nbsp;'.$categories[$ck]['name'].'
</td></tr>
</table>
</div>';	
	
	echo '<input type="hidden" name="cat['.$ck.']" value="'.$temp.'" id="cathid'.$ck.'" />';	
	
	$temp = $temp + 1;
	
	}
	
	?>
		<input type="submit" name="catreorder" value="Re Order" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php	
	
	adminfoot();
	
} 
    

?>