<?php
include_once(catlink.'ezdb1-simple.php');

global $globals;
$db = new db($globals['db_user'], $globals['db_password'], $globals['db_name'], $globals['db_server'], $globals['db_master']);
// we now do "lazy connection.
$db->persistent = $globals['mysql_persistent'];
$db->master_persistent = $globals['mysql_master_persistent'];

?>
