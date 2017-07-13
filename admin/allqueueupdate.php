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
		$fileread1 = fopen("../data/nowplaying.html", "r") or die("Unable to open nowplaying file to read was impossible! contact developer!");
		$fileread2 = fopen("../data/commingup.html", "r") or die("Unable to open commingup file to read was impossible! contact developer!");
		$fileread3 = fopen("../data/currentnumber.html", "r") or die("Unable to open current # file to read was impossible! contact developer!");
		
		echo ("old nowplaying : ");
		echo ("<strong>");
		$oldcurrent = fread($fileread1,filesize("../data/nowplaying.html"));
		echo $oldcurrent;
		echo ("</strong><br>");
	
		echo ("old commingup : ");
		echo ("<strong>");
		$oldnext = fread($fileread2,filesize("../data/commingup.html"));
		echo $oldnext;
		echo ("</strong><br>");
		
		echo ("old current number : ");
		echo ("<strong>");
		$oldnumber = fread($fileread3,filesize("../data/currentnumber.html"));
		echo $oldnumber;
		echo ("</strong><br>");
	
		echo ("now writing new queue data<br><br>");
		fclose($fileread1);
		fclose($fileread2);
		
		echo ("now writing new number<br><br>");
		fclose($fileread3);
	
	
	
		$filewrite1 = fopen("../data/nowplaying.html", "w") or die("Unable to open nowplaying file to write was impossible! contact developer!");
		$filewrite2 = fopen("../data/commingup.html", "w") or die("Unable to open commingup file to write was impossible! contact developer!");
		$filewrite3 = fopen("../data/currentnumber.html", "w") or die("Unable to open current # file to write was impossible! contact developer!");
		
		
		echo("starting to write new value at queue");
		$emergency_writeinterruption1 = ("stop");
		$emergency_writeinterruption2 = ("stop");
		
		echo("starting to write current #");
		$emergency_writeinterruption3 = ("stop");
		
	
		$current_queue = $_POST["current"] or $emergency_writeinterruption1 = ("activate");
		$next_queue = $_POST["next"] or $emergency_writeinterruption2 = ("activate");	
		$newnumber = $_POST["new_number"] or $emergency_writeinterruption3 = ("activate");
	
		if($emergency_writeinterruption1 == "activate")
		{
			echo("<br><b>SEVERE ERROR : </b>current value is not found<br>");
			echo("<b>ERROR HANDLING : </b>just using current value <b> ");
			$current_queue = $oldcurrent;
				
			
		}
		
		if($emergency_writeinterruption2 == "activate")
		{
			echo("<br><b>SEVERE ERROR : </b>next value is not found<br>");
			echo("<b>ERROR HANDLING : </b>using Old Next value instead.<br>");
			$next_queue = $oldnext;
		}
		
		if($emergency_writeinterruption3 == "activate")
		{
			echo("handling error! No data found at # section!");
			echo("Using old data");
			$newnumber = $oldnumber;
			
		}
	
//check if xss

   echo ("Preventing Cross-Site Scripting...<br>");

  $current_queue = str_ireplace("<iframe","<preventxss_iframe",$current_queue);

  $current_queue = str_ireplace("</iframe>","</preventxss_iframe>",$current_queue);

$current_queue = str_ireplace("<object","<preventxss_object",$current_queue);

$current_queue = str_ireplace("</object>","</preventxss_object>",$current_queue);


 $current_queue = str_ireplace("<script","<preventxss_script",$current_queue);

  $current_queue = str_ireplace("</script>","</preventxss_script>",$current_queue);
	
	$current_queue = str_ireplace("<img","<preventxss_img",$current_queue);

	$current_queue = str_ireplace("<svg","</preventxss_svg",$current_queue);

		fwrite($filewrite1, $current_queue);
		echo ("<br><br>current queue <b>");
		echo $current_queue;
		echo ("</b> is written.");
	
		fclose($filewrite1);

//check if xss

   echo ("Preventing Cross-Site Scripting...<br>");

  $next_queue = str_ireplace("<iframe","<preventxss_iframe",$next_queue);

  $next_queue = str_ireplace("</iframe>","</preventxss_iframe>",$next_queue);

$next_queue = str_ireplace("<object","<preventxss_object",$next_queue);

$next_queue = str_ireplace("</object>","</preventxss_object>",$next_queue);

 $next_queue = str_ireplace("<script","<preventxss_script",$next_queue);

  $next_queue = str_ireplace("</script>","</preventxss_script>",$next_queue);
							  
	$next_queue = str_ireplace("<img","<preventxss_img",$next_queue);

	$next_queue = str_ireplace("<svg","</preventxss_svg",$next_queue);
		
		fwrite($filewrite2, $next_queue);
		echo ("<br><br>next queue <b>");
		echo $next_queue;
		echo ("</b> is written.<br />");
	
		fclose($filewrite2);
	
	
			echo ("<br> Prevent XSS!");
		$newnumber = str_ireplace("/<iframe","<preventxss_iframe",$newnumber);

	$newnumber = str_ireplace("</iframe>","</preventxss_iframe>",$newnumber);

$newnumber = str_ireplace("<object","<preventxss_object",$newnumber);

$newnumber = str_ireplace("</object>","</preventxss_object>",$newnumber);

		
 $newnumber = str_ireplace("<script","<preventxss_script",$newnumber);

  $newnumber = str_ireplace("</script>","</preventxss_script>",$newnumber);
	
	$newnumber = str_ireplace("<img","<preventxss_img",$newnumber);

	$newnumber = str_ireplace("<svg","</preventxss_svg",$newnumber);
	
	fwrite($filewrite3, $newnumber);
		echo ("<br><br>New number <b>");
		echo $newnumber;
		echo ("</b> is written.<br />");
	
		fclose($filewrite3);
		//echo ("<br><br><br>if page doesn't redirect back to admin page, then, please use <a href=\"index.html\"> this link. </a>");	
		
		echo ("<script type=\"text/javascript\"> setTimeout(\"self.close()\", 1500); </script>");
	?>
	
</body>
</html>
