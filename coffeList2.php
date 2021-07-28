<?
include_once($_SERVER["DOCUMENT_ROOT"].'/young/common.php');
	$sql = " select *
		FROM coffeeList
		WHERE 1=1
		ORDER BY no;
		";
$resume = sql_query($sql);
$que1 = " select no,img,Country
			FROM coffeImg
			where 1=1
			
			";
$item1 = sql_query($que1);
$it_img=sql_fetch_array($item1);
?>

<!DOCTYPE html>
<html lang="kr">

<head>
	<meta charset="UTF-8">
	<title>LIST + BEISLER</title>


	<link type="text/css" rel="stylesheet" href="/css/main.css">
	<link type="text/css" rel="stylesheet" href="/css/mapPoint.css">
	<link type="text/css" rel="stylesheet" href="/css/coffeList.css">

	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="/script/Standard.js"></script>
	<script type="text/javascript" src="/script/scroll.js"></script>
	<script type="text/javascript" src="/script/pageShift.js"></script>

	<script>
		// 페이지 링크
		$(function() {
			$("#header").load("pieceHead2.php");
			$("#nav").load("pieceNav2.php");
			$("#sideBar").load("pieceSidebar2.php");
			//			$("#sideBtn").load("pieceSidelink.php");
			$("#footer").load("pieceFoot2.php");

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

	<main id="main">
		<div class="mainSell">
		
			<section class="sec01">
			
				<div class="bgImg">
					<img src="/img/background/Origins_Basic.jpg">
				</div>
				
				<div class="sectionSell01">


<!--
					<div class="topName">
						<h1>커피리스트</h1>
					</div>
-->

					<div class="secTop01">
						<img src="/img/mapArea/Basic.png">
					</div>


					<div class="secFoot01">

						<div class="secFootSell">
							<div class="titel">
								<h3>Coffe List</h3>
							</div>
<!--
							<div class="text">
								<p></p>
							</div>
-->
						</div>

					</div>
				</div>

			</section>



			<section class="sec02">
				<div class="sectionSell02">
				
					<div class="coffeList">
						<table>
							<!--						 클래스는 칼라값 1~6까지 있음 -->
<!--
							<tr class="tableColor1">
								<th colspan="16">
									coffe list
								</th>
							</tr>
-->
							
							<tr>
								<th>no</th>
								<th>Country</th>
								<th>Batch</th>
								<th>Quality</th>
								<th>Region</th>
								<th>Brand <br>/ Producer</th>
								<th> Preparation</th>
								<th>Crop</th>
								<th>SCAScoring</th>
								<th>Acidity</th>
								<th>Body</th>
								<th>Flavor</th>
								<th>Cup ProfileFlavor</th>
								<th>Unit <br>/ Bag Type</th>
								<th>Bag Avilability</th>
								<th>Expected Arrival</th>
							</tr>
							
					<?
					$i = 1; $Country=""; $a=1; $b=0; $className=""; $classNum=1;
							
					while($mb = sql_fetch_array($resume)) {?>
						<!-- colorClass controll -->
						<? 
							if( $classNum > 6) {
								$classNum = 1;
							} 
						?>	
						
						<? if($Country != $mb['Country']) { ?>
							
							<? $Country = $mb['Country']; ?>
							
							<? $b++; ?>
							
						<? } ?>	
						
						<? if( $a == $b ){ 
							$className = "tableColor".$classNum;	
						?>
						
							<tr class="<?= $className ?>">
								<th colspan="16">
									<?=$mb['Country']?>
								</th>
							</tr>
							
							<? $a++; $classNum++; ?>
						<? } ?>	
						<?
							/* $que1 = " select * 
									from coffeImg 
									where Country='{$mb['Country']}'
									";
							$item1 = sql_query($que1);
							$it_img=sql_fetch_array($item1); */
							//echo $it_img['img'];
							$que = " select it_id,it_name
									FROM g5_shop_item 
									where 1=1
									and it_name = '{$mb['Country']}';
									";
							$item = sql_query($que);
							$it=sql_fetch_array($item);
							//echo $que;
							/*
							while($it=sql_fetch_array($item)){
								if($mb['Country']==$it['it_name']){
									$itce=$it['it_id'];
								}
							}
							*/
							if($it['it_name']){
								$itce=$it['it_id'];
								
							}
							
						?>	
							<!--comfirm 링크 변경-->
							<tr onclick="location.href='/young/shop/item.php?it_id=<?=$itce?>'"style='cursor:pointer'>
								<th><?=$mb['no']?></th>
								<th><?=$mb['Country']?></th>
								<th><?=$mb['Batch']?></th>
								<th><?=$mb['Quality']?></th>
								<th><?=$mb['Region']?></th>
								<th><?=$mb['Brand_Producer']?></th>
								<th><?=$mb['Preparation']?></th>
								<th><?=$mb['Crop']?></th>
								<th><?=$mb['SCAScoring']?></th>
								<th><?=$mb['Acidity']?></th>
								<th><?=$mb['Body']?></th>
								<th><?=$mb['Flavor']?></th>
								<th><?=$mb['CupProfileFlavor']?></th>
								<th><?=$mb['Unit_BagType']?></th>
								<th><?=$mb['BagAvailability']?></th>
								<th><?=$mb['ExpectedArrival']?></th>
								
							</tr>
							
					<? } ?>
						</table>
					</div>
				</div>
			</section>
		</div>
	</main>

	<!-- fooer -->
	<footer id="footer"></footer>

	<!-- sidebar-->
	<input type="checkbox" id="menuicon01">

</body></html>