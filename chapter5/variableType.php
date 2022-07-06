<?php

function countdown(int $top){
    while($top > 0){
        echo $top."..";
        $top--;
    }
    echo "펑!<br>";
}

$counter = 5;
countdown($counter);
echo "counter의 값: $counter";

countdown("grant");