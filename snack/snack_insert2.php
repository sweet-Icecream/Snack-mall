<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$company_id = $_POST['company_id'];
$kind_id = $_POST['kind_id'];
$snack_name = $_POST['snack_name'];
$kcal = $_POST['kcal'];
$fats = $_POST['fats'];
$protein = $_POST['protein'];
$carbohydrate = $_POST['carbohydrate'];
$sodium = $_POST['sodium'];
$recommended = $_POST['recommended'];

mysqli_query($conn, "set autocommit = 0"); //autocommit 해제
mysqli_query($conn, "set transaction isolation level serializable"); //isolation level 설정
mysqli_query($conn, "begin"); //begins a trasaction

$ret = mysqli_query($conn, "insert into snack (snack_name,company_id,kind_id,kcal,fats,protein,carbohydrate,sodium,recommended) values('$snack_name', '$company_id', '$kind_id', '$kcal','$fats','$protein','$carbohydrate','$sodium', '$recommended')");
if(!$ret)
{
	mysqli_query($conn, "rollback"); // fail to insert, 수행 전으로 rollback
	echo mysqli_error($conn);
    msg('Query Error : '.mysqli_error($conn));
}
else
{
	mysqli_query($conn,"commit"); //insert 성공, 수행 내역 commit
    s_msg ('성공적으로 입력 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=snack_list.php'>";
}

?>
