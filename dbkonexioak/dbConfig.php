<?php
//automatikoki ikusi ea localhosten gauden ala ez
$host=$_SERVER['SERVER_NAME'];
if ($host=="localhost"){
	//localhost-en atzitzeko
	define("HOST","localhost");
	define("USER", "root");
	define("PASS", "");
	define("DATABASE", "argazkiBilduma");
	//define("ESTEKA","ShowUsersWithImage.php");
	//define("HASIERA","layout.php");
	//define("SIGNUP","signUp.php");
}else{
	//hostingerren atzitzeko
	define("HOST","mysql.hostinger.es");
	define("USER", "u418151680_ab");
	define("PASS", "websist1");
	define("DATABASE", "u418151680_ab");
	//define("ESTEKA","http://berriogit.hol.es/ShowUsersWithImage.php");
	//define("HASIERA","http://berriogit.hol.es/layout.php");
	//define("SIGNUP","http://berriogit.hol.es/signUp.php");
}
?>