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
</div>
</section>

<?php include 'php/orrialdeOina.php'; ?>