<?php
	$_GET['orrialdea'] = "pasahitzaBerreskuratu";
	include 'php/orrialdeGoia.php';
	echo('</head>');
?>
	<script type="text/javascript">
	xhttp = new XMLHttpRequest();
	function emailaKonprobatu(eposta){
		
		xhttp.onreadystatechange = function(){
			if((xhttp.readyState==4) && (xhttp.status==200)){
				var mezua = xhttp.responseText;
				alert(mezua);
				if(mezua=="Erabiltzaile hori zuzena da"){
					document.getElementById("botoia").disabled=false;
				}else{
					document.getElementById("botoia").disabled=true;
				}
			}	
		}
		xhttp.open("GET","php/nuSOAPbezEmaila.php?eposta="+eposta, true);
		xhttp.send();
	}
	</script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
<?php
	echo('<body>');
	include 'php/orrialdeNabigazioa.php';
?>
    <section class="main" id="s1">
		
		<div id="gorputza">
		 <form id="erregistro" name="erregistro" method="POST" action="pasahitzaBidali.php" enctype="multipart/form-data">
  			Sar ezazu zure posta helbidea:
  			<input type="email" name="eposta" required pattern="^[a-z]+[0-9]{3}@ikasle\.ehu\.eu?s$" title="emailak unibertsitatekoa izan behar du." oninvalid="this.setCustomValidity('Atal hau ezin da hutsik utzi')" onchange="emailaKonprobatu(this.value)"><br/><br/>
			<div class="g-recaptcha" data-sitekey="6LerogsUAAAAACPdBPei-XFB3f_TGJHLXk1A1sMO"></div><br/><br/>
			<input id="botoia" type="submit" name="button" value="Bidali" disabled><br/>
			
		</form> 
		
		</div>
		<div id="mezuak">
		</div>
		
    </section>
<?php include 'php/orrialdeOina.php'; ?>