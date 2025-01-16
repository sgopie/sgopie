<?php

$inputs = [];
$errors = [];

if(isset($_POST['submit'])){
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
    $image = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_SPECIAL_CHARS);

    $name = trim($name);
    $description = trim($description);
    $image = trim($image);

    if($name === ''){
        $errors['name'] = 'Naam niet ingevuld';
    } else{
        $inputs['name'] = $name;
    }

    if($description === ''){
        $errors['description'] = 'Description niet ingevuld';
    } else{
        $inputs['description'] = $description;
    }

    if($image === ''){
        $errors['image'] = 'Image niet ingevuld';
    } else{
        $inputs['image'] = $image;
    }

    if(count($errors) === 0){
        $db = new PDO("mysql:host=localhost;dbname=phone4you_olc","root", "");

        $query = $db->prepare("INSERT INTO vendor (name, description, image) VALUES (:name, :description, :image);  ");
        $query->bindParam(':name', $inputs['name']);
        $query->bindParam(':description', $inputs['description']);
        $query->bindParam(':image', $inputs['image']);
        $query->execute();

        header("Location: vendor_admin.php");
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SmartPhone4u Home</title>
    <link rel="stylesheet" href="css/phones.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-white fs-3" href="index_html.php">SmartPhone4u</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active fs-5 text-white" aria-current="page" href="index_html.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-secondary fs-5" href="vendor.php">Bestellen</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="login.php">inloggen</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<header>
    <div class="container-fluid py-5 "  style="background: url('img/header.png'); background-size: cover">
        <div class="row py-5"></div>
    </div>
</header>
<main>
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <form method="post" action="vendor_admin_add.php">
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="inputName" value="<?=$inputs['name'] ?? ''?>">
                        <div class="form-text text-danger">
                            <?= $errors['name'] ?? ''?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputDescription" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" id="inputDescription" value="<?=$inputs['description'] ?? ''?>">
                        <div class="form-text text-danger">
                            <?=$errors['description'] ?? ''?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputImage" class="form-label">Image</label>
                        <input type="text" class="form-control" name="image" id="inputImage" value="<?=$inputs['image'] ?? ''?>">
                        <div class="form-text text-danger">
                            <?=$errors['image'] ?? ''?>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
</main>
<footer class="bg-dark">
    <div class="container-fluid text-white">
        <div class="row pb-3">
            <div class="col-md-6 mt-4 text-center">
                <ul class="list-unstyled">
                    <li class="list-group-item fw-bold">Contactgegevens</li>
                    <li class="list-group-item">SmartPhone4u</li>
                    <li class="list-group-item">Phoenixstraat 1</li>
                    <li class="list-group-item">1111AA Delft</li>
                    <li class="list-group-item">smartphones4u@gmail.com</li>
                    <li class="list-group-item">06- 12345678</li>
                </ul>
            </div>
            <div class="col-md-6 mt-4 text-center">
                <ul class="list-unstyled">
                    <li class="list-group-item fw-bold">Openingstijden</li>
                    <li class="list-group-item">Maandag: Gesloten</li>
                    <li class="list-group-item">Dinsdag: 11:00 - 22:00</li>
                    <li class="list-group-item">Woensdag: 11:00 - 22:00</li>
                    <li class="list-group-item">Donderdag: 11:00 - 22:00</li>
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