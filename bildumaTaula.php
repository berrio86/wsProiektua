<?php 
if(session_status() == PHP_SESSION_NONE){
	session_start();
}
include 'dbkonexioak/dbOpen.php'; 
$eposta=$_SESSION['eposta'];
$mota=$_SESSION['mota'];

if(isset($_GET['ezabatuBilduma'])) {
	$jabea=$_GET['jabeax'];
	$bilduma=$_GET['ezabatuBilduma'];
	//datu basetik ezabatu
	$ezabatuArgazkiak = "DELETE FROM Argazkia WHERE Jabea='$jabea' AND BildumaIzena='$bilduma'";
	$db->query($ezabatuArgazkiak); 
	
	$ezabatuBilduma = "DELETE FROM Bilduma WHERE Jabea='$jabea' AND Izena='$bilduma'";
	$db->query($ezabatuBilduma); 
	
	$helbidea="bildumak/".$jabea."/".$bilduma;
	//ezabatu karpeta eta barruko argazkiak
    if (! is_dir($helbidea)) {
        throw new InvalidArgumentException("$helbidea helbidea izan beharra dauka");
    }
    if (substr($helbidea, strlen($helbidea) - 1, 1) != '/') {
        $helbidea .= '/';
    }
    $files = glob($helbidea . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($helbidea);
}


if($mota=="Administratzailea"){
	$erabiltzaileak = "SELECT * FROM Bilduma";
}else{
	$erabiltzaileak = "SELECT * FROM Bilduma WHERE Jabea='$eposta'";
}

$emaitza = $db->query($erabiltzaileak); 
echo ('<table>
					<tr>
						<th style="text-align:center"> Jabe Posta </th>
						<th style="text-align:center"> Bilduma Izena </th>
						<th style="text-align:center"> Aukeratu </th>
						<th style="text-align:center"> Ezabatu </th>	
						
					</tr> ');

while ($lerroa = $emaitza->fetch_array(MYSQLI_BOTH)){
	$jabea=$lerroa['Jabea'];
	$bildumaIzena=$lerroa['Izena'];
	$gakoNagusia=$jabea.",".$bildumaIzena;
	echo '<tr>';
		echo '<td>'.$lerroa['Jabea'].'</td>';
		echo '<td>'.$lerroa['Izena'].'</td>';
		echo ("<td style='text-align:center'><input type='button' style='width:100%;' value='Aukeratu' onclick='aukeratu(\"".$jabea."\",\"".$bildumaIzena."\")'></td>");
		echo ("<td style='text-align:center'><input name='onartu' type='button' style='width:100%;' value='Ezabatu' onclick='ezabatu(\"".$jabea."\",\"".$bildumaIzena."\")'></td>");
	echo("</tr>");
}
echo '</table>';
include 'dbkonexioak/dbClose.php';
?>

