<?php

//////////////////////////////////////////////////////////////
//===========================================================
// bbc_functions.php(functions)
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

//This function will take care to format the text only.
function normal_bbc($text){

global $globals;
	
	if(!$globals['parsebbc']){
	
		return $text;
	
	}
	
	//Put the rule
	if($globals['bbc_hr']){
	
		$text = preg_replace("/\[hr\]/i", '<hr />', $text);
	
	}

		
	//Bold it out
	if($globals['bbc_b']){
	
		$text = preg_replace("/\[b\](.*?)\[\/b\]/is", '<b>$1</b>', $text);
	
	}
	
	//Italize
	if($globals['bbc_i']){
	
		$text = preg_replace("/\[i\](.*?)\[\/i\]/is", '<i>$1</i>', $text);
	
	}
	
	//Underline it dude
	if($globals['bbc_u']){
	
		$text = preg_replace("/\[u\](.*?)\[\/u\]/is", '<u>$1</u>', $text);
	
	}
	
	//Its going to strike you
	if($globals['bbc_s']){
	
		$text = preg_replace("/\[s\](.*?)\[\/s\]/is", '<s>$1</s>', $text);
	
	}
	
	//Left Align
	if($globals['bbc_left']){
	
		$text = preg_replace("/\[left\](.*?)\[\/left\]/is", '<div style="text-align: left;">$1</div>', $text);
	
	}
	
	//Center Align
	if($globals['bbc_center']){
	
		$text = preg_replace("/\[center\](.*?)\[\/center\]/is", '<div style="text-align: center;">$1</div>', $text);
	
	}
	
	//Right Align
	if($globals['bbc_right']){
	
		$text = preg_replace("/\[right\](.*?)\[\/right\]/is", '<div style="text-align: right;">$1</div>', $text);
	
	}
	
	//Text size
	if($globals['bbc_size']){
	
		$text = preg_replace("/\[size=([1-7])\](.*?)\[\/size\]/is", '<font size=$1 style="line-height:normal">$2</font>', $text);
	
	}
	
	//Font Face
	if($globals['bbc_font']){
	
		$text = preg_replace("/\[font=(verdana|arial|Arial Black|Arial Narrow|helvetica|sans-serif|Times New Roman|Times|serif|courier new|Courier|monospace|geneva|georgia|Tahoma).*?\](.*?)\[\/font\]/is", '<font style="font-family:$1">$2</font>', $text);
	
	}
	
	//Supersrcipt
	if($globals['bbc_sup']){
	
		$text = preg_replace("/\[sup\](.*?)\[\/sup\]/is", '<sup>$1</sup>', $text);
	
	}
	
	//Subsrcipt
	if($globals['bbc_sub']){
	
		$text = preg_replace("/\[sub\](.*?)\[\/sub\]/is", '<sub>$1</sub>', $text);
	
	}
	
	//Color the text
	if($globals['bbc_color']){
	
		$text = preg_replace("/\[color=(\#.{6})\](.*?)\[\/color\]/is", '<font style="color: $1">$2</font>', $text);
	
	}
	
	return $text;

}


