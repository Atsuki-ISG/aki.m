<?php
require_once('db_connect.php');

session_start();
if(empty($_SESSION['user_name'])) {
    header("location: login.php");
    exit;
}
if(isset($_POST['new_book'])) {
    if(empty($_POST['title'])) {
        echo 'タイトルが入力されていません。';
    } elseif (empty($_POST['date'])) {
        echo '発売日が入力されていません。';
    } else {
        echo '在庫数が入力されていません';
    }
    if(!empty($_POST['title']) && !empty($_POST['date']) && !empty($_POST['stock'])) {
        $title = $_POST['title'];
        $date = $_POST['date'];
        $stock = $_POST['stock'];

        $pdo = db_connect();
        try {
            $sql = "INSERT INTO books (titel, date, stock) VALUES (:title, :date, :stock)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':stock', $stock);
            header("location: main.php");
        } catch (PDOException $e) {
            echo 'Error'.$e->getMassage;
            die();
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>本 登録画面</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style_signUp.css"/>
</head>
<body class=signUp>
    <h1>本 登録画面</h1>
    <form method="POST" action="">
        <input class="book_title" type="text" placeholder="タイトル" name="book_title" id="book_title"><br>
        <input class="release_date" type="text" placeholder="発売日" name="release_date" id="release_date"><br>
        <h3>在庫数</h3>
        <select class="stock" name="stock">
            <?php for ($i = 0; $i <= 20; $i++) {
                ?><option> <?php echo $i; ?></option>
            <?php } ?>
        </select><br>
        <input class="submit" type="submit" value="登録" id="new_book" name="new_book">
    </form>
</body>