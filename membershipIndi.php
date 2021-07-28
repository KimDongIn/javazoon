<?	
	include_once($_SERVER["DOCUMENT_ROOT"].'/young/common.php');
	//$area = sql_query("select * from area order by area_number asc");
?>



<!DOCTYPE html>
<html lang="kr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="imagetoolbar" content="no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>java coffe</title>
	<link rel="shortcut icon" href="./img/favicon.ico">
	<!-- Custom ==============================================-->
	<link type="text/css" rel="stylesheet" href="/css/introPage.css">

	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<!--==============================================================-->
	<script src="/young/js/jquery.register_form.js"></script>
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

	</script>
	<script src="/young/js/jquery-1.12.4.min.js"></script>
	<script src="/young/js/jquery-migrate-1.4.1.min.js"></script>
	<script src="/young/js/jquery.menu.js?ver=191202"></script>
	<script src="/young/js/common.js?ver=191202"></script>
	<script src="/young/js/wrest.js?ver=191202"></script>
	<script src="/young/js/placeholders.min.js"></script>
	<script src="/young/js/owlcarousel/owl.carousel.min.js"></script>
	<script src="/young/js/jquery.bxslider.js"></script>
	<!--================================================================-->

	<script>
		// 전체 체크박스 크릭 이벤트
		$(document).ready(function() {
			//최상단 체크박스 클릭
			$("#allServiceOn").click(function() {
				//클릭되었으면
				if ($("#allServiceOn").prop("checked")) {
					//모두 선택
					$("input[name=serviceOn]").prop("checked", true);
					//클릭이 안되있으면
				} else {
					// 선택 제거 
					$("input[name=serviceOn]").prop("checked", false);
				}
			})
		});

	</script>

	<script>
		$(function() {
			$("#reg_zip_find").css("display", "inline-block");

		});

		// submit 최종 폼체크
		function fregisterform_submit(f) {
			// 회원아이디 검사
			if (f.w.value == "") {
				var msg = reg_mb_id_check();
				if (msg) {
					alert(msg);
					f.mb_id.select();
					return false;
				}
			}

			if (f.w.value == "") {
				if (f.mb_password.value.length < 3) {
					alert("비밀번호를 3글자 이상 입력하십시오.");
					f.mb_password.focus();
					return false;
				}
			}

			if (f.mb_password.value != f.mb_password_re.value) {
				alert("비밀번호가 같지 않습니다.");
				f.mb_password_re.focus();
				return false;
			}

			if (f.mb_password.value.length > 0) {
				if (f.mb_password_re.value.length < 3) {
					alert("비밀번호를 3글자 이상 입력하십시오.");
					f.mb_password_re.focus();
					return false;
				}
			}

			// 이름 검사
			if (f.w.value == "") {
				if (f.mb_name.value.length < 1) {
					alert("이름을 입력하십시오.");
					f.mb_name.focus();
					return false;
				}

				/*
				var pattern = /([^가-힣\x20])/i;
				if (pattern.test(f.mb_name.value)) {
				    alert("이름은 한글로 입력하십시오.");
				    f.mb_name.select();
				    return false;
				}
				*/
			}


			// 닉네임 검사
			if ((f.w.value == "") || (f.w.value == "u" && f.mb_nick.defaultValue != f.mb_nick.value)) {
				var msg = reg_mb_nick_check();
				if (msg) {
					alert(msg);
					f.reg_mb_nick.select();
					return false;
				}
			}

			// E-mail 검사
			if ((f.w.value == "") || (f.w.value == "u" && f.mb_email.defaultValue != f.mb_email.value)) {
				var msg = reg_mb_email_check();
				if (msg) {
					alert(msg);
					f.reg_mb_email.select();
					return false;
				}
			}


			if (typeof f.mb_icon != "undefined") {
				if (f.mb_icon.value) {
					if (!f.mb_icon.value.toLowerCase().match(/.(gif|jpe?g|png)$/i)) {
						alert("회원아이콘이 이미지 파일이 아닙니다.");
						f.mb_icon.focus();
						return false;
					}
				}
			}

			if (typeof f.mb_img != "undefined") {
				if (f.mb_img.value) {
					if (!f.mb_img.value.toLowerCase().match(/.(gif|jpe?g|png)$/i)) {
						alert("회원이미지가 이미지 파일이 아닙니다.");
						f.mb_img.focus();
						return false;
					}
				}
			}

			if (typeof(f.mb_recommend) != "undefined" && f.mb_recommend.value) {
				if (f.mb_id.value == f.mb_recommend.value) {
					alert("본인을 추천할 수 없습니다.");
					f.mb_recommend.focus();
					return false;
				}

				var msg = reg_mb_recommend_check();
				if (msg) {
					alert(msg);
					f.mb_recommend.select();
					return false;
				}
			}

			if (!chk_captcha()) return false;

			document.getElementById("btn_submit").disabled = "disabled";

			return true;
		}

		jQuery(function($) {
			//tooltip
			$(document).on("click", ".tooltip_icon", function(e) {
				$(this).next(".tooltip").fadeIn(400).css("display", "inline-block");
			}).on("mouseout", ".tooltip_icon", function(e) {
				$(this).next(".tooltip").fadeOut();
			});
		});

	</script>
	<script>
		$(function() {
			//formAction s
			$('#selectID').change(function() {

				var city = $("#selectID").val();
				$.ajax({
					mimeType: 'multipart/form-data',
					processData: false,
					contentType: false,
					url: "ajaxPHP.php?city=" + city, // 요기에
					type: 'POST',

					success: function(data) {
						//console.log(data);
						$("#selectID2").empty();
						//$('#selectID2').append('<option value="">시 / 군</option>');
						$("#selectID2").append(data);

					}, // success 

					error: function(xhr, status) {
						alert(xhr + " : " + status);
					}
				}); // $.ajax
				return false;
			}); //formAction e
		});

	</script>
	<script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
	<script>
		function sample6_execDaumPostcode() {
			new daum.Postcode({
				oncomplete: function(data) {
					// 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

					// 각 주소의 노출 규칙에 따라 주소를 조합한다.
					// 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
					var addr = ''; // 주소 변수
					var extraAddr = ''; // 참고항목 변수

					//사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
					if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
						addr = data.roadAddress;
					} else { // 사용자가 지번 주소를 선택했을 경우(J)
						addr = data.jibunAddress;
					}

					// 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
					if (data.userSelectedType === 'R') {
						// 법정동명이 있을 경우 추가한다. (법정리는 제외)
						// 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
						if (data.bname !== '' && /[동|로|가]$/g.test(data.bname)) {
							extraAddr += data.bname;
						}
						// 건물명이 있고, 공동주택일 경우 추가한다.
						if (data.buildingName !== '' && data.apartment === 'Y') {
							extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
						}
						// 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
						if (extraAddr !== '') {
							extraAddr = ' (' + extraAddr + ')';
						}
						// 조합된 참고항목을 해당 필드에 넣는다.
						document.getElementById("sample6_extraAddress").value = extraAddr;

					} else {
						document.getElementById("sample6_extraAddress").value = '';
					}

					// 우편번호와 주소 정보를 해당 필드에 넣는다.
					document.getElementById('sample6_postcode').value = data.zonecode;
					document.getElementById("sample6_address").value = addr;
					// 커서를 상세주소 필드로 이동한다.
					document.getElementById("sample6_detailAddress").focus();
				}
			}).open();
		}

	</script>
	<script src="/young/js/jquery.register_form.js"></script>

	<script>
		var g5_captcha_url = "/young/plugin/kcaptcha";

	</script>
	<script src="/young/plugin/kcaptcha/kcaptcha.js"></script>
	<!--=================================-->

