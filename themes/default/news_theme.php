<?php


function shownews_theme(){

global $theme, $globals, $logged_in, $l, $news, $user;

	//The header
	aefheader($l['<title>']);
	
	echo (empty($user['can_submit_news']) ? '' : '<br /><a href="'.$globals['index_url'].'act=news&nact=submitnews"><img src="'.$theme['images'].'buttons/submitnews.png" /></a>' );
	
if(!empty($news)){
	
	//r_print($news);
	$show_mod = ($user['can_delete_news']  || $user['can_approve_news'] ? 1 : 0);
	
	if($show_mod){
	
		echo '<form method="post" action="" name="newsmod">';
	
	}
	
	foreach($news as $n => $v){
	
		echo '<br /><br />
<table width="100%" cellpadding="1" cellspacing="2">
<tr>
<td>

<table width="100%" cellpadding="3" cellspacing="1" class="newshead">
<tr>
<td>
<a href="'.$globals['index_url'].'act=news#n'.$n.'" name="n'.$n.'">'.$v['title'].'</a><br />
<font class="newsinfo">'.$l['submitted_by'].' <a href="'.$globals['index_url'].'mid='.$v['uid'].'">'.$v['username'].'</a> '.$l['on'].' '.datify($v['time']).''.(empty($v['approved']) ? ' | <b>'.$l['unapproved'].'</b>' : '' ).'</font>
</td>
<td width="1%">';

$opt = array();

//Edit
if(!empty($user['can_edit_news'])){

	$opt[] = '<a href="'.$globals['index_url'].'act=news&nact=editnews&nid='.$n.'">'.$l['edit'].'</a>';

}

//Approve
if(!empty($user['can_approve_news']) && $v['approved'] == 0){

	$opt[] = '<a href="'.$globals['index_url'].'act=news&nact=approvenews&do=1&nid='.$n.'">'.$l['approve'].'</a>';

//Unapprove
}elseif(!empty($user['can_approve_news']) && $v['approved'] == 1){

	$opt[] = '<a href="'.$globals['index_url'].'act=news&nact=approvenews&do=0&nid='.$n.'">'.$l['unapprove'].'</a>';

}

//Delete
if(!empty($user['can_delete_news'])){

	$opt[] = '<a href="'.$globals['index_url'].'act=news&nact=deletenews&nid='.$n.'">'.$l['delete'].'</a>';

}

//Show Quick Mod
if(!empty($show_mod)){

	$opt[] = '<input type="checkbox" name="nids[]" value="'.$n.'" />';

}

if(!empty($opt)){

	echo implode('&nbsp;|&nbsp;', $opt);

}

echo '</td>
</tr>
</table>

</td>
</tr>

<tr>
<td class="news">'.(empty($v['image']) ? '' : '<img src="'.$v['image'].'" alt="logo" vspace="5" hspace="5" />').''.$v['news'].''.(empty($v['fullstorylink']) ? '' : '<br /><br /><b><a href="'.$v['fullstorylink'].'">'.$l['full_story'].'</a></b>').'</td>
</tr>

</table>';
	
	}
	
	if($show_mod){
	
	echo '<br /><br /><div style="text-align:right;">With Selected : <select name="withselected">
	'.(empty($user['can_delete_news']) ? '' : '<option value="delete">'.$l['delete_news'].'</option>').'
	'.(empty($user['can_approve_news']) ? '' : '<option value="approve">'.$l['approve_news'].'</option>').'
	'.(empty($user['can_approve_news']) ? '' : '<option value="unapprove">'.$l['unapprove_news'].'</option>').'
	</select>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" name="withselsubmit" value="'.$l['submit_go'].'">&nbsp;&nbsp;&nbsp;&nbsp;
	</form>
	</div>';
	
	}

}else{

	echo '<br /><br />
<table width="100%" cellpadding="1" cellspacing="2">
<tr>
<td class="newshead">
'.$l['no_news_articles'].'
</td>
</tr>
</table>
<br /><br /><br /><br /><br /><br /><br />';

}

	//The defualt footers
	aeffooter();

}


