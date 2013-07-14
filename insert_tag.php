<?php

$con=mysqli_connect("localhost","root","spaspa","moody");
if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if(!empty($_POST['emotion']))
{
	foreach($_POST['emotion'] as $check)
	{
		$insert_url = str_replace("embed/","watch?v=",$_POST['linkurl']);
		$retrieve_query = "SELECT * FROM main WHERE url=\"".$insert_url."\" AND tag=\"".$check."\"";
		$result = mysqli_query($con, $retrieve_query);
		$zero = 0;
		while($row = mysqli_fetch_array($result))
		{
			$zero = 1;
			//increase count
			$update_query = "UPDATE main SET count=".(string)($row['count']+1)." WHERE url=\"".$insert_url."\"";
			$result = mysqli_query($con, $update_query);
		}
		if($zero == 0)
		{
			//insert record
			$insert_query = "INSERT INTO main VALUES(\"".$insert_url."\",\"".$check."\",1)";
			$result = mysqli_query($con, $insert_query);
		}
	}
}

mysqli_close($con);

header('Location: index.php');
?>
