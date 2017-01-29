<?php

if(!defined('AEF')){

	die('Hacking Attempt');

}

function adminhead($title = ''){

global $globals, $theme, $onload;
	
	//Pass to onload to initialize a JS
	$onload['admenu'] = 'init_admenu()';

	//Global Headers
	aefheader($title);
	
	?>	
	
<table width="100%">
	<tr>
	<td width="23%" valign="top">
	
	<script type="text/javascript" language="javascript">
	umimages = "<?php echo $theme['images'];?>";
	</script>
	
	<link rel="stylesheet" type="text/css" href="<?php echo $theme['url'];?>/adminstyle.css" />
	<script language="javascript" type="text/javascript" src="<?php echo $theme['url'];?>/js/slidemenu.js"></script>
	<script type="text/javascript">
	var admenu;
	function init_admenu() {
		admenu = new SDMenu("admenu");
		admenu.init();
	};
	</script>
	
<div id="admenu" class="sdmenu">
<div style="border:1px solid #CCC">
	<span>Admin Options</span>
	<a href="<?php echo $globals['index_url'];?>act=admin">Admin Index</a>
	<a href="<?php echo $globals['index_url'];?>">Forum Index</a>
</div>

<br />

<div style="border:1px solid #CCC">
	<span>Control Panel</span>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=conpan&seadact=coreset">Core Settings</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=conpan&seadact=mysqlset">MySQL Configuration</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=conpan&seadact=onoff">Maintenance Mode</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=conpan&seadact=mailset">Mail Settings</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=conpan&seadact=genset">General Settings</a>
    <a href="<?php echo $globals['index_url'];?>act=admin&adact=conpan&seadact=shoutboxset">Shoutbox Settings</a>
    <a href="<?php echo $globals['index_url'];?>act=admin&adact=conpan&seadact=updates">Updates</a>
</div>

<br />

<div style="border:1px solid #CCC">
	<span>Categories</span>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=categories">Manage Categories</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=categories&seadact=createcat">Create New Category</a>
    <a href="<?php echo $globals['index_url'];?>act=admin&adact=categories&seadact=catreorder">Reorder Categories</a>
</div>

<br />

<div style="border:1px solid #CCC">
	<span>Forums</span>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=forums">Manage Forums</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=forums&seadact=createforum">Create New Forum</a>
    <a href="<?php echo $globals['index_url'];?>act=admin&adact=forums&seadact=forumreorder">Reorder Forums</a>	
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=fpermissions">Forum Permissions</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=fpermissions&seadact=createfpermissions">New Forum Permissions</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=moderators">Moderators</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=recyclebin">Recycle Bin</a>
</div>

<br />

<div style="border:1px solid #CCC">
	<span>User Settings</span>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=users&seadact=proacc">Profile & Account</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=users&seadact=avaset">Avatar Settings</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=users&seadact=ppicset">Personal Picture</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=users&seadact=pmset">PM Settings</a>
</div>

<br />

<div style="border:1px solid #CCC">
	<span>User Groups</span>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=ug&seadact=manug">Manage User Groups</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=ug&seadact=addug&ugid=0">Add User Groups</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=ug&seadact=editper">User Group Permissions</a>
</div>

<br />

<div style="border:1px solid #CCC">
	<span>Themes</span>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=skin&seadact=manskin">Theme Manager</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=skin&seadact=import">Import Themes</a>
    <a href="<?php echo $globals['index_url'];?>act=admin&adact=skin&seadact=uninstall">Uninstall Themes</a>
    <a href="<?php echo $globals['index_url'];?>act=admin&adact=skin&seadact=settings&theme_id=<?php echo $globals['theme_id'];?>">Theme Settings</a>
</div>

<br />

<div style="border:1px solid #CCC">
	<span>Registration & login</span>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=reglog&seadact=regset">Registration Settings</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=reglog&seadact=agerest">Age Restrictions</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=reglog&seadact=reserved">Set Reserved Names</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=reglog&seadact=logset">Log In Settings</a>
</div>

<br />

<div style="border:1px solid #CCC">
	<span>Account Approvals</span>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=approvals&seadact=manval">Manage Validating</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=approvals&seadact=awapp">Awaiting Approval</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=approvals&seadact=coppaapp">COPPA Approval</a>
</div>

<br />

<div style="border:1px solid #CCC">
	<span>Posts and Messages</span>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=tpp&seadact=topics">Topic Settings</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=tpp&seadact=posts">Post Settings</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=tpp&seadact=polls">Poll Settings</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=tpp&seadact=words">Words Censorship</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=tpp&seadact=bbc">Bulletin Board Code</a>
</div>

<br />

<div style="border:1px solid #CCC">
	<span>Attachments</span>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=attach&seadact=attset">Attachment Settings</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=attach&seadact=attmime">Attachment Types</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=attach&seadact=addmime">Add Attachment Type</a>
</div>

<br />

<div style="border:1px solid #CCC">
	<span>Smileys</span>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=smileys&seadact=smman">Manage Smileys</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=smileys&seadact=smset">Smiley Settings</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=smileys&seadact=smreorder">Reorder Smileys</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=smileys&seadact=addsm">Add a Smiley</a>
</div>

<br />

<div style="border:1px solid #CCC">
	<span>Backup</span>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=backup&seadact=fileback">Files and Folders</a>
	<a href="<?php echo $globals['index_url'];?>act=admin&adact=backup&seadact=dbback">Forum Database</a>
</div>

</div>

	</td>

	<td valign="top">
	
	<?php
}//end function adminhead


