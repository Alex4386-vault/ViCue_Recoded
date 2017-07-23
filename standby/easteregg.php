<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Activating Emergency Mode!!</title>
<!--<meta http-equiv="refresh" content="1;url=index.html" />-->
<link rel="stylesheet" href="http://fonts.googleapis.com/earlyaccess/notosanskr.css">
</head>

<body style="background-color:#242424 !important; color:#FFF; font-family: 'Noto Sans KR', sans-serif;">
	Loading PHP binaries..... <br>
	
	<p><h1><strong>Welcome to ViCue 6.0 EASTEREGG zone....</strong></h1></p>
	
	<?php
		$fileread2 = fopen("../data/cue.html", "r") or die("Unable to open cue file to read was impossible! contact developer!");
		
		echo ("old cue : ");
		echo ("<strong>");
		$oldcue = fread($fileread2,filesize("../data/cue.html"));
		echo $oldcue;
		echo ("</strong><br>");
	
	
	
		echo ("now writing EASTEREGG data<br><br>");
	
		fclose($fileread2);
	
	
	
		
		$filewrite2 = fopen("../data/cue.html", "w") or die("Unable to open cue file to write was impossible! contact developer!");
		
		
		echo("starting to write new value at queue<br>");
		$emergency_cue = ("baka");
		
		
		
		fwrite($filewrite2, $emergency_cue);
		echo ("<br><br>current cue <b>");
		echo $emergency_cue;
		echo ("</b> is written.");
	
		fclose($filewrite2);
	
		//echo ("<br><br><br>if page doesn't redirect back to admin page, then, please use <a href=\"index.html\"> this link. </a>");	
		
        $logger = fopen("../data/log.html", "a") or die("Logging System Failure!!");
    
        $ip_address = $_SERVER['REMOTE_ADDR'] or die("IP Log Failed");
        //Log some IP
    
        date_default_timezone_set("Asia/Seoul");
        $current_date = date("Y-m-d");
        $current_time = date("h:i:sa");    
        
        $log = ("<span style=\"color:#2980b9\"><strong>[STANDBY]</strong>대기실 구역에서 이스터 에그가 구동되었습니다. </span> <span style=\"font-size:8px\">" . $current_date . " " . $current_time . " at IP:" . $ip_address . "</span> <br> \n");
    
             
        fwrite($logger, $log);
        echo ("Successfully Logged. ");
        fclose($logger);
		echo ("<script type=\"text/javascript\"> setTimeout(\"self.close()\", 1500); </script>");
	?>
	
</body>
</html>
