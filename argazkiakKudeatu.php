<?php
	$_GET['orrialdea'] = "argazkiakKudeatu";
	include 'php/orrialdeGoia.php';
?>

<script type="text/javascript" language="javascript">

	var xhttp = new XMLHttpRequest();
	
	function ezabatu(x){
		if(confirm("Ziur al zaude argazkia ezabatu nahi duzula?")){
			xhttp.onreadystatechange = function(){
				if((xhttp.readyState==4) && (xhttp.status==200)){		
					document.getElementById("taula").innerHTML=xhttp.responseText;
			}	
		};
		xhttp.open("GET","argazkiaTaula.php?ezabatuArgazkia="+x, true);
		xhttp.send();
		}else{
			alert("Argazkia ez da ezabatuko.");
		}
	}

	function etikete(){
		var x = document.getElementById("etiketaInput").value;
		if(confirm(x+" etiketa duten argazkiak agertuko dira soilik")){
			xhttp.onreadystatechange = function(){
				if((xhttp.readyState==4) && (xhttp.status==200)){		
					document.getElementById("taula").innerHTML=xhttp.responseText;
			}	
		};
		xhttp.open("GET","argazkiaTaula.php?etiketaInput="+x, true);
		xhttp.send();
		}else{
			alert("Ezin izan da atzipena egin.");
		}
	}


</script>

<?php
	echo('</head>
		<body>');
	include 'php/orrialdeNabigazioa.php';
?>

<section class="main" id="s1">
	<br/><h1>DBko argazkiak kudeatzeko administratzailea</h1>
<div id="taula">
<?php 
include 'argazkiaTaula.php';
?>
<h5>Aukeratu etiketa zehatza duten argazkiak soilik: </h5>
<input type="text" id="etiketaInput" name="etiketaInput" placeholder="etiketa bakarra sartu" title="etiketa bakarra sartu" required pattern="([A-Z]{0,}[a-z ]{0,})*">
<input id="botoia" type="button" name="button" value="Aukeratu" onclick="etikete();">
</div>
</section>

<?php include 'php/orrialdeOina.php'; ?>