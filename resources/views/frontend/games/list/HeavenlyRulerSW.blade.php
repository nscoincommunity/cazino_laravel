<!doctype html>
<html>

<head>
<base href="/games/HeavenlyRulerSW/">
<title>{{ $game->title }}</title>
	<meta charset="UTF-8" />

	<meta id="viewport" name="viewport" content="width=device-width,user-scalable=no,initial-scale=1,maximum-scale=1, minimum-scale=1" />
	<link rel="apple-touch-icon-precomposed" href="assets/favicon/apple-touch-icon-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/favicon/apple-touch-icon-72x72-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="76x76" href="assets/favicon/apple-touch-icon-76x76-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/favicon/apple-touch-icon-114x114-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="120x120" href="assets/favicon/apple-touch-icon-120x120-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/favicon/apple-touch-icon-144x144-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="assets/favicon/apple-touch-icon-152x152-precomposed.png" />
	<link rel="apple-touch-icon" sizes="167x167" href="assets/favicon/apple-touch-icon-167x167.png" />
	<link rel="apple-touch-icon-precomposed" sizes="167x167" href="assets/favicon/apple-touch-icon-167x167-precomposed.png" />
	<link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png" />
	<link rel="apple-touch-icon-precomposed" sizes="180x180" href="assets/favicon/apple-touch-icon-180x180-precomposed.png" />
	<link rel="icon" sizes="192x192" href="assets/favicon/apple-touch-icon-192x192.png" />
	<link rel="icon" sizes="128x128" href="assets/favicon/apple-touch-icon-128x128.png" />
	<link rel="mask-icon" href="assets/favicon/safari-pinned-tab.svg" color="#5bbad5" />
	<link rel="icon" type="image/png" href="assets/favicon/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="assets/favicon/favicon-16x16.png" sizes="16x16" />
	<link rel="manifest" href="assets/favicon/manifest.json" />
	<style>
	body {
		background: #000;
		overflow: hidden;
		padding: 0;
		margin: 0
	}
	
	body,
	html {
		height: 100%
	}
	
	noscript::before {
		content: "Please enable javascript or disable speed mode in order to play the game";
		position: absolute;
		top: 40%;
		margin: -1em auto 0;
		color: #fff;
		font-size: 2em;
		text-align: center;
		width: 100%
	}
	</style>
	 <script>
		

		
        var startTime = new Date();
        if(document.location.href.split("?")[1]==undefined){
		document.location.href=document.location.href+'/?hide_play_for_real=true&startGameToken=&language=en&url=&bns=0&useCookie=true&swa=1&history=0&history_url=index.html&playmode=real&merch_login_url=';	
		}
		
		
    
    </script>
</head>

<body>
	<noscript></noscript>
	<script>
	! function(e, n, t) {
		function i(e) {
			var t = n.createElement("script");
			t.async = !1, t.src = e + ".js", n.head.appendChild(t)
		}

		function s(e) {
			var t = n.createElement("link");
			t.rel = "stylesheet", t.href = "wrapper-" + e + ".css", n.head.appendChild(t)
		}
		var r = t.userAgent.toLowerCase(),
			a = /\b(android|360browser)\b/.test(r) && -1 === r.indexOf("windows nt") || "iP" === t.platform.slice(0, 2) || /ip(hone|od|ad)/.test(r) ? "mobile" : "desktop";
		s(a), e.Promise || i("es6-promise.min"), e.fetch || i("fetch.min"), Object.assign || i("object.assign.min"), i("wrapper-" + a)
	}(window, document, navigator)
	
	
function AddBtn(){
	
	var inr=setInterval(function(){
	
	var footer=document.getElementsByClassName('footer-panel-col');
	var footer_mob=document.getElementsByClassName('fb-container');
	
	 if(footer_mob[0]!=undefined &&  footer[0]==undefined){
	
	document.getElementById('quit').style['display']='';
	clearInterval(inr);	
	document.getElementsByClassName('nav-btn-menu')[0].className='nav-btn nav-btn-menu';		
	}
	
	
},200);
	
	}
	AddBtn();
	</script>
	<div id="quit" onclick="document.location.href='../../../';window.parent.postMessage('CloseGame','*');" style="display:none;position:fixed;right:14px;top:14px;cursor:pointer;z-index:10;"> <img style="width:41px;height:42px;" src="addons/quit2.png"></div>

</body>

</html>
