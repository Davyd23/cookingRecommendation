
<?php

$xml = simplexml_load_file("https://sports.yahoo.com/nascar/rss.xml");
echo '<ul>';
foreach($xml->channel->item as $itm){
	$title = $itm->title;
	$link = $itm->link;
	$description = $itm->description;
	$date = $itm->pubDate;
	echo '<li><a href="'.$link.'">'.$title.'</a> <hr> '.$description.' <br>'.$date.' </li>';
}
echo'</ul>';
?>
