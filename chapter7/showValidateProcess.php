<?php
    require("./formHelper.php");

    $sweets = array("puff" => "참깨 퍼프",
                    "square" => "코코넛 우유 젤리",
                    "cake" => "흑설탕 케이크",
                    "ricemeat" => "찹쌀 경단");

    $main_dishes = array('cuke' => '데친 해삼',
                        'stomach' => '순대',
                        'tripe' => '와인 소스 양대창',
                        'taro' => '돼지고기 토란국',
                        'giblets' => '곱창 소금 구이',
                        'abalone' => '전복 호박 볶음');

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        list($errors, $input) = validate_form();
        if($errors) {
            show_form($errors);
        } else {
            // 제출 데이터가 검증을 통과하면 처리한다.
            process_form($input);
        }
    } else {
        // $_POST 값이 없으면 폼을 출력한다.
        show_form();
    }

    function show_form($errors = array()){
        $defaults = array('delivery' => 'yes',
                        'size' => 'medium');

        // 기본값을 이용해 $form 객체를 생성한다.
        $form = new FormHelper($defaults);

        //폼 출력과 관련된 모든 HTML은 별로의 파일로 완전히 분리한다.
        include('./complete-form.php');
    }

    function validate_form() {
        $input = array();
        $errors = array();

        // name은 필수 항목이다.
        $input['name'] = trim($_POST['name'] ?? '');
        if (! strlen($input['name'])) {
            $errors[] = "이름을 입력해 주세요.";
        }

        // size는 필수 항목이다.
        $input['size'] = $_POST['size'] ?? '';
        if (! in_array($input[size],['small','medium','large'])) {
            $errors[] = "크기를 선택해 주세요";
        }

        // sweet은 필수 항목이다.
        $inpit['sweet'] = $_POST['sweet'] ?? '';
        if(! in_array($input['sweet'],$GLOBALS['sweet'])){
            $errors[] = "디저트를 선택해 주세요.";
        }

        // 정확히 두 가지의 주 요리를 선택해야 한다.
        $input['main_dishes'] = $_POST['main_dishes'] ?? array();
        if(count($input['main_dishes']) != 2) {
            $errors[] = "주 요리를 두가지 선택해주세요.";
        } else {
            // 주요리가 두가지 선택됐다면
            // 두 요리가 유효한지 검사한다.
            if (!(array_key_exists($input['main_dishes'][0],$GLOBALS['main_dishes']) && array_key_exists($input['main_dishes'][1],$GLOBALS['main_dishes']))) {
                $errors[] = "주 요리를 두가지 선택해 주세요.";
            }
        }

        // delivery가 선택됐으면 comment에 내용이 있어야 한다.
        $input['delivery'] = $_POST['delivery'] ?? 'no';
        $input['comments'] = trim($_POST['comments'] ?? '');
        if (($input['delivery'] == 'yes') && (! strlen($input['comments']))) {
            $errors[] = "배달 주소를 입력해 주세요";
        }

        return array($errors,$input);
    }

    function process_form($input) {
        // 디저트와 주 요리의 전체 이름을
        // $GLOBALS['sweet']와 $GLOBALS['main_dishes']배열에서 찾는다.

        $sweet = $GLOBALS['sweet'][$input['sweet']];
        $main_dish_1 = $GLOBALS['main_dishes'][$input['main_dishes'][0]];
        $main_dish_2 = $GLOBALS['main_dishes'][$input['main_dishes'][1]];

        if(isset($input['delivery']) && $input['delivery'] == 'yes') {
            $delivery = '배달';
        }else{
            $delivery = '매장 방문';
        }

        //주문 메세지 텍스트 생성
        $message = <<<_ORDER_
        주문이 완료되었습니다, {$input['name']}님.
        $sweet({$input['size']}), $main_dish_1, $main_dish_2 를 주문하셨습니다.
        배달여부: $delivery
        _ORDER_;

        if(strlen(trim($input['comments']))) {
            $message .= '남기신 메모: '.$input['comments'];
        }

        //주방장에게 메세지 보내기
        mail('chef@restaurant.example.com','New Order',$message);
        //HTML 엔티티 인코딩후 메세지를 출력하고
        //줄바꿈은 <BR/> 태그로 변경한다.
        echo nl2br(htmlentities($message, ENT_HTML5));
    }

?>