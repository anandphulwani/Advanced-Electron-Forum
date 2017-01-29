<?php

//////////////////////////////////////////////////////////////
//===========================================================
// index.php(usercp)
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


function usercp(){

global $user, $conn, $dbtables, $logged_in, $globals, $l, $AEF_SESS, $theme;
global $tree, $load_uhf, $ucpact;

	$load_uhf = true;
	
	/////////////////////////////////////////
	//This section is only for users
	if(!$logged_in){
	
		//Show a major error and return
		reporterror('No Permissions' ,'Sorry, this section is only for registered and logged in users. If you have followed a valid link please contact us at <a href="mailto:'.$globals['board_email'].'">'.$globals['board_email'].'</a>.<br /><br />If you wish to register click <a href="'.$globals['index_url'].'act=register">here</a>.<br />To login to your account click <a href="'.$globals['index_url'].'act=login">here</a>.');
			
		return false;
	
	}
	/////////////////////////////////////////
	
	
	//My activity
	$globals['last_activity'] = 'ucp';
	
	$tree = array();//Board tree for users location
	$tree[] = array('l' => $globals['index_url'],
					'txt' => 'Index');
	$tree[] = array('l' => $globals['index_url'].'act=usercp',
					'txt' => 'User Control Panel');
	
	//Check the Unread
	unreadcheck();
	
	//If a second User CP act has been set
	if(isset($_GET['ucpact']) && trim($_GET['ucpact'])!==""){
	
		$ucpact = inputsec(htmlizer(trim($_GET['ucpact'])));
		
	}else{
	
		$ucpact = "";
		
	}
	
	//The switch handler
	switch($ucpact){
		
		/* User Account Related */
		
		case 'profile' :
		include_once($globals['mainfiles'].'/usercp/account.php');
		profile();
		break;
		
		case 'account' :
		include_once($globals['mainfiles'].'/usercp/account.php');
		account();
		break;
		
		case 'signature' :
		include_once($globals['mainfiles'].'/usercp/account.php');
		signature();
		break;
		
		case 'avatar' :
		include_once($globals['mainfiles'].'/usercp/account.php');
		avatar();
		break;
		
		case 'personalpic' :
		include_once($globals['mainfiles'].'/usercp/account.php');
		personalpic();
		break;
		
		/* Subscriptions */
		
		case 'topicsub' :
		include_once($globals['mainfiles'].'/usercp/subscriptions.php');
		topicsub();
		break;
		
		case 'forumsub' :
		include_once($globals['mainfiles'].'/usercp/subscriptions.php');
		forumsub();
		break;
		
		/* User Settings */
		
		case 'emailpmset' :
		include_once($globals['mainfiles'].'/usercp/usersettings.php');
		emailpmset();
		break;
		
		case 'forumset' :
		include_once($globals['mainfiles'].'/usercp/usersettings.php');
		forumset();
		break;
		
		case 'themeset' :
		include_once($globals['mainfiles'].'/usercp/usersettings.php');
		themeset();
		break;
		
		/* PM System stuff */
		
		case 'showpm' :
		include_once($globals['mainfiles'].'/usercp/pm.php');
		showpm(0);
		$theme['call_theme_func'] = 'showpm_theme';
		break;	
		
		case 'showsentpm' :
		include_once($globals['mainfiles'].'/usercp/pm.php');
		showpm(1);
		$theme['call_theme_func'] = 'showpm_theme';
		break;	
		
		case 'inbox' :
		include_once($globals['mainfiles'].'/usercp/pm.php');
		inbox();	
		$theme['call_theme_func'] = 'inbox_theme';
		break;	
		
		case 'sentitems' :
		include_once($globals['mainfiles'].'/usercp/pm.php');
		sentitems();
		$theme['call_theme_func'] = 'sentitems_theme';
		break;	
		
		case 'drafts' :
		include_once($globals['mainfiles'].'/usercp/pm.php');
		drafts();
		$theme['call_theme_func'] = 'drafts_theme';
		break;
		
		case 'trackpm' :
		include_once($globals['mainfiles'].'/usercp/pm.php');
		trackpm();
		$theme['call_theme_func'] = 'trackpm_theme';
		break;		
		
		case 'writepm' :
		include_once($globals['mainfiles'].'/usercp/pm.php');
		writepm();
		break;
		
		case 'searchpm' :
		include_once($globals['mainfiles'].'/usercp/pm.php');
		searchpm();
		break;
		
		case 'sendsaved' :
		include_once($globals['mainfiles'].'/usercp/pm.php');
		sendsaved();
		break;	
		
		case 'prunepm' :
		include_once($globals['mainfiles'].'/usercp/pm.php');
		prunepm();
		break;
		
		case 'emptyfolders' :
		include_once($globals['mainfiles'].'/usercp/pm.php');
		emptyfolders();
		break;	
		
		case 'delpm' :
		include_once($globals['mainfiles'].'/usercp/pm.php');
		delpm();
		break;
		
		/* Default UserCP Index */
		
		default :
		include_once($globals['mainfiles'].'/usercp/usercpindex.php');
		usercpindex();
		break;
		
	}

	
}


