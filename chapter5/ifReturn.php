<?php 

function payment_method($cash_on_hand, $amount){
    if($amount > $cash_on_hand) {
        return "신용카드";
    }else{
        return "현금";
    }
}

function restaurant_check($meal, $tax, $tip){
    $tax_amount = $meal*($tax/100);
    $tip_amount = $meal*($tip/100);
    $total_amount = $meal + $tax_amount + $tip_amount;

    return $total_amount;
}

$total = restaurant_check(15.22, 8.25, 15);
$method = payment_method(20, $total);

echo "결제 방법은 ".$method."입니다.";
echo "<hr>";

if(restaurant_check(15.22, 8.25, 15) < 20){
    echo "$20가 안되니 현금으로 내야지";
    echo "<hr>";
}else{
    echo "$20가 넘으니 신용카드로 내야지";
    echo "<hr>";
}

function can_pay_check($cash_on_hand, $amount){
    if($amount > $cash_on_hand){
        return false;        
    }else{
        return true;
    }
}

if(can_pay_check(20, $total)){
    echo "현금으로 낼 수 잇어";
}else {
    echo "신용카드를 써야 겠어";
}

function complete_bill($meal, $tax, $tip, $cash_on_hand){
    $tax_amount = $meal * ($tax/100);
    $tip_amount = $meal * ($tip/100);
    $total_amount = $meal + $tax_amount + $tip_amount;
    if($total_amount > $cash_on_hand ) {
        return false;
    } else {
        return $total_amount;
    }
}

if ($total = complete_bill(15.22, 8.25, 15, 20)){
    echo $total."정도면 딱 좋지.";
}else{
    echo "제가 돈이없어서 그러는데, 대신 접시라도 닦으면 안될까요?";
}