<?php
	$_GET['orrialdea'] = "albumaSortu";
	include 'php/orrialdeGoia.php';
	echo('</head>
		<body>');
	include 'php/orrialdeNabigazioa.php';
?>
<section class="main" id="s1">
	<br/><h1>Albuma sortzeko laguntzailea</h1>
<div id="taula">
	<form id="erregistro" name="erregistro" method="POST" action="albumaGorde.php" enctype="multipart/form-data">
  			(*) Albumaren izena:
  			<input type="text" name="bildumaIzena" placeholder="Izena" required pattern="([A-Z]{1}[a-z ]{1,})*" title="Izen-abizenak letra larriz hasita" oninvalid="this.setCustomValidity('Atal hau ezin da hutsik utzi')"><br>
			
			<input id="botoia" type="submit" name="button" value="Sortu">
			
	</form> 
</div>
</section>
<?php include 'php/orrialdeOina.php'; ?>