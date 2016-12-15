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
	$bildumaIzena= $_POST['bildumaIzena'];
	$eposta=$_SESSION['eposta'];
	$emaitza = mysqli_query($db,"SELECT * FROM Bilduma WHERE Jabea='$eposta' AND Izena='$bildumaIzena'"); //ikusi ea erabiltzailea existitzen den
	if (mysqli_num_rows($emaitza) > 0) {
		//jadanik badago izen hori eta jabe hori duen bilduma bat
		echo "Dagoeneko existitzen da $bildumaIzena bilduma duen erabiltzaile bat $jabea -rentzat. Mesedez, sartu ezazu beste bilduma izen bat. </br></br>";
	} else { //ez dago arazorik, aurrera bilduma sorrerarekin
		//ikusi ea REGEXP pasatzen duen
		$esp_izena= filter_var($bildumaIzena, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/([A-Z]{1}[a-z ]{1,})*/")));
		if(!$esp_izena==false){
			//regexp-a betetzen bada, aurrera
			$bilduma_helbidea = "bildumak/".$eposta."/".$bildumaIzena; //erabiltzaile argazkiei izen berri bat ezarri beren emailaren arabera
			if(mkdir($bilduma_helbidea,0777, true)){
				echo 'Bilduma egoki gorde da, Bildumak ikusi atalean kudeatu ahal izango duzu.</br>';
				$txertaketa = "INSERT INTO Bilduma VALUES('$bildumaIzena','$eposta')";
				if($db->query($txertaketa)){
					echo 'Datu baseko sarrera egoki egin da.';
				}else{
					echo 'Errore bat egon da datu basearekin, jar zaitez administratzailearekin harremanetan, mesedez.';
				} 
				
			}else{
				echo 'Errore bat egon da albuma sortzean, jarri zaitez harremanetan administratzailearekin';
			}
			
			
		}else{
			//ez da izena behar bezala idatzi
			echo 'Mesedez, idatzi ezazu bildumaren izena modu egokian. Lehendabiziko letra, letra larriz eta gainontzekoak xeheez.';
		}
	}	
}
?>
</section>	
<?php include 'php/orrialdeOina.php'; ?>