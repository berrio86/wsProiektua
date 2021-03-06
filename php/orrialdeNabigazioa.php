<?php

	//ikus ea sesio bat hasi den eta ez bada hala guest ezarri
	if((isset($_SESSION['eposta']) && !empty($_SESSION['eposta'])) &&  (isset($_SESSION['mota']) && !empty($_SESSION['mota']))) {
   		null;
	} else {
		$_SESSION['eposta'] = "Erabiltzaile Anonimoa";
		$_SESSION['mota'] = "GUEST";
		$_SESSION['erabiltzaileIrudia'] = 'irudiak/user-icon.png';
	}

?>

<div id='page-wrap'>
	<header class='main' id='h1'>
	<!-- HEMENGOA MUGIKORRERAKO DA, AMAITZEKO -->
	<div id="main" class="bakarrikMugikorra">
	  <div class="container">
	      <div class="navigation" style="position:absolute; z-index:10; margin-top:50px">
	        <ul>
	          <li><a href="index.php">Hasiera</a></li>
	          <li><a href="#" tabindex="1">Galderak ikusi<span class="arrow-down"></span></a>
	            <ul class="dropdown">
	              <li><a href="seeXMLQuestions.php">Ikusi DB galderak</a></li>
	              <li><a href="seeXSLQuestions.php">Ikusi XSL galderak</a></li>
	              <?php
	              if($_SESSION['mota'] != "GUEST") {
	              	echo '<li><a href="galderakIkusi.php">Ikusi erabiltzailearen galderak</a></li>';
	              }
	              ?>
	            </ul>
	          </li>
	          <?php
	          if($_SESSION['mota'] != "GUEST") {
	          echo '<li><a href="handlingQuizes.php">Galderak txertatu</a></li>';
	          }
	          ?>
	          <li><a href="#" tabindex="1">Saioa<span class="arrow-down"></span></a>
	            <ul class="dropdown">
	            <?php
	          	if($_SESSION['mota'] == "GUEST") {
	              echo '<li title="Saioa hasi"><a href="SignIn.php"><img src="irudiak/login-icon.png"></a></li>';
	              echo '<li title="Orrialdean erregistratu"><a href="SignUp.php"><img src="irudiak/signup-icon.png"></a></li>';
	          	} else {
	              echo '<li title="Saioa amaitu"><a href="LogOut.php"><img src="irudiak/logout-icon.png"></a></li>';
	          	}
	          	?>
	            </ul>
	          </li>
	          <li><a href="#">NABIGAZIOA BUKATU ETA HOBETU BEHAR DA</a></li>
	        </ul>
	      </div>
	      <div class="nav_bg">
	        <div class="nav_bar"> <span></span> <span></span> <span></span> </div>
	      </div>
	  </div>
	</div>
	<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script> 
	<script>
	$(document).ready(function(){
			$('.nav_bar').click(function(){
				$('.navigation').toggleClass('visible');
				$('body').toggleClass('opacity');
			});
		});
	</script>
<!-- Mugikorretan soilik agertuko da goiko zatia (<div id="main" class="bakarrikMugikorra">) -->
	
	<?php
	if($_SESSION['mota']=="GUEST") {
      	echo'<a href="signUp.php"><img class="botoia" title="Orrialdean erregistratu" src="irudiak/signup-icon.png"></a>
      	<a href="SignIn.php"><img class="botoia" title="Saioa hasi" src="irudiak/login-icon.png"></a>';
	} else {
		echo '<a href="LogOut.php"><img title="Saioa amaitu" class="botoia"  src="irudiak/logout-icon.png"></a>
		<a href="#" class="tooltip"><span><strong>Erabiltzailearen datuak</strong><br/>emaila: '.$_SESSION['eposta'].'<br/>erabiltzaile mota: '.$_SESSION['mota'].'<br/></span><img class="botoia2" src="'.$_SESSION['erabiltzaileIrudia'].'"></a>'; 
		//erabiltzailearen ikonoa hartzen du
	}
    ?>
      
	<a href="index.php"><img class="logo" src="irudiak/quiz-logo.png"></a>
	<?php
	//hurrengo kodeak ez du ezer erakusten, baina botoiak jartzen ditu baita ere ezkerraldean logoa zentratua egoteko
	if($_SESSION['mota']=="GUEST") {
      	echo'<a href="signUp.php"><img style="float:left; visibility:hidden" class="botoia"  src="irudiak/signup-icon.png"></a>
      	<a href="SignIn.php"><img style="float:left; visibility:hidden" class="botoia"  src="irudiak/login-icon.png"></a>';
	} else {
		echo '<a href="LogOut.php"><img style="float:left; visibility:hidden" class="botoia"  src="irudiak/logout-icon.png"></a>';
	}
    ?>
    </header>
