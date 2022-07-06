<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($form_errors = validate_form()){
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

    function show_form($errors) {
        if($errors){
            echo "다음 항목을 수정해 주세요.: <ul><li>";
            echo implode("</li><li>",$errors);
            echo "</li></ul>";
        }
        echo<<<_HTML_
        <form method="POST" action="$_SERVER[PHP_SELF]">
        이름:<input type="text" name="my_name">
        <br>
        <input type="submit" name="제출">
        </form>
        _HTML_;
    }

    function validate_form(){
        $errors = array();

        if(strlen($_POST['my_name'])<3){
            $errors[] = "이름은 3글자 이상 입력해 주세요.";
            $errors[] = "test_text";
        }

        return $errors;
    }