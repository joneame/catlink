include 'config.php';
include catlink.'link.class.php';

$uri =$db->escape($_REQUEST['uri']);

$link = new Link;
$link->uri = $uri;
$link->read();
echo $link->url;