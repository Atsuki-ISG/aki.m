<!-- BD接続用に、connect関数を作成 -->
<?php

function connect() {

$dsn = 'mysql:host=localhost;charset=utf8;dbname=checktest4';
$user = 'root';
$pass = 'root';

    try {
        // PDOインスタンスの作成
        $pdo = new PDO($dsn, $user, $pass);
        // エラー処理方法の設定
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        die();
    }
}
?>