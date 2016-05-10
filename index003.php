<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="screen-orientation" content="landscape">
<meta name="x5-orientation" content="landscape">
<title>数据马达</title>
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
	html, body { height: 100%; width: 100%; overflow-x:hidden; }  
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
	#input1{
		position: absolute;
		left: 102px;
		top: 1329px;
		font-size: 27px;
		width: 1100px;
		height: 73px;
		border: none 0;
	}
	#input2{
		position: absolute;
		left: 102px;
		top: 1467px;
		font-size: 27px;
		width: 1100px;
		height: 73px;
		border: none 0;
	}
	#bt{
		display: block;
		position: absolute;
		left: 114px;
		top: 2990px;
		
		font-size: 36px;
		width: 2266px;
		cursor: pointer;
		height: 216px;
		border: none 0;
	}
	#c1{
		display: block;
		position: absolute;
		left: 6px;
		top: 940px;
		width: 1310px;
		height: 184px;
		border: none 0;
	}	
	#c11{
		display: block;
		position: absolute;
		left: 23px;
		top: 340px;
		width: 1310px;
		height: 184px;
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
		src: url('b/Lcdd.ttf');
		src: local('Lcdd Regular'),
		local('Lcdd'),
		url('b/Lcdd.ttf') format('truetype');
	}
	#time {
		left: 452px;
		top: 733px;
		font-size: 39px;
		font-weight: bold;
		font-family: "Arial";
		color: #0b882a;
		position: absolute;
	}
	b{
		font-family: "微软雅黑";
		font-size: 130px;
	}
	#bottom{
		display: block;
		position: absolute;
		left: 92px;
		top: 1800px;
		font-family: "微软雅黑";
		font-weight: bold;
		color: #334;
		font-size: 30px;
		width: 2266px;
		height: 216px;
		border: none 0;
	}
	#bottom p{
		padding: 5px 0 0 0;
	}
