<?

define("catpath", dirname(__FILE__));
define("catlink", dirname(__FILE__).'/libs/');
// ini_set('display_errors','On');

ini_set("include_path", '.:'.catlink.':'.catpath);

$globals['db_server'] = '';
$globals['db_name'] = '';
$globals['db_user'] = '';
$globals['db_password'] = '';
$globals['mysql_persistent'] = false;
$globals['mysql_master_persistent'] = false;
$globals['db_master'] = false;

// Set an utf-8 locale if there is no utf-8 defined
if (!preg_match('/utf-8/i', setlocale(LC_CTYPE, 0)))  {
	setlocale(LC_CTYPE, "en_US.UTF-8");
}


include catlink.'db.php';

// For production servers
//$db->hide_errors();



?>
