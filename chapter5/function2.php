<?php

    function restaurant_check($meal, $tax, $tip){
        $tax_amount = $meal*($tax/100);
        $tip_amount = $meal*($tip/100);
        $total_amount = $meal + $tax_amount + $tip_amount;

        return $total_amount;
    }

    $total = restaurant_check(15.22, 8.25, 15);
    echo "수중에 현금이 총 $20이니까....";
    if ($total > 20){
        echo "신용카드로 결제해야되.";
    }else {
        echo "현금으로 낼 수 있어.";
    }

    echo "<hr>";

    function restaurant_check2($meal, $tax, $tip){
        $tax_amount = $meal*($tax/100);
        $tip_amount = $meal*($tip/100);
        $total_notip = $meal + $tax_amount;
        $total_tip = $meal + $tax_amount + $tip_amount;

        return array($total_notip, $total_tip);
    }

    $total2 = restaurant_check2(15.22, 8.25, 15);
    if($total2[0] < 20){
        echo "팁 제외한 총 금액이 $20보다 작음";
        echo "<br>";
    }
    if($total2[1] < 20){
        echo "팁 포함한 총 금액이 $20보다 작음";
    }
?>