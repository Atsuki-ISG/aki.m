<link rel="stylesheet" href="style.css">
<?php 
//[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成
$my_name = $_POST['my_name'];
$select1 = $_POST['select1'];
$select2 = $_POST['select2'];
$select3 = $_POST['select3'];
$a1 = $_POST['answer1'];
$a2 = $_POST['answer2'];
$a3 = $_POST['answer3'];

//選択した回答と正解が一致していれば「正解！」、一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する
function answer_check1 ($a1, $select1) {
    if ($a1 === $select1) {
    echo "正解！";
    } else {
    echo "残念・・・";
    }
}
function answer_check2 ($a2, $select2) {
    if ($a2 === $select2) {
    echo "正解！";
    } else {
    echo "残念・・・";
    }
}
function answer_check3 ($a3, $select3) {
    if ($a3 === $select3) {
    echo "正解！";
    } else {
    echo "残念・・・";
    }
}
?>
<p><!--POST通信で送られてきた名前を表示--><?php echo $my_name; ?>さんの結果は・・・？</p>
<p>①の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php answer_check1($a1, $select1); ?>
<p>②の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php answer_check2($a2, $select2); ?>
<p>③の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php answer_check3($a3, $select3); ?>