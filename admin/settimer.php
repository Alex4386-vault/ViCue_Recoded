<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Set Timer</title>
<!--
<meta http-equiv="refresh" content="1;url=index.html" />
-->
<link rel="stylesheet" href="http://fonts.googleapis.com/earlyaccess/notosanskr.css">
</head>

<body style="background-color:#242424 !important; color:#FFF; font-family: 'Noto Sans KR', sans-serif;">
	Loading PHP binaries..... <br>
	
	<p><h1><strong>Welcome to ViCue 6.0 debug zone....</strong></h1></p>
	
	<?php
		$fileread1 = fopen("../data/timer/min.html", "r") or die("Unable to open minute file to read was impossible! contact developer!");
		$fileread2 = fopen("../data/timer/sec.html", "r") or die("Unable to open second file to read was impossible! contact developer!");
		
		echo ("old timer : ");
		echo ("<strong>");
		$oldmin = fread($fileread1,filesize("../data/timer/min.html"));
		echo $oldmin;
		echo ("minutes ");
		$oldsec = fread($fileread2,filesize("../data/timer/sec.html"));
		echo $oldsec;
		echo ("seconds</strong><br>");
	
	
	
		echo ("now writing new queue data<br><br>");
		fclose($fileread1);
		fclose($fileread2);
	
	
	
		$filewrite1 = fopen("../data/timer/min.html", "w") or die("Unable to open minute file to write was impossible! contact developer!");
		$filewrite2 = fopen("../data/timer/sec.html", "w") or die("Unable to open second file to write was impossible! contact developer!");
		
		
		echo("starting to write new value at queue");
		$emergency_writeinterruption1 = ("stop");
		$emergency_writeinterruption2 = ("stop");
	
		$min = $_POST["timer_min"] or $emergency_writeinterruption1 = ("activate");
		$sec = $_POST["timer_sec"] or $emergency_writeinterruption2 = ("activate");	
	
		if($emergency_writeinterruption1 == "activate")
		{
			echo ("minute value not found!!!<br>");
			echo ("Setting value to 0<br>");
			$min = ("00");
			
		}
		
		if($emergency_writeinterruption2 == "activate")
		{
			echo ("second value not found!!!<br>");
			echo ("Setting value to 0<br>");
			$sec = ("00");
		}
	
//check if xss

   echo ("Preventing Cross-Site Scripting...<br>");

  $min = str_ireplace("<iframe","<preventxss_iframe",$min);

  $min = str_ireplace("</iframe>","</preventxss_iframe>",$min);

$min = str_ireplace("<object","<preventxss_object",$min);

$min = str_ireplace("</object>","</preventxss_object>",$min);


 $min = str_ireplace("<script","<preventxss_script",$min);

  $min = str_ireplace("</script>","</preventxss_script>",$min);
	
	$min = str_ireplace("<img","<preventxss_img",$min);

	$min = str_ireplace("<svg","</preventxss_svg",$min);

		fwrite($filewrite1, $min);
	
		fclose($filewrite1);

//check if xss

   echo ("Preventing Cross-Site Scripting...<br>");

  $sec = str_ireplace("<iframe","<preventxss_iframe",$sec);

  $sec = str_ireplace("</iframe>","</preventxss_iframe>",$sec);

$sec = str_ireplace("<object","<preventxss_object",$sec);

$sec = str_ireplace("</object>","</preventxss_object>",$sec);

 $sec = str_ireplace("<script","<preventxss_script",$sec);

  $sec = str_ireplace("</script>","</preventxss_script>",$sec);
							  
	$sec = str_ireplace("<img","<preventxss_img",$sec);

	$sec = str_ireplace("<svg","</preventxss_svg",$sec);
		
		fwrite($filewrite2, $sec);
	
		fclose($filewrite2);
		
		echo ("wrote");
		echo $min;
		echo (":");
		echo $sec;
		
    
	
		//echo ("<br><br><br>if page doesn't redirect back to admin page, then, please use <a href=\"index.html\"> this link. </a>");	
    
        $logger = fopen("../data/log.html", "a") or die("Logging System Failure!!");
    
        $ip_address = $_SERVER['REMOTE_ADDR'] or die("IP Log Failed");
        //Log some IP
        date_default_timezone_set("Asia/Seoul");
        $current_date = date("Y-m-d");
        $current_time = date("h:i:sa");
    
        $log = ("<span style=\"color:#2980b9\"><strong>[ADMIN]</strong></span> 타이머가 <strong>" . $min . " : " . $sec . "</strong>로 설정되었습니다. <span style=\"font-size:8px\">" . $current_date . " " . $current_time . " at IP:" . $ip_address . "</span> <br> \n");
		
        fwrite($logger, $log);
        echo ("Successfully Logged. ");
		fclose($logger);
		echo ("<script type=\"text/javascript\"> setTimeout(\"self.close()\", 1500); </script>");
	?>
	
</body>
</html>
