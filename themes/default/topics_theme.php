<?php

function topics_theme(){

global $user, $logged_in, $globals, $AEF_SESS, $theme, $l;
global $categories, $forums, $active, $activebots, $anonymous, $guests, $its_in_boards, $board, $topics, $sortbylink, $sortby, $order, $pg, $page, $onload, $dmenus, $feeds;
	
	if(!empty($board['rss'])){
	
		$feeds[] = '<link rel="alternate" type="application/rss+xml" title="'.$board['fname'].' - '.$l['rss'].'" href="'.$globals['index_url'].'act=feeds&forum='.$board['fid'].'" />';
	
	}
	
	//////////////////////////
	// Count the forums pages
	//////////////////////////
	
	$fpages = ceil($board['ntopic']/$globals['maxtopics']);
	
	$pg = ($page/$globals['maxtopics']) + 1;//Current Page	
	
	$forumpages = array();
	
	$so = (!empty($sortbylink) ? '&sortby='.$sortbylink.'&order='.($order == 'ASC' ? 1 : 2) : '');
	
	if($fpages > 1){
	
		if($pg != 1){
			
			$forumpages['&lt;&lt;'] = 1;
			
			$forumpages['&lt;'] = ($pg - 1);
		
		}
		
		for($i = ($pg - 4); $i < $pg; $i++){
			
			if($i >= 1){
			
				$forumpages[$i] = $i;
			
			}
		
		}
		
		$forumpages[$pg] = $pg;
		
		
		for($i = ($pg + 1); $i <= ($pg + 4); $i++){
		
			if($i <= $fpages){
			
				$forumpages[$i] = $i;
			
			}
		
		}
		
		
		if($pg != $fpages){
			
			$forumpages['&gt;'] = ($pg + 1);
			
			$forumpages['&gt;&gt;'] = $fpages;
		
		}
	
	}
	
	//Link array of active users
	$activeusers = array();
	
	//Build the active users array
	foreach($active as $i => $v){
	
		$activeusers[] = '<a href="'.$globals['index_url'].'mid='.$active[$i]['id'].'" style="color: '.$active[$i]['mem_gr_colour'].';" >'.$active[$i]['username'].'</a>';
	
	}
	
	//Are there any Bots
	foreach($activebots as $k => $v){
	
		$activeusers[] = $v;
	
	}

	//The header
	aefheader($board['fname']);
	
//Are there any In Boards	
if(!empty($board['in_boards'])){
	
//Echo the In Board table
echo '<br /><table width="100%" cellpadding="0" cellspacing="0" id="inboards">			
<tr>
<td>
<table width="100%" cellpadding="0" cellspacing="0"><tr>
<td class="cbgl"></td>
<td class="cbg">'.$l['in_boards'].'</td>
<td class="cbgr"></td>		
</tr>
</table>
</td>
</tr>

<tr>
<td width="100%">
<table width="100%" class="cbgbor" cellpadding="2" cellspacing="1">
<tr>
<td class="cbg1" width="10%">&nbsp;</td>
<td class="cbg1" width="44%">'.$l['header_board'].'</td>
<td class="cbg1" width="10%">'.$l['header_topics'].'</td>
<td class="cbg1" width="9%">'.$l['header_posts'].'</td>
<td class="cbg1" width="27%">'.$l['header_last_post'].'</td>
</tr>';
		
//Loop through the In boards
foreach($board['in_boards'] as $i => $v){

	echo '<tr>
	<td class="miimg" width="10%" align="center">
	<img src="'.(($board['in_boards'][$i]['fimage']) ? $board['in_boards'][$i]['fimage'] : (($board['in_boards'][$i]['is_read']) ? $theme['images'].'not.png' : $theme['images'].'new.png')).'">
	</td>
	
	<td class="mifor" width="44%">
	<font class="forlink">
	<a href="'.$globals['index_url'].'fid='.$board['in_boards'][$i]['fid'].'">'.$board['in_boards'][$i]['fname'].'</a>
	</font><br />
	<font class="desc">
	'.$board['in_boards'][$i]['description'].'
	</font><br />';
		
		//Make the moderators array if there are any
		if(isset($v['moderators'])){					
			
			$boardmoderators[$i] = array();
			
			foreach($v['moderators'] as $mk => $mv){
			
				$boardmoderators[$i][] = '<a href="'.$globals['index_url'].'mid='.$v['moderators'][$mk]['id'].'">'.$v['moderators'][$mk]['username'].'</a>';
			
			}
			
			echo '<div style="padding-top:4px;padding-bottom:2px;"><font class="modtxt">'.$l['forum_moderators'].' : </font>';
			
			echo implode(' , ', $boardmoderators[$i]).'</div>';
			
		}
		
		
		//Make the In Board array if there are any
		if(isset($v['in_boards'])){					
			
			$inboards[$i] = array();
			
			foreach($v['in_boards'] as $ik => $iv){
			
				$inboards[$i][] = (!empty($iv['is_read']) ? '' : '<b>').'<a href="'.$globals['index_url'].'fid='.$v['in_boards'][$ik]['fid'].'">'.$v['in_boards'][$ik]['fname'].'</a>'.(!empty($iv['is_read']) ? '' : '</b>');
			
			}
			
			echo '<div style="padding-top:3px;"><font class="inbtxt">'.$l['forum_in_boards'].' : </font>';
		
			echo implode(' , ', $inboards[$i]).'</div>';
			
		}
	
	echo '</td>
	
	<td class="mitop" width="10%">
	'.$board['in_boards'][$i]['ft_topic'].'
	</td>
	
	<td class="miposts" width="9%">
	'.$board['in_boards'][$i]['ft_posts'].'</td>
	
	<td class="milp" width="27%">';
	
	if(empty($board['in_boards'][$i]['tid'])){
		
			echo $l['no_last_post'];
			
		}else{
		
			echo '&nbsp;'.$board['in_boards'][$i]['pdate'].'<br />'.
			$l['in'].' <a href="'.$globals['index_url'].'tid='.$board['in_boards'][$i]['tid'].'" title="'.$l['go_to_first_post'].'">'.$board['in_boards'][$i]['topic'].'</a>&nbsp;&nbsp;&nbsp;<a href="'.$globals['index_url'].'tid='.$board['in_boards'][$i]['tid'].'&tpg='.$board['in_boards'][$i]['last_page'].'#p'.$board['in_boards'][$i]['pid'].'" title="'.$l['go_to_last_post'].'"><img src="'.$theme['images'].'right.gif" /></a><br />'.
			$l['by'].' <a href="'.$globals['index_url'].'mid='.$board['in_boards'][$i]['poster_id'].'">'.$board['in_boards'][$i]['username'].'</a>';
			
		}
		
	echo '</td>
	</tr>';
	
}//end the forums loop

//The end of the table
echo '
</table>

</td>			
</tr>
<tr>
<td><img src="'.$theme['images'].'cbot.png" width="100%" height="15"></td>
</tr>

</table>
<br /><br />';

}//End of IF

/* Ending - In Boards are to be shown also */
	
	
	if(!empty($board['frules'])){
		
		echo '<script language="javascript" src="'.$theme['url'].'/js/slider.js" type="text/javascript"></script>
		<script type="text/javascript">
		slider = new slider();
		slider.elements = new Array(\'frules'.$board['fid'].'\');
		addonload(\'slider.init();\');
		</script>';
		
		echo '<table width="100%" cellpadding="0" cellspacing="0">	
	<tr>
	<td>
	<table width="100%" cellpadding="0" cellspacing="0"><tr>
	<td class="tthl"></td>
	<td class="tthc">'.$board['frulestitle'].'</td>
	<td class="tthc" align="right">
	<a href="javascript:slider.slide(\'frules'.$board['fid'].'\')" ><img id="ifrules'.$board['fid'].'" src="'.$theme['images'].'expanded.gif" /></a>
	</td>
	<td class="tthr"></td>		
	</tr>
	</table>
	</td>
	</tr>
	
	<tr>
	<td width="100%">
	<div id="frules'.$board['fid'].'" class="cathide">
	<table width="100%" class="cbgbor" cellpadding="3" cellspacing="1" id="tfrules'.$board['fid'].'">	
	<tr>
	<td class="ttimg">
	'.$board['frules'].'
	</td>
	</tr>
	</table>
	</div>
	</td>
	</table><br /><br />';
	
	}
	
	if(!empty($forumpages)){

$links = '<table align="right" class="cbgbor" cellspacing="1">
<tr>';
$links .= '<td class="pagelinks"><a href="#" onmouseover="dropmenu(this, \'pagejump\')" onmouseout="pullmenu(\'pagejump\')" title="'.$l['page_jump_title'].'" >Page '.$pg.' of '.$fpages.'</a></td>';
$dmenus[] = '<table id="pagejump" onmouseover="clearTimeout(hider)" onmouseout="pullmenu(\'pagejump\')" class="ddopt" cellpadding="5" cellspacing="1">
<tr>
<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor">
<form name="pagejump" method="get" action="'.$globals['index_url'].'">
<input type="hidden" name="fid" value="'.$board['fid'].'" />
<input type="text" name="bpg" size="10" />
<input type="submit" value="'.$l['submit_go'].'" />
</form>
</td>
</tr>
</table>';
foreach($forumpages as $k => $lv){

	$links .= '<td class="'.($k == $pg ? 'activepage' : 'pagelinks' ).'"><a href="'.$globals['index_url'].'fid='.$board['fid'].'&bpg='.$lv.''.$so.'" >'.$k.'</a></td>';

}
$links .= '</tr>
</table>';
	
	echo $links.'<br />';
	
	}
	
	/* Options for the user of posting, Polls and notify */
	
	//Is the board locked
	if($board['status'] != 0 || ($board['status'] == 0 && $user['has_priviliges'])){
	
	//If he has the permissions to post
	if($user['can_post_topic'] || $board['can_post_topic']){
		echo '<a href="'.$globals['index_url'].'act=topic&forum='.$board['fid'].'"><img src="'.$theme['images'].'buttons/newtopic.png"></a>&nbsp;&nbsp;&nbsp;';
	}
	
	//If he is allowed to recieve notifications
	if($user['notify_new_topics']){
		echo '<a href="'.$globals['index_url'].'act=notify&nact=forum&nfid='.$board['fid'].'"><img src="'.$theme['images'].'buttons/notify.png"></a>&nbsp;&nbsp;&nbsp;';
	}
	
	}
	
	/* Ending - Options for the user of posting, Polls and notify */
	
	
	$show_mod = (($user['can_del_own_topic'] && $user['can_del_other_topic']) || 
				$user['can_merge_topics'] || $user['can_make_sticky'] || 
				($user['can_move_own_topic'] && $user['can_move_other_topic']) || 
				($user['can_lock_own_topic'] && $user['can_lock_other_topic']) ? 1 : 0);
	
	
	//The first row that is Headers
	echo'<br /><br /><br /><table width="100%" cellpadding="0" cellspacing="0">			
	<tr>
	<td>
	<table width="100%" cellpadding="0" cellspacing="0"><tr>
	<td class="tthl"></td>
	'.((empty($board['rss'])) ? '' : '<td class="tthc" align="left">&nbsp;<a href="'.$globals['index_url'].'act=feeds&forum='.$board['fid'].'" title="'.$l['feeds_in_forum'].'"><img src="'.$theme['images'].'feeds.gif" /></a></td>').'
	<td class="tthc" align="center"><b>'.$l['topics_heading'].' - '.$board['fname'].'</b></td>
	<td class="tthr"></td>		
	</tr>
	</table>
	</td>
	</tr>
	
	<tr>
	<td width="100%"><table width="100%" class="cbgbor" cellpadding="1" cellspacing="1">	
	<tr>
	<td class="ttcbg" colspan="2"></td>
	<td class="ttcbg" width="'.($show_mod ? '38' : '41' ).'%">'.$l['header_subject'].'</td>
	<td class="ttcbg" width="14%" align="center">'.$l['header_started_by'].'</td>
	<td class="ttcbg" width="5%" align="center">'.$l['header_replies'].'</td>
	<td class="ttcbg" width="7%" align="center">'.$l['header_views'].'</td>
	<td class="ttcbg" width="25%">'.$l['header_last_post_info'].'</td>
	'.($show_mod ? '<script type="text/javascript">
	function deleteconfirm(){
		if($("selectedtopics").value == "delete"){
			var conf = confirm("'.$l['del_sel_conf'].'");
			if(conf == true){
				return true;
			}else{
				return false;
			}
		}else{
			return true;
		}
	}
	</script>
	<form method="post" action="" onsubmit="return deleteconfirm();">
	<td class="ttcbg" width="3%"><input type=checkbox onClick="check(document.getElementsByName(\'tids[]\'), this)"></td>' : '' ).'
	</tr>';
	
	if(!empty($topics)){
	
	foreach($topics as $t => $tv){

	echo '<tr>
	
	<td class="ttimg" width="4%" align="center">
	<img src="'.$theme['images'].'topics/'.$topics[$t]['type'].'.png" />
	</td>
	
	<td class="ttimg" align="center" width="4%">
	'.($topics[$t]['type_image'] ? '<img src="'.$theme['images'].'icons/'.$globals['topic_icons'][$topics[$t]['type_image']][0].'" title="'.$globals['topic_icons'][$topics[$t]['type_image']][1].'" />' : '').'
	</td>
	
	<td class="ttsub">
	'.($topics[$t]['is_new'] ? '<img src="'.$theme['images'].'topics/new.png"  title="'.$l['new_posts'].'" />' : '').'
	'.($topics[$t]['has_attach'] ? '<img src="'.$theme['images'].'topics/attachment.png"  title="'.$l['topic_contains'].' '.$topics[$t]['has_attach'].' '.$l['attachments'].'" />' : '').'
	'.(isset($topics[$t]['t_prefix']) ? $topics[$t]['t_prefix'] : '').'
	<a href="'.$globals['index_url'].'tid='.$topics[$t]['tid'].'">'.$topics[$t]['topic'].'</a>
	'.(!empty($topics[$t]['t_description']) ? '<br />'.$topics[$t]['t_description'] : '' ).'
	'.(isset($topics[$t]['pages']) ? '<br /><div style="float:right">( '.$topics[$t]['pages'].' )</div>' : '' ).'
	</td>
	
	<td class="ttstar" align="center">
	'.(empty($topics[$t]['starter']) ? $l['guest'] : '<a href="'.$globals['index_url'].'mid='.$topics[$t]['t_mem_id'].'" title="'.$l['profile_of'].' '.$topics[$t]['starter'].'">'.$topics[$t]['starter'].'</a>' ).'		
	</td>
	
	<td class="ttrep" align="center">'.$topics[$t]['n_posts'].'</td>
	
	<td class="ttviews" align="center">'.$topics[$t]['n_views'].'</td>
	
	<td class="ttlpi">'.$topics[$t]['ptime'].'<br />
	'.$l['by'].' <a href="'.$globals['index_url'].'mid='.$topics[$t]['poster_id'].'" title="'.$l['profile_of'].' '.$topics[$t]['username'].'">'.$topics[$t]['username'].'</a>&nbsp;&nbsp;<a href="'.$globals['index_url'].'tid='.$topics[$t]['tid'].'&tpg='.$topics[$t]['last_page'].'#p'.$topics[$t]['pid'].'" title="'.$l['go_to_last_post'].'"><img src="'.$theme['images'].'right.gif" /></a>
	</td>
	'.($show_mod ? '<td class="ttmod" width="3%"><input type="checkbox" name="tids[]" value="'.$topics[$t]['tid'].'" /></td>' : '' ).'
	</tr>';
	
	}
	
	if($show_mod){
	
	echo '<tr>
	<td colspan="8" class="ttlpi" align="right">
	'.$l['with_selected'].' : <select name="withselected" id="selectedtopics">
	'.($user['can_make_sticky'] ? '<option value="pin">'.$l['pin_topic'].'</option><option value="unpin">'.$l['unpin_topic'].'</option>' : '').'
	'.($user['can_lock_own_topic'] && $user['can_lock_other_topic'] ? '<option value="lock">'.$l['lock_topic'].'</option><option value="unlock">'.$l['unlock_topic'].'</option>' : '').'
	'.($user['can_merge_topics'] ? '<option value="merge">'.$l['merge_topic'].'</option>' : '').'	
	'.($user['can_move_own_topic'] && $user['can_move_other_topic'] ? '<option value="move">'.$l['move_topic'].'</option>' : '').'
	'.($user['can_del_own_topic'] && $user['can_del_other_topic'] ? '<option value="delete">'.$l['delete_topic'].'</option>' : '').'
	</select>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" name="withselsubmit" value="'.$l['submit_seleted'].'">&nbsp;&nbsp;&nbsp;&nbsp;
	</form>
	</td>
	</tr>';
	
	}
	
	echo '<tr>
	<td colspan="'.($show_mod ? '8' : '7' ).'" class="ttlpi" align="center">
	
	<form method="get" action="">
	
	<input type="hidden" name="fid" value="'.$board['fid'].'" />
	
	<input type="hidden" name="bpg" value="'.$pg.'" />
	
	'.$l['sortby'].': <select name="sortby">
	<option value="1">'.$l['sortby_topic_subject'].'</option>
	<option value="2">'.$l['sortby_starter'].'</option>
	<option value="3">'.$l['sortby_replies'].'</option>
	<option value="4">'.$l['sortby_views'].'</option>
	<option value="5">'.$l['sortby_last_post'].'</option>
	</select>
	&nbsp;&nbsp;
	<select name="order">
	<option value="1">'.$l['sort_asc'].'</option>
	<option value="2">'.$l['sort_desc'].'</option>
	</select>
	&nbsp;&nbsp;
	<input type="submit" value="'.$l['sort_submit'].'" />
	
	</form>
	
	</td>
	
	</tr>';
	
	}else{
	
echo '<tr>
	<td colspan="7" align="center">
	<br /><b>'.$l['no_topics'].'</b><br /><br />
	</td>
	</tr>';
	
	}
	
	echo '</table>
	</td>			
	</tr>
	<tr>
	<td><img src="'.$theme['images'].'cbot.png" width="100%" height="15"></td>
	</tr>
	
	</table>
	<br />';
	
	
	/* Options for the user of posting, Polls and notify */
	
	//Is the board locked
	if($board['status'] != 0 || ($board['status'] == 0 && $user['has_priviliges'])){
	
	//If he has the permissions to post
	if($user['can_post_topic'] || $board['can_post_topic']){
		echo '<a href="'.$globals['index_url'].'act=topic&forum='.$board['fid'].'"><img src="'.$theme['images'].'buttons/newtopic.png"></a>&nbsp;&nbsp;&nbsp;';
	}
	
	//If he is allowed to recieve notifications
	if($user['notify_new_topics']){
		echo '<a href="'.$globals['index_url'].'act=notify&nact=forum&nfid='.$board['fid'].'"><img src="'.$theme['images'].'buttons/notify.png"></a>&nbsp;&nbsp;&nbsp;';
	}
	
	}
	
	/* Ending - Options for the user of posting, Polls and notify */
	
	
	if(!empty($forumpages)){
		
		echo $links.'<br />';
		
	}
	
	echo '<br /><br /><br />
	<table border="0" width="100%" cellspacing="1" cellpadding="4" class="cbor">
		
	<tr>
	<td colspan="2" class="cbg1" align="left">'.$l['users_viewing'].'</td>
	</tr>
	
	<tr>
	<td align="center" class="miposts" width="5%">
	<img src="'.$theme['images'].'online.gif" />
	</td>
	<td class="mifor">
	'.$guests.' '.$l['guests'].', '.count($active).' '.$l['users'].''.(($anonymous) ? ', '.$anonymous.' '.$l['viewing_anonymous'].'.': '.' ).'
	'.(!empty($activeusers) ? '<hr />'.implode(', ', $activeusers) : '').'		
	</td>
	</tr>
			
	</table>';
		
		
	echo '<br /><br /><br />
	<table border="0" width="100%" cellspacing="1" cellpadding="4" class="cbor">
		
	<tr>
	<td class="miposts" width="50%">
	
	<table border="0" width="100%" cellspacing="1" cellpadding="2" >
	
	<tr>		
	<td align="left" width="50%">
	<img src="'.$theme['images'].'topics/00.png" />&nbsp;&nbsp;'.$l['normal_topic'].'
	</td>
	<td align="left" width="50%">
	<img src="'.$theme['images'].'topics/closed.png" />&nbsp;&nbsp;'.$l['closed_topic'].'
	</td>
	</tr>
	
	<tr>		
	<td align="left">
	<img src="'.$theme['images'].'topics/10.png" />&nbsp;&nbsp;'.$l['hot_topic'].'
	</td>
	<td align="left">
	<img src="'.$theme['images'].'topics/pinned.png" />&nbsp;&nbsp;'.$l['pinned_topic'].'
	</td>
	</tr>
	
	<tr>		
	<td align="left">
	<img src="'.$theme['images'].'topics/01.png" />&nbsp;&nbsp;'.$l['poll_topic'].'
	</td>
	<td align="left">
	<img src="'.$theme['images'].'topics/moved.png" />&nbsp;&nbsp;'.$l['moved_topic'].'
	</td>
	</tr>
	
	</table>
	
	</td>
	<td class="mifor">
	'.($logged_in ? '<a href="'.$globals['index_url'].'act=markread&mark=forum&mfid='.$board['fid'].'">'.$l['mark_all_read'].'</a>' : '');
	
	if($user['notify_new_topics'] && empty($user['is_forum_subscribed'])){

		echo '<br /><br /><a href="'.$globals['index_url'].'act=notify&nact=forum&nfid='.$board['fid'].'">'.$l['subscribe_forum'].'</a>';
		
	}elseif($user['notify_new_posts'] && !empty($user['is_forum_subscribed'])){
	
		echo '<br /><br /><a href="'.$globals['index_url'].'act=notify&nact=unsubforum&nfid='.$board['fid'].'">'.$l['unsubscribe_forum'].'</a>';
	
	}

	echo navigator().'
	</td>
	</tr>
			
	</table>';	
	
	//The defualt footers
	aeffooter();
	
}

?>