function submitnews_theme(){

global $theme, $globals, $logged_in, $l, $postcodefield, $error, $user;

	//The header
	aefheader($l['<title>']);
	
	error_handle($error, '90%');
	
	?>
<form action=""  method="post" name="submitnewsform">
<br />
<?php echo (empty($user['can_approve_news']) ? $l['approval_note'] : '');?>
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td>
<table width="100%" cellpadding="0" cellspacing="0"><tr>
<td class="pcbgl"></td>
<td class="pcbg" align="left"><?php echo $l['submitnews_heading'];?></td>
<td class="pcbgr"></td>		
</tr>
</table>
</td>
</tr>

<tr>
<td>
<table width="100%" cellpadding="1" cellspacing="1" class="cbgbor">

<tr>
<td width="18%" class="rlc"><?php echo $l['news_title'];?>*</td>
<td class="rrc">
<input type="text" size="45" name="title" value="<?php echo ( (empty($_POST['title'])) ? 'Title' : $_POST['title'] );?>" /></td>
</tr>

<tr>
<td class="rlc"><?php echo $l['news_article'];?>*</td>
<td class="rrc"><textarea name="news" rows="8" cols="85" /><?php echo ( (isset($_POST['news'])) ? $_POST['news'] : '' );?></textarea>
<?php echo $postcodefield;?>
</td>
</tr>

<tr>
<td class="rlc"><?php echo $l['full_story_link'];?></td>
<td class="rrc">
<input type="text" size="45" name="fullstorylink" value="<?php echo (empty($_POST['fullstorylink']) ? '' : $_POST['fullstorylink'] );?>" /></td>
</tr>

<tr>
<td class="rlc"><?php echo $l['news_image'];?></td>
<td class="rrc">
<input type="text" size="45" name="image" value="<?php echo (empty($_POST['image']) ? '' : $_POST['image'] );?>" /></td>
</tr>

<tr>
<td colspan="2" class="rrc" style="text-align:center"><input type="submit" name="submitnews" value="<?php echo $l['submit_button'];?>"/></td>
</tr>
</table>
</td>
</tr>

<tr>
<td><img src="<?php echo $theme['images'];?>cbot.png" width="100%" height="10"></td>
</tr>
</table>
</form>
	
	<?php
	
	//The defualt footers
	aeffooter();

}


function editnews_theme(){

global $theme, $globals, $logged_in, $l, $postcodefield, $error, $user, $newsarticle;

	//The header
	aefheader($l['<title>']);
	
	error_handle($error, '90%');
	
	?>
<form action=""  method="post" name="editnewsform">
<br />
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td>
<table width="100%" cellpadding="0" cellspacing="0"><tr>
<td class="pcbgl"></td>
<td class="pcbg" align="left"><?php echo $l['editnews_heading'];?></td>
<td class="pcbgr"></td>		
</tr>
</table>
</td>
</tr>

<tr>
<td>
<table width="100%" cellpadding="1" cellspacing="1" class="cbgbor">

<tr>
<td width="18%" class="rlc"><?php echo $l['news_title'];?>*</td>
<td class="rrc">
<input type="text" size="45" name="title" value="<?php echo ( (empty($_POST['title'])) ? $newsarticle['title'] : $_POST['title'] );?>" /></td>
</tr>

<tr>
<td class="rlc"><?php echo $l['news_article'];?>*</td>
<td class="rrc"><textarea name="news" rows="8" cols="85" /><?php echo ( (isset($_POST['news'])) ? $_POST['news'] : $newsarticle['news'] );?></textarea>
<?php echo $postcodefield;?>
</td>
</tr>

<tr>
<td class="rlc"><?php echo $l['full_story_link'];?></td>
<td class="rrc">
<input type="text" size="45" name="fullstorylink" value="<?php echo (empty($_POST['fullstorylink']) ? $newsarticle['fullstorylink'] : $_POST['fullstorylink'] );?>" /></td>
</tr>

<tr>
<td class="rlc"><?php echo $l['news_image'];?></td>
<td class="rrc">
<input type="text" size="45" name="image" value="<?php echo (empty($_POST['image']) ? $newsarticle['image'] : $_POST['image'] );?>" /></td>
</tr>

<tr>
<td colspan="2" class="rrc" style="text-align:center"><input type="submit" name="editnews" value="<?php echo $l['submit_button'];?>"/></td>
</tr>
</table>
</td>
</tr>

<tr>
<td><img src="<?php echo $theme['images'];?>cbot.png" width="100%" height="10"></td>
</tr>
</table>
</form>
	
	<?php
	
	//The defualt footers
	aeffooter();

}


?>