<nav class='main desktopSoilik' id='n1' role='navigation'>
	<?php 
	if($_GET['orrialdea']=="index") //Hasiera
		echo ('<a href="index.php"><span id="act-sel" class="act-sel">Hasiera<div class="arrow-right"></div></span></a>');
	else
		echo ('<a href="index.php"><span>Hasiera</span></a>');
	
	
	
	if($_SESSION['mota'] == "Administratzailea") {
		if($_GET['orrialdea']=="eskaerakKudeatu") //Eskariak ikusi
			echo'<a href="eskaerakKudeatu.php"><span id="act-sel" class="act-sel">Eskaerak ikusi<div class="arrow-right"></div></span></a>';
		else
			echo'<a href="eskaerakKudeatu.php"><span>Eskaerak ikusi</span></a>';
		
		if($_GET['orrialdea']=="bildumaAukeratu") //Bildumak ikusi
			echo'<a href="bildumaAukeratu.php"><span id="act-sel" class="act-sel">Bildumak ikusi<div class="arrow-right"></div></span></a>';
		else
			echo'<a href="bildumaAukeratu.php"><span>Bildumak ikusi</span></a>';
		
		if($_GET['orrialdea']=="argazkiakKudeatu") //Bildumak ikusi aurrerago aukeratu eta argazkiak ezabatu ahal izateko
			echo'<a href="argazkiakKudeatu.php"><span id="act-sel" class="act-sel">Argazkiak kudeatu<div class="arrow-right"></div></span></a>';
		else
			echo'<a href="argazkiakKudeatu.php"><span>Argazkiak kudeatu</span></a>';
		
		if($_GET['orrialdea']=="etiketakKudeatu") //Argazkiak kudeatzeko aukera
			echo'<a href="etiketakKudeatu.php"><span id="act-sel" class="act-sel">Etiketak kudeatu<div class="arrow-right"></div></span></a>';
		else
			echo'<a href="etiketakKudeatu.php"><span>Etiketak kudeatu</span></a>';
		if($_GET['orrialdea']=="showUsers") //Erabiltzaileak ikusi
			echo'<a href="ShowUsersWithImage.php"><span id="act-sel" class="act-sel">Erabiltzaileak ikusi<div class="arrow-right"></div></span></a>';
		else
			echo'<a href="ShowUsersWithImage.php"><span>Erabiltzaileak ikusi</span></a>';
	}
	
	if($_SESSION['mota'] == "Bazkidea") {
		if($_GET['orrialdea']=="albumaSortu") //Eskariak ikusi
			echo'<a href="albumaSortu.php"><span id="act-sel" class="act-sel">Albuma sortu<div class="arrow-right"></div></span></a>';
		else
			echo'<a href="albumaSortu.php"><span>Albuma sortu</span></a>';
		
		if($_GET['orrialdea']=="bildumaAukeratu") //Bildumak ikusi aurrerago aukeratu eta argazkiak ezabatu ahal izateko
			echo'<a href="bildumaAukeratu.php"><span id="act-sel" class="act-sel">Bildumak ikusi<div class="arrow-right"></div></span></a>';
		else
			echo'<a href="bildumaAukeratu.php"><span>Bildumak ikusi</span></a>';
		
		if($_GET['orrialdea']=="argazkiakIgo") //Argazkiak albumei esleitzeko aukera
			echo'<a href="argazkiakIgo.php"><span id="act-sel" class="act-sel">Argazkiak igo<div class="arrow-right"></div></span></a>';
		else
			echo'<a href="argazkiakIgo.php"><span>Argazkiak igo</span></a>';
		
		if($_GET['orrialdea']=="argazkiakKudeatu") //Argazkiak kudeatzeko aukera
			echo'<a href="argazkiakKudeatu.php"><span id="act-sel" class="act-sel">Argazkiak kudeatu<div class="arrow-right"></div></span></a>';
		else
			echo'<a href="argazkiakKudeatu.php"><span>Argazkiak kudeatu</span></a>';
		
		if($_GET['orrialdea']=="etiketakKudeatu") //Argazkiak kudeatzeko aukera
			echo'<a href="etiketakKudeatu.php"><span id="act-sel" class="act-sel">Etiketak kudeatu<div class="arrow-right"></div></span></a>';
		else
			echo'<a href="etiketakKudeatu.php"><span>Etiketak kudeatu</span></a>';
		if($_GET['orrialdea']=="showUsers") //Erabiltzaileak ikusi
			echo'<a href="ShowUsersWithImage.php"><span id="act-sel" class="act-sel">Erabiltzaileak ikusi<div class="arrow-right"></div></span></a>';
		else
			echo'<a href="ShowUsersWithImage.php"><span>Erabiltzaileak ikusi</span></a>';
	}
	
	if($_SESSION['mota'] == "GUEST") {
		if($_GET['orrialdea']=="bildumaAukeratu") //Bildumak ikusi aurrerago aukeratu eta argazkiak ezabatu ahal izateko
			echo'<a href="bildumaAukeratu.php"><span id="act-sel" class="act-sel">Bildumak ikusi<div class="arrow-right"></div></span></a>';
		else
			echo'<a href="bildumaAukeratu.php"><span>Bildumak ikusi</span></a>';
	}
	
	if($_GET['orrialdea']=="credits") //kredituak
		echo('<a href="credits.php"><span id="act-sel" class="act-sel">Kredituak<div class="arrow-right"></div></span></a>');
	else
		echo('<a href="credits.php"><span>Kredituak</span></a>');
	?>
	</nav>