function special_bbc($text, $allow_html=0){

global $globals, $user, $theme, $logged_in;
	
	if(!$globals['parsebbc']){
	
		return $text;
	
	}
	
	//Anchor Links
	if($globals['bbc_url']){
	
		$text = preg_replace(
					array("/\[url=(.*?)\](.*?)\[\/url\]/ies",
							"/\[url\](.*?)\[\/url\]/ies"),
					array('check_url("$1", "$2")',
							'check_url("$1", "$1")'), $text);
	
	}
							
	//FTP Links
	if($globals['bbc_ftp']){
	
		$text = preg_replace(
					array("/\[ftp=(.*?)\](.*?)\[\/ftp\]/ies",
							"/\[ftp\](.*?)\[\/ftp\]/ies"),
					array('check_ftp("$1", "$2")',
							'check_ftp("$1", "$1")'), $text);
	
	}
	
	//Email Links
	if($globals['bbc_email']){
	
		$text = preg_replace(
					array("/\[email=(.*?)\](.*?)\[\/email\]/ies",
							"/\[email\](.*?)\[\/email\]/ies"),
					array('check_email("$1", "$2")',
							'check_email("$1", "$1")'), $text);
	
	}
	
	
	
	//Code Block
	if($globals['bbc_code']){
	
		$text = preg_replace("/\[code\](.*?)\[\/code\]/is", 
		'<div class="codeblock"><div class="codehead">Code</div><div class="code">$1</div></div>', $text);
		
	}

	
	//PHP Block
	if($globals['bbc_php']){
	
		if(function_exists('highlight_string')){
			
			$text = preg_replace("/\[php\](.*?)\[\/php\]/ies", 
				"xhtmlHighlightString('\\1', true)", $text);
		
		}else{	
			
			$text = preg_replace("/\[php\](.*?)\[\/php\]/is", 
			'<div class="codeblock"><div class="codehead">PHP Code</div><div class="code">$1</div></div>', $text);
						
		}
	
	}
	
	
	//Quote text
	if($globals['bbc_quote']){
	
		$text = preg_replace("/(\[quote(.*?)?\](.*)\[\/quote\])/ies", 
		"check_quote('$1')", $text);
		
	}
	
	
	if($logged_in){
	
		if($user['showimgs'] == 1){
		
			$showimgs = 1;
		
		}elseif($user['showimgs'] == 2){
		
			$showimgs = 0;
		
		}elseif($user['showimgs'] == 0){
		
			$showimgs = $globals['showimgs'];
		
		}
	
	}else{
	
		$showimgs = $globals['showimgs'];
	
	}
							
	//Images - Does the user want to see ?
	if($globals['bbc_img'] && $showimgs){
	
		$text = preg_replace(
					array("/\[img\](.*?)\[\/img\]/ie",
							"/\[img=([0-9]+),([0-9]+)\](.*?)\[\/img\]/ie"),
					array("check_image('$1')",
							"check_image('$3', '$1', '$2')"), $text);
		
	}else{
	
		$text = preg_replace(
					array("/\[img\](.*?)\[\/img\]/i",
							"/\[img=([0-9]+),([0-9]+)\](.*?)\[\/img\]/i"),
					array('Image : $1',
							'Image : $3'), $text);
									
	}
	
	
	//Flash
	if($globals['bbc_flash']){
		
		//Whether to embed or not
		if($globals['embedflashinpost']){
		
			$text = preg_replace("/\[flash=([0-9]+),([0-9]+)\](.*?)\[\/flash\]/ie",
			"check_flash('$3', '$1', '$2')", $text);
		
		}else{
			
			$text = preg_replace("/\[flash=([0-9]+),([0-9]+)\](.*?)\[\/flash\]/i", 'Flash: $3', $text);
			
		}
	
	}else{
		
		$text = preg_replace("/\[flash=([0-9]+),([0-9]+)\](.*?)\[\/flash\]/i", 'Flash: $3', $text);
		
	}
	
	
	//Unordered Lists
	if($globals['bbc_ul']){
	
		$text = preg_replace("/(\[ul(.*?)?\](.*)\[\/ul\])/ies", 
		"check_ul('$1')", $text);
		
	}
	
	
	//Ordered Lists
	if($globals['bbc_ol']){
	
		$text = preg_replace("/(\[ol(.*?)?\](.*)\[\/ol\])/ies", 
		"check_ol('$1')", $text);
		
	}
	
	
	//Parse HTML
	if($globals['bbc_parseHTML'] && $allow_html){
	
		$text = preg_replace("/(\[parseHTML\](.*)\[\/parseHTML\])/ies", 
		"parse_html('$2')", $text);
		
	}
	
	
	//Autolinks
	if($globals['autolink']){
	$text = preg_replace("#(<a\s[^>]+>http://[^\s]+</a>)|(<[^>]+http://[^>]+>)|http://[^\s]+#ie",
                  '"$0"=="$1" || "$0"=="$2" ? "$0" : "<a href=\"$0\" target=\"_blank\">$0</a>"',
                  $text);
	}
	
		
	return $text;
	
}


