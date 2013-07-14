<?php
$query = $_POST["query"];
//echo $query;
$con = mysqli_connect("localhost","root","jjlk","moody");
if (mysqli_connect_errno($con))
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sqlquery = "SELECT * FROM main WHERE tag= \"".$query."\" ORDER BY count DESC";
$result = mysqli_query($con,$sqlquery);
Echo "<html>";
Echo "<body>";
while($row = mysqli_fetch_array($result))
{
$row['url'] = str_replace("watch?v=","embed/",$row['url']);
Echo "<iframe width='420' height='345' src=\"".$row['url']."\">
</iframe>";
Echo "</br>";
}
mysqli_close($con);
?>
