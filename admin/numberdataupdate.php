<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Write Current Number</title>
<!--
<meta http-equiv="refresh" content="1;url=index.html" />
-->
<link rel="stylesheet" href="http://fonts.googleapis.com/earlyaccess/notosanskr.css">
</head>

<body style="background-color:#242424 !important; color:#FFF; font-family: 'Noto Sans KR', sans-serif;">
	Loading PHP binaries..... <br>
	
	<p><h1><strong>Welcome to ViCue 6.0 debug zone....</strong></h1></p>
	
	<?php
		$fileread = fopen("../data/currentnumber.html", "r") or die("Unable to open file to read was impossible! contact developer!");
		
		echo ("old current number : ");
		echo ("<strong>");
		echo fread($fileread,filesize("../data/currentnumber.html"));
		echo ("</strong><br>");
	
		echo ("now writing new number<br><br>");
		fclose($fileread);
	
		$filewrite = fopen("../data/currentnumber.html", "w") or die("Unable to open file to write was impossible! contact developer!");
		
		
		
		echo("starting to write new value");
		$emergency_number = ("stop");
		$new_number = $_POST["new_number"] or $emergency_number = ("activate");
		
		if($emergency_number == "activate")
		{
			echo("<br><b>SEVERE ERROR : </b>cue_new value is not found<br>");
			echo("<b>ERROR HANDLING : </b>using value <strong>1</strong> instead");
			$new_number = ("1");
		}
		
		echo ("<br> Prevent XSS!");
		$new_number = str_ireplace("/<iframe","<preventxss_iframe",$new_number);

	$new_number = str_ireplace("</iframe>","</preventxss_iframe>",$new_number);

$new_number = str_ireplace("<object","<preventxss_object",$new_number);

$new_number = str_ireplace("</object>","</preventxss_object>",$new_number);

		
 $new_number = str_ireplace("<script","<preventxss_script",$new_number);

  $new_number = str_ireplace("</script>","</preventxss_script>",$new_number);
	
	$new_number = str_ireplace("<img","<preventxss_img",$new_number);

	$new_number = str_ireplace("<svg","</preventxss_svg",$new_number);
		fwrite($filewrite, $new_number);
		echo ("<br><br>new value <b>");
		echo $new_number;
		echo ("</b> is written.");
	
		fclose($filewrite);
	
		//echo ("<br><br><br>if page doesn't redirect back to admin page, then, please use <a href=\"index.html\"> this link. </a>");	
    
        //THE LOGGER SYSTEM BELOW.    
        
       $logger = fopen("../data/log.html", "a") or die("Logging System Failure!!");
    
        $ip_address = $_SERVER['REMOTE_ADDR'] or die("IP Log Failed");
        //Log some IP
        date_default_timezone_set("Asia/Seoul");
	    $current_date = date("Y-m-d");
        $current_time = date("h:i:sa");	
    
        $log = ("<span style=\"color:#2980b9\"><strong>[ADMIN]</strong></span> 현재 순번이 <strong>" . $new_number . "</strong>로 변경되었습니다. <span style=\"font-size:8px\">" . $current_date . " " . $current_time . " at IP:" . $ip_address . "</span> <br> \n");
    
        fwrite($logger, $log);
        echo ("Successfully Logged. ");
        fclose($logger);
		echo ("<script type=\"text/javascript\"> setTimeout(\"self.close()\", 1500); </script>");
	?>
	
</body>
</html>
