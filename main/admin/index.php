<?php

//////////////////////////////////////////////////////////////
//===========================================================
// index.php(Admin)
//===========================================================
// AEF : Advanced Electron Forum 
// Version : 1.0.6
// Inspired by Pulkit and taken over by Electron
// ----------------------------------------------------------
// Started by: Electron, Ronak Gupta, Pulkit Gupta
// Date:       23rd Jan 2006
// Time:       15:00 hrs
// Site:       http://www.anelectron.com/ (Anelectron)
// ----------------------------------------------------------
// Please Read the Terms of use at http://www.anelectron.com
// ----------------------------------------------------------
//===========================================================
// (c)Electron Inc.
//===========================================================
//////////////////////////////////////////////////////////////

if(!defined('AEF')){

	die('Hacking Attempt');

}


//Can he admin
if(!$user['can_admin']){

	//Show a major error and return
	reporterror('No Permissions' ,'Sorry, you are not allowed to view this section of the board as you do not have the adequate permissions to do so. If you have followed a valid link please contact us at <a href="mailto:'.$globals['board_email'].'">'.$globals['board_email'].'</a>.');
		
	return false;

}

$tree = array();//Board tree for users location
$tree[] = array('l' => $globals['index_url'],
				'txt' => 'Index');
$tree[] = array('l' => $globals['index_url'].'act=admin',
				'txt' => 'Admin');

$load_ahf = true;


//Checks a admin session
include_once($globals['mainfiles'].'/admin/adminlogin.php');
$admin_logged_in = adminlogin();

if(empty($admin_logged_in)){

	return false;

}


if(isset($_GET['adact']) && trim($_GET['adact'])!==""){
	
	$adact = inputsec(htmlizer(trim($_GET['adact'])));
	
}else{

	$adact = "";
	
}

switch($adact){
	
	//This is for core Board settings
	case 'conpan':
	include_once($globals['mainfiles'].'/admin/conpan.php');
	conpan();		
	break;
	
	//This is largely responsible for managing,editing and creating categories
	case 'categories':
	include_once($globals['mainfiles'].'/admin/categories.php');
	categories();
	break;
	
	
	//This is for managing,editing and creating Boards/Forums
	case 'forums':
	include_once($globals['mainfiles'].'/admin/forums.php');
	forums();		
	break;
	
	//This is for managing,editing and creating Boards/Forum Permissions Set
	case 'fpermissions':
	include_once($globals['mainfiles'].'/admin/forumpermissions.php');
	forumpermissions();		
	break;
	
	//This is for managing,editing and creating Boards/Forums
	case 'moderators':
	include_once($globals['mainfiles'].'/admin/moderators.php');
	moderators();		
	break;
	
	//This is for setting up the recycle bin
	case 'recyclebin':
	include_once($globals['mainfiles'].'/admin/recyclebin.php');
	recyclebin();		
	break;
	
	//This is for managing account approvals
	case 'approvals':
	include_once($globals['mainfiles'].'/admin/approvals.php');
	approvals();		
	break;
	
	//This is for managing user settings
	case 'users':
	include_once($globals['mainfiles'].'/admin/users.php');
	users();		
	break;
	
	//This is for managing user groups
	case 'ug':
	include_once($globals['mainfiles'].'/admin/usergroups.php');
	usergroups();		
	break;
	
	//This is for managing skins
	case 'skin':
	include_once($globals['mainfiles'].'/admin/skin.php');
	skin();		
	break;
	
	//This is for managing attachment settings
	case 'attach':
	include_once($globals['mainfiles'].'/admin/attachments.php');
	attachments();
	break;
	
	//This is for managing Registration and Login Settings
	case 'reglog':
	include_once($globals['mainfiles'].'/admin/reglog.php');
	reglog();
	break;
	
	//This is for managing the smilies throughout the Board
	case 'smileys':
	include_once($globals['mainfiles'].'/admin/smileys.php');		
	smileys();
	break;
	
	
	//This is for managing the settings of Topics, Posts, Polls and Censored Words
	case 'tpp':
	include_once($globals['mainfiles'].'/admin/tpp.php');
	tpp();		
	break;
	
	//This is for backing up stuff
	case 'backup':
	include_once($globals['mainfiles'].'/admin/backup.php');
	backup();		
	break;
	
	//This is the default - The adminindex
	default:
	include_once($globals['mainfiles'].'/admin/adminindex.php');
	adminindex();
	break;


}



?>