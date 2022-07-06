<?php

require("./selectForm.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    list($form_errors, $input) = validate_form();
    if($form_errors){
        show_form($form_errors);
    }else{
        process_form();
    }
}else{
    show_form();
}

function process_form(){
    echo $_POST['my_name']."님 안녕하세요.";
}

$sweets = array('참깨', '코코넛', '케이크', '찹쌀');
function generate_option($options){
    $html = '';
    foreach($options as $option){
        $html .="<option>$option</option>\n";
    }
    return $html;
}

function show_form($errors=NULL){
    if($errors){
        echo "다음 항목을 수정해 주세요.: <ul><li>";
        echo implode("</li><li>",$errors);
        echo "</li></ul>";
    }

    $sweets = generate_option($GLOBALS['sweets']);

    echo<<<_HTML_
    <form method="POST" action="$_SERVER[PHP_SELF]">
    이름:<input type="text" name="my_name">
    <br>
    메뉴선택: <select name="메뉴선택">
    $sweets
    </select>
    <br>
    <input type="submit" name="제출">
    </form>
    _HTML_;
}

function validate_form(){
    $errors = array();
    $input = array();

    $input['age'] = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT, array('options' => array('min_range'=>18, 'max_range'=>65)));
    if(is_null($input['age']) || ($input['age'] === false)){
        $errors[] = "18세와 65세 사이의 나이를 입력해주세요.";
    }

    $input['price'] = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    if(is_null($input['price']) || ($input['price'] === false) || ($input['price'] < 10.00) || ($input['price'] > 50.00)){
        $errors[] = "$10와 $50 사이의 가격을 입력해 주세요";
    }

    $input['name'] = trim($_POST['my_name']);
    if(!isset($input['name'])){
        $input['name'] = '';
    }

    if(strlen($input['name']) == 0){
        $errors[] = "이름을 입력해 주세요.";
    }

    return array($errors, $input);

    $input['email'] = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if(!$input['email']){
        $errors[] = '올바른 이메일을 입력해 주세요';
    }

    $input['order'] = $_POST['order'];
    if (!array_key_exists($input['order'],$GLOBALS['sweets'])) {
        $errors[] = "주문 가능한 메뉴가 아닙니다.";
    }
}

/*
    function validate_form(){
        $errors = array();

        if(strlen($_POST['my_name'] < 3)){
            $errors[] = "이름은 3글자 이상 입력해 주세요.";
        }

        $checkMail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        if(!$checkMail){
            $errors[] = "이메일 주소를 입력해 주세요.";
        }

        $ok = filter_input(INPUT_POST,'age', FILTER_VALIDATE_INT);
        if(is_null($ok) || ($ok === false)){
            $errors[] = "나이를 정확히 입력해 주세요";
        }

        return $errors;
    }
*/