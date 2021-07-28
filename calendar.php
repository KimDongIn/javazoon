<?
	include_once($_SERVER["DOCUMENT_ROOT"].'/young/common.php');
	
/*	$sql = " select *,
		FROM calendar 
		WHERE 1=1
		";
$event_id =  sql_query($sql);
$mb = sql_fetch_array($resume);*/
?>

<?php
//---- 오늘 날짜
$thisyear = date('Y'); // 4자리 연도
$thismonth = date('n'); // 0을 포함하지 않는 월
$today = date('j'); // 0을 포함하지 않는 일

//------ $year, $month 값이 없으면 현재 날짜
$year = isset($_GET['year']) ? $_GET['year'] : $thisyear;
$month = isset($_GET['month']) ? $_GET['month'] : $thismonth;
$day = isset($_GET['day']) ? $_GET['day'] : $today;

$prev_month = $month - 1;
$next_month = $month + 1;
$prev_year = $next_year = $year;
if ($month == 1) {
    $prev_month = 12;
    $prev_year = $year - 1;
} else if ($month == 12) {
    $next_month = 1;
    $next_year = $year + 1;
}
$preyear = $year - 1;
$nextyear = $year + 1;

$predate = date("Y-m-d", mktime(0, 0, 0, $month - 1, 1, $year));
$nextdate = date("Y-m-d", mktime(0, 0, 0, $month + 1, 1, $year));

// 1. 총일수 구하기
$max_day = date('t', mktime(0, 0, 0, $month, 1, $year)); // 해당월의 마지막 날짜
//echo '총요일수'.$max_day.'<br />';

// 2. 시작요일 구하기
$start_week = date("w", mktime(0, 0, 0, $month, 1, $year)); // 일요일 0, 토요일 6

// 3. 총 몇 주인지 구하기
$total_week = ceil(($max_day + $start_week) / 7);

// 4. 마지막 요일 구하기
$last_week = date('w', mktime(0, 0, 0, $month, $max_day, $year));
?>

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

	<main>
		<section class="sec01">
			<div class="sectionSell01">

				<div class="calendarSell">
					<table class="table table-bordered table-responsive">
						
						<tr align="center">
							<th>
							</th>
							<th class="btnSell">
								<a href=<?php echo '?year='.$prev_year.'&month='.$prev_month . '&day=1'; ?>>◀</a>
							</th>
							<th colspan="3">
								<a href=<?php echo '?year=' . $thisyear . '&month=' . $thismonth . '&day=1'; ?>>
									<?php echo "&nbsp;&nbsp;" . $year . '년 ' . $month . '월 ' . "&nbsp;&nbsp;"; ?></a>
							</th>
							<th class="btnSell">
								<a href=<?php echo '?year='.$next_year.'&month='.$next_month.'&day=1'; ?>> ▶</a>
							</th>
							<th>
							</th>

						</tr>
						<tr class="info">
							<th>일</th>
							<th>월</th>
							<th>화</th>
							<th>수</th>
							<th>목</th>
							<th>금</th>
							<th>토</th>
						</tr>

						<?php
    // 5. 화면에 표시할 화면의 초기값을 1로 설정
    $day=1;

    // 6. 총 주 수에 맞춰서 세로줄 만들기
    for($i=1; $i <= $total_week; $i++){?>
						<tr>
							<?php
    // 7. 총 가로칸 만들기
    for ($j = 0; $j < 7; $j++) {
        // 8. 첫번째 주이고 시작요일보다 $j가 작거나 마지막주이고 $j가 마지막 요일보다 크면 표시하지 않음
        echo '<td>'; // css 수정
        if (!(($i == 1 && $j < $start_week) || ($i == $total_week && $j > $last_week))) {

            if ($j == 0) {
                // 9. $j가 0이면 일요일이므로 빨간색
                $style = "red";
            } else if ($j == 6) {
                // 10. $j가 0이면 토요일이므로 파란색
                $style = "blue";
            } else {// 11. 그외는 평일이므로 검정색
                $style = "black";
            }

            // 12. 오늘 날짜면 굵은 글씨
            if ($year == $thisyear && $month == $thismonth && $day == date("j")) {
                // 13. 날짜 출력
                echo "<font style=\"font-weight:bold\">";
                echo $day; 
				echo $imgstyle;
				//echo $$ig;
				//echo '<img src="/img/Start_01.jpg"height="50" valign="top">';
                echo '</font>';
				
            } else {
                echo "<font style=\"color:".$style."\">";
                echo $day;
                echo '</font>';
            }


			$chkDate = $year."-".str_pad($month,"2","0",STR_PAD_LEFT)."-".str_pad($day,"2","0",STR_PAD_LEFT);
			$dateSQL = sql_query(" SELECT *
								     FROM calendar 
								    WHERE 1=1
									  AND day ='{$chkDate}' ");

			$dateRow = sql_fetch_array($dateSQL);
			
			if($dateRow){
			echo "<div class='calday'>
			<img  class='calendarImg' src=\"/calendar_img/".$dateRow['img']."\" />
				<div id='".$chkDate."' >".$dateRow['title']."<br>".$dateRow['memo']."</div>
			</div>
			<div class='dayTitel'>
				<h5>".$dateRow['title']."</h5>
			</div>";
			}
            // 14. 날짜 증가
            $day++;
        }
        echo '</td>';
    }
 ?>
						</tr>
						<?php } ?>
					</table>


					<script>
						$(function() {
							$(".layerClose").click(function() {
								$("#calendarLayer").hide();
							});

							$(".calendarImg").click(function() {
								var calText = $(this).parent("div").html();

								//ajax

								$("#calendarLayerContent").html("<div>" + calText + "</div>");
								$("#calendarLayer").show();
							});
						});

					</script>

					<!--
		1. 이미지 클릭
		2. 이미지의 고유값을 ajax 로 전달
		3. ajax로 받는페이지에서 표시할 내용들을 전부 본 페이지로 전달
		4. 레이어에 내용들을 입력
		5. 본페이지 calendarLayer display나오도록처리
		 
	-->
					<div id="calendarLayer" style="position:fixed;width:100%;height:100%;background:rgb(0,0,0,0.5);z-index:10000;top:0px;left:0px;display:none;">
						<div style="position:absolute;right:50px;top:50px;font-size:30pt;color:white;cursor:pointer;" class="layerClose">
							X
						</div>
						<div id="calendarLayerContent" style="position:absolute;width:90%;max-width:500px;padding:10px;background:white;left:50%;top:50%; transform: translate(-50%, -50%);">

						</div>
					</div>

				</div>

			</div>
		</section>
	</main>
	
	
	<!-- fooer -->
	<footer id="footer"></footer>

	<!-- sidebar-->
	<input type="checkbox" id="menuicon01">
</body></html>