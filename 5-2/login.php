<?php
require_once('db_connect.php');
session_start();

if(!empty($_POST)) {
    if(empty($_POST['name'])) {
        echo 'ユーザー名が未入力です';
    }

    if(empty($_POST['password'])) {
        echo "パスワードが未入力です。";
    }

    if(!empty($_POST['name']) && !empty($_POST['password'])) {
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
        $pass = htmlspecialchars($_POST['password'], ENT_QUOTES);
    }

    try {
        $pdo = db_connect();
        $sql = "SELECT * FROM users WHERE name = :name";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
    } catch (PDOException $e) {
        echo 'Error'.$e->getMassage();
        die();
    }

    if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if(password_verify($pass, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            header("location: main.php");
            exit;
        } else {
            echo 'パスワードに誤りがあります。';
        }
    } else {
        echo 'ユーザー名かパスワードに誤りがあります。';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style_login.css"/>
</head>
<body class=login>
    <h1>ログイン画面</h1>
    <button class="btn" onclick="location.href='signUp.php'">新規ユーザー登録</button>
    <form method="POST" action="">
        <input class="name" type="text" placeholder="ユーザー名" name="name" id="name"><br>
        <input class="password" type="password" placeholder="パスワード" name="password" id="password"><br>
        <input class="submit" type="submit" value="ログイン" id="login" name="login">
    </form>
</body>