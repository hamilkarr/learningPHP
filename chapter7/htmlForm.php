<?php
    echo $_SERVER['PHP_SELF'];
    echo "<hr>";
    echo $_SERVER['DOCUMENT_ROOT'];
    echo "<br>";
    if("POST" == $_SERVER['REQUEST_METHOD']) {
        echo $_POST['my_name']."님 안녕하세요.";
    }else{
        echo <<<_HTML_
        <form method="post" action="$_SERVER[PHP_SELF]">
            이름: <input type="text" name="my_name">
            <br>
            <input type="submit" value="인사">
        </form>
        _HTML_;
    }