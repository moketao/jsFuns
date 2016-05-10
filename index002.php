<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="screen-orientation" content="landscape">
<meta name="x5-orientation" content="landscape">
<title>股票保险</title>
<script>
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
</script>
<style type="text/css">
	* { margin: 0; padding: 0; } 
	html, body { height: 100%; width: 100%; overflow-x:hidden; background-color: #cac3b9; }  
	#main{
		position: relative;
		width: 1024px;
		height: 1787px;
		overflow: hidden;
	}
	#main input{
		color: #999;
	}
	#main input.on{
		color: #000;
	}
	#input2{
		display: none;
		position: absolute;
		left: 150px;
		top: 445px;
		width: 398px;
		height: 53px;
		border: none 0;
		background-color: #c9caca;
		color: #111;
	}
	#bt{
		display: block;
		position: absolute;
		left: 271px;
		top: 788px;
		font-size: 36px;
		width: 170px;
		cursor: pointer;
		height: 181px;
		border: none 0;
	}
	a{
		border: none 0;
	}
	a:hover{
		background-position: -150px;
	}
	@font-face {
		font-family: 'Lcdd';
		src: url('res/Lcdd.ttf');
		src: local('Lcdd Regular'),
		local('Lcdd'),
		url('res/Lcdd.ttf') format('truetype');
	}
	#box{
		display: none;
		position: absolute;
		left: 130px;
		top: 235px;
		font-family: "微软雅黑";
		font-weight: bold;
		color: #334;
		width: 637px;
		height: 617px;
		font-size: 30px;
		border: none 0;
	}
</style>
<script type="text/javascript" src="res/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
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
	var tip2 = " 输入手机号码 领取体验礼包";
	function to(w,t){
		return Math.floor(w*t);
	}
	function s(o,ww,hh,scalebg){
		o.width(ww*scalebg);
		o.height(hh*scalebg);
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
	var scale;
	var scalebg;
	$(function(){
		$(window).resize(function() {
			resize();
		});
		resize();
		function resize(){
			
		}
		var bodyW = $('body').width();
		var bodyH = $('body').height();
		var main = $('#main');
		var w;
		var sub;
		var sw = 710;
		var sh = 1241;
		if(sys()=="unknown"){
			w = to(sw,bodyH/sh);
			sub = 1-w/bodyW;
		}else{
			sub = 0.02;
			w = to(bodyW,1-sub);
		}
		main.width(w);
		main.height(to(w,sh/sw)+1);
		scalebg = w/sw;
		var bg = $("#bg");

		s(bg,sw,sh,scalebg);
		main.css("left",to(bodyW,sub/2.08));

		trace(bg.width())
		scale = bg.width()/sw;
		trace(scale);
		ss($('#box'),scale*0.8);

		$("body").show();

		var i2 = $("#input2");
		var bt = $("#bt");
		var box = $("#box");
		i2.val(tip2);
		i2.css("fontSize",29*scale);
		i2.on("focus",function(){
			if(i2.val()==tip2){
				i2.val("");
			}
		})
		i2.on("blur",function(){
			if(i2.val()==""){
				i2.val(tip2);
			}
		})
		ss(i2,scale);
		ss(bt,scale);

		state(0);

		var aniY = Math.round(w*0.05);
		var aniDown = true;
		ani(aniDown);
		function ani(down){
			var yy;
			if(down){
				yy = "+="+aniY;
			}else{
				yy = "-="+aniY;
			}
			$("#bt").animate({top:yy},1500,null,function(){
				aniDown = !aniDown;
				ani(aniDown);
			});
		}
		bt.bind("click",function(e){
			state(1);
		})
		bg.bind("click",function(e){
			state(0);
		})
		box.bind("click",function(e){
			trace(e);
			var tel = i2.val();
			var reg = /^0?1[3|4|5|8][0-9]\d{8}$/;
			if (reg.test(tel)) {
				//alert("号码正确~");
			}else{
				alert("请您输入正确的手机号码");
				return;
			};
			var ref = document.referrer;
			ref = ref ? ref : window.location.host;
			$.ajax({
				url: "res/update.php",
				data: {
					phone: i2.val(),
					url:ref,
					sys:sys()
				},
				success: function( data ) {
					if(data=="ok"){
						alert("恭喜! 输入成功! 我们会以短信或电话方式将结果传达给您!")
					}
				}
			});
		});
	});
</script>
</head>

<body>
	<div id="main" style="">
		<img id="bg" src="res/bg.jpg">
		<img id="bt" src="res/bt_ok.png">
		<img id="box" src="res/box.png">
		<input type="input" id="input2" name="input2" />
	</div>
</body>
</html>