</head>

<body>
	<?
		$today = date("Ymdhis");
		//echo $today;
	?>

	<div class="imageWrap ">
		<!--bgAnimate-->
		<img src="/img/background/foto1.jpg">
	</div>



	<div class="introSell">
		<main class="membershipSell">

			<section class="sec01">
				<div class="sectionSell01">

					<div class="tabmenuSell">
						<input type="radio" name="tabmenu" id="tab01" checked="checked">
						<label for="tab01" class="bgColor01">
							<span>개인회원</span>
						</label>

						<input type="radio" name="tabmenu" id="tab02" onclick="location.href='/membershipComp.php'">
						<label for="tab02" class="bgColor02">
							<span>기업회원</span>
						</label>
					</div>


					<!-- 박스 1------------------------------------------------------->
					<div class="boardWrite box1">
						<!--개인회원가입=================================================-->
						<form id="fregisterform" name="fregisterform" action="./young/bbs/register_form_update.php" onsubmit="return fregisterform_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">

							<input type="hidden" name="w" value="">
							<input type="hidden" name="url" value="%2Fgnu%2Fbbs%2Fregister_form.php">
							<input type="hidden" name="agree" value="1">
							<input type="hidden" name="agree2" value="1">
							<input type="hidden" name="cert_type" value="">
							<input type="hidden" name="cert_no" value="">
							<input type="hidden" name="mb_sex" value="">
							<input type="hidden" name="mb_level" value="1">

							<div class="boardForm">

								<div class="col-all-12">
									<input type="hidden" name="mb_nick" value="<?=$today?>" id="reg_mb_nick" required="<?=$today?>" placeholder="<?=$today?>">
								</div>
								<div class="col-all-12">
									<input type="text" name="mb_id" value="" id="reg_mb_id" required="" placeholder="아이디">
								</div>

								<div class="col-all-12">
									<input type="password" name="mb_password" id="reg_mb_password" required="" placeholder="비밀번호">
								</div>

								<div class="col-all-12">
									<input type="password" name="mb_password_re" id="reg_mb_password_re" required="" placeholder="비밀번호확인">
								</div>

								<div class="col-all-12">
									<input type="text" id="reg_mb_name" name="mb_name" value="" required="" placeholder="이름">
								</div>
								<!-- 주소확인===================================================-->

								<div class="col-all-6">
									<input type="text" name="mb_zip1" id="sample6_postcode" placeholder="우편번호">
								</div>

								<div class="col-all-3">
									<input type="button" onclick="sample6_execDaumPostcode()" value="우편번호 찾기"><br>
								</div>

								<div class="col-all-12">
									<input type="text" name="mb_addr1" id="sample6_address" placeholder="주소"><br>
								</div>

								<div class="col-all-12">
									<input type="text" name="mb_addr2" id="sample6_detailAddress" placeholder="상세주소">
								</div>

								<div class="col-all-12">
									<input type="text" name="mb_addr3" id="sample6_extraAddress" placeholder="참고항목">
								</div>

								<!--
								<div class="col-all-12">
									<input type="text" name="place3" id="place3" placeholder="상세주소">
								</div>
