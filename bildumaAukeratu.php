<?php
	$_GET['orrialdea'] = "bildumaAukeratu";
	include 'php/orrialdeGoia.php';
?>
<script type="text/javascript" language="javascript">

	var xhttp = new XMLHttpRequest();
	
	function ezabatu(jabea, bilduma){
		if(confirm("Ziur al zaude bilduma ezabatu nahi duzula?")){
			xhttp.onreadystatechange = function(){
				if((xhttp.readyState==4) && (xhttp.status==200)){		
					document.getElementById("taula").innerHTML=xhttp.responseText;
			}	
		};
		xhttp.open("GET","bildumaTaula.php?ezabatuBilduma="+bilduma+"&jabeax="+jabea, true);
		xhttp.send();
		}else{
			alert("Bilduma ez da ezabatuko.");
		}
	}
	
	function aukeratu(jabea, bilduma){
		window.open("argazkiakIkusi.php?jabeax="+jabea+"&bildumax="+bilduma);
	}

</script>

<?php
	echo('</head>
		<body>');
	include 'php/orrialdeNabigazioa.php';
?>
<section class="main" id="s1">
	<br/><h1>DBko bildumak kudeatzeko administratzailea</h1>
<div id="taula">
<?php 
include 'bildumaTaula.php';
?>
</div>
</section>
<?php include 'php/orrialdeOina.php'; ?>