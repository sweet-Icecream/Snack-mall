<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);

if (array_key_exists("statics_id", $_GET)) {
    $statics_id = $_GET["statics_id"];
    $query = "select * from statics where statics_id = $statics_id";
    $res = mysqli_query($conn, $query);
    $statics = mysqli_fetch_assoc($res);
    if (!$statics) {
        msg("물품이 존재하지 않습니다.");
    }
    echo "<br/><br/><br/><br/>";
    switch($statics_id){
    	case 1:
    		echo "<img src='images/1.png'/>";
    		break;
    	case 2:
    		echo "<img src='images/2.png'/>";
    		break;
    
    	case 3:
    		echo "<img src='images/3.png'/>";
    		break;
    
    	case 4:
    		echo "<img src='images/4.png'/>";
    		break;
    
    	case 5:
    		echo "<img src='images/5.png'/>";
    		break;
    	case 6:
    		echo "<img src='images/6.png'/>";
    		break;
		case 7:
    		echo "<img src='images/7.png'/>";
    		break;
    }
    
}

    
?>
    

    
    
    
    
    
<? include("footer.php") ?>