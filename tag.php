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
<table>
<col width="100">
<col width="10">
<col width="150">
';
$unique_links=0;
$i=1;
while($unique_links < 10)
{
	$link = "http://youtube.com/embed/".substr($parts[$i],0,11);
	if(substr($parts[$i],13,1) == "c")
	{
		if($unique_links%2 == 0)
		{
			$page.="<tr>";
		}
		$page.='<td><iframe width="420" height="345"
			src="'.$link.'">
			</iframe></td><td style="width:10px"></td><td>
			<form method="post" action="insert_tag.php">
			<input type="hidden" value="'.$link.'" name="linkurl" id="linkurl">
			<input type="checkbox" name="emotion[]" value="happy">Happy</br>
			<input type="checkbox" name="emotion[]" value="sad">Sad</br>
			<input type="checkbox" name="emotion[]" value="angry">Angry</br>
			<input type="checkbox" name="emotion[]" value="depressed">Depressed</br>
			<input type="checkbox" name="emotion[]" value="bored">Bored</br>
			<input type="checkbox" name="emotion[]" value="fear">Fear</br>
			<input type="checkbox" name="emotion[]" value="hatred">Hatred</br>
			<input type="checkbox" name="emotion[]" value="Inspiring">Inspiring</br>
			<input type="submit" value="Add tags">
			</form></td>';
		if($unique_links%2 == 1)
		{
			$page.="</tr>";
		}
		$unique_links ++;
	}
	$i++;
}
$page.="</table></body></html>";
echo $page;

?>
