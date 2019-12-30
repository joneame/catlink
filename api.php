<?php

include 'config.php';
include catlink.'link.class.php';


if (empty($_GET['link']) or stristr($data['hel'], "catlink.eu")) $error = "API Usage error. Please read documentation.";

else {
	$link = new Link;

	if (!empty($_GET['cut']))
		$link->uri = $db->escape($_GET['cut']);
	
	$link->link = $db->escape($_GET['link']);
	$link->ip =  $_SERVER['REMOTE_ADDR'];
	if ($link->store())
		echo "OK: http://catlink.eu/".$link->uri;
	else 
		$error = "Internal Error, try again later.";	

}

if ($error) echo "ERROR: ".$error;

?>
