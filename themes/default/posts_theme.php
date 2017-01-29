<?php

function posts_theme(){

global $user, $logged_in, $globals, $AEF_SESS, $theme, $l;
global $categories, $forums, $active, $anonymous, $guests, $activeusers, $board, $poll, $user_group, $post_group, $tid, $tpg, $fid, $title, $topic, $post, $topicpages, $attachments, $page, $pg, $dmenus, $postcodefield, $users_who_read, $feeds;
	
	if(!empty($board['rss'])){
	
		$feeds[] = '<link rel="alternate" type="application/rss+xml" title="'.$board['fname'].' - '.$l['rss'].'" href="'.$globals['index_url'].'act=feeds&forum='.$board['fid'].'" />';
	
	}
	
	if(!empty($board['rss_topic'])){
	
		$feeds[] = '<link rel="alternate" type="application/rss+xml" title="'.$topic['topic'].' - '.$l['rss'].'" href="'.$globals['index_url'].'act=feeds&topic='.$topic['tid'].'" />';
	
	}
	
	//////////////////////////
	// Count the topic pages
	//////////////////////////
	
	$tpages = ceil(($topic['n_posts'] + 1)/$globals['maxpostsintopics']);
	
	$pg = ($page/$globals['maxpostsintopics']) + 1;//Current Page
	
	$topicpages = array();
	
	if($tpages > 1){
	
		if($pg != 1){
			
			$topicpages['&lt;&lt;'] = 1;
			
			$topicpages['&lt;'] = ($pg - 1);
		
		}
		
		for($i = ($pg - 4); $i < $pg; $i++){
			
			if($i >= 1){
			
				$topicpages[$i] = $i;
			
			}
		
		}
		
		$topicpages[$pg] = $pg;
		
		
		for($i = ($pg + 1); $i <= ($pg + 4); $i++){
		
			if($i <= $tpages){
			
				$topicpages[$i] = $i;
			
			}
		
		}
		
		
		if($pg != $tpages){
			
			$topicpages['&gt;'] = ($pg + 1);
			
			$topicpages['&gt;&gt;'] = $tpages;
		
		}
		
		
		if($tpages > 1){
			
			$topicpages[$l['all']] = 'all';
		
		}
	
	}
	
	//The header
	aefheader($title);	
	
	/////////////////////////////
	//The Poll if any
	/////////////////////////////
	
	if(!empty($poll)){
	
		//Show the Voting Form
		if($poll['what_to_show'] == 1){	
			
			//Can he see the results without voting
			if($poll['show_when'] == 0){
	
				$polloptions[] = '<a href="'.$globals['index_url'].'tid='.$tid.'&tpg='.$pg.'&spollres" >'.$l['show_results'].'</a>';
			
			}
		
		//Show the results
		}elseif($poll['what_to_show'] == 2){
	
		
			foreach($poll['options'] as $opk => $opt){
		
				//If the total Votes are zero
				if($poll['votes'] != 0){
				
					$percentage = ($opt['poo_votes']/$poll['votes'])*100;
					
					$img_width = (400*$percentage)/100;
					
					$img_width = (($img_width > 0) ? $img_width : 11);
				
				}else{
				
					$img_width = 11;
					$percentage = 0;
				
				}
				
				$poll['options'][$opk]['width'] = $img_width;
				$poll['options'][$opk]['percentage'] = substr($percentage, 0, 5);
		
			}
			
			
			//Has he voted yet
			if((!$poll['user_voted']) && 
			  ($user['can_vote_polls'] || $board['can_vote_polls']) && 
			  !$poll['expired'] && !$poll['locked']){
	
				$polloptions[] = '<a href="'.$globals['index_url'].'tid='.$tid.'&tpg='.$pg.'" >'.$l['vote'].'</a>';
			
			}
			
			
			//Can he delete his vote
			if($poll['user_voted'] && $logged_in && $poll['change_vote']){
	
				$polloptions[] = '<a href="'.$globals['index_url'].'tid='.$tid.'&tpg='.$pg.'&deletevote" >'.$l['delete_vote'].'</a>';
			
			}
			
		
		//Show a message
		}elseif($poll['what_to_show'] == 3){
		
			//Left empty for future compatibility
		
		}
	
	
		///////////////////////////////
		// Some Administrative Options
		///////////////////////////////
		
		//Can he EDIT the results
		if(($poll['i_started'] && $user['can_edit_own_poll']) ||
		  (!$poll['i_started'] && $user['can_edit_other_poll'])){
	
			$adpolloptions[] = '<a href="'.$globals['index_url'].'act=editpoll&poid='.$poll['poid'].'">'.$l['edit_poll'].'</a>';
		
		}
		
		//Can he Remove the poll
		if(($poll['i_started'] && $user['can_rem_own_poll']) ||
		  (!$poll['i_started'] && $user['can_rem_other_poll'])){
	
			$adpolloptions[] = '<a href="'.$globals['index_url'].'act=removepoll&poid='.$poll['poid'].'">'.$l['reomve_poll'].'</a>';
		
		}
	
	}//End of empty($poll)

	//Show the results
	if(!empty($poll['what_to_show']) && ($poll['what_to_show'] == 2)){
		
		$showthis = '<table cellpadding="3" cellspacing="3">';
		
		foreach($poll['options'] as $opk => $opt){
			
			$showthis .= '<tr><td align="right">
						<b>'.$opt['poo_option'].'</b>
						('.$opt['poo_votes'].')
						</td>
						<td align="left">
			<img src="'.$theme['images'].'poll.gif" width="'.$poll['options'][$opk]['width'].'" height="10"> ('.$opt['percentage'].'%)
						</td></tr>';
			
		}
		
		$showthis .= '<tr><td colspan="2"><br /><b>'.$l['total_votes'].'</b> : '.$poll['votes'].'</td></tr></table>';
	
	//Show the form for Voting
	}elseif(!empty($poll['what_to_show']) && ($poll['what_to_show'] == 1)){
		
		$showthis = '<form method="post" action="" name="poll_vote">
					<table cellpadding="3" cellspacing="3">';
		
		foreach($poll['options'] as $opk => $opt){
			
			$showthis .= '<tr><td align="right">
						'.$opt['poo_option'].'
						<input type="radio" name="uservote" value="'.$opt['pooid'].'" />
						</td>
						</tr>';
			
		}
		
		$showthis .= '<tr>
					<td>
					<input type="submit" name="vote_poll" value="'.$l['submit_vote'].'" /><br />
					</td>
					</tr>					
					</table>
					</form>';
		
		
		
	}elseif(!empty($poll['what_to_show']) && ($poll['what_to_show'] == 3)){
	
		$showthis = '<table cellpadding="3" cellspacing="3">';
		
		$showthis .= '<tr><td><br />'.$l['will_be_shown_at'].' <b>'.datify($poll['expires_on']).'</b><br /><br />'.$l['total_votes'].' : <b>'.$poll['votes'].'</b></td></tr></table>';
	
	}
	
	
	if(!empty($poll['what_to_show'])){
	
		echo'<br /><table width="100%" class="cbor" cellpadding="1" cellspacing="1">
			<tr>
			<td class="ptcbg" colspan="2">'.$l['poll'].'</td>	
			</tr>
			
			'.(!empty($adpolloptions) ? '<tr>
			<td class="ptcbg1" colspan="2" align="right" style="padding:4px;">'.implode('&nbsp;|&nbsp;', $adpolloptions).'
			</td></tr>' : '').'
									
			<tr>
			<td class="ptwbg" colspan="2"><b>'.$l['the_poll_question'].' : </b>'.$poll['qt'].'</td>	
			</tr>
			
			<tr>
			<td class="ptwbg" align="center">'.$showthis.'</td>
			'.(!empty($polloptions) ? '<td class="ptwbg" align="center" width="25%" valign="top">'.implode('<br />', $polloptions).'</td>' : '').'	
			</tr>
			
			</table>
			<br /><br />';
	
	}
	
	
	if(!empty($topicpages)){

$links = '<table align="right" class="cbgbor" cellspacing="1">
<tr>';
$links .= '<td class="pagelinks"><a href="#" onmouseover="dropmenu(this, \'pagejump\')" onmouseout="pullmenu(\'pagejump\')" title="'.$l['jump_to_txt'].'" >'.$l['page'].' '.$pg.' '.$l['of'].' '.$tpages.'</a></td>';
$dmenus[] = '<table id="pagejump" onmouseover="clearTimeout(hider)" onmouseout="pullmenu(\'pagejump\')" class="ddopt" cellpadding="5" cellspacing="1">
<tr>
<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor">
<form name="pagejump" method="get" action="'.$globals['index_url'].'">
<input type="hidden" name="tid" value="'.$tid.'" />
<input type="text" name="tpg" size="10" />
<input type="submit" value="'.$l['submit_go'].'" />
</form>
</td>
</tr>
</table>';
foreach($topicpages as $k => $lv){

	$links .= '<td class="'.($k == $pg ? 'activepage' : 'pagelinks' ).'"><a href="'.$globals['index_url'].'tid='.$tid.'&tpg='.$lv.'" >'.$k.'</a></td>';

}
$links .= '</tr>
</table>';
	
	echo $links;
	
	}
	
	//Can he post reply 
	if(!empty($user['can_reply_to_this_topic'])){
	
		echo '<br /><a href="'.$globals['index_url'].'act=post&topid='.$topic['tid'].'"><img src="'.$theme['images'].'buttons/reply.png"></a>';
	
	}
	
	if(!empty($user['can_poll_this_topic'])){
	
		echo '&nbsp;&nbsp;<a href="'.$globals['index_url'].'act=postpoll"><img src="'.$theme['images'].'buttons/addpoll.png"></a>';
	
	}
		
	echo '<br /><br /><table width="100%" cellpadding="4" cellspacing="0" class="cbgbor">
	<tr>'.(empty($board['rss_topic']) ? '' : '<td class="ptcbgrss"><a href="'.$globals['index_url'].'act=feeds&topic='.$topic['tid'].'"><img src="'.$theme['images'].'feeds.gif" /></a></td>').'<td class="ptcbg1" align="right">';
	
	if(!(empty($user['can_lock_this_topic']) && !$user['can_make_sticky']
	&& empty($user['can_edit_this_topic']) && empty($user['can_del_this_topic'])
	&& empty($user['can_move_this_topic'])) ){
	
	//Moderation option
	$top_opt[] = '<a href="#" onmouseover="dropmenu(this, \'modopt\')" onmouseout="pullmenu(\'modopt\')">'.$l['options'].'</a>';
	
	$dmenus[] = '<table id="modopt" onmouseover="clearTimeout(hider)" onmouseout="pullmenu(\'modopt\')" class="ddopt" cellpadding="5" cellspacing="1">
	'.(empty($user['can_lock_this_topic']) ? '' : '<tr>
	<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor">'.($topic['t_status'] == 1 ? '<a href="'.$globals['index_url'].'act=locktopic&do=0&topid='.$topic['tid'].'">'.$l['lock_topic'].'</a>' : '<a href="'.$globals['index_url'].'act=locktopic&do=1&topid='.$topic['tid'].'">'.$l['unlock_topic'].'</a>').'</td>
	</tr>').'
	'.($user['can_make_sticky'] ? '<tr>
	<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor">'.($topic['t_sticky'] == 1 ? '<a href="'.$globals['index_url'].'act=pintopic&do=0&topid='.$topic['tid'].'">'.$l['unpin_topic'].'</a>' : '<a href="'.$globals['index_url'].'act=pintopic&do=1&topid='.$topic['tid'].'">'.$l['pin_topic'].'</a>').'</td>
	</tr>' : '').'
	'.(empty($user['can_edit_this_topic']) ? '' : '<tr>
	<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor"><a href="'.$globals['index_url'].'act=edittopic&topid='.$topic['tid'].'">'.$l['edit_topic'].'</a></td>
	</tr>' ).'
	'.(empty($user['can_del_this_topic']) ? '' : '<tr>
	<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor"><a href="'.$globals['index_url'].'act=deletetopic&topid='.$topic['tid'].'">'.$l['delete_topic'].'</a></td>
	</tr>' ).'
	'.(empty($user['can_move_this_topic']) ? '' : '<tr>
	<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor"><a href="'.$globals['index_url'].'act=movetopic&topid='.$topic['tid'].'">'.$l['move_topic'].'</a></td>
	</tr>' ).'
		
	</table>';	
	
	}
	
	//Mark as unread
	if($logged_in){
	
		$top_opt[] = '<a href="'.$globals['index_url'].'act=markread&mark=unreadtopic&utid='.$topic['tid'].'">'.$l['mark_as_unread'].'</a>';
	
	}
	
	//Can he post reply - quick
	if(!empty($user['can_reply_to_this_topic']) && !empty($board['quick_reply'])){
	
		$top_opt[] = '<a href="javascript:showquickreply(\'quickreply\')">'.$l['quick_reply'].'</a>';
		
		$usesmileys = ($logged_in ? ( $user['showsmileys'] == 1 ? true : ($user['showsmileys'] == 2 ? false : $globals['usesmileys']) ) : $globals['usesmileys']);
		
		$dmenus[] = '<div id="quickreply" class="pqr">
<form method="post" action="'.$globals['index_url'].'act=post&topid='.$topic['tid'].'" name="">
<table width="100%" cellspacing="0" cellpadding="0" id="qrhandle">
<tr>
<td class="dwhl"></td>
<td align="left" class="dwhc"><b>'.$l['quick_reply'].'</b></td>
<td align="right" class="dwhc"><a href="javascript:hideel(\'quickreply\')"><img src="'.$theme['images'].'close.gif"></a></td>
<td class="dwhr"></td>
</tr>
</table>

<table width="100%" cellspacing="1" cellpadding="2" class="dwbody">
<tr>
<td class="rlc" width="15%"><b>'.$l['qr_post'].'</b></td>
<td align="left" class="rrc">
<textarea name="post" rows="6" cols="55" id="topicpost" /></textarea>
'.$postcodefield.'
</td>
</tr>

<tr>
<td class="rlc"><b>'.$l['qr_options'].'</b></td>
<td align="left" class="rrc"><input type="checkbox" name="usesmileys" '.(empty($usesmileys) ? '' : 'checked="checked"').' />&nbsp;'.$l['qr_enable_smileys'].'
</td>
</tr>

<tr>
<td class="rlc" colspan="2" style="text-align:center">
<input type="submit" name="submitpost" value="'.$l['qr_submit'].'"/>
</td>
</tr>

<tr>
<td align="left" class="dwb" colspan="2"></td>
</tr>

</table>
</form>
</div>

<script type="text/javascript">
Drag.init($("qrhandle"), $("quickreply"));
function showquickreply(){
	qrid = \'quickreply\';
	$(qrid).style.left=((getwidth()/2)-($(qrid).offsetWidth/2))+"px";
	$(qrid).style.top=(scrolledy()+110)+"px";
	showel(qrid);
	smoothopaque(qrid, 0, 100, 10);
}
</script>';
	
	}
	
	if($user['notify_new_posts'] && empty($user['is_topic_subscribed'])){
	
		$top_opt[] = '<a href="'.$globals['index_url'].'act=notify&nact=topic&ntid='.$topic['tid'].'">'.$l['subscribe_topic'].'</a>';
		
	}elseif($user['notify_new_posts'] && !empty($user['is_topic_subscribed'])){
	
		$top_opt[] = '<a href="'.$globals['index_url'].'act=notify&nact=unsubtopic&ntid='.$topic['tid'].'">'.$l['unsubscribe_topic'].'</a>';
	
	}
	
	$top_opt[] = '<a href="'.$globals['index_url'].'tid='.$tid.'&threaded=true">'.$l['threaded_mode'].'</a>';
	
	if($globals['allow_taf'] && $user['can_email_topic']){
	
		$top_opt[] = '<a href="'.$globals['index_url'].'act=tellafriend&topid='.$topic['tid'].'">'.$l['tell_a_friend'].'</a>';
		
	}
	
	$top_opt[] = '<a href="'.$globals['index_url'].'tid='.$topic['tid'].'&tpg='.(!is_numeric($page) ? 'all' : $pg).'&printtopic" target="_blank" title="'.$l['print_title'].'">'.$l['print'].'</a>&nbsp;&nbsp;';	
	
	
	
	echo implode(' | ', $top_opt);
	
	echo '</td></tr>
	</table>';
		
	$show_mod = (($user['can_del_own_post'] && $user['can_del_own_post']) || $user['can_merge_posts'] ? 1 : 0);
	
	if($show_mod){
	
	echo '<script type="text/javascript">
	function deleteconfirm(){
		if($("selectedposts").value == "delete"){
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
	<form method="post" action="" name="postmod" onsubmit="return deleteconfirm();">';
	
	}
	
	foreach($post as $p => $pv){	
	
	//The first row that is Headers
	echo '<br /><table width="100%" cellpadding="0" cellspacing="0">
	<tr>
	<td>
	<table width="100%" cellpadding="0" cellspacing="0"><tr>
	<td class="pcbgl"></td>
	<td class="pcbg"><b>'.($post[$p]['post_count'] == 0 ? '&nbsp;'.$title.(empty($topic['description']) ? '' : ',&nbsp;'.$topic['description']).'&nbsp;('.$topic['n_posts'].' '.$l['replies'].', '.$l['read'].' '.$topic['n_views'].' '.$l['times'].')' : $post[$p]['post_title']).'</b></td>
	<td class="pcbgr"></td>		
	</tr>
	</table>
	</td>
	</tr>
	
	<tr>
	<td class="cbgbor">
	<table width="100%" cellpadding="1" cellspacing="0">
	<tr>
	<td class="posterbg" width="22%">
	
	<a href="'.(isset($post[$p]['is_guest']) ? 'mailto:'.$post[$p]['email']: $globals['index_url'].'mid='.$post[$p]['id']).'">
	'.$post[$p]['username'].'
	</a>
	</td>
	
	<td class="postdate" align="right">
	<div style="float:left">
	<a name="p'.$post[$p]['pid'].'"></a>
	<img src="'.$theme['images'].'postedon.png" title="'.$l['posted_on'].'"> <a href="'.$globals['index_url'].'tid='.$tid.'&tpg='.$pg.'#p'.$p.'">#</a>
	'.$post[$p]['pdate'];
	
	echo (($post[$p]['post_count']) ? ' | '.$l['post_num_prefix'].': '.$post[$p]['post_count'] : '');
	
	echo '</div>';
	
	$post_opt=array();
	
	//Can he post reply
	if(isset($post[$p]['can_reply'])){
	
		$post_opt[] = '<a href="'.$globals['index_url'].'act=post&topid='.$topic['tid'].'&pid='.$post[$p]['pid'].'">'.$l['quote'].'</a>';
	
	}
	
	//Can he edit the post
	if(isset($post[$p]['can_edit'])){
	
		$post_opt[] = '<a href="'.$globals['index_url'].'act=edit&pid='.$post[$p]['pid'].'">'.$l['edit'].'</a>';
	
	}
	
	//Can he delete the post
	if(isset($post[$p]['can_del']) && $post[$p]['post_count'] != 0){
	
		$post_opt[] = '<a href="'.$globals['index_url'].'act=delete&pid='.$post[$p]['pid'].'" onclick="return confirm(\''.$l['del_this_conf'].'\');">'.$l['delete'].'</a>';
	
	}
	
	//Can he report this post
	if(!empty($globals['report_posts']) && !empty($user['can_report_post'])){
	
		$post_opt[] = '<a href="'.$globals['index_url'].'act=report&pid='.$post[$p]['pid'].'">'.$l['report'].'</a>';
	
	}
	
	//Does he have an admin
	if($show_mod){
	
		$post_opt[] = '<input type="checkbox" name="pids[]" value="'.$post[$p]['pid'].'" />';
	
	}
		
	echo implode(' | ', $post_opt).'</td>
	</tr>';
	
	echo '<tr>
	<td class="posterinfo" valign="top">';
	
	if(!empty($post[$p]['avatarurl'])){
	
		echo '<div style="text-align:center;"><img src="'.$post[$p]['avatarurl'][0].'" width="'.$post[$p]['avatarurl'][1].'" height="'.$post[$p]['avatarurl'][2].'" /></div>';
		
	}
	
	echo '<div class="pisub">'.$l['prefix_group'].' <span '.(empty($post[$p]['mem_gr_colour']) ? '' : 'style="color:'.$post[$p]['mem_gr_colour'].';"').'>'.$post[$p]['mem_gr_name'].'</span><br />';
	
	//If the user group has some images as per Group
	if($post[$p]['image_count']){
	
		for($i = 0; $i < $post[$p]['image_count']; $i++){
			echo '<img src="'.$theme['images'].$post[$p]['image_name'].'">';
		}
		
		echo '</div>';
		
	}
	
	echo '
	'.(!empty($post[$p]['post_gr_name']) ? '<div class="pisub">'.$l['prefix_post_group'].' '.$post[$p]['post_gr_name'].'</div>':'').'
	'.(!empty($post[$p]['posts']) ? '<div class="pisub">'.$l['prefix_posts'].' '.$post[$p]['posts'].'</div>':'').'	
	<div class="pisub">'.$l['prefix_status'].' '.($post[$p]['status'] ? '<img src="'.$theme['images'].'online.png" title="'.$l['online'].'" />' : '<img src="'.$theme['images'].'offline.png" title="'.$l['offline'].'" />').'</div>
	'.( (empty($post[$p]['users_text'])) ? '' : '<br />'.$post[$p]['users_text'] ).'
	</td>
	<td class="post" align="left" valign="top">
	'.$post[$p]['post'].'
	'.(!empty($attachments[$post[$p]['pid']]) ? '<br /><br />-----------------------<br />'.implode('<br />', $attachments[$post[$p]['pid']]) : '').'
	'.(!empty($post[$p]['modifier']) ? '<br /><br />'.$l['edited_by'].' <b>'.$post[$p]['modifier'].'</b> : '.$post[$p]['modtime'] : '');
	
	if(!empty($post[$p]['sig'])){
	
		echo '<br /><br />-----------------------<br />'.$post[$p]['sig'];
	
	}
	
	echo '</td>
	</tr>';
	
	echo '<tr>
	<td class="ptip">
	<b>'.$l['ip'].':</b> '.((isset($post[$p]['poster_ip']))? $post[$p]['poster_ip'] : '--' ).'
	</td>
	<td class="specialrow">
	&nbsp;<a href="'.(isset($post[$p]['is_guest']) ? 'mailto:'.$post[$p]['email']: $globals['index_url'].'mid='.$post[$p]['id']).'"><img src="'.$theme['images'].'profile.gif" title="'.$l['view_profile_of'].' '.$post[$p]['username'].'" /></a>&nbsp;
	
	'.(!empty($post[$p]['email']) ? '<a href="mailto:'.$post[$p]['email'].'"><img src="'.$theme['images'].'email.gif" title="'.$l['send_email_to'].' '.$post[$p]['username'].'" /></a>&nbsp;' : '').'
	
	'.($logged_in ? '<a href="'.$globals['index_url'].'act=usercp&ucpact=writepm&to='.$post[$p]['id'].'"><img src="'.$theme['images'].'pmuser.gif" title="'.$l['send_pm_to'].' '.$post[$p]['username'].'" /></a>&nbsp;' : '').'
	
	'.(!empty($post[$p]['www']) ? '<a href="'.$post[$p]['www'].'" target="_blank"><img src="'.$theme['images'].'www.gif" title="'.$l['visit_website_of'].' '.$post[$p]['username'].'" /></a>&nbsp;' : '').'
	
	'.(!empty($post[$p]['msn']) ? '<a href="http://members.msn.com/'.$post[$p]['msn'].'" target="_blank"><img src="'.$theme['images'].'msn.gif" title="'.$l['view_msn_profile'].' '.$post[$p]['username'].'" /></a>&nbsp;' : '').'
	
	'.(!empty($post[$p]['aim']) ? '<a href="aim:goim?screenname='.$post[$p]['aim'].'&message='.$l['aim_hello'].'" target="_blank"><img src="'.$theme['images'].'aim.gif" title="'.$l['aim_username_is'].' '.$post[$p]['username'].' '.$l['is'].' '.$post[$p]['aim'].'" /></a>&nbsp;' : '').'
	
	'.(!empty($post[$p]['yim']) ? '<a href="http://edit.yahoo.com/config/send_webmesg?.target='.$post[$p]['yim'].'&.src=pg" target="_blank"><img src="'.$theme['images'].'yim.gif" title="'.$l['yim_identity_is'].' '.$post[$p]['username'].' '.$l['is'].' '.$post[$p]['yim'].'" /></a>&nbsp;' : '').'
	
	</td>
	</tr>
	
	</table>

	</td>
	</tr>
	
	<tr>
	<td><img src="'.$theme['images'].'cbot.png" width="100%" height="10"></td>
	</tr>
	</table>';
	
	}
	
	if($show_mod){
	
	echo '<br /><div style="text-align:right;">'.$l['with_selected'].' : <select name="withselected" id="selectedposts">
	'.(($user['can_del_own_post'] && $user['can_del_own_post']) ? '<option value="delete">'.$l['delete_posts'].'</option>' : '').'
	'.($user['can_merge_posts'] ? '<option value="merge">'.$l['merge_posts'].'</option>' : '').'
	</select>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" name="withselsubmit" value="'.$l['submit_go'].'">&nbsp;&nbsp;&nbsp;&nbsp;
	</form>
	</div>';
	
	}
	
	echo '<br /><br /><table width="100%" cellpadding="4" cellspacing="0" class="cbgbor">
	<tr><td class="ptcbg1" align="right">';
	echo implode(' | ', $top_opt);
	
	echo '</td></tr>
	</table><br />';
	
	if(!empty($topicpages)){
		
		echo $links;
		
	}
	
	//Can he post reply
	if(!empty($user['can_reply_to_this_topic'])){
	
		echo '<br /><a href="'.$globals['index_url'].'act=post&topid='.$topic['tid'].'"><img src="'.$theme['images'].'buttons/reply.png"></a>';
	
	}
	
	if(!empty($user['can_poll_this_topic'])){
	
		echo '&nbsp;&nbsp;<a href="'.$globals['index_url'].'act=postpoll"><img src="'.$theme['images'].'buttons/addpoll.png"></a>';
	
	}
	
	echo '<div align="right">'.navigator().'</div>';	
	
	if(!empty($users_who_read)){
	
		echo '<br /><br />
		<table border="0" width="100%" cellspacing="1" cellpadding="4" class="cbor">
			
			<tr>
			<td colspan="2" class="cbg1" align="left">'.$l['users_who_read'].'</td>
			</tr>
			
			<tr>
			<td align="center" class="miposts" width="5%">
			<img src="'.$theme['images'].'online.gif" />
			</td>
			<td class="mifor">';
			
			foreach($users_who_read as $u => $uv){
			
				$users_who_read[$u] = '<a href="'.$globals['index_url'].'mid='.$u.'" style="color: '.$uv['mem_gr_colour'].';" >'.$uv['username'].'</a>';
			
			}
			
			echo implode(', ',$users_who_read).'</td>
			</tr>
					
		</table>';
	
	}
	
	echo '<br /><br />
	<table border="0" width="100%" cellspacing="1" cellpadding="4" class="cbor">
		
		<tr>
		<td colspan="2" class="cbg1" align="left">'.$l['users_viewing'].'</td>
		</tr>
		
		<tr>
		<td align="center" class="miposts" width="5%">
		<img src="'.$theme['images'].'online.gif" />
		</td>
		<td class="mifor">
		'.$guests.' '.$l['guests'].', '.count($active).' '.$l['users'].''.(($anonymous) ? ', '.$anonymous.' '.$l['viewing_anonymous'] : '.' ).'
		'.(!empty($activeusers) ? '<hr />'.implode(', ', $activeusers) : '').'		
		</td>
		</tr>
				
	</table>';
	
	//The defualt footers
	aeffooter();
	
}



function thread_theme(){

global $user, $logged_in, $globals, $AEF_SESS, $theme, $l;
global $categories, $forums, $active, $anonymous, $guests, $activeusers, $board, $poll, $user_group, $post_group, $tid, $tpg, $fid, $title, $topic, $post, $topicpages, $attachments, $page, $dmenus, $postcodefield, $pid, $fpid, $users_who_read, $feeds;
	
	if(!empty($board['rss'])){
	
		$feeds[] = '<link rel="alternate" type="application/rss+xml" title="'.$board['fname'].' - '.$l['rss'].'" href="'.$globals['index_url'].'act=feeds&forum='.$board['fid'].'" />';
	
	}
	
	if(!empty($board['rss_topic'])){
	
		$feeds[] = '<link rel="alternate" type="application/rss+xml" title="'.$topic['topic'].' - '.$l['rss'].'" href="'.$globals['index_url'].'act=feeds&topic='.$topic['tid'].'" />';
	
	}
	
	//The header
	aefheader($title);
	
	/////////////////////////////
	//The Poll if any
	/////////////////////////////
	
	if(!empty($poll)){
	
		//Show the Voting Form
		if($poll['what_to_show'] == 1){	
			
			//Can he see the results without voting
			if($poll['show_when'] == 0){
	
				$polloptions[] = '<a href="'.$globals['index_url'].'tid='.$tid.'&spollres" >'.$l['show_results'].'</a>';
			
			}
		
		//Show the results
		}elseif($poll['what_to_show'] == 2){
	
		
			foreach($poll['options'] as $opk => $opt){
		
				//If the total Votes are zero
				if($poll['votes'] != 0){
				
					$percentage = ($opt['poo_votes']/$poll['votes'])*100;
					
					$img_width = (400*$percentage)/100;
					
					$img_width = (($img_width > 0) ? $img_width : 11);
				
				}else{
				
					$img_width = 11;
					$percentage = 0;
				
				}
				
				$poll['options'][$opk]['width'] = $img_width;
				$poll['options'][$opk]['percentage'] = substr($percentage, 0, 5);
		
			}
			
			
			//Has he voted yet
			if((!$poll['user_voted']) && 
			  ($user['can_vote_polls'] || $board['can_vote_polls']) && 
			  !$poll['expired'] && !$poll['locked']){
	
				$polloptions[] = '<a href="'.$globals['index_url'].'tid='.$tid.'" >'.$l['vote'].'</a>';
			
			}
			
			
			//Can he delete his vote
			if($poll['user_voted'] && $logged_in && $poll['change_vote']){
	
				$polloptions[] = '<a href="'.$globals['index_url'].'tid='.$tid.'&deletevote" >'.$l['delete_vote'].'</a>';
			
			}
			
		
		//Show a message
		}elseif($poll['what_to_show'] == 3){
		
			//Left empty for future compatibility
		
		}
	
	
		///////////////////////////////
		// Some Administrative Options
		///////////////////////////////
		
		//Can he EDIT the results
		if(($poll['i_started'] && $user['can_edit_own_poll']) ||
		  (!$poll['i_started'] && $user['can_edit_other_poll'])){
	
			$adpolloptions[] = '<a href="'.$globals['index_url'].'act=editpoll&poid='.$poll['poid'].'">'.$l['edit_poll'].'</a>';
		
		}
		
		//Can he Remove the poll
		if(($poll['i_started'] && $user['can_rem_own_poll']) ||
		  (!$poll['i_started'] && $user['can_rem_other_poll'])){
	
			$adpolloptions[] = '<a href="'.$globals['index_url'].'act=removepoll&poid='.$poll['poid'].'">'.$l['reomve_poll'].'</a>';
		
		}
	
	}//End of empty($poll)
	
	//Show the results
	if(!empty($poll['what_to_show']) && ($poll['what_to_show'] == 2)){
		
		$showthis = '<table cellpadding="3" cellspacing="3">';
		
		foreach($poll['options'] as $opk => $opt){
			
			$showthis .= '<tr><td align="right">
						<b>'.$opt['poo_option'].'</b>
						('.$opt['poo_votes'].')
						</td>
						<td align="left">
			<img src="'.$theme['images'].'poll.gif" width="'.$poll['options'][$opk]['width'].'" height="10"> ('.$opt['percentage'].'%)
						</td></tr>';
			
		}
		
		$showthis .= '<tr><td colspan="2"><br /><b>'.$l['total_votes'].'</b> : '.$poll['votes'].'</td></tr></table>';
	
	//Show the form for Voting
	}elseif(!empty($poll['what_to_show']) && ($poll['what_to_show'] == 1)){
		
		$showthis = '<form method="post" action="" name="poll_vote">
					<table cellpadding="3" cellspacing="3">';
		
		foreach($poll['options'] as $opk => $opt){
			
			$showthis .= '<tr><td align="right">
						'.$opt['poo_option'].'
						<input type="radio" name="uservote" value="'.$opt['pooid'].'" />
						</td>
						</tr>';
			
		}
		
		$showthis .= '<tr>
					<td>
					<input type="submit" name="vote_poll" value="'.$l['submit_vote'].'" /><br />
					</td>
					</tr>					
					</table>
					</form>';
		
		
		
	}elseif(!empty($poll['what_to_show']) && ($poll['what_to_show'] == 3)){
	
		$showthis = '<table cellpadding="3" cellspacing="3">';
		
		$showthis .= '<tr><td><br />'.$l['will_be_shown_at'].' <b>'.datify($poll['expires_on']).'</b><br /><br />'.$l['total_votes'].' : <b>'.$poll['votes'].'</b></td></tr></table>';
	
	}
	
	
	if(!empty($poll['what_to_show'])){
	
		echo'<br /><table width="100%" class="cbor" cellpadding="1" cellspacing="1">
			<tr>
			<td class="ptcbg" colspan="2">'.$l['poll'].'</td>	
			</tr>
			
			'.(!empty($adpolloptions) ? '<tr>
			<td class="ptcbg1" colspan="2" align="right" style="padding:4px;">'.implode('&nbsp;|&nbsp;', $adpolloptions).'
			</td></tr>' : '').'
									
			<tr>
			<td class="ptwbg" colspan="2"><b>'.$l['the_poll_question'].' : </b>'.$poll['qt'].'</td>	
			</tr>
			
			<tr>
			<td class="ptwbg" align="center">'.$showthis.'</td>
			'.(!empty($polloptions) ? '<td class="ptwbg" align="center" width="25%" valign="top">'.implode('<br />', $polloptions).'</td>' : '').'	
			</tr>
			
			</table>
			<br /><br />';
	
	}
	
	
	//Can he post reply 
	if(!empty($user['can_reply_to_this_topic'])){
	
		echo '<br /><a href="'.$globals['index_url'].'act=post&topid='.$topic['tid'].'&par_id='.$pid.'"><img src="'.$theme['images'].'buttons/reply.png"></a>';
	
	}
	
	if(!empty($user['can_poll_this_topic'])){
	
		echo '&nbsp;&nbsp;<a href="'.$globals['index_url'].'act=postpoll"><img src="'.$theme['images'].'buttons/addpoll.png"></a>';
	
	}
		
	echo '<br /><br /><table width="100%" cellpadding="4" cellspacing="0" class="cbgbor">
	<tr>'.(empty($board['rss_topic']) ? '' : '<td class="ptcbgrss"><a href="'.$globals['index_url'].'act=feeds&topic='.$topic['tid'].'"><img src="'.$theme['images'].'feeds.gif" /></a></td>').'<td class="ptcbg1" align="right">';
	
	if(!(empty($user['can_lock_this_topic']) && !$user['can_make_sticky']
	&& empty($user['can_edit_this_topic']) && empty($user['can_del_this_topic'])
	&& empty($user['can_move_this_topic'])) ){
	
	//Moderation option
	$top_opt[] = '<a href="#" onmouseover="dropmenu(this, \'modopt\')" onmouseout="pullmenu(\'modopt\')">'.$l['options'].'</a>';
	
	$dmenus[] = '<table id="modopt" onmouseover="clearTimeout(hider)" onmouseout="pullmenu(\'modopt\')" class="ddopt" cellpadding="5" cellspacing="1">
	'.(empty($user['can_lock_this_topic']) ? '' : '<tr>
	<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor">'.($topic['t_status'] == 1 ? '<a href="'.$globals['index_url'].'act=locktopic&do=0&topid='.$topic['tid'].'">'.$l['lock_topic'].'</a>' : '<a href="'.$globals['index_url'].'act=locktopic&do=1&topid='.$topic['tid'].'">'.$l['unlock_topic'].'</a>').'</td>
	</tr>').'
	'.($user['can_make_sticky'] ? '<tr>
	<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor">'.($topic['t_sticky'] == 1 ? '<a href="'.$globals['index_url'].'act=pintopic&do=0&topid='.$topic['tid'].'">'.$l['unpin_topic'].'</a>' : '<a href="'.$globals['index_url'].'act=pintopic&do=1&topid='.$topic['tid'].'">'.$l['pin_topic'].'</a>').'</td>
	</tr>' : '').'
	'.(empty($user['can_edit_this_topic']) ? '' : '<tr>
	<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor"><a href="'.$globals['index_url'].'act=edittopic&topid='.$topic['tid'].'">'.$l['edit_topic'].'</a></td>
	</tr>' ).'
	'.(empty($user['can_del_this_topic']) ? '' : '<tr>
	<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor"><a href="'.$globals['index_url'].'act=deletetopic&topid='.$topic['tid'].'">'.$l['delete_topic'].'</a></td>
	</tr>' ).'
	'.(empty($user['can_move_this_topic']) ? '' : '<tr>
	<td onmouseover="this.className=\'ddmon\'" onmouseout="this.className=\'ddmnor\'" class="ddmnor"><a href="'.$globals['index_url'].'act=movetopic&topid='.$topic['tid'].'">'.$l['move_topic'].'</a></td>
	</tr>' ).'
		
	</table>';	
	
	}
	
	//Mark as unread
	if($logged_in){
	
		$top_opt[] = '<a href="'.$globals['index_url'].'act=markread&mark=unreadtopic&utid='.$topic['tid'].'">'.$l['mark_as_unread'].'</a>';
	
	}
	
	//Can he post reply - quick
	if(!empty($user['can_reply_to_this_topic']) && !empty($board['quick_reply'])){
	
		$top_opt[] = '<a href="javascript:showquickreply(\'quickreply\')">'.$l['quick_reply'].'</a>';
		
		$usesmileys = ($logged_in ? ( $user['showsmileys'] == 1 ? true : ($user['showsmileys'] == 2 ? false : $globals['usesmileys']) ) : $globals['usesmileys']);
		
		$dmenus[] = '<div id="quickreply" class="pqr">
<form method="post" action="'.$globals['index_url'].'act=post&topid='.$topic['tid'].'&par_id='.$pid.'" name="">
<table width="100%" cellspacing="0" cellpadding="0" id="qrhandle">
<tr>
<td class="dwhl"></td>
<td align="left" class="dwhc"><b>'.$l['quick_reply'].'</b></td>
<td align="right" class="dwhc"><a href="javascript:hideel(\'quickreply\')"><img src="'.$theme['images'].'close.gif"></a></td>
<td class="dwhr"></td>
</tr>
</table>

<table width="100%" cellspacing="1" cellpadding="2" class="dwbody">
<tr>
<td class="rlc" width="15%"><b>'.$l['qr_post'].'</b></td>
<td align="left" class="rrc">
<textarea name="post" rows="6" cols="55" id="topicpost" /></textarea>
'.$postcodefield.'
</td>
</tr>

<tr>
<td class="rlc"><b>'.$l['qr_options'].'</b></td>
<td align="left" class="rrc"><input type="checkbox" name="usesmileys" '.(empty($usesmileys) ? '' : 'checked="checked"').' />&nbsp;'.$l['qr_enable_smileys'].'
</td>
</tr>

<tr>
<td class="rlc" colspan="2" style="text-align:center">
<input type="submit" name="submitpost" value="'.$l['qr_submit'].'"/>
</td>
</tr>

<tr>
<td align="left" class="dwb" colspan="2"></td>
</tr>

</table>
</form>
</div>

<script type="text/javascript">
Drag.init($("qrhandle"), $("quickreply"));
function showquickreply(){
	qrid = \'quickreply\';
	$(qrid).style.left=((getwidth()/2)-($(qrid).offsetWidth/2))+"px";
	$(qrid).style.top=(scrolledy()+110)+"px";
	showel(qrid);
	smoothopaque(qrid, 0, 100, 10);
}
</script>';
	
	}
	
	if($user['notify_new_posts'] && empty($user['is_topic_subscribed'])){
	
		$top_opt[] = '<a href="'.$globals['index_url'].'act=notify&nact=topic&ntid='.$topic['tid'].'">'.$l['subscribe_topic'].'</a>';
		
	}elseif($user['notify_new_posts'] && !empty($user['is_topic_subscribed'])){
	
		$top_opt[] = '<a href="'.$globals['index_url'].'act=notify&nact=unsubtopic&ntid='.$topic['tid'].'">'.$l['unsubscribe_topic'].'</a>';
	
	}
	
	$top_opt[] = '<a href="'.$globals['index_url'].'tid='.$tid.'&nor=true">'.$l['normal_mode'].'</a>';
	
	if($globals['allow_taf'] && $user['can_email_topic']){
	
		$top_opt[] = '<a href="'.$globals['index_url'].'act=tellafriend&topid='.$topic['tid'].'">'.$l['tell_a_friend'].'</a>';
		
	}
	
	$top_opt[] = '<a href="'.$globals['index_url'].'tid='.$topic['tid'].'&printtopic" target="_blank" title="'.$l['print_title'].'">'.$l['print'].'</a>&nbsp;&nbsp;';
	
	echo implode(' | ', $top_opt);
	
	echo '</td></tr>
	</table>';
		
	$p = $pid;//Just getting bored to write $pid
	
	//The first row that is Headers
	echo '<br /><table width="100%" cellpadding="0" cellspacing="0">
	<tr>
	<td>
	<table width="100%" cellpadding="0" cellspacing="0"><tr>
	<td class="pcbgl"></td>
	<td class="pcbg"><b>'.($post[$p]['post_count'] == 0 || empty($post[$p]['post_title']) ? '&nbsp;'.$title.(empty($topic['description']) ? '' : ',&nbsp;'.$topic['description']).'&nbsp;('.$topic['n_posts'].' '.$l['replies'].', '.$l['read'].' '.$topic['n_views'].' '.$l['times'].')' : $post[$p]['post_title']).'</b></td>
	<td class="pcbgr"></td>		
	</tr>
	</table>
	</td>
	</tr>
	
	<tr>
	<td class="cbgbor">
	<table width="100%" cellpadding="1" cellspacing="0">
	<tr>
	<td class="posterbg" width="22%">
	
	<a href="'.(isset($post[$p]['is_guest']) ? 'mailto:'.$post[$p]['email']: $globals['index_url'].'mid='.$post[$p]['id']).'">
	'.$post[$p]['username'].'
	</a>
	</td>
	
	<td class="postdate" align="right">
	<div style="float:left">
	<a name="p'.$post[$p]['pid'].'"></a>
	<img src="'.$theme['images'].'postedon.png" title="'.$l['posted_on'].'">
	'.$post[$p]['pdate'];
	
	echo (($post[$p]['post_count']) ? ' | '.$l['post_num_prefix'].': '.$post[$p]['post_count'] : '');
	
	echo '</div>';
	
	$post_opt=array();
	
	//Can he post reply
	if(isset($post[$p]['can_reply'])){
	
		$post_opt[] = '<a href="'.$globals['index_url'].'act=post&topid='.$topic['tid'].'&pid='.$post[$p]['pid'].'">'.$l['quote'].'</a>';
	
	}
	
	//Can he edit the post
	if(isset($post[$p]['can_edit'])){
	
		$post_opt[] = '<a href="'.$globals['index_url'].'act=edit&pid='.$post[$p]['pid'].'">'.$l['edit'].'</a>';
	
	}
	
	//Can he delete the post
	if(isset($post[$p]['can_del']) && $post[$p]['post_count'] != 0){
	
		$post_opt[] = '<a href="'.$globals['index_url'].'act=delete&pid='.$post[$p]['pid'].'" onclick="return confirm(\''.$l['del_this_conf'].'\');">'.$l['delete'].'</a>';
	
	}
	
	//Can he report this post
	if(!empty($globals['report_posts']) && !empty($user['can_report_post'])){
	
		$post_opt[] = '<a href="'.$globals['index_url'].'act=report&pid='.$post[$p]['pid'].'">'.$l['report'].'</a>';
	
	}
		
	echo implode(' | ', $post_opt).'</td>
	</tr>';
	
	echo '<tr>
	<td class="posterinfo" valign="top">';
	
	if(!empty($post[$p]['avatarurl'])){
	
		echo '<div style="text-align:center;"><img src="'.$post[$p]['avatarurl'][0].'" width="'.$post[$p]['avatarurl'][1].'" height="'.$post[$p]['avatarurl'][2].'" /></div>';
		
	}
	
	echo '<div class="pisub">'.$l['prefix_group'].' <span '.(empty($post[$p]['mem_gr_colour']) ? '' : 'style="color:'.$post[$p]['mem_gr_colour'].';"').'>'.$post[$p]['mem_gr_name'].'</span><br />';
	
	//If the user group has some images as per Group
	if($post[$p]['image_count']){
	
		for($i = 0; $i < $post[$p]['image_count']; $i++){
			echo '<img src="'.$theme['images'].$post[$p]['image_name'].'">';
		}
		
		echo '</div>';
		
	}
	
	echo '
	'.(!empty($post[$p]['post_gr_name']) ? '<div class="pisub">'.$l['prefix_post_group'].' '.$post[$p]['post_gr_name'].'</div>':'').'
	'.(!empty($post[$p]['posts']) ? '<div class="pisub">'.$l['prefix_posts'].' '.$post[$p]['posts'].'</div>':'').'	
	<div class="pisub">'.$l['prefix_status'].' '.($post[$p]['status'] ? '<img src="'.$theme['images'].'online.png" title="'.$l['online'].'" />' : '<img src="'.$theme['images'].'offline.png" title="'.$l['offline'].'" />').'</div>
	'.( (empty($post[$p]['users_text'])) ? '' : '<br />'.$post[$p]['users_text'] ).'
	</td>
	<td class="post" align="left" valign="top">
	'.$post[$p]['post'].'
	'.(!empty($attachments[$post[$p]['pid']]) ? '<br /><br />-----------------------<br />'.implode('<br />', $attachments[$post[$p]['pid']]) : '').'
	'.(!empty($post[$p]['modifier']) ? '<br /><br />'.$l['edited_by'].' <b>'.$post[$p]['modifier'].'</b> : '.$post[$p]['modtime'] : '');
	
	if(!empty($post[$p]['sig'])){
	
		echo '<br /><br />-----------------------<br />'.$post[$p]['sig'];
	
	}
	
	echo '</td>
	</tr>';
	
	echo '<tr>
	<td class="ptip">
	<b>'.$l['ip'].':</b> '.((isset($post[$p]['poster_ip']))? $post[$p]['poster_ip'] : '--' ).'
	</td>
	<td class="specialrow">
	&nbsp;<a href="'.(isset($post[$p]['is_guest']) ? 'mailto:'.$post[$p]['email']: $globals['index_url'].'mid='.$post[$p]['id']).'"><img src="'.$theme['images'].'profile.gif" title="'.$l['view_profile_of'].' '.$post[$p]['username'].'" /></a>&nbsp;
	
	'.(!empty($post[$p]['email']) ? '<a href="mailto:'.$post[$p]['email'].'"><img src="'.$theme['images'].'email.gif" title="'.$l['send_email_to'].' '.$post[$p]['username'].'" /></a>&nbsp;' : '').'
	
	'.($logged_in ? '<a href="'.$globals['index_url'].'act=usercp&ucpact=writepm&to='.$post[$p]['id'].'"><img src="'.$theme['images'].'pmuser.gif" title="'.$l['send_pm_to'].' '.$post[$p]['username'].'" /></a>&nbsp;' : '').'
	
	'.(!empty($post[$p]['www']) ? '<a href="'.$post[$p]['www'].'" target="_blank"><img src="'.$theme['images'].'www.gif" title="'.$l['visit_website_of'].' '.$post[$p]['username'].'" /></a>&nbsp;' : '').'
	
	'.(!empty($post[$p]['msn']) ? '<a href="http://members.msn.com/'.$post[$p]['msn'].'" target="_blank"><img src="'.$theme['images'].'msn.gif" title="'.$l['view_msn_profile'].' '.$post[$p]['username'].'" /></a>&nbsp;' : '').'
	
	'.(!empty($post[$p]['aim']) ? '<a href="aim:goim?screenname='.$post[$p]['aim'].'&message='.$l['aim_hello'].'" target="_blank"><img src="'.$theme['images'].'aim.gif" title="'.$l['aim_username_is'].' '.$post[$p]['username'].' '.$l['is'].' '.$post[$p]['aim'].'" /></a>&nbsp;' : '').'
	
	'.(!empty($post[$p]['yim']) ? '<a href="http://edit.yahoo.com/config/send_webmesg?.target='.$post[$p]['yim'].'&.src=pg" target="_blank"><img src="'.$theme['images'].'yim.gif" title="'.$l['yim_identity_is'].' '.$post[$p]['username'].' '.$l['is'].' '.$post[$p]['yim'].'" /></a>&nbsp;' : '').'
	
	</td>
	</tr>
	
	</table>

	</td>
	</tr>
	
	<tr>
	<td><img src="'.$theme['images'].'cbot.png" width="100%" height="10"></td>
	</tr>
	</table>';
	
	//The post ends here
	
	///////////////////
	// All the threads
	///////////////////
	
	echo '<br /><br /><table width="100%" cellpadding="0" cellspacing="0">
	<tr>
	<td>
	<table width="100%" cellpadding="0" cellspacing="0"><tr>
	<td class="pcbgl"></td>
	<td class="pcbg"><b>'.$l['threads'].'</b></td>
	<td class="pcbgr"></td>		
	</tr>
	</table>
	</td>
	</tr>
	
	<tr>
	<td class="cbgbor">
	<table width="100%" cellpadding="1" cellspacing="0">
	<tr>
	<td class="post" width="22%">';
	
	//The first post title
	echo '<img src="'.$theme['images'].'postedon.png" />&nbsp;<b><a href="'.(isset($post[$fpid]['is_guest']) ? 'mailto:'.$post[$fpid]['email']: $globals['index_url'].'mid='.$post[$fpid]['id']).'">'.$post[$fpid]['username'].'</a></b>&nbsp;&nbsp;&nbsp;<i>'.($pid == $fpid ? '<b>' : '').'<a href="'.$globals['index_url'].'tid='.$tid.'">'.$title.'</a>'.($pid == $fpid ? '</b>' : '').'</i>'.(empty($topic['description']) ? '' : ',&nbsp;'.$topic['description']).'&nbsp;('.$topic['n_posts'].' '.$l['replies'].', '.$l['read'].' '.$topic['n_views'].' '.$l['times'].')<br />';
	
	$tab = '&nbsp;&nbsp;&nbsp;&nbsp;';
	
	$tree = '|--';
	
	$parents = array();
	
	$before = '';
	
	$last_pid = 0;
	
	foreach($post as $pk => $pv){		
		
		if($post[$pk]['post_count'] == 0){
		
			continue;
		
		}
		
		$dasher = '';
				
		for($t = 0; $t < $post[$pk]['level']; $t++){
		
			$dasher .= $tab;
			
		}
		
		$before = $dasher.$tree;
		
		echo $before.' <img src="'.$theme['images'].'thread.png" />&nbsp;<b><a href="'.(isset($post[$pk]['is_guest']) ? 'mailto:'.$post[$pk]['email'] : $globals['index_url'].'mid='.$post[$pk]['id']).'">'.$post[$pk]['username'].'</a></b>';
		
		if($pid == $pk){
		
			echo '&nbsp;&nbsp;&nbsp;<b><i><a href="'.$globals['index_url'].'tid='.$tid.'&pid='.$post[$pk]['pid'].'">'.$post[$pk]['post_thread'].'</a></i></b>';
		
		}else{
		
			echo '&nbsp;&nbsp;&nbsp;<i><a href="'.$globals['index_url'].'tid='.$tid.'&pid='.$post[$pk]['pid'].'">'.$post[$pk]['post_thread'].'</a></i>';
		
		}
		
		echo '&nbsp;&nbsp;&nbsp;<small>'.$l['on'].'&nbsp;'.$post[$pk]['pdate'].'</small><br />';
		
		$last_pid = $pk;
			
	}
	
	
	
	echo '</td></tr></table>
	</td>
	</tr>
	
	<tr>
	<td><img src="'.$theme['images'].'cbot.png" width="100%" height="10"></td>
	</tr>
	</table>';
	
	echo '<br /><br /><table width="100%" cellpadding="4" cellspacing="0" class="cbgbor">
	<tr><td class="ptcbg1" align="right">';
	echo implode(' | ', $top_opt);
	
	echo '</td></tr>
	</table><br />';
	
	
	//Can he post reply
	if(!empty($user['can_reply_to_this_topic'])){
	
		echo '<br /><a href="'.$globals['index_url'].'act=post&topid='.$topic['tid'].'&par_id='.$pid.'"><img src="'.$theme['images'].'buttons/reply.png"></a>';
	
	}
	
	if(!empty($user['can_poll_this_topic'])){
	
		echo '&nbsp;&nbsp;<a href="'.$globals['index_url'].'act=postpoll"><img src="'.$theme['images'].'buttons/addpoll.png"></a>';
	
	}
	
	if(!empty($users_who_read)){
	
		echo '<br /><br />
		<table border="0" width="100%" cellspacing="1" cellpadding="4" class="cbor">
			
			<tr>
			<td colspan="2" class="cbg1" align="left">'.$l['users_who_read'].'</td>
			</tr>
			
			<tr>
			<td align="center" class="miposts" width="5%">
			<img src="'.$theme['images'].'online.gif" />
			</td>
			<td class="mifor">';
			
			foreach($users_who_read as $u => $uv){
			
				$users_who_read[$u] = '<a href="'.$globals['index_url'].'mid='.$u.'" style="color: '.$uv['mem_gr_colour'].';" >'.$uv['username'].'</a>';
			
			}
			
			echo implode(', ',$users_who_read).'</td>
			</tr>
					
		</table>';
	
	}	
	
	echo '<br /><br />
	<table border="0" width="100%" cellspacing="1" cellpadding="4" class="cbor">
		
		<tr>
		<td colspan="2" class="cbg1" align="left">'.$l['users_viewing'].'</td>
		</tr>
		
		<tr>
		<td align="center" class="miposts" width="5%">
		<img src="'.$theme['images'].'online.gif" />
		</td>
		<td class="mifor">
		'.$guests.' '.$l['guests'].', '.count($active).' '.$l['users'].''.(($anonymous) ? ', '.$anonymous.' '.$l['viewing_anonymous'] : '.' ).'
		'.(!empty($activeusers) ? '<hr />'.implode(', ', $activeusers) : '').'		
		</td>
		</tr>
				
		</table>';
	
	//The defualt footers
	aeffooter();
	
}




function printtopic_theme(){

global $user, $logged_in, $globals, $AEF_SESS, $theme, $l;
global $categories, $forums, $active, $anonymous, $guests, $activeusers, $board, $poll, $user_group, $post_group, $tid, $tpg, $fid, $title, $topic, $post, $topicpages, $pg, $attachments, $page;
	
	//////////////////////////
	// Count the topic pages
	//////////////////////////
	
	$tpages = ceil(($topic['n_posts'] + 1)/$globals['maxpostsintopics']);
	
	$pg = ($page/$globals['maxpostsintopics']) + 1;//Current Page
	
	$topicpages = array();
	
	if($tpages > 1){
	
		if($pg != 1){
			
			$topicpages['&lt;&lt;'] = 1;
			
			$topicpages['&lt;'] = ($pg - 1);
		
		}
		
		for($i = ($pg - 4); $i < $pg; $i++){
			
			if($i >= 1){
			
				$topicpages[$i] = $i;
			
			}
		
		}
		
		$topicpages[$pg] = $pg;
		
		
		for($i = ($pg + 1); $i <= ($pg + 4); $i++){
		
			if($i <= $tpages){
			
				$topicpages[$i] = $i;
			
			}
		
		}
		
		
		if($pg != $tpages){
			
			$topicpages['&gt;'] = ($pg + 1);
			
			$topicpages['&gt;&gt;'] = $tpages;
		
		}
		
		
		if($tpages > 1){
			
			$topicpages[$l['all']] = 'all';
		
		}
	
	}
	
	echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>'.((empty($title)) ? $globals['sn'] : $title).'</title>
	<link rel="stylesheet" type="text/css" href="'.$theme['url'].'/style.css" />
	</head>
	<body>';
	

	echo '<center><h1>'.$globals['sn'].'</h1></center>
	<hr />
	<font size="4">'.$l['topic'].' : <b>'.$title.'</font></b>
	<hr /><br /><br />';	
	
	if(!empty($topicpages)){

$links = '<table class="cbgbor" cellspacing="1">
<tr>';
$links .= '<td class="pagelinks">'.$l['page'].' '.$pg.' '.$l['of'].' '.$tpages.'</td>';
foreach($topicpages as $k => $lv){

	$links .= '<td class="'.($k == $pg ? 'activepage' : 'pagelinks' ).'"><a href="'.$globals['index_url'].'tid='.$tid.'&tpg='.$lv.'&printtopic=true" >'.$k.'</a></td>';

}
$links .= '</tr>
</table><br />';
	
	echo $links;
	
	}
	
	foreach($post as $p => $pv){	
	
	echo'<table width="100%" cellpadding="4" cellspacing="3" border="1" align="center">
	
	<tr>
	<td>
	<a name="p'.$post[$p]['pid'].'"></a>
	'.$l['posted_by'].': <b>'.$post[$p]['username'].'</b> '.$l['on'].' '.$post[$p]['pdate'].(($post[$p]['post_count']) ? ' | '.$l['post_num_prefix'].': '.$post[$p]['post_count'] : '').'
	</td>
	</tr>
	
	<tr>
	<td align="left" valign="top">
	'.$post[$p]['post'].'
	'.(!empty($post[$p]['modifier']) ? '<br /><br />'.$l['edited_by'].' <b>'.$post[$p]['modifier'].'</b> : '.$post[$p]['modtime'] : '').'
	'.(!empty($post[$p]['sig']) ? '<br /><br />-----------------------<br />'.$post[$p]['sig'] : '').'
	</td>
	</tr>
	
	</table>
	<br />';
	
	}
	
echo '<center>'.copyright().'</center>
<br />
</body>
</html>';

}

?>