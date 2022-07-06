<?php

$meals = array("Walnut" => 1,
                "Cashew" => 4.95,
                "Mulberries" => 3.00,
                "Eggplant" => 6.50,
                "Shrimp" => 0);

print_r($meals);
                
$books = array("중국어안내", "중국 식사 문화");

// array_search : 배열의 원소로 검색해서, 해당되는 키를 찾는다. 원소가 없으면 false 출력;
$dish = array_search(6.50,$meals);

echo "가격: {$dish}";
echo "<br>";


if (array_key_exists('Shrimp',$meals)){
    echo "쌉가능";
}

if(array_key_exists(1,$books)){
    echo "그책 있음";
}

echo "<hr>";

if (in_array(3,$meals)){
    echo "그가격 맞음";
    echo "<br>";
}


if(in_array('중국어안내',$books)){
    echo "그책 있음";
    echo "<br>";
}





?>