<?php
	$_GET['orrialdea'] = "etiketakKudeatu";
	include 'php/orrialdeGoia.php';
?>
<script type="text/javascript">
	
	var xhttp = new XMLHttpRequest();
	var xhttp2 = new XMLHttpRequest();
	
	function emanBalioa(x){
		xhttp.onreadystatechange = function(){
				if((xhttp.readyState==4) && (xhttp.status==200)){		
					document.getElementById("bigarrenSelect").innerHTML=xhttp.responseText;
			}	
		};
		xhttp.open("GET","etiketakKudeatu2.php?bildumaAukeratua="+x, true);
		xhttp.send();
	}
	
	function kargatuDatuak(x){
		//alert(x);
		konprobatuEremuak();
		kargatuArgazkia();
		//var select2 = document.getElementById("argazkiak").value;
		//alert(select2+" argazkia aukeratu duzu");
		kargatuEtiketak(x);
	}
	
	function konprobatuEremuak(){
		var gorde = document.getElementById("gorde");
		var textArea = document.getElementById("textArea");
		//argazkia aukeratuta dagoenean botoiak eta text area abilitatu
		gorde.disabled=false;
		textArea.readOnly=false;
	}
	
	function kargatuArgazkia(){
		var select1 = document.getElementById("bildumak").value;
		var select2 = document.getElementById("argazkiak").value;
		xhttp.onreadystatechange = function(){
				if((xhttp.readyState==4) && (xhttp.status==200)){
					document.getElementById("argazkia").src=xhttp.responseText;
			}	
		};
		xhttp.open("GET","etiketakKudeatu2.php?bilduma="+select1+"&argazkia="+select2, true);
		xhttp.send();
	}
	
	function kargatuEtiketak(x){
		var select1 = document.getElementById("bildumak").value;
		var select2 = document.getElementById("argazkiak").value;
		var helbidea = x;
		xhttp2.onreadystatechange = function(){
				if((xhttp2.readyState==4) && (xhttp2.status==200)){		
					document.getElementById("textArea").value=xhttp2.responseText;
			}	
		};
		xhttp2.open("GET","etiketakKudeatu2.php?bilduma="+select1+"&argazkia="+select2+"&helbidea="+helbidea, true);
		xhttp2.send();
	}
	
	function aldaketakGorde(){
		var select1 = document.getElementById("bildumak").value;
		var select2 = document.getElementById("argazkiak").value;
		var helbidea = document.getElementById("argazkia").src.value;
		var etiketak = document.getElementById("textArea").value;
		xhttp.onreadystatechange = function(){
				if((xhttp.readyState==4) && (xhttp.status==200)){	
					alert("onaino bai");
					document.getElementById("emaitza").value=xhttp.responseText;
			}	
		};
		xhttp.open("GET","etiketakKudeatu2.php?bilduma="+select1+"&argazkia="+select2+"&helbidea="+helbidea+"&etiketak="+etiketak, true);
		xhttp.send();
	}
	
	</script>

<?php	
	echo('</head><body>');
	include 'php/orrialdeNabigazioa.php';
?>

<section class="main" id="s1">
	<img id="argazkia" src="" style="width:150px; height: 100px; float: right;" class="argazkia"/> <br>
	<div>
		
		<form id="argazkiakIgo" name="argazkiakIgo" method="POST" action="" enctype="multipart/form-data">
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
  			
			<div id="bigarrenSelect"></div>
			
			<textarea id="textArea" rows="4" cols="50" readonly="readonly">
			</textarea><br/><br/>
			<p>Banatu itzazu sartu nahi dituzun etiketak "," karaktereaz banatuta.</p><br/>
			<input id="gorde" type="button" name="button" value="Gorde" disabled onclick="aldaketakGorde()">
			
		 	<div id="emaitza"></div>
	 </form> 
	</div>

</section>
<?php include 'php/orrialdeOina.php'; ?>