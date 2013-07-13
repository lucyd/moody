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

$keyword = $_POST["keyword"];
$search_page = get_url_contents("http://www.youtube.com/results?search_query=".$keyword);
$parts = explode('<a href="/watch?v=', $search_page);
$page = '<html>
<head>
<title>Moody</title>
</head>
<body>
';
for($i=1; $i<11; $i++)
{
	$link = "http://youtube.com/embed/".substr($parts[$i],0,11)."\n";
	$page.='<iframe width="420" height="345"
		src="'.$link.'">
		</iframe>';
}
$page.="</body></html>";
echo $page;

?>
