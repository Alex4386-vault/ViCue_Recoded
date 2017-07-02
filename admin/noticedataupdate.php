<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Write Notice</title>
<!--
<meta http-equiv="refresh" content="1;url=index.html" />
-->
<link rel="stylesheet" href="http://fonts.googleapis.com/earlyaccess/notosanskr.css">
</head>

<body style="background-color:#242424 !important; color:#FFF; font-family: 'Noto Sans KR', sans-serif;">
	Loading PHP binaries..... <br>
	
	<p><h1><strong>Welcome to ViCue 6.0 debug zone....</strong></h1></p>
	
	<?php
		$fileread = fopen("../data/message.html", "r") or die("Unable to open file to read was impossible! contact developer!");
		
		echo ("original notice data : ");
		echo ("<strong>");
		echo fread($fileread,filesize("../data/message.html"));
		echo ("</strong><br>");
	
		echo ("now writing notice data<br><br>");
		fclose($fileread);
	
		$filewrite = fopen("../data/message.html", "w") or die("Unable to open file to write was impossible! contact developer!");
		
		
		echo("starting to write new notice");
		$emergency_notice = ("stop");
		$new_notice = $_POST["message"] or $emergency_notice = ("activate");
		

		
		if($emergency_notice == "activate")
		{
			echo("<br><b>SEVERE ERROR : </b>message value is not found<br>");
			echo("<b>ERROR HANDLING : writing <b>-</b> instead");
			$new_notice = ("-");
		}

//check if xss

   echo ("Preventing Cross-Site Scripting...<br>");

  $new_notice = str_ireplace("<iframe","<preventxss_iframe",$new_notice);

  $new_notice = str_ireplace("</iframe>","</preventxss_iframe>",$new_notice);

$new_notice = str_ireplace("<object","<preventxss_object",$new_notice);

$new_notice = str_ireplace("</object>","</preventxss_object>",$new_notice);

		
	$new_notice = str_ireplace("<script","<preventxss_script",$new_notice);

	$new_notice = str_ireplace("</script>","</preventxss_script>",$new_notice);


	$new_notice = str_ireplace("<svg","</preventxss_svg",$new_notice);

		fwrite($filewrite, $new_notice);
		echo ("<br><br>new notice <b>");
		echo $new_notice;
		echo ("</b> is written.");
	
		fclose($filewrite);
	
		//echo ("<br><br><br>if page doesn't redirect back to admin page, then, please use <a href=\"index.html\"> this link. </a>");	
		
		echo ("<script type=\"text/javascript\"> setTimeout(\"self.close()\", 1500); </script>");
	?>
	
</body>
</html>
