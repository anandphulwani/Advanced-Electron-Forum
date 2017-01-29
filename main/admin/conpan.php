<?php

//////////////////////////////////////////////////////////////
//===========================================================
// conpan.php(Admin)
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


function conpan(){

global $user, $conn, $dbtables, $logged_in, $globals, $l, $AEF_SESS, $theme;

	//The name of the file
	$theme['init_theme'] = 'admin/conpan';
	
	//The name of the Page
	$theme['init_theme_name'] = 'Admin Center - Control Panel';
	
	//Array of functions to initialize
	$theme['init_theme_func'] = array('coreset_theme',
									'mysqlset_theme',
									'onoff_theme',
									'mailset_theme',
									'genset_theme',
									'shoutboxset_theme',
									'updates_theme');
	
	//My activity
	$globals['last_activity'] = 'acp';
	

	//If a second Admin act is set then go by that
	if(isset($_GET['seadact']) && trim($_GET['seadact'])!==""){
	
		$seadact = inputsec(htmlizer(trim($_GET['seadact'])));
	
	}else{
	
		$seadact = "";
		
	}
	

	//The switch handler
	switch($seadact){
		
		//This is for managing core settings
		default:
		case 'coreset':
		coreset();
		break;
		
		//MySQL Settings
		case 'mysqlset':
		mysqlset();
		break;
		
		//Turn Board On/Off
		case 'onoff':
		onoff();
		break;
		
		//Mail Settings
		case 'mailset':
		mailset();
		break;
		
		//General Settings
		case 'genset':
		genset();
		break;
		
		//Shoutbox Settings
		case 'shoutboxset':
		shoutboxset();
		break;
		
		//Updates
		case 'updates':
		updates();
		break;
		
	}

}



