<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Activating Emergency Mode!!</title>
<meta http-equiv="refresh" content="1;url=index.html" />
</head>

<body style="background-color:#242424 !important; color:#FFF">
	Loading PHP binaries..... <br>
	
	<p><h1><strong>Welcome to ViCue 6.0 debug zone....</strong></h1></p>
	
	<?php
		$fileread1 = fopen("../data/message.html", "r") or die("Unable to open notice file to read was impossible! contact developer!");
		$fileread2 = fopen("../data/cue.html", "r") or die("Unable to open cue file to read was impossible! contact developer!");
		
		echo ("old notice : ");
		echo ("<strong>");
		$oldnotice = fread($fileread1,filesize("../data/message.html"));
		echo $oldnotice;
		echo ("</strong><br>");
	
		echo ("old cue : ");
		echo ("<strong>");
		$oldcue = fread($fileread2,filesize("../data/cue.html"));
		echo $oldcue;
		echo ("</strong><br>");
	
	
	
		echo ("now writing EMERGENCY data<br><br>");
		fclose($fileread1);
		fclose($fileread2);
	
	
	
		$filewrite1 = fopen("../data/message.html", "w") or die("Unable to open notice file to write was impossible! contact developer!");
		$filewrite2 = fopen("../data/cue.html", "w") or die("Unable to open cue file to write was impossible! contact developer!");
		
		
		echo("starting to write new value at queue<br>");
		$emergency_cue = ("emergency");
		$emergency_notice = ("<strong><span style=\"color:#e74c3c\">비상! </span>무대</strong>에서&nbsp;<br />비상사태가 발생했습니다!");
		
		fwrite($filewrite1, $emergency_notice);
		echo ("<br><br>current notice <b>");
		echo $emergency_notice;
		echo ("</b> is written.");
	
		fclose($filewrite1);
		
		fwrite($filewrite2, $emergency_cue);
		echo ("<br><br>current cue <b>");
		echo $emergency_cue;
		echo ("</b> is written.");
	
		fclose($filewrite2);
        
        $logger = fopen("../data/log.html", "a") or die("Logging System Failure!!");
    
        $ip_address = $_SERVER['REMOTE_ADDR'] or die("IP Log Failed");
        //Log some IP
<<<<<<< HEAD
    
        date_default_timezone_set("Asia/Seoul");
        $current_date = date("Y-m-d");
        $current_time = date("h:i:sa");    
        
        $log = ("<span style=\"color:#2980b9\"><strong>[STAGE]</strong></span> <strong><span style=\"color:#e74c3c\">비상! </span>무대 구역</strong>에서&nbsp;비상사태가 발생했습니다! <span style=\"font-size:8px\">" . $current_date . " " . $current_time . " at IP:" . $ip_address . "</span> <br> \n");
=======
        $current_date = date("Y-m-d");
        $current_time = date("h:i:sa");    
        date_default_timezone_set("Asia/Seoul");
        $log = ("<span style=\"color:#2980b9\"><strong>[STAGE]</strong></span> <strong><span style=\"color:#e74c3c\">비상! </span>무대 구역</strong>에서&nbsp;<br />비상사태가 발생했습니다! <span style=\"font-size:8px\">" . $current_date . " " . $current_time . " at IP:" . $ip_address . "</span> <br> \n");
>>>>>>> 3670849... Xtreme update, Huh?
            
    
             
        fwrite($logger, $log);
        echo ("Successfully Logged. ");
    
        fclose($logger);
		echo ("<br><br><br>if page doesn't redirect back to admin page, then, please use <a href=\"index.html\"> this link. </a>");	
		
    
	?>
	
</body>
</html>
