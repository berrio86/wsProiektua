<?php
if(session_status() == PHP_SESSION_NONE){
	session_start();
}

//bilduma aukeratuta, argazkia aukeratzeko eragiketak
if(isset($_GET['bildumaAukeratua'])){
	$jabea=$_SESSION['eposta'];
	$bilduma=$_GET['bildumaAukeratua'];
	include"dbkonexioak/dbOpen.php";
	$argazkiak = "SELECT * FROM Argazkia WHERE Jabea='$jabea' AND BildumaIzena='$bilduma'";
	
	//$emaitza = mysqli_query($db,$argazkiak);
	
	//if($emaitza = $db->query($argazkiak)){
	if($emaitza = mysqli_query($db,$argazkiak)){
		
		echo "<p> Aukeratu argazkia:</p><br/>";
		echo '<select name="argazkiak" id="argazkiak" onchange="kargatuDatuak(this.value)">';
		echo "<option disabled selected value> -- aukeratu argazkia -- </option>";
		while ($lerroa = $emaitza->fetch_assoc()){
			$helbidea=$lerroa['Helbidea'];
			//echo $lerroa['ArgazkiIzena'];
			echo "<option value='{$lerroa['Helbidea']}'>{$lerroa['ArgazkiIzena']}</option>";
		}
		echo '</select></p><br/><br/>';
	}else{
		echo "Errorea datu basearekin, jarri harremanetan administratzailearekin.";
	}
	
	include "dbkonexioak/dbClose.php";
}

//bilduma eta eragiketak aukeratuta, argazkia kargatzen
/*if(isset($_GET['bilduma']) && isset($_GET['argazkia']) && !isset($_GET['helbidea'])){
	$jabea=$_SESSION['eposta'];
	$bilduma=$_GET['bilduma'];
	$argazkia=$_GET['argazkia'];

	include"dbkonexioak/dbOpen.php";
	$argazkiak = "SELECT * FROM Argazkia WHERE Jabea='$jabea' AND BildumaIzena='$bilduma' AND ArgazkiIzena='$argazkia'";
	
	if($emaitza = mysqli_query($db,$argazkiak)){
		$lerroa = $emaitza->fetch_assoc();
		echo $lerroa['Helbidea'];
	}else{
		echo "Errorea datu basearekin, jarri harremanetan administratzailearekin";
	}
	include "dbkonexioak/dbClose.php";
}*/

//bilduma eta eragiketak aukeratuta, argazkia kargatuta, etiketak kargatzen
/*if(isset($_GET['bilduma']) && isset($_GET['argazkia']) && isset($_GET['helbidea'])){
	$helbidea=$_GET['helbidea'];
	$bilduma=$_GET['bilduma'];
	$argazkia=$_GET['argazkia'];
	include"dbkonexioak/dbOpen.php";
	$etiketak = "SELECT * FROM Etiketa WHERE Helbidea='$helbidea'";
	if($emaitza = mysqli_query($db,$etiketak)){	
		while ($lerroa = $emaitza->fetch_assoc()){
			echo $lerroa['EtiketaIzena'];
			echo ",";
		}	
	}else{
		echo "Errorea datu basearekin, jarri harremanetan administratzailearekin";
	}
	include "dbkonexioak/dbClose.php";
}*/


//dena ezarrita, botoia sakatzean aldaketak gorde, horretarako argazkiak dauzkan etiketa guztiak ezabatu 
//text areako testua hartu eta "," karakterez banatu stringa. Etiketak gorde.
if(isset($_GET['bilduma']) && isset($_GET['argazkia']) && isset($_GET['helbidea']) && isset($_GET['etiketak'])){
	
	echo "ondo";
	
}


?>
