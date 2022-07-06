<?php

$sweets = array('참깨', '코코넛', '케이크', '찹쌀');
function generate_option($options){
    $html = '';
    foreach($options as $option){
        $html .="<option>$option</option>\n";
    }
    return $html;
}

function show_form(){

    $sweets = generate_option($GLOBALS['sweets']);

    echo<<<_HTML_
    <form method="POST" action="$_SERVER[PHP_SELF]">
    메뉴선택: <select name="메뉴선택">
    $sweets
    </select>
    <br>
    <input type="submit" name="제출">
    </form>
    _HTML_;
}

show_form();