//Function to manage core settings
function coreset(){

global $user, $conn, $dbtables, $logged_in, $globals, $l, $AEF_SESS, $theme;
global $error;
	
	
	/////////////////////////////
	// Define the necessary VARS
	/////////////////////////////
	
	$error = array();
	
	$url = '';
	
	$sn = '';
	
	$board_email = '';
	
	$server_url = '';
	
	$mainfiles = '';
	
	$themesdir = '';
	
	$gzip = 0;
	
	$cookie_name = '';
	
	if(isset($_POST['editcoreset'])){
	
		//The URL
		if(!(isset($_POST['url'])) || (trim($_POST['url']) == "")){
			
			$error[] = 'The Board URL was not specified.';
			
		}else{
		
			$url = inputsec(htmlizer(trim($_POST['url'])));
			
			$url = rtrim($url, '/\\');
			
		}
		
		//on error call the form
		if(!empty($error)){
			$theme['call_theme_func'] = 'coreset_theme';
			return false;		
		}
		
		
		//The Site's Name
		if(!(isset($_POST['sn'])) || (trim($_POST['sn']) == "")){
			
			$error[] = 'The Site name was not specified.';
			
		}else{
		
			$sn = inputsec(htmlizer(trim($_POST['sn'])));
			
		}
				
		//on error call the form
		if(!empty($error)){
			$theme['call_theme_func'] = 'coreset_theme';
			return false;		
		}
		
		
		//The Board Email
		if(!(isset($_POST['board_email'])) || (trim($_POST['board_email']) == "")){
			
			$error[] = 'The boards email address was not specified.';
			
		}else{
		
			$board_email = inputsec(htmlizer(trim($_POST['board_email'])));
			
		}
		
		//on error call the form
		if(!empty($error)){
			$theme['call_theme_func'] = 'coreset_theme';
			return false;		
		}
		
		
		//The AEF Folder
		if(!(isset($_POST['server_url'])) || (trim($_POST['server_url']) == "")){
			
			$error[] = 'The location of the AEF Folder was not specified.';
			
		}else{
		
			$server_url = inputsec(htmlizer(trim($_POST['server_url'])));
			
			$server_url = rtrim($server_url, '/\\');
			
			if(!file_exists($server_url.'/universal.php')){
			
				$error[] = 'The location of the AEF Folder is invalid.';
			
			}
			
		}
		
		//on error call the form
		if(!empty($error)){
			$theme['call_theme_func'] = 'coreset_theme';
			return false;		
		}
		
		
		//The AEF Main Files
		if(!(isset($_POST['mainfiles'])) || (trim($_POST['mainfiles']) == "")){
			
			$error[] = 'The location of the AEF Main Files was not specified.';
			
		}else{
		
			$mainfiles = inputsec(htmlizer(trim($_POST['mainfiles'])));
			
			$mainfiles = rtrim($mainfiles, '/\\');
			
			if(!file_exists($mainfiles.'/functions.php')){
			
				$error[] = 'The location of the AEF Main Files is invalid.';
			
			}
			
		}
		
		//on error call the form
		if(!empty($error)){
			$theme['call_theme_func'] = 'coreset_theme';
			return false;		
		}
		
		
		//The Themes Directory
		if(!(isset($_POST['themesdir'])) || (trim($_POST['themesdir']) == "")){
			
			$error[] = 'The location of the themes directory was not specified.';
			
		}else{
		
			$themesdir = inputsec(htmlizer(trim($_POST['themesdir'])));
			
			$themesdir = rtrim($themesdir, '/\\');
			
			if(!file_exists($themesdir.'/default')){
			
				$error[] = 'The location of the themes directory is invalid.';
			
			}
			
		}
		
		
		//on error call the form
		if(!empty($error)){
			$theme['call_theme_func'] = 'coreset_theme';
			return false;		
		}
		
		
		//The AEF Folder
		if(!(isset($_POST['cookie_name'])) || (trim($_POST['cookie_name']) == "")){
			
			$error[] = 'The Cookie name was not specified.';
			
		}else{
		
			$cookie_name = inputsec(htmlizer(trim($_POST['cookie_name'])));
			
		}
		
		//on error call the form
		if(!empty($error)){
			$theme['call_theme_func'] = 'coreset_theme';
			return false;		
		}
		
		
		//Give compressed output
		if(isset($_POST['gzip'])){
			
			$gzip = 1;
			
		}
		
			
		$coreset = array('url' => array($url, 0),
					'sn' => array($sn, 0),
					'board_email' => array($board_email, 0),
					'server_url' => array($server_url, 0),
					'mainfiles' => array($mainfiles, 0),
					'themesdir' => array($themesdir, 0),
					'gzip' => array($gzip, 1),
					'cookie_name' => array($cookie_name, 0)
					);
		
		if(!modify_universal($coreset)){
		
			return false;
			
		}
		
		//Redirect
		redirect('act=admin&adact=conpan&seadact=coreset');
		
		return true;
		
	
	}else{
	
		$theme['call_theme_func'] = 'coreset_theme';
		
	}


}//End of function


