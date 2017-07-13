// JavaScript Document

var clockVar = setInterval(function(){ clockTimer() }, 1000);
function clockTimer() {
    var d = new Date();
    var hr=0;
    if(d.getHours()>=12) {
    	hr="오후 " + (d.getHours()-12);
		if(d.getHours()==12)
		{
			hr="오후 " + "12";
		}
    } else {
    	hr="오전 " + d.getHours();
		if(d.getHours()==0)
		{
			hr="오전 " + "12";
		}
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
	
	placeholder_updater();
}

function placeholder_updater() {
	var cue_num = document.getElementById("currentnumber").innerHTML;
	if(cue_num == 99)
	{
		$("#easteregg").show();
	} else {
		$("#easteregg").hide();
	}
	document.getElementById('current_number_text').getAttributeNode("placeholder").value = cue_num;
	var current_queue = document.getElementById("nowplaying").innerHTML;
	document.getElementById('current_text').getAttributeNode("placeholder").value = current_queue;
	var next_queue = document.getElementById("commingup").innerHTML;
	document.getElementById('next_text').getAttributeNode("placeholder").value = next_queue;
	
}


function change_status_style() {
	var s_obj = document.getElementById("cue");
	var status_text = document.getElementById("debug_cue").innerHTML;
	//document.getElementById('cue_new').getAttributeNode("placeholder").value = status_text;
	clearInterval(ref_all);
	if(status_text === "0" || status_text === "nan") {
		s_obj.innerHTML ="NO DATA";
		s_obj.style.border="5px solid #333";
		s_obj.style.backgroundColor="#333";
		s_obj.style.color="#FFF";
		s_obj.style.lineHeight="100px";
		ref_all = setInterval(function(){ refresh_all_data() }, 2500);
	} else if(status_text === "1" || status_text === "ready_blink") {
		s_obj.innerHTML ="READY";
		s_obj.style.border="5px solid #DA3542";
		s_obj.style.lineHeight="100px";
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
		s_obj.style.lineHeight="100px";
		ref_all = setInterval(function(){ refresh_all_data() }, 1000);
	} else if (status_text==="3" || status_text === "standby") {
		s_obj.innerHTML ="STANDBY";
		s_obj.style.border="5px solid #E5C04C";
		s_obj.style.backgroundColor="#E5C04C";
		s_obj.style.color="black";
		s_obj.style.lineHeight="100px";
		ref_all = setInterval(function(){ refresh_all_data() }, 500);
	} else if (status_text==="4" || status_text === "go") {
		s_obj.innerHTML ="GO";
		s_obj.style.border="5px solid #59FF00";
		s_obj.style.backgroundColor="#59FF00";
		s_obj.style.color="black";
		s_obj.style.lineHeight="100px";
		ref_all = setInterval(function(){ refresh_all_data() }, 1000);
	} else if (status_text==="5" || status_text === "error") {
		s_obj.innerHTML ="!ERROR!";
		s_obj.style.border="5px solid #DA3542";
		s_obj.style.lineHeight="100px";
		ref_all = setInterval(function(){ refresh_all_data() }, 800);
		if($("#cue").css("color") === "rgb(218, 53, 66)") {
			$("#cue").css("background-color","#DA3542");
			$("#cue").css("color","#333");
		} else {
			$("#cue").css("background-color","#333");
			$("#cue").css("color","#DA3542");
		}

	} else if (status_text==="6" || status_text === "emergency") {
		s_obj.innerHTML ="EMER<br>GENCY";
		s_obj.style.border="5px solid #DA3542";
		s_obj.style.lineHeight="45px";
		ref_all = setInterval(function(){ refresh_all_data() }, 800);
		if($("#cue").css("color") === "rgb(218, 53, 66)") {
			$("#cue").css("background-color","#DA3542");
			$("#cue").css("color","#333");
		} else {
			$("#cue").css("background-color","#333");
			$("#cue").css("color","#DA3542");
		}

	} else if (status_text==="9" || status_text === "baka" || status_text === "cirno") {
		s_obj.innerHTML ="BAKA";
		s_obj.style.border="5px solid #3489d1";
		
		ref_all = setInterval(function(){ refresh_all_data() }, 800);
		if($("#cue").css("color") === "#3489d1") {
			$("#cue").css("background-color","#3489d1");
			$("#cue").css("color","#333");
		} else {
			$("#cue").css("background-color","#333");
			$("#cue").css("color","#3489d1");
		}

	} else {
		s_obj.innerHTML ="&nbsp;";
		s_obj.style.border="5px solid #333";
		s_obj.style.backgroundColor="#333";
		s_obj.style.color="#FFF";
		s_obj.style.lineHeight="100px";
		ref_all = setInterval(function(){ refresh_all_data() }, 2500);
	}
}

function calcTime(minutes, seconds) {
	var days = 0;
	var hours = 0;
	
	//Error Handling
	
	
	//Error Handling Finished
	

	var today_countdown = new Date();

var date_set = today_countdown.getDate();
	
if(date_set<10)
{
    var date_set = "0" + date_set;
}


	if(today_countdown.getMonth()<9)
	{
	var date = today_countdown.getFullYear()+'-0'+(today_countdown.getMonth()+1)+'-'+(date_set);
	} else {
	var date = today_countdown.getFullYear()+'-'+(today_countdown.getMonth()+1)+'-'+(date_set);
	}
	
	var hours_now = today_countdown.getHours();
	var minutes_now = today_countdown.getMinutes();
	var seconds_now = today_countdown.getSeconds();
	
	if(seconds >= 60)
	{
		minutes = minutes + Math.floor(seconds / 60);
		seconds = seconds % 60;
	}
	
	if(minutes >= 60)
	{
		hours = Math.floor(minutes / 60);
		minutes = minutes % 60;
	}
	
	if(hours >= 24)
	{
		hours = hours-24;
	}
	
	
	var hours_set = hours_now + hours;
	var minutes_set = minutes_now + minutes;
	var seconds_set = seconds_now + seconds;
	
	if(seconds_set >= 60)
	{
		minutes_set = minutes_set + Math.floor(seconds / 60);
		seconds_set = seconds_set % 60;
	}
	
	if(minutes_set >= 60)
	{
		hours_set = hours_set + Math.floor(minutes_set / 60);
		minutes_set = minutes_set % 60;
	}
	
	if(hours_set >= 24)
	{
		hours_set = hours_set - 24;
	}
		
	if(hours_set < 10)
 {
   var hours_set = "0" + hours_set;
 }

	if(minutes_set < 10)
 {
   var minutes_set = "0" + minutes_set;
 }

	if(seconds_set < 10)
 {
   var seconds_set = "0" + seconds_set;
 }
	
	
	var time = (hours_set) + ":" + (minutes_set) + ":" + (seconds_set);
	
	
	var dateTime = date+'T'+time+'+09:00';
	
	
    document.getElementById("countdown_destination").value = dateTime;
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
