<?php
if(isset($_POST['lunch'])){
    foreach ($_POST['lunch'] as $choice) {
        echo "{$choice}를 골랐습니다.<br>";
    }
}