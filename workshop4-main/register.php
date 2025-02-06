<!doctype html>
<?php
require 'modules/database.php';
require 'modules/functions.php';
require 'modules/session.php';

const EMAIL_REQUIRED = 'Valid email address is required';
const PASSWORD_REQUIRED = 'Password is required';
const PASSWORDS_MATCH = 'Both passwords should match';

$inputs = [];
$errors = [];

if (isset($_POST['register'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    $repeatPassword = filter_input(INPUT_POST, 'repeat-password', FILTER_SANITIZE_SPECIAL_CHARS);

    if ($email === false) {
        $errors['email'] = EMAIL_REQUIRED;
    } else {
        $inputs['email'] = $email;
    }

    if (empty($password)) {
        $errors['password'] = PASSWORD_REQUIRED;
    } else {
        $inputs['password'] = $password;
    }

    if (empty($repeatPassword)) {
        $errors['repeatPassword'] = PASSWORD_REQUIRED;
    } else {
        $inputs['repeatPassword'] = $repeatPassword;
    }

    if($password !== $repeatPassword){
        $errors['password'] = PASSWORDS_MATCH;
        $errors['repeatPassword'] = PASSWORDS_MATCH;
    }

    if (count($errors) === 0) {
        saveUser($inputs);

        header('Location: login.php');
    }
}


?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- JavaScript -->
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>

</head>

<body>
<?php
include 'nav.php';
?>

<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center pt-3">
                <p class="fw-bold display-4">Welkom bij Parts4u</p>
            </div>
        </div>
        <div class="row">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registeren</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">

        <div class="row px-2 mt-5">
            <div class="col-md-3"></div>
            <div class="col-md-6 p-5">
                <form method="post" action="register.php">
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail"
                               value="<?php echo $inputs['email'] ?? '' ?>">
                        <div class="form-text text-danger">
                            <?php echo $errors['email'] ?? '' ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Wachtwoord</label>
                        <input type="password" name="password" class="form-control" id="inputPassword"
                               value="<?php echo $inputs['password'] ?? '' ?>">
                        <div class="form-text text-danger">
                            <?php echo $errors['password'] ?? '' ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputRepeatPassword" class="form-label">Herhaal wachtwoord</label>
                        <input type="password" name="repeat-password" class="form-control" id="inputRepeatPassword"
                               value="<?php echo $inputs['repeatPassword'] ?? '' ?>">
                        <div class="form-text text-danger">
                            <?php echo $errors['repeatPassword'] ?? '' ?>
                        </div>
                    </div>
                    <button type="submit" name="register" class="btn btn-primary">Register</button>
                </form>
            </div>
            <div class="col-md-3"></div>


        </div>
    </div>
</main>
<footer class="bg-dark">
    <div class="container-fluid text-white">
        <div class="row pb-3">
            <div class="col-md-6 mt-4 text-center">
                <ul class="list-unstyled">
                    <li class="list-group-item fw-bold">Contactgegevens</li>
                    <li class="list-group-item">Parts4u</li>
                    <li class="list-group-item">Brasserskade 1</li>
                    <li class="list-group-item">1337YZ Delft</li>
                    <li class="list-group-item">parts4u@gmail.com</li>
                    <li class="list-group-item">06- 12345678</li>
                </ul>
            </div>
            <div class="col-md-6 mt-4 text-center">
                <ul class="list-unstyled">
                    <li class="list-group-item fw-bold">Openingstijden</li>
                    <li class="list-group-item">Maandag: Gesloten</li>
                    <li class="list-group-item">Dinsdag: 16:00 - 22:00</li>
                    <li class="list-group-item">Woensdag: 16:00 - 22:00</li>
                    <li class="list-group-item">Donderdag: 16:00 - 22:00</li>
                    <li class="list-group-item">Vrijdag: 15:00 - 22:00</li>
                    <li class="list-group-item">Zaterdag: 15:00 - 22:00</li>
                    <li class="list-group-item">Zondag: Gesloten</li>
                </ul>
            </div>
        </div>
    </div>
</footer>

</body>

</html>

