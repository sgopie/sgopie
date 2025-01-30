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
        $db = new PDO("mysql:host=localhost;dbname=phptoets","root", "");

        $query = $db->prepare("INSERT INTO vendor (name, description, image) VALUES (:name, :description, :image);  ");
        $query->bindParam(':name', $inputs['name']);
        $query->bindParam(':description', $inputs['description']);
        $query->bindParam(':image', $inputs['image']);
        $query->execute();

        header("Location: main.php");
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
    <title>add</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <form method="post" action="vendor_add.php">
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
</body>
</html>