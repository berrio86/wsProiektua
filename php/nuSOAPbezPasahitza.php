<?php
if (isset($_GET['pasahitza'])&&isset($_GET['kodea'])){
$pass=$_GET['pasahitza'];
$code=$_GET['kodea'];


//nusoap.php klasea gehitzen dugu
require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');

//soapclient mota dun objektua sortzen dugu. http://www.mydomain.com/server.php  erabiliko den SOAP zerbitzua non dagoen zehazten url horrek
//$soapclient = new nusoap_client("http://localhost/myquizz/php/egiaztatuPasahitza.php?wsdl", true);
//$soapclient = new nusoap_client("http://localhost/myquizz/php/egiaztatuPasahitza.php", false);
$soapclient = new nusoap_client('http://igortxete.hol.es/myquiz/egiaztatuPasahitzaZerbitzari.php?wsdl', true);


//Web-Service-n inplementatu dugun funtzioari dei egiten diogu eta itzultzen diguna inprimatzen dugu
//$emaitza= $soapclient->call('pasahitzaKonprobatu',array('pass'=>"$pass",'code'=>"$code"));
//$emaitza= $soapclient->call('pasahitzaKonprobatu',array('pass'=>"$pass",'code'=>"$code"));
$emaitza= $soapclient->call('validatePass',array('pass'=>"$pass",'code'=>"$code"));

	if(strcmp($emaitza,'BAIMENIK GABEKO ERABILTZAILEA')==0){
		echo "Kode zenbakia ez da zuzena, sartu baliozko bat mesedez";
	}
	if(strcmp($emaitza,'BALIOZKOA')==0){
		echo "Pasahitz hori egokia da";
	}
	if(strcmp($emaitza,'BALIOGABEA')==0){
		echo "Pasahitz hori ohizkoa da, aldatu mezedez";
	}
	
/*echo '<h2>Request</h2><pre>'.htmlspecialchars($soapclient->request, ENT_QUOTES).'</pre>';
echo '<h2>Response</h2><pre>'.htmlspecialchars($soapclient->response, ENT_QUOTES).'</pre>';
echo '<h2> Debug </h2>';
echo '<pre>'.htmlspecialchars($soapclient->debug_str, ENT_QUOTES).'</pre>';*/
}
?>