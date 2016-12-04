<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Sign In</title>
	<link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
    <link rel='stylesheet' type='text/css' href='css/signIn.css' />
	   
  </head>
  <body>
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
	  
  	<div class='login'>
	<div class="login-header">
		<h1>Sign In</h1>
	</div>
	
		<form id="logeatu" name="logeatu" method="POST" action="SignIn.php" enctype="multipart/form-data">
			<div class="login-form">
  				<h3>Posta-elektronikoa:</h3> 
  				<input type="text" name="eposta" title="Sartu zure emaila." placeholder="E-mail"><br>
				<h3>Pasahitza:</h3>
 				<input type="password" name="pasahitza" title="Sartu zure pasahitza." placeholder="Password"><br>
				<input type="submit" class="login-button" name="button" value="Bidali">
				<a class="sign-up" href="signUp.php">Erregistratu</a><br>
				<a class="no-access" href="pasahitzaBerreskuratu.php">Pasahitza ahaztu al duzu??</a><br>
				<a class="no-access" href="index.php">Hasiera</a>
			</div>
		</form>
	</div>
	<?php 

if (isset($_POST['eposta'])){
	include 'dbkonexioak/dbOpen.php';
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'GET')  { //get eskaera landu
			null;
		} else { //post eskaera landu	
			$eposta= $_POST['eposta'];
			$pass= $_POST['pasahitza'];
	}
	//errore mezuak sortu
	$hasiera="<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
				<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
			<div class='error-page'>
				<div class='try-again'>";
	
	$bukaera="Errorea: Saiatu berriro?
				</div>
			</div>
			<script src='js/signIn.js'></script>";
	
	
	//eposta eguneratu sesioan
	$_SESSION['eposta']= $eposta;
	
	//begiratu eposta hori datu basean dagoen ala ez
	$query = "SELECT * FROM Erabiltzailea WHERE Email='$eposta'";
	$result = $db->query($query); 
	$lerroa = $result->fetch_array(MYSQLI_BOTH);
	if(empty($lerroa)){
		//guest ezarri erabiltzaile bezala
		$_SESSION['eposta']= "guest";
		exit($hasiera."Erabiltzaile hori ez dago datu basean, saiatu zaitez berriro.</br>".$bukaera);
	}
	
	//begiratu pasahitza bat datorren ala ez
	$erabiltzaileak = "SELECT * FROM Erabiltzailea WHERE Email='$eposta' AND Pasahitza='$pass'";
	$emaitza = $db->query($erabiltzaileak); 
	$user = $emaitza->fetch_array(MYSQLI_BOTH);
	
	if(empty($user)){
		//guest ezarri erabiltzaile bezala
		$_SESSION['eposta']= "guest";
		$_SESSION['konexioid'] = -1;
		//Pasahitza bat ez badator, kontagailua eguneratu
		mysqli_query($db,"UPDATE Erabiltzailea SET kontagailua=kontagailua+1 WHERE Email='$eposta'"); 
	
		//kontagailua 3 edo handiagoa bada, erabiltzailea blokeatuko da.
		$query = "SELECT kontagailua FROM Erabiltzailea WHERE Email='$eposta'";
		$result = $db->query($query); 
		$lerroa = $result->fetch_array(MYSQLI_BOTH);
		$kontagailua=$lerroa['kontagailua'];
		if($kontagailua>=3){
			//erabiltzailea blokeatu
			echo($hasiera."Erabiltzailea blokeatu zaizu. Bidali email bat web-masterrari zure kontua berrezartzeko.</br>".$bukaera);		
		}else{
			$aukerak=3-$kontagailua;
			echo($hasiera."  ".$aukerak." aukera gehiago dituzu erabiltzailea blokeatu aurretik</br>".$bukaera);
		}
	}else{
		//logeatu baina lehen kontagailua nola dagoen begiratzen da.
		$query = "SELECT kontagailua FROM Erabiltzailea WHERE Email='$eposta'";
		$result = $db->query($query); 
		$lerroa = $result->fetch_array(MYSQLI_BOTH);
		$kontagailua=$lerroa['kontagailua'];
		if($kontagailua>=3){
			//erabiltzailea guest bezala ezarri eta bestea blokeatu
			$_SESSION['eposta']= "guest";
			exit($hasiera."Erabiltzailea blokeatuta dago. Bidali email bat web-masterrari zure kontua berrezartzeko.</br>".$bukaera);
		}else{
			//kontagailua 0-ra berrezarri
			mysqli_query($db,"UPDATE Erabiltzailea SET kontagailua=0 WHERE Email='$eposta'"); 
			$_SESSION['eposta']= $eposta;
			//erabiltzaile mota lortu
			$erabiltzailesql = "SELECT Mota FROM Erabiltzailea WHERE Email='$eposta'";
			$erabiltzailearray = $db->query($erabiltzailesql);
			if (!$erabiltzailearray) {
    			echo 'Could not run query: ' . $db->error;
    			exit;
    		}
			$row = $erabiltzailearray->fetch_array(MYSQL_NUM);
			$_SESSION['mota'] = $row[0];
			//erabiltzaile irudia lortu
			$erabiltzailesql = "SELECT Argazkia FROM Erabiltzailea WHERE Email='$eposta'";
			$erabiltzailearray = $db->query($erabiltzailesql);
			if (!$erabiltzailearray) {
    			echo 'Could not run query: ' . $db->error;
    			exit;
    		}
			$row = $erabiltzailearray->fetch_array(MYSQL_NUM);
			$_SESSION['erabiltzaileIrudia'] = $row[0];
			header("Location:index.php");
    		exit;
			}
		}	
	
	include 'dbkonexioak/dbClose.php';
}

?>  
	
		
   	<div class="footer">
		<footer class='main' id='f1'>
			<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
			<a href='https://github.com/berrio86/wsGit16'><img style="width:3%" src="irudiak/github-icon.png"></a>
		</footer>
	</div>

</body>
</html>

