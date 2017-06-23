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
		$emergency_notice = ("<b>비상!</b> <b>샘플 구역</b>에서<br> 비상 사태가 발생하였습니다!!");
		
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
	
		echo ("<br><br><br>if page doesn't redirect back to admin page, then, please use <a href=\"index.html\"> this link. </a>");	
		
	?>
	
</body>
</html>
