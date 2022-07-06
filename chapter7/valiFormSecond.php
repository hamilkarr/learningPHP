<?php

function validate_form(){
    $errors = array();
    $input = array();

    $input['age'] = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
    if(in_null($input['age']) || ($input['age'] === false)){
        $errors[] = "나이를 정확하게 입력해 주세요";
    }

    $input['price'] = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    if(is_null($input['price']) || ($input['price'] === false)){
        $errors[] = "가격을 정확하게 입력해 주세요.";
    }

    $input['name'] = trim($_POST['name']);
    if(!isset($input['name'])){
        $input['name'] = '';
    }

    if(strlen($input['name']) == 0){
        $errors[] = "이름을 입력해 주세요.";
    }

    return array($errors, $input);
}