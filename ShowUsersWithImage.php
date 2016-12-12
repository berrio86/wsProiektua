<?php
	$_GET['orrialdea'] = "showUsers";
	include 'php/orrialdeGoia.php';
	echo('</head>
		<body>');
	include 'php/orrialdeNabigazioa.php';
?>
<section class="main" id="s1">
	<br/><h1>DBko erabiltzaileak kudeatzeko administratzailea</h1>
<div id="taula">
<?php 

		
include 'dbkonexioak/dbOpen.php';


$erabiltzaileak = "SELECT * FROM Erabiltzailea";
$emaitza = $db->query($erabiltzaileak); 
	
echo ('<table>
					<tr>
						<th style="text-align:center"> Izena </th>
						<th style="text-align:center"> Emaila </th>
						<th style="text-align:center"> Argazkia </th>
						<th style="text-align:center"> Ezabatu </th>
						
					</tr> ');

while ($lerroa = $emaitza->fetch_array(MYSQLI_BOTH)){
	echo '<tr>';
	echo '<td>'.$lerroa['Izena'].'</td>';
	echo '<td>'.$lerroa['Email'].'</td>';
	echo '<td style="text-align: center;">'.'<img alt="Erabiltzaile honek ez du argazkirik." src="'.$lerroa['Argazkia'].'" width="80" height="80">'.'</td>';
	if($_SESSION['mota']=="Administratzailea"){
		echo ("<td style='text-align:center'><input type='button' style='width:100%;' value='Ezabatu' onclick='ezabatu(".$lerroa['Email'].")'></td>");
	}
	echo '</tr>';
}
echo '</table>';

include 'dbkonexioak/dbClose.php';

?>
	
</div>
</section>

<?php include 'php/orrialdeOina.php'; ?>