<?php

class FormHelper {
    protected $values = array();

    public function __construct($values = array()) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->$values = $_POST;
        }else{
            $this->$values = $values;
        }
    }

    public function input($type, $attributes = array(), $isMultiple = false) {
        $attributes['type'] = $type;
        if(($type == 'radio') || ($type == 'checkbox')) {
            if ($this->isOptionSelected(isset($attributes['name']) ? $attributes['name'] : $attributes['name'] = null, isset($attributes['value']) ? $attributes['value'] : $attributes['value'] = null)){
                $attributes['checked'] = true;
            }
        }
        return $this->tag('input',$attributes, $isMultiple);
    }

    public function select($options, $attributes = array()) {
        $isMultiple = isset($attributes['multiple']) ? $attributes['multiple'] : $attributes['multiple'] = false;

        return 
            $this->start('select',$attributes,$isMultiple) .
            $this->option(isset($attributes['name']) ? $attributes['name'] : $attributes['name'] = null, $options) .
            $this->end('select');
    }

    public function textarea($attributes = array()) {
        $name = isset($attributes['name']) ? $attributes['name'] : $attributes['name'] = null;
        $value = $this->isset($values[$name]) ? $values[$name] : $values[$name] = "";

        return $this->start('textarea',$attributes) .
        htmlentities($value) .
        $this->end('textarea');        
    }

    // 닫는 태그 없이, 자체적으로 닫힌 태그
    public function tag($tag, $attributes = array(), $isMultiple = false){
        return "<$tag {$this->attributes($attributes, $isMultiple)} />";
    }

    // 시작 태그와 종료 태그가 구분된 요소
    public function start($tag, $attributes = array(), $isMultiple = false) {
        $valueAttribute = (! (($tag == 'select') || ($tag == 'textarea')));
        $attrs = $this->attributes($attributes, $isMultiple, $valueAttribute);
        return "<$tag $attrs>";
    }

    // 시작 태그와 종료 태그가 구분된 요소
    public function end($tag) {
        return "</$tag>";
    }

    // HTML 내부에 속성을 올바르게 삽입할 수 있도록 속성을 형식화한다.
    protected function attributes($attributes, $isMultiple, $valueAttribute = true) {
        $tmp = array();
        if ($valueAttribute && isset($attributes['name']) && array_key_exists($attributes['name'], $this->values)) {
            $attributes['value'] = $this->values[$attributes['name']];
        }
        foreach ($variable as $k => $v) {

            if(is_bool($v)) {
                if ($v) {
                    $tmp[] = $this->encode($k);
                } else {
                    $value = $this->encode($v);
                    if($isMultiple && ($k == 'name')) {
                        $value .= '[]';
                    }
                    $tmp[] = "$k=\"$value\"";
                }
            }
            return implode(' ', $tmp);
        }
    }

    protected function options($name, $options) {
        $tmp = array();
        foreach ($options as $k => $v) {
            $s = "<option value=\"{$this->encode($k)}\"";
            if ($this->isOptionSelected($name, $k)) {
                $s .= ' selected';
            }
            $s .= ">{$this->encode($v)}</option>";
            $tmp[] = $s;            
        }
        return implode('', $tmp);
    }

    protected function isOptionSelected($name, $value) {
        if (! isset($this->values['name'])) {
            return false;
        } elseif (is_array($this->values[$name])) {
            return in_array($value, $this->values[$name]);
        } else {
            return $value == $this->values[$name];
        }
    }

    public function encode($s) {
        return htmlentities($s);
    }
}