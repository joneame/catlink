<?php

include 'config.php';
include catlink.'link.class.php';

$uri = $db->escape($_REQUEST['uri']);

if (empty($uri))  header("Location: index.php");
else {

$link = new Link;
$link->uri = $uri; 

if ($link->read()) {

if (!stristr($link->link, "http://") && !stristr($link->link, "https://"))
	echo  "URL Error";
else
header ("Location: ".addslashes($link->link));

 } else header("Location: index.php");

}
?>
