<?php

$census = array(
    ['city' => 'Suwon', 'province' => 'GG', 'popNum' => 1194313],
    ['city' => 'Changwon', 'province' => 'GN', 'popNum' => 1059241],
    ['city' => 'Goyang', 'province' => 'GG', 'popNum' => 990073],
    ['city' => 'Yongin', 'province' => 'GG', 'popNum' => 971327],
    ['city' => 'Cheongju', 'province' => 'CB', 'popNum' => 833276],
    ['city' => 'Jeonju', 'province' => 'JB', 'popNum' => 658172],
    ['city' => 'Cheonam', 'province' => 'CN', 'popNum' => 629062],
    ['city' => 'Gimhae', 'province' => 'GN', 'popNum' => 534124],
    ['city' => 'Pohang', 'province' => 'GB', 'popNum' => 511804],
    ['city' => 'Jinju', 'province' => 'GN', 'popNum' => 349788]
);

// echo count($census);
// exit;

echo "<table>";
echo "<tr><td>City</td><td>Province</td><td>Population</td></tr>";

$totalPopNum = 0;
for ($i=0; $i < count($census); $i++) {
    // foreach($census[$i] as $key => $value){
    //     // echo "<tr><td>$key</td><td>$value</td></tr>";
    //     echo "<tr><td>$key</td><td>$value</td></tr>";
    // }
    echo "<tr><td>{$census[$i]['city']}</td><td>{$census[$i]['province']}</td><td>{$census[$i]['popNum']}</td></tr>";
    // echo "<tr><td>{$census[$i]['city']}</td></tr>";
    $totalPopNum += $census[$i]['popNum'];
}
echo "<tr><td>총 인구수</td><td></td><td>$totalPopNum</td></tr>";

echo "</table>";

$students = ['Hong' => ['grade' => 100, 'id' => '271231'],
                'Kim' => ['grade' => 95, 'id' => 818211]];










?>