//funtion start event------------------------------------
$(document).ready(function () {
	//버튼오버엑션
	btnConfig();
	//헤더바 엑션
	clikE01();
	//사이드바 엑션
	clikE02();
});


//side bar click
function clikE01() {

	$("#menuicon01").click(function () {
		var a = $("input[id='menuicon01']:checked").is(":checked");

		if (a == true) {
			$("#sideBar").removeClass("sideAnimateOut").addClass("sideAnimateIn");
			$("#sideBtn").removeClass("sideAnimateOut").addClass("sideAnimateIn");

			$("label[id='mcBtn01']").addClass("checked");
			$("label[id='mcBtn02']").addClass("checked");
		} else {
			$("#sideBar").removeClass("sideAnimateIn").addClass("sideAnimateOut");
			$("#sideBtn").removeClass("sideAnimateIn").addClass("sideAnimateOut");

			$("label[id='mcBtn01']").removeClass("checked")
			$("label[id='mcBtn02']").removeClass("checked")
		}
	});
}
//origins bar click
function clikE02() {
	$("#originsMapBtn").click(function () {
		var e = $("input[id='menuicon02']:checked").is(":checked");

		if (e == true) {
			$(".origins").addClass("animateIn");

			$("label[for='menuicon02']").addClass("checked");
		} else {
			$(".origins").removeClass("animateIn");

			$("label[for='menuicon02']").removeClass("checked")
		}

	});
}

//origin mouse over Evente
function btnConfig() {
	$(".area").mouseover(listOver).mouseout(listOut);
}
// mouse in
function listOver() {
	var mapName = $(this).attr("name");
	var mapImgSrc = "/img/mapArea/" + mapName + "_point.png";

	$(this).css("color", "red");
	$("#mapArea").attr("src", mapImgSrc);
	$(".mapArea").removeClass("animateOut").addClass("animateIn");
	//mapPoint controll 
	$(".mapPoint").addClass(mapName + " animateIn");
}
// mouse out
function listOut() {
	var mapName = $(this).attr("name");
	$(this).css("color", "#ffffff");
	$(".mapArea").removeClass("animateIn").addClass("animateOut");

	//mapPoint controll 
	$(".mapPoint").removeClass(mapName + " animateIn");
}