<?php

//////////////////////////////////////////////////////////////
//===========================================================
// universal.php
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

/* Database Connection */

$globals['user'] = '';
$globals['password'] = '';
$globals['database'] = '';
$globals['dbprefix'] = '';
$globals['server'] = '';

/* Ending - Database Connection */

if(empty($_POST)) die('<meta http-equiv="Refresh" content="0;url=setup/index.php">');

/* Core Settings */

$globals['url'] = '';
$globals['sn'] = '';
$globals['board_email'] = '';
$globals['server_url'] = '';
$globals['mainfiles'] = '';
$globals['themesdir'] = '';
$globals['gzip'] = 1;
$globals['cookie_name'] = '';

/* Ending - Core Settings */

?>