</style>
<script type="text/javascript" src="b/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
	var tip1 = "请输入股票代码 如 601718 或 601718鉴";
	var tip2 = "请输入股手机号码";
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
		$("#time").html(""+num.toFixed(2));
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
		if(sys()=="unknown"){
			w = to(2516,bodyH/4065);
			sub = 1-w/bodyW;

		}else{
			sub = 0.02;
			w = to(bodyW,1-sub);
		}
		main.width(w);
		main.height(to(w,4065/2516)+100);
		scalebg = w/2516;
		var bg = $("#bg");

		s(bg,2516,4065,scalebg);
		main.css("left",to(bodyW,sub/2.08));

		trace(bg.width())
		scale = bg.width()/1309;
		trace(scale)
		var time = $("#time");

		ss(time,scale);
		// if(sys()=="iOS"){
		// 	time.css("fontSize",102*scale);
		// }else if(sys()=="Android"){
		// 	time.css("fontSize",108*scale);
		// }else{
		 	time.css("fontSize",78*scale);
		// }

		$("body").show();

		var i1 = $("#input1");
		var i2 = $("#input2");
		var bt = $("#bt");
		var c1 = $("#c1");
		var c1c = $("#c1 canvas");
		var c11 = $("#c11");
		var c11c = $("#c11 canvas");
		var bottom = $("#bottom");
		ss(bottom,scale);
		bottom.css("fontSize",30*scale);

		i1.val(tip1);
		i1.css("fontSize",37*scale);
		i2.css("fontSize",37*scale);
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
		i2.val(tip2);
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
		ss(bt,scale*0.523);
		s(c1c,1285,150,scalebg*2.02);
		ss(c1,scale);
		s(c11c,1206,553,scalebg*2.02);
		ss(c11,scale);
		trace("c1c_width:"+c1c.width()+"_"+c1c.height());
		bt.bind("click",function(){
			var tel = i2.val();
			var reg = /^0?1[3|4|5|8][0-9]\d{8}$/;
			if (reg.test(tel)) {
				//alert("号码正确~");
			}else{
				alert("请您输入正确的手机号码");
				return;
			};
			if (i1.val()==tip1) {
				alert("请您输入股票号码");
				return;
			};
			// var code = i1.val();
			// reg = /[0-9]{6}/;
			// if (reg.test(code)) {
			// 	//alert("号码正确~");
			// }else{
			// 	alert("请您输入正确股票号码");
			// 	return;
			// };
			var ref = document.referrer;
			ref = ref ? ref : window.location.host;
			$.ajax({
				url: "b/update.php",
				data: {
					phone: i2.val(),
					stockID: i1.val(),
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
		init();
	});
</script>
<script src="http://code.createjs.com/easeljs-0.6.0.min.js"></script>
<script src="http://code.createjs.com/tweenjs-0.4.0.min.js"></script>
<script src="http://code.createjs.com/movieclip-0.6.0.min.js"></script>
<script src="http://code.createjs.com/preloadjs-0.3.0.min.js"></script>
<script src="b/lines.js"></script>
<script src="b/roll.js"></script>
<script>
var canvas, stage, exportRoot;
var c2, stage2, exportRoot2;


var num = 2967.69;//上证指数
var upDown = 130;//上证指数浮动
var changeTime = 3;//上证指数多少秒变动一次

function init() {
	getJson("b/data.json?r="+Math.random(),{},function(d){
		if(d.num){
			num = parseFloat(d.num);
			upDown = parseFloat(d.upDown);
			trace("拉取数据成功:"+num+"  "+d.upDown);
			getJson("b/getjson.php",{url:"http://hq.sinajs.cn/list=sh000001",r:Math.random()},function(d){
				var arr = String(d).split(",");
				var newNum;
				if(arr && arr.length)newNum = parseFloat(arr[3].slice(0,7));
				if(newNum){
					trace("实时上证指数:"+newNum);
					num = newNum;
				}
			});
		}
	});
	canvas = document.getElementById("canvas");
	images = images||{};

	var manifest = [
		{src:"b/images/bowen.png", id:"bowen"},
		{src:"b/images/zi.png", id:"zi"}
	];

	var loader = new createjs.LoadQueue(false);
	loader.addEventListener("fileload", handleFileLoad);
	loader.addEventListener("complete", handleComplete);
	loader.loadManifest(manifest);


	c2 = document.getElementById("c2");
	exportRoot2 = new lib.roll();

	stage2 = new createjs.Stage(c2);
	stage2.addChild(exportRoot2);
	stage2.update();
	createjs.Ticker.addEventListener("tick", stage2);
	function getRandom(a1,a2){
		return -(a1 + Math.round(Math.random()*(a2-a1)))+90;
	}
	setInterval(clock1,1000)
	function clock1()
	{
		var a1 = exportRoot2.a1;
		var r = getRandom(90,200);
		createjs.Tween.get(a1).to({rotation:r}, 999);
	}

	setInterval(clock2,changeTime*1000)
	function clock2()
	{
		var a2 = exportRoot2.a2;
		var newNum = num + Math.random()*upDown;
		var rr = (250-90)/3000 * newNum;
		var r = getRandom(90,95);
		createjs.Tween.get(a2).to({rotation:rr-161}, changeTime*1000);
		$("#time").html(""+newNum.toFixed(2));
	}
	setInterval(clock3,1000)
	function clock3()
	{
		var a3 = exportRoot2.a3;
		var r = getRandom(-30,220);
		createjs.Tween.get(a3).to({rotation:r}, 688);
	}

	setInterval(clock4,5200);
	var randomNum = [3,3,3,4,5,8];
	var randomNum2 = ["两","三","四","五","六"];
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
			me.html("感谢手机号为 1"+randomNum[Math.round(Math.random()*5)]+nnn(1)+"****"+nnn(4)+" 推荐的"+sp(10)+randomNum2[Math.round(Math.random()*4)]+"日涨停 ,  请查收您的微信红包 ...");
		});
	}
}

function handleFileLoad(evt) {
	if (evt.item.type == "image") { images[evt.item.id] = evt.result; }
}

function handleComplete() {
	exportRoot = new lib.lines();

	stage = new createjs.Stage(canvas);
	stage.addChild(exportRoot);
	stage.update();

	createjs.Ticker.setFPS(30);
	createjs.Ticker.addEventListener("tick", stage);
}



</script>
</head>

<body style="background-color:#fff;display:none;">
	<div id="main" style="">
		<div id="time"></div>
		<img id="bg" src="b/bg.jpg">
		<input type="input" id="input1" name="input1" />
		<input type="input" id="input2" name="input2" />
		<img id="bt" src="b/bt_ok.png">
		<img id="dlg1" src="b/dlg1.png" style="display:none;">
		<img id="dlg2" src="b/dlg2.png" style="display:none;">
		<div id="c1">
			<canvas id="canvas" width="1310" height="180"></canvas>
		</div>
		<div id="c11">
			<canvas id="c2" width="1206" height="553"></canvas>
		</div>
		<div id="bottom">
			<p><div>感谢手机号为 135****1718 推荐的  三日涨停, 请查收您的微信红包...</div></p>
			<p><div>感谢手机号为 134****5753 推荐的  两日涨停, 请查收您的微信红包...</div></p>
		</div>
	</div>
</body>
</html>