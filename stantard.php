<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>LIST + BEISLER</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<link type="text/css" rel="stylesheet" href="/css/main.css">
	<link type="text/css" rel="stylesheet" href="/css/mapPoint.css">
	<link type="text/css" rel="stylesheet" href="/css/calendar.css">

	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="/script/pageShift.js"></script>
	<script type="text/javascript" src="/script/calendar.js"></script>

	<script>
		// 페이지 링크
		$(function() {
			$("#header").load("pieceHead.php");
			$("#nav").load("pieceNav.php");
			$("#sideBar").load("pieceSidebar.php");
			//			$("#sideBtn").load("pieceSidelink.php");
			$("#footer").load("pieceFoot.php");

			// mine page
			//$("#main").load(".php");
		})

	</script>
</head>

<body style="background: #ffffff;">
	<!-- header-->
	<header id="header"></header>
	<!-- hidden nav-->
	<nav id="nav" class="origins"></nav>

	<!-- hidden sideBar-->
	<article id="sideBar" class="sideAnimateOut"></article>

	<!-- side butten -->
	<div id="sideBtn" class="sideLink sideAnimateOut">
		<div class="sideLinkSell">
			<label id="mcBtn01" for="menuicon01">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</label>
		</div>
	</div>

	<main class="a">
		
		
	</main>	
	<!-- fooer -->
	<footer id="footer"></footer>

	<!-- sidebar-->
	<input type="checkbox" id="menuicon01">
</body></html>