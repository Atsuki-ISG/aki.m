<?php
function db_connect() {

    $dsn = 'mysql:host=localhost;charset=utf8;dbname=YIGroupBlog';
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