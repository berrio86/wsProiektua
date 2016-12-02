<?php
include 'dbkonexioak/dbConfig.php';
$db = new mysqli(HOST, USER, PASS, DATABASE);

	if($db->connect_error){
		die ("<div class='message'>Datu basera konektatzean akatsa egon da: (".$db->connect_errno.")".$db->connect_error."</div></br>");
	}else{
		echo("<div class='message'>Datu basera konexioa ongi burutu da: ".$db->host_info."</div></br>");
		null;
	}

?>
