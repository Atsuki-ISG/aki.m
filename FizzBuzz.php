<?php
$num = 0;
while ($num < 100) {
    $num++;
    if ($num % 3 == 0 && $num % 5 == 0) {
        echo "FizzBuzz!!";
    } elseif ($num % 5 == 0) {
        echo "Buzz!";
    } elseif ($num % 3 == 0) {
        echo "Fizz!";
    } else {
        echo $num;
    } 
    echo '<br>';   
}
?>