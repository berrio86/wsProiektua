<?php 

include 'dbkonexioak/dbOpen.php';

if(isset($_GET['ezabatuerabil'])) {
	$eposta = $_GET['ezabatuerabil'];
	$erabiltzaileak = "DELETE FROM ErabiltzaileBerria WHERE Email='$eposta'";
	$emaitza = $db->query($erabiltzaileak); 
}

if(isset($_GET['onartuerabil'])) {
	//alert("onartua");
	$eposta = $_GET['onartuerabil'];
	$izena = $_GET['izena'];
	$pasa = $_GET['pasa'];
	$mota = $_GET['mota'];
	$arg = $_GET['arg'];
	$erabiltzaileak = "DELETE FROM ErabiltzaileBerria WHERE Email='$eposta'";
	$emaitza = $db->query($erabiltzaileak);
	$erabiltzaileak = "INSERT INTO Erabiltzailea VALUES('$eposta','$izena','$pasa','$mota',0,'$arg')";
	$emaitza = $db->query($erabiltzaileak);
	$bilduma_helbidea = "bildumak/".$eposta;
	mkdir($bilduma_helbidea,0777, true);
}
		
$erabiltzaileak = "SELECT * FROM ErabiltzaileBerria";
$emaitza = $db->query($erabiltzaileak); 
echo ('<table>
					<tr>
						<th style="text-align:center"> Izena </th>
						<th style="text-align:center"> Emaila </th>
						<th style="text-align:center"> Argazkia </th>
						<th style="text-align:center"> Ezabatu </th>
						<th style="text-align:center"> Onartu </th>
						
					</tr> ');

while ($lerroa = $emaitza->fetch_array(MYSQLI_BOTH)){
	$eposta = $lerroa['Email'];
	echo ("<tr>");	
		echo ("<td>".$lerroa['Izena']."</td>");
		echo ("<td>".$eposta."</td>");
		echo '<td style="text-align: center;">'.'<img alt="Erabiltzaile honek ez du argazkirik." src="'.$lerroa['Argazkia'].'" width="80" height="80"></td>';
		echo ("<td style='text-align:center'><input type='button' style='width:100%;' value='Ezabatu' onclick='ezabatu(\"".$eposta."\")'></td>");
		echo ("<td style='text-align:center'><input name='onartu' type='button' style='width:100%;' value='Onartu' onclick='onartu(\"".$eposta."\",\"".$lerroa['Izena']."\",\"".$lerroa['Pasahitza']."\",\"".$lerroa['Mota']."\",\"".$lerroa['Argazkia']."\")'></td>");
	echo("</tr>");
}
echo '</table>';
include 'dbkonexioak/dbClose.php';
?>