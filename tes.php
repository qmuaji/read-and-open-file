<?php 
$file 	= file('log.txt');
$baris 	= count($file);

// echo $baris;
// echo $file[2];
$mau = "rbs-siapp44 Fri Nov 20 11:02:39 wib 2015 ";

for($i=$baris-1; $i>=0; $i--) {
	// echo $i."<br>";	
	if($mau = preg_match("/ wib /i", $file[$i])) {
		echo 'sama<br>';
	}
}

 ?>