<?php
// 作成したdb_connect.phpを読み込む
require_once('db_connect.php');

$id = 1;

// 実行したいSQL文を準備
$sql = "DELETE FROM users WHERE id = :id;";
// 関数db_connect()からPDOを取得する
$pdo = db_connect();
try {
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    echo '削除完了です';
    // ループ文を使用して、1行ずつ読み込んで$rowに代入する
    // 読み込むものがなくなったらループ終了
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    die();
}