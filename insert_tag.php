<?php

$con=mysql_connect("example.com","peter","abc123","my_db");
if (mysql_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysql_connect_error();
}
if(!empty($_POST['emotion']))
{
	foreach($_POST['emotion'] as $check)
	{
		$retrieve_query = "SELECT * FROM main WHERE url=\"".$_POST['linkurl']."\"  tag=\"".$check."\"";
		$result = mysql_query($con, $retrieve_query);
		$zero = 0;
		while($row = mysql_fetch_array($result))
		{
			$zero = 1;
			//increase count
		}
		if($zero == 0)
		{
			//insert record
		}
		echo $zero;
	}
}
//$sql_query='INSERT INTO main VALUES("'.$_POST['linkurl'].'", '.$.' ) ';

mysql_close($con);

?>
