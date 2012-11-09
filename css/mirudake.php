<?php
header('Content-type: text/css');
?>

body{
margin: 0px;
padding: 0px;
font-size: 15px;
}

#container{
margin: auto;
width: 950px;
-o-transform: rotate(-5deg);
-webkit-transform: rotate(-5deg);
-moz-transform: rotate(-5deg);
}
<?php
if(@$_GET["tilt"] == "none"){
print '#container{margin: auto;width: 950px;-o-transform: rotate(0deg);-webkit-transform: rotate(0deg);-moz-transform: rotate(0deg);}';
}
?>
#container header{
background: lightgray;
}

#container header h1{
font-size: 50px;
}

#container header h2{
font-size: 30px;
text-align: right;
margin: 0px;
}

#container .table_of_contents li{
list-style: none;
}

#container .table_of_contents .section{
font-size: 20px;
font-weight: bold;
}

#container .table_of_contents .sub_section{
font-size: 16px;
padding-left: 20px;
}

#container h2{
background: #d3cfd9;
font-size: 30px;
}

#container .sub_section{
background: white;
font-size: 25px;
padding-left: 30px;
}

#container  div p{
display: block;
width: 950px;
}

#container  div p img{
display: block;
margin: auto;
}