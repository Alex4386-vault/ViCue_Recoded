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
	$("#chat").load("../data/chat.html");
	
	placeholder_updater();
}


