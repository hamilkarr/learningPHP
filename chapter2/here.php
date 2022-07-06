<?php
    echo <<<HTMLBLOCK
    <html>
    <head><title>메뉴</title></head>
    <body>
    <h1>저녁</h1>
    <ul>
    <li>소고기 쌀국수 볶음</li>
    <li>완두싹 볶음</li>
    <li>간장 볶으며면</li>
    </ul>
    </body>
    </html>
    HTMLBLOCK;

    if (strcasecmp($_POST['email'],'hello@gmail.com') == 0){
        echo "다시 뵙게되어 반값습니다. 정병일님";
    }
    printf("형식 문자열 규칙");

    
?>

