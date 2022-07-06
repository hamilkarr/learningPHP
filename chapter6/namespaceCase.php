<?php

    namespace Tiny;

    class Fruit {
        public static function munch($bite){
            echo "$bite 한입 드셔보세요.";
            echo "<br>";
        }
        
    }

    \Tiny\Fruit::munch("바나나");