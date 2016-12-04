<?php
	$_GET['orrialdea'] = "enroll";
	include 'php/orrialdeGoia.php';
	echo('</head>
		<body>');
	include 'php/orrialdeNabigazioa.php';
?>

<?php 
	include 'dbkonexioak/dbOpen.php';
		
	echo '<section class="main" id="s1">';

	if($_SERVER['REQUEST_METHOD'] == 'GET')  { //get eskaera landu
		null;
	} else { //post eskaera landu
		$izena= $_POST['izen-abizenak'];
		$mota = "Bazkidea";
		$eposta= $_POST['eposta-helbidea'];
		$pass= $_POST['pasahitza'];
		
		

		$emaitza = mysqli_query($db,"SELECT * FROM Erabiltzailea WHERE Email='$eposta'"); //ikusi ea erabiltzailea existitzen den
		if (mysqli_num_rows($emaitza) > 0) {
			echo "Dagoeneko existitzen da $eposta duen erabiltzaile bat. Mesedez, sartu ezazu beste posta-elektroniko helbide bat... </br></br>";
		} else { //ez da erabiltzailerik aurkitu email horrekin

			//ikusi ea REGEXP pasatzen duen
			$esp_izena= filter_var($izena, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/([A-Z]{1}[a-z ]{1,})*/")));
			$esp_mota = filter_var($mota, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^(GUEST|Bazkidea|Administratzailea)$/")));
			$esp_eposta= filter_var($eposta, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-z]+[0-9]{3}@ikasle\.ehu\.eu?s$/"))); //aurrekoa ^[a-zA-Z]{1,}+[0-9]{3}@ikasle.ehu.(eus|es)$
			$esp_pass= filter_var($pass, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/.{6,}$/")));
			
		
			if((!$esp_izena==false) && (!$esp_mota==false) && (!$esp_eposta==false) && (!$esp_pass==false)) {

				if(!empty($_FILES['argazki-fitxategia']['name'])) {
					//argazkia /irudiak karpetan gordetzen
					$izenaPosta = $eposta;
					$izenaPosta = str_replace(".", "", $izenaPosta);
					$izenaPosta = str_replace("@", "", $izenaPosta);
					$argazkia_izena = $_FILES["argazki-fitxategia"]["name"];
					$argazkia_ruta = $_FILES["argazki-fitxategia"]["tmp_name"];
					$argazkia_helbidea = "erabiltzaileIrudiak/".$izenaPosta; //erabiltzaile argazkiei izen berri bat ezarri beren emailaren arabera
					copy($argazkia_ruta,$argazkia_helbidea);
				} else {
					$argazkia_helbidea = "irudiak/user-icon.png";
					$argazkia_izena = null;
				}

				echo "Kaixo $izena, hurrengo datuak gordeko dira datubasean:</br></br>
				Izena: $izena </br>
				Eposta: $eposta</br>
				Pasahitza: $pass </br>";
				

				if(!$argazkia_izena == null)
					echo "Argazkia: $argazkia_izena </br>";
				else
					echo "Ez duzu argazkirik igo, ez zaizu argazkirik gordeko datubasean.</br>";
			
				//tauletan datuak gordetzea
				$query="INSERT INTO ErabiltzaileBerria (Izena, Mota, Email, Pasahitza, Argazkia, kontagailua) VALUES ('$izena', '$mota', '$eposta','$pass','$argazkia_helbidea',0)";
				if(mysqli_query($db,$query)){
					echo'Zure eskaria egoki burutu da.</br>'; 
					echo'Administratzaileak ahalik eta azkarren onartu edo ukatuko du zure eskaria.</br>';
				}else{
					echo 'Akatsen bat egon da zure eskaera prozesuan.</br>':
					echo 'Mesedez, jar zaitzez administratzailearekin harremanetan.</br>';
				}
				
			} else {
				echo "Datuak jasotzean errorea(k):</br>";
				if($esp_izena==false)
					echo "- Izena letra larriz hasi behar da eta ondoren letra xehez jarraitu. </br>"; 
				if($esp_mota==false)
					echo "- Erabiltzaile mota okerra. Kontaktatu administratzailea.</br>";
				if($esp_eposta==false)
					echo "- Posta-elektronikoa izena000@ikasle.ehu.eus motakoa izan behar da (unibertsitatekoa).</br>";
				if($esp_pass==false)
					echo "Pasahitzak gutxienez 6 letrako luzeera izan behar du.</br>";
				if($esp_tel==false)
					echo "- Telefono zenbakiak soilik 9 digitu izan ditzazte.</br>";
				echo "Jasotako datuak ez dira zuzenak. Mesedez, saiatu berriro beranduago... </br></br>";
			}
		}
		
	}
	echo'</section>';
	include 'dbkonexioak/dbClose.php';
?>
<?php include 'php/orrialdeOina.php'; ?>