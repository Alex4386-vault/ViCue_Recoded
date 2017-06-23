<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Write New Countdown</title>
<!--
<meta http-equiv="refresh" content="1;url=index.html" />
-->

</head>

<body style="background-color:#242424 !important; color:#FFF">
	Loading PHP binaries..... <br>
	
	<p><h1><strong>Welcome to ViCue 6.0 debug zone....</strong></h1></p>
	
	<?php
		$fileread1 = fopen("../data/countdown.html", "r") or die("Unable to open countdown file to read was impossible! contact developer!");
		
		echo ("old countdown : ");
		echo ("<strong>");
		$oldcurrent = fread($fileread1,filesize("../data/countdown.html"));
		echo $oldcurrent;
		echo ("</strong><br>");
	
		echo ("now writing new countdown data<br><br>");
		fclose($fileread1);
	
	
	
		$filewrite1 = fopen("../data/countdown.html", "w") or die("Unable to open countdown file to write was impossible! contact developer!");

		echo("starting to write new value at countdown<br>");
		$emergency_writeinterruption1 = ("stop");
		$emergency_writeinterruption2 = ("stop");
	
		$countdown_date = $_POST["countdown_date"] or $emergency_writeinterruption1 = ("activate");
		$countdown_time = $_POST["countdown_time"] or $emergency_writeinterruption2 = ("activate");	
	
		if($emergency_writeinterruption1 == "activate")
		{
			echo("<br><b>SEVERE ERROR : </b>date value is not found<br>");
			echo("<b>ERROR HANDLING : </b>using today instead<b><br>");
			die("Not set up");
			// DEV HERE!!
		}
		
		if($emergency_writeinterruption2 == "activate")
		{
			echo("<br><b>SEVERE ERROR : </b>time value is not found<br>");
			echo("<b>ERROR HANDLING FAILURE. TIME VALUE IS REQUIRED!!!<br>");
			die("Time value is REQUIRED.");
		}
		
//check if xss

   echo ("Preventing Cross-Site Scripting...<br>");

  $countdown_date = str_ireplace("<iframe","<preventxss_iframe",$countdown_date);

  $countdown_date = str_ireplace("</iframe>","</preventxss_iframe>",$countdown_date);

$countdown_date = str_ireplace("<object","<preventxss_object",$countdown_date);

$countdown_date = str_ireplace("</object>","</preventxss_object>",$countdown_date);

 $countdown_date = str_ireplace("<script","<preventxss_script",$countdown_date);

  $countdown_date = str_ireplace("</script>","</preventxss_script>",$countdown_date);
	
	$countdown_date = str_ireplace("<img","<preventxss_img",$countdown_date);

	$countdown_date = str_ireplace("<svg","</preventxss_svg",$countdown_date);

  $countdown_time = str_ireplace("<iframe","<preventxss_iframe",$countdown_time);

  $countdown_time = str_ireplace("</iframe>","</preventxss_iframe>",$countdown_time);

$countdown_time = str_ireplace("<object","<preventxss_object",$countdown_time);

$countdown_time = str_ireplace("</object>","</preventxss_object>",$countdown_time);

 $countdown_time = str_ireplace("<script","<preventxss_script",$countdown_time);

  $countdown_time = str_ireplace("</script>","</preventxss_script>",$countdown_time);
	
	$countdown_time = str_ireplace("<img","<preventxss_img",$countdown_time);

	$countdown_time = str_ireplace("<svg","</preventxss_svg",$countdown_time);

		echo ("setting output as : ");
		echo $countdown_date;
		echo ("T");
		echo $countdown_time;
		$countdown_out = $countdown_date . 'T' . $countdown_time . '+09:00';
		
		
		echo ("<br>");
		
		
		echo ("Writing Files... <br>");
		fwrite($filewrite1, $countdown_out);
		fclose($filewrite1);
		
		echo ("<script type=\"text/javascript\"> setTimeout(\"self.close()\", 1500); </script>");
		
		/*
		fclose($filewrite1);
		
		fwrite($filewrite2, $next_queue);
		echo ("<br><br>next queue <b>");
		echo $next_queue;
		echo ("</b> is written.");
	
		fclose($filewrite2);
	
		//echo ("<br><br><br>if page doesn't redirect back to admin page, then, please use <a href=\"index.html\"> this link. </a>");	
		
		echo ("<script type=\"text/javascript\"> setTimeout(\"self.close()\", 1500); </script>");
		*/
	?>
	
</body>
</html>
