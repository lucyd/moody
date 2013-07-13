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
	$link = "http://youtube.com/embed/".substr($parts[$i],0,11);
	
	$page.='<iframe width="420" height="345"
		src="'.$link.'">
		</iframe>
		<form method="post" action="insert_tag.php">
		<input type="hidden" value="'.$link.'" name="linkurl" id="linkurl">
		Happy<input type="checkbox" name="emotion[]" value="happy">
		Sad<input type="checkbox" name="emotion[]" value="sad">
		Frustrated<input type="checkbox"  name="emotion[]" value="frustrated">
		Depressed<input type="checkbox"  name="emotion[]"  value="depressed">
		<input type="submit" value="Add tag">
		</form>
		</br></br>';
		
}
$page.="</body></html>";
echo $page;

?>
