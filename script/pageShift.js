//coffeinfo list
$(document).ready(function () {
	//커피 생산지 이미지
	originsBg();
})

//파라미터 가져오기
function getParam(name) {
	var params = location.search.substr(location.search.indexOf("?") + 1);
	var sval = "";
	params = params.split("&");
	for (var i = 0; i < params.length; i++) {
		// key = var 값 나누기
		temp = params[i].split("=");
		if ([temp[0]] == name) {
			sval = temp[1];
		} else {
			sval = 0;
		}
	}
	return sval;
}


// coffeInfo pageshift
function pageWp(url, e) {
	
	var page = url;
	var coffeIndex = e;

	//로스팅 번호리스트
	var Roasting = [
//	"noneOrigin",
	"0",
//	"CostaRica", "ElSalvador", "Guatemala", "Honduras", "Jamaica", "Mexico", "Nicaragua", "Panama",
	"1601021645", "1602044795", "1601021643", "1602044793", "1602044790", "1602044788", "1602044785", "1602044783",
//	"Brazil", "Columbien", "Ecuador", "Peru",
	"1601021641", "1601021636", "1602044780", "1602044776",
//	"EastTimor", "India", "Indonesia", "Nepal", "PapuaNewGuinea", "Vietnam",
	"1602044774", "1601021633", "1601021629", "1602044771", "1602044769", "1602044767",
//	"Burundi", "Ethiopia", "Kenya", "Rwanda", "Tanzania", "Uganda", "Zambia"
	"1602044765", "1601021617", "1598098559", "1602044760", "1602044740", "1602044730", "1602044640"
	];

	//생두 번호리스트
	var greenBeans = [
//	"noneOrigin",
	"0",
//	"CostaRica", "ElSalvador", "Guatemala", "Honduras", "Jamaica", "Mexico", "Nicaragua", "Panama",
	"1604652382", "1604652379", "1604652376", "1604652372", "1604652363", "1604652360 ", "1604652355", "1604652352",
//	"Brazil", "Columbien", "Ecuador", "Peru",
	"1604652349", "1604652346", "1604652342", "1604652332",
//	"EastTimor", "India", "Indonesia", "Nepal", "PapuaNewGuinea", "Vietnam",
	"1604652330", "1604652322", "1604652314", "1604652312", "1604652308", "1604652305",
//	"Burundi", "Ethiopia", "Kenya", "Rwanda", "Tanzania", "Uganda", "Zambia"
	"1604652302", "1604652298", "1604652291", "1604652240", "1604652210", "1604652180", "1604652172"
	];

	if (coffeIndex == 0) {
		var coffeListPage = "http://list-beislerkorea.com/coffeList" + page + ".php";
		//커피 리스트 링크
		location.href = coffeListPage;
		
	} else {

		if (page == 1) {
			//마켓 페이지 
			var itemPagr = "/young/shop/item.php?it_id=";
			//로스팅 번호
			var pageNum = Roasting[coffeIndex];

		} else if (page == 2) {
			// 마켓페이지
			var itemPagr = "/young/shop/item.php?it_id=";
			//생두 번호
			var pageNum = greenBeans[coffeIndex];
		}

		//커피 개인별 마켓 링크
		location.href = itemPagr + pageNum;
	}
}

	//coffeInfo Multi page Event------------------------------
	function originsBg() {

		//======================================================================================================
		//커피 인덱스 네임
		var CountryList = [
	"noneOrigin",
	"CostaRica", "ElSalvador", "Guatemala", "Honduras", "Jamaica", "Mexico", "Nicaragua", "Panama",
	"Brazil", "Columbien", "Ecuador", "Peru",
	"EastTimor", "India", "Indonesia", "Nepal", "PapuaNewGuinea", "Vietnam",
	"Burundi", "Ethiopia", "Kenya", "Rwanda", "Tanzania", "Uganda", "Zambia"
	];

		//로스팅 번호리스트
		var Roasting = [
//	"noneOrigin",
	"0",
//	"CostaRica", "ElSalvador", "Guatemala", "Honduras", "Jamaica", "Mexico", "Nicaragua", "Panama",
	"1601021645", "1602044795", "1601021643", "1602044793", "1602044790", "1602044788", "1602044785", "1602044783",
//	"Brazil", "Columbien", "Ecuador", "Peru",
	"1601021641", "1601021636", "1602044780", "1602044776",
//	"EastTimor", "India", "Indonesia", "Nepal", "PapuaNewGuinea", "Vietnam",
	"1602044774", "1601021633", "1601021629", "1602044771", "1602044769", "1602044767",
//	"Burundi", "Ethiopia", "Kenya", "Rwanda", "Tanzania", "Uganda", "Zambia"
	"1602044765", "1601021617", "1598098559", "1602044760", "1602044740", "1602044730", "1602044640"
	];

		//생두 번호리스트
		var greenBeans = [
//	"noneOrigin",
	"0",
//	"CostaRica", "ElSalvador", "Guatemala", "Honduras", "Jamaica", "Mexico", "Nicaragua", "Panama",
	"1604652382", "1604652379", "1604652376", "1604652372", "1604652363", "1604652360 ", "1604652355", "1604652352",
//	"Brazil", "Columbien", "Ecuador", "Peru",
	"1604652349", "1604652346", "1604652342", "1604652332",
//	"EastTimor", "India", "Indonesia", "Nepal", "PapuaNewGuinea", "Vietnam",
	"1604652330", "1604652322", "1604652314", "1604652312", "1604652308", "1604652305",
//	"Burundi", "Ethiopia", "Kenya", "Rwanda", "Tanzania", "Uganda", "Zambia"
	"1604652302", "1604652298", "1604652291", "1604652240", "1604652210", "1604652180", "1604652172"
	];
		//======================================================================================================
		//파라미터값
		var itemNum = getParam("it_id");

		//상품번호 index
		if (Roasting.includes(itemNum)) {
			var pageNum = Roasting.indexOf(itemNum);
		} else if (greenBeans.includes(itemNum)) {
			var pageNum = greenBeans.indexOf(itemNum);
		}

		//나라이름
		var country = CountryList[pageNum];

		//페이지정보
		var FileName = "Origins_" + country + ".jpg";
		var FileUrl = "/img/background/" + FileName;
		var mapUrl = "/img/mapArea/" + country + ".png";
		var contryText = coffeText(pageNum);

		//상세내역 가져오기
		var detList = originDetail(pageNum);

		$(".oriDec").each(function (i, e) {
			$(e).html(detList[i]);
		});

		//img file 
		$("#OriginsBg").attr("src", FileUrl);
		$("#contryMap").attr("src", mapUrl);

		//text file
		$("#originsText").html(contryText);
		$("#originsTitel01").html(country);
		$("#originsTitel02").html(country);

	}
	//
	//function testScript() {
	//	var detList = originDetail(1);
	//
	//	$(".oriDec").each(function (i, e) {
	//		$(e).html(detList[i]);
	//	});
	//}


	function coffeText(e) {
		var textIndex = e;
		var coffeText = [
		//basic
	"basic",

	//CostaRica
	"열대 국가 중에서 코스타리카 는 아마도 가장 환경 친화적 인 국가 일 것입니다. 이 나라 토지의 25 % 이상이 국립 공원에서 보호되고 있으며, 세계 생물 다양성의 5 %가이 다소 작은 나라에서 발견 될 수 있습니다. 자연 보호에 대한 이러한 인상적인 발전에 이어 코스타리카는 안정적인 경제 성장에 대한 명성을 쌓았습니다. 코스타리카 인들은 스스로를 \" 티코 \" 라고 부르며 국가 군대의 부재를 강력히 믿습니다. 당연히이 진보적 인 국가는 Happy Planet Index에 따르면 지구상에서 가장 행복한 사람들 중 하나라고합니다. 우리는이 티코 배려와 사려 깊음이이 중앙 아메리카의 아름다움의 커피 한 잔에서도 찾을 수 있다고 믿습니다.",

	//ElSalvador
	"ElSalvador",

	//Guatemala
	"과테말라 는 풍부한 토착 문화와 아름다운 자연 서식지가있는 매혹적인 나라입니다. 그 풍경의 가장 눈에 띄는 특징은 37 개의 화산이며 그중 몇 개는 여전히 활성화되어 있습니다. 이 화산은 여행자에게 매력적일뿐만 아니라 과테말라 커피에서 발견되는 독특한 특성을 구성합니다.",

	//Honduras
	"중앙 아메리카의 한가운데에 위치한 온두라스 는 자연의 아름다움을 자랑하는 나라입니다. 고독한 길을 가로 지르는 끝없는 숲은 스칸디나비아의 열대 버전을 생각하게합니다. 어떤 사람들은 온두라스를 중앙 아메리카의 \"녹색 폐\"라고 부르기도합니다. 무성한 산맥 중 일부는 우리가 좋아하는 달콤하고 열매가 많은 온두라스 커피에 전념합니다.",

	//Jamaica
	"Jamaica",

	//Mexico
	"Mexico",

	//Nicaragua
	"Nicaragua",

	//Panama
	"중남미를 연결하고 국가를 반으로 자르는 운하 인 인간 공학의 위업으로 유명하게 알려진 파나마 는 풍부한 문화 및 자연 유산으로 유명합니다. 파나마의 지리는 매우 다양하여 작은 영토 내에서 여러 미기후 지역의 확산을 허용합니다. 미기후의 다양성으로 인해 커피 생산 지역이 뛰어난 품질의 커피를 재배 할 수 있었기 때문에 이는 커피에있어 이점이었습니다.",

	//Brazil
	"브라질 은 지리적 광대 함으로 잘 알려져 있습니다. 아마존 분지는 천 킬로미터 이상에 걸쳐 펼쳐져 있으며 끝없는 해안선이 동쪽의 국가를 둘러싸고 있습니다. 브라질 중부 지역의 Cerrado 고원은 Goiás, Mato Grosso do Sul, Mato Grosso, Tocantins 및 Minas Gerais 주를 포함하여 세계에서 가장 큰 커피 생산 지역 중 하나입니다.",

	//Columbien
	"역사적으로 콜롬비아 는 다양한시기의 폭력과 좌절로 산산조각이났습니다. 그러나 지난 20 년 동안 콜롬비아는 라틴 아메리카에서 경제 강국으로 도약했습니다. 저명한 커피를 찾기 위해 콜롬비아를 지나갈 수는 없습니다. 품질 평판은 노력과 훌륭한 지형에서 비롯됩니다.",

	//Ecuador
	"Ecuador",

	//Peru
	"서쪽의 청회색과 거품이 나는 태평양, 중앙의 웅장한 안데스, 동쪽의 무한한 아마존 분지 인 페루 는 여러 가지 이유로 감탄할 수 있습니다.",

	//EastTimor
	"서부에서 동 티모르로 더 잘 알려진 동티 모르는 인도양과 태평양 사이에 위치한 섬나라의 동부이며 서부는 인도네시아에 속합니다. 120 만 명의 인구는 1975 년 포르투갈로부터 독립을 선언 한 후 2002 년에 공식적으로 독립된 국가가되었습니다.",

	//India
	"인도 는 생생한 시장 거리에 붉은 벽돌과 황토 향료가 가득한 그릇, 황금빛 해변을 치는 청록색 물, 초록빛 화산 산맥이 인도의 동식물의 다양성을 스케치합니다. 어떤 종류의 초목도 찾기가 어렵습니다. 당연히 다양한 농산물 바구니를 제공합니다. 수출에서 차지하는 비중은 적지 만 인도의 스페셜티 커피 생산은 심각한 관심을 끌기 시작했습니다.",

	//Indonesia
	"약 17,000 개의 섬이 인도네시아 공화국을 구성합니다 . 적도를 따라 5,000km 이상 뻗어 있습니다. 당연히 풍경과 문화는 지역마다 다릅니다. 인도네시아의 정체성과 광범위한 종교적 신념에 인도, 아랍, 중국 및 유럽의 영향이 있습니다. 그럼에도 불구하고 인도네시아는 다양한 생활 방식에도 불구하고 종종 평화로운 공존과 관용의 모범으로 간주됩니다. 인도네시아 사람들만큼이나 인도네시아 커피도 다양합니다. 맛은 섬마다 크게 다릅니다. 그들을 탐험하는 것은 진정으로 흥미롭고 모험적인 행동으로 바뀔 수 있습니다.",

	//Nepal
	"Nepal",

	//PapuaNewGuinea
	"파푸아 뉴기니를 생각할 때 무엇이 떠오르 나요? 이 외딴 나라가 가장 적게 발견 된 나라 중 하나로 남아 있기 때문에 대부분은 그렇지 않을 것입니다. 태평양의 동쪽 경계를 표시하는 호주 끝의 북쪽에 위치한이 나라는 문화적 다양성으로 놀라움을 금치 못합니다. 850 개 이상의 언어가이 나라에서 자리를 잡았습니다. 당연히 PNG는 세계에서 가장 시골의 국가 중 하나입니다. 과학자들은 또한 PNG가 무성한 정글에 연결되지 않은 토착민뿐만 아니라 발견되지 않은 수많은 식물과 동물을 여전히 보유 할 수 있다고 믿습니다. 이 놀랍고 길들여지지 않은 땅의 커피에 더 많은 관심을 기울일 충분한 이유.",

	//Vietnam
	"Vietnam",

	//Burundi
	"부룬디 는 \"천개의 언덕의 땅\"으로 가장 잘 알려져 있습니다. 고지대가 벨기에와 비슷한 크기의 풍경을 지배합니다. 고원은 \"구르는\"산의 독특한 모양을 형성합니다. 이 녹색 슬로프는 부룬디 최고의 커피 나무뿐만 아니라 코끼리, 하마, 버팔로 및 악어의 고향입니다.",

	//Ethiopia
	"서쪽에는 비옥하고 인구 밀도가 높은 땅이있는 반면 광대하고 외로운 사바나는 동쪽을 지배합니다. 에티오피아 는 자연적으로 대조되는 나라입니다. 더욱이,이 동 아프리카 보석은 서양의 영향을 거의받지 못했습니다. 풍부한 문화 유산은이 나라를 오늘날 다양한 종교와 민족이 고향이라고 부르는 곳으로 만들었습니다. 게다가 에티오피아는 커피 생산이 탄생 한 곳입니다.",

	//Kenya
	"적도는이 동 아프리카 보석을 직접 통과합니다. 열대 기후에도 불구하고 케냐 는 인도양과 빅토리아 호수를 통해 멋진 냉각을 경험합니다. 풍부한 야생 동물이 서식하는 평평한 사바나가 중앙 고지대까지 올라와 케냐 산이 5,199m로 정점에 이릅니다. 무성한 경사면이 비옥 한 농지로 바뀌어 커피 재배를위한 이상적인 조건을 만드는 곳입니다.",

	//Rwanda
	"르완다 는 다양성이 풍부하고 비옥 한 땅이 풍부한 나라입니다. 전국은 상대적으로 높은 고도로 설정되어 있으며 가장 낮은 지점은 해발 950m입니다. 동쪽에는 흙이 많은 늪과 햇볕이 잘 드는 사바나가 우세하며 중앙은 구불 구불 한 언덕이 특징입니다. 그러나 서쪽은 야생 생물이 풍부한 Albertine Rift 산림 생태 지역 내에 있습니다. 키부 호수는 콩고와의 서쪽 국경을 표시하는 르완다에서 가장 큰 호수입니다. Albertine Rift Mountains의 일부인이 지역은 일반적으로 동쪽만큼 덥지 않아 훌륭한 커피 재배 조건을위한 여지를 남깁니다. 화산은 녹지가 우거진 전체 지역을 축복하는 영양 토양을 제공했습니다.",

	//Tanzania
	"탄자니아 는 다양한 야생 동물, 풍부한 문화, 자연의 최상급 요소로 기절합니다. 1900 년대 초부터 탄자니아는 자연의 아름다움을 보존하는 데 특별한 관심을 가졌습니다. 오늘날 국가 영토의 약 38 %가 공식 국립 공원 또는 보호 구역입니다. 여기에 장엄한 해안선과 북쪽의 눈 덮인 킬리만자로가 추가됩니다. 언어와 문화의 다채로운 조화를 경험하면 탄자니아와 같은 사랑에 빠질 것입니다. 이러한 다양성 속에서 복잡한 컵을 가진 최고급 아프리카 커피가 발견됩니다.",

	//Uganda
	"윈스턴 처칠 은 숨막히는 자연의 아름다움으로 우간다 를 \"아프리카의 진주\" 라고 불렀습니다. 비록 내륙국이지만 우간다에는 풍부한 물이 있습니다. 남서부의 눈 덮인 Rwenzori 산맥은 나일강의 샘이기도합니다. 마지막으로 자유롭게 돌아 다니는 고릴라의 고향 인 초록빛 산맥은 전국 여러 지역에서 볼 수 있습니다. 경치가 아름다운이 땅은 농업을 주요 수입원으로 삼고있는 우간다 인구의 85 %가 살고 있습니다. 커피는 여전히 가장 가치있는 수출품으로 남아 있으며 우간다 최고의 선택을 소개하게되어 기쁩니다.",

	//Zambia
	"Zambia"
	];

		return coffeText[e];
	}

	function originDetail(n) {
		var originNum = n;

		var noneOrigin = [
				// 지역명 ORIGIN
				"",

				// 상세지역 COFFEE REGIONS
				"",

				// 대룩명 CONTINENT
				"",

				// 고도 COFFEE ALTITUDES
				"",

				// 품종 VARIETIES
				"",

				// 인구 POPULATION
				"",

				// 수확기간 HARVEST PERIOD
				"",

				// 농장/농가 면적 NUMBER OF COFFEE FARMS / FARMERS
				"",

				// 연간 생산 합계(60kg 가방) YEARLY PRODUCTION TOTAL (IN 60KG BAGS)
				"",

				// 평균 농장 크기 AVERAGE FARM SIZE
				"",

				//지역설명01
				"",

				//지역설명02
				""
			];
		var CostaRica = [
				// 지역명 ORIGIN
				"Costa Rica",

				// 상세지역 COFFEE REGIONS
				"Central Valley West Valley, Tarrazú",

				// 대룩명 CONTINENT
				"Central America",

				// 고도 COFFEE ALTITUDES
				"700 – 1,900 MASL",

				// 품종 VARIETIES
				"Bourbon, Jackson, Mibrizi and some SL varieties",

				// 인구 POPULATION
				"4,900,000",

				// 수확기간 HARVEST PERIOD
				"Oct – Mch",

				// 농장/농가 면적 NUMBER OF COFFEE FARMS / FARMERS
				"smallholders and plantations",

				// 연간 생산 합계(60kg 가방) YEARLY PRODUCTION TOTAL (IN 60KG BAGS)
				"1,500,000(1,500,000 Arabica)",

				// 평균 농장 크기 AVERAGE FARM SIZE
				"0.5 – 5.5ha",

				//지역설명01
				"코스타리카 최초의 커피 생산은 18 세기 후반으로 거슬러 올라갑니다. 정부는 5 년 간의 커피 재배 후 재배자에게 농지를 무료로 제공함으로써 커피 재배에 대한 주요 인센티브를 만들었습니다. 그것은 커피를 가장 중요한 수출품으로 바꾸었고 국가 경제 성장의 상당 부분을 차지했습니다.",

				//지역설명02
				"그러나 1990 년대 중반까지 커피 생산은 코스타리카에 그 그림자를 두었습니다. 원두를 발효시키는 데 사용되는 물은 삼림 벌채가 임계 수준에 도달 한 동안 여과없이 세척 스테이션을 떠났습니다. 1995 년 정부가 다시 한 번 발을 들여 커피 생산에 엄격한 환경법을 제정함으로써 급진적 인 변화를 일으켰습니다. \n오늘날 코스타리카는 최고의 생산 및 품질 기준을 보유한 것으로 유명합니다. 여기에는 커피 컵에 대한 높은 품질 기준뿐만 아니라 생산의 사회 복지 및 친환경 가공 기술도 포함됩니다. 코스타리카 커피는 중간 정도의 바디를 가지고 있으며 신선하고 달콤한 산미로 균형 잡힌 놀라움을 선사합니다."
			];
		var Guatemala = [
				// 지역명 ORIGIN
				"Guatemala",

				// 상세지역 COFFEE REGIONS
				"Antigua, Huehuetenango, San Marcos, Acatenango, Atitlán, Cobán, Nuevo Oriente, Fraijanes",

				// 대룩명 CONTINENT
				"Central America",

				// 고도 COFFEE ALTITUDES
				"1,300 – 2,000 MASL",

				// 품종 VARIETIES
				"Bourbon, Caturra, Typica, Catuai, Pache",

				// 인구 POPULATION
				"15,400,000",

				// 수확기간 HARVEST PERIOD
				"Dec – Mch",

				// 농장/농가 면적 NUMBER OF COFFEE FARMS / FARMERS
				"smallholders and plantations",

				// 연간 생산 합계(60kg 가방) YEARLY PRODUCTION TOTAL (IN 60KG BAGS)
				"3,500,000(3,500,000 Arabica)",

				// 평균 농장 크기 AVERAGE FARM SIZE
				"0.5 – 5.5 ha",

				//지역설명01
				"",

				//지역설명02
				""
			];
		var Brazil = [
				// 지역명 ORIGIN
				"Brazil",

				// 상세지역 COFFEE REGIONS
				"Minas Gerais, Cerrado, Sul de Minas, Sao Paolo, Mato Grosso, Espirito Santo, Paraná, Bahia",

				// 대룩명 CONTINENT
				"South America",

				// 고도 COFFEE ALTITUDES
				"600 – 1,300 MASL",

				// 품종 VARIETIES
				"Mundo Novo, Yellow Bourbon, Caturra, Catuai",

				// 인구 POPULATION
				"207,300,000",

				// 수확기간 HARVEST PERIOD
				"May – Sep",

				// 농장/농가 면적 NUMBER OF COFFEE FARMS / FARMERS
				"bigger 'smallholders' and plantations",

				// 연간 생산 합계(60kg 가방) YEARLY PRODUCTION TOTAL (IN 60KG BAGS)
				"51,800,000(40,100,000 Arabica + 11,000,000 Robusta)",

				// 평균 농장 크기 AVERAGE FARM SIZE
				"5 – 20 ha",

				//지역설명01
				"브라질의 커피 생산량은 전체 커피 생산량의 약 3 분의 1을 차지하여 지난 150 년 동안 전 세계적으로 가장 큰 생산자가되었습니다. 아라비카와 로부스타는 모두 재배되고, 후자는 코니 용으로 알려진 반면 아라비카는 ca. 80 %.",

				//지역설명02
				"일반적인 설명 Santos는 전통적으로 국가의 여러 지역에서 온 커피가 배송되는 항구를 가리키는 브랜드 이름입니다. 브라질 산 커피는 고유하게 자세히 설명되어 있습니다. NY 2는 \"New York 2\"를 의미하며 뉴욕 증권 거래소의 결함 계수 방법에 따라 허용되는 최대 결함 수를 나타내며 품질면에서 최고 등급입니다. \n화면 17/18은 브라질 등급 중 가장 큰 콩 크기를 정의합니다. 매우 부드럽고 미세한 컵은 컵 프로파일을 설명합니다. 부드럽고 일관되고 깨끗한 컵이 필요합니다. 브라질에서 생산되는 아라비카의 약 90 %에 사용되는 가장 일반적인 가공 방법은 건조 공정으로, 세척되지 않은 공정 또는 천연 공정이라고도합니다. 커피 체리 전체를 먼저 세척 한 다음 햇볕에 두어 파티오에서 얇게 건조하거나 건조기로 건조시킵니다. 브라질의 커피 농장은 종종 광대 한 땅을 덮고 있으며,이를 관리하고 운영하고 엄청난 양의 커피를 생산하기 위해 수백 명의 사람들이 필요합니다."
			];
		var Columbien = [
				// 지역명 ORIGIN
				"Columbien",

				// 상세지역 COFFEE REGIONS
				"Huila, Antioquia, Quindio, Risaralda, Caldas, Tolima, Cauca, Valle del Cauca, Santander, Cundinamarca, Narino, Sierra Nevada",

				// 대룩명 CONTINENT
				"South America",

				// 고도 COFFEE ALTITUDES
				"900 – 2,300 MASL",

				// 품종 VARIETIES
				"Typica, Caturra, Castillo",

				// 인구 POPULATION
				"47,700,000",

				// 수확기간 HARVEST PERIOD
				"Sep – Dec (Main Crop), Mch – Jun (Fly Crop / Mitaca)",

				// 농장/농가 면적 NUMBER OF COFFEE FARMS / FARMERS
				"smallholders and plantations",

				// 연간 생산 합계(60kg 가방) YEARLY PRODUCTION TOTAL (IN 60KG BAGS)
				"14,200,000(14,200,000 Arabica)",

				// 평균 농장 크기 AVERAGE FARM SIZE
				"0.5 – 5.5 ha",

				//지역설명01
				"콜롬비아의 자연의 아름다움은이 독특한 남미 보석에서 두 개의 바다, 눈 덮인 산과 빙하, 끝없는 사막, 아마존 분지 등 극도의 다양성에서 비롯됩니다. 이 나라의 서쪽에는 \"Cordilleras\"라고 불리는 세 개의 안데스 산맥이 지배적입니다.",

				//지역설명02
				"적도에 근접하기 때문에이 산맥 내에 여러 미기후가 형성됩니다. 여기에 800 ~ 2,200 미터의 고도를 더하면 콜롬비아 커피가 왜 그렇게 다양한 지 깨닫게 될 것입니다."
			];
		var India = [
				// 지역명 ORIGIN
				"India",

				// 상세지역 COFFEE REGIONS
				"Tamil Nadu, Karnataka, Bababudangiri, Chikmagalur, Coorg, Kerala",

				// 대룩명 CONTINENT
				"Asia",

				// 고도 COFFEE ALTITUDES
				"800 – 2,000 MASL",

				// 품종 VARIETIES
				"S795, S274, Selection (4, 5, 5B, 6, 9) Kent, Cauvery, Robusta",

				// 인구 POPULATION
				"1,280,000,000",

				// 수확기간 HARVEST PERIOD
				"Oct – Feb",

				// 농장/농가 면적 NUMBER OF COFFEE FARMS / FARMERS
				"250,000 smallholders and plantations",

				// 연간 생산 합계(60kg 가방) YEARLY PRODUCTION TOTAL (IN 60KG BAGS)
				"6,200,000(1,600,000 Arabica + 4,600,000 Robusta)",

				// 평균 농장 크기 AVERAGE FARM SIZE
				"0.5 – 5.5 ha",

				//지역설명01
				"인도는 일반적으로 차로 더 잘 알려져 있습니다. 그러나 커피 생산의 실제 기원은 1670 년으로 거슬러 올라갑니다. 전설에 따르면 성자 바바 부단 (Baba Budan)은 메카를 순례하는 동안 예멘의 Mokka 항구에 들렀습니다. 그곳에서 그는 커피 나무를 발견하고 곡물 7 개를 터번에 싸서 인도로 밀수했습니다. 그가 도착하자 그는 Chikmagalur의 상록수 꽃이 만발한 산 근처의 정원에 콩을 심었고 인도에서 커피의 발상지가 생겼습니다.",

				//지역설명02
				"그의 이름을 기리기 위해 비옥 한 산 사슬은 그의 이름을 따서 명명되었으며 (Giri = 산) 가장 영양이 풍부한 인도 아라비카 중 일부로 유명합니다. 오늘날 인도에는 약 250,000 명의 커피 재배자가 있으며 이들 중 98 %가 소작농입니다. 인도 생산의 대부분은 케 랄라와 카르 나 타카 주에있는 남부 지역에서 이루어집니다. 후자는 세계에서 가장 큰 생물 다양성 핫스팟 중 하나에 내재 된 산맥 인 풍부한 서부 가츠 (Western Ghats)에 의해 형성됩니다. /n아라비카는 국가 생산량의 약 40 %를 차지하지만, 인디언 로부스타도 어느 정도 명성을 얻었으며 대부분 케 랄라에서 재배되었습니다. 아라비카와 로부스타 콩은 모두 계절풍 말라 바로 가공 할 수 있습니다. 이 전통적인 가공 방법은 인도에 고유하며 커피를 실은 선박이 영국으로가는 길에 폭우와 높은 습도를 경험했던 초기부터 시작되었습니다. 오늘날 커피는 몬순 기간 동안 높은 습도에 노출되어 물에 흡수되어 독특한 우디 향을 얻습니다."

			];
		var Indonesia = [
				// 지역명 ORIGIN
				"Indonesia",

				// 상세지역 COFFEE REGIONS
				"Sumatra, Java, Sulawesi, Flores, Bali",

				// 대룩명 CONTINENT
				"Asia",

				// 고도 COFFEE ALTITUDES
				"900 – 1,800 MASL",

				// 품종 VARIETIES
				"Typica (and derivatives), Tim Tim, Ateng, Onan, Ganjang, S795, Ateng",

				// 인구 POPULATION
				"260,100,000",

				// 수확기간 HARVEST PERIOD
				"Sep – Dec (Sumatra), Jul – Sep (Java), May – Nov (Sulawesi), May – Sep (Flores), May – Oct (Bali)",

				// 농장/농가 면적 NUMBER OF COFFEE FARMS / FARMERS
				"smallholders and plantations",

				// 연간 생산 합계(60kg 가방) YEARLY PRODUCTION TOTAL (IN 60KG BAGS)
				"12,100,000(2,100,000 Arabica + 10,000,000 Robusta)",

				// 평균 농장 크기 AVERAGE FARM SIZE
				"0.5 – 5.5 ha",

				//지역설명01
				"인도네시아의 커피 재배는 300 년의 역사를 가지고 있습니다. 오늘날 인도네시아는 세계 5 대 커피 생산국 중 하나로 꼽 힙니다. 약 17,000 개의 섬 중 일부만이 인도네시아의 주요 커피 생산 지역으로 부상했습니다. 더 잘 알려진 섬 중에는 수마트라, 술라웨시, 자바뿐만 아니라 발리와 플로레스와 같은 작은 섬도 있습니다. 대략. 커피 생산량의 92 %는 \"giling basah\"라고하는 반 세척 가공 기술과 같은 전통적인 기술을 사용하는 소규모 생산자들의 손에 있습니다. \"Giling basah\"는 문자 그대로 \"습식 분쇄\"를 의미하며 (완전) 세척 과정과의 주요 차이점을 암시합니다.",

				//지역설명02
				"체리의 펄프를 기계적으로 제거한 후 콩은 하루 동안 건조됩니다. 다음으로 점액을 씻어내어 양피지를 말리십시오. 여기에 근본적인 차이점이 있습니다. 양피지는 수분 함량이 30-35 %까지만 건조되고이 \"반 건조\"상태에서 즉시 껍질이 벗겨집니다. 일반적으로 양피지는 배송 직전까지 콩에 남아 있습니다. 이제 껍질을 벗긴 콩은 원하는 수분 수준 인 11-12 %에 도달 할 때까지 건조됩니다. /n이 세미 워싱 과정의 결과로 콩은 푸른 빛을 띠고 산도가 거의 없습니다. 그들은 몸 전체와 흙, 담배 및 허브와 같은 강한 매운 향을 갖는 경향이 있습니다. 그러나 흩어져있는 소규모 구조와 자율적 인 처리로 인해 균질 한 커피를 소싱하는 것은 때로는 진정한 도전으로 이어질 수 있습니다."
			];
		var Ethiopia = [
				// 지역명 ORIGIN
				"Ethiopia",

				// 상세지역 COFFEE REGIONS
				"Africa",

				// 대룩명 CONTINENT
				"Sidamo, Yirgacheffe, Limu, Jima, Lekempti, Harrar",

				// 고도 COFFEE ALTITUDES
				"1,400 – 2,200 MASL",

				// 품종 VARIETIES
				"Heriloom Varieties",

				// 인구 POPULATION
				"105,000,000",

				// 수확기간 HARVEST PERIOD
				"Oct – Feb",

				// 농장/농가 면적 NUMBER OF COFFEE FARMS / FARMERS
				"mainly smallholder, some private estates",

				// 연간 생산 합계(60kg 가방) YEARLY PRODUCTION TOTAL (IN 60KG BAGS)
				"6,000,000(6,000,000 Arabica)",

				// 평균 농장 크기 AVERAGE FARM SIZE
				"0.5 – 5.5 ha",
				//지역설명01
				"에티오피아는 커피의 요람으로 간주되며 Coffea Arabica가 야생으로 자란 카파 지역의 숲에 있었다는 사실로 유명합니다. &오늘날이 나라는 전형적인 '소규모'구조를 보여줍니다. 즉, 일반적으로 생산량이 적은 많은 농부들이 체리를 함께 가져와 자체 기계로 커피를 처리하는 대신 중앙 세척 스테이션으로 가져갑니다. 세탁소에서 원두는 가공 전에 조심스럽게 분류됩니다. 완전히 익고 붉은 체리 만이 균질하고 일관된 품질을 보장하기 위해 펄퍼로 향합니다. 종종 이러한 균질 한 품질은 대부분 여성이 수행하는 손으로 등급을 매기는 것을 통해 보장됩니다.",

				//지역설명02
				"특별한 배려와 헌신이 컵에 분명하게 반영됩니다. 에티오피아 커피는 균형 잡힌 몸매와 흥미 진진한 뒷맛을 유지하면서 꽃과 과일 향이 가득한 매우 복잡합니다. 또한 에티오피아 사람들은 생산량의 40 %가 국내에서 소비되는 것으로 알려져 있기 때문에 자신의 커피를 좋아합니다. 이것은 에티오피아를 생산국 중 세계에서 가장 큰 커피 소비국으로 만듭니다. 커피는 수출되기 전에 이미 에티오피아 문화에서 잘 확립되었습니다. 오늘날에도 여전히 시행되는 전통적인 커피 의식은 가족과 이웃이 함께 일상을 함께합니다. \n일반적으로 커피를 준비하는 명예로운 임무는 가정의 여성이 수행합니다. 그녀는 먼저 불에 냄비에 콩을 볶은 다음 나무 절구로 갈아서 끓는 물에 몇 분 동안 추가합니다. 물이 커피의 풍미를 흡수하면 체질하여 교묘 한 방식으로 제공됩니다. 경내는 한 번의 의식을 위해 세 번 양조됩니다. 필립이 에티오피아에 있고 커피 한잔에 초대받을만큼 운이 좋을 때마다, 그는 자신이 좋아하는 커피 중 하나에 대한이 능숙한 축하를 충분히 얻지 못하기 때문에 양조 의식의 세 라운드 모두에 참여해야합니다."
			];

		var Kenya = [
				// 지역명 ORIGIN
				"Kenya",

				// 상세지역 COFFEE REGIONS
				"Africa",

				// 대룩명 CONTINENT
				"Mt. Kenya, Murang\'a, Meru, Kiamb",

				// 고도 COFFEE ALTITUDES
				"1,200 – 2,300 MASL",

				// 품종 VARIETIES
				"SL-28, SL-34, Ruiru 11, Batian",

				// 인구 POPULATION
				"48,000,000",

				// 수확기간 HARVEST PERIOD
				"Oct – Feb (Main Crop), Jun – Aug (Fly Crop)",

				// 농장/농가 면적 NUMBER OF COFFEE FARMS / FARMERS
				"smallholders and plantations",

				// 연간 생산 합계(60kg 가방) YEARLY PRODUCTION TOTAL (IN 60KG BAGS)
				"800,000(800,000 Arabica)",

				// 평균 농장 크기 AVERAGE FARM SIZE
				"0.5 – 5.5 ha",

				//지역설명01
				"붉은 화산 토양, 높은 고도 및 이상적인 기후의 조합은 이러한 커피를 특징 짓는 뚜렷한 과일 향과 거의 육즙이 풍부한 향의 개발에 결정적인 영향을 미칩니다. 적도의 지리적 위치로 인해 케냐의 계절마다 차이가 거의 없습니다. ",

				//지역설명02
				"이웃 인 에티오피아와는 달리 커피 재배는이 카운티에 비교적 새로운 일이며 1900 년대 초에 시작되었습니다. 오늘날 농업은 케냐 GDP의 주요 기여자이며, 그중 커피는 차와 원예 농산물에 이어 3 위를 차지합니다. 케냐의 커피 재배 면적은 16 만 헥타르로 추정됩니다. \n농장은 면적의 약 1/3을 차지합니다. 그러나 토지의 가장 큰 부분은 협동 조합에 자신을 배정하는 소규모 농민들이 사용합니다. 일반적으로 커피는 수확기 동안 매주 열리는 경매를 통해 판매됩니다. 구매자와 판매자 사이의 가격은 컵의 품질과 등급에 따라 결정되며 대부분은 콩 크기에 따라 다릅니다. 이러한 요인에 따라 생두는 일반적으로 케냐에서 분류됩니다. 17/18 이상 선별 된 커피 원두는 \"AA\"로 명명되며 동종 중 가장 큰 커피 원두입니다. \"Top\"또는 \"Plus\"에 추가 된 \"Top\"또는 \"Plus\"는 특히 미세하고 복잡한 컵 프로필을 나타냅니다."
			];
		var ElSalvador = [
		// 지역명 ORIGIN
		"",

		// 상세지역 COFFEE REGIONS
		"",

		// 대룩명 CONTINENT
		"",

		// 고도 COFFEE ALTITUDES
		"",

		// 품종 VARIETIES
		"",

		// 인구 POPULATION
		"",

		// 수확기간 HARVEST PERIOD
		"",

		// 농장/농가 면적 NUMBER OF COFFEE FARMS / FARMERS
		"",

		// 연간 생산 합계(60kg 가방) YEARLY PRODUCTION TOTAL (IN 60KG BAGS)
		"",

		// 평균 농장 크기 AVERAGE FARM SIZE
		"",

		//지역설명01
		"",

		//지역설명02
		""
	];
		var Honduras = [
		// 지역명 ORIGIN
		"Honduras",

		// 상세지역 COFFEE REGIONS
		"Marcala (Montecillos), Copán, Comayagua, El Paraiso, Opalaca, Agalta",

		// 대룩명 CONTINENT
		"Central America",

		// 고도 COFFEE ALTITUDES
		"1,000 – 1,600 MASL",

		// 품종 VARIETIES
		"버번, 카투 라, 카투 아이, 파 카스, 티피카",

		// 인구 POPULATION
		"9,000,000",

		// 수확기간 HARVEST PERIOD
		"Dec – Apr",

		// 농장/농가 면적 NUMBER OF COFFEE FARMS / FARMERS
		"smallholders and plantations",

		// 연간 생산 합계(60kg 가방) YEARLY PRODUCTION TOTAL (IN 60KG BAGS)
		"7,400,000(7,400,000 Arabica)",

		// 평균 농장 크기 AVERAGE FARM SIZE
		"0.5 – 5.5 ha",

		//지역설명01
		"온두라스는 코스타리카와 과테말라를 합친 것보다 더 많은 커피를 생산하고 있지만,이 커피에 대해 전문 분야에서는 거의 알려지지 않았습니다. 수십 년 동안 바나나는 온두라스에서 지배적 인 현금 작물이었습니다.",

		//지역설명02
		"이웃 국가들은 소규모 커피 성장을 촉진하기위한 강력한 정부 이니셔티브를 가지고 있었지만, 온두라스 커피 생산은 상품 시장을 제외하고는 거의 인정을받지 못했습니다. 인프라 부족이 고품질 커피를 다른 농산물과 구별 할 수없는 주된 이유였습니다. 그러나 지난 몇 년 동안 온두라스 국립 커피 연구소 인 IHCAFE는 가공을 개선하고 기술을 발전시켜 표준을 교육하고 궁극적으로 향상시키는 데 상당한 노력을 기울였습니다. \n멀리 떨어진 지역에서도 광범위한 생산자 및 세탁소 네트워크를 구축함으로써 고품질 커피 생산에 대한 관심이 생겼습니다. 오늘날, 특히 소규모 협동 조합의 커피는 바다를 건너 신성한 단맛으로 우리를 망치고 있습니다."
	];
		var Jamaica = [
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		""
	];
		var Mexico = [
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		""
	];
		var Nicaragua = [
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		""
	];
		var Panama = [

	// 지역명 ORIGIN
	"Panama",

	// 상세지역 COFFEE REGIONS
	"Boquete, Volcan-Candela, Renacimiento",

	// 대룩명 CONTINENT
	"Central America",

	// 고도 COFFEE ALTITUDES
	"400 - 1,600 MASL",

	// 품종 VARIETIES
	"Typica, Caturra, Catuai, Bourbon, Geisha, San Ramon",

	// 인구 POPULATION
	"3,750,000",

	// 수확기간 HARVEST PERIOD
	"Dec - Mch",

	// 농장/농가 면적 NUMBER OF COFFEE FARMS / FARMERS
	"smallholders and plantations",

	// 연간 생산 합계(60kg 가방) YEARLY PRODUCTION TOTAL (IN 60KG BAGS)
	"106,000(106,000 Arabica)",

	// 평균 농장 크기 AVERAGE FARM SIZE
	"0.5 – 5.5 ha",

	//지역설명01
	"커피 생산은 식민지 시대에 파나마에 도착했으며 파나마는 커피 품질이 낮은 것으로 알려져 있습니다. 이 명성은 최근 몇 년 동안 스페셜티 커피 현장의 발전, 게이샤의 다양한 커피를 포함하는 뛰어난 컵의 발견 및 개선 된 생산 방법으로 바뀌 었습니다.",

	//지역설명02
	"오늘날 파나마는 세계에서 가장 비싼 커피에 대한 기록을 깼고 다른 고가 커피 (예 : Kopi Luwak 및 Jamaican Blue Mountain)와 달리 파나마 커피는 전적으로 다음을 기반으로 높은 가격과 명성을 쌓았습니다. Best of Panama라는 많은 대회를 통해 품질. /n원래 보 케테 지역은 커피가 가장 좋은 곳으로 알려졌지만 최근에는 재배 및 생산 방법을 개선하여 다른 지역이 입지를 다졌습니다. Boquete 외에도이 지역은 Volcan과 Candela입니다. 파나마의 커피 생산은 인근 커피 생산국에 비해 소규모로 이루어지기 때문에 추적 가능성 수준이 매우 높으며 커피는 단일 부동산, 심지어는 별개의 로트까지 추적 할 수 있습니다."
	];

		var Ecuador = [
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		""
	];
		var Peru = [

		// 지역명 ORIGIN
		"Peru",

		// 상세지역 COFFEE REGIONS
		"Cajamarca, Junin, Cusco, San Martin",

		// 대룩명 CONTINENT
		"South America",

		// 고도 COFFEE ALTITUDES
		"900 – 2,000 MASL",

		// 품종 VARIETIES
		"Bourbon, Typica, Caturra, Pache, Mundo Novo, Catuai, Catimor",

		// 인구 POPULATION
		"31,000,000",

		// 수확기간 HARVEST PERIOD
		"Sep – Dec (Main Crop), Mch – Jun (Fly Crop / Mitaca)",

		// 농장/농가 면적 NUMBER OF COFFEE FARMS / FARMERS
		"mainly smallholders",

		// 연간 생산 합계(60kg 가방) YEARLY PRODUCTION TOTAL (IN 60KG BAGS)
		"4,000,000(4,000,000 Arabica)",

		// 평균 농장 크기 AVERAGE FARM SIZE
		"0.5 – 5.5 ha",

		//지역설명01
		"",

		//지역설명02
		""
	];

		var EastTimor = [
		// 지역명 ORIGIN
		"EastTimor",

		// 상세지역 COFFEE REGIONS
		"West (Ermera, Aileu, Manufahi, Ainaro, Bobonaro, Liquica)",

		// 대룩명 CONTINENT
		"Asia",

		// 고도 COFFEE ALTITUDES
		"1,000 – 1,800 MASL",

		// 품종 VARIETIES
		"Hibrido de Timor",

		// 인구 POPULATION
		"1,300,000",

		// 수확기간 HARVEST PERIOD
		"May – Oct",

		// 농장/농가 면적 NUMBER OF COFFEE FARMS / FARMERS
		"45,000 mainly smallholders",

		// 연간 생산 합계(60kg 가방) YEARLY PRODUCTION TOTAL (IN 60KG BAGS)
		"185,000(140,000 Arabica + 45,000 Robusta)",

		// 평균 농장 크기 AVERAGE FARM SIZE
		"0.5 – 5.5 ha",

		//지역설명01
		"",

		//지역설명02
		""
	];
		var Nepal = [
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		""
	];
		var PapuaNewGuinea = [
		// 지역명 ORIGIN
		"PapuaNewGuinea",

		// 상세지역 COFFEE REGIONS
		"Eastern Highlands, Western Highlands, Simbu Province",

		// 대룩명 CONTINENT
		"Asia",

		// 고도 COFFEE ALTITUDES
		"1,000 – 1,900 MASL",

		// 품종 VARIETIES
		"Bourbon, Typica, Arusha",

		// 인구 POPULATION
		"6,900,000",

		// 수확기간 HARVEST PERIOD
		"Apr – Sep",

		// 농장/농가 면적 NUMBER OF COFFEE FARMS / FARMERS
		"smallholders and plantations",

		// 연간 생산 합계(60kg 가방) YEARLY PRODUCTION TOTAL (IN 60KG BAGS)
		"1,000,000(1,000,000 Arabica)",

		// 평균 농장 크기 AVERAGE FARM SIZE
		"0.5 – 5.5 ha",

		//지역설명01
		"커피는 파푸아 뉴기니의 상대적으로 새로운 국가로,이 나라에서 상업적 커피 생산이 자메이카 블루 마운틴 씨앗이 처음 심어진 1926/1927로 거슬러 올라갑니다. 약의 몫을 구성합니다. 커피 생산량의 70 %는 주로 생계 작물과 함께 소위 \"커피 가든\"에서 부지 당 20 그루의 나무 만 자라는 토지를 보유한 소규모 농민이 특징입니다. 이 나라는 일반적으로 접근하기 어려운 산 분화 된 산맥, 가파른 계곡 및 고원이 지배적입니다.",

		//지역설명02
		"많은 소작농 농부들이 이렇게 외딴 곳에 살고 있기 때문에, 그들의 커피는 잔디밭에있는 비행기로, 또는 운이 좋은 사람들을 위해 가장 가까운 마을로 트럭으로 옮겨야합니다. PNG의 전형적인 마을 기반 재배자는 합성 비료 나 화학 살충제를 사용하지 않습니다. 그늘진 나무의 낙엽과 갓 가공 된 작물의 껍질과 과육은 자연적이고 영양이 풍부한 뿌리 덮개를 제공합니다. \n그의 커피를 가공하기 위해 농부는 자신의 소형 수동 펄프 화 기계를 사용하거나 커피 체리를 중앙 세척 스테이션으로 가져옵니다. 그럼에도 불구하고 Sigri 및 인근 Kigabah Plantation과 같은 대규모 농장도 PNG에서 흥미로운 커피 문화의 일부입니다. 일반적으로 PNG 커피는 흥미 진진한 복잡성을 나타내며 맛 휠 주위를 한 번 돌립니다."
	];
		var Vietnam = [
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		""
	];

		var Burundi = [
		// 지역명 ORIGIN
		"Burundi",

		// 상세지역 COFFEE REGIONS
		"all over Burundi",

		// 대룩명 CONTINENT
		"Africa",

		// 고도 COFFEE ALTITUDES
		"1,300 – 1,800 MASL",

		// 품종 VARIETIES
		"Bourbon, Jackson, Mibrizi and some SL varieties",

		// 인구 POPULATION
		"11,400,000",

		// 수확기간 HARVEST PERIOD
		"Apr – Jul",

		// 농장/농가 면적 NUMBER OF COFFEE FARMS / FARMERS
		"mainly smallholders",

		// 연간 생산 합계(60kg 가방) YEARLY PRODUCTION TOTAL (IN 60KG BAGS)
		"170,000(170,000 Arabica)",

		// 평균 농장 크기 AVERAGE FARM SIZE
		"0.5 – 5.5 ha",

		//지역설명01
		"부룬디와 벨기에는 같은 규모 일뿐만 아니라 역사도 공유하고 있습니다. 벨기에 인들이 20 세기 초 부룬디를 식민지로 만들었을 때 그들은 각 농부에게 커피를 재배해야했습니다. 결과적으로 커피는 부룬디의 거의 모든 곳에서 재배됩니다. 전국에 흩어져있는 대규모 세탁소 네트워크가 있습니다. 그러나 1962 년 부룬디가 독립 한 후 커피 생산은 쓴 뒷맛으로 보였고 오히려 정부가 필요할 때 국가를 안정시키는 데 유용한 도구로 간주되었습니다.",

		//지역설명02
		"모든 커피가 소규모 자작 인에 의해서만 재배 되었기 때문에 추적 가능성은 소위 SOGESTAL (Sociétés de Gestion des Stations de Lavage)이라고 불리는 지역별로 그룹화 된 세척 스테이션으로 제한되었습니다. 또한 품질면에서 부룬디 안 커피는 복잡하지 않고 전적으로 현금 작물로 판매되었습니다. 그러나 지난 10 ~ 15 년 동안 부룬디는 훨씬 더 밝은 빛으로 커피를 선보였으며 더 높은 품질 수준을 달성하기 위해 열심히 노력했습니다. /n글로벌 스페셜티 현장은 불과 몇 년 전 시민들의 불안으로 여전히 흔들리고 있던 나라의 콩을 고맙게 맞이했습니다. 오늘날 부룬디 안 커피는 동 아프리카의 \"숨겨진 챔피언\"이라고도 불립니다. 그럼에도 불구하고 물류 장애는이 내륙 국가에 도전을 제기합니다. 비슷한 지형과 결과적인 컵 프로파일로 인해 부룬디 안 커피는 종종 르완다 커피와 비교됩니다."
	];
		var Rwanda = [
		// 지역명 ORIGIN
		"Rwanda",

		// 상세지역 COFFEE REGIONS
		"Southern, Western & Eastern Region",

		// 대룩명 CONTINENT
		"Africa",

		// 고도 COFFEE ALTITUDES
		"1,300 – 2,200 MASL",

		// 품종 VARIETIES
		"-",

		// 인구 POPULATION
		"11,900,000",

		// 수확기간 HARVEST PERIOD
		"Mch – Jun",

		// 농장/농가 면적 NUMBER OF COFFEE FARMS / FARMERS
		"Mainly smallholder",

		// 연간 생산 합계(60kg 가방) YEARLY PRODUCTION TOTAL (IN 60KG BAGS)
		"300,000(300,000 Arabica)",

		// 평균 농장 크기 AVERAGE FARM SIZE
		"0.5 – 5.5 ha",

		//지역설명01
		"르완다의 첫 커피 수출은 1917 년 벨기에 식민지 개척자들에 의해 실현되었습니다. 역사적으로 대부분의 생산품은 품질이 낮은 벨기에에 판매되었습니다. 그러나 2000 년대 초반 르완다가 다시 꽃을 피운 이후 커피는 국가를 되 찾을 수있는 기회로 여겨졌습니다.",

		//지역설명02
		"2004 년에 첫 번째 세탁소가 문을 열었으며 고품질 커피 재배의 길을 열었습니다. 오늘날, 르완다 전역이 고지대에 자리 잡고 있기 때문에 커피는 기본적으로 르완다의 모든 지역에서 재배됩니다. 고품질 커피 생산에서 다소 젊은 역사에도 불구하고 르완다 커피는 부드러운 단맛과 복잡한 과일 맛으로 놀랍습니다. 이 커피들이 스페셜티 현장에서 점점 더 인정을 받아 고품질 커피의 중요성이 커지고 있습니다. 그 결과, 소작농과 농산물에 대한 접근을 제공하는 동시에 물류를 개선 할 수있는 수많은 세탁소가 건설되었습니다. \n그럼에도 불구하고이 갇힌 국가는 커피가 떠나기 위해 탄자니아 전체를 횡단해야하기 때문에 물류는 여전히 주요 과제 중 하나입니다. 특히 르완다 커피의 또 다른 문제는 소위 \"감자 결함\"입니다. 무해한 박테리아가 커피 체리에 들어가 컵에 감자 같은 뒷맛을냅니다. 지속적인 모니터링과 품질 검사를 통해 르완다는이 문제를 파악하고 국가의 전반적인 복귀를 활용했습니다."
	];
		var Tanzania = [
		// 지역명 ORIGIN
		"Tanzania",

		// 상세지역 COFFEE REGIONS
		"North (Kilimanjaro), South (Mbeya), Bukoba",

		// 대룩명 CONTINENT
		"Africa",

		// 고도 COFFEE ALTITUDES
		"1,050 – 2,000 MASL",

		// 품종 VARIETIES
		"-",

		// 인구 POPULATION
		"54,000,000",

		// 수확기간 HARVEST PERIOD
		"Jun – Dec",

		// 농장/농가 면적 NUMBER OF COFFEE FARMS / FARMERS
		"smallholders and plantations",

		// 연간 생산 합계(60kg 가방) YEARLY PRODUCTION TOTAL (IN 60KG BAGS)
		"550,000(550,000 Arabica)",

		// 평균 농장 크기 AVERAGE FARM SIZE
		"0.5 – 5.5 ha",

		//지역설명01
		"탄자니아 아라비카 커피 생산은 주로 북쪽의 킬리만자로 주변과 음 베야와 루 부마의 남부 고지대에서 발견됩니다. 나무는 바나나 나무 그늘 아래 산비탈에서 해발 1,000 ~ 2,500m에서 자랍니다.",

		//지역설명02
		"아라비카 커피는 전체 국가 생산량의 70 %를 차지합니다. 로부스타는 주로 빅토리아 호수 서쪽의 카게 라 지역 해발 800 ~ 900m에서 재배됩니다. 커피의 대부분은 커피 자체를 적어도 세탁소로 추적 할 수있는 소규모 농민에 의해 생산됩니다. 총 생산량의 약 10 %만이 킬리만자로 지역의 Machare Estate와 같은 더 큰 부지에서 나옵니다. \n탄자니아 커피는 향이 좋고 산도와 바디가 풍부합니다. 화산 토양의 미네랄 영양소 덕분에 균형 잡힌 풍미로 단맛이 풍부합니다."
	];
		var Uganda = [
	// 지역명 ORIGIN
		"Uganda",

		// 상세지역 COFFEE REGIONS
		"Eastern & North West (Onkoro)",

		// 대룩명 CONTINENT
		"Africa",

		// 고도 COFFEE ALTITUDES
		"1,200 - 2,200 MASL",

		// 품종 VARIETIES
		"-",

		// 인구 POPULATION
		"39,000,000",

		// 수확기간 HARVEST PERIOD
		"Aug - Jan",

		// 농장/농가 면적 NUMBER OF COFFEE FARMS / FARMERS
		"mainly smallholders",

		// 연간 생산 합계(60kg 가방) YEARLY PRODUCTION TOTAL (IN 60KG BAGS)
		"4,300,000(860,000 Arabica + 3,440,000 Robusta)",

		// 평균 농장 크기 AVERAGE FARM SIZE
		"0.5 - 5.5 ha",

		//지역설명01
		"우간다는 로부스타 커피의 원산지 중 하나 인 콩고 옆에 있습니다. 로부스타 나무는 전국의 많은 지역에서 자생하지만 우간다는 또한 세계에서 두 번째로 큰 로부스타 커피 생산국이되었습니다. 약간의 고도와 함께 빅토리아 호수를 따라 펼쳐진 넓은 삼각주는 강한 로부스타 나무의 성장에 유리합니다.",

		//지역설명02
		"반면 아라비카 커피는 전체 생산량의 약 20 %를 차지합니다. 케냐 국경에 가까운 엘곤 산이 있습니다. 약 2,400 만년 전에 용암의 액체 흐름이 오늘날 멸종 된 화산을 만들었습니다. 3,000 masl 이상의 피크와 풍부한 화산 토양으로 아라비카 재배를위한 최적의 조건을 제공합니다. 이 지역의 아라비카 커피는 \"Bugisu\"라고 불리며, Bugishu로 발음됩니다. 최적의 자연 조건으로 축복받은 우간다의 아라비카 농부들은 점점 더 작물을 개량하기 시작했습니다. \n스페셜티 커피 재배에 대해 배우려는 의지가 널리 퍼져 전반적인 발전을 가속화하고 있습니다. 소규모 농민은 일반적으로 나무를 가로 질러 그늘진 환경에서 나무를 재배하며 이미 지속 가능한 관행을 자동으로 적용합니다. 우리는 증가하는 커피 국가에서 다음에 무엇을 기대할 수 있는지 기대하고 있습니다!"
	];
		var Zambia = [

		// 지역명 ORIGIN
		"",

		// 상세지역 COFFEE REGIONS
		"",

		// 대룩명 CONTINENT
		"",

		// 고도 COFFEE ALTITUDES
		"",

		// 품종 VARIETIES
		"",

		// 인구 POPULATION
		"",

		// 수확기간 HARVEST PERIOD
		"",

		// 농장/농가 면적 NUMBER OF COFFEE FARMS / FARMERS
		"",

		// 연간 생산 합계(60kg 가방) YEARLY PRODUCTION TOTAL (IN 60KG BAGS)
		"",

		// 평균 농장 크기 AVERAGE FARM SIZE
		"",

		//지역설명01
		"",

		//지역설명02
		""
	];

		// 지역명
		//========================================================================================================
		var oriDecList = [
	noneOrigin,
	CostaRica, ElSalvador, Guatemala, Honduras, Jamaica, Mexico, Nicaragua, Panama,
	Brazil, Columbien, Ecuador, Peru,
	EastTimor, India, Indonesia, Nepal, PapuaNewGuinea, Vietnam,
	Burundi, Ethiopia, Kenya, Rwanda, Tanzania, Uganda, Zambia
	];

		//========================================================================================================
		return oriDecList[originNum];
	}



	//slid event------------------------------------
	$(function () {
		var selNum = 0,
			$proList = $(".product_list li"),
			totalNum = $proList.length,
			$btnprev = $("#prevBtn"),
			$btnnext = $("#nextBtn"),
			oldNum,
			potoNum = 1,
			potoCunt;


		potoCunt = potoNum + "/" + totalNum;
		$('#potoNum').html(potoCunt);

		$proList.css({
			display: "none"
		});

		$proList.eq(selNum).fadeIn(1500);

		//left Btn
		function prevItem() {
			oldNum = selNum;
			selNum = selNum - 1;
			if (selNum < 0) {
				selNum = totalNum - 1;
			}
			potoNum = selNum + 1;
			potoCunt = potoNum + "/" + totalNum;
			$('#potoNum').html(potoCunt);

			setting('-1');
		}

		//rigth Btn
		function nextItem() {
			oldNum = selNum;
			selNum = selNum + 1;
			if (selNum >= totalNum) {
				selNum = 0;
			}
			potoNum = selNum + 1;
			potoCunt = potoNum + "/" + totalNum;
			$('#potoNum').html(potoCunt);

			setting('1');
		}

		$btnprev.on('click', prevItem);
		$btnnext.on('click', nextItem);


		function setting(adjust) {

			var adjust1 = adjust * 1,
				adjust2 = adjust * -1;

			if (setting.caller == indicate) {
				if (selNum < oldNum) {
					adjust1 = adjust * -1,
						adjust2 = adjust;
				}
			}
			$proList.eq(selNum).css({
				left: adjust1 * 1100 + 'px',
				display: 'block',
				opacity: 0
			})
			$proList.eq(oldNum).stop().animate({
				left: adjust2 * 1100 + 'px',
				opacity: 0
			});
			$proList.eq(selNum).stop().animate({
				left: 0,
				opacity: 1
			}, 100, function () {});


		}

		function indicate() {
			oldNum = selNum;
			selNum = $(this).index();
			if (selNum == oldNum) return;
			setting('1')
		}

	});
