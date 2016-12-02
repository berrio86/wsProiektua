
<?php
	if (isset($_POST['eposta']) && isset($_POST['g-recaptcha-response'])){
	
		include 'dbkonexioak/dbOpen.php';
		if($_SERVER['REQUEST_METHOD'] == 'GET')  { //get eskaera
			null;
		} else { //post eskaera	
			
			$eposta=$_POST['eposta'];
        	$captcha=$_POST['g-recaptcha-response'];
        	if(!$captcha){
        		echo '<h2>Mesedez klikatu ezazu captcha!!</h2>';
        		exit;
        	}
        
			$secretKey = "6LerogsUAAAAAHiIYXlWy9QM40UIUnppNhiXi_Dq";
        	$ip = $_SERVER['REMOTE_ADDR'];
        	$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        	$responseKeys = json_decode($response,true);
        	/*if(intval($responseKeys["success"]) !== 1) {
          		echo '<h2>Madarikatua hi, spam zikina!!</h2>';
        	} else {*/
				
				//pasahitz aleatorioa sortu 8 karaktererekin
    			$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    			$pass = array(); //$pass array bat bezala deklaratu
    			$alphaLength = strlen($alphabet) - 1; 
    			for ($i = 0; $i < 8; $i++) {
        			$n = rand(0, $alphaLength);
        			$pass[] = $alphabet[$n];
    			}
    			$berria=implode($pass); //$pass array-a string bat bihurtu
				
				//emaila bidali
				echo $eposta.'<br>';
				echo $berria.'<br>';
				
				
				$to      = $eposta;
				$subject = 'Pasahitz aldaketa';
				$message = 'Kaixo,
				Zure emaila aldatzeko eskaera jaso dugu. Zure pasahitz berria honako hau da:
								pasahitza='.$berria;
				$headers = 'From: iberriochoa001@ikasle.ehu.eus' . "\r\n" .
							'Reply-To: iberriochoa001@ikasle.ehu.eus' . "\r\n" .
    						'X-Mailer: PHP/' . phpversion();
				if(mail($to, $subject, $message, $headers)){
					//aldaketak datu basean sartu
					if (!$db) {
						echo "Hutxegitea MySQLra konektatzerakoan. "."</br>";
						echo "errno depurazio akatsa: ".mysqli_connect_errno()."</br>";
						echo "error depurazio akatsa: ".mysqli_connect_error()."</br>";
						
					}
					$emaitza = mysqli_query($db,"UPDATE erabiltzaileak SET Pasahitza=SHA('$berria') WHERE PostaElektronikoa='$eposta'"); 
					echo "Dena ondo joan da, orain emaila bidaliko dizugu.</br>
					  Denbora gutxi barru emailik jasotzen ez baduzu, saiatu zaitez berriro.";
				}else{
					echo "Errore bat egon da emaila bidaltzean.";
				}
			
				echo "</br> Hasierara bueltatu nahi baduzu, klikatu hurrengo estekan: <a href='".HASIERA."'> Hasiera </a>";
        	}
		
		
		
		//}
	}
	include 'dbkonexioak/dbClose.php';
?>