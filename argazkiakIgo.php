<?php
	$_GET['orrialdea'] = "argazkiakIgo";
	include 'php/orrialdeGoia.php';
?>
<script type="text/javascript">
	function argazkiaKargatu() {
		var preview = document.getElementById("argazkia");
		var file = document.getElementById("argazki-fitxategia").files[0];
		var reader = new FileReader();
		
		reader.onload = function (event){
			var dataUri = event.target.result;
			preview.src = dataUri; 
			tamainaAldatu();
		}
		
		if (file) {
			reader.readAsDataURL(file);
			var botoia = document.getElementById("botoia");
			var sel = document.getElementById("bildumak");
			if(sel.value.length == 0) {
				alert("ez dituzu bildumarik, lehenik sortu bilduma bat eta gero igo argazkiak");
			} else {
				botoia.disabled=false;
			}
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
		<form id="argazkiakIgo" name="argazkiakIgo" method="POST" action="argazkiakGorde.php" enctype="multipart/form-data">
		 	<h2>Argazkiak igotzeko interfazea</h2><br/>
  			<p> Aukeratu bilduma:</p><br/>
			<p><select name="bilduma" id="bildumak">
			<?php
				//option motako elementuetan erabiltzaileak sartu
				include"dbkonexioak/dbOpen.php";
				$eposta=$_SESSION['eposta'];
				$galdera="SELECT Izena FROM Bilduma WHERE Jabea='$eposta'";
				$emaitza = $db->query($galdera); 
				while ($lerroa = $emaitza->fetch_assoc()){
					echo "<option value='{$lerroa['Izena']}'>{$lerroa['Izena']}</option>";
				}
				include "dbkonexioak/dbClose.php";
			?>
			</select></p><br/><br/>
  			
			<p> Aukeratu argazkia: </p><br/>
			<input id="argazki-fitxategia" type="file" name="argazki-fitxategia" accepts="image/*" onchange="return argazkiaKargatu()" value="Bidali">
			<br/><br/>
			<input id="botoia" type="submit" name="button" value="Igo" disabled><br/><br/>
			<img id="argazkia" style="width:150px; height: 100px;" class="argazkia"/><br/><br/>
		 	
	 </form> 
	</div>

</section>
<?php include 'php/orrialdeOina.php'; ?>