<?php
require_once('db_connect.php');

if(isset($_POST['signUp'])) {
    if(empty($_POST['name'])){
        echo 'ユーザー名が未入力です';
    } elseif (empty($_POST['password'])) {
        echo "パスワードが未入力です。";
    } else {
        echo 'ログインに失敗しました。';
    }


    if (!empty($_POST['name']) && !empty($_POST['password'])) {
        $username = $_POST['name'];
        $password = $_POST['password'];
    } else {
        echo 'ログインに失敗しました。';
    }
    $pdo = db_connect();
    try {
        $sql = "INSERT INTO users (name, password) VALUES (:name, :password)";
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $username);
        $stmt->bindParam(':password', $password_hash);
        $stmt->execute();
        echo '登録が完了しました。';
    }
    catch(PDOException $e) {
        echo 'error'.$e->getMassage();
        die();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>signUp</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style_signUp.css"/>
</head>
<body class=signUp>
    <h1>ユーザー登録画面</h1>
    <form method="POST" action="">
        <input class="name" type="text" placeholder="ユーザー名" name="name" id="name"><br>
        <input class="password" type="password" placeholder="パスワード" name="password" id="password"><br>
        <input class="submit" type="submit" value="新規登録" id="signUp" name="signUp">
    </form>
</body>