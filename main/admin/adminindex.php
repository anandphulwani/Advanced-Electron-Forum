<?php

//////////////////////////////////////////////////////////////
//===========================================================
// adminindex.php
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


function adminindex(){

global $user, $conn, $dbtables, $logged_in, $globals, $l, $AEF_SESS, $theme;

	//The name of the file
	$theme['init_theme'] = 'admin/adminindex';
	
	//The name of the Page
	$theme['init_theme_name'] = 'Admin Center Index';
	
	//Array of functions to initialize
	$theme['init_theme_func'] = array('adminindex_theme');
	
	//My activity
	$globals['last_activity'] = 'ai';
	
	$theme['call_theme_func'] = 'adminindex_theme';
	
	/*$file = @file('http://www.anelectron.com/news/');
	
	if(empty($file)){
	
		$news = 'Could not connect to <a href="http://www.anelectron.com/">Anelectron.com</a> for the latest news.';
	
	}else{
	
		$news = implode('', $file);

	}*/
	
}

?>