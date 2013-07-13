<?php

//$query = $_POST["query"];
$query="awesome";
$con = mysql_connect("localhost","root","mysql123","moody");
$page = "<html>
<head>
<title>Moody</title>
</head>
<body>
<form method=\"post\" align=\"center\" action=\"moody.php\">
<input type=\"text\" id=\"query\">
</form>";
$sql_query = 'SELECT * FROM main WHERE tag="'.$query.'" ORDER BY count DESC';
$result = mysql_query(string($con), $sql_query);
while($row = mysql_fetch_array($result))
{
	$video = '<iframe width="420" height="345"
		src="'.$row['url'].'"></iframe>';
	$page = $page.$video;
}
$page = $page."</body></html>";
mysql_close($con);
Echo $page;
?>
