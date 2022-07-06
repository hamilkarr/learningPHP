<?php
    
    $row_style = array('even', 'odd');
    $style_index = 0;
    $meal = array('breakfast' => '호두번',
                    'lunch' => '캐슈너트와 양송이버섯', 
                    'snack'=> '말린 오디', 
                    'dinner' => '칠리 소스 가지 볶음');

    print "<table>\n";
    foreach ($meal as $key => $value) {
        print '<tr class="'.$row_style[$style_index].'">';
        print "<td>$key</td><td>$value</td></tr>\n";
        $style_index = 1 - $style_index;
        echo $style_index;
        
    }
    print "</table><hr>";

    $meals = array('Walnut Bun' => 1,
                    'Cashew Nut and White Murshrooms' => 4.95,
                    'Dried Mulberries' => 3.00,
                    'Eggplant with Chili Sauce' => 6.50);
    foreach ($meals as $dish => $price) {
        $meals[$dish] = $meals[$dish] * 2;
    }

    foreach ($meals as $dish => $price) {
        echo $dish." 메뉴의 변경된 가격은 ".$price." 입니다.";
        echo "<br>";
    }
    echo "<hr>";
    /*
    for() 반복문의 경우 현재 진행중인 루프 변수 원소의 위치를 명확히 알 수 있다.
    foreach() 반복문의 경우 각 배열 원소의 값을 얻을수 있다.
    둘을 동시에 얻을수 있는 루프 구조는 없다.    
    */

    $dinner =  array(
                        '스위트콘과 아스파라거스',
                        '레몬치킨',
                        '삶은 망태 버섯');

    for($i = 0, $num_dishes = count($dinner); $i < $num_dishes; $i++){
        echo "메뉴 번호 {$i} : {$dinner[$i]}<br>";
    }
?>
