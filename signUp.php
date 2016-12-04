<?php
	$_GET['orrialdea'] = "signUp";
	include 'php/orrialdeGoia.php';
	echo('</head>');
?>
	<script type="text/javascript">
	xhttp = new XMLHttpRequest();
	function emailaKonprobatu(eposta){
		xhttp.onreadystatechange = function(){
			if((xhttp.readyState==4) && (xhttp.status==200)){
				document.getElementById("mezuak").innerHTML=xhttp.responseText;
				paspostaKonprobatu(0);
			}	
		}
		xhttp.open("GET","php/nuSOAPbezEmaila.php?eposta="+eposta, true);
		xhttp.send();
	}
		
	//bi pasahitzak berdinak izatea bermatzen du
	function pasahitzaBerdinak() {
		var mezuak2 = document.getElementById("mezuak2");
		if(document.getElementById('pasahitza').value!=document.getElementById('pasahitza2').value) {
			mezuak2.innerHTML="Pasahitzak ezaberdinak dira.";
		}else{
			mezuak2.innerHTML="Pasahitzak berdinak dira.";
		}
		paspostaKonprobatu(2);
	}	
		
	function paspostaKonprobatu(x){
		var mezuak = document.getElementById("mezuak");
		var mezuak2 = document.getElementById("mezuak2");
		if(x==0){
			if(mezuak.innerHTML==="Erabiltzaile hori zuzena da"){
				mezuak.style.color="darkgreen";
				mezuak.style.backgroundColor="chartreuse";
			}else{
				mezuak.style.color="darkred";
				mezuak.style.backgroundColor="coral";
			}
		}else{
			if(mezuak2.innerHTML==="Pasahitzak berdinak dira."){
				mezuak2.style.color="darkgreen";
				mezuak2.style.backgroundColor="chartreuse";
			}else{
				mezuak2.style.color="darkred";
				mezuak2.style.backgroundColor="coral";
			}
		}
		if((mezuak.innerHTML==="Erabiltzaile hori zuzena da")&&(mezuak2.innerHTML==="Pasahitzak berdinak dira.")&&(document.getElementById('pasahitza').value==document.getElementById('pasahitza2').value)){
			document.getElementById("botoia").disabled=false;
		}else{
			document.getElementById("botoia").disabled=true;
		}
	}
		
	
		
	
	</script>
	<script type="text/javascript">
	function argazkiaKargatu() {
		var preview = document.getElementById("argazkia");
		var file = document.getElementById("argazki-fitxategia").files[0];
		//alert(file);
		var reader = new FileReader();
		
		reader.onload = function (event){
			var dataUri = event.target.result;
			preview.src = dataUri; 
			tamainaAldatu();
		}
		
		if (file){
			reader.readAsDataURL(file);
		}else{
			preview.src="";
		}
	}
	
	//funtzio hau hobetu egin behar da	
	function tamainaAldatu(){
		var irudia = document.getElementById("argazkia");
		//alert("ona iristen da");
		if(irudia.clientHeight > "80"){
			irudia.style.height="80px";
			irudia.style.width = "auto";
			/*var zabalera = irudia.clientWidth;
			var altuera = irudia.clientHeight;
			alert(altuera + " " + zabalera);*/
		}
	}	
	</script>
<?php
	echo('<body>');
	include 'php/orrialdeNabigazioa.php';
?>
    <section class="main" id="s1">
		
		<div id="gorputza">
		 <form id="erregistro" name="erregistro" method="POST" action="EnrollWithImage.php" enctype="multipart/form-data">
  			(*) Izen-Abizenak:
  			<input type="text" name="izen-abizenak" required pattern="([A-Z]{1}[a-z ]{1,})*" title="Izen-abizenak letra larriz hasita" oninvalid="this.setCustomValidity('Atal hau ezin da hutsik utzi')"><br>
			(*) Posta Elektronikoa:
 			<input type="email" id="eposta-helbidea" name="eposta-helbidea" required pattern="^[a-z]+[0-9]{3}@ikasle\.ehu\.eu?s$" title="emailak unibertsitatekoa izan behar du." oninvalid="this.setCustomValidity('Atal hau ezin da hutsik utzi')" onchange="emailaKonprobatu(this.value);"><br>
			
			(*) Pasahitza:
 			<input type="password" name="pasahitza" id="pasahitza" required pattern=".{6,}$" title="6 karaktereko luzeera izan behar du gutxienez." oninvalid="this.setCustomValidity('Atal hau ezin da hutsik utzi')" onchange="pasahitzaBerdinak();"><br>
 			(*) Pasahitza errepikatu:
 			<input type="password" name="pasahitza2" id="pasahitza2" required pattern=".{6,}$" title="6 karaktereko luzeera izan behar du gutxienez." oninvalid="this.setCustomValidity('Atal hau ezin da hutsik utzi')" onchange="pasahitzaBerdinak();"><br><br>
			Sartu argazki bat:<br>
			<input id="argazki-fitxategia" type="file" name="argazki-fitxategia" accepts="image/*" onchange="return argazkiaKargatu()" value="Bidali">
			 <img id="argazkia" style="width:150px; height: 100px;" class="argazkia"/> <br>
			 <input id="botoia" type="submit" name="button" value="Bidali" disabled>
			<input type="reset" name="button" value="Ezeztatu"> <br><br>
		</form> 
		
		<p>(*) duten atalak bete beharrekoak dira, derrigor.</p>
		</div>
		<div id="mezuak">
		</div>
		<div id="mezuak2">
		</div>
    </section>
<?php include 'php/orrialdeOina.php'; ?>