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
			}	
		}
		xhttp.open("GET","php/nuSOAPbezEmaila.php?eposta="+eposta, true);
		xhttp.send();
	}
		
	function pasahitzaKonprobatu(pasahitza){
		var kodea = document.getElementById("kodea").value;
		
		xhttp.onreadystatechange = function(){
			if((xhttp.readyState==4) && (xhttp.status==200)){
				document.getElementById("mezuak2").innerHTML=xhttp.responseText;
			}	
		}
		xhttp.open("GET","php/nuSOAPbezPasahitza.php?pasahitza="+pasahitza+"&kodea="+kodea, true);
		xhttp.send();
	}
		
	function paspostaKonprobatu(x){
		var mezuak = document.getElementById("mezuak");
		var mezuak2 = document.getElementById("mezuak2");
		if(x==0){
			alert("Beheko mezuan azalduko zaizu erabiltzailea egokia den");
			if(mezuak.innerHTML==="Erabiltzaile hori zuzena da"){
				mezuak.style.color="darkgreen";
				mezuak.style.backgroundColor="chartreuse";
			}else{
				mezuak.style.color="darkred";
				mezuak.style.backgroundColor="coral";
			}
			
		}else{
			alert("Beheko mezuan azalduko zaizu pasahitza eta kodea egokia diren");
			if(mezuak2.innerHTML==="Pasahitz hori egokia da"){
				mezuak2.style.color="darkgreen";
				mezuak2.style.backgroundColor="chartreuse";
			}else{
				mezuak2.style.color="darkred";
				mezuak2.style.backgroundColor="coral";
			}
		}
		if((mezuak.innerHTML==="Erabiltzaile hori zuzena da")&&(mezuak2.innerHTML==="Pasahitz hori egokia da")&&(document.getElementById('pasahitza').value==document.getElementById('pasahitza2').value)){
			document.getElementById("botoia").disabled=false;
		}else{
			document.getElementById("botoia").disabled=true;
		}
	}
		
	
		
	function aukeratuBesteak() {
		if(document.getElementById("esp").value=="besterik") { //ikusi ea aukera bestelakoa den
			
			if(document.getElementById("espezializazioa")==null){
				var p1 = document.createElement("P");
				var hitzak = document.createTextNode("(*) adierazi zein espezialitate egiten ari zaren: ");
				var input1 = document.createElement("input");
				input1.setAttribute("name","espezializazioa");
				input1.setAttribute("id","espezializazioa");
				input1.setAttribute("required","true");
				p1.setAttribute("id","esptext");
			
				p1.appendChild(hitzak);
				document.getElementById("div1").appendChild(p1);
				document.getElementById("div1").appendChild(input1);
			}
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
	//bi pasahitzak berdinak izatea bermatzen du
	function pasahitzaBerdinak() {
		if(document.getElementById('pasahitza').value!=document.getElementById('pasahitza2').value) {
			alert("sartutako bi pasahitzak ezberdinak dira");
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
 			<input type="email" id="eposta-helbidea" name="eposta-helbidea" required pattern="^[a-z]+[0-9]{3}@ikasle\.ehu\.eu?s$" title="emailak unibertsitatekoa izan behar du." oninvalid="this.setCustomValidity('Atal hau ezin da hutsik utzi')" onchange="emailaKonprobatu(this.value); paspostaKonprobatu(0);"><br>
			(*) Kodea:
  			<input type="text" id="kodea" name="kodea" required pattern="[0-9]{4}" title="Sartu erositako kodea" oninvalid="this.setCustomValidity('Atal hau ezin da hutsik utzi')"><br>
			(*) Pasahitza:
 			<input type="password" name="pasahitza" id="pasahitza" required pattern=".{6,}$" title="6 karaktereko luzeera izan behar du gutxienez." oninvalid="this.setCustomValidity('Atal hau ezin da hutsik utzi')" onchange="pasahitzaKonprobatu(this.value); paspostaKonprobatu(2);"><br>
 			(*) Pasahitza errepikatu:
 			<input type="password" name="pasahitza2" id="pasahitza2" required pattern=".{6,}$" title="6 karaktereko luzeera izan behar du gutxienez." oninvalid="this.setCustomValidity('Atal hau ezin da hutsik utzi')" onchange="pasahitzaBerdinak();paspostaKonprobatu(3);"><br>
			(*) Telefono zenbakia:
 			<input type="text" name="telefono-zenbakia" required pattern="[0-9]{9}" title="9 zenbakiko telefono zenbakia idatzi mesedez." oninvalid="this.setCustomValidity('Atal hau ezin da hutsik utzi')"><br>
			(*) Espezialitatea:
 			<select id="esp" name="espezialitatea" onchange="aukeratuBesteak()" required>
  				<option value="software">Software Ingeniaritza</option>
  				<option value="hardware">Konputagailuen Ingeniaritza</option>
  				<option value="konputazioa">Konputazioa</option>
  				<option value="besterik">Besterik</option>
			</select><br>
			<div id="div1">
				<!-- espezialitatea definitzeko -->
			</div>	
			 
			<p id="parrafoa">Interesa duzun teknologiak eta erremintak:</p><br>
 			<textarea name="interesak" id="interesa" rows="3" cols="30"></textarea> <br><br>
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