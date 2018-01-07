
	<?php


$form = "
<a href='javascript:void(0)' id='subscribeForm-cta1'>
<form action = 'add.php' method = 'post'>
	<label> Please provide us an Email for subscribtion:</label>
	<input type = 'text' name = 'email'>
	<input type = 'submit' name = 'submitbtn' value='Submit'>
</form>
</a>
";


if (isset($_POST["submitbtn"])) {
	$email = strip_tags($_POST['email']);

	if($email) {
		if(strstr($email, "@") && strstr($email, ".")){
			require("connect.php");

			mysql_query("INSERT INTO newsletter VALUES('', '$email')");

			echo "<span class= 'spanulet'>You have been added to our newsletter.</span>";
		}
		else
			echo " <a href='add.php'><span class= 'spanulet'>You did not submit a valid email!</span></a>";

	}
	else
		echo " <a href='add.php'><span class= 'spanulet'>You did not submit an email!</span></a>";


}

else 
	echo"$form";

?> 
