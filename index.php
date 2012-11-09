<?php include "sotsuron_functions.php"; ?>
<html>
<head>
</head>
<body>
<h1>14期生_卒論まとめ</h1>
<a href="http://www.miyazaki-seminar.net/wiki/index.php?%E5%8D%92%E8%AB%96%2014th">マニュアル</a>
<form action="sotsuron_functions.php">
<h2>卒論をさがす</h2>
<input type="text"><input type="submit" value="検索"><br>
<h2>こいつの卒論を読む</h2>
<ul>
<?php
$xmls = scandir('./xml/');
foreach($xmls as $xml){
	if($xml == "." or $xml == ".."){
	}else{
		$xml_file = './xml/' . $xml;
		print '<li><a href="./mirudake.php?xml=' . $xml . '">' . get_author($xml_file) . '</a></li>';
	}
}
?>
</ul>
<h2>俺の卒論をアップロードする</h2>
自分でFTPクライアントを使ってアップロードしてください
</form>
</body>
</html>