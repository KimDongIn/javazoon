<?
	include_once($_SERVER["DOCUMENT_ROOT"].'/young/common.php');
		//echo $member['mb_id'];
	$mb_name = $member['mb_name'];
	//echo $mb_id;
	$ms_id = '최고관리자';
?>
<script type="text/javascript" src="/script/Standard.js"></script>

<div class="headerSell">

	<!-- sideBar opener-->
	<div class="headerLinkSwich">
		<label id="mcBtn02" for="menuicon01">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</label>
	</div>

	<div class="headerLogo" onclick="location.href='/mainPage.php'">
		<img src="/img/logo/Logo_List_Beisler.png">
	</div>

	<div class="headerLinks">
		<ul class="noneStyle">
			<li onclick="javascript:pageWp(1, 0)">
				<a>OriginList</a>
			</li>

			<li id="originsMapBtn">
				<!-- origin Map bar-->
				<input type="checkbox" id="menuicon02">
				<label for="menuicon02">
					<span></span>
					<span></span>
					<a>원산지</a>
				</label>
			</li>
			<li>
				<a href="/calendar.php">일정</a>
			</li>
			<li>
				<a href="/novoroaster.html">novoroast</a>
			</li>

		</ul>
	</div>

	<div class="headerLoginLink">
		<? if($mb_name == $ms_id){?>
			<a href="/young/adm/index.php" style="button">
				<?echo $mb_name;?>
			</a>
		<?} else{?>
			<?echo $mb_name;?>
		<?}?>
		
		<? if($mb_name == !null){ ?>
			<a href="/young/bbs/logout.php" style="button">Logout</a>
		<?	}else if($mb_name == null){ ?>
			<a href="/login.php">Login</a>
		<? } ?>

	</div>

</div>
