<?php
if(session_status() == PHP_SESSION_NONE){
	session_start();
}
include"dbkonexioak/dbOpen.php";
if(isset($_GET['helbidea'])) {
	echo "<img id='argazkia' src='".$_GET['helbidea']."' style='width:150px; height: 100px; ' class='argazkia'/>";
}
include "dbkonexioak/dbClose.php";
?>