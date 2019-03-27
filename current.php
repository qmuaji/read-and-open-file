<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Check Backlog v1</title>
	<style>
		body{
			font-family: consolas; 
			font-size: 14px; 
		}
		p{
			font-family: consolas; 
			font-size: 14px
		}
		a:visited{
			color: #076fd0
		}	
		th, td {
		    padding: 10px;
		}
		table, th, td {
		    border: 1px solid black;
		    border-collapse: collapse;
		}
		h1{
			color:orange;
		}
		input{
			padding: 10px;
			background: orange;
			font-size: 20px;
			color: white;
			width: 100%;
		}
	</style>
</head>
<body>
<h1 align="center">Monitoring Backlog OCS</h1>
<h2>Current Status:</h2>
	<table align="center" style="width:100%">
		<tr>
		<?php
	
		for($u=1; $u<=3; $u++) {
			$file  = file("backlog$u.txt");
			$baris = count($file);
		
			if ($baris>7) {
			 
				?>
				<th style="font-size:18px">
				<?php
					$node  = substr($file[0], 23,3);
					if($node=='srb'){
						$site = "SURABAYA";
					} elseif($node=='plg'){
						$site = "PALEMBANG";
					} elseif($node=='mkp'){
						$site = "MAKASAR";
					} elseif($node=='pkb'){
						$site = "PEKANBARU";
					} elseif($node=='iap'){
						$site = "TBS";
					} elseif($node=='bjm'){
						$site = "BANJARMASIN";
					}
					$time = explode(" ", $file[0]);
					echo "<font style='color:blue'>$site </font>$time[4] $time[3] $time[7] $time[5] $time[6]";
				?>
				</th>
				<?php
			}
		}
				?>
		</tr>
		<tr>
		<?php 
			for($u=1; $u<=3; $u++) {
				$file  = file("backlog$u.txt");
				$baris = count($file);

				if ($baris>7) {		 
				?>
				<td valign="top">
				<?php
				$loop  = $baris-2;
				$ket="";
					for($i=0; $i<=$loop; $i++){

						$dsn = preg_match("/DSN: /i", $file[$i]);

						if($dsn){

							for($j=1; $j<5; $j++) {
								// echo $j.'<br>';

								$cari = explode(", ", $file[$i+1]);
								$cari2 = explode(", ", $file[$i+2]);
								//echo $cari['2'].'<br>';
								
								if(trim($cari[2])!=="Checkpoint" || trim($cari2[2])!=="Checkpoint"){

									for($s=$i; $s>=0; $s--) {
										if(preg_match("/ wib /i", $file[$s])) {
											$st = trim(str_replace("=", "", $file[$s]));

											echo "<font style='color:red; font-size:18px'>".$st."</font>";
											break 1;
										}
									}

									$l1 = $file[$i-1];
									$l2 = $file[$i];
									$l3 = $file[$i+2];
									$l4 = $file[$i+1];
									$l5 = $file[$i+3];
									$l6 = $file[$i+4];
									$l7 = $file[$i+5];	
									
									echo "<b>".$l1."</b><br>";
									echo "<font style='color:red; font-size:18px'> ".$l2."</font><br>";
									echo $l3."<br>";
									echo $l4."<br>";
									echo $l5."<br>";
									echo $l6."<br>";
									echo $l7."<br><br>";

									$ket="n";
									break 1;
								}
									
							}
						}
					}	
					if($ket=="")echo "<h2 align='center' style='color:green'>Normal</h2>";
				}
			}		
			?>
				</td>
				<?php 
					 ?>
			</tr>
			<tr>
<!-- ======================================================== split ======================================= -->

		<?php	
		for($u=4; $u<=6; $u++) {
			$file  = file("backlog$u.txt");
			$baris = count($file);
		
			if ($baris>7) {
			 
				?>
				<th style="font-size:18px">
				<?php
					$node  = substr($file[0], 23,3);
					if($node=='srb'){
						$site = "SURABAYA";
					} elseif($node=='plg'){
						$site = "PALEMBANG";
					} elseif($node=='mkp'){
						$site = "MAKASAR";
					} elseif($node=='pkb'){
						$site = "PEKANBARU";
					} elseif($node=='iap'){
						$site = "TBS";
					} elseif($node=='bjm'){
						$site = "BANJARMASIN";
					}
					$time = explode(" ", $file[0]);
					echo "<font style='color:blue'>$site </font>$time[4] $time[3] $time[7] $time[5] $time[6]";
				?>
				</th>
				<?php
			}
		}
				?>
		</tr>
		<tr>
		<?php 
			for($u=4; $u<=6; $u++) {
				$file  = file("backlog$u.txt");
				$baris = count($file);

				if ($baris>7) {		 
				?>
				<td valign="top">
				<?php
				$loop  = $baris-2;
				$ket="";
					for($i=0; $i<=$loop; $i++){

						$dsn = preg_match("/DSN: /i", $file[$i]);

						if($dsn){

							for($j=1; $j<5; $j++) {
								// echo $j.'<br>';

								$cari = explode(", ", $file[$i+1]);
								$cari2 = explode(", ", $file[$i+2]);
								//echo $cari['2'].'<br>';
								
								if(trim($cari[2])!=="Checkpoint" || trim($cari2[2])!=="Checkpoint"){

									for($s=$i; $s>=0; $s--) {
										if(preg_match("/ wib /i", $file[$s])) {
											$st = trim(str_replace("=", "", $file[$s]));
											
											echo "<font style='color:red; font-size:18px'>".$st."</font>";
											break 1;
										}
									}

									$l1 = $file[$i-1];
									$l2 = $file[$i];
									$l3 = $file[$i+2];
									$l4 = $file[$i+1];
									$l5 = $file[$i+3];
									$l6 = $file[$i+4];
									$l7 = $file[$i+5];
									
									echo "<b>".$l1."</b><br>";
									echo "<font style='color:red; font-size:18px'> ".$l2."</font><br>";
									echo $l3."<br>";
									echo $l4."<br>";
									echo $l5."<br>";
									echo $l6."<br>";
									echo $l7."<br><br>";

									$ket="n";
									break 1;
								}
									
							}
						}
					}	
					if($ket=="")echo "<h2 align='center' style='color:green'>Normal</h2>";
				}
			}		
			?>
				</td>
			</tr>
	</table> 	

	<h2 align="center"><a href="./">Back</a> | <a href="log.txt">History Backlog</a></h2>
</body>
<footer><br><br>
	<p style="color:grey" align="center">Risky Muaji © 2015</p>		
</footer>
</html>
