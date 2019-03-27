<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Check Backlog v1</title>

	<script language="javascript" type="text/javascript">
		window.history.forward(1);
		document.attachEvent("onkeydown", my_onkeydown_handler);
		function my_onkeydown_handler()
		{
			switch (event.keyCode)
			{
				case 116 : // 'F5'
				event.returnValue = false;
				event.keyCode = 0;
				//window.status = "We have disabled F5";
				break;
			}
		} 
			document.onmousedown=disableclick;
			status="Right Click is not allowed";
			function disableclick(e)
			{
				if(event.button==2)
				{
					alert(status);
					return false;	
				}
			}
	</script> 

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
<?php
$buka_log   = fopen('log.txt', 'a');
if(!empty($_POST)) {

	$isi1 = $_POST['bc1'];
	$isi2 = $_POST['bc2'];
	$isi3 = $_POST['bc3'];
	$isi4 = $_POST['bc4'];
	$isi5 = $_POST['bc5'];
	$isi6 = $_POST['bc6'];

	if(empty($isi1) && empty($isi2) && empty($isi3) && empty($isi4) && empty($isi5) && empty($isi6)){
		exit("<h1>Maaf, gagal di proses. Silahkan masukan alert dari email! <a href='./'>Kembali</a></h1><body></html>");
	}

	unlink('backlog1.txt');
	unlink('backlog2.txt');
	unlink('backlog3.txt');
	unlink('backlog4.txt');
	unlink('backlog5.txt');
	unlink('backlog6.txt');
	
	$buka_file1 = fopen('backlog1.txt', 'a');
	$buka_file2 = fopen('backlog2.txt', 'a');
	$buka_file3 = fopen('backlog3.txt', 'a');
	$buka_file4 = fopen('backlog4.txt', 'a');
	$buka_file5 = fopen('backlog5.txt', 'a');
	$buka_file6 = fopen('backlog6.txt', 'a');


	if (!($buka_file1 || $buka_file2 || $buka_file3 || $buka_file4 || $buka_file5 || $buka_file6)) {
		echo "<h2>Maaf, gagal di proses. Mohon coba lagi nanti <a href='./'>Back</a></h2><body></html>";
		exit;
	}

	fwrite($buka_file1, $isi1);
	fwrite($buka_file2, $isi2);
	fwrite($buka_file3, $isi3);
	fwrite($buka_file4, $isi4);
	fwrite($buka_file5, $isi5);
	fwrite($buka_file6, $isi6);

	fclose($buka_file1);
	fclose($buka_file2);
	fclose($buka_file3);
	fclose($buka_file4);
	fclose($buka_file5);
	fclose($buka_file6);

?>
<body>
<h1 align="center">Monitoring Backlog OCS</h1>
<h2>Jika ada BACKLOG, Dilarang me-refresh (f5) halaman ini!</h2>
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
											
											fwrite($buka_log, $st);
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

									$log = $l1. $l2. $l3. $l4. $l5. $l6. $l7."\n";
									
									fwrite($buka_log, $log);

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
											
											fwrite($buka_log, $st);
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

									$log = $l1. $l2. $l3. $l4. $l5. $l6. $l7."\n";
									fwrite($buka_log, $log);

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
<?php 
} else echo "<h1>Jangan di refresh bro!</h1>";

	fclose($buka_log);
	
	$_POST['bc1']="";
	$_POST['bc2']="";
	$_POST['bc3']="";
	$_POST['bc4']="";
	$_POST['bc5']="";
	$_POST['bc6']="";

?>
	<h2 align="center"><a href="./">Back</a> | <a href="log.txt" target="_blank">History Backlog</a></h2>
</body>
<footer><br><br>
	<p style="color:grey" align="center">Risky Muaji © 2015</p>		
</footer>
</html>
