<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $defaults = $_POST;
    } else {
        $defaults = array('delivery' => 'yes',
                        'size' => 'medium',
                        'main_dish' => array('토란','양대창'),
                        'sweets' => '케이크',
                        'my_name' => 'Tom',
                        'comments' => 'Insert Your Message',
                        'sweet' => 'puff',
                        'main_dish' => array('cuke','taro'),
                        );
    }

    $sweets = array('puff' => '참깨 퍼프',
                    'square' => '코코넛 우유 젤리',
                    'cake' => '흑설탕 케이크',
                    'ricemeat' => '찹쌀 경단');


    $main_dishes = array('cuke' => '데친 해삼',
                        'stomach' => '순대',
                        'tripe' => '와인 소스 양대창',
                        'taro' => '돼지고기 토란국',
                        'giblets' => '곱창 소금구이',
                        'abalone' => '전복 호박 볶음');

?>

<input type="text" name="my_name" value="<?=htmlentities($defaults['my_name'])?>">
<hr>
<textarea name="comments">
    <?=htmlentities($defaults['comments']);?>
</textarea>
<hr>
<select name="sweet">
    <?php foreach($sweets as $option => $label) : ?>
        <option value="<?=$option?>" <?php if($option == $defaults['sweet']) echo "selected" ?> ><?=$label?></option>
    <?php endforeach; ?>
</select>
<hr>
<select name="main_dish[]" multiple>
    <?php 
        $select_options = array();
        foreach ($defaults['main_dish'] as $keys) {
            $select_options[$keys] = true;
        }
        // print_r($select_options);
        // exit;

        foreach($main_dishes as $option2 => $label2) : ?>

        <option value="<?=htmlentities($option2)?>" <?php if(array_key_exists($option2, $select_options)) echo "selected";?>>
            <?=htmlentities($label2) ?>
        </option>
        <br>
    <?php endforeach; ?>
</select>
<hr>

<input type="checkbox" name="delivery" value="yes" <?php if($defaults['delivery'] == 'yes') echo "checked"; ?>> 배달 주문이신가요?
<hr>
<?php 
    $checkbox_options = array('small' => '소',
                                'medium' => '중',
                                'large' => '대');
    foreach($checkbox_options as $size => $order) : ?>

    <input type='radio' name='size' value='<?=$size?>' <?php if($defaults['size'] == $size) echo "checked";?>> <?=$order?>

<?php endforeach; ?>

