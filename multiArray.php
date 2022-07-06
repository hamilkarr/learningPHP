<?php

$meals = array('breakfast' => ['호두번','커피'],
                'lunch' => ['캐슈너트','양송이버섯'],
                'dinner' => ['말린오디','참깨 게살 무침']);

// foreach ($meals as $eat => $menu) {
//     foreach ($menu as $key => $value) {
//         echo $eat."의 메뉴는 ".$value." 입니다.";
//         echo "<hr>";
//     }
// }
// echo count($meals[0]);
// exit;

$specials = array(array('체스트넛','호두','땅콩'),
                    array('체스트샐러드','호두샐러드','땅콩샐러드'));

for($i=0, $num_specials = count($specials); $i < $num_specials; $i++){
    for($j=0; $j < count($specials[$i]); $j++){
        echo $specials[$i][$j];
        echo "<br>";
    }
}
?>