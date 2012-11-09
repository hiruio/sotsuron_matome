<?php

function get_author($xml){
	$doc = new DOMDocument();
	$doc->load($xml);
	return $author = $doc->getElementsByTagName('thesis')->item(0)->getAttribute('author');
}

function get_title($xml){
	$doc = new DOMDocument();
	$doc->load($xml);
	return $title = $doc->getElementsByTagName('thesis')->item(0)->getAttribute('title');
}

function create_header($title, $author){
	$head = '<header>';
	$head .= '<h1>' . $title . '</h1>';
	$head .= '<h2>' . $author . '</h2>';
	$head .= '</header>';
	print $head;
}

function create_contents_list($xml){
	$cont = '<ul class="table_of_contents">';
	$xml = new SimpleXMLElement($xml, null, true);
	foreach($xml->contents->c_section as $c_sec){
		$cont .= '<li class="section">' . $c_sec->sec_name . '</li>';
		foreach($c_sec->sub_section as $sub_sec){
			$cont .= '<li class="sub_section">' . $sub_sec . '</li>';
		}
	}
	$cont .= "</ul>";
	
	print $cont;
	
	/* DOM
	$cont_array = array();
	$doc = new DOMDocument();
	$doc->load('model.xml');
	$c_sec = $doc->getElementsByTagName('c_section');
	foreach ($c_sec as $c_sec){
		$current_sec = $c_sec->getAttribute('sec_no');
		$childNodes = $c_sec->childNodes;
		foreach ($childNodes as $childNode){
			if($childNode->nodeName == "sec_name"){
				$content = $childNode->nodeValue;
			}elseif((string)$childNode->parentNode->getAttribute('sec_no') == $current_sec){
				$content = $childNode->nodeValue;
			}
			array_push($cont_array, $content);
		}
	}
	*/

}

function create_body($xml){
	$img = 0;
	$body = "";
	
	$doc = new DOMDocument();
	$doc->load($xml);
	$sec = $doc->getElementsByTagName('sec');
	foreach ($sec as $sec){
		$section_name = (string)$sec->parentNode->childNodes->item(1)->nodeValue;
		$current_sec = $sec->parentNode->parentNode->getAttribute('sec_no');
		if((string)$sec->parentNode->nodeName == "sub_section"){
			$body .= '<div class="section' . $current_sec  . '">' . '<h2 class="sub_section">' . $section_name . '</h2><p>';
		}else{
			$body .= '<div class="section' . $current_sec  . '">' . '<h2>' . $section_name . '</h2><p>';
		}
		$sec = str_replace("\br;", "<br>", $sec->nodeValue);
		$sec = preg_replace("/\\\chart\d+;/", "", $sec); // とりあえず、今は図表を非表示
		$body .= replace_img_tag($doc, $sec, $current_sec);
		$body .= "</p></div>";
	}
	print $body;
}

function replace_img_tag($doc, $sec, $current_sec){
	while(preg_match("/\\\img\d+;/", $sec, $matches)){
		preg_match("/\d+/", $matches[0], $img_num);
		$imgs = $doc->getElementsByTagName('img');
		for($i = 0; $i < $imgs->length; $i++){
			if((string)$imgs->item($i)->getAttribute('sec_no') == $current_sec and (string)$imgs->item($i)->getAttribute('no') == $img_num[0]){
				$img = $imgs->item($i)->getAttribute('src');
			}
		}
		$img_tag = '<img src="' . $img . '">';
		$sec = str_replace($matches[0], $img_tag ,$sec);
		$img = 0;
	}
	return $sec;
}

// ここから下は未使用 //

function mbStringToArray($sStr, $sEnc='UTF-8'){
	$aRes = array();
	while($iLen = mb_strlen($sStr, $sEnc)){
		array_push($aRes, mb_substr($sStr, 0, 1, $sEnc));
		$sStr = mb_substr($sStr, 1, $iLen, $sEnc);
	}
	return $aRes;
}

function serch(){

}

function read(){

	$sxe = new SimpleXMLElement('model.xml', null, true);
	$sxml = $sxe->asXML();
	
	$xml = simplexml_load_file('model.xml');
	//print_r($xml);
	
	foreach($xml->contents->c_section as $c_sec){
		//print $c_sec->sec_name;
		foreach($c_sec->sub_section as $sub_sec){
			//print $sub_sec;
		}
	}
	
	$str_xml = simplexml_load_string($sxml);
	print_r($str_xml);
	foreach($xml->body->b_section as $b_sec){
		//print $b_sec->section->sec_name;
		$sec = (string)$b_sec->section->sec;
		
		foreach($b_sec->sub_section as $sub_sec){
			//print $sub_sec->sec_name;
			//print $sub_sec->sec;
		}
	}
}



function upload(){

}

class make_thesis{
	
	var $xml;
	var $contents_array = array();
	var $body_array = array();
	
	function make_thesis($load_xml){
	}
	
	function get_contents(){

	}
	
	function get_body(){
		
	}
}

?>