//Function to manage mysql settings
function mysqlset(){

global $user, $conn, $dbtables, $logged_in, $globals, $l, $AEF_SESS, $theme;
global $error;
	
	
	/////////////////////////////
	// Define the necessary VARS
	/////////////////////////////
	
	$error = array();
	
	$muser = '';
	
	$password = '';
	
	$database = '';
	
	$dbprefix = '';
	
	$server = '';
	
	if(isset($_POST['editmysqlset'])){
	
		//The MySQL user
		if(!(isset($_POST['user'])) || (trim($_POST['user']) == "")){
			
			$error[] = 'The MySQL user was not specified.';
			
		}else{
		
			$muser = inputsec(htmlizer(trim($_POST['user'])));
				
		}
		
		//on error call the form
		if(!empty($error)){
			$theme['call_theme_func'] = 'mysqlset_theme';
			return false;		
		}
		
		
		//The MySQL password - May not be there
		if(isset($_POST['password']) && trim($_POST['password']) != ""){
		
			$password = inputsec(htmlizer(trim($_POST['password'])));
				
		}
		
		//The MySQL database
		if(!(isset($_POST['database'])) || (trim($_POST['database']) == "")){
			
			$error[] = 'The MySQL database was not specified.';
			
		}else{
		
			$database = inputsec(htmlizer(trim($_POST['database'])));
				
		}
		
		//on error call the form
		if(!empty($error)){
			$theme['call_theme_func'] = 'mysqlset_theme';
			return false;		
		}
		
		
		//The MySQL dbprefix
		if(isset($_POST['dbprefix']) && trim($_POST['dbprefix']) != ""){
		
			$dbprefix = inputsec(htmlizer(trim($_POST['dbprefix'])));
				
		}
		
		
		//The MySQL server
		if(!(isset($_POST['server'])) || (trim($_POST['server']) == "")){
			
			$error[] = 'The MySQL server was not specified.';
			
		}else{
		
			$server = inputsec(htmlizer(trim($_POST['server'])));
				
		}
		
		//on error call the form
		if(!empty($error)){
			$theme['call_theme_func'] = 'mysqlset_theme';
			return false;		
		}
		
		
		$mysqlset = array('user' => array($muser, 0),
					'password' => array($password, 0),
					'database' => array($database, 0),
					'dbprefix' => array($dbprefix, 0),
					'server' => array($server, 0)
					);
		
		if(!modify_universal($mysqlset)){
		
			return false;
			
		}
		
		//Redirect
		redirect('act=admin&adact=conpan&seadact=mysqlset');
		
		return true;
		
	}else{
	
		$theme['call_theme_func'] = 'mysqlset_theme';
		
	}


}//End of function



//Function to Turn Board On/Off
function onoff(){

global $user, $conn, $dbtables, $logged_in, $globals, $l, $AEF_SESS, $theme;
global $error;
	
	
	/////////////////////////////
	// Define the necessary VARS
	/////////////////////////////
	
	$error = array();
	
	$maintenance = 0;
	
	$maintenance_subject = '';
	
	$maintenance_message = '';
	
	if(isset($_POST['editonoff'])){
	
		//Enable Smileys
		if(isset($_POST['maintenance'])){
			
			$maintenance = 1;
			
			//The Maintenance subject
			if(!(isset($_POST['maintenance_subject'])) || (trim($_POST['maintenance_subject']) == "")){
				
				$error[] = 'The Maintenance subject was not specified.';
				
			}else{
			
				$maintenance_subject = inputsec(htmlizer(trim($_POST['maintenance_subject'])));
					
			}
			
			
			//The Maintenance subject
			if(!(isset($_POST['maintenance_message'])) || (trim($_POST['maintenance_message']) == "")){
				
				$error[] = 'The Maintenance message was not specified.';
				
			}else{
			
				$maintenance_message = inputsec(htmlizer(trim($_POST['maintenance_message'])));
					
			}
			
		}
		
		//on error call the form
		if(!empty($error)){
			$theme['call_theme_func'] = 'onoff_theme';
			return false;		
		}
		
		
		//The array containing the SMILEY SETTING Changes
		$onoff = array('maintenance' => $maintenance,
					'maintenance_subject' => $maintenance_subject,
					'maintenance_message' => $maintenance_message,
					);
		
		if(!modify_registry($onoff)){
		
			return false;
			
		}
		
		//Redirect
		redirect('act=admin&adact=conpan&seadact=onoff');
		
		return true;
		
		
	}else{
	
		$theme['call_theme_func'] = 'onoff_theme';
		
	}


}//End of function



