<?php

if(!defined('AEF'))
{
die('Hacking Attempt');
}

//A global part to appear
function tpp_global(){

global $globals, $theme, $categories;

	?>
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
	
	<tr>
	<td align="right" width="40%" class="adcbg1">
	<img src="<?php echo $theme['images'];?>admin/topicposts.png">
	</td>
	<td align="left" class="adcbg1">
	
	<font class="adgreen">Message Settings</font><br />
	
	</td>
	</tr>
	
	<tr>
	<td align="left" colspan="2" class="adbg">
	This is the place where you can set the settings of Topics, Posts and Polls .<br />
	Also you can set Censorship for particular Badwords that are undesirable in the posts .
	</td>
	</tr>
	
	</table>
	<br /><br />
	<?php
	
}



function manage_topics_theme(){

global $globals, $theme, $error;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Manage Topics');
	
	tpp_global();
	
	error_handle($error, '100%');
		
	?>
	<form action="" method="post" name="topset">
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Topic Settings
		</td>
		</tr>
	
		<tr>
		<td width="35%" class="adbg">
		<b>Max Characters in Title:</b><br />
		<font class="adexp">The Max Number of Characters in a topics Title. Zero(0) for no Limit</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="maxtitlechars"
		<?php echo 'value="'.$globals['maxtitlechars'].'"';?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Min Characters in Title:</b><br />
		<font class="adexp">The Minimum Number of Characters in a topics Title. Zero(0) for no Limit</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="mintitlechars"
		<?php echo 'value="'.$globals['mintitlechars'].'"';?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Number of topics PP:</b><br />
		<font class="adexp">The Number of topics that will appear Per Board Page.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="maxtopics"
		<?php echo 'value="'.$globals['maxtopics'].'"';?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Number of Posts PT:</b><br />
		<font class="adexp">The Number of Posts that will appear Per Topic Page.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="maxpostsintopics"
		<?php echo 'value="'.$globals['maxpostsintopics'].'"';?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Replies for Hot Topic :</b><br />
		<font class="adexp">The Number of replies for a 'Hot topic'.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="maxreplyhot"
		<?php echo 'value="'.$globals['maxreplyhot'].'"';?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Replies for Very Hot Topic :</b><br />
		<font class="adexp">The Number of replies for a 'Very Hot topic'.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="maxreplyveryhot"
		<?php echo 'value="'.$globals['maxreplyveryhot'].'"';?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Disable Shouting in Topic Titles :</b><br />
		<font class="adexp">This will make 'SHOUTING' in a topic title to 'Shouting' .</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="disableshoutingtopics"
		<?php echo ($globals['disableshoutingtopics']) ? 'checked="checked"' : '' ;
		?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Previous - Next Topic Links :</b><br />
		<font class="adexp">Enable Previous - Next Topic Links within each Topic.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="prenextopic"
		<?php echo 'value="'.$globals['prenextopic'].'"';
		echo ($globals['prenextopic']) ? 'checked="checked"' : '' ;
		?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Old Topic Warn :</b><br />
		<font class="adexp">The Number of Days before topic is warned as Old on reply.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="warnoldtopic"
		<?php echo 'value="'.$globals['warnoldtopic'].'"';?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Prefix for Stickied Topic :</b><br />
		<font class="adexp">The Stickied Topic will have this Prefix on the Board Page.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="prefixsticky"
		<?php echo 'value="'.$globals['prefixsticky'].'"';?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Prefix for Moved Topic :</b><br />
		<font class="adexp">The Moved Topic Post will have this Prefix on the Board Page.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="prefixmoved"
		<?php echo 'value="'.$globals['prefixmoved'].'"';?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Prefix for Poll Topics :</b><br />
		<font class="adexp">The Poll Topic will have this Prefix on the Board Page.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="prefixpolls"
		<?php echo 'value="'.$globals['prefixpolls'].'"';?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Disable Shouting in Topic Description :</b><br />
		<font class="adexp">This will make 'SHOUTING' in a topic description to 'Shouting' .</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="disableshoutingdesc"
		<?php echo ($globals['disableshoutingdesc']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Max Characters in Description:</b><br />
		<font class="adexp">The Max Number of Characters in a topics description. Zero(0) for no Limit</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="maxdescchars"
		<?php echo 'value="'.$globals['maxdescchars'].'"';?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Min Characters in Description:</b><br />
		<font class="adexp">The Minimum Number of Characters in a topics description. Zero(0) for no Limit</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="mindescchars"
		<?php echo 'value="'.$globals['mindescchars'].'"';?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Allow Tell a friend feature :</b><br />
		<font class="adexp">This will allow users to email a topic to a friend.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="allow_taf"
		<?php echo ($globals['allow_taf']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
        
        <tr>
		<td class="adbg">
		<b>Show users who read a topic :</b><br />
		<font class="adexp">This will show within a topic the usernames of members who have read that topic.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="who_read_topic"
		<?php echo ($globals['who_read_topic']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
			
	</table>
	
	<br /><br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="edittopset" value="Submit" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	//Admin footers includes Global footers
	adminfoot();

}//End of function


function manage_posts_theme(){

global $globals, $theme, $error;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Manage Posts');
	
	tpp_global();
	
	error_handle($error, '100%');
	
	?>
	<form action="" method="post" name="postset">
	
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Posts Settings
		</td>
		</tr>
			
		<tr>
		<td width="35%" class="adbg">
		<b>Number of Posts PT:</b><br />
		<font class="adexp">The Number of Posts that will appear Per Topic Page.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="maxpostsintopics"
		<?php echo 'value="'.$globals['maxpostsintopics'].'"';?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Max Characters per Post :</b><br />
		<font class="adexp">The Number of Characters allowed in one Posting.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="maxcharposts"
		<?php echo 'value="'.$globals['maxcharposts'].'"';?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Min Characters per Post :</b><br />
		<font class="adexp">The Minimum Number of Characters necessary in one Posting.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="mincharposts"
		<?php echo 'value="'.$globals['mincharposts'].'"';?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Time Between Posts :</b><br />
		<font class="adexp">The Time difference required between posts from the same user in Seconds.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="timepostfromuser"
		<?php echo 'value="'.$globals['timepostfromuser'].'"';?> />
		</td>
		</tr>
        
        <tr>
		<td width="35%" class="adbg">
		<b>Show Last Posts :</b><br />
		<font class="adexp">The Number of Posts that should be shown while replying in a topic. (0 to disable)</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="last_posts_reply"
		<?php echo 'value="'.$globals['last_posts_reply'].'"';?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Max Emoticons Allowed :</b><br />
		<font class="adexp">The Number of Emoticons to be allowed Per Post (Excludes Topic title).</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="maxemotpost"
		<?php echo 'value="'.$globals['maxemotpost'].'"';?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Max Images Allowed :</b><br />
		<font class="adexp">The Max number of Images to be allowed Per Post using [IMG][/IMG].</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="maximgspost"
		<?php echo 'value="'.$globals['maximgspost'].'"';?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Width x Height of Image :</b><br />
		<font class="adexp">The Maximum width and height of a Image that is posted using [IMG][/IMG]. Larger Images will be scaled down.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="10"  name="maximgwidthpost"
		<?php echo 'value="'.$globals['maximgwidthpost'].'"';?> /> x <input type="text" size="10"  name="maximgheightpost"
		<?php echo 'value="'.$globals['maximgheightpost'].'"';?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Remove Nested Quotes :</b><br />
		<font class="adexp">While Posting Quotes within quotes will be removed.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="removenestedquotes"
		<?php echo ($globals['removenestedquotes']) ? 'checked="checked"' : '' ;
		?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Attach Sig to Post :</b><br />
		<font class="adexp">Attach the Users sig to his posts .</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="attachsigtopost"
		<?php echo ($globals['attachsigtopost']) ? 'checked="checked"' : '' ;
		?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Allow Flash :</b><br />
		<font class="adexp">Allow Flash files to be Embedded in a Post.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="embedflashinpost"
		<?php echo 'value="'.$globals['embedflashinpost'].'"';
		echo ($globals['embedflashinpost']) ? 'checked="checked"' : '' ;
		?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Allow Dynamic Images :</b><br />
		<font class="adexp">Allow dynamic images in a Post.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="allowdynimg"
		<?php echo ($globals['allowdynimg']) ? 'checked="checked"' : '' ;
		?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Width x Height of Flash :</b><br />
		<font class="adexp">The width and height of a Flash Embedded in a post using [FLASH][/FLASH].</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="10"  name="maxflashwidthinpost"
		<?php echo 'value="'.$globals['maxflashwidthinpost'].'"';?> /> x <input type="text" size="10"  name="maxflashheightinpost"
		<?php echo 'value="'.$globals['maxflashheightinpost'].'"';?> />
		</td>
		</tr>
	
	</table>
	
	<br /><br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="editpostset" value="Submit" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	//Admin footers includes Global footers
	adminfoot();

}//End of function


function manage_polls_theme(){

global $globals, $theme, $error;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Manage Polls');
	
	tpp_global();
	
	error_handle($error, '100%');
	
	?>
	<form action="" method="post" name="pollset">
	
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		Polls Settings
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Enable Polls :</b><br />
		<font class="adexp">Should the Polls be enabled on the board.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="enablepolls"
		<?php echo ($globals['enablepolls']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Max Options in Poll:</b><br />
		<font class="adexp">Maximum number of options in a poll.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="maxoptionspoll"
		<?php echo 'value="'.$globals['maxoptionspoll'].'"';?> />
		</td>
		</tr>
		
		<tr>
		<td width="35%" class="adbg">
		<b>Poll Question Length:</b><br />
		<font class="adexp">Maximum length of the poll question.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="maxpollqtlen"
		<?php echo 'value="'.$globals['maxpollqtlen'].'"';?> />
		</td>
		</tr>	
			
	</table>
	
	<br /><br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="editpollset" value="Submit" />
		</td>
		</tr>	
	</table>
	
	</form>
	
	<?php
	
	//Admin footers includes Global footers
	adminfoot();

}//End of function


function manage_words_theme(){

global $globals, $theme, $error, $from, $to;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Manage Censored Words');
	
	tpp_global();
	
	error_handle($error, '100%');
	
	?>
	<script type="text/javascript">
	function addrow(id){
		var t = document.getElementById(id);
		var lastRow = t.rows.length;
		var x=t.insertRow(lastRow);
		var y = x.insertCell(0);
		var z = x.insertCell(1);
		y.innerHTML = '<input type="text" name="from[]" />';
		z.innerHTML = '<input type="text" name="to[]" />';
		y.className = "adbg";
		z.className = "adbg";
		y.align = "center";
		z.align = "center";
	}
	</script>

	<form action="" method="post" name="censorwords">
	
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor" id="wordstable">
	
		<tr>
		<td class="adcbg" colspan="2">
		Censored Words Settings
		</td>
		</tr>
		
		<tr>
		<td width="50%" class="adbg">
		<b>Case Sensitive :</b><br />
		<font class="adexp">Should the censored words be case sensitive.</font>
		</td>
		<td width="50%" class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="censor_words_case"
		<?php echo ($globals['censor_words_case']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
		
		<tr>
		<td class="adcbg2" align="center">
		Convert From
		</td>
		<td class="adcbg2" align="center">
		To
		</td>
		</tr>
		
	<?php
	
	foreach($from as $k => $v){
	
	echo '<tr>
		<td class="adbg" align="center">
		<input type="text" name="from[]" value="'.$from[$k].'" />
		</td>
		<td class="adbg" align="center">
		<input type="text" name="to[]" value="'.$to[$k].'" />
		</td>
		</tr>';
	
	}
	
	?>
	
	</table>
		
	<br /><br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg" width="50%">
		<input type="button" onclick="addrow('wordstable');" value="Add more words" />
		</td>
		<td align="center" class="adbg">
		<input type="submit" name="censorwords" value="Submit" />
		</td>
		</tr>
	</table>
	
	</form>
	
	<?php
	
	//Admin footers includes Global footers
	adminfoot();

}//End of function


function manage_bbc_theme(){

global $globals, $theme, $error;
	
	//Admin Headers includes Global Headers
	adminhead('Administration Center - Manage BBC');
	
	tpp_global();
	
	error_handle($error, '100%');
	
	?>
	<form action="" method="post" name="bbcset">
	
	<table width="100%" cellpadding="2" cellspacing="1" class="cbor">
	
		<tr>
		<td class="adcbg" colspan="2">
		BBC Settings
		</td>
		</tr>
		
		<tr>
		<td width="50%" class="adbg">
		<b>Parse BBC :</b><br />
		<font class="adexp">Should Bulletin Board Code(BBC) be enabled ?</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="parsebbc"
		<?php echo ($globals['parsebbc']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
		
		<tr>
		<td width="50%" class="adbg">
		<b>Autolink URL :</b><br />
		<font class="adexp">If enabled a URL will be converted into a link.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="autolink"
		<?php echo ($globals['autolink']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
		
		<tr>
		<td width="50%" class="adbg">
		<b>Horizontal Rule :</b><br />
		<font class="adexp">[hr]</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="bbc_hr"
		<?php echo ($globals['bbc_hr']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>		
		
		<tr>
		<td width="50%" class="adbg">
		<b>Bold :</b><br />
		<font class="adexp">[b][/b]</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="bbc_b"
		<?php echo ($globals['bbc_b']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
		
		<tr>
		<td width="50%" class="adbg">
		<b>Italics :</b><br />
		<font class="adexp">[i][/i]</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="bbc_i"
		<?php echo ($globals['bbc_i']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
		
		<tr>
		<td width="50%" class="adbg">
		<b>Underline :</b><br />
		<font class="adexp">[u][/u]</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="bbc_u"
		<?php echo ($globals['bbc_u']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
		
		
		
		<tr>
		<td width="50%" class="adbg">
		<b>Strike through :</b><br />
		<font class="adexp">[s][/s]</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="bbc_s"
		<?php echo ($globals['bbc_s']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
		
		<tr>
		<td width="50%" class="adbg">
		<b>Left Align :</b><br />
		<font class="adexp">[left][/left]</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="bbc_left"
		<?php echo ($globals['bbc_left']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
		
		<tr>
		<td width="50%" class="adbg">
		<b>Right Align :</b><br />
		<font class="adexp">[right][/right]</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="bbc_right"
		<?php echo ($globals['bbc_right']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
		
		<tr>
		<td width="50%" class="adbg">
		<b>Center Align :</b><br />
		<font class="adexp">[center][/center]</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="bbc_center"
		<?php echo ($globals['bbc_center']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
		
		<tr>
		<td width="50%" class="adbg">
		<b>Font Size :</b><br />
		<font class="adexp">[size][/size]</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="bbc_size"
		<?php echo ($globals['bbc_size']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
		
		<tr>
		<td width="50%" class="adbg">
		<b>Font Face :</b><br />
		<font class="adexp">[font][/font]</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="bbc_font"
		<?php echo ($globals['bbc_font']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
		
		<tr>
		<td width="50%" class="adbg">
		<b>Superscript Text :</b><br />
		<font class="adexp">[sup][/sup]</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="bbc_sup"
		<?php echo ($globals['bbc_sup']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
		
		<tr>
		<td width="50%" class="adbg">
		<b>Subscript Text :</b><br />
		<font class="adexp">[sub][/sub]</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="bbc_sub"
		<?php echo ($globals['bbc_sub']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
		
		<tr>
		<td width="50%" class="adbg">
		<b>Colour Text :</b><br />
		<font class="adexp">[color][/color]</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="bbc_color"
		<?php echo ($globals['bbc_color']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
		
		<tr>
		<td width="50%" class="adbg">
		<b>Anchor(URL) :</b><br />
		<font class="adexp">[url][/url]</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="bbc_url"
		<?php echo ($globals['bbc_url']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
		
		<tr>
		<td width="50%" class="adbg">
		<b>FTP Link :</b><br />
		<font class="adexp">[ftp][/ftp]</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="bbc_ftp"
		<?php echo ($globals['bbc_ftp']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
		
		<tr>
		<td width="50%" class="adbg">
		<b>Email Link :</b><br />
		<font class="adexp">[email][/email]</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="bbc_email"
		<?php echo ($globals['bbc_email']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
		
		<tr>
		<td width="50%" class="adbg">
		<b>Inline Image:</b><br />
		<font class="adexp">[img][/img]</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="bbc_img"
		<?php echo ($globals['bbc_img']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
        
        <tr>
		<td class="adbg">
		<b>Show Images by default:</b><br />
       <font class="adexp">If this is disabled then images will no be shown and the Image will be parsed as <br /><b>Image : http://www.url.com/image.jpg</b> .</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="showimgs" <?php echo (isset($_POST['showimgs']) ? 'checked="checked"' : ($globals['showimgs'] ? 'checked="checked"' : ''));?> />
		</td>
		</tr>
		
		<tr>
		<td width="50%" class="adbg">
		<b>Flash :</b><br />
		<font class="adexp">[flash][/flash]</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="bbc_flash"
		<?php echo ($globals['bbc_flash']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
		
		<tr>
		<td width="50%" class="adbg">
		<b>Code Block :</b><br />
		<font class="adexp">[code][/code]</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="bbc_code"
		<?php echo ($globals['bbc_code']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
		
		<tr>
		<td width="50%" class="adbg">
		<b>Quote Text :</b><br />
		<font class="adexp">[quote][/quote]</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="bbc_quote"
		<?php echo ($globals['bbc_quote']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
		
		<tr>
		<td width="50%" class="adbg">
		<b>PHP Code Block:</b><br />
		<font class="adexp">[php][/php]</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="bbc_php"
		<?php echo ($globals['bbc_php']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
		
		<tr>
		<td width="50%" class="adbg">
		<b>Unordered List :</b><br />
		<font class="adexp">[ul][/ul] (implies [li][/li])</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="bbc_ul"
		<?php echo ($globals['bbc_ul']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
		
		
		<tr>
		<td width="50%" class="adbg">
		<b>Ordered List :</b><br />
		<font class="adexp">[ol][/ol] (implies [li][/li])</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="bbc_ol"
		<?php echo ($globals['bbc_ol']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
		
		<tr>
		<td width="50%" class="adbg">
		<b>Execute HTML :</b><br />
		<font class="adexp">[parseHTML][/parseHTML]<br />
		Executes even JavaScript. Can be used only by user groups having permissions.</font>
		</td>
		<td class="adbg" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="bbc_parseHTML"
		<?php echo ($globals['bbc_parseHTML']) ? 'checked="checked"' : '' ;?> />
		</td>
		</tr>
				
		
	</table>
		
	<br /><br />
	
	<table width="100%" cellpadding="1" cellspacing="1" class="cbor">
		<tr>
		<td align="center" class="adbg">
		<input type="submit" name="editbbcset" value="Submit" />
		</td>
		</tr>
	</table>
	
	</form>
	
	<?php
	
	//Admin footers includes Global footers
	adminfoot();

}//End of function


?>