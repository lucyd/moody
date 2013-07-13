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
$link_start = strpos($search_page,'<a href="/watch?');
echo substr($search_page,$link_start,20);
?>
