<?php

function text_input($label='', $name='', $value='', $extra=[]) {
    $ext = ['class'=>'form-control','placeholder'=>ucwords($label)];
    if (!empty($extra)) {
        $ext = array_merge($ext, $extra);
    }
    $string = '<div class="form-group">'.
        '<label>'.ucwords($label).'</label>'.
        form_input($name, $value, $ext).
    '</div>';
    echo $string;
}

function dropdown_input($label='', $name='', $options=[], $value='', $extra=[]) {
    $ext = ['class'=>'form-control'];
    if (!empty($extra)) {
        $ext = array_merge($ext, $extra);
    }
    $string = '<div class="form-group">'.
        '<label>'.ucwords($label).'</label>'.
        form_dropdown($name, $options, $value, $ext).
    '</div>';
    echo $string;
}

function form_alert_warning() {
    $validation_errors = validation_errors();
    $extra_error = (isset($_SESSION['warning'])?$_SESSION['warning']:'');
    $error = "<div class='alert alert-warning'>";
    $check = false;

    if (!empty($validation_errors)) {
        $error .= $validation_errors;
        $check = true;
    } elseif (!empty($extra_error)) {
        $error .= "<p>".$extra_error."</p>";
        $check = true;
    }

    $error .= "</div>";
    
    if ($check) {
        echo $error;
    }
}

function form_alert_success() {
    $success = (isset($_SESSION['success'])?$_SESSION['success']:'');
    $success_string = "<div class='alert alert-success'>";
    $check = false;

    if (!empty($success)) {
        $success_string .= "<p>".$success."</p>";
        $check = true;
    }

    $success_string .= "</div>";

    if ($check) {
        echo $success_string;
    }
}