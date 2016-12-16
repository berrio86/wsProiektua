<?php
	$_GET['orrialdea'] = "etiketakKudeatu";
	include 'php/orrialdeGoia.php';
?>
<script type="text/javascript">
	
	function emanBalioa(x) {
		alert(x);
	}
	
	function argazkiaKargatu() {
		var preview = document.getElementById("argazkia");
		var file = document.getElementById("argazki-fitxategia").files[0];
		var reader = new FileReader();
		
		reader.onload = function (event){
			var dataUri = event.target.result;
			preview.src = dataUri; 
			tamainaAldatu();
		}
		
		if (file){
			reader.readAsDataURL(file);
			var botoia = document.getElementById("botoia");
			botoia.disabled=false;
		}else{
			preview.src="";
		}
	}
	
	//funtzio hau hobetu egin behar da	
	function tamainaAldatu(){
		var irudia = document.getElementById("argazkia");
		
		if(irudia.clientHeight > "80"){
			irudia.style.height="80px";
			irudia.style.width = "auto";
			
		}
	}	
	</script>

<?php	
	echo('</head><body>');
	include 'php/orrialdeNabigazioa.php';
?>
<section class="main" id="s1">
	<div>
		<form id="argazkiakIgo" name="argazkiakIgo" method="POST" action="etiketakGorde.php" enctype="multipart/form-data">
		 	<h2>Etiketa kudeatzeko interfazea</h2><br/>
  			<p> Aukeratu bilduma:</p><br/>
			<p><select name="bildumak" id="bildumak" onchange="emanBalioa(this.value)">
			<?php
				//option motako elementuetan erabiltzaileak sartu
				include"dbkonexioak/dbOpen.php";
				$eposta=$_SESSION['eposta'];
				
				if($mota=="Administratzailea"){
					$galdera = "SELECT * FROM Bilduma WHERE Jabea='$eposta'";
				}else{
					$galdera = "SELECT * FROM Bilduma";
				}
				$emaitza = $db->query($galdera); 
				while ($lerroa = $emaitza->fetch_assoc()){
					echo "<option value='{$lerroa['Izena']}'>{$lerroa['Izena']}</option>";
				}
				include "dbkonexioak/dbClose.php";
			?>
			</select></p><br/><br/>
  			
			<p> Aukeratu argazkia:</p><br/>
			<p><select name="argazkiak" id=argazkiak onchange="argazkiaKargatu(); etiketakKargatu();">
			
			</select></p><br/><br/>
			<img id="argazkia" style="width:150px; height: 100px;" class="argazkia"/><br/><br/>
			<p><textarea rows="4" cols="50">
					
			</textarea> </p>
			<input id="botoia" type="submit" name="button" value="Etiketak gorde"><br/><br/>
			
		 	
	 </form> 
	</div>

</section>
<?php include 'php/orrialdeOina.php'; ?>