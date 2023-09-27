<!-- メインのソースを記載するファイルです。
ユーザ情報、記事情報は、getDataクラスをインスタンス化して取得してください。 -->
<?php
require "getData.php";
$getData = new getData();

?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>checktest4</title>
        <link rel="stylesheet" href="./style.css" />
    </head>
<body>
    <div class="header">
        <img class="logo" src="Y&I_logo.png">
        <div class="info">
            <p class="welcome"><?php echo 'ようこそ'.$getData->getUserData()['last_name'], $getData->getUserData()['first_name'].'さん' ?></p>
            <p class="logintime"><?php echo '最終ログイン日：'.$getData->getUserData()['last_login'] ?></p>
        </div>
    </div>
    <div class="main">
        <table class="table">
            <tr class="columns">
                <th>記事ID</th>
                <th>タイトル</th>
                <th>カテゴリ</th>
                <th>本文</th>
                <th>投稿日</th>
            </tr>                
            <?php foreach ($getData->getPostData() as $row) { 
                $search=[1,2,3];
                $replace=['食事', '旅行', 'その他'];
                $category_no=str_replace($search, $replace,$row['category_no'] );
                ?>
                <tr class="rows">
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $category_no ?></td>
                    <td><?php echo $row['comment']; ?></td>
                    <td><?php echo $row['created']; ?></td>
                </tr>
            <?php } ?>         
        </table>
    </div>
    <div class="footer">
        <p>Y&I group.inc</p>
    </div>
</body>
</html>