<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수
?>
<div class="container">
    <?
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    $query = "select * from review";
    $res = mysqli_query($conn, $query);
    if (!$res) {
         die('Query Error : ' . mysqli_error());
    }
    ?>
	
    <p></br></br></p>
	<table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>No.</th>
            <th>snack id</th>
            <th>added_date</th>
            <th>기능</th>
        </tr>
        </thead>
        <tbody>
        <?
        $row_index = 1;
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td><a href='review_detail.php?review_id={$row['review_id']}'>{$row_index}</a></td>";
            echo "<td>{$row['snack_id']}</td>";
            echo "<td>{$row['added_date']}</td>";
            echo "<td width='17%'>
                <a href='review_form.php?review_id={$row['review_id']}'><button class='button primary small'>수정</button></a>
                 <button onclick='javascript:deleteConfirm({$row['review_id']})' class='button danger small'>삭제</button>
                </td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
        </tbody>
    </table>
    <script>
        function deleteConfirm(review_id) {
            if (confirm("정말 삭제하시겠습니까?") == true){    //확인
                window.location = "review_delete.php?review_id=" + review_id;
            }else{   //취소
                return;
            }
        }
    </script>
</div>
<? include("footer.php") ?>
