<html>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
$(function() {
var tags = ["Happy","Sad","Angry","Depressed","Bored","Fear","Hatred","Inspiring"];
var empty = [];
	$( "#query" ).autocomplete({
		      source: tags,
		      autoFocus: true
		          });
	$( "#keyword" ).autocomplete({
		      source:empty ,
		      autoFocus: true
		          });
	  });
</script>
<body>
<form action="moody.php" method="post" align="center">
<div class="ui-widget">
  <label for="query">Mood: </label>
    <input type="text" name="query" id="query" />
    </div>
<input type="submit" value="Search">
</form>
<form action="tag.php" method="post" align="center">
<div class="ui-widget">
  <label for="query">Keyword: </label>
    <input type="text" id="keyword" name="keyword" />
    </div>
<input type="submit" value="Tag videos">
</form>
</br>
</br>
</br>
</br>
</br>
	<form method="post" action="flickr_img.php" align="center">
		<input type="image" name="happy" height="20%" width="10%" src="./images/happy.jpg">
		<input type="image" name="sad" height="20%" width="10%" src="./images/sad.jpg">
		<input type="image" name="bored" height="20%" width="10%" src="./images/bored.jpg">
		<br/>
		<input type="image" name="angry" height="20%" width="10%" src="./images/angry.jpg">
		<input type="image" name="fear" height="20%" width="10%" src="./images/fear.gif">
		<input type="image" name="sarcastic" height="20%" width="10%" src="./images/sarcastic.jpg">
	</form>


<!-- $happy_url = 'http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20flickr.photos.search%20where%20api_key%3D%22a89911ca06fe7b20fea6393a8a1bb37f%22%20and%20text%3D%22happy%22%20and%20sort%3D%22relevance%22%3B&format=json&diagnostics=true&callback=cbfunc';
$sad_url = str_replace($happy_url -->


</body>
</html>
