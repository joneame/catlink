<?php

include 'config.php';

echo "hola mundo!";
$variable = $db->get_row("SELECT url from links where link_id=1 ");

echo 'lo leido es '.$variable->url;

?>