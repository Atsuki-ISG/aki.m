<?php
require_once('db_connect.php');

session_start();
if(empty($_SESSION['user_name'])) {
    header("location: login.php");
    exit;
}
$pdo = db_connect();
try {
    $sql = "SELECT * FROM books";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
} catch(PDOException $e) {
    echo 'Error'.$e->getMassage;
    die();
}
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>在庫管理画面</title>
</head>
<body>
    <h1>在庫一覧画面</h1>
    <button class="btn_newBook" onclick="location.href='new_book_registration.php'">新規登録</button>
    <button class="btn_logout" onclick="location.href='logout.php'">ログアウト</button>
    <table>
        <tr>
            <td>タイトル</td>
            <td>発売日</td>
            <td>在庫数</td>
            <td></td>
        </tr>
        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['stock']; ?></td>
                <td><a href="delete_book.php?id=<?php echo $row['id']; ?>">削除</a></td>
            </tr>
        <?php } ?>
    </table>
</body>