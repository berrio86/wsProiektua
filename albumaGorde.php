<?php
	$_GET['orrialdea'] = "enroll";
	include 'php/orrialdeGoia.php';
	echo('</head>
		<body>');
	include 'php/orrialdeNabigazioa.php';
?>
<section class="main" id="s1">
	

<?php 
if(isset($_POST['bildumaIzena'])){
	include 'dbkonexioak/dbOpen.php';
	$izena= $_POST['bildumaIzena'];
	$eposta=$_SESSION['eposta'];
	$emaitza = mysqli_query($db,"SELECT * FROM Bilduma WHERE Jabea='$eposta' AND Izena='$izena'"); //ikusi ea erabiltzailea existitzen den
	if (mysqli_num_rows($emaitza) > 0) {
		//jadanik badago izen hori eta jabe hori duen bilduma bat
		//echo "Dagoeneko existitzen da $eposta duen erabiltzaile bat. Mesedez, sartu ezazu beste posta-elektroniko helbide bat... </br></br>";
	} else { //ez dago arazorik, aurrera bilduma sorrerarekin
		//ikusi ea REGEXP pasatzen duen
		$esp_izena= filter_var($izena, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/([A-Z]{1}[a-z ]{1,})*/")));
		if(!$esp_izena==false){
			//regexp-a betetzen bada, aurrera
		}else{
			//ez da izena behar bezala idatzi
		}
	}	
}
