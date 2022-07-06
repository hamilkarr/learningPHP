<?php
// setcookie('userid','ralph');
// print_r($_COOKIE);


setcookie('shord_userid','ralph',time() + 60*60);
echo $_COOKIE['shord_userid'];

$deadLine = new DateTime("2022-10-11 12:00:00");
echo $deadLine->format("U");
?>