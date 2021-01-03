<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);

if (array_key_exists("company_id", $_GET)) {
    $company_id = $_GET["company_id"];
    $query = "select * from company where company_id = $company_id";
    $res = mysqli_query($conn, $query);
    $company = mysqli_fetch_assoc($res);
    
    
    if (!$company) {
        msg("물품이 존재하지 않습니다.");
    }
}
?>
    <p></br></br></p>
    <div class="container fullwidth">

        <h3>company 정보 상세 보기</h3>

        <p>
            <label for="company_id">company NO.</label>
            <input readonly type="text" id="company_id" name="company_id" value="<?= $company['company_id'] ?>"/>
        </p>

		<p>
            <label for="company_name">COMPANY NAME</label>
            <input readonly type="text" id="company_name" name="company_name" value="<?= $company['company_name'] ?>"/>
        </p>
        
        <p>
            <label for="company_year">COMPANY year</label>
            <input readonly type="text" id="company_year" name="company_year" value="<?= $company['company_year'] ?>"/>
        </p>
        
         <p>
            <label for="company_location">COMPANY location</label>
            <input readonly type="text" id="company_location" name="company_location" value="<?= $company['company_location'] ?>"/>
        </p>
        
        <p>
        	 <label for="company_location">SNACKS MADE BY THIS COMPANY</label>
        </p>
    </div>
    <div class="container">
    <?
    $query2 = "select snack_name from company natural join snack where company_id = $company_id";
    $res2 = mysqli_query($conn, $query2);
    ?>
		<table class = "table table-striped table-bordered">
    		<thead>
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
    
    
    
<? include("footer.php") ?>