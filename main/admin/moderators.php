<?php

//////////////////////////////////////////////////////////////
//===========================================================
// moderators.php
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


function moderators(){

global $user, $conn, $dbtables, $logged_in, $globals, $l, $AEF_SESS, $theme;

	//The name of the file
	$theme['init_theme'] = 'admin/moderators';
	
	//The name of the Page
	$theme['init_theme_name'] = 'Admin Center - Manage Moderators';
	
	//Array of functions to initialize
	$theme['init_theme_func'] = array('moderators_global', 
									'managemoderators_theme',
									'editmoderators_theme');
	
	//My activity
	$globals['last_activity'] = 'amod';
	
	
	//If a second Admin act is set then go by that
	if(isset($_GET['seadact']) && trim($_GET['seadact'])!==""){
	
		$seadact = inputsec(htmlizer(trim($_GET['seadact'])));
	
	}else{
	
		$seadact = "";
		
	}

	//The switch handler
	switch($seadact){
	
		//The form for editing a forums moderator(s)
		case 'edit':	
		editmoderators();
		break;
		
		default :
		if(!default_of_nor(false, true)){
			
			return false;
		
		}	
		//Calling the theme file
		$theme['call_theme_func'] = 'managemoderators_theme';
		break;	
	
	
	}
	
}



