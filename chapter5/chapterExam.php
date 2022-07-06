<?php

$url = "/images";

function imgTag($files, $alt="안녕",$height = "100px", $width = "100px"){
    $url2 = $GLOBALS['url'].$files;
    echo "<img src='$url2' alt = '$alt' heigth = '$height' width = '$width' />";

}

require("./function2.php");

$cash_on_hand = 31;
$meal = 25;
$tax = 10;
$tip = 10;

while(($cost = restaurant_check($meal,$tax,$tip)) < $cash_on_hand){
    $tip++;
    print "팁으로 $tip% ($cost) 정도는 낼 수 있지.\n";
}

imgTag("/photo.png");
echo "<hr>";

function rgbToHexcode($r, $g, $b){
    $hex1 = [dechex($r), dechex($g), dechex($b)];
    // print_r($hex1);
    // echo "<hr>";
    foreach ($hex1 as $i => $val) {
        // echo strlen($val);
        if(strlen($val) == 1) {
           $hex1[$i] = "0$val";
        }
    }
    return "#".implode('',$hex1);
}

$answer = rgbToHexcode(255,0,255);
echo $answer;