//Function to manage mail settings
function mailset(){

global $user, $conn, $dbtables, $logged_in, $globals, $l, $AEF_SESS, $theme;
global $error;
	
	
	/////////////////////////////
	// Define the necessary VARS
	/////////////////////////////
	
	$error = array();
	
	$mail = 0;
	
	$mail_user = '';
	
	$mail_pass = '';
	
	$mail_server = '';
	
	$mail_port = 0;
	
	if(isset($_POST['editmailset'])){
	
		//The Mail type
		if(!(isset($_POST['mail'])) || (trim($_POST['mail']) == "")){
			
			$error[] = 'The Mail type was not specified.';
			
		}else{
		
			$mail = (int) inputsec(htmlizer(trim($_POST['mail'])));
			
			if(!in_array($mail, array(0,1))){
			
				$error[] = 'The Mail type is invalid.';
			
			}
			
		}
		
		
		if($mail ==  0){
		
			//The SMTP Mail user
			if(!(isset($_POST['mail_user'])) || (trim($_POST['mail_user']) == "")){
				
				$error[] = 'The SMTP mail username was not specified.';
				
			}else{
			
				$mail_user = inputsec(htmlizer(trim($_POST['mail_user'])));
				
			}
			
			//The SMTP Mail password
			if(!(isset($_POST['mail_pass'])) || (trim($_POST['mail_pass']) == "")){
				
				$error[] = 'The password was not specified.';
				
			}else{
			
				$mail_pass = inputsec(htmlizer(trim($_POST['mail_pass'])));
				
			}
			
			//The SMTP Mail server
			if(!(isset($_POST['mail_server'])) || (trim($_POST['mail_server']) == "")){
				
				$error[] = 'The SMTP server address was not specified.';
				
			}else{
			
				$mail_server = inputsec(htmlizer(trim($_POST['mail_server'])));
				
			}
			
			//The SMTP Mail port
			if(!(isset($_POST['mail_port'])) || (trim($_POST['mail_port']) == "")){
				
				$error[] = 'The SMTP port was not specified.';
				
			}else{
			
				$mail_port = (int) inputsec(htmlizer(trim($_POST['mail_port'])));
				
			}
			
		}
		
		//on error call the form
		if(!empty($error)){
			$theme['call_theme_func'] = 'mailset_theme';
			return false;		
		}
		
		//The array containing the MAIL SETTING Changes
		$mailset = array('mail' => $mail,
						'mail_user' => $mail_user,
						'mail_pass' => $mail_pass,
						'mail_server' => $mail_server,
						'mail_port' => $mail_port,
						);
		
		if(!modify_registry($mailset)){
		
			return false;
			
		}
		
		//Redirect
		redirect('act=admin&adact=conpan&seadact=mailset');
		
		return true;
		
		
	}else{
	
		$theme['call_theme_func'] = 'mailset_theme';
		
	}


}//End of function


