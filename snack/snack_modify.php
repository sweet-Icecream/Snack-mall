﻿<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$snack_id = $_POST['snack_id'];
$company_id = $_POST['company_id'];
$kind_id = $_POST['kind_id'];
$snack_name = $_POST['snack_name'];
$kcal = $_POST['kcal'];
$fats = $_POST['fats'];
$protein = $_POST['protein'];
$carbohydrate = $_POST['carbohydrate'];
$sodium = $_POST['sodium'];
$recommended = $_POST['recommended'];

            
$ret = mysqli_query($conn, "update snack set snack_name = '$snack_name', company_id = $company_id, kind_id = $kind_id, kcal = '$kcal', fats = '$fats', protein = '$protein', carbohydrate = '$carbohydrate', sodium = '$sodium', recommended = '$recommended' where snack_id = $snack_id");

if(!$ret)
{
	
	msg('Query Error : '.mysqli_error($conn));
}
else
{
    s_msg ('성공적으로 수정 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=snack_list.php'>";
}

?>
