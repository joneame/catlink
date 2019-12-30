<?
require_once("xajax_core/xajaxAIO.inc.php");
require_once("config.php");
require_once("libs/link.class.php");

$xajax = new xajax();

function addlink($data) {
	global $db;
	
	$link = new Link;
	
	if (empty($data['hel']) or stristr($data['hel'], "catlink.eu")) $say = "Please check your URL";
	else if ($data['help'] && !preg_match("/^([a-zA-Z0-9._-]+)$/", $data['help']))
		$say = "Incorrect new url. Only can contain this aditional characters: . - and _";
	else {
		$link->link = $db->escape($data['hel']);
		
		if (!empty($data['help']))
			$link->uri = $db->escape($data['help']);
		
		if ($link->store())
			$say = "Your cat link is: <a href=\"http://catlink.eu/".$link->uri."\">http://catlink.eu/".$link->uri."</a>";
		else $say = "Store error. Please try again.";
		
	}
	
	$ret = new xajaxResponse();
	$ret->assign("here","innerHTML", $say);
	return $ret;
}

$xajax->registerFunction("addlink");
$xajax->processRequest();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Catlink :: url shortener</title>
<link href="catstyle.css" rel="stylesheet" type="text/css" />
</head>
<!-- Ajax javascript calls -->
<?php $xajax->printJavascript(); ?>
<body>

<div id="wrapper" style="width: 50%;">


<div id="catlogo">
	<img src="catlink400.png" />
</div> <!-- Our cat -->

<div id="catmenu">
		<a href="index.php">Home</a> - <a href="index.php?cat=api">API</a> -  <a href="index.php?cat=terms">Terms &amp; Conditions of use</a> - <a href="index.php?cat=about">About</a>
</div><!-- Catlink menu -->

<div id="sexycat">
		
        
        <div id="left">
         <?
		 
		 switch ($_GET['cat']) {
		 	case 'terms':
				include "pages/terms.php";
				break;
			case 'api':
				include "pages/api.php";
				break;
			case 'about':
				include "pages/about.php";
				break;
			default:
				include "pages/default.php";
				break;
		}
		
		?>
    </div>

<div id="right">
       Sponsored by<br /><br />
       <a href="http://joneame.net"><img src="joneame.png" /></a><br /> <br />
    </div>
</div><!-- Catlink body -->

<div id="bottom">
<script type="text/javascript"><!--
google_ad_client = "pub-1311304855929413";
/* 728x90, creado 29/01/10 */
google_ad_slot = "2222113434";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>

</div><!-- Mozketa -->

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-12750138-1");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>
