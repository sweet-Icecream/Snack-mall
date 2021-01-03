<!DOCTYPE html>
<html lang='ko'>
<head>
    <title>SNACK</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css?after">
</head>
<body>
<form action="snack_list.php" method="post">
    <div class='navbar fixed'>
        <div class='container'>
            <a class='pull-left title' href="index.php">SNACK</a>
            <ul class='pull-right'>
                <li>
                    <input type="text" name="search_keyword" placeholder="SNACK 검색">
                </li>
                <li><a href='snack_list.php'>SNACK 목록</a></li>
                <li><a href='company_list.php'>COMPANY 목록</a></li>
                <li><a href='review_list.php'>REVIEW 목록</a></li>
                <li><a href='kind_list.php'>KIND 목록</a></li>
               
                <li><a href='snack_form.php'>SNACK 추가</a></li>
                <li><a href='review_form.php'>REVIEW 추가</a></li>
                <li><a href='site_info.php'>site_info</a></li>
            </ul>
        </div>
    </div>
</form>