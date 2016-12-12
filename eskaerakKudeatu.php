<?php
	$_GET['orrialdea'] = "eskaerakKudeatu";
	include 'php/orrialdeGoia.php';?>
<script type="text/javascript" language="javascript">

	xhttp = new XMLHttpRequest();
	
	function ezabatu(x){
		alert("Ezabatu!!");
		if(confirm("Ziur al zaude erabiltzailea honen eskaria atzera bota nahi duzula?")){
			xhttp.onreadystatechange = function(){
				if((xhttp.readyState==4) && (xhttp.status==200)){		
					document.getElementById("taula").innerHTML=xhttp.responseText;
				}	
			}
		xhttp.open("GET","galderaEzabatu.php?galderaZenb="+x, true);
		xhttp.send();
		}else{
			alert("Galdera ez da ezabatua izango.");
		}
	}
	
	function onartu(y){
		alert("Onartu!!");
		if(confirm("Ziur al zaude erabiltzaile honen eskaera onartu nahi duzula?")){
			window.location.href= ("galderaEditatu.php?zenbakia="+y);
		}
	}

</script>
<?php
	echo('</head>');
	echo('<body>');
	include 'php/orrialdeNabigazioa.php';
?>

<section class="main" id="s1">
	<br/><h1>DBko eskaerak kudeatzeko administratzailea</h1>
<div id="taula">
<?php 

		
include 'dbkonexioak/dbOpen.php';


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
	echo ("<tr>");	
		echo ("<td>".$lerroa['Izena']."</td>");
		echo ("<td>".$lerroa['Email']."</td>");
		$eposta = $lerroa['Email'];
		echo '<td style="text-align: center;">'.'<img alt="Erabiltzaile honek ez du argazkirik." src="'.$lerroa['Argazkia'].'" width="80" height="80"></td>';
		echo ("<td style='text-align:center'><input type='button' style='width:100%;' value='Ezabatu' onclick='ezabatu(".$eposta.")'></td>");
		echo ("<td style='text-align:center'><input name='onartu' type='button' style='width:100%;' value='Onartu' onclick='onartu(".$lerroa['Email'].")'></td>");
	echo("</tr>");
}
echo '</table>';
include 'dbkonexioak/dbClose.php';
?>
</div>
</section>
<?php include 'php/orrialdeOina.php'; ?>
