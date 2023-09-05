<link rel="stylesheet" href="style.css">
<?php
//POST送信で送られてきた名前を受け取って変数を作成
$my_name=$_POST['my_name'];
//①画像を参考に問題文の選択肢の配列を作成してください。
$question_1=[80, 22, 20, 21];
$question_2=["PHP", "Python", "JAVA", "HTML"];
$question_3=["join", "select", "insert", "update"];
//② ①で作成した、配列から正解の選択肢の変数を作成してください
$q1_answer = 80;
$q2_answer = "HTML";
$q3_answer = "select";

?>
<p>お疲れ様です<?php echo $my_name; ?>さん</p>
<!--フォームの作成 通信はPOST通信で-->
<form action="answer.php" method="POST">
    <h2>①ネットワークのポート番号は何番？</h2>
    <!--③ 問題のradioボタンを「foreach」を使って作成する-->
    <?php foreach ( $question_1 as $q1_select) { ?>
        <input type="radio" name="select1" value="<?php echo $q1_select ?>"><?php echo $q1_select ?>
    <?php } ?>
        
    <h2>②Webページを作成するための言語は？</h2>
    <!--③ 問題のradioボタンを「foreach」を使って作成する-->
    <?php foreach ( $question_2 as $q2_select) { ?>
        <input type="radio" name="select2" value="<?php echo $q2_select ?>"><?php echo $q2_select ?>
    <?php } ?>
    <h2>③MySQLで情報を取得するためのコマンドは？</h2>
    <!--③ 問題のradioボタンを「foreach」を使って作成する-->
    <?php foreach ( $question_3 as $q3_select) { ?>
        <input type="radio" name="select3" value="<?php echo $q3_select ?>"><?php echo $q3_select ?>
    <?php } ?><br>
    <!--問題の正解の変数と名前の変数を[answer.php]に送る-->
    <input type="hidden" name="my_name" value="<?php echo $my_name; ?>"/>
    <input type="hidden" name="answer1" value="<?php echo $q1_answer ?>"/>
    <input type="hidden" name="answer2" value="<?php echo $q2_answer ?>"/>
    <input type="hidden" name="answer3" value="<?php echo $q3_answer ?>"/>
    <input type="submit" value="回答する">
</form>