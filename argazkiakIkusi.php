<!DOCTYPE html>
<?php $bildumaIzena=$_GET['bildumax']; ?>
<html lang="en-US">
<head>
    <meta charset="UTF-8" />
    <?php include 'title.php' ?>
	<link rel="icon" type="image/png" href="irudiak/question-logo.png">
    <link rel="stylesheet" type="text/css" media="all" href="./css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" media="all" href="./css/jgallery.min.css" />
    <script type="text/javascript" src="./js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="./js/tinycolor-0.9.16.min.js"></script>
    <script type="text/javascript" src="./js/jgallery.min.js"></script>
    <script type="text/javascript">
    $( function() {
        $( '#gallery' ).jGallery( {
            'mode': 'standard'
        } );
    } );
    </script>
</head>
<body style="color: #fff; background: #000;">
    <div style="padding: 40px 0; width: 960px; margin: 0 auto; height: auto;">
        <div id="gallery">
	

            
<?php 
session_start();	
if(isset($_SESSION['eposta'])){

	$jabea=$_GET['jabeax'];
	$bildumaIzena=$_GET['bildumax']; //$bilduma

		
	include 'dbkonexioak/dbOpen.php';
/*
	if($_SESSION['mota']=="Administratzailea") {
		$bildumaquery = "SELECT * FROM Bilduma";
	} else {
		$bildumaquery = "SELECT * FROM Bilduma WHERE Jabea='$jabea' AND Izena='$bilduma'";
	}

	$bildumak = $db->query($bildumaquery); 
		


	while ($lerroa = $bildumak->fetch_array(MYSQLI_BOTH)){
		
		
		$bildumaIzena=$lerroa['Izena'];
		//echo $bildumaIzena;
		
		*/
		echo "<div class='album' data-jgallery-album-title='$bildumaIzena'>";
		echo '<h1>'.$bildumaIzena.'</h1>';
		//if($_SESSION['mota']=="Administratzailea") {
		//	$argazkiaquery = "SELECT * FROM Argazkia WHERE BildumaIzena='$bildumaIzena'";
		//} else {
			$argazkiaquery = "SELECT * FROM Argazkia WHERE Jabea='$jabea' AND BildumaIzena='$bildumaIzena'";
		//}	
		$argazkiak = $db->query($argazkiaquery); 
		while ($lerroa2 = $argazkiak->fetch_array(MYSQLI_BOTH)){
			$helbidea=$lerroa2['Helbidea'];
			echo"<a href='$helbidea'><img src='$helbidea' alt='Jon Arzelus eta Iñaki Berriotxoa'  data-jgallery-bg-color='#3e3e3e' data-jgallery-text-color='#fff' /></a>";	
		}
		
		echo'</div>';
		
	}


	include 'dbkonexioak/dbClose.php';
//}
?>					
			  
           </div>
    </div>
</body>
</html>