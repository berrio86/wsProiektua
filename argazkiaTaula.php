<?php 
if(session_status() == PHP_SESSION_NONE){
	session_start();
}
include 'dbkonexioak/dbOpen.php';
$eposta=$_SESSION['eposta'];
$mota=$_SESSION['mota'];

if(isset($_GET['ezabatuArgazkia'])) {
	$helbidea = $_GET['ezabatuArgazkia'];
	$ezabatuArgazkia = "DELETE FROM Argazkia WHERE Helbidea='$helbidea'";
	
	//datu basetik ezabatu
	if(!$db->query($ezabatuArgazkia)){
		echo "Datu basean ezabatzean akatsa";
	} 
	
	//fitxategia ezabatu
	if(!unlink($helbidea)){
		echo "Fitxategia ezabatzean akatsa";
	}
	
}


if($mota=="Administratzailea"){
	$argazkiak = "SELECT * FROM Argazkia";
}else{
	$argazkiak = "SELECT * FROM Argazkia WHERE Jabea='$eposta'";
}

$emaitza = $db->query($argazkiak); 
echo ('<table>
					<tr>
						<th style="text-align:center"> Bilduma Izena </th>
						<th style="text-align:center"> Argazki Izena </th>
						<th style="text-align:center"> Etiketak </th>
						<th style="text-align:center"> Argazkia </th>
						<th style="text-align:center"> Ezabatu </th>	
						
					</tr> ');

while ($lerroa = $emaitza->fetch_array(MYSQLI_BOTH)){
	$arg = unserialize($lerroa['Etiketak']);
	if(!$arg)
		$arg = Array("");
	if((isset($_GET['etiketaInput']) && in_array($_GET['etiketaInput'],$arg)) || (!isset($_GET['etiketaInput']))) {
		//$gakoNagusia=$lerroa['Helbidea'];
		echo '<tr>';
			echo '<td>'.$lerroa['BildumaIzena'].'</td>';
			echo '<td>'.$lerroa['ArgazkiIzena'].'</td>';
			if($lerroa['Etiketak']!=null)
				$arraia = implode(',',unserialize($lerroa['Etiketak']));
			else
				$arraia = "";
			echo '<td>';
			print $arraia;
			echo '</td>';
			echo '<td style="text-align: center;">'.'<img alt="Errorea argazkia atzitzean" src="'.$lerroa['Helbidea'].'" width="80" height="80">'.'</td>';
			echo ("<td style='text-align:center'><input name='onartu' type='button' style='width:100%;' value='Ezabatu' onclick='ezabatu(\"".$lerroa['Helbidea']."\")'></td>");
		echo("</tr>");
	}
}
echo '</table>';
include 'dbkonexioak/dbClose.php';
?>

