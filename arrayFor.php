<?php

/*
$row_array = array('odd', 'even');

$dinner = array('sweet', 'lemon', 'mushroom,');

for($i = 0, $num_dishes = count($dinner); $i < $num_dishes; $i++){
    echo "{$row_array[$i%2]}";
    echo "<br>";
}
*/

$letters[0] = 'A';
$letters[1] = 'B';
$letters[3] = 'D';
$letters[2] = 'C';

print_r($letters);
echo "<hr>"; 

foreach ($letters as $letter) {
    echo $letter;
}













?>