
<?php

//nusoap.php klasea gehitzen dugu
require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');

$ns="http://localhost/myquizz/php/egiaztatuPasahitza.php"; 

//soap_server motako objektua sortzen dugu
$server = new soap_server;
$server->configureWSDL('pasahitzaKonprobatu',$ns);
$server->wsdl->schemaTargetNamespace=$ns;

//inplementatu nahi dugun funtzioa erregistratzen dugu, funtzio bat baino gehiago erregistra liteke ...
$server->register('pasahitzaKonprobatu',
				  array('pass'=>"xsd:string",'kodea'=>"xsd:int"),
				  array('z'=>"xsd:string"),
				  $ns);

//funtzioa inplementatzen da
function pasahitzaKonprobatu($pass,$kodea){
	if(strpos(file_get_contents("kodeak.txt"),$kodea)!==false){
		return 'BAIMENIK GABEKO ERABILTZAILEA';
	}else{
		if(strpos(file_get_contents("toppasswords.txt"),$pass)!==false){
			return 'BALIOGABEA';
		}else{
			return 'BALIOZKOA';
		}
	}
}

//nusoap klaseko service metodoari dei egiten diogu
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);

?>