//Function to manage general settings
function genset(){

global $user, $conn, $dbtables, $logged_in, $globals, $l, $AEF_SESS, $theme;
global $error, $lang_folders;
	
	
	/////////////////////////////
	// Define the necessary VARS
	/////////////////////////////
	
	$error = array();
	
	$notifications = 0;//If notifications are allowed.
	
	$subscribeauto = 0;//If notifications are allowed then to subscribe automatically.
		
	$session_timeout = 0;//Delete sessions which are inactive greater than this(in seconds)
	
	$last_active_span = 0;//Users Active in the last X Minutes
	
	$only_users = 0;//Whether only users are allowed to view the forum.(Permission 'view_forum' is required)
	
	$stats = 0;//Track daily stats
	
	$memhideemail = 0;//Can the members hide email from one another
	
	$showmemdetails = 0;//Can the guests see the member details
	
	$maxactivelist = 0;//Maximum Active users in the active users list
	
	$maxmemberlist = 0;//Maximum Users in the Members list
	
	$numsubinpage = 0;//The number of subscriptions that can be seen in a page
	
	$countinboardposts = 0;//Count the inboard Posts
	
	$enablenews = 0;//Enable the News system
	
	$users_visited_today = 0;//Users who visited today
	
	$show_groups = 0;
	
	$recent_posts = 0;//Recent Posts
	
	$rss_recent = 0;//RSS Feeds of Recent Posts
	
	$lang_folders = array();
	
	$folders = filelist($globals['server_url'].'/languages/', 0, 1);
	
	$report_posts = 0;//Report Posts
	
	foreach($folders as $k => $v){
	
		$lang_folders[$v['name']] = $v['name'];
	
	}
	
	//r_print($lang_folders);
	
	if(isset($_POST['editgenset'])){
		
		//Enable Notifications
		if(isset($_POST['notifications'])){
			
			$notifications = 1;
			
		}
		
		//Subscribe automatically
		if(isset($_POST['subscribeauto'])){
			
			$subscribeauto = 1;
			
		}
		
		//Only users can browse
		if(isset($_POST['only_users'])){
			
			$only_users = 1;
			
		}
		
		//Enable Stats
		if(isset($_POST['stats'])){
			
			$stats = 1;
			
		}
		
		//Can members hide email
		if(isset($_POST['memhideemail'])){
			
			$memhideemail = 1;
			
		}
		
		//Show members details to guests
		if(isset($_POST['showmemdetails'])){
			
			$showmemdetails = 1;
			
		}
		
		//The session_timeout
		if(!(isset($_POST['session_timeout'])) || (trim($_POST['session_timeout']) == "")){
			
			$error[] = 'The session timeout was not specified.';
			
		}else{
		
			$session_timeout = (int) inputsec(htmlizer(trim($_POST['session_timeout'])));
			
		}
		
		
		//The time for users to be considered active
		if(!(isset($_POST['last_active_span'])) || (trim($_POST['last_active_span']) == "")){
			
			$error[] = 'The time for users to be considered active was not specified.';
			
		}else{
		
			$last_active_span = (int) inputsec(htmlizer(trim($_POST['last_active_span'])));
			
		}
		
		//The number of users to show in active list
		if(!(isset($_POST['maxactivelist'])) || (trim($_POST['maxactivelist']) == "")){
			
			$error[] = 'The number of active users to show in the active users list was not specified.';
			
		}else{
		
			$maxactivelist = (int) inputsec(htmlizer(trim($_POST['maxactivelist'])));
			
		}
		
		//The number of members to show in the members list
		if(!(isset($_POST['maxmemberlist'])) || (trim($_POST['maxmemberlist']) == "")){
			
			$error[] = 'The number of members to show in the members list was not specified.';
			
		}else{
		
			$maxmemberlist = (int) inputsec(htmlizer(trim($_POST['maxmemberlist'])));
			
		}
		
		//The number of subscriptions to show in the subscriptions list
		if(!(isset($_POST['numsubinpage'])) || (trim($_POST['numsubinpage']) == "")){
			
			$error[] = 'The number of subscriptions to show in the subscriptions list was not specified.';
			
		}else{
		
			$numsubinpage = (int) inputsec(htmlizer(trim($_POST['numsubinpage'])));
			
		}
		
		
		//The number of recent posts was not specified
		if(!(isset($_POST['recent_posts'])) || (trim($_POST['recent_posts']) == "")){
			
			$error[] = 'The number of recent posts was not specified.';
			
		}else{
		
			$recent_posts = (int) inputsec(htmlizer(trim($_POST['recent_posts'])));
			
		}
		
		
		//RSS Feeds recent posts was not specified
		if(!(isset($_POST['rss_recent'])) || (trim($_POST['rss_recent']) == "")){
			
			$error[] = 'The number of recent posts for RSS Feeds was not specified.';
			
		}else{
		
			$rss_recent = (int) inputsec(htmlizer(trim($_POST['rss_recent'])));
			
		}
				
		
		//The language
		if(!(isset($_POST['language'])) || (trim($_POST['language']) == "")){
			
			$error[] = 'The default board language was not specified.';
			
		}else{
		
			$language = inputsec(htmlizer(trim($_POST['language'])));
			
			if(!in_array($language, $lang_folders)){
			
				$error[] = 'The language you specified does not exist.';
			
			}
			
		}
		
		//on error call the form
		if(!empty($error)){
			$theme['call_theme_func'] = 'genset_theme';
			return false;		
		}		
		
		//Count inboard Posts
		if(isset($_POST['countinboardposts'])){
			
			$countinboardposts = 1;
			
		}
		
		//Enable the News System
		if(isset($_POST['enablenews'])){
			
			$enablenews = 1;
			
		}
		
		//Enable the User Today
		if(isset($_POST['users_visited_today'])){
			
			$users_visited_today = 1;
			
		}
		
		//Enable the User Groups on Index
		if(isset($_POST['show_groups'])){
			
			$show_groups = 1;
			
		}
		
		//Enable Reporting of Posts
		if(isset($_POST['report_posts'])){
			
			$report_posts = 1;
			
		}
		
		//on error call the form
		if(!empty($error)){
			$theme['call_theme_func'] = 'genset_theme';
			return false;		
		}
		
		
		//The array containing the GENERAL SETTING Changes
		$genset = array('notifications' => $notifications,
						'subscribeauto' => $subscribeauto,
						'numsubinpage' => $numsubinpage,
						'session_timeout' => $session_timeout,
						'last_active_span' => $last_active_span,
						'only_users' => $only_users,
						'stats' => $stats,
						'memhideemail' => $memhideemail,
						'showmemdetails' => $showmemdetails,
						'maxactivelist' => $maxactivelist,
						'maxmemberlist' => $maxmemberlist,
						'countinboardposts' => $countinboardposts,
						'enablenews' => $enablenews,
						'users_visited_today' => $users_visited_today,
						'show_groups' => $show_groups,
						'recent_posts' => $recent_posts,
						'rss_recent' => $rss_recent,
						'language' => $language,
						'report_posts' => $report_posts
						);
		
		if(!modify_registry($genset)){
		
			return false;
			
		}
		
		//Redirect
		redirect('act=admin&adact=conpan&seadact=genset');
		
		return true;
		

	}else{
	
		$theme['call_theme_func'] = 'genset_theme';
		
	}


}//End of function


