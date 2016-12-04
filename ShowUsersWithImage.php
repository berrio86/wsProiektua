<?php
	$_GET['orrialdea'] = "showUsers";
	include 'php/orrialdeGoia.php';
	echo('</head>
		<body>');
	include 'php/orrialdeNabigazioa.php';
?>

<?php 
echo'<section class="main" id="s1">';
		
include 'dbkonexioak/dbOpen.php';


$erabiltzaileak = "SELECT * FROM Erabiltzailea";
$emaitza = $db->query($erabiltzaileak); 
echo '<table border=2><tr><th> IZEN-ABIZENAK </th><th> POSTA </th><th> IRUDIA </th>';

while ($lerroa = $emaitza->fetch_array(MYSQLI_BOTH)){
	echo '<tr><td>'.$lerroa['Izena'].'</td><td>'.$lerroa['Email'].'</td><td style="text-align: center;">'.'<img alt="Erabiltzaile honek ez du argazkirik." src="'.$lerroa['Argazkia'].'" width="80" height="80">'.'</td></tr>';
}
echo '</table>';

/*if($_GET['orrialdea']!="erabiltzaileakIkusi") {
	echo "</br></br> Hasierara bueltatu nahi baduzu, klikatu hurrengo estekan: <a href='".HASIERA."'> Hasiera </a></br></br>";
}*/

echo'</section>';
include 'dbkonexioak/dbClose.php';

?>

<?php include 'php/orrialdeOina.php'; ?>