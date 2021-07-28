<?
	include_once($_SERVER["DOCUMENT_ROOT"].'/young/common.php');
	//echo $member['mb_id'];
	$mb_name = $member['mb_name'];
	//echo $mb_id;
	$sql = " select ca_id2,it_1,it_id,it_img1,
				it_name
		FROM g5_shop_item
		where ca_id2 = '1010'
		and it_use = '1'
		";
//where it_1 = '로스팅'

$result = sql_query($sql);
?>

<!DOCTYPE html>
<html lang="kr">

<head>
	<meta charset="UTF-8">
	<title>LIST + BEISLER</title>


	<link type="text/css" rel="stylesheet" href="/css/main.css">
	<link type="text/css" rel="stylesheet" href="/css/mapPoint.css">
	<link type="text/css" rel="stylesheet" href="/css/index.css">

	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="/script/Standard.js"></script>
	<script type="text/javascript" src="/script/scroll.js"></script>
	<script type="text/javascript" src="/script/pageShift.js"></script>

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

<body>

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


	<main>

		<div class="mainSell">


			<section class="sec01">

				<div class="mainBg01">
					<!--			poster : 섬네일 추가-->
					<video width="100%" preload="auto" autoplay="true" loop="loop" muted="muted" height="100%" poster="">
						<source src="/media/webm/LIS_Startseite_720p_24fps.webm" type="video/webm">
						<source src="/media/mp4/LuB4_low.mp4" type="video/mp4">
					</video>
				</div>

				<div class="secSell01">
					<div class="topLogo">
						<img src="/img/logo/Logo_Video_rot_weiss.png">
					</div>
					<div class="secTitel">
						<h1>프리미엄</h1>
						<h1>커피</h1>
						<h1>문화</h1>
					</div>
					<div class="footLogo">
						<img src="/img/logo/Stoerer_greenmerchants.png">
					</div>

				</div>

				<div class="secfoot01">
					<div class="midText">
						<div class="row">
							<h3>타협없는 품질과 책임있는 소싱에 대한 진정한 열정은 우리의 장기적인 고객 관계의 기둥입니다. 우리는 지속 가능한 비즈니스 관행에 큰 관심을 기울이고 커피 공급망을 따라 신뢰할 수있는 파트너십을 목표로합니다. 이것이 우리가 "프리미엄 커피 문화" 라고 부르는 것 입니다.</h3>
						</div>

					</div>

				</div>

			</section>



			<section class="sec02">
				<div class="sectionSell02">

					<div class="topContent">
						<div class="midText">
							<div class="row">
								<h2>
									생두 전문가로서 List + Beisler는 모든 열정적 인 로스터에게 독특한 노하우를 제공하는 데 중점을 둡니다. 커피 문화의 일부가되어 엄선 된 프리미엄 커피를 경험해보십시오
								</h2>
							</div>
							<div class="row">
								<div class="col col-lg-6 col-lm-6 col-md-12">
									<h3>스페셜티 커피는 매우 감성적 인 제품입니다. 감정은 우리 업무에서 중심적인 역할을합니다. 우리는 단순히 상인이 아니라 열정적 인 수입업자, 제품 전문가, 커피 애호가, 마음을 가진 커피 광입니다. 우리가하는 모든 일을 통해 1901 년부터 제품에 대한 사랑을 느낄 수 있습니다.</h3>
								</div>
								<div class="col contact02">
									<img id="mailCon" src="/img/logo/searchingIcon.png" alt="">

									<h2>문의하기</h2>

									<h2><span>Tel :</span>010-7133-0675</h2>
									<h2><span>email :</span>listbeislerkorea@gmail.com</h2>
								</div>
							</div>

						</div>

					</div>

					<div class="secContent">
						<div class="coffeListTetel"> Coffee List </div>
						<ul>
						<?
						$i = 1;
						while($row=sql_fetch_array($result)) {						
						?>
							<li onclick="javascript:pageWp(<?=$i?>)" class="">
								<input type="hidden" name="it_id" value="<?=$row['it_id']?>">
								<a href="/young/shop/item.php?it_id=<?=$row['it_id']?>">
									<div class="imgTitel">

										<img src="/young/data/item/<?echo $row['it_img1']?>">
									</div>
									<div class="textContent">
										<h4>
											<?echo $row['it_name']?>
											<?//echo $row['it_id']?>
										</h4>
									</div>
								</a>
							</li>
							<?$i++;
					}?>
							<!--
						<li onclick="javascript:pageWp(1)">
							<a href="#">
								<div class="imgTitel">
									<img src="/img/Start_00.jpg">
								</div>
								<div class="textContent">
									<h4>Costa Rica</h4>
								</div>
							</a>
						</li>
						<li onclick="javascript:pageWp(2)">
							<a href="#">
								<div class="imgTitel">
									<img src="/img/Start_01.jpg">
								</div>
								<div class="textContent">
									<h4>Guatemala</h4>
								</div>
							</a>
						</li>
						<li onclick="javascript:pageWp(3)">
							<a href="#">
								<div class="imgTitel">
									<img src="/img/Start_02.jpg">
								</div>
								<div class="textContent">
									<h4>Brazil</h4>
								</div>
							</a>
						</li>
						<li onclick="javascript:pageWp(4)">
							<a href="#">
								<div class="imgTitel">
									<img src="/img/Start_03.jpg">
								</div>
								<div class="textContent">
									<h4>Columbien</h4>
								</div>
							</a>
						</li>
						<li onclick="javascript:pageWp(5)">
							<a href="#">
								<div class="imgTitel">
									<img src="/img/Start_04.jpg">
								</div>
								<div class="textContent">
									<h4>India</h4>
								</div>
							</a>
						</li>
						<li onclick="javascript:pageWp(6)">
							<a href="#">
								<div class="imgTitel">
									<img src="/img/Start_05.jpg">
								</div>
								<div class="textContent">
									<h4>Indonesia</h4>
								</div>
							</a>
						</li>
						<li onclick="javascript:pageWp(7)">
							<a href="#">
								<div class="imgTitel">
									<img src="/img/Start_06.jpg">
								</div>
								<div class="textContent">
									<h4>Ethiopia</h4>
								</div>
							</a>
						</li>
						<li onclick="javascript:pageWp(8)">
							<a href="#">
								<div class="imgTitel">
									<img src="/img/Start_07.jpg">
								</div>
								<div class="textContent">
									<h4>Kenya</h4>
								</div>
							</a>
						</li>
						-->
						</ul>

					</div>
				</div>
			</section>

			<section class="sec03">
				<div class="sectionSell03">

					<div class="potoList">

						<ul class="product_list">
							<li><img src="/img/coffeImg/main/Start_00.jpg" alt=""></li>
							<li><img src="/img/coffeImg/main/Start_01.jpg" alt=""></li>
							<li><img src="/img/coffeImg/main/Start_02.jpg" alt=""></li>
							<li><img src="/img/coffeImg/main/Start_03.jpg" alt=""></li>
							<li><img src="/img/coffeImg/main/Start_04.jpg" alt=""></li>
							<li><img src="/img/coffeImg/main/Start_05.jpg" alt=""></li>
							<li><img src="/img/coffeImg/main/Start_06.jpg" alt=""></li>
							<li><img src="/img/coffeImg/main/Start_07.jpg" alt=""></li>
							<li><img src="/img/coffeImg/main/Start_08.jpg" alt=""></li>
							<li><img src="/img/coffeImg/main/Start_09.jpg" alt=""></li>
							<li><img src="/img/coffeImg/main/Start_10.jpg" alt=""></li>
						</ul>

					</div>
					<div class="potoListMenu">
						<div class="potoCount">
							<h2><span id="potoNum"></span></h2>
						</div>

						<a id="prevBtn">
							<span class="arrowL"></span>
						</a>
						<a id="nextBtn">
							<span class="arrowR"></span>
						</a>
					</div>

				</div>
			</section>

		</div>
	</main>

	<!-- fooer -->
	<footer id="footer"></footer>

	<!-- sidebar-->
	<input type="checkbox" id="menuicon01">

</body>

</html>
