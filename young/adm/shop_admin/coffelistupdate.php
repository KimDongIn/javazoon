<?php
$sub_menu = '400300';
include_once('./_common.php');

// 상품이 많을 경우 대비 설정변경
set_time_limit ( 0 );
ini_set('memory_limit', '50M');

auth_check($auth[$sub_menu], "w");

function only_number($n)
{
    return preg_replace('/[^0-9]/', '', $n);
}

if($_FILES['excelfile']['tmp_name']) {
    $file = $_FILES['excelfile']['tmp_name'];

    include_once(G5_LIB_PATH.'/Excel/reader.php');

    $data = new Spreadsheet_Excel_Reader();

    // Set output Encoding.
    $data->setOutputEncoding('UTF-8');

    /***
    * if you want you can change 'iconv' to mb_convert_encoding:
    * $data->setUTFEncoder('mb');
    *
    **/

    /***
    * By default rows & cols indeces start with 1
    * For change initial index use:
    * $data->setRowColOffset(0);
    *
    **/



    /***
    *  Some function for formatting output.
    * $data->setDefaultFormat('%.2f');
    * setDefaultFormat - set format for columns with unknown formatting
    *
    * $data->setColumnFormat(4, '%.3f');
    * setColumnFormat - set format for column (apply only to number fields)
    *
    **/

    $data->read($file);

    /*


     $data->sheets[0]['numRows'] - count rows
     $data->sheets[0]['numCols'] - count columns
     $data->sheets[0]['cells'][$i][$j] - data from $i-row $j-column

     $data->sheets[0]['cellsInfo'][$i][$j] - extended info about cell

        $data->sheets[0]['cellsInfo'][$i][$j]['type'] = "date" | "number" | "unknown"
            if 'type' == "unknown" - use 'raw' value, because  cell contain value with format '0.00';
        $data->sheets[0]['cellsInfo'][$i][$j]['raw'] = value if cell without format
        $data->sheets[0]['cellsInfo'][$i][$j]['colspan']
        $data->sheets[0]['cellsInfo'][$i][$j]['rowspan']
    */

    error_reporting(E_ALL ^ E_NOTICE);

    $dup_it_id = array();
    $fail_it_id = array();
    $dup_count = 0;
    $total_count = 0;
    $fail_count = 0;
    $succ_count = 0;

    for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
        $total_count++;

        $j = 1;

        $no       	       = addslashes($data->sheets[0]['cells'][$i][$j++]);
        $Batch             = addslashes($data->sheets[0]['cells'][$i][$j++]);
        $Quality           = addslashes($data->sheets[0]['cells'][$i][$j++]);
        $Region            = addslashes($data->sheets[0]['cells'][$i][$j++]);
        $Brand_Producer    = addslashes($data->sheets[0]['cells'][$i][$j++]);
        $Preparation       = addslashes($data->sheets[0]['cells'][$i][$j++]);
        $Crop       	   = addslashes($data->sheets[0]['cells'][$i][$j++]);
        $Cert     	       = addslashes($data->sheets[0]['cells'][$i][$j++]);
        $SCAScoring        = addslashes($data->sheets[0]['cells'][$i][$j++]);
        $Acidity           = addslashes($data->sheets[0]['cells'][$i][$j++]);
        $Body        	   = addslashes($data->sheets[0]['cells'][$i][$j++]);
        $Flavor        	   = addslashes($data->sheets[0]['cells'][$i][$j++]);
        $CupProfileFlavor  = addslashes($data->sheets[0]['cells'][$i][$j++]);
        $Unit_BagType      = addslashes($data->sheets[0]['cells'][$i][$j++]);
        $BagAvailability   = addslashes($data->sheets[0]['cells'][$i][$j++]);
        $ExpectedArrival   = addslashes($data->sheets[0]['cells'][$i][$j++]);
        $Country  		   = addslashes($data->sheets[0]['cells'][$i][$j++]);
        

        if(!$no || !$Batch || !$Quality) {
            $fail_count++;
            continue;
        }

        // it_id 중복체크
        $sql2 = " select count(*) as cnt from coffelist where no = '$no' ";
        $row2 = sql_fetch($sql2);
        if($row2['cnt']) {
            $fail_it_id[] = $no;
            $dup_it_id[] = $no;
            $dup_count++;
            $fail_count++;
            continue;
        }

        // 기본분류체크
        /*$sql2 = " select count(*) as cnt from coffelist where Batch = '$Batch' ";
        $row2 = sql_fetch($sql2);
        if(!$row2['cnt']) {
            $fail_it_id[] = $no;
            $fail_count++;
            continue;
        }*/

        $sql = " INSERT INTO coffeeList
                     SET no = '$no',
                         Batch = '$Batch',
                         Quality = '$Quality',
                         Region = '$Region',
                         Brand_Producer = '$Brand_Producer',
                         Preparation = '$it_Preparationmaker',
                         Crop = '$Crop',
                         Cert = '$Cert',
                         SCAScoring = '$it_mSCAScoringodel',
                         Acidity = '$Acidity',
                         Body = '$Body',
                         Flavor = '$Flavor',
                         CupProfileFlavor = '$CupProfileFlavor',
                         Unit_BagType = '$Unit_BagType',
                         BagAvailability = '$BagAvailability',
                         ExpectedArrival = '$ExpectedArrival',
                         Country = '$Country' ";
        sql_query($sql);

        $succ_count++;
    }
}

$g5['title'] = '상품 엑셀일괄등록 결과';
include_once(G5_PATH.'/head.sub.php');
?>

<div class="new_win">
    <h1><?php echo $g5['title']; ?></h1>

    <div class="local_desc01 local_desc">
        <p>상품등록을 완료했습니다.</p>
    </div>

    <dl id="excelfile_result">
        <dt>총상품수</dt>
        <dd><?php echo number_format($total_count); ?></dd>
        <dt>완료건수</dt>
        <dd><?php echo number_format($succ_count); ?></dd>
        <dt>실패건수</dt>
        <dd><?php echo number_format($fail_count); ?></dd>
        <?php if($fail_count > 0) { ?>
        <dt>실패상품코드</dt>
        <dd><?php echo implode(', ', $fail_it_id); ?></dd>
        <?php } ?>
        <?php if($dup_count > 0) { ?>
        <dt>상품코드중복건수</dt>
        <dd><?php echo number_format($dup_count); ?></dd>
        <dt>중복상품코드</dt>
        <dd><?php echo implode(', ', $dup_it_id); ?></dd>
        <?php } ?>
    </dl>

    <div class="btn_win01 btn_win">
        <button type="button" onclick="window.close();">창닫기</button>
    </div>

</div>

<?php
include_once(G5_PATH.'/tail.sub.php');
?>