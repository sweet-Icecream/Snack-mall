<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);

if (array_key_exists("snack_id", $_GET)) {
    $snack_id = $_GET["snack_id"];
    $query = "select * from snack where snack_id = $snack_id";
    $res = mysqli_query($conn, $query);
    $snack = mysqli_fetch_assoc($res);
    if (!$snack) {
        msg("물품이 존재하지 않습니다.");
    }
}
?>
    <p></br></br></p>
    <div class="container fullwidth">

        <h3>SNACK 정보 상세 보기</h3>

        <p>
            <label for="snack_id">SNACK CODE</label>
            <input readonly type="text" id="snack_id" name="snack_id" value="<?= $snack['snack_id'] ?>"/>
        </p>

		<p>
            <label for="snack_name">SNACK NAME</label>
            <input readonly type="text" id="snack_name" name="snack_name" value="<?= $snack['snack_name'] ?>"/>
        </p>
        
        <p>
            <label for="company_id">COMPANY ID</label>
            <input readonly type="text" id="company_id" name="company_id" value="<?= $snack['company_id'] ?>"/>
        </p>
        
        <p>
            <label for="kind_id">KIND ID</label>
            <input readonly type="text" id="kind_id" name="kind_id" value="<?= $snack['kind_id'] ?>"/>
        </p>
        
        <p>
            <label for="kcal">KCAL</label>
            <input readonly type="text" id="kcal" name="kcal" value="<?= $snack['kcal'] ?>"/>
        </p>
        
        <p>
            <label for="fats">FATS(g)</label>
            <input readonly type="text" id="fats" name="fats" value="<?= $snack['fats'] ?>"/>
        </p>
        
        <p>
            <label for="protein">PROTEIN(g)</label>
            <input readonly type="text" id="protein" name="protein" value="<?= $snack['protein'] ?>"/>
        </p>
        
        <p>
            <label for="carbohydrate">CARBOHYDRATE(g)</label>
            <input readonly type="text" id="carbohydrate" name="carbohydrate" value="<?= $snack['carbohydrate'] ?>"/>
        </p>
        
        <p>
            <label for="sodium">SODIUM(mg)</label>
            <input readonly type="text" id="sodium" name="sodium" value="<?= $snack['sodium'] ?>"/>
        </p>
        
        <p>
            <label for="recommended">RECOMMENDED</label>
            <input readonly type="text" id="recommended" name="recommended" value="<?= $snack['recommended'] ?>"/>
        </p>
        
        </p>
    </div>
<? include("footer.php") ?>