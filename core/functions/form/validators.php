<?php

function validate_fields_match($filtered_input, &$form, $params) {
    $match = true;

    foreach ($params as $field_id) {
        $ref_value = $ref_value ?? $filtered_input[$field_id];
        if ($ref_value != $filtered_input[$field_id]) {
            $match = false;
            break;
        }
    }
    
    if (!$match) {
        $form['fields'][$field_id]['error'] = 'Fields do not match!';
        return false;
    }

    return true;
}

function validate_not_empty($field_value, &$field) {
    if (strlen($field_value) == 0) {
        $field['error'] = 'Field can ot be empty!';
    } else {
        return true;
    }
}

function validate_is_number($field_value, &$field) {
    if (!is_numeric($field_value)) {
        $field['error'] = 'Not a number!!';
    } else {
        return true;
    }
}

function validate_is_not_number($field_value, &$field) {
    if (is_numeric($field_value)) {
        $field['error'] = 'Not allowed to use numbers!';
    } else {
        return true;
    }
}

function validate_is_positive($field_value, &$field) {
    if ($field_value < 0) {
        $field['error'] = 'Įveskite teigiamą skaičių.';
    } else {
        return true;
    }
}

function validate_email($field_input, &$field){
    if (!stristr($field_input, "@") or !stristr($field_input, ".")){
        $field['error'] = 'Check email format!';
        return false;
    }else{
        return true;
    }
}

function validate_text_lenght($field_value, &$field, $params){
    
    if (strlen($field_value) >= $params['lenght']){
        $field['error'] = 'Text is too long!';
        return false;
    }else{
        return true;
    }
}
