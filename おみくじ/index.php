<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Practice2</title>
</head>
<body>
  <!-- ①フォームを作成しましょう -->
  <form action="result.php" method="POST">
    <input type="hidden" name="time" value="<?php echo date ('Y-m-d H:i:s', time()); ?>"/>
    <p>好きな名前を入れてください</p>
    <input type="text" name="my_name" />
    <br>
    <p>1~6の中で好きな数字を入れてください</p>
    <input type="text" name="number" />
    <br>
    <input type="submit" valie="送信" />
    <?php echo date ('Y-m-d H:i:s', time()); ?>
  <!-- ここにフォームを記述してください -->
  </form>
</body>
</html>