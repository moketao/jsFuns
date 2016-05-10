function getJson(s,p,fun){
	$.ajax({
		url: s,
		data: p,
		success: function( data ) {
			fun(data)
		}
	});
}
var console=console||{log:function(){}};
function trace(s){
	console.log(s);
}
function sp(n){
	var out="";
	for (var i = 0; i < n; i++) {
		out += "&nbsp;";
	};
	return out;
}
function dTime(){
	return 2967.69;
	var now = new Date(new Date(1453564800*1000) - new Date().getTime());
	var mm = now.getMinutes();
	var ss = now.getTime() % 60000;
	ss = (ss - (ss % 1000)) / 1000;
	var clock = now.getDate() +sp(4)+ now.getHours() +':';
	if (mm < 10)
		clock += '0';
	clock += mm+':';
	if (ss < 10)
		clock += '0';
	return(clock + ss);
} 
function showTime(){
	var t = dTime();
	$("#time").html(t);
	var b = $("#time b");
	b.css("fontSize",130*scale);
}
function sys() {
	var userAgent = navigator.userAgent || navigator.vendor || window.opera;
	if( userAgent.match( /iPad/i ) || userAgent.match( /iPhone/i ) || userAgent.match( /iPod/i ) ){
		return 'iOS';
	}else if( userAgent.match( /Android/i ) ){
		return 'Android';
	}else{
		return 'unknown';
	}
}
function state(n){
	if(n==0){
		$("#box").hide("clip");
		$("#input2").hide("clip");
		$("#bg").css("opacity",1);
		$("#bt").css("opacity",1);
	}else{
		$("#box").show("clip");
		$("#input2").show("clip");
		$("#bg").css("opacity",0.3);
		$("#bt").css("opacity",0.3);
	}
}
function to(w,t){
	return Math.floor(w*t);
}
function s(o,ww,hh,scalebg){
	o.width(ww*scalebg);
	o.height(hh*scalebg);
	o.css("left",toNum(o.css("left"))*scalebg);
	o.css("top",toNum(o.css("top"))*scalebg);
}
function toNum(v){
	return parseInt(String(v).replace("px",""));
}
function ss(o,scaleValue){
	o.width(toNum(o.width())*scaleValue);
	o.height(toNum(o.height())*scaleValue);
	o.css("left",toNum(o.css("left"))*scaleValue);
	o.css("top",toNum(o.css("top"))*scaleValue);
}
$(window).resize(function() {
	resize();
});
function nnn(n){
	var out = "";
	for (var i = 0; i < n; i++) {
		out += Math.round(Math.random()*9)+"";
	};
	return out;
}