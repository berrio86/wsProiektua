<?php

	session_start();
	//ikus ea sesio bat hasi den eta ez bada hala guest ezarri
	if((isset($_SESSION['eposta']) && !empty($_SESSION['eposta'])) && (isset($_SESSION['mota']) && !empty($_SESSION['mota']))) {
   		null;
	} else {
		$_SESSION['eposta'] = "Erabiltzaile Anonimoa";
		$_SESSION['mota'] = "GUEST";
	}
	if($_SESSION['mota']=="GUEST") { //irakasleek soilik dute sarrera honera
		if($_GET['orrialdea']=="enroll" || $_GET['orrialdea']=="argazkiakIgo" || $_GET['orrialdea']=="argazkiakKudeatu" || $_GET['orrialdea']=="bildumaAukeratu" || $_GET['orrialdea']=="eskaerakKudeatu" || $_GET['orrialdea']=="etiketakKudeatu" || $_GET['orrialdea']=="showUsers" || $_GET['orrialdea']=="albumaSortu" || $_GET['orrialdea']=="argazkiakIgo") {
			header("Location:index.php");
		}
	}
	if($_SESSION['mota']=="Bazkidea") { //irakasleek soilik dute sarrera honera
		if($_GET['orrialdea']=="eskaerakKudeatu") {
			header("Location:index.php");
		}
	}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Argazki bilduma</title>
	<link rel="icon" type="image/png" href="irudiak/question-logo.png">
    <link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' media='only screen and (min-width: 767px) and (min-device-width: 696px)' href='css/wide.css' />
	<!-- goiko erlazioa 1 = 1.101871101871102 -->
	<link rel='stylesheet' type='text/css' media='only screen and (max-width: 766px)' href='css/smartphone.css' />

  <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