//Function to manage shoutbox settings
function shoutboxset(){

global $user, $conn, $dbtables, $logged_in, $globals, $l, $AEF_SESS, $theme;
global $error;
	
	
	/////////////////////////////
	// Define the necessary VARS
	/////////////////////////////
	
	$error = array();
	
	$enableshoutbox = 0;//Enable shoutbox
	
	$shouts = 0;//The number of shouts to return on first-load or reload
	
	$shoutboxtime = 0;//After this time limit a Shout is deleted to cleanup some space.(In Minutes)
	
	$shoutbox_emot = 0;//Allow smileys or not.

	$shoutbox_nbbc = 0;//Allow Normal BBC or no

	$shoutbox_sbbc = 0;//Allow Special BBC or no.
	
	
	if(isset($_POST['editshoutboxset'])){
				
		//Enable ShoutBox
		if(isset($_POST['enableshoutbox'])){
			
			$enableshoutbox = 1;
		
		}
		
		//Enable Smilies
		if(isset($_POST['shoutbox_emot'])){
			
			$shoutbox_emot = 1;
		
		}
		
		//Enable Normal BBC
		if(isset($_POST['shoutbox_nbbc'])){
			
			$shoutbox_nbbc = 1;
		
		}
		
		//Enable Special BBC
		if(isset($_POST['shoutbox_sbbc'])){
			
			$shoutbox_sbbc = 1;
		
		}
		
		
		//The lifetime of a Shout
		if(!(isset($_POST['shoutboxtime'])) || (trim($_POST['shoutboxtime']) == "")){
			
			$error[] = 'The lifetime of a Shout was not specified.';
			
		}else{
		
			$shoutboxtime = (int) inputsec(htmlizer(trim($_POST['shoutboxtime'])));
			
		}
		
		//The number of shouts on load
		if(!(isset($_POST['shouts'])) || (trim($_POST['shouts']) == "")){
			
			$error[] = 'The number of shouts on load was not specified.';
			
		}else{
		
			$shouts = (int) inputsec(htmlizer(trim($_POST['shouts'])));
			
			if($shouts < 1){
			
				$error[] = 'The number of shouts on load should be greater than 1.';
			
			}
			
		}
		
		
		//on error call the form
		if(!empty($error)){
			$theme['call_theme_func'] = 'shoutboxset_theme';
			return false;		
		}
		
		
		//The array containing the GENERAL SETTING Changes
		$genset = array('enableshoutbox' => $enableshoutbox,
						'shouts' => $shouts,
						'shoutboxtime' => $shoutboxtime,
						'shoutbox_emot' => $shoutbox_emot,
						'shoutbox_nbbc' => $shoutbox_nbbc,
						'shoutbox_sbbc' => $shoutbox_sbbc
						);
		
		if(!modify_registry($genset)){
		
			return false;
			
		}
		
		//Redirect
		redirect('act=admin&adact=conpan&seadact=shoutboxset');
		
		return true;
		

	}elseif(isset($_POST['delallshouts'])){
	
		//Truncate table
		if(isset($_POST['truncatetable'])){
			
			//Truncate Table
			$qresult = makequery("TRUNCATE TABLE ".$dbtables['shouts']);
		
		}else{
		
			//Just Delete
			$qresult = makequery("DELETE FROM ".$dbtables['shouts']);
		
		}
		
		//Redirect
		redirect('act=admin&adact=conpan&seadact=shoutboxset');
		
		return true;
	
	}else{
	
		$theme['call_theme_func'] = 'shoutboxset_theme';
		
	}


}//End of function


