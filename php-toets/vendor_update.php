<?php

$inputs = [];
$errors = [];

$id = $_GET['id'];

$db = new PDO("mysql:host=localhost;dbname=phptoets","root", "");
$request_method = strtoupper($_SERVER['REQUEST_METHOD']);
if ($request_method === 'GET') {


    $query = $db->prepare("SELECT * FROM vendor WHERE id = :id ");
    $query->bindParam(':id', $id);
    $query->execute();

    $vendors = $query->fetchAll(PDO::FETCH_ASSOC);
    $vendor = $vendors[0];

    $inputs['name'] = $vendor['name'];
    $inputs['description'] = $vendor['description'];
    $inputs['image'] = $vendor['image'];
}

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
        var_dump($inputs);
        $query = $db->prepare("UPDATE vendor SET name = :name, description = :description, image = :image WHERE id = :id;  ");
        $query->bindParam(':name', $inputs['name']);
        $query->bindParam(':description', $inputs['description']);
        $query->bindParam(':image', $inputs['image']);
        $query->bindParam(':id', $id);
        $query->execute();

        header("Location: main.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-auto sticky-top">
                <div class="d-flex flex-sm-column flex-row flex-nowrap align-items-center sticky-top" id="nav">
                    <ul
                            class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center">
                        <li class="nav-item">
                            <a href="main.php" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip"
                               data-bs-placement="right" data-bs-original-title="Home">
                                <i class="bi-house fs-1" id="icon"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="read.php" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip"
                               data-bs-placement="right" data-bs-original-title="Dashboard">
                                <i class="bi bi-book fs-1" id="icon"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="vendor_add.php" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip"
                               data-bs-placement="right" data-bs-original-title="Orders">
                                <i class="bi bi-plus-circle fs-1" id="icon"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm p-3 min-vh-100">
                <!-- content -->
                <header>
                    <h1 class="text-center">
                        Update
                    </h1>
                </header>
                <main>
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <form method="post" action="vendor_update.php?id=<?=$id?>">
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
                                    <a class="btn btn-primary" href="main.php">Go back to your cage MONKEY!!!!</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</header>

<footer></footer>
</body>

</html>