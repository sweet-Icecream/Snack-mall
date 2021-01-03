<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);

if (array_key_exists("review_id", $_GET)) {
    $review_id = $_GET["review_id"];
    $query = "select * from review where review_id = $review_id";
    $res = mysqli_query($conn, $query);
    $review = mysqli_fetch_assoc($res);
    if (!$review) {
        msg("물품이 존재하지 않습니다.");
    }
}
?>
    <p></br></br></p>
    <div class="container fullwidth">

        <h3>review 정보 상세 보기</h3>

        <p>
            <label for="review_id">review NO.</label>
            <input readonly type="text" id="review_id" name="review_id" value="<?= $review['review_id'] ?>"/>
        </p>

		<p>
            <label for="review_score">review SCORE</label>
            <input readonly type="text" id="review_score" name="review_score" value="<?= $review['review_score'] ?>"/>
        </p>
        
        <p>
            <label for="review_descpt">review 설명</label>
            <textarea readonly id="review_descpt" name="review_descpt" rows="10"><?= $review['review_descpt'] ?></textarea>
        </p>
        
        <p>
            <label for="snack_id">SNACK ID</label>
            <input readonly type="text" id="snack_id" name="snack_id" value="<?= $review['snack_id'] ?>"/>
        </p>
        
        <p>
            <label for="added_date">added_date</label>
            <input readonly type="text" id="added_date" name="added_date" value="<?= $review['added_date'] ?>"/>
        </p>
        
        
        </p>
    </div>
<? include("footer.php") ?>