//Checks and installs updates
function updates(){

global $user, $conn, $dbtables, $logged_in, $globals, $l, $AEF_SESS, $theme;
global $error, $info;
	
	/////////////////////////////
	// Define the necessary VARS
	/////////////////////////////
	
	$error = array();
	
	$info = array();
	
	//$aefurl = 'http://localhost/electron/updates.php?version='.$globals['version'];
	$aefurl = 'http://www.anelectron.com/updates.php?version='.$globals['version'];
	
	$aefmessage = get_web_file($aefurl);
		
	if(empty($aefmessage)){
	
		$info['message'] = 'We were unable to connect to <a href="http://www.anelectron.com">Advanced Electron Forums</a>.';
	
	}
	
	$info = aefunserialize($aefmessage);//r_print($info);
	
	//Was there some info recieved
	if(empty($info['version'])){
	
		$info['message'] = 'We were unable to connect to <a href="http://www.anelectron.com">Advanced Electron Forums</a>.';
	
	}
		
	if(isset($_POST['update']) && !empty($info['link'])){		
		
		//Try to give some more time
		@set_time_limit(300);
		
		//Memory limit
		@ini_set('memory_limit', '128M');
		
		$compressedfile = $globals['server_url'].'/'.basename($info['link']);
		
		//Get the file	
		if(!get_web_file($info['link'], $compressedfile)){
	
			$error[] = 'There were errors while downloading the file from the AEF site.';
	
		}
		
		//on error call the form
		if(!empty($error)){
			$theme['call_theme_func'] = 'updates_theme';
			return false;		
		}
		
		
		//Lets Decompress
		if(!decompress($compressedfile, $globals['server_url'], 1)){
			
			$error[] = 'Could not decompress the Upgrade Files.';
		
		}		
		
		//on error call the form
		if(!empty($error)){
			$theme['call_theme_func'] = 'updates_theme';
			return false;		
		}
		
		
		//Looks like everything went fine - Redirect
		header("Location: ".$globals['url'].$info['redirect']);
		return true;

	}else{
		
		$theme['call_theme_func'] = 'updates_theme';		
		
	}


}//End of function

?>