
<!DOCTYPE html>
<html>
	<head>
	<title></title>
	

					<div id="logo">
						<a href='index.php'>
						<img src='images/recipes.png'></a>
					</div>
<link rel='stylesheet' type='text/css' href='css/main.css'>
</head>
<nav>
	
		

</nav>
<body>
<section id="contact">
<div class="containerC">
<?php

echo "<title>Newsletter</title>";

$form = "


<form action ='newsletter.php' method='post'>
	<label><i><b></i></b></label>
	<br>
	<br>
	<label>Webmaster:</label>
	
	<input type='text' name='webmaster' value='dariuscsc@gmail.com'>

	<label>Subject:</label>
	<input type='text' name='subject' value=''>
	

	<label>Message:</label>
	<textarea name='message' cols='40' rows='6'></textarea>


	<input type='submit' name='sendbtn' class='submit' value='Send'>


</form>

 </div>
  </section>
";


if (isset($_POST["sendbtn"])) {
	$webmaster = strip_tags($_POST['webmaster']);
	$subject = strip_tags($_POST['subject']);
	$message = strip_tags($_POST['message']);

	if($webmaster && $subject && $message) {
		if(strstr($webmaster, "@") && strstr($webmaster, ".")){

			$headers = "From: cookingRecommendation's newsletter<$webmaster>";

			require("connect.php");
			$query = mysql_query("SELECT * FROM newsletter");
			while($row = mysql_fetch_assoc($query)){
				$email = $row['email'];

				mail($email, $subject, $message, $headers);
			}
			echo "Your newsletter has been sent.";
		}
		else
			echo "You did not submit a valid email.";
	}
	else
		echo "You did not fill in the form. $form";
}

else
	echo "$form";
?>

</body>
</html>