function editmoderators(){

global $user, $conn, $dbtables, $logged_in, $globals, $l, $AEF_SESS, $theme;
global $categories, $forums, $error, $board;
	
	/////////////////////////////
	// Define the necessary VARS
	/////////////////////////////
	
	$modid = 0;
	
	$mod_mem_id = 0;
	
	$mod_fid = 0;
	
	$modusernames = '';
	
	//Is the forum id specified
	if(isset($_GET['forum']) && trim($_GET['forum']) !== "" && is_numeric(trim($_GET['forum']))){
	
		$mod_fid = (int) inputsec(htmlizer(trim($_GET['forum'])));
				
	}else{
	
		//Show a major error and return
		reporterror('No forum specified' ,'Sorry, we were unable to process your request because  you did not specify the forum which you wish to edit. Please go back and select the forum you wish to edit.');
			
		return false;
		
	}	
	
	
	//Load all the permissions
	if(!default_of_nor(false, true)){
			
		return false;
	
	}	
	
	
	//This is to find which forum is it
	foreach($forums as $c => $cv){
	
		//The main forum loop
		foreach($forums[$c] as $f => $v){
			
			if($forums[$c][$f]['fid'] == $mod_fid){
			
				$board = $forums[$c][$f];
				
				break;
				
			}		
			
		}
		
	}//End of main loop
	
	
	//Did we find any board
	if(empty($board)){
	
		//Show a major error and return
		reporterror('No forum found' ,'The forum you specified is invalid as it does not exist in the system.');
			
		return false;
		
	}
	
		
	
	//Alright lets process
	if(isset($_POST['editmoderators'])){
	
		//Check if the Usernames field exists.
		if(!(isset($_POST['modusernames'])) || trim($_POST['modusernames']) == ""){
		
			$error[] = 'You did not specify the usernames of any moderators.';
			
		}else{
		
			$modusernames = inputsec(htmlizer(trim($_POST['modusernames'])));
			
		}
		
		//on error call the form
		if(!empty($error)){
			$theme['call_theme_func'] = 'editmoderators_theme';
			return false;		
		}
		
		
		/* Check Usernames */
		
		$moderators = check_modusernames($modusernames);
		
		if(empty($moderators)){
		
			return false;
		
		}
				
		/* Ending - Check Usernames */
		
		
		/////////////////////////////////////////////////////
		// Finally lets REPLACE the Moderators of this forum
		/////////////////////////////////////////////////////
			
		foreach($moderators as $mk => $mv){
		
			$qresult = makequery("REPLACE INTO ".$dbtables['moderators']."
					SET	mod_mem_id = '".$mv['id']."',
					mod_fid = '$mod_fid'");
	
			if(mysql_affected_rows($conn) < 1){
					
				reporterror('Moderator Error' ,'There were some errors in replacing the moderator fields in the system.');
				
				return false;
				
			}
		
		}		
					
		//Free the resources
		@mysql_free_result($qresult);
		
		
		//Redirect
		redirect('act=admin&adact=moderators');
	
		return true;
	
	}elseif(isset($_POST['deletemoderators'])){	
		
		if(empty($board['moderators'])){
		
			reporterror('Delete Forum Permission Error' ,'There are no moderators in this forum that can be deleted.');
			
			return false;
		
		}
		
		//////////////////////////////////////
		// Lets DELETE the Forum Permissions
		//////////////////////////////////////	
			
		$qresult = makequery("DELETE FROM ".$dbtables['moderators']."
					WHERE mod_fid = '$mod_fid'", false);
	
		if(mysql_affected_rows($conn) < 1){
				
			reporterror('Delete Forum Permission Error' ,'There were some errors in deleting the specified forums Moderators.');
			
			return false;
			
		}
					
		//Free the resources
		@mysql_free_result($qresult);
		
		//Redirect
		redirect('act=admin&adact=moderators');
	
		return true;
	
	}else{
	
		//Calling the theme file
		$theme['call_theme_func'] = 'editmoderators_theme';
	
	}

}



///////////////////////////////////
// Check the Moderators of the forum.
// It does the following : 
// 1) Checks all the usernames
// 2) If error calls form and Exits
// 3) Returns array if everthing is fine
///////////////////////////////////

function check_modusernames($usernames, $callfunc = 'editmoderators_theme'){

global $user, $conn, $dbtables, $logged_in, $globals, $l, $AEF_SESS, $theme;
global $error;

	$mods_t = explode(";", $usernames);
	
	/*echo 'Temp Moderators:<br /><pre>';
	print_r($mods_t);
	echo '</pre>';*/
	
	$mods = array();
	
	//Just for cleaning
	foreach($mods_t as $mk => $mv){
		
		$temp = trim($mv);
		
		//If the Moderator is not null or if the reciever has been added already
		if(!($temp == "") && !(empty($temp)) ){
		
			$mods[] = trim($mods_t[$mk]);
		
		}
	
	}
	
	$mods = array_unique($mods);
	
	/*echo '<pre>';
	print_r($mods);
	echo '</pre>';*/
	
	
	if(empty($mods)){
	
		$error[] = 'The Usernames of the moderators were not specified.';
	
	}
	
	//on error call the form
	if(!empty($error)){
		$theme['call_theme_func'] = $callfunc;
		return false;		
	}
	
	
	//A loop to make the OR statement
	foreach($mods as $mk => $mv){
	
		$or[] = "username='$mv'";
	
	}
	
	$final = implode(" OR ", $or);

	
	$qresult = makequery("SELECT u.id, u.username
			FROM ".$dbtables['users']." u
			WHERE ($final)");
	
	if(mysql_num_rows($qresult) < 1){
		
		//There was no result
		$error[] = 'The Usernames '.(implode(", ", $mods)).' you specified do not exist.';
		
	}
	
	//on error call the form
	if(!empty($error)){
		$theme['call_theme_func'] = $callfunc;
		return false;		
	}
	
	
	//Array Holding the Results Queried
	$moderators = array();
	$mods_username = array();
	
	for($i = 0; $i < mysql_num_rows($qresult); $i++){
	
		$moderators[$i] = mysql_fetch_assoc($qresult);
		
		$mods_username[] = $moderators[$i]['username'];
	
	}
	/*echo '<pre>';
	print_r($moderators);
	echo '</pre>';*/
	
	/*echo '<pre>';
	print_r($mods_username);
	echo '</pre>';*/
	
	///////////////////////////////////////////////
	//Check the number of users that have come out.
	///////////////////////////////////////////////
		
	//Array holding Usernames not found
	$not_there = array();
		
	//Check which user wasnt there.
	foreach($mods as $mk => $mv){
	
		//Check the newly built username array
		if(!(in_array($mv, $mods_username))){
			
			$not_there[] = $mv;
			
		}
		
	}//End of FOREACH Loop
		
	if(!empty($not_there)){
		
		$error[] = 'The Usernames '.(implode(",", $not_there)).' you specified do not exist.';
	
	}
		
	//on error call the form
	if(!empty($error)){
		$theme['call_theme_func'] = $callfunc;
		return false;		
	}

		
	////////////////////////////////////
	// Finally all checking done .
	// So return the moderators array .
	////////////////////////////////////
	
	return $moderators;

}//End of function


?>