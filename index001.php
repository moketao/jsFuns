<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="screen-orientation" content="landscape">
<meta name="x5-orientation" content="landscape">
<title>主力成本</title>
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
	html, body { height: 100%; width: 100%; overflow-x:hidden; background-color: #aab; }  
	#main{
		position: relative;
		width: 714px;
		height: 1206px;
		overflow: hidden;
	}
	#main input{
		color: #999;
	}
	#main input.on{
		color: #000;
	}
	#input1{
		position: absolute;
		left: 155px;
		top: 741px;
		width: 430px;
		height: 66px;
		border: none 0;
		background-color: #fff;
		padding: 0 1%;
		color: #111;
	}
	#input2{
		display: none;
		position: absolute;
		left: 141px;
		top: 518px;
		width: 444px;
		height: 33px;
		padding: 0 1%;
		border: none 0;
		background-color: #fff;
		color: #111;
	}
	#bt{
		display: block;
		position: absolute;
		left: 97px;
		top: 822px;
		font-size: 36px;
		width: 510px;
		height: 48px;
		cursor: pointer;
		border: none 0;
		animation:pluse 0.5s linear alternate infinite;-webkit-animation:pluse 0.5s linear alternate infinite;
	}
	.but{
		padding:0 5%;margin-top:1rem;position: absolute;
		width: 70%;
	}
	.but a{ display:block; line-height:2.5rem; color:#fff; text-align:center; font-size:1.2rem; background:#e72323;border-bottom:0.3rem solid #910d0d; border-radius:8px; margin-top:0.5rem; animation:pluse 0.5s linear alternate infinite;-webkit-animation:pluse 0.5s linear alternate infinite;}
	a{
		border: none 0;
		text-decoration:none;
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
		left: 120px;
		top: 535px;
		font-family: "微软雅黑";
		font-weight: bold;
		color: #334;
		width: 685px;
		height: 338px;
		font-size: 30px;
		border: none 0;
	}
	@keyframes pluse{
		0%{ transform:scale(1)}
		100%{transform:scale(1.05)}	
	}
	@-webkit-keyframes pluse{
		0%{ -webkit-transform:scale(1)}
		100%{-webkit-transform:scale(1.05)}	
	}
	#bottom{
		display: block;
		position: absolute;
		left: 92px;
		top: 890px;
		font-family: "微软雅黑";
		color: #fff;
		font-size: 23px;
		width: 2266px;
		height: 216px;
		border: none 0;
	}
	#bottom p{
		padding: 5px 0 0 0;
	}
	#canvas{
		position: absolute;
		left: 0px;
		top: 290px;
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
	var tip1 = " 输入股票代码 如 000520";
	var tip2 = " 请您输入手机号码";
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
	var scale;
	var scalebg;
	$(function(){
		//init();
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
		var sw = 714;
		var sh = 1206;
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

		var i1 = $("#input1");
		var i2 = $("#input2");
		var bt = $("#bt");
		var box = $("#box");
		i1.val(tip1);
		i2.val(tip2);
		i1.css("fontSize",26*scale);
		i2.css("fontSize",23*scale);
		i1.on("focus",function(){
			if(i1.val()==tip1){
				i1.val("");
			}
		})
		i1.on("blur",function(){
			if(i1.val()==""){
				i1.val(tip1);
			}
		})
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
		ss(i1,scale);
		ss(i2,scale);
		ss(bt,scale);

		state(0);


		var bottom = $("#bottom");
		ss(bottom,scale);
		bottom.css("fontSize",23*scale);
		setInterval(clock4,5200);
		var randomNum = [3,3,8,5,8];
		var randomNum2 = [
			"保千里 (600074)",
			"中钢天源 (002057)",
			"特力A  (000025)",
			"七匹狼 (002029)",
			"汇源通信 (002110)",
			"洛阳玻璃 (600876)",
			"中航黑豹 (600760)",
			"向日葵 (300111)"
		];
		function nnn(n){
			var out = "";
			for (var i = 0; i < n; i++) {
				out += Math.round(Math.random()*9)+"";
			};
			return out;
		}
		clock4();
		function clock4()
		{
			$("#bottom div").each(function(){
				var me = $(this);
				me.hide("blind").delay(0.9).show("blind");
				me.html(sp(4)+"1"+randomNum[Math.round(Math.random()*4)]+nnn(1)+"****"+nnn(4)+sp(2)+"扫描了"+sp(10)+randomNum2[Math.round(Math.random()*7)]);
			});
		}

		var c1c = $("#canvas");
		s(c1c,714,100,scalebg*1);


		setInterval(clockMV,20);
		function clockMV()
		{
			if(cc){
				cc.x++;
				if(cc.x>1030){
					cc.x = 345;
				}
			}
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
					stockID:i1.val(),
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
		<!-- <div class="but"><a href="#">立即扫描</a></div> -->
		<img id="bg" src="res/bg.jpg">
		<img id="bt" src="res/bt_ok.png">
		<img id="box" src="res/box.png">
		<input type="input" id="input1" name="input1" />
		<input type="input" id="input2" name="input2" />
		<div id="bottom">
			<p><div>135****1718 扫描了</div></p>
			<p><div>134****5753 扫描了</div></p>
		</div>
		<canvas id="canvas" width="714" height="100"></canvas>
	</div>
</body>

<script src="http://code.createjs.com/easeljs-0.6.0.min.js"></script>
<script src="http://code.createjs.com/tweenjs-0.4.0.min.js"></script>
<script src="http://code.createjs.com/movieclip-0.6.0.min.js"></script>
<script src="http://code.createjs.com/preloadjs-0.3.0.min.js"></script>
<script src="res/mv.js"></script>

<script>
var canvas, stage, exportRoot;

function init() {
	canvas = document.getElementById("canvas");
	images = images||{};

	var manifest = [
		{src:"res/images/wave.png", id:"wave"}
	];

	var loader = new createjs.LoadQueue(false);
	loader.addEventListener("fileload", handleFileLoad);
	loader.addEventListener("complete", handleComplete);
	loader.loadManifest(manifest);
}

function handleFileLoad(evt) {
	if (evt.item.type == "image") { images[evt.item.id] = evt.result; }
}
var cc;
function handleComplete() {
	exportRoot = new lib.mv();

	stage = new createjs.Stage(canvas);
	stage.addChild(exportRoot);
	stage.update();

	cc = exportRoot.c;

	createjs.Ticker.setFPS(30);
	createjs.Ticker.addEventListener("tick", stage);
}
</script>
</html>