function check_image($img, $width = 0, $height = 0){

global $globals;

	$img = trim($img);

	if(empty($img)){
	
		return 'Image: '.$img;
	
	}
	
	
	//////////////////////////////
	// Are dynamic images allowed
	//////////////////////////////
	
	if(!$globals['allowdynimg']){
	
		if(preg_match("/(&|;)/i", $img)){
		
			return 'Image: '.$img;
		
		}
		
		if (preg_match("/javascript(\:|\s)/i", $img)){
		
			return 'Image: '.$img;
					
		}
	
	}
	
	
	if(!empty($width) && $globals['maximgwidthpost']){
	
		if($width > $globals['maximgwidthpost']){
		
			$width = $globals['maximgwidthpost'];
		
		}
	
	}
	
	
	if(!empty($height) && $globals['maximgheightpost']){
	
		if($height > $globals['maximgheightpost']){
		
			$height = $globals['maximgheightpost'];
		
		}
	
	}
	
	return '<img src="'.$img.'" '.(empty($width) ? '' : 'width="'.$width.'"').' '.(empty($height) ? '' : 'height="'.$height.'"').' alt="Board Image" />';

}


function check_flash($flash, $width = 0, $height = 0){

global $globals;

	$flash = trim($flash);

	if(empty($flash)){
	
		return 'Flash: '.$flash;
	
	}
		
	
	if(!empty($width) && $globals['maxflashwidthinpost']){
	
		if($width > $globals['maxflashwidthinpost']){
		
			$width = $globals['maxflashwidthinpost'];
		
		}
	
	}
	
	
	if(!empty($height) && $globals['maxflashheightinpost']){
	
		if($height > $globals['maxflashheightinpost']){
		
			$height = $globals['maxflashheightinpost'];
		
		}
	
	}
	
	return '<embed src="'.$flash.'" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" '.(empty($width) ? '' : 'width="'.$width.'"').' '.(empty($height) ? '' : 'height="'.$height.'"').' ></embed>';

}


function check_quote($quote){

global $globals, $quote_opened, $quote_closed;
	
	$quote_opened = 0;
	
	$quote_closed = 0;
	
	$quotetext = $quote;
	
	//Open the quotes
	$quotetext = preg_replace("/\[quote(.*?)?\]/ies", "parse_quote('$1')", $quotetext);
	
	//Close the tags
	$quotetext = preg_replace("/\[\/quote\]/ies", "close_quote()", $quotetext);
	
	if($quote_opened == $quote_closed){
			
		return $quotetext;
	
	}else{
	
		return $quote;
		
	}
	
}


function parse_quote($param = ''){

global $globals, $quote_opened, $quote_closed;

	$poster = '';
	
	$date = 0;
	
	$post = 0;
	
	if(!empty($param)){
		
		//Is there any poster
		if(preg_match("/\s{1}poster=(.*?)\s{1}/ies", $param, $matches)){
			
			$poster = $matches[1];
		
		}
		
		//What about the date ?
		if(preg_match("/\s{1}date=(\d{10})/ies", $param, $matches)){
			
			$date = $matches[1];
		
		}
		
		//The Post ID
		if(preg_match("/\s{1}post=(\d{1,8})/ies", $param, $matches)){
			
			$post = $matches[1];	
		
		}
	
	}
	
	$quote_opened++;
	
	return '<div class="quoteblock"><div class="quotehead">Quote '.(!empty($poster) ? 'From : '.$poster:'').''.(!empty($post) ? ' Post:'.$post:'').''.(!empty($date) ? ' '.datify($date):'').'</div><div class="quote">';
	
}


function close_quote(){

global $globals, $quote_opened, $quote_closed;

	$quote_closed++;
	
	return '</div></div>';

}


