<?php
	$_GET['orrialdea'] = "eskaerakKudeatu";
	include 'php/orrialdeGoia.php';
	echo('</head>');
?>
<script type="text/javascript" language="javascript">

	xhttp = new XMLHttpRequest();
	
	function ezabatu(x){
		alert("Ezabatu!!");
		/*if(confirm("Ziur al zaude erabiltzailea honen eskaria atzera bota nahi duzula?")){
			xhttp.onreadystatechange = function(){
				if((xhttp.readyState==4) && (xhttp.status==200)){		
					document.getElementById("taula").innerHTML=xhttp.responseText;
				}	
			}
		xhttp.open("GET","galderaEzabatu.php?galderaZenb="+x, true);
		xhttp.send();
		}else{
			alert("Galdera ez da ezabatua izango.");
		}*/
	}
	
	function onartu(y){
		alert("Onartu!!");
		/*if(confirm("Ziur al zaude erabiltzaile honen eskaera onartu nahi duzula?")){
			window.location.href= ("galderaEditatu.php?zenbakia="+y);
		}*/
	}

</script>
<?php
	echo('<body>');
	include 'php/orrialdeNabigazioa.php';
?>
<?php 
echo'<section class="main" id="s1">';
		
include 'dbkonexioak/dbOpen.php';


$erabiltzaileak = "SELECT * FROM ErabiltzaileBerria";
$emaitza = $db->query($erabiltzaileak); 
echo '<table border=2><tr><th> IZEN-ABIZENAK </th><th> POSTA </th><th> IRUDIA </th><th> ONARTU </th><th> EZABATU </th>';

while ($lerroa = $emaitza->fetch_array(MYSQLI_BOTH)){
	echo '<tr><td>'.$lerroa['Izena'].'</td><td>'.$lerroa['Email'].'</td><td style="text-align: center;">'.'<img alt="Erabiltzaile honek ez du argazkirik." src="'.$lerroa['Argazkia'].'" width="80" height="80">'.'</td>';
	echo ("<td style='text-align:center'><input type='button' style='width:100%;' value='Ezabatu' onclick='ezabatu(".$lerroa['Email'].")'></td>");
	echo ("<td style='text-align:center'><input name='editatu' type='button' style='width:100%;' value='Onartu' onclick='onartu(".$lerroa['Email'].")'> </td></tr>");
}
echo '</table>';

/*if($_GET['orrialdea']!="erabiltzaileakIkusi") {
	echo "</br></br> Hasierara bueltatu nahi baduzu, klikatu hurrengo estekan: <a href='".HASIERA."'> Hasiera </a></br></br>";
}*/

echo'</section>';
include 'dbkonexioak/dbClose.php';

?>
<?php include 'php/orrialdeOina.php'; ?>