function adminfoot(){

global $globals, $theme;?>

	</td>
	</tr>
	</table>
		
	<?php
	
	//Global footers
	aeffooter();

}//end function adminfoot


function js_reorder(){

global $theme, $globals, $user;

/*
These are JS VARS for this function. Must be defined for working

//The array id of all the elements to be reordered
reo_r = new Array(<?php echo implode(', ', array_keys($categories));?>);

//The id of the table that will hold the elements
reorder_holder = 'reo_reorder_pos';

//The prefix of the Dom Drag handle for every element
reo_ha = 'catha';

//The prefix of the Dom Drag holder for every element(the parent of every element)
reo_ho = 'cat';

//The prefix of the Hidden Input field for the reoder value for every element
reo_hid = 'cathid';*/

?>
<script type="text/javascript">

//////////////////////////////////////////////////////////////
// js_shoutbox
// By Electron, Ronak Gupta, Pulkit Gupta
// Please Read the Terms of use at http://www.anelectron.com
// (c)Electron Inc.
//////////////////////////////////////////////////////////////

function init_reoder(){
	var init_pos = findelpos($(reorder_holder));
	var tot_height = 0;
	var width = $(reorder_holder).offsetWidth;
	var top = init_pos[1];
	
	//Find the prerequisites
	for(x in reo_r){
		tot_height = tot_height + $(reo_ha+reo_r[x]).offsetHeight + 10;
		$(reo_ha+reo_r[x]).style.width = width+'px';
	}
	$(reorder_holder).style.height = tot_height+'px';//Make it long
	tot_height = (tot_height + init_pos[1]);
	
	//Initialize the Drag
	for(x in reo_r){
		Drag.init($(reo_ho+reo_r[x]), $(reo_ha+reo_r[x]), init_pos[0], init_pos[0], (init_pos[1]-10), tot_height);
		$(reo_ha+reo_r[x]).onDragEnd = function(){
										reorder();
									};
		$(reo_ha+reo_r[x]).style.left = init_pos[0]+'px';
		$(reo_ha+reo_r[x]).style.top = top+'px';
		showel(reo_ha+reo_r[x]);
		top = top + $(reo_ha+reo_r[x]).offsetHeight + 10;
	}
};

//This will reorder
function reorder(){
	var reo_arr = new Array();
	var reo_arr_pos = new Array();
	for(x in reo_r){
		var pos = findelpos($(reo_ha+reo_r[x]));
		//A position may be used if x smiley is left over y sm at the same position
		if(is_pos_there(reo_arr_pos, pos[1])){
			pos[1] = pos[1] + 1;
		}
		reo_arr[x] = pos[1]+'|'+reo_r[x];
		reo_arr_pos[x] = pos[1];
	}
	reo_arr_pos = reo_arr_pos.sort(sortnumber);
	for(x in reo_arr_pos){
		reo_r[x] = find_reokey(reo_arr, reo_arr_pos[x]);
	}
	
	//Re-position Vars
	var init_pos = findelpos($(reorder_holder));
	var top = init_pos[1];
	//Re-position
	for(x in reo_r){
		$(reo_ha+reo_r[x]).style.top = top+'px';
		top = top + $(reo_ha+reo_r[x]).offsetHeight + 10;
		$(reo_hid+reo_r[x]).value = (parseInt(x) + 1);
	}	
};


function find_reokey(arr, val){
	var x;
	for(x in arr){
		var r = arr[x].split('|');
		if(r[0] == val){
			return r[1];
		}
	}
};

//Tells if the position is already there - Like in_array
function is_pos_there(arr, val){
	var x;
	for(x in arr){
		if(arr[x] == val){
			return true;
		}
	}
	return false;
};

//Just a sort function
function sortnumber(a, b){
	return a - b;
};

</script>
<?php

}

?>