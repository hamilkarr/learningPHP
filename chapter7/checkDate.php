<?php

$range_start = new DateTime('6 months ago');
$range_end = new DateTime();

$input['year'] = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT, array('options'=>array('min_range'=> 1900, 'max_range'=>'2100')));
$input['month'] = filter_input(INPUT_POST, 'month', FILTER_VALIDATE_INT, array('options'=>array('min_range'=> 1, 'max_range'=>'12')));
$input['day'] = filter_input(INPUT_POST, 'day', FILTER_VALIDATE_INT, array('options'=>array('min_range'=> 1, 'max_range'=>'31')));

if ($input['year'] && $input['month'] && $input['day'] && checkdate($input['year'],$input['month'],$input['day'])) {
    $submitted_date = new DateTime(strtotime($input['year'].'-'.$input['month'].'-'.$input['day']));
    
    if (($range_start > $submitted_date) || ($range_end < $submitted_date)){
        $errors[] = '지난 6개월 사이에 속하는 날짜를 입력해주세요.';
    }
    
} else {
    $errors[] = '올바른 날짜를 입력해 주세요';
}


