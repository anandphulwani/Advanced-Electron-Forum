<?php

function aefheader($title = ''){

global $theme, $user, $logged_in, $globals, $l, $dmenus, $onload, $newslinks, $feeds;
	
	$title = ((empty($title)) ? $globals['sn'] : $title);
	
	//Lets echo the top headers
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="keywords" content="aef, advanced, electron, forum, bulletin, board, software" />
	<title>'.$title.'</title>
	<link rel="stylesheet" type="text/css" href="'.$theme['url'].'/style.css" />
	<link rel="shortcut icon" href="favicon.ico">
	'.((empty($globals['rss_recent'])) ? '' : '<link rel="alternate" type="application/rss+xml" title="'.$globals['sn'].' - '.$l['rss'].'" href="'.$globals['index_url'].'act=feeds" />').'
	'.(empty($feeds) ? '' : implode('', $feeds)).'
	<script language="javascript" src="'.$theme['url'].'/js/universal.js" type="text/javascript"></script>
	<script language="javascript" src="'.$theme['url'].'/js/menu.js" type="text/javascript"></script>
	<script language="javascript" src="'.$theme['url'].'/js/domdrag.js" type="text/javascript"></script>	
	<script type="text/javascript">
	boardurl = \''.$globals['url'].'/\';
	indexurl = \''.$globals['index_url'].'\';
	imgurl = \''.$theme['images'].'\';
	</script>
	</head>
	<body onload="bodyonload();">';
	
	echo '<table border="0" cellpadding="0" cellspacing="0" width="100%" class="header">	
	<tr>
	
		<td align="left" rowspan="2">
		<a href="'.$globals['index_url'].'"><img src="'.(!empty($theme['headerimg']) ? $theme['headerimg'] : $theme['images'].'aeflogo.jpg').'" /></a>
		</td>
	
		<td align="right" class="welcome">';
		
	if($logged_in){
	
		echo ''.$l['welcome'].' <b>'.$user['username'].'</b>&nbsp;&nbsp;&nbsp;&nbsp;[<font class="logout"><a href="'.$globals['index_url'].'act=logout">'.$l['nav_logout'].'</a></font>]&nbsp;&nbsp;';
			
	}else{
	
		echo '<b>'.$l['welcome'].'</b> '.$l['guest'].'. '.$l['please'].' <a href="'.$globals['index_url'].'act=login" title="'.$l['login_title'].'">'.$l['login'].'</a> '.$l['or'].' <a href="'.$globals['index_url'].'act=register" title="'.$l['register_title'].'">'.$l['register'].'</a>&nbsp;&nbsp;';
	
	}
	
		echo '</td>
		
	</tr>	
	
	<tr>
	
		<td align="right" valign="bottom">';
		
		//Array Holding the Options to be imploded
	$opt = array();
	
	if($logged_in){			
		
		if($user['can_admin']){
			
			$opt[] = '<b><a href="'.$globals['index_url'].'act=admin" onmouseover="dropmenu(this, \'adminopt\')" onmouseout="pullmenu(\'adminopt\')">'.$l['admin'].'</a></b>';
				
			$dmenus[] = '<table id="adminopt" onmouseover="clearTimeout(hider)" onmouseout="pullmenu(\'adminopt\')" class="ddopt" cellpadding="5" cellspacing="1">
<tr>
<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor"><a href="'.$globals['index_url'].'act=admin&adact=conpan">'.$l['nav_control_panel'].'</a></td>
</tr>
<tr>
<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor"><a href="'.$globals['index_url'].'act=admin&adact=forums">'.$l['nav_manage_forums'].'</a></td>
</tr>
<tr>
<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor"><a href="'.$globals['index_url'].'act=admin&adact=users">'.$l['nav_user_settings'].'</a></td>
</tr>
<tr>
<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor"><a href="'.$globals['index_url'].'act=admin&adact=approvals&seadact=manval">'.$l['nav_account_approvals'].'</a></td>
</tr>
<tr>
<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor"><a href="'.$globals['index_url'].'act=admin&adact=tpp">'.$l['nav_topic_posts'].'</a></td>
</tr>
</table>';
		}
		
		$opt[] = '<b><a href="'.$globals['index_url'].'act=usercp" style="position:relative;" onmouseover="dropmenu(this, \'ucpopt\')" onmouseout="pullmenu(\'ucpopt\')" >'.$l['usercp'].'</a></b>
';
		$dmenus[] = '<table id="ucpopt" onmouseover="clearTimeout(hider)" onmouseout="pullmenu(\'ucpopt\')" class="ddopt" cellpadding="5" cellspacing="1">
<tr>
<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor"><a href="'.$globals['index_url'].'act=usercp&ucpact=profile">'.$l['nav_profile_settings'].'</a></td>
</tr>
<tr>
<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor"><a href="'.$globals['index_url'].'act=usercp&ucpact=account">'.$l['nav_account_settings'].'</a></td>
</tr>
<tr>
<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor"><a href="'.$globals['index_url'].'act=usercp&ucpact=forumset">'.$l['nav_forum_preferences'].'</a></td>
</tr>
</table>';	
		
		$opt[] = '<a href="'.$globals['index_url'].'act=usercp&ucpact=inbox"  style="position:relative;" onmouseover="dropmenu(this, \'pmopt\')" onmouseout="pullmenu(\'pmopt\')">'.$l['pms'].' ('.$user['unread_pm'].')</a>';
		
		$dmenus[] = '<table id="pmopt" onmouseover="clearTimeout(hider)" onmouseout="pullmenu(\'pmopt\')" class="ddopt" cellpadding="5" cellspacing="1">
<tr>
<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor">
<a href="'.$globals['index_url'].'act=usercp&ucpact=inbox">'.$l['nav_inbox'].'('.$user['unread_pm'].')</a></td>
</tr>
<tr>
<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor">
<a href="'.$globals['index_url'].'act=usercp&ucpact=writepm">'.$l['nav_compose'].'</a></td>
</tr>
<tr>
<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor">
<a href="'.$globals['index_url'].'act=usercp&ucpact=searchpm">'.$l['nav_search_pm'].'</a></td>
</tr>
<tr>
<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor">
<a href="'.$globals['index_url'].'act=usercp&ucpact=trackpm">'.$l['nav_track_mesaages'].'</a></td>
</tr>
</table>';
	
	}
	
	
	//Can He search
	if(!empty($user['can_search'])){
	
		$opt[] = '<a href="'.$globals['index_url'].'act=search" style="position:relative;" onmouseover="dropmenu(this, \'ddsearch\')" onmouseout="pullmenu(\'ddsearch\')">'.$l['nav_search'].'</a>';
		$dmenus[] = '<table id="ddsearch" onmouseover="clearTimeout(hider)" onmouseout="pullmenu(\'ddsearch\')" class="ddopt" cellpadding="5" cellspacing="1">
<tr>
<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor">
<form name="ddsearch" method="get" action="'.$globals['index_url'].'"><input type="text" name="allwords" />
<input type="submit" value="'.$l['nav_submit_search'].'" name="search" /><input type="hidden" name="act" value="search" /><input type="hidden" name="sact" value="results" /><input type="hidden" name="within" value="1" /><input type="hidden" name="forums[]" value="0" /><input type="hidden" name="showas" value="1" /></form>
</td>
</tr>
<tr>
<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor"><a href="'.$globals['index_url'].'act=search">'.$l['nav_advanced_search'].'</a></td>
</tr>
</table>';

	}
	
	//The Calendar
	if(!empty($user['view_calendar'])){	
	
		$opt[] = '<a href="'.$globals['index_url'].'act=calendar">'.$l['nav_calendar'].'</a>';
	
	}
	
	//Some General Options
	$quick_links = (empty($globals['enablenews']) ? '' : '<tr>
<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor">
<a href="'.$globals['index_url'].'act=news">'.$l['nav_news'].'</a>
</td>
</tr>' ).'
'.((empty($globals['enableshoutbox']) || empty($user['can_shout']) || !empty($theme['fixshoutbox'])) ? '' : '<tr>
<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor">
<a href="javascript:show_shoutbox();">'.$l['nav_shout_box'].'</a>
</td>
</tr>' ).'
'.(empty($logged_in) ? '' : '<tr>
<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor">
<a href="'.$globals['index_url'].'act=unread">'.$l['nav_unread_topics'].'</a>
</td>
</tr>' ).'
'.(empty($user['view_members']) ? '' : '<tr>
<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor"><a href="'.$globals['index_url'].'act=members">'.$l['nav_members'].'</a></td>
</tr>' ).'
'.(empty($user['view_active']) ? '' : '<tr>
<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor"><a href="'.$globals['index_url'].'act=active">'.$l['nav_active'].'</a></td>
</tr>' ).'
'.(empty($logged_in) ? '' : '<tr>
<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor"><a href="'.$globals['index_url'].'act=markread&mark=board">'.$l['nav_mark_read'].'</a></td>
</tr>' );
		
	if(!empty($quick_links)){
		
		$opt[] = '<a href="#" style="position:relative;" onmouseover="dropmenu(this, \'quicklinks\')" onmouseout="pullmenu(\'quicklinks\')">'.$l['quick_links'].'</a>';
		$dmenus[] = '<table id="quicklinks" onmouseover="clearTimeout(hider)" onmouseout="pullmenu(\'quicklinks\')" class="ddopt" cellpadding="5" cellspacing="1">
'.$quick_links.'
</table>';

	}
	
	//Quick Login
	if(empty($logged_in)){
	
		$opt[] = '<form action="'.$globals['index_url'].'act=login"  method="post" name="loginform">
		<input type="text" size="9" name="username" class="ql" value="'.$l['username'].'" onfocus="(this.value==\''.$l['username'].'\' ? this.value=\'\' : void(0))" />&nbsp;
		<input type="password" size="9" name="password" class="ql" value="'.$l['password'].'" onfocus="(this.value==\''.$l['password'].'\' ? this.value=\'\' : void(0))" />&nbsp;
		<input type="submit" name="login" value="'.$l['sign_in'].'" class="ql" />
</form>';
	
	}
	
		//this is the users menu table
		echo '<table cellspacing="2" cellpadding="3" width="100%" height="35">
				<tr align="left">
					<td align="right" nowrap="nowrap" class="navlinks">';
	
			echo implode('&nbsp;&nbsp;|&nbsp;&nbsp;', $opt);
		
				echo '</td>
				</tr>
			</table>
			
		</td>
	
	</tr>
	
	</table>';
	
echo (empty($theme['headernavtree']) ? '' : tree().'<br /><br />');

	
	if(!empty($theme['headerads'])){

		echo unhtmlentities($theme['headerads']);
	
	}
	
	//News
	if(!empty($newslinks)){
		
echo '<br /><table width="100%" cellpadding="2" cellspacing="2" class="newshead">
<tr>
<td width="1%">
<b>'.$l['news_prefix'].':</b>
</td>
<td valign="top">';

foreach($newslinks as $n => $v){

	echo '<div id="news'.$n.'" class="newslinks" >'.(empty($v['approved']) ? $l['unapproved_news'].' : ' : '' ).'<a href="'.$globals['index_url'].'act=news#n'.$n.'">'.$v['title'].'</a></div>';
	
}

echo '</td>
</tr>
</table><br />
<script type="text/javascript">
addonload(\'initnews();\');
nextnews = 3000;
news_r = new Array(\''.implode('\', \'', array_keys($newslinks)).'\');
newsindex = 0;

function initnews(){
	if(news_r.length > 1){
		try{hideel(nid);}catch(e){}
		if(typeof(news_r[newsindex]) == "undefined"){
			newsindex = 0;
		}
		nid = "news"+news_r[newsindex];
		showel(nid);
		smoothopaque(nid, 0, 100, 5);
		newsindex++;
		newstimeout = setTimeout(initnews, nextnews);
	}else{
		showel("news"+news_r[newsindex]);
	}
};

</script>';
		
	}
	
	//Shout box
	if(!empty($globals['enableshoutbox']) && !empty($user['can_shout'])){
		
		echo '<script language="javascript" src="'.$theme['url'].'/js/shoutbox.js" type="text/javascript"></script>
		<script type="text/javascript">
		can_del_shout = '.(empty($user['can_del_shout']) ? 'false' : 'true').';
		</script>';
		
		if(empty($theme['fixshoutbox'])){
		
			$dmenus[] = '<div id="shoutbox" class="pqr">
<table width="100%" cellspacing="0" cellpadding="0" id="shbhandle">
<tr>
<td class="dwhl"></td>
<td align="left" class="dwhc"><b>'.$l['shout_box'].'</b></td>
<td align="right" class="dwhc"><a href="javascript:hide_shoutbox()"><img src="'.$theme['images'].'close.gif"></a></td>
<td class="dwhr"></td>
</tr>
</table>

<table width="100%" cellspacing="0" cellpadding="0" class="dwbody">
<tr>
<td width="100%" valign="top">
<div id="shouts" class="shouts"></div>
</td>
</tr>
<tr>
<td style="padding:4px;">
<input type="text" size="35" id="addshout" onkeydown="handleshoutkeys(event)">&nbsp;&nbsp;<input type="button" onclick="shout();" value="'.$l['shout'].'" id="addshoutbut">&nbsp;&nbsp;<input type="button" onclick="reloadshoutbox();" value="'.$l['reload'].'">
</td>
</tr>
</table>
</div>

<script type="text/javascript">
Drag.init($("shbhandle"), $("shoutbox"));
</script>';

		//Fix it
		}else{			
	
			echo '<br /><div id="shoutbox">
<table width="100%" cellspacing="0" cellpadding="0">
<tr>
<td class="dwhl"></td>
<td align="left" class="dwhc"><b>'.$l['shout_box'].'</b></td>
<td align="right" class="dwhc"><a href="javascript:hideshow_fixedshoutbox()" ><img src="'.$theme['images'].'expanded.gif" id="shbimgcollapser" /></a></td>
<td class="dwhr"></td>
</tr>
</table>

<div class="cathide" id="shbcontainer">
<table width="100%" cellspacing="0" cellpadding="0" class="dwbody">
<tr>
<td width="100%" valign="top">
<div id="shouts" class="shouts"></div>
</td>
</tr>
<tr>
<td style="padding:4px;">
<input type="text" size="35" id="addshout" onkeydown="handleshoutkeys(event)">&nbsp;&nbsp;<input type="button" onclick="shout();" value="'.$l['shout'].'" id="addshoutbut">&nbsp;&nbsp;<input type="button" onclick="reloadshoutbox();" value="'.$l['reload'].'">
</td>
</tr>
</table>
</div>
</div>
<br />

<script type="text/javascript">
addonload(\'init_fixedshoutbox();\');
</script>';
		
		}
	
	}
	
	if(!empty($user['group_message'])){
	
echo '<table width="100%" cellspacing="2" cellpadding="4" class="dwbody">
<tr><td class="dwhc">'.$l['group_message'].'</td></tr>
<tr><td>'.$user['group_message'].'</td></tr></table><br />';
	
	}
	
	//everything will go after this
	
}


function aeffooter(){

global $user, $conn, $dbtables, $logged_in, $globals, $l, $AEF_SESS, $dmenus, $end_time, $start_time, $onload, $theme;

echo '<br />';

if(!empty($theme['footerads'])){

	echo unhtmlentities($theme['footerads']);

}

if($logged_in && !empty($theme['showdock'])){

echo '<script language="javascript" src="'.$theme['url'].'/js/dock.js" type="text/javascript"></script><center>
<ul id="dock" class="dock">
<li><a href="'.$globals['index_url'].'" title="'.$l['dock_home'].'"><img src="'.$theme['images'].'home.gif" alt="'.$l['dock_home'].'"></a></li>
'.(empty($user['can_admin']) ? '' : '<li><a href="'.$globals['index_url'].'act=admin" title="'.$l['dock_admin'].'"><img src="'.$theme['images'].'admincp.gif" alt="'.$l['dock_admin'].'"></a></li>').'
<li><a href="'.$globals['index_url'].'act=usercp&ucpact=profile" title="'.$l['dock_profile_settings'].'"><img src="'.$theme['images'].'profilesettings.gif" alt="'.$l['dock_profile_settings'].'"></a></li>
<li><a href="'.$globals['index_url'].'act=usercp&ucpact=forumset" title="'.$l['dock_forum_settings'].'"><img src="'.$theme['images'].'settings.gif" alt="'.$l['dock_forum_settings'].'"></a></li>
<li><a href="'.$globals['index_url'].'act=usercp&ucpact=inbox" title="'.$l['dock_inbox'].'"><img src="'.$theme['images'].'inbox.gif" alt="'.$l['dock_inbox'].'"></a></li>
<li><a href="'.$globals['index_url'].'act=usercp&ucpact=writepm" title="'.$l['dock_compose'].'"><img src="'.$theme['images'].'compose.gif" alt="'.$l['dock_compose'].'"></a></li>
<li><a href="'.$globals['index_url'].'act=search" title="'.$l['dock_search'].'"><img src="'.$theme['images'].'search.gif" alt="'.$l['dock_search'].'"></a></li>
</ul>
</center>
<script type="text/javascript">
aefdock = new dock();
addonload(\'aefdock.init();\');
</script>';

}

//Footer Nav tree
echo (empty($theme['footernavtree']) ? '' : tree().'<br /><br />');

$pageinfo = array();

echo '<br /><div align="center">'.$l['times_are'].(empty($user['timezone']) ? '' : ' '.($user['timezone'] > 0 ? '+' : '').$user['timezone']).'. '.$l['time_is'].' '.datify(time(), false).'.</div>';

if(!empty($theme['shownumqueries'])){

	$pageinfo[] = $l['queries'].': '.$globals['queries'];

}

if(!empty($theme['showntimetaken'])){

	$pageinfo[] = $l['page_time'].':'.substr($end_time-$start_time,0,5);

}

echo '<br />
<table width="100%" cellpadding="5" cellspacing="1" class="bottom">
<tr>
<td align="left">'.((empty($globals['rss_recent'])) ? '' : '<a href="'.$globals['index_url'].'act=feeds" title="'.$globals['sn'].' - '.$l['rss'].'"><img src="'.$theme['images'].'feeds.gif" /></a>&nbsp;&nbsp;').''.copyright().'</td>'.(empty($pageinfo) ? '' : '<td align="right">'.implode('&nbsp;&nbsp;|&nbsp;&nbsp;', $pageinfo).'</td>').'
</tr>
</table><br />';

if(!empty($theme['copyright'])){

	echo unhtmlentities($theme['copyright']);

}

echo '<script type="text/javascript">
function bodyonload(){
	if(aefonload != \'\'){		
		eval(aefonload);
	}
	'.(empty($onload) ? '' : 'eval(\''.implode(';', $onload).'\');').'
};
</script>';

echo (empty($dmenus) ? '' : implode('', $dmenus) ).'
</body>
</html>';
}


//The tree for navigation
function tree(){

global $globals, $theme, $tree, $l;
	
	$links = array();
	
	if(empty($tree) || !is_array($tree)){
	
		$links[] = '<b><a href="'.$globals['index_url'].'">'.$l['index'].'</a></b>';
	
	}else{
	
		foreach($tree as $k => $v){
			
			//l - means links, txt - The text, prefix is a prefix
			$links[] = (empty($v['prefix']) ? '' : $v['prefix'] ).'<b><a href="'.$v['l'].'">'.$v['txt'].'</a></b>';
		
		}
	
	}
	
	return '<br /><br />'.$l['you_are_here'].': '.implode('&nbsp;&gt;&nbsp;', $links);

}


function error_handle($error, $table_width = '100%', $center = false){

global $l;

	//on error call the form
	if(!empty($error)){
		
		echo '<table width="'.$table_width.'" cellpadding="2" cellspacing="1" class="error" '.(($center) ? 'align="center"' : '' ).'>
			<tr>
			<td>
			'.$l['following_errors_occured'].' :
			<ul type="square">';
		
		foreach($error as $ek => $ev){
		
			echo '<li>'.$ev.'</li>';
		
		}
		
		
		echo '</ul>
			</td>
			</tr>
			</table>'.(($center) ? '</center>' : '' ).'
			<br />';
		
		
	}

}


//This will just echo that everything went fine
function success_message($message, $table_width = '100%', $center = false){

global $l;

	//on error call the form
	if(!empty($message)){
		
		echo '<table width="'.$table_width.'" cellpadding="2" cellspacing="1" class="error" '.(($center) ? 'align="center"' : '' ).'>
			<tr>
			<td>
			'.$l['following_message'].' :
			<ul type="square">';
		
		foreach($message as $mk => $mv){
		
			echo '<li>'.$mv.'</li>';
		
		}
		
		
		echo '</ul>
			</td>
			</tr>
			</table>'.(($center) ? '</center>' : '' ).'
			<br />';
		
		
	}

}


function majorerror($title, $text, $heading = ''){

global $theme, $globals, $user, $l;

aefheader(((empty($title)) ? $l['fatal_error'] : $title));

?>

<table width="70%" cellpadding="2" cellspacing="1" class="cbor" align="center">
	
	<tr>
	<td class="patcbg" align="left">
	<b><?php echo ((empty($heading)) ? $l['following_fatal_error'].':' : $heading);?></b>
	</td>
	</tr>
	
	<tr>
	<td class="ucpfcbg1" colspan="2" align="center">
	<img src="<?php echo $theme['images'];?>sigwrite.png" />
	</td>
	</tr>
	
	<tr>
	<td class="ucpflc" align="left"><?php echo $text;?><br />
	</td>
	</tr>

</table>
<br /><br /><br />

<?php

aeffooter();

//We must return
return true;

}

function message($title, $heading = '', $icon, $text){

global $theme, $globals, $user, $l;

aefheader(((empty($title)) ? $l['board_message'] : $title));

?>

<table width="70%" cellpadding="2" cellspacing="1" class="cbor" align="center" >
	
	<tr>
	<td class="patcbg" align="left"  >
	<b><?php echo ((empty($heading)) ? $l['following_board_message'].':' : $heading);?></b>
	</td>
	</tr>
	
	<tr>
	<td class="ucpfcbg1" colspan="2" align="center">
	<img src="<?php echo $theme['images'].(empty($icon)?'info.png':$icon);?>" />
	</td>
	</tr>
	
	<tr>
	<td class="ucpflc" align="left"><?php echo $text;?><br />
	</td>
	</tr>

</table>
<br /><br /><br />

<?php

aeffooter();

//We must return
return true;

}


function navigator(){

global $categories, $forums, $logged_in, $l, $board, $user;

	if(empty($forums) || empty($categories)){
	
		return '';
	
	}
	
	$str = '<br /><br />'.
$l['jump_to'].' : <select id="forumjump" class="jump" onchange="if(this.value) window.location=indexurl+this.value" style="font-size:11px;">';
	
	$str .= '<option value="">'.$l['select_location'].' :</option>';
	
	//Site Jump
	$str .= '<optgroup label="'.$l['site_links'].'">
<option value="act=home">'.$l['jump_home'].'</option>
'.(empty($user['can_admin']) ? '' : '<option value="act=admin">'.$l['jump_admin'].'</option>' ).'
'.(empty($logged_in) ? '' : '<option value="act=usercp">'.$l['jump_usercp'].'</option>' ).'
'.(empty($logged_in) ? '' : '<option value="act=unread">'.$l['jump_unread'].'</option>' ).'
'.(empty($user['view_members']) ? '' : '<option value="act=members">'.$l['jump_members'].'</option>' ).'
'.(empty($user['view_active']) ? '' : '<option value="act=active">'.$l['jump_active'].'</option>' ).'
'.(empty($user['can_search']) ? '' : '<option value="act=search">'.$l['jump_search'].'</option>' ).'
</optgroup>';
	
	$str .= '<optgroup label="'.$l['forum_jump'].'">';
	
	foreach($categories as $c => $cv){		
				
		if(isset($forums[$c])){			
		
			$str .= '<option value="#cid'.$c.'">'.$categories[$c]['name'].'</option>';
			
			foreach($forums[$c] as $f => $fv){			
								
				$dasher = '&nbsp;&nbsp;';
				
				for($t = 0; $t < $forums[$c][$f]['board_level']; $t++){
				
					$dasher .= '&nbsp;&nbsp;&nbsp;&nbsp;';
					
				}
				
				$str .= '<option value="fid='.$forums[$c][$f]['fid'].'" '.(!empty($board['fid']) && $board['fid'] == $forums[$c][$f]['fid'] ? 'selected="selected"' : '' ).'>'.$dasher.'|--'.$forums[$c][$f]['fname'].'</option>';
			
							
			}
		
		}
		
	}
	
	$str .= '</optgroup>';
	
	$str .= '</select>';
	
	return $str;
	
}

?>