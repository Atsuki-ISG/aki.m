<?php

$products = [
    "鉛筆" => 100,
    "消しゴム" => 150,
    "物差し" => 500
];

function getTaxIncludedPrice($price) {
    $tax = 1.1;
    $taxIncludedPrice = $price * $tax;
    return $taxIncludedPrice;
}

foreach ($products as $name => $price) {
    echo $name.'の税込価格は'.getTaxIncludedPrice($price).'円です';
    echo '<br>';
}