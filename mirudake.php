<?php 
include "sotsuron_functions.php"; 
$tilt = "";
if(@$_GET["xml"] == "") die("poo");
if(@$_GET["tilt"] == "none") $tilt = "none";
$xml = $_GET["xml"];
?>
<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
<meta http-equiv="content-language" content="ja" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<title><?php print get_title($xml); ?></title>
<?php
print '<link rel="stylesheet" type="text/css" href="./css/mirudake.php?tilt=' . $tilt . '" />';
?>
</head>
<body>
<div id="container">
<?php
create_header(get_title($xml), get_author($xml));
if(!$tilt == "none") print '<a href="' . $_SERVER["REQUEST_URI"] . '&tilt=none">傾けない</a>';
create_contents_list($xml);
create_body($xml);
?>
</div>
</body>
</html>