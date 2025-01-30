<?php
const FNAME_REQUIRED = 'Voornaam Invullen';
$fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_SPECIAL_CHARS);
$inputs['fname'] = $fname;

$fname = trim($fname);
if (empty($fname)) {
    $errors['fname'] = FNAME_REQUIRED;
}

if (count($errors) === 0) {
    $result=savePurchase($inputs);
    $smartphone=getSmartphone($_GET['id']);
    if ($result===true){
        $_SESSION['message']="Je $smartphone->name is besteld!";
    } else {
        $_SESSION['message']="Je $smartphone->name niet is besteld!";
    }
    header('Location: main.php');
}