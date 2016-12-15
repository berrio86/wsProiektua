<?php
	$_GET['orrialdea'] = "bildumaAukeratu";
	include 'php/orrialdeGoia.php';
	echo('</head>
		<body>');
	include 'php/orrialdeNabigazioa.php';
?>
<section class="main" id="s1">
	<br/><h1>DBko bildumak kudeatzeko administratzailea</h1>
<div id="taula">
<?php 

include 'dbkonexioak/dbOpen.php';
$eposta=$_SESSION['eposta'];
$mota=$_SESSION['mota'];

if($mota=="Administratzailea"){
	$erabiltzaileak = "SELECT * FROM Bilduma";
}else{
	$erabiltzaileak = "SELECT * FROM Bilduma WHERE Jabea='$eposta'";
}

$emaitza = $db->query($erabiltzaileak); 

echo ('<table>
					<tr>
						<th style="text-align:center"> Jabe Posta </th>
						<th style="text-align:center"> Bilduma Izena </th>
						<th style="text-align:center"> Aukeratu </th>
						<th style="text-align:center"> Ezabatu </th>	
						
					</tr> ');

while ($lerroa = $emaitza->fetch_array(MYSQLI_BOTH)){
	echo '<tr>';
	echo '<td>'.$lerroa['Jabea'].'</td>';
	echo '<td>'.$lerroa['Izena'].'</td>';
	echo ("<td style='text-align:center'><input type='button' style='width:100%;' value='Aukeratu' onclick='aukeratu(".$lerroa['Izena'].",".$lerroa['Izena'].")'></td>");
	echo ("<td style='text-align:center'><input type='button' style='width:100%;' value='Ezabatu' onclick='Ezabatu(".$lerroa['Izena'].",".$lerroa['Izena'].")'></td>");
	echo '</tr>';
}
echo '</table>';
include 'dbkonexioak/dbClose.php';

?>
</div>
</section>
<?php include 'php/orrialdeOina.php'; ?>