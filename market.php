<?
	include_once($_SERVER["DOCUMENT_ROOT"].'/young/common.php');
	//$num = $_GET[it_id];
	//a.it_id,a.it_img1,a.it_name
		$sql = " select a.*,a.it_id,a.it_img1,
				a.it_name, b.*,b.it_id
		FROM g5_shop_item a, g5_shop_item_option b
		WHERE 1=1
		and a.it_id = '$_GET[no]'
		and a.it_id = b.it_id
		";
		
//$result = sql_query($sql);
$resume = sql_query($sql);
$mb = sql_fetch_array($resume);

$shop_option = sql_query("select it_id,oi_id from g5_shop_item_option order by it_id");

?>


<!DOCTYPE html>
<html lang="kr">

<head>
	<meta charset="UTF-8">
	<title>LIST + BEISLER</title>


	<link type="text/css" rel="stylesheet" href="/css/main.css">
	<link type="text/css" rel="stylesheet" href="/css/mapPoint.css">

	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="/script/Standard.js"></script>
	<script type="text/javascript" src="/script/scroll.js"></script>
	<script type="text/javascript" src="/script/pageShift.js"></script>

	<script>
		// 페이지 링크
		$(function() {
			$("#header").load("pieceHead.html");
			$("#nav").load("pieceNav.html");
			$("#sideBar").load("pieceSidebar.html");
			//			$("#sideBtn").load("pieceSidelink.html");
			$("#footer").load("pieceFoot.html");

			// mine page
			//$("#main").load(".html");

		})
	</script>

	<!--===================================-->
	<link rel="stylesheet" href="http://hpeeragetest.godohosting.com/young/theme/basic/css/default_shop.css?ver=191202">
	<link rel="stylesheet" href="http://hpeeragetest.godohosting.com/young/js/font-awesome/css/font-awesome.min.css?ver=191202">
	<link rel="stylesheet" href="http://hpeeragetest.godohosting.com/young/js/owlcarousel/owl.carousel.css?ver=191202">
	<link rel="stylesheet" href="http://hpeeragetest.godohosting.com/young/skin/shop/basic/style.css?ver=191202">
	<!--link type="text/css" rel="stylesheet" href="http://hpeeragetest.godohosting.com/css/main.css"-->
	<link rel="stylesheet" href="http://hpeeragetest.godohosting.com/young/js/font-awesome/css/font-awesome.min.css?ver=191202">
	<link rel="stylesheet" href="http://hpeeragetest.godohosting.com/young/js/owlcarousel/owl.carousel.css?ver=191202">
	<link rel="stylesheet" href="http://hpeeragetest.godohosting.com/young/skin/shop/basic/style.css?ver=191202">
	<link type="text/css" rel="stylesheet" href="http://hpeeragetest.godohosting.com/css/mapPoint.css">

	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<!--===================================-->
	
	<style>
		main{
			position: relative;
			background: #ffffff;
			top:76px;
			min-height:100vh; 
		}
	</style>
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

	<main id="main">

		<div id="sit_ov_wrap">
			<!-- 상품이미지 미리보기 시작 { -->
			<div id="sit_pvi">
				<div id="sit_pvi_big">
					<a href="/young/shop/largeimage.php?it_id=<?$mb['it_img1']?>" target="_blank" class="popup_item_image visible"><img src="/young/shop/largeimage.php?it_id=<?$mb['it_img1']?>" width="300" height="300" alt="" title=""></a> <a href="/young/shop/largeimage.php?it_id=<?$mb['it_img1']?>" target="_blank" id="popup_item_image" class="popup_item_image"><i class="fa fa-search-plus" aria-hidden="true"></i><span class="sound_only">확대보기</span></a>
				</div>
				<ul id="sit_pvi_thumb">
					<li><a href="/young/shop/largeimage.php?it_id=<?$mb['it_img1']?>" target="_blank" class="popup_item_image img_thumb"><img src="/young/shop/largeimage.php?it_id=<?$mb['it_img1']?>" width="70" height="70" alt=""><span class="sound_only"> 1번째 이미지 새창</span></a></li>
				</ul>
			</div>
			<!-- } 상품이미지 미리보기 끝 -->

			<!-- 상품 요약정보 및 구매 시작 { -->
			<section id="sit_ov" class="2017_renewal_itemform">
				<h2 id="sit_title"><?=$mb['it_name']?><span class="sound_only">요약정보 및 구매</span></h2>
				<p id="sit_desc"><?=$mb['it_seo_title']?></p>
				<p id="sit_opt_info">
					상품 선택옵션 1 개, 추가옵션 0 개
				</p>


				<script>
					$(".btn_sns_share").click(function() {
						$(".sns_area").show();
					});
					$(document).mouseup(function(e) {
						var container = $(".sns_area");
						if (container.has(e.target).length === 0)
							container.hide();
					});
				</script>

				<div class="sit_info">
					<table class="sit_ov_tbl">
						<colgroup>
							<col class="grid_3">
							<col>
						</colgroup>
						<tbody>

							<tr>
								<th scope="row">시중가격</th>
								<td><?=$mb['it_maker']?></td>
							</tr>

							<tr class="tr_price">
								<th scope="row">판매가격</th>
								<td>
									<strong>20,000원</strong>
									<input type="hidden" id="it_price" value="20000">
								</td>
							</tr>


							<tr>	
								<th scope="row">원산지</th>
								<td><?=$mb['it_origin']?></td>
							</tr>

							<tr>
								<th scope="row">브랜드</th>
								<td><?=$mb['it_brand']?></td>
							</tr>



							<tr>
								<th scope="row">포인트</th>
								<td>
									0점 </td>
							</tr>
							<tr>
								<th>배송비결제</th>
								<td>주문시 결제</td>
							</tr>
							<tr>
								<th>최대구매수량</th>
								<td>10 개</td>
							</tr>
						</tbody>
					</table>
				</div>
				<!-- 선택옵션 시작 { -->
				<section class="sit_option">
					<h3>선택옵션</h3>

					<div class="get_item_options">
						<label for="it_option_1">커피</label>
						<span><select id="it_option_1" class="it_option">
								<option value="">선택</option>
								<?while($s_option = sql_fetch_array($shop_option)){
									if($s_option['it_id']==$mb['it_id']){?>
								<option value="<?$s_option['io_id']?>,0,9999">&nbsp;&nbsp;+ 0원</option>
									<?}
								}?>
								<!--option value="코스타리카2,0,9999">코스타리카2&nbsp;&nbsp;+ 0원</option>
								<option value="코스타리카3,0,9999">코스타리카3&nbsp;&nbsp;+ 0원</option>
								<option value="코스타리카4,0,9999">코스타리카4&nbsp;&nbsp;+ 0원</option>
								<option value="코스타리카5,0,9999">코스타리카5&nbsp;&nbsp;+ 0원</option-->
							</select>
						</span>
					</div>
				</section>
				<!-- } 선택옵션 끝 -->


				<!-- 선택된 옵션 시작 { -->
				<section id="sit_sel_option">
					<h3>선택된 옵션</h3>
				</section>
				<!-- } 선택된 옵션 끝 -->

				<!-- 총 구매액 -->
				<div id="sit_tot_price"></div>


				<div id="sit_ov_btn">
					<button type="submit" onclick="document.pressed=this.value;" value="장바구니" class="sit_btn_cart">장바구니</button>
					<button type="submit" onclick="document.pressed=this.value;" value="바로구매" class="sit_btn_buy">바로구매</button>
				</div>

				<script>
					// 상품보관
					function item_wish(f, it_id) {
						f.url.value = "http://hpeeragetest.godohosting.com/young/shop/wishupdate.php?it_id=" + it_id;
						f.action = "http://hpeeragetest.godohosting.com/young/shop/wishupdate.php";
						f.submit();
					}

					// 추천메일
					function popup_item_recommend(it_id) {
						if (!g5_is_member) {
							if (confirm("회원만 추천하실 수 있습니다."))
								document.location.href = "http://hpeeragetest.godohosting.com/young/bbs/login.php?url=http%3A%2F%2Fhpeeragetest.godohosting.com%2Fyoung%2Fshop%2Fitem.php%3Fit_id%3D1601021645";
						} else {
							url = "./itemrecommend.php?it_id=" + it_id;
							opt = "scrollbars=yes,width=616,height=420,top=10,left=10";
							popup_window(url, "itemrecommend", opt);
						}
					}

					// 재입고SMS 알림
					function popup_stocksms(it_id) {
						url = "http://hpeeragetest.godohosting.com/young/shop/itemstocksms.php?it_id=" + it_id;
						opt = "scrollbars=yes,width=616,height=420,top=10,left=10";
						popup_window(url, "itemstocksms", opt);
					}
				</script>
			</section>
			<!-- } 상품 요약정보 및 구매 끝 -->
		</div>
	</main>

	<!-- fooer -->
	<footer id="footer"></footer>

	<!-- sidebar-->
	<input type="checkbox" id="menuicon01">

</body></html>