<?php
header("Content-Type: application/xml; charset=UTF-8");
$items .='<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0">
<channel>
<description>Fizikist - CU Yazılım</description>
<language>tr-tr</language>
';
$filename="http://www.fizikist.com";
 $s2 = iconv("ISO-8859-9","UTF-8//TRANSLIT//IGNORE",$filename );
 function curl($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, Array("User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; tr-TR; rv:1.8.1.15) Gecko/20080623 Firefox/2.0.0.15") ); 
    curl_setopt($ch, CURLOPT_ENCODING, 1);
    return curl_exec($ch);
    curl_close($ch);
}
$site=curl($filename);
$bck=0;
for($i=0;$i<6;$i++){
	$bck=strpos($site,'<div class="item ',$bck);
	if($bck>-1){
$items .= '<fitem>';
$in='<a href="';
$fin='"';
$c=strpos($site,$in,$bck);
$d=strpos($site,$fin,$c+strlen($in));
if( $d>$c){
	$acklama='<![CDATA['. substr($site,$c+strlen($in),$d-$c-strlen($in)).']]>';
}else{
	$acklama='<![CDATA[ --- ]]>';
}
$items .= '<link>'. $acklama . '</link>';

$in='<img src="';
$fin='"';
$c=strpos($site,$in,$d);
$d=strpos($site,$fin,$c+strlen($in));
if( $d>$c){
	$acklama='<![CDATA['. substr($site,$c+strlen($in),$d-$c-strlen($in)).']]>';
}else{
	$acklama='<![CDATA[ --- ]]>';
}
$items .= '<resim>'. $acklama . '</resim>';

$in='<h3>';
$fin='</h3>';
$c=strpos($site,$in,$d);
$d=strpos($site,$fin,$c+strlen($in));
if( $d>$c){
	$acklama='<![CDATA['. substr($site,$c+strlen($in),$d-$c-strlen($in)).']]>';
}else{
	$acklama='<![CDATA[ --- ]]>';
}
$items .= '<baslik>'. $acklama . '</baslik>';


$items .= '</fitem>';
$bck=$bck+1;
	}
}

$bck=0;
for($i=0;$i<6;$i++){
	$bck=strpos($site,'<div class="highlights_item ',$bck);
	if($bck>-1){
$items .= '<item>';
$in='<a href="';
$fin='"';
$c=strpos($site,$in,$bck);
$d=strpos($site,$fin,$c+strlen($in));
if( $d>$c){
	$acklama='<![CDATA['. substr($site,$c+strlen($in),$d-$c-strlen($in)).']]>';
}else{
	$acklama='<![CDATA[ --- ]]>';
}
$items .= '<link>'. $acklama . '</link>';


$in='<img src="';
$fin='"';
$c=strpos($site,$in,$d);
$d=strpos($site,$fin,$c+strlen($in));
if( $d>$c){
	$acklama='<![CDATA['. substr($site,$c+strlen($in),$d-$c-strlen($in)).']]>';
}else{
	$acklama='<![CDATA[ --- ]]>';
}
$items .= '<resim>'. $acklama . '</resim>';

$in='<h3>';
$fin='</h3>';
$c=strpos($site,$in,$d);
$d=strpos($site,$fin,$c+strlen($in));
if( $d>$c){
	$acklama='<![CDATA['. substr($site,$c+strlen($in),$d-$c-strlen($in)).']]>';
}else{
	$acklama='<![CDATA[ --- ]]>';
}
$items .= '<baslik>'. $acklama . '</baslik>';

$in='</i>';
$fin='</div>';
$c=strpos($site,$in,$d);
$d=strpos($site,$fin,$c+strlen($in));
if( $d>$c){
	$acklama='<![CDATA['. substr($site,$c+strlen($in),$d-$c-strlen($in)).']]>';
}else{
	$acklama='<![CDATA[ --- ]]>';
}
$items .= '<date>'. $acklama . '</date>';

$items .= '</item>';
$bck=$bck+1;
	}
}
for($i=0;$i<6;$i++){
	$bck=strpos($site,'<div class="page_list_column ',$bck);
	if($bck>-1){
$items .= '<item>';
$in='<a href="';
$fin='"';
$c=strpos($site,$in,$bck);
$d=strpos($site,$fin,$c+strlen($in));
if( $d>$c){
	$acklama='<![CDATA['. substr($site,$c+strlen($in),$d-$c-strlen($in)).']]>';
}else{
	$acklama='<![CDATA[ --- ]]>';
}
$items .= '<link>'. $acklama . '</link>';


$in='src="';
$fin='"';
$c=strpos($site,$in,$d);
$d=strpos($site,$fin,$c+strlen($in));
if( $d>$c){
	$acklama='<![CDATA['. substr($site,$c+strlen($in),$d-$c-strlen($in)).']]>';
}else{
	$acklama='<![CDATA[ --- ]]>';
}
$items .= '<resim>'. $acklama . '</resim>';

$in='<h2>';
$fin='</h2>';
$c=strpos($site,$in,$d);
$d=strpos($site,$fin,$c+strlen($in));
if( $d>$c){
	$acklama='<![CDATA['. substr($site,$c+strlen($in),$d-$c-strlen($in)).']]>';
}else{
	$acklama='<![CDATA[ --- ]]>';
}
$items .= '<baslik>'. $acklama . '</baslik>';

$in='</i>';
$fin='</div>';
$c=strpos($site,$in,$d);
$d=strpos($site,$fin,$c+strlen($in));
if( $d>$c){
	$acklama='<![CDATA['. substr($site,$c+strlen($in),$d-$c-strlen($in)).']]>';
}else{
	$acklama='<![CDATA[ --- ]]>';
}
$items .= '<date>'. $acklama . '</date>';

$items .= '</item>';
$bck=$bck+1;
	}
}
 $items .= '</channel>
</rss>';
 echo $items;
?>
