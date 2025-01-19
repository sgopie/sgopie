<?php
$errors = [];
$inputs = [];

$request_method = strtoupper($_SERVER["REQUEST_METHOD"]);

if ($request_method == "GET") {
    //show form
    require 'showOrderForm.php';
} elseif ($request_method === "POST") {
    //handle form submission
    require 'handleFormOrder,php';
    if (count($errors) > 0) {
        //show form if error exists
        require 'showOrderForm.php';
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="    https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <title>les 7</title>
</head>
<body>
<form method="post">
    <div class="mb-3 mt-4">
        <label for="fname" class="form-label">Voornaam:</label>
        <input type="text" class="form-control" id="fname" value="<?php echo $inputs['fname'] ?? '' ?>" name="fname">
        <div class="form-text text-danger">
            <?= $errors['fname'] ?? '' ?>
        </div>
    </div>
</form>
</body>
</html>
