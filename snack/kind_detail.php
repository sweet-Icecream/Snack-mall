<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);

if (array_key_exists("kind_id", $_GET)) {
    $kind_id = $_GET["kind_id"];
    $query = "select * from kind where kind_id = $kind_id";
    $res = mysqli_query($conn, $query);
    $kind = mysqli_fetch_assoc($res);
    
    
    if (!$kind) {
        msg("물품이 존재하지 않습니다.");
    }
}
?>
    <p></br></br></p>
    <div class="container fullwidth">

        <h3>kind 정보 상세 보기</h3>

        <p>
            <label for="kind_id">kind NO.</label>
            <input readonly type="text" id="kind_id" name="kind_id" value="<?= $kind['kind_id'] ?>"/>
        </p>

		<p>
            <label for="kind_name">kind NAME</label>
            <input readonly type="text" id="kind_name" name="kind_name" value="<?= $kind['kind_name'] ?>"/>
        </p>
        
    </div>
    <div class="container">
    <?
    $query2 = "select snack_name from kind natural join snack where kind_id = $kind_id";
    $res2 = mysqli_query($conn, $query2);
    ?>
		<table class = "table table-striped table-bordered">
    		<thead>
    		<h3>this kind of snack</h3>
       		<tr>
    			<th>snack name</th>
    		</tr>
    		</thead>
    		<tbody>
    		<?
        	while ($row = mysqli_fetch_array($res2)) {
        	    echo "<tr>";
        		echo "<td>{$row['snack_name']}</td>";
            	echo "</tr>";
        	}
        	?>
    		</tbody>
    	</table>
    </div>
    <div class="container">
    <?
    $query3 = "select * from statics where kind_id = $kind_id";
    $res3 = mysqli_query($conn, $query3);
    ?>
    <h3>statics for this kind of snack</h3>
    
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>No.</th>
            <th>name</th>
        </tr>
        </thead>
        <tbody>
        <?
        while ($row = mysqli_fetch_array($res3)) {
            echo "<tr>";
            echo "<td>{$row['statics_id']}</td>";
            echo "<td><a href='statics_detail.php?statics_id={$row['statics_id']}'>{$row[statics_descpt]}</a></td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
    </div>
    
    
    
<? include("footer.php") ?>