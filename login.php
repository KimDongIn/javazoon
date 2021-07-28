<?
		include_once($_SERVER["DOCUMENT_ROOT"].'/young/common.php');
		//echo $member['mb_id'];
	$mb_name = $member['mb_name'];
	//echo $mb_id;
	if($mb_name ==!null){
		$link = "/mainPage.php";
		goto_url($link);
		
		
	}
?>
<!doctype html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta http-equiv="imagetoolbar" content="no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>LIST + BEISLER</title>
	<link rel="stylesheet" href="/young/theme/basic/css/default.css?ver=191202">
	<link rel="stylesheet" href="/young/js/font-awesome/css/font-awesome.min.css?ver=191202">
	<link rel="stylesheet" href="/young/theme/basic/skin/connect/basic/style.css?ver=191202">
	<link rel="stylesheet" href="/young/theme/basic/skin/popular/basic/style.css?ver=191202">
	<link rel="stylesheet" href="/young/theme/basic/skin/latest/pic_list/style.css?ver=191202">
	<link rel="stylesheet" href="/young/theme/basic/skin/latest/pic_block/style.css?ver=191202">
	<link rel="stylesheet" href="/young/theme/basic/skin/latest/basic/style.css?ver=191202">
	<link rel="stylesheet" href="/young/theme/basic/skin/outlogin/basic/style.css?ver=191202">
	<link rel="stylesheet" href="/young/theme/basic/skin/latest/notice/style.css?ver=191202">
	<link rel="stylesheet" href="/young/theme/basic/skin/visit/basic/style.css?ver=191202">
	<link rel="stylesheet" href="/young/js/owlcarousel/owl.carousel.min.css?ver=191202">
	<!--[if lte IE 8]>
<script src="/young/js/html5.js"></script>
<![endif]-->
	<script>
		// 자바스크립트에서 사용하는 전역변수 선언
		var g5_url = "/young";
		var g5_bbs_url = "/young/bbs";
		var g5_is_member = "";
		var g5_is_admin = "";
		var g5_is_mobile = "";
		var g5_bo_table = "";
		var g5_sca = "";
		var g5_editor = "";
		var g5_cookie_domain = "";
		var g5_theme_shop_url = "/young/theme/basic/shop";
		var g5_shop_url = "/young/shop";
	</script>
	<script src="/young/js/jquery-1.12.4.min.js?ver=191202"></script>
	<script src="/young/js/jquery-migrate-1.4.1.min.js?ver=191202"></script>
	<script src="/young/js/jquery.menu.js?ver=191202"></script>
	<script src="/young/js/common.js?ver=191202"></script>
	<script src="/young/js/wrest.js?ver=191202"></script>
	<script src="/young/js/placeholders.min.js?ver=191202"></script>
	<script src="/young/js/owlcarousel/owl.carousel.min.js?ver=191202"></script>
	<script src="/young/js/jquery.bxslider.js?ver=191202"></script>


	<link type="text/css" rel="stylesheet" href="/css/introPage.css">
	
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

		<main class="loginSell">
			<!--===================================================-->
			<!-- 팝업레이어 시작 { -->

			<script>
				$(function() {
					$(".hd_pops_reject").click(function() {
						var id = $(this).attr('class').split(' ');
						var ck_name = id[1];
						var exp_time = parseInt(id[2]);
						$("#" + id[1]).css("display", "none");
						set_cookie(ck_name, 1, exp_time, g5_cookie_domain);
					});
					$('.hd_pops_close').click(function() {
						var idb = $(this).attr('class').split(' ');
						$('#' + idb[1]).css('display', 'none');
					});
					$("#hd").css("z-index", 1000);
				});
			</script>




			<!-- 로그인 전 아웃로그인 시작 { -->
			<section id="ol_before" class="ol">
				<div id="ol_be_cate">
					<div class="membershepBtn01"><span class="sound_only">회원</span>로그인</div>
					<a href="membershipComp.php" class="membershepBtn02">회원가입</a>
				</div>
				<form name="foutlogin" action="/young/bbs/login_check.php" onsubmit="return fhead_submit(this);" method="post" autocomplete="off">
					<fieldset>
						<div class="ol_wr">
							<input type="hidden" name="url" value="%2Fyoung%2F">
							<label for="ol_id" id="ol_idlabel" class="sound_only">회원아이디<strong>필수</strong></label>
							<input type="text" id="ol_id" name="mb_id" required maxlength="20" placeholder="아이디">
							<label for="ol_pw" id="ol_pwlabel" class="sound_only">비밀번호<strong>필수</strong></label>
							<input type="password" name="mb_password" id="ol_pw" required maxlength="20" placeholder="비밀번호">
							<input type="submit" id="ol_submit" value="로그인" class="btn_b02">
						</div>
						<div class="ol_auto_wr">
							<div id="ol_auto" class="chk_box">
								<input type="checkbox" name="auto_login" value="1" id="auto_login" class="selec_chk">
								<label for="auto_login" id="auto_login_label"><span></span>자동로그인</label>
							</div>
							<div id="ol_svc">
								<a href="/young/bbs/password_lost.php" id="ol_password_lost">정보찾기</a>
							</div>
						</div>

					</fieldset>
				</form>
			</section>

			<script>
				jQuery(function($) {

					var $omi = $('#ol_id'),
						$omp = $('#ol_pw'),
						$omi_label = $('#ol_idlabel'),
						$omp_label = $('#ol_pwlabel');

					$omi_label.addClass('ol_idlabel');
					$omp_label.addClass('ol_pwlabel');

					$("#auto_login").click(function() {
						if ($(this).is(":checked")) {
							if (!confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?"))
								return false;
						}
					});
				});

				function fhead_submit(f) {
					if ($(document.body).triggerHandler('outlogin1', [f, 'foutlogin']) !== false) {
						return true;
					}
					return false;
				}
			</script>

			<script>
				$(function() {
					// 폰트 리사이즈 쿠키있으면 실행
					font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
				});
			</script>
			<!--===================================================-->
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

</body></html>