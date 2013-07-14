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

$emotions = array("happy","sad","angry","fear","sarcastic","bored"); 
$page = "<html><body>";
$found = 0;
for ($i=0; $i<count($emotions); $i++)
{
	if(isset($_POST[$emotions[$i].'_x'], $_POST[$emotions[$i].'_y']))
	{
		echo $emotions[$i];
		$happy_url = 'http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20flickr.photos.search%20where%20api_key%3D%22a89911ca06fe7b20fea6393a8a1bb37f%22%20and%20text%3D%22happy%20quotes%22%20and%20sort%3D%22relevance%22%3B&format=json&diagnostics=true&callback=cbfunc';
		$url = str_replace("happy", $emotions[$i], $happy_url);
		$result = get_url_contents($url);
		$json_result = json_decode(substr($result,7,strlen($result)-9), true);
		for($i=0; $i<10; $i++)
		{
			$farm = $json_result['query']['results']['photo'][$i]['farm'];
			$secret = $json_result['query']['results']['photo'][$i]['secret'];
			$id = $json_result['query']['results']['photo'][$i]['id'];
			$server = $json_result['query']['results']['photo'][$i]['server'];
			$img_url = "http://farm".$farm.".staticflickr.com/".$server."/".$id."_".$secret.".jpg";
			$page.='<img src="'.$img_url.'">';
		}
	}
}
$page.='</body></html>';
echo $page;
?>
