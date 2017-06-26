// JavaScript Document

var clockVar = setInterval(function(){ clockTimer() }, 1000);
function clockTimer() {
    var d = new Date();
    var hr=0;
    if(d.getHours()>12) {
    	hr="오후 " + (d.getHours()-12);
    } else {
    	hr="오전 " + d.getHours();
    }
    var min=0;
    if(d.getMinutes()<10) {
    	min="0"+d.getMinutes();
    } else {
    	min = d.getMinutes();
    }
    var sec=0;
    if(d.getSeconds()<10) {
    	sec="0"+d.getSeconds();
    } else {
    	sec = d.getSeconds();
    }
    var t = hr + ":" + min + ":" + sec;
    document.getElementById("clock").innerHTML = t;
}

var ref_all = setInterval(function(){ refresh_all_data() }, 500);
function refresh_all_data() {
    $("#event_name").load("../data/eventname.html");
	$("#debug_cue").load("../data/cue.html");
	change_status_style();
	$("#nowplaying").load("../data/nowplaying.html");
	$("#commingup").load("../data/commingup.html");
	$("#currentnumber").load("../data/currentnumber.html");
	$("#notice").load("../data/message.html");
	$("#debug_countdown").load("../data/countdown.html");
	$("#debug_timermin").load("../data/timer/min.html");
	$("#debug_timersec").load("../data/timer/sec.html");
	
	
}

function change_status_style() {
	var s_obj = document.getElementById("cue");
	var status_text = document.getElementById("debug_cue").innerHTML;
	clearInterval(ref_all);
	if(status_text === "0" || status_text === "nan") {
		s_obj.innerHTML ="NO DATA";
		s_obj.style.border="5px solid #333";
		s_obj.style.backgroundColor="#333";
		s_obj.style.color="#FFF";
		ref_all = setInterval(function(){ refresh_all_data() }, 2500);
	} else if(status_text === "1" || status_text === "ready_blink") {
		s_obj.innerHTML ="READY";
		s_obj.style.border="5px solid #DA3542";
		
		ref_all = setInterval(function(){ refresh_all_data() }, 800);
		if($("#cue").css("color") === "rgb(218, 53, 66)") {
			$("#cue").css("background-color","#DA3542");
			$("#cue").css("color","#333");
		} else {
			$("#cue").css("background-color","#333");
			$("#cue").css("color","#DA3542");
		}
	} else if (status_text==="2" || status_text === "ready"){
		s_obj.innerHTML ="READY";
		s_obj.style.border="5px solid #DA3542";
		s_obj.style.backgroundColor="#DA3542";
		s_obj.style.color="#242424";
		ref_all = setInterval(function(){ refresh_all_data() }, 1000);
	} else if (status_text==="3" || status_text === "standby") {
		s_obj.innerHTML ="STANDBY";
		s_obj.style.border="5px solid #E5C04C";
		s_obj.style.backgroundColor="#E5C04C";
		s_obj.style.color="black";
		ref_all = setInterval(function(){ refresh_all_data() }, 500);
	} else if (status_text==="4" || status_text === "go") {
		s_obj.innerHTML ="GO";
		s_obj.style.border="5px solid #59FF00";
		s_obj.style.backgroundColor="#59FF00";
		s_obj.style.color="black";
		ref_all = setInterval(function(){ refresh_all_data() }, 1000);
	} else if (status_text==="5" || status_text === "error") {
		s_obj.innerHTML ="!ERROR!";
		s_obj.style.border="5px solid #DA3542";
		
		ref_all = setInterval(function(){ refresh_all_data() }, 800);
		if($("#cue").css("color") === "rgb(218, 53, 66)") {
			$("#cue").css("background-color","#DA3542");
			$("#cue").css("color","#333");
		} else {
			$("#cue").css("background-color","#333");
			$("#cue").css("color","#DA3542");
		}
	} else if (status_text==="6" || status_text === "emergency") {
		s_obj.innerHTML ="!EMERGENCY!";
		s_obj.style.border="5px solid #DA3542";
		
		ref_all = setInterval(function(){ refresh_all_data() }, 800);
		if($("#cue").css("color") === "rgb(218, 53, 66)") {
			$("#cue").css("background-color","#DA3542");
			$("#cue").css("color","#333");
		} else {
			$("#cue").css("background-color","#333");
			$("#cue").css("color","#DA3542");
		}
	} else {
		s_obj.innerHTML ="&nbsp;";
		s_obj.style.border="5px solid #333";
		s_obj.style.backgroundColor="#333";
		s_obj.style.color="#FFF";
		ref_all = setInterval(function(){ refresh_all_data() }, 2500);
	}
}

function countdown() {
	// Set the date we're counting down to
	var datestring = document.getElementById("debug_countdown").innerHTML;
	
	var countDownDate = new Date(datestring).getTime();
	
	// Update the count down every 1 second
	var x = setInterval(function() {
		
	datestring = document.getElementById("debug_countdown").innerHTML;
	
	countDownDate = new Date(datestring).getTime();
	

	// Get todays date and time
  	var now = new Date().getTime();

	// Find the distance between now an the count down date
  	var distance = countDownDate - now;

  	// Time calculations for days, hours, minutes and seconds
  	var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  	var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  	var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  	var seconds = Math.floor((distance % (1000 * 60)) / 1000);
		
  	// Display the result in the element with id="demo"
	document.getElementById("countdown").style.fontSize="15pt";
	document.getElementById("countdown").style.lineHeight="50px"
	document.getElementById("countdown").innerHTML = days + "일 " + hours + "시간 " + "<br>" + minutes + "분 " + seconds + "초 ";
	if(days < 1)
		{
			document.getElementById("countdown").style.fontSize="15pt";
			document.getElementById("countdown").style.lineHeight="50px"
			document.getElementById("countdown").innerHTML = hours + "시간 " + minutes + "분 " + "<br>" + seconds + "초 ";
			if (hours < 1)
				{
					document.getElementById("countdown").style.fontSize="20pt";
					document.getElementById("countdown").style.lineHeight="50px";
					document.getElementById("countdown").innerHTML = minutes + "분 " + "<br>" + seconds + "초 ";
					if (minutes < 1)
						{
							document.getElementById("countdown").style.fontSize="30pt";
							document.getElementById("countdown").style.lineHeight="100px";
							document.getElementById("countdown").innerHTML = seconds + "초 ";
						}
				}
		}
  	
		
	// If the count down is finished, write some text 
  	if (distance < 0) {
		document.getElementById("countdown").style.fontSize="15pt";
		document.getElementById("countdown").style.lineHeight="100px";
    	document.getElementById("countdown").innerHTML = "시간초과";
  	}}, 1000);
}