<!DOCTYPE html>
<html lang="kr">

<head>
	<meta charset="UTF-8">
	<title>LIST + BEISLER</title>
	
	<link type="text/css" rel="stylesheet" href="/css/introPage.css">
	<script>		
		function loginPage() {
			alert("로그인이 필요합니다. 로그인페이지로 이동하겠습니다.");
			
			location.href = '/login.php';
		}
	</script>
</head>

<body>

	<div class="imageWrap ">
		<!--bgAnimate-->
		<img src="/img/background/foto1.jpg">
	</div>

	<div class="introSell">

		<header>
			<img src="/img/logo/LuB_Logo_v3_rgb_neg.png">
		</header>
		<main>
			<div class="linkList">
				<div class="linkBtn" onclick="location.href='/mainPage.php'">
					<span class="arrow"></span>
					<div class="linkName">로스팅</div>
				</div>
				<div class="linkBtn" onclick="loginPage()">
					<span class="arrow"></span>
					<div class="linkName">생두</div>
				</div>
			</div>
			<div class="mainLogo">
				<img src="/img/logo/Stoerer_greenmerchants.png">
			</div>
		</main>

		<footer>
			<div> 저작권 2020 LIST + BEISLER GmbH
			</div>
			<div>
				<a href="#">사이트 정보</a>
				<a href="#">법률 자문</a>
			</div>
		</footer>

	</div>
	<!--
		<div class="linkList">
			<div class="linkBtn animate" onclick="location.href'#'">
				<span class="arrow"></span>
				<div class="linkName">링크01</div>
			</div>
			<div class="linkBtn" onclick="location.href'#'">
				<span class="arrow"></span>
				<div class="linkName">링크01</div>
			</div>
		</div>
-->

</body></html>
