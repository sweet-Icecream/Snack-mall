<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);
$mode = "입력";
$action = "review_insert.php";


if (array_key_exists("review_id", $_GET)) {
    $review_id = $_GET["review_id"];
    $query =  "select * from review where review_id = $review_id";
    $res = mysqli_query($conn, $query);
    $review = mysqli_fetch_array($res);
    if(!$review) {
        msg("물품이 존재하지 않습니다.");
    }
    $mode = "수정";
    $action = "review_modify.php";
}

$snacks = array();

$query = "select * from snack";
$res = mysqli_query($conn, $query);
while($row = mysqli_fetch_array($res)) {
    $snacks[$row['snack_id']] = $row['snack_name'];
}

?>
    <p></br></br></p>
    <div class="container">
        <form name="review_form" action="<?=$action?>" method="post" class="fullwidth">
            <input type="hidden" name="review_id" value="<?=$review['review_id']?>"/>
            <h3>review 정보 <?=$mode?></h3>
            <p>
                <label for="snack_id">Snack name</label>
                <select name="snack_id" id="snack_id">
                    <option value="-1">선택해 주십시오.</option>
                    <?
                        foreach($snacks as $id => $name) {
                            if($id == $review['snack_id']){
                                echo "<option value='{$id}' selected>{$name}</option>";
                            } else {
                                echo "<option value='{$id}'>{$name}</option>";
                            }
                        }
                    ?>
                </select>
            </p>
            
            <p>
                <label for="review_score">점수(0~5점)</label>
                <input type="number" placeholder="점수 입력" id="review_score" name="review_score" value="<?=$review['review_score']?>"/>
            </p>
           
            <p>
                <label for="review_descpt">리뷰 내용</label>
                <input type="text" placeholder="리뷰 내용 입력" id="review_descpt" name="review_descpt" value="<?=$review['review_descpt']?>"/>
            </p>
            
            
            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

            <script>
                function validate() {
                    if(document.getElementById("snack_id").value == "-1") {
                        alert ("snack_id를 선택해 주십시오"); return false;
                    }
                    else if(document.getElementById("review_score").value == "") {
                        alert ("review_name을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("review_descpt").value == "") {
                        alert ("review_descpt을 입력해 주십시오"); return false;
                    }
                    return true;
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>