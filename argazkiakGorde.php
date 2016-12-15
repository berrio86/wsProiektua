<?php
	$_GET['orrialdea'] = "argazkiakIgo";
	include 'php/orrialdeGoia.php';
?>

<?php	
	echo('</head><body>');
	include 'php/orrialdeNabigazioa.php';
?>
<section class="main" id="s1">
<div>
<?php
if(isset($_POST['bilduma'])){
	include 'dbkonexioak/dbOpen.php';
	$bilduma=$_POST['bilduma'];
	$eposta=$_SESSION['eposta'];
	
	
	if(!empty($_FILES['argazki-fitxategia']['name'])) {
		
		$argazkia_izena = $_FILES["argazki-fitxategia"]["name"];
		$emaitza = mysqli_query($db,"SELECT * FROM Argazkia WHERE BildumaIzena='$bilduma' AND Jabea='$eposta' AND ArgazkiIzena='$argazkia_izena'"); //ikusi ea erabiltzailea existitzen den
		if (mysqli_num_rows($emaitza) > 0) {
			echo "Dagoeneko existitzen da $bilduma bilduma barruan $argazkia_izena argazkia duen erabiltzaile bat. Mesedez, sartu ezazu beste posta-elektroniko helbide bat... </br></br>";
		} else { 
			$argazkia_ruta = $_FILES["argazki-fitxategia"]["tmp_name"];
			$argazkia_helbidea = "bildumak/".$eposta."/".$bilduma."/".$argazkia_izena;
			if(copy($argazkia_ruta,$argazkia_helbidea)){
				echo "$argazkia_izena argazkia ongi igo da $bilduma bildumara. Jadanik atzigarri duzu zure bilduma barruan.<br/>";
				$query="INSERT INTO Argazkia (Helbidea, AtzipenMota, Jabea, BildumaIzena, ArgazkiIzena) VALUES ('$argazkia_helbidea', 'Publikoa', '$eposta','$bilduma','$argazkia_izena')";
				if(mysqli_query($db,$query)){
					echo'Argazkia ondo sartu da datu basean.<br/>'; 
					echo'Jadanik atzigarri duzu zure bilduma barruan.</br>';
				}else{
					echo 'Akatsen bat egon da zure datu basera sartzeko prozesuan.</br>';
					echo 'Mesedez, jar zaitzez administratzailearekin harremanetan.</br>';
				}
			}else{
				echo 'Argazkia igotzean arazoak izan dira, jar zaitez administratzailearekin harremanetan.';
			}
		}
	} else {
		echo 'Ez dago fitxategirik aukeratuta';
	}
	include 'dbkonexioak/dbClose.php';	
}
?>
</div>
</section>

<?php include 'php/orrialdeOina.php'; ?>

		
