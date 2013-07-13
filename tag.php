<?php

function get_url_contents($url){
        $crl = curl_init();
        $timeout = 3;
        curl_setopt ($crl, CURLOPT_URL,$url);
        curl_setopt ($crl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
        $ret = curl_exec($crl);
        curl_close($crl);
        return $ret;
}

//$keyword = $_POST["keyword"];
$keyword = "dfd";
$search_page = get_url_contents("http://www.youtube.com/results?search_query=".$keyword);
//echo $search_page;
$copy_link_start = -20;
for($i=0; $i<10; $i++)
{
	$link_start = strpos(substr($search_page, $copy_link_start+20, strlen($search_page)), '<a href="/watch?v=');
	$copy_link_start = $link_start;
	$link = substr($search_page, $link_start+9, 20);
	echo $link_start;
	echo "----------\n";
	echo $link;
	echo "----------\n";
}

?>
