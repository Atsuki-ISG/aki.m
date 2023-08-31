<?php

  //②フォームからのデータを受け取ります
    $time = $_POST['time'];
    $my_name = $_POST['my_name'];
    $number = $_POST['number'];

  //③受け取った数字に1~6までのランダムな数字を掛け合わせて
  //変数に入れてください

    $fortuneNumber = $number * mt_rand(1, 6);

  //④掛け合わせた数字の結果によっておみくじを選び、変数に入れます
    
    function fortune($fortuneNumber) {

        if ($fortuneNumber >= 37) {
            $fortune = "残念";
        } elseif ($fortuneNumber >= 26) {
            $fortune = "大吉";
        } elseif ($fortuneNumber >= 21) {
            $fortune = "吉";
        } elseif ($fortuneNumber >= 16) {
            $fortune = "小吉";
        } else {
            $fortune = "凶";
        }
        
    return "結果は".$fortune."です。";
    }


  //⑤今日の日付と、名前、番号、おみくじ結果を表示しましょう

    echo $time.'<br>';
    echo "名前は".$my_name."です。";
    echo '<br>';
    echo "番号は".$fortuneNumber."です。";
    echo '<br>';
    echo fortune($fortuneNumber);
    ?>
