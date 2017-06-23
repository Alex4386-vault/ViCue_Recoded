<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Write Cue</title>
<!--
<meta http-equiv="refresh" content="1;url=index.html" />
-->
<style>
	@import url(http://fonts.googleapis.com/earlyaccess/notosanskr.css);
	
	.body
		font-family: 'Noto Sans KR', sans-serif;
</style>
</head>

<body style="background-color:#242424 !important; color:#FFF">
	Loading PHP binaries..... <br>
	
	<p><h1><strong>Welcome to ViCue 6.0 debug zone....</strong></h1></p>
	
	<?php
		$fileread = fopen("../data/cue.html", "r") or die("Unable to open file to read was impossible! contact developer!");
		
		echo ("original cue data : ");
		echo ("<strong>");
		echo fread($fileread,filesize("../data/cue.html"));
		echo ("</strong><br>");
	
		echo ("now writing cue data<br><br>");
		fclose($fileread);
	
		$filewrite = fopen("../data/cue.html", "w") or die("Unable to open file to write was impossible! contact developer!");
		
		
		
		echo("starting to write new value");
		$emergency_cue = ("stop");
		$new_cue = $_POST["cue_new"] or $emergency_cue = ("activate");
		
		if($emergency_cue == "activate")
		{
			echo("<br><b>SEVERE ERROR : </b>cue_new value is not found<br>");
			echo("<b>ERROR HANDLING : </b>using value <strong>nan</strong> instead");
			$new_cue = ("nan");
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
		
		fwrite($filewrite, $new_cue);
		echo ("<br><br>new value <b>");
		echo $new_cue;
		echo ("</b> is written.");
	
		fclose($filewrite);
		/*
		echo ("<br><br><br>if page doesn't redirect back to admin page, then, please use <a href=\"index.html\"> this link. </a>");	
		*/
		
		echo ("<script type=\"text/javascript\"> setTimeout(\"self.close()\", 1500); </script>");
	?>
	
</body>
</html>
