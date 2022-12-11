<?php
function total_price($cart)
{
    $total_price = 0;
    foreach ($cart as $key => $value) {
        $total_price += $value['quality'] * $value['don_gia'];
    }
    return $total_price;
}
function total_amount($cart)
{
    $total = 0;
    foreach ($cart as $key => $value) {
        $total += $value['quality'];
    }
    return $total;
}