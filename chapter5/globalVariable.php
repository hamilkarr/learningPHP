<?php

$dinner = "갑오징어 카레";

function vegetarian_dinner(){
    global $dinner;
    echo "저녁메뉴는 $dinner 였습니다만, 지금은 ";
    $dinner = "완두싹 볶음";
    echo $dinner."입니다. <br>";
}

echo "일반 저녁 메뉴는 $dinner 입니다.";
vegetarian_dinner();
echo "일반 저녁 메뉴는 $dinner 입니다.";