<?
	include_once($_SERVER["DOCUMENT_ROOT"].'/young/common.php');
?>
<head>
	<meta charset="UTF-8">
	<title>LIST + BEISLER</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
	<script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>

	<link type="text/css" rel="stylesheet" href="../../../css/calendar.css">
	<link type="text/css" rel="stylesheet" href="../../../css//main.css">

<?/*	
	<link type="text/css" rel="stylesheet" href="/css/main.css">
	<link type="text/css" rel="stylesheet" href="/css/mapPoint.css">
	

	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="/script/pageShift.js"></script>
	<script type="text/javascript" src="/script/calendar.js"></script>*/?>
	<!--script> 
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
	</script-->

	
	<script>

function formAction(){
	//formAction s
		var form = $('#calendar')[0];
		var formData = new FormData(form);
		formData.append("profile", $("#profile_pt")[0].files[0]);

		$.ajax({
			mimeType: 'multipart/form-data',
			processData: false,
			contentType: false,
			url: "/calendar_update.php", // 요기에
			type: 'POST',
			data: formData,
			success: function(data) {
				alert('저장되었습니다.');
				location.reload();
				
			}, // success 

			error: function(xhr, status) {
				alert(xhr + " : " + status);
			}
		}); // $.ajax
		return false;

}

function previewImage(targetObj, View_area) {
	var preview = document.getElementById(View_area); //div id
	var ua = window.navigator.userAgent;

	//초기화
	//$('#View_area').empty();

	//ie일때(IE8 이하에서만 작동)
	if (ua.indexOf("MSIE") > -1) {
		targetObj.select();
		try {
			var src = document.selection.createRange().text; // get file full path(IE9, IE10에서 사용 불가)
			var ie_preview_error = document.getElementById("ie_preview_error_" + View_area);


			if (ie_preview_error) {
				preview.removeChild(ie_preview_error); //error가 있으면 delete
			}

			var img = document.getElementById(View_area); //이미지가 뿌려질 곳

			//이미지 로딩, sizingMethod는 div에 맞춰서 사이즈를 자동조절 하는 역할
			img.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + src + "', sizingMethod='scale')";
		} catch (e) {
			if (!document.getElementById("ie_preview_error_" + View_area)) {
				var info = document.createElement("<p>");
				info.id = "ie_preview_error_" + View_area;
				info.innerHTML = e.name;
				preview.insertBefore(info, null);
			}
		}
		//ie가 아닐때(크롬, 사파리, FF)
	} else {
		var files = targetObj.files;
		for (var i = 0; i < files.length; i++) {
			var file = files[i];
			var imageType = /image.*/; //이미지 파일일경우만.. 뿌려준다.
			if (!file.type.match(imageType))
				continue;
			var prevImg = document.getElementById("prev_" + View_area); //이전에 미리보기가 있다면 삭제
			if (prevImg) {
				preview.removeChild(prevImg);
			}
			var img = document.createElement("img");
			img.id = "prev_" + View_area;
			img.classList.add("obj");
			img.file = file;
			//img.style.width = '100%';
			//img.style.height = '100%';
			preview.appendChild(img);
			if (window.FileReader) { // FireFox, Chrome, Opera 확인.
				var reader = new FileReader();
				reader.onloadend = (function (aImg) {
					return function (e) {
						aImg.src = e.target.result;
					};
				})(img);
				reader.readAsDataURL(file);
			} else { // safari is not supported FileReader
				//alert('not supported FileReader');
				if (!document.getElementById("sfr_preview_error_" +
						View_area)) {
					var info = document.createElement("p");
					info.id = "sfr_preview_error_" + View_area;
					info.innerHTML = "not supported FileReader";
					preview.insertBefore(info, null);
				}
			}
		}
	}
}
</script>
</head>

<body>
	<div class="popupWindow">
		<div class="popupSell">

			<form id="calendar" name="calendar" method="post" enctype="multipart/form-data">
				<div class="content">

					<div class="ViewArea" id='View_area' style="">
					</div>
					
					<div class="col-all-12">
						<input type="file" name="profile_pt" id="profile_pt" onchange="previewImage(this,'View_area')">
					</div>
					<div class="col-all-12">
						<input type="date" id="day" name="day" placeholder="모집시작">
					</div>
					<div class="col-all-12">
						<input name="title" placeholder="제목">
					</div>
					<div class="col-all-12">
						<textarea name="memo" rows="8" placeholder="상세내용" style="resize: none;"></textarea>
					</div>
					<div class="col-all-12">
						<input type="button" class="submitBtn" id="formAction" href="javascript:formAction()" value="등록">
					</div>

				</div>
			</form>

		</div>
	</div>
</body>