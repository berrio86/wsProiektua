<?php
if(session_status() == PHP_SESSION_NONE){
	session_start();
}
include"dbkonexioak/dbOpen.php";
if(isset($_GET['helbideax'])) {
	echo "<p>Banatu itzazu sartu nahi dituzun etiketak "," karaktereaz banatuta.</p><br>";
	$helbidea = $_GET['helbideax'];
	$etiketak = "SELECT Etiketak FROM argazkia WHERE Helbidea='$helbidea'";
	if($emaitza = mysqli_query($db,$etiketak)){
		$lerroa = $emaitza->fetch_assoc();	
		echo "<textarea id='textArea' rows='4' cols='50'>";
		if($lerroa['Etiketak']!=null)
			$arraia = implode(',',unserialize($lerroa['Etiketak']));
		else
			$arraia = "";
		print $arraia;
		echo "</textarea>";
	}else{
		echo "<textarea id='textArea' rows='4' cols='50'>Errorea datu basearekin, jarri harremanetan administratzailearekin</textarea>";
	}
}
include "dbkonexioak/dbClose.php";
?>