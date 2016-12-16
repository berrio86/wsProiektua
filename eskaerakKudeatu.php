<?php
	$_GET['orrialdea'] = "eskaerakKudeatu";
	include 'php/orrialdeGoia.php';?>
<script type="text/javascript" language="javascript">

	var xhttp = new XMLHttpRequest();
	
	function ezabatu(x){
		//alert("Ezabatu!!");
		if(confirm("Ziur al zaude erabiltzaile honen eskaria atzera bota nahi duzula?")){
			xhttp.onreadystatechange = function(){
				if((xhttp.readyState==4) && (xhttp.status==200)){		
					document.getElementById("taula").innerHTML=xhttp.responseText;
			}	
		};
		xhttp.open("GET","eskaeraTaula.php?ezabatuerabil="+x, true);
		xhttp.send();
		}else{
			alert("Erabiltzailearen eskaera ez da atzera botako.");
		}
	}
	
	function onartu(mail, izena, pasa, mota, arg){
		//alert("Onartu!!");
		if(confirm("Ziur al zaude erabiltzaile honen eskaria onartu nahi duzula?")){
			xhttp.onreadystatechange = function(){
				if((this.readyState==4) && (this.status==200)){		
					document.getElementById("taula").innerHTML=this.responseText;
				}	
			};
		xhttp.open("GET","eskaeraTaula.php?onartuerabil="+mail+"&pasa="+pasa+"&izena="+izena+"&mota="+mota+"&arg="+arg, true);
		xhttp.send();
		}else{
			alert("Erabiltzailearen eskaera ez da onartua izango.");
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
<?php include 'eskaeraTaula.php'; ?>
</div>
</section>
<?php include 'php/orrialdeOina.php'; ?>
