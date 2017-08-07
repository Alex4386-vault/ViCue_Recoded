<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Write Cue</title>
<!--
<meta http-equiv="refresh" content="1;url=index.html" />
-->
<link rel="stylesheet" href="http://fonts.googleapis.com/earlyaccess/notosanskr.css">
</head>

<body style="background-color:#242424 !important; color:#FFF; font-family: 'Noto Sans KR', sans-serif;">
	Loading PHP binaries..... <br>
	
	<p><h1><strong>Welcome to ViCue 6.0 debug zone....</strong></h1></p>
	
	<?php
		$filereadcountdown = fopen("../data/countdown.html", "r") or die("Unable to open countdown file to read was impossible! contact developer!");
		
		$fileread = fopen("../data/cue.html", "r") or die("Unable to open file to read was impossible! contact developer!");
		
		echo ("original cue data : ");
		echo ("<strong>");
		echo fread($fileread,filesize("../data/cue.html"));
		echo ("</strong><br>");
	
		echo ("old countdown : ");
		echo ("<strong>");
		$oldcountdown = fread($filereadcountdown,filesize("../data/countdown.html"));
		echo $oldcountdown;
		echo ("</strong><br>");
		
		echo ("now writing cue data<br><br>");
		fclose($fileread);
	
		$filewrite = fopen("../data/cue.html", "w") or die("Unable to open file to write was impossible! contact developer!");
		$filewritecountdown = fopen("../data/countdown.html", "w") or die("Unable to open countdown file to write was impossible! contact developer!");

		
		
		echo("starting to write new value");
		$emergency_cue = ("stop");
		$countdown_nodata = ("NOPE");
		$new_cue = $_POST["cue_new"] or $emergency_cue = ("activate");
		$countdown_info = $_POST["countdown_destination"] or $countdown_nodata = ("YES");
		
		if($emergency_cue == "activate")
		{
			echo("<br><b>SEVERE ERROR : </b>cue_new value is not found<br>");
			echo("<b>ERROR HANDLING : </b>using value <strong>nan</strong> instead<br>");
			$new_cue = ("nan");
		}
		
		if($countdown_info == "-")
		{
			echo ("Using Cue only mode<br>");
			$countdown_info = $oldcountdown;
		}
		
		if($countdown_nodata == "YES")
		{
			echo("<br><b>SEVERE ERROR : </b>countdown value is not found<br>");
			echo("<b>ERROR HANDLING : </b>using old value instead<br>");
			$countdown_info = $oldcountdown;
		}

//check if xss

   echo ("Preventing Cross-Site Scripting...<br>");

  $new_cue = str_ireplace("<iframe","<preventxss_iframe",$new_cue);

  $new_cue = str_ireplace("</iframe>","</preventxss_iframe>",$new_cue);

$new_cue = str_ireplace("<object","<preventxss_object",$new_cue);

$new_cue = str_ireplace("</object>","</preventxss_object>",$new_cue);

 $new_cue = str_ireplace("<script","<preventxss_script",$new_cue);

  $new_cue = str_ireplace("</script>","</preventxss_script>",$new_cue);
	
	$new_cue = str_ireplace("<img","<preventxss_img",$new_cue);

	$new_cue = str_ireplace("<svg","</preventxss_svg",$new_cue);
	
	$countdown_info = str_ireplace("<iframe","<preventxss_iframe",$countdown_info);

  $countdown_info = str_ireplace("</iframe>","</preventxss_iframe>",$countdown_info);

$countdown_info = str_ireplace("<object","<preventxss_object",$countdown_info);

$countdown_info = str_ireplace("</object>","</preventxss_object>",$countdown_info);

 $countdown_info = str_ireplace("<script","<preventxss_script",$countdown_info);

  $countdown_info = str_ireplace("</script>","</preventxss_script>",$countdown_info);
	
	$countdown_info = str_ireplace("<img","<preventxss_img",$countdown_info);

	$countdown_info = str_ireplace("<svg","</preventxss_svg",$countdown_info);
		
		fwrite($filewrite, $new_cue);
		echo ("<br><br>new value <b>");
		echo $new_cue;
		echo ("</b> is written.");
		
		fwrite($filewritecountdown, $countdown_info);
		echo ("<br><br>new countdown value <b>");
		echo $countdown_info;
		echo ("</b> is written.");
		
		fclose($filewrite);
		/*
		echo ("<br><br><br>if page doesn't redirect back to admin page, then, please use <a href=\"index.html\"> this link. </a>");	
		*/
		
        $logger = fopen("../data/log.html", "a") or die("Logging System Failure!!");
    
        $ip_address = $_SERVER['REMOTE_ADDR'] or die("IP Log Failed");
        //Log some IP

        date_default_timezone_set("Asia/Seoul");
        $current_date = date("Y-m-d");
        $current_time = date("h:i:sa");    


        $log = ("<span style=\"color:#2980b9\"><strong>[ADMIN]</strong></span> 현재 Cue값이 <strong>" . $new_cue . "</strong>,&nbsp;카운트 다운 목표 값이 <strong>" .  $countdown_info . "</strong>로 변경되었습니다. <span style=\"font-size:8px\">" . $current_date . " " . $current_time . " at IP:" . $ip_address . "</span> <br> \n");
            
        fwrite($logger, $log);
        echo ("Successfully Logged. ");
        fclose($logger);
		echo ("<script type=\"text/javascript\"> setTimeout(\"self.close()\", 1500); </script>");
	?>
	
</body>
</html>
