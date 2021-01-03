<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$snack_id = $_POST['snack_id'];
$review_score = $_POST['review_score'];
$review_descpt = $_POST['review_descpt'];


$ret = mysqli_query($conn, "insert into review (review_score,review_descpt,snack_id,added_date) values('$review_score', '$review_descpt', '$snack_id', NOW())");
if(!$ret)
{
	echo mysqli_error($conn);
    msg('Query Error : '.mysqli_error($conn));
}
else
{
    s_msg ('성공적으로 입력 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=review_list.php'>";
}

?>
