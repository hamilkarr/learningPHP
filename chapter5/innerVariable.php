<?php
    $dinner = '갑오징어 카레';

    function vegetarian_dinner(){
        echo "저녁 메뉴는 $dinner, 또는 ";
        $dinner = '완두싹 볶음';
        echo $dinner." 입니다.<br>";
    }

    function kosher_dinner(){
        echo "저녁 메뉴는 $dinner, 또는 ";
        $dinner = "궁보계정";
        echo $dinner." 입니다.<br>";
    }

    echo "채식주의식 ";
    vegetarian_dinner();
    echo "유대인식 ";
    kosher_dinner();
    echo "일반 저녁 메뉴는 $dinner 입니다.";
    echo "<hr>";

    function macrobiotic_dinner(){
        $dinner = "모듬 채소";
        echo "저녁 메뉴는 $dinner 입니다.";
        echo " 하지만 저는 ";
        echo $GLOBALS['dinner']."를 먹겠어요.<br>";
    }

    macrobiotic_dinner();
    echo "일반 저녁 메뉴: $dinner";
    echo "<hr>";

    function hungry_dinner() {
        $GLOBALS['dinner'] .= " 그리고 바싹 익힌 토란";
    }


    echo "일반 저녁 메뉴는 $dinner 입니다.";
    echo "<br>";
    hungry_dinner();
    echo "저녁 특선 메뉴는 $dinner 입니다.";


?>