function check_ul($ul){

global $globals, $ul_opened, $ul_closed;
	
	$ul_opened = 0;
	
	$ul_closed = 0;
	
	$ultext = $ul;
	
	$ultext = str_replace("\n", "", $ultext);
	
	$ultext = preg_replace('/\[li\]/i', '<li>', $ultext);
	
	$ultext = preg_replace('/\[\/li\]/i', '</li>', $ultext);
	
	//Open the quotes
	$ultext = preg_replace("/\[ul(.*?)?\]/ies", "parse_ul('$1')", $ultext);
	
	//Close the tags
	$ultext = preg_replace("/\[\/ul\]/ies", "close_ul()", $ultext);
	
	if($ul_opened == $ul_closed){
			
		return $ultext;
	
	}else{
	
		return $ul;
		
	}
	
}


function parse_ul($param = ''){

global $globals, $ul_opened, $ul_closed;
	
	$type = '';
	
	$param = trim($param);
	
	if(!empty($param)){
		
		//Is there any type circle, disc, square 
		if(preg_match("/\=(circle|disc|square)/is", $param, $matches)){
			
			$type = $matches[1];
		
		}
	
	}
	
	$ul_opened++;
	
	return '<ul'.(!empty($type) ? ' type='.$type:'').' >';
	
}


function close_ul(){

global $globals, $ul_opened, $ul_closed;

	$ul_closed++;
	
	return '</ul>';

}


function check_ol($ol){

global $globals, $ol_opened, $ol_closed;
	
	$ol_opened = 0;
	
	$ol_closed = 0;
	
	$oltext = $ol;
	
	$oltext = str_replace("\n", "", $oltext);
	
	$oltext = preg_replace('/\[li\]/i', '<li>', $oltext);
	
	$oltext = preg_replace('/\[\/li\]/i', '</li>', $oltext);
	
	//Open the quotes
	$oltext = preg_replace("/\[ol(.*?)?\]/ies", "parse_ol('$1')", $oltext);
	
	//Close the tags
	$oltext = preg_replace("/\[\/ol\]/ies", "close_ol()", $oltext);
	
	if($ol_opened == $ol_closed){
			
		return $oltext;
	
	}else{
	
		return $ol;
		
	}
	
}


function parse_ol($param = ''){

global $globals, $ol_opened, $ol_closed;
	
	$type = '';
	
	$param = trim($param);
	
	if(!empty($param)){
		
		//Is there any type circle, disc, square 
		if(preg_match("/\=(\w{1}?)/is", $param, $matches)){
			
			$type = $matches[1];
		
		}
	
	}
	
	$ol_opened++;
	
	return '<ol'.(!empty($type) ? ' type='.$type:'').' >';
	
}


function check_url($href, $name){
	
	$href = preg_replace("/javascript:/i", "javascript-aef&#58; ", $href);
	
	return '<a href="'.$href.'" target="_blank">'.$name.'</a>';

}


function check_ftp($href, $name){
	
	$href = preg_replace("/javascript:/i", "javascript-aef&#58; ", $href);
	
	return '<a href="'.$href.'" target="_blank">'.$name.'</a>';

}


function check_email($href, $name){
	
	$href = preg_replace("/javascript:/i", "javascript-aef&#58; ", $href);
	
	return '<a href="mailto:'.$href.'" target="_blank">'.$name.'</a>';

}


function close_ol(){

global $globals, $ol_opened, $ol_closed;

	$ol_closed++;
	
	return '</ol>';

}


function parse_html($html){

global $globals;

	$html = str_replace("\n", "", $html);
	
	$html = unhtmlentities($html);
	
	return $html;

}



function censor_words($text){

global $globals;

	$from = explode('|', $globals['censor_words_from']);
	
	$to = explode('|', $globals['censor_words_to']);
	
	$from_r = array();//Reg exp array
	
	$to_r = array();//Reg exp array
	
	//Clean one thing up
	foreach($from as $fk => $fv){
	
		$from[$fk] = str_replace('&bar;', '|', $from[$fk]);
		
		$to[$fk] = str_replace('&bar;', '|', $to[$fk]);
		
		$from_r[] = '/'.preg_quote($from[$fk], '/').'/'.($globals['censor_words_case'] ? '' : 'i' );
		
		$to_r[] = $to[$fk];
	
	}
	
	$text = preg_replace($from_r, $to_r, $text);
	
	return $text;

}


?>