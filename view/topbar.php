<!DOCTYPE html>
<!-- Template by html.am -->
	<html>


		<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
				<title>Fixed Width 1 Red</title>
				 <link rel='stylesheet' type='text/css' href='css/main.css'>
				<style type="text/css">
					html, #page { padding:0; margin:0;}
					body { margin:0; padding:0; width:100%; color:#959595; font:normal 12px/2.0em Sans-Serif;} 
					h1, h2, h3, h4, h5, h6 {color:darkred;}
					#page { background:#fff;}
					#header, #footer, #top-nav, #content, #content #contentbar, #content #sidebar { margin:0; padding:0;}
								
					/* Logo */
					#logo { padding:0; width:auto; float:left;}
					#logo h1 a, h1 a:hover { color:darkred; text-decoration:none;}
					#logo h1 span { color:#f8dbdb;}

					/* Header */
					#header { background:#b43838; }
					#header-inner { margin:0 auto; padding:0; width:970px;}
					
					/* Feature */
					.feature { background:red;padding:18px;}
					.feature-inner { margin:auto;width:970px; }
					.feature-inner h1 {color:#f8dbdb;font-size:32px;}
					
					/* Menu */
					#top-nav { margin:0 auto; padding:0px 0 0; height:37px; float:right;}
					#top-nav ul { list-style:none; padding:0; height:37px; float:left;}
					#top-nav ul li { margin:0; padding:0 0 0 8px; float:left;}
					#top-nav ul li a { display:block; margin:0; padding:33px 10px; color:red; text-decoration:none;}
					#top-nav ul li.active a, #top-nav ul li a:hover { color:#f8dbdb;}
					
					/* Content */
					#content-inner { margin:0 auto; padding:10px 0; width:970px;background:#fff;}
					#content #contentbar { margin:0; padding:0; float:right; width:760px;}
					#content #contentbar .article { margin:0 0 24px; padding:0 20px 0 15px; }
					#content #sidebar { padding:0; float:left; width:200px;}
					#content #sidebar .widget { margin:0 0 12px; padding:8px 8px 8px 13px;line-height:1.4em;}
					#content #sidebar .widget h3 a { text-decoration:none;}
					#content #sidebar .widget ul { margin:0; padding:0; list-style:none; color:#959595;}
					#content #sidebar .widget ul li { margin:0;}
					#content #sidebar .widget ul li { padding:4px 0; width:185px;}
					#content #sidebar .widget ul li a { color:red; text-decoration:none; margin-left:-16px; padding:4px 8px 4px 16px;}
					#content #sidebar .widget ul li a:hover { color:#f8dbdb; font-weight:bold; text-decoration:none;}
					
					/* Footerblurb */
					#footerblurb { background:#f8dbdb;color:red;}
					#footerblurb-inner { margin:0 auto; width:922px; padding:24px;}
					#footerblurb .column { margin:0; text-align:justify; float:left;width:250px;padding:0 24px;}
					
					/* Footer */
					#footer { background:#fff;}
					#footer-inner { margin:auto; text-align:center; padding:12px; width:922px;}
					#footer a {color:red;text-decoration:none;}
					
					/* Clear both sides to assist with div alignment  */
					.clr { clear:both; padding:0; margin:0; width:100%; font-size:0px; line-height:0px;}
				</style>
<style>
body
{
	margin:0;
}
.modal
{
	width:100%;
	height:100%;
	position:fixed;
	top:0;
	display:none;
}
.modal_close
{
	width:100%;
	height:100%;
	background:rgba(0,0,0,.8);
	position:fixed;
	top:0;
}
.close
{
	cursor:pointer;
}
.modal_main
{
	width:50%;
	height:400px;
	background:#fff;
	z-index:4;
	position:fixed;
	top:16%;
	border-radius:4px;
	left:24%;
	display:none;
 -webkit-animation-duration: .5s;
    -webkit-animation-delay: .0s;
    -webkit-animation-fill-mode: both;
    -moz-animation-fill-mode: both;
    -o-animation-fill-mode: both;
	    -webkit-backface-visibility: visible!important;
    -webkit-animation-name: fadeInRight;
}

.modal2
{
	width:100%;
	height:100%;
	position:fixed;
	top:0;
	display:none;
}
.modal_close2
{
	width:100%;
	height:100%;
	background:rgba(0,0,0,.8);
	position:fixed;
	top:0;
}
.close2
{
	cursor:pointer;
}
p{
	margin-left: 0.5cm;
}
.modal_main2
{
	width:50%;
	height:400px;
	background:#fff;
	z-index:4;
	position:fixed;
	top:16%;
	border-radius:4px;
	left:24%;
	display:none;
 -webkit-animation-duration: .5s;
    -webkit-animation-delay: .0s;
    -webkit-animation-fill-mode: both;
    -moz-animation-fill-mode: both;
    -o-animation-fill-mode: both;
	    -webkit-backface-visibility: visible!important;
    -webkit-animation-name: fadeInRight;
}

@-webkit-keyframes fadeInRight{0%{opacity:0;-webkit-transform:translateX(20px)}100%{opacity:1;-webkit-transform:translateX(0)}}


</style>
<script>
$(document).ready(function(){
  $(".call_modal").click(function(){
	$(".modal").fadeIn();
	$(".modal_main").show();
	  });
});
$(document).ready(function(){
  $(".close").click(function(){
	$(".modal").fadeOut();
	$(".modal_main").fadeOut();
	  });
});
</script>

<script>
$(document).ready(function(){
  $(".call_modal2").click(function(){
	$(".modal2").fadeIn();
	$(".modal_main").show();
	  });
});
$(document).ready(function(){
  $(".close").click(function(){
	$(".modal2").fadeOut();
	$(".modal_main").fadeOut();
	  });
});
</script>
				
</head>
		
<body>

<div class="modal">
<div class="modal_close close"></div>
<div class="modal_main">

<img src="/cookingRecommendation/images/ex1.png" class="close" style="margin-top:13px;left:96%;position:fixed;">
<Br>
	<br>
						     <li><a href="abc.php">My restrictions</a></li>
						       
                             </li><br><hr>
						     <li>  <a href="abc.php">Delete all my ingredients</a>
                             </li>	
</div>
</div>

<div class="modal2">
<div class="modal_close close"></div>
<div class="modal_main">

<img src="/cookingRecommendation/images/ex1.png" class="close" style="margin-top:13px;left:96%;position:fixed;">
<Br>
<br>
						     <h4> What is cookingRecommendation?</h4>
						     <p>Do you have only few ingredients at home and don’t know what to make?
							<br>
							Supercook is a recipe search engine that finds recipes you can make with the ingredients you currently have at home. 
							</p>
						     <hr>
						     
						     <h4> How do I add my ingredients?</h4>
						     <p>You just select them from the left panel</p>
						     <hr>
						     <h4> How do I delete the ingredients?</h4>
						     <p>When you run out of an ingredient, make sure to delete it from Supercook. This way your recipe results will always be accurate and up to date. 
						     	<Br>
							If you choose the list view, click the red ‘trash’ icon next to any ingredient that you’d like to erase. If you’re on the category view, uncheck any ingredients you want to erase.</p>
						    

</div>
</div>

</body>				 
					

<header id="header">
				<div id="header-inner">	
					<div id="news">
       
					 <?php


$form = "
<a href='javascript:void(0)' id='subscribeForm-cta1'>
<form action = 'add.php' method = 'post'>
    <label> Subscribe to our newsletter:</label>
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

            echo " <span class= 'spanulet'>You have been added to our newsletter.</span>";
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
</div>
					<div id="logo">
						<a href='index.php'>
						<img src='images/recipes.png'></a>
					</div>

					<div id="top-nav">

						<ul>
							<li><a href=''>
								<img src='images/facebook.png'>
							</a></li>
						<li><a href='/cookingRecommendation/log/index.php'>
								<img src='images/login3.png'>
							</a></li>
						<li><a>
								<input type="image" src='images/settings.png' class="call_modal"/>
						</a></li>
							<li><a>
								<input type="image" src='images/info.png' class="call_modal2"/>
							</a></li>
						</ul>

					</div>

					<div class="clr"></div>

				</div>

			</header>


	</html>