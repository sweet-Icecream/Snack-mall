<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);
$mode = "입력";
$action = "snack_insert.php";

if (array_key_exists("snack_id", $_GET)) {
    $snack_id = $_GET["snack_id"];
    $query =  "select * from snack where snack_id = $snack_id";
    $res = mysqli_query($conn, $query);
    $snack = mysqli_fetch_array($res);
    if(!$snack) {
        msg("물품이 존재하지 않습니다.");
    }
    $mode = "수정";
    $action = "snack_modify.php";
}

$companys = array();

$query = "select * from company";
$res = mysqli_query($conn, $query);
while($row = mysqli_fetch_array($res)) {
    $companys[$row['company_id']] = $row['company_name'];
}

$kinds = array();

$query2 = "select * from kind";
$res2 = mysqli_query($conn, $query2);
while($row = mysqli_fetch_array($res2)) {
    $kinds[$row['kind_id']] = $row['kind_name'];
}

?>
    <p></br></br></p>
    <div class="container">
        <form name="snack_form" action="<?=$action?>" method="post" class="fullwidth">
            <input type="hidden" name="snack_id" value="<?=$snack['snack_id']?>"/>
            <h3>SNACK 정보 <?=$mode?></h3>
            <p>
                <label for="company_id">제조사</label>
                <select name="company_id" id="company_id">
                    <option value="-1">선택해 주십시오.</option>
                    <?
                        foreach($companys as $id => $name) {
                            if($id == $snack['company_id']){
                                echo "<option value='{$id}' selected>{$name}</option>";
                            } else {
                                echo "<option value='{$id}'>{$name}</option>";
                            }
                        }
                    ?>
                </select>
            </p>
            
            <p>
                <label for="kind_id">종류</label>
                <select name="kind_id" id="kind_id">
                    <option value="-1">선택해 주십시오.</option>
                    <?
                        foreach($kinds as $id => $name) {
                            if($id == $snack['kind_id']){
                                echo "<option value='{$id}' selected>{$name}</option>";
                            } else {
                                echo "<option value='{$id}'>{$name}</option>";
                            }
                        }
                    ?>
                </select>
            </p>
            
            <p>
                <label for="snack_name">상품명</label>
                <input type="text" placeholder="상품명 입력" id="snack_name" name="snack_name" value="<?=$snack['snack_name']?>"/>
            </p>
           
            <p>
                <label for="kcal">KCAL</label>
                <input type="text" placeholder="kcal 입력" id="kcal" name="kcal" value="<?=$snack['kcal']?>"/>
            </p>
            
            <p>
                <label for="fats">FATS(g)</label>
                <input type="text" placeholder="fats 입력" id="fats" name="fats" value="<?=$snack['fats']?>"/>
            </p>
            
            <p>
                <label for="protein">PROTEIN(g)</label>
                <input type="text" placeholder="protein 입력" id="protein" name="protein" value="<?=$snack['protein']?>"/>
            </p>
            
            <p>
                <label for="carbohydrate">CARBOHYDRATE(g)</label>
                <input type="text" placeholder="carbohydrate 입력" id="carbohydrate" name="carbohydrate" value="<?=$snack['carbohydrate']?>"/>
            </p>
            
            <p>
                <label for="sodium">SODIUM(mg)</label>
                <input type="text" placeholder="sodium 입력" id="sodium" name="sodium" value="<?=$snack['sodium']?>"/>
            </p>
            
            <p>
                <label for="recommended">RECOMMENDED</label>
                <input type="text" placeholder="recommended 입력" id="recommended" name="recommended" value="<?=$snack['recommended']?>"/>
            </p>
            
            
            
            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

            <script>
                function validate() {
                    if(document.getElementById("company_id").value == "-1") {
                        alert ("company를 선택해 주십시오"); return false;
                    }
                    else if(document.getElementById("kind_id").value == "-1") {
                        alert ("kind을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("snack_name").value == "") {
                        alert ("snack_name을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("kcal").value == "") {
                        alert ("kcal을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("fats").value == "") {
                        alert ("fats을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("protein").value == "") {
                        alert ("protein을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("carbohydrate").value == "") {
                        alert ("carbohydrate을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("sodium").value == "") {
                        alert ("sodium을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("recommended").value == "") {
                        alert ("recommended을 입력해 주십시오"); return false;
                    }
                    return true;
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>