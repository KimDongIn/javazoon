//스크롤 이벤트
window.onscroll = function () {
	scrollEvent01();

	scrollEvent02();

	scrollEvent03();

	scrollEvent04();
};


// 병합 가능기 병합=================================================================================
// section2 content event 
function scrollEvent01() {
	if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
		$(".secfoot01").addClass("scrollOn");
//		$(".linkList").addClass("scrollOn");
	} else {
		$(".secfoot01").removeClass("scrollOn");
//		$(".linkList").removeClass("scrollOn");
	}
}
// opacity event
function scrollEvent02() {
	var scrollPosition = $(window).scrollTop();
	var op = (1 - (scrollPosition * 0.005));

	if (op < 1) {
		$(".secSell01").css({
			opacity: op
		});
	} else {
		$(".secSell01").css({
			opacity: 1
		});
	}
}
//스크롤 위치별 변화
function scrollEvent03() {
	if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
		$(".secFoot01").addClass("animate");
		$(".secFoot01 .titel").addClass("animate");
		$(".linkList").addClass("animate");
	} else {
		$(".secFoot01").removeClass("animate");
		$(".secFoot01 .titel").removeClass("animate");
		$(".linkList").removeClass("animate");
	}
}
//투명도
function scrollEvent04() {
	var scrollPosition = $(window).scrollTop();
	var op = (1 - (scrollPosition * 0.005));

	if (op < 1) {
		$(".secTop01 .titel").css({
			opacity: op
		});
	} else {
		$(".secTop01 .titel").css({
			opacity: 1
		});
	}
}
// =================================================================================


