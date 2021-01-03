<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$review_id = $_GET['review_id'];

mysqli_query($conn, "set autocommit = 0"); //autocommit 해제
mysqli_query($conn, "set transaction isolation level serializable"); //isolation level 설정
mysqli_query($conn, "begin"); //begins a trasaction

$ret = mysqli_query($conn, "delete from review where review_id = $review_id");

if(!$ret)
{
	mysqli_query($conn, "rollback"); // fail to delete, 수행 전으로 rollback
    msg('Query Error : '.mysqli_error($conn));
}
else
{
	mysqli_query($conn,"commit"); //delete 성공, 수행 내역 commit
    s_msg ('성공적으로 삭제 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=review_list.php'>";
}

?>

