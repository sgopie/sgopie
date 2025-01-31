<?php

$db = new PDO("mysql:host=localhost;dbname=phptoets","root", "");

$query = $db->prepare("SELECT * FROM vendor");
$query->execute();

$vendors = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>main</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<main>
    <div class="container-fluid">

        <div class="row">
            <?php

            foreach ($vendors as $vendor){
                ?>
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="<?= 'img/vendors/'.$vendor['image']?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $vendor['name'];?></h5>
                            <p class="card-text"><?php echo $vendor['description'];?></p>
                            <a class="btn btn-success" href="<?= "vendor_review.php?id=" . $vendor['id']?>">Review</a>
                            <a class="btn btn-warning" href="<?= "vendor_update.php?id=" . $vendor['id']?>">Update</a>
                            <a class="btn btn-danger" href="<?= "vendor_delete.php?id=" . $vendor['id']?>">Delete</a>

                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <a href="vendor_add.php" class="btn btn-primary">Add</a>
</main>
</body>
</html>