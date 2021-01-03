<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수
?>
<div class="container">
    <?
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    $query = "select * from snack natural join company";
    if (array_key_exists("search_keyword", $_POST)) {  // array_key_exists() : Checks if the specified key exists in the array
        $search_keyword = $_POST["search_keyword"];
        $query =  $query . " where snack_name like '%$search_keyword%' or company_name like '%$search_keyword%'";
    }
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
            <th>company</th>
            <th>name</th>
            <th>kind</th>
            <th>기능</th>
        </tr>
        </thead>
        <tbody>
        <?
        $row_index = 1;
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>{$row_index}</td>";
            echo "<td>{$row['company_name']}</td>";
            echo "<td><a href='snack_detail.php?snack_id={$row['snack_id']}'>{$row['snack_name']}</a></td>";
            echo "<td>{$row['kind_id']}</td>";
            echo "<td width='17%'>
                <a href='snack_form.php?snack_id={$row['snack_id']}'><button class='button primary small'>수정</button></a>
                 <button onclick='javascript:deleteConfirm({$row['snack_id']})' class='button danger small'>삭제</button>
                </td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
        </tbody>
    </table>
    <script>
        function deleteConfirm(snack_id) {
            if (confirm("정말 삭제하시겠습니까?") == true){    //확인
                window.location = "snack_delete.php?snack_id=" + snack_id;
            }else{   //취소
                return;
            }
        }
    </script>
</div>
<? include("footer.php") ?>