function checkpmon(){

global $user, $conn, $dbtables, $logged_in, $globals, $l, $AEF_SESS, $theme;
	
	/////////////////////////////
	// Check the PM system is ON.
	// Also is the user allowed.
	/////////////////////////////
	
	if(!$globals['pmon']){
	
		reporterror('PM System Disabled' ,'Sorry we were unable to process your request because it has been disabled on the board. If you have followed a valid link please contact us at <a href="mailto:'.$globals['board_email'].'">'.$globals['board_email'].'</a>.');
			
		return false;
	
	}
	
	
	if(!$user['can_use_pm']){
	
		reporterror('No Permissions' ,'Sorry we were unable to process your request because you do not have the adequate permissions to use the PM system. If you have followed a valid link please contact us at <a href="mailto:'.$globals['board_email'].'">'.$globals['board_email'].'</a>.');
			
		return false;
	
	}


}//End of function

///////////////////////////////////////
// This function will check unread PM's
// If they are not equal with users table
// It will update it accordingly
///////////////////////////////////////

function unreadcheck(){

global $user, $conn, $dbtables, $logged_in, $globals, $l, $AEF_SESS, $theme;

	if($globals['pmon'] || $user['can_use_pm']){

		//Get the PM the user has requested to Reply.
		$qresult = makequery("SELECT COUNT(*) AS unread 
					FROM ".$dbtables['pm']." 
					WHERE pm_to = '".$user['id']."'
					AND pm_folder = '0'
					AND pm_read_time = '0'");
						
			
		if(mysql_num_rows($qresult) < 1){
			
			//Didnt get anyresult - Show a major error and return				
			reporterror('Illegal Operation' ,'Sorry, we were unable to process your request because there were some problems in counting the Unread PM. Please contact the <a href="mailto:'.$globals['board_email'].'">Administrator</a>.');
			
			return false;
				
		}
		
		$row = mysql_fetch_assoc($qresult);
		
		$unread = $row['unread'];
		
		//If the unread in the users table is not equal to counted unread PM - UPDATE
		if($user['unread_pm'] != $unread){
		
			$qresult = makequery("UPDATE ".$dbtables['users']." 
					SET unread_pm = '$unread' 
					WHERE id = '".$user['id']."'", false);
			
			if(mysql_affected_rows($conn) < 1){
				
				reporterror('Update PM count error' ,'Sorry, we were unable to process your request because there were some problems in updating the Unread PM. Please Contact the <a href="mailto:'.$globals['board_email'].'">Administrator</a>.');
				
				return false;
				
			}
			
			//Free the resources
			@mysql_free_result($qresult);
		
		}
	
	}
	
}


?>