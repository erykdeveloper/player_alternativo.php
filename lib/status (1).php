<?php

@$host = '167.114.53.24';
@$port = '9982';
@$ch = curl_init();
@curl_setopt($ch, CURLOPT_URL, "http://".$host.":".$port."/index.html");
@curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla of Habblet Corp");
@curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
@curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
$data = @curl_exec($ch);
$locutor = @explode("<font class=default>Stream Title: </font></td><td><font class=default><b>", $data);
$locutor = @explode("</b></td></tr>", $locutor[1]);
$locutor = @strip_tags(addslashes(utf8_encode($locutor[0])));
if($locutor == ''){
	$locutor = 'Rádio Offline';
}
$programa = @explode("<font class=default>Stream Genre: </font></td><td><font class=default>", $data);
$programa = @explode("<b>", $programa[1]);
$programa = @explode("</b></td></tr>", $programa[1]);
$programa = @strip_tags(addslashes(utf8_encode($programa[0])));
if($programa == ''){
	$programa = 'Rádio Offline';
}
$musica = @explode("<font class=default>Current Song: </font></td><td><font class=default><b>", $data);
$musica = @explode("</b></td></tr>", $musica[1]);
$musica = @strip_tags(addslashes(utf8_encode($musica[0])));
if($musica == ''){
	$musica = 'Rádio Offline';
}
$unicos = @explode("<b>Stream is up at ", $data);
$unicos = @explode("(", $unicos[1]);
$unicos = @explode(" unique)", $unicos[1]);
$unicos = $unicos[0];
if($unicos < 10){
	$unicos = "0".$unicos;
}
if($locutor == 'Rádio Offline'){
	$avatar = 'AutoRubi';
}else{
	$avatar = trim($locutor);
}
if($locutor == 'Rádio Offline'){
	$quarto = 'Rádio Offline';
	$quarto_id = 'Null';
}
@curl_close($ch);

if($_SERVER['REQUEST_METHOD'] == 'GET' AND $_SERVER['QUERY_STRING'] == 'ver=locutor'){

    echo $locutor;
  
  }elseif($_SERVER['REQUEST_METHOD'] == 'GET' AND $_SERVER['QUERY_STRING'] == 'ver=programa'){
  echo $programa;

  }elseif($_SERVER['REQUEST_METHOD'] == 'GET' AND $_SERVER['QUERY_STRING'] == 'ver=unicos'){
      echo $unicos;
  }
?>