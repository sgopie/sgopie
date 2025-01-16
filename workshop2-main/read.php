<?php
include_once 'modules/database.php';

global $db;
$query = $db->prepare("select * FROM smartphone");
$query->execute();
$smartphones = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<div class="container text-center">
    <div class="row">
        <?php foreach ($smartphones as $smartphone): ?>
    <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <img src="<?=$smartphone['image'];?>">
            <div class="card-body">
                <h5 class="card-title"><?=$smartphone['name'];?></h5>
                <button class="btn btn-warning">Update</button>
                <button class="btn btn-danger">Delete</button>
            </div>
            <button class="btn btn-primary"><a class="text-white text-decoration-none" href="insert.php">Insert</a></button>
        </div>
    </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>