<?php 
function formatDate($date){
	return date('F j, Y, g:i a',strtotime($date));
}
function shortenText($text,$chars=450){
	$text=$text." ";
	$text=substr($text,0,$chars);
	$text=substr($text,0,strrpos($text,' '));
	return $text;
}