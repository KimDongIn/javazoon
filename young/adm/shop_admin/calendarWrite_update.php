<?
	include_once($_SERVER["DOCUMENT_ROOT"].'/young/common.php');
	
	function arrayList($val){
		$data = "";
		for($i = 0;$i<count($val);$i++){
			$data.=$val[$i].",";
		}
		$data = substr($data,0,-1);
		return $data;
	}
	
	$profile 	= $_FILES['profile']['name'];
	$profileSize= $_FILES['profile']['size'];
	$profileFormats = array("jpg", "png", "gif", "bmp","jpeg");
	$profileUploadPath = $_SERVER["DOCUMENT_ROOT"]."/calendar_img/";

	$imgChange;
	if($profile){
		if($profileSize > ( 1024*1024 *5 )) // 이미지업로드 파일이 5mb 이상이라면 에러처리
		{
			$returnText = "profileSize";
			echo $returnText;
			exit;
		}
		$ext = explode(".",$profile);
		$actual_image_name = time()."-image.".$ext[1];
		$tmp = $_FILES['profile']['tmp_name'];
		
		if(!move_uploaded_file($tmp, $profileUploadPath.$actual_image_name))
		{       
			$returnText ="profileFail";
			echo $returnText;
			exit;
		}
		$imgChange ="img 			= '{$actual_image_name}',";
	
		
	}
	
	$sql = "update calendar
					set no           = '{$no}',
						day 			= '{$day}',			
						date 			= '{$date}'
						{$imgChange}
						
			";
			//echo $sql;
			
	 sql_query($sql);
	//echo $sql;
	$returnText ="success";
	
	//echo $returnText;

?>
<script>
   //history.back();
   <?//alert('수정 되었습니다.');?>
</script>

?>