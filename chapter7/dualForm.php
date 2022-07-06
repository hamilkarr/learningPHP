<?php

?>

<form action="catalog.php" method="post">
    <input type="text" name="product_id">
    <select name="category">
        <option value="ovenmitt">냄비받침</option>
        <option value="fryingpan">프라이팬</option>
        <option value="torch">주방 토치</option>
    </select>
    <input type="submit" value="제출">
</form>

<form action="eat.php" method="post">
    <select name="lunch[]" multiple>
        <option value="바베큐 돼지고기">바베큐 돼지고기</option>
        <option value="닭고기">닭고기</option>
        <option value="연꽃씨">연꽃씨</option>
        <option value="단팥">단팥</option>
        <option value="제비집">제비집</option>
    </select>
    <input type="submit" value="보고">
</form>
원하는 점심메뉴를 선택하시오<br>
<?php
if(isset($_POST['lunch'])){
    foreach ($_POST['lunch'] as $choice) {
        echo "$choice 를 골랐습니다.<br>";
    }
}