-->
								<!--이메일 폼 확인!!===============-->

								<div class="col-all-12">
									<input type="text" name="mb_email" value="" id="reg_mb_email" required="" placeholder="이메일">
								</div>
								<!--
								<div class="col-all-7">
									<input type="text" name="mb_email" value="" id="reg_mb_email" required="" placeholder="이메일1">
								</div>
								<div class="col-all-1">
									<span>@</span>
								</div>
								<div class="col-all-4">
									<input type="text" name="mb_email" value="" id="reg_mb_email" required="" placeholder="이메일2">
								</div>
-->
								<!--=================================-->

								<div class="col-all-12">
									<input type="text" name="mb_tel" value="" id="reg_mb_tel" placeholder="전화번호">
								</div>
								<!--=====================================-->


								<!--================================================-->

								<!--이용약관-->
								<div class="col-all-12">
									<div class="termsBox">
										<span>개인정보 취급방침</span>
										<div class="TermsOfService">
											<p>
												1장. 개인정보 취급방침
											</p>
										</div>
										<div class="checkBoxSell">
											<input type="checkbox" name="serviceOn">
											<span>약관동의</span>
										</div>
									</div>

									<div class="termsBox">
										<span>이용약관</span>
										<div class="TermsOfService">
											<p>
												이용약관
												[총 칙]
											</p>
										</div>
										<div class="checkBoxSell">
											<input type="checkbox" name="serviceOn">
											<span>약관동의</span>
										</div>
									</div>

									<div class="termsBox">
										<div class="checkBoxSell">
											<input type="checkbox" id="allServiceOn">
											<span>전체 동의</span>
										</div>
									</div>
								</div>

								<!--자동등록 확인필요 =============================-->
								<div class="autoRegister">
									<fieldset id="captcha" class="">
										<legend>
											<label for="captcha_key">자동등록방지</label>
										</legend>

										<img src="/young/plugin/kcaptcha/kcaptcha_image.php?t=1584002153001" alt="" id="captcha_img">

										<div>
											<input type="text" name="captcha_key" id="captcha_key" required="" style="width: 50%">
											<button type="button" id="captcha_mp3"><strong>숫자음성듣기</strong></button>
											<button type="button" id="captcha_reload"><strong>새로고침</strong></button>
										</div>
										<div>
											<strong>자동등록방지 숫자를 순서대로 입력하세요.</strong>
										</div>
									</fieldset>
								</div>
								<!--==============================================-->
								<div class="col-all-6">
									<button class="Btn01" type="submit" id="btn_submit"> 가입 </button>
								</div>
								<div class="col-all-6">
									<button class="Btn01" onclick="location.href='/index.php'"> 닫기 </button>
								</div>
							</div>
						</form>

					</div>
					<!--------------------------------------------------------->

					<!--박스 2----------------------------------------------------->
					<!--
					<div class="boardWrite box2">

					</div>
-->
					<!--------------------------------------------------------->
				</div>
			</section>

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
	<!--------------------------------------------------------------------------------------------------->



</body>

</html>
