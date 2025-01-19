<?php
$errors = [];
$inputs = [];

$request_method = strtoupper($_SERVER["REQUEST_METHOD"]);

if ($request_method == "GET") {
    //show form
    require 'showOrderForm.php';
} elseif ($request_method === "POST") {
    //handle form submission
    require 'handleOrderForm.php';
    if (count($errors) > 0) {
        //show form if error exists
        require 'showOrderForm.php';
    }
}
?>