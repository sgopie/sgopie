<?php
require 'modules/database.php';
require 'modules/functions.php';
require 'modules/session.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Parts4u Fabrikanten</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
</head>
<body>
<header>
    <?php
    include 'nav.php';
    $vendorCriteria = new VendorCriteria('vendor', 'id');
    //zoeken
    if(isset($_POST['search'])){
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
        if(isset($name)) {
            $vendorCriteria->setName($name);
        }
        if(isset($description)) {
            $vendorCriteria->setDescription($description);
        }
    }
    //sorteren op id
    if(isset($_POST['order-vendor-id'])){
        $ordering = filter_input(INPUT_POST, 'ordering', FILTER_SANITIZE_SPECIAL_CHARS);
        $vendorCriteria->setOrdering($ordering === 'ASC' ? 'DESC' : 'ASC');
        $vendorCriteria->setOrderField('id');
    }
    //sorteren op naam
    if(isset($_POST['order-vendor-name'])){
        $ordering = filter_input(INPUT_POST, 'ordering', FILTER_SANITIZE_SPECIAL_CHARS);
        $vendorCriteria->setOrdering($ordering === 'ASC' ? 'DESC' : 'ASC');
        $vendorCriteria->setOrderField('name');
    }

    $vendorCriteria->setFromJoins('vendor');
    $vendors = findByCriteria($vendorCriteria);

    ?>
    <div class="container-fluid">
        <div class="row"></div>
    </div>
</header>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center pt-3">
                <p class="fw-bold display-4">Welkom bij Parts4u</p>
                <p class="fs-4">Selecteer een merk</p>

            </div>

        </div>
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="vendor.php">Fabrikanten</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>Zoeken</h2>
                <form method="post">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="inputName" class="form-label">Naam</label>
                            <input type="text" name="name" class="form-control" id="inputName" value="<?=$vendorCriteria->getName() ?? ""?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputDescription" class="form-label">Beschrijving</label>
                            <input type="text" name="description" class="form-control" id="inputDescription" value="<?=$vendorCriteria->getDescription() ?? ""?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <button class="btn btn-primary" type="submit" name="search">Zoeken</button>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>Sorteren</h2>
                <form method="post">
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <input type="hidden" name="ordering" value="<?=$vendorCriteria->getOrdering()?>">
                            <button class="btn btn-primary" type="submit" name="order-vendor-id">Sort by id<i class="bi bi-arrow-down-up"></i></button>
                        </div>
                        <div class="col-md-2 mb-3">
                            <input type="hidden" name="ordering" value="<?=$vendorCriteria->getOrdering()?>">
                            <button class="btn btn-primary" type="submit" name="order-vendor-name">Sort by name<i class="bi bi-arrow-down-up"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <!-- Dit is een dummy card die je kunt gebruiken in je php code waar je alle fabrikanten weergeeft-->

            <?php

            foreach ($vendors as $vendor) {
            ?>
                <!-- hieronder komen de fabrikanten -->
                <div class="col-md-3 d-flex align-items-stretch mt-3 mb-4">
                    <div class="card w-100">
                        <div class="card-body text-center">
                            <img src="img/<?= $vendor['image'] ?>" class="card-img-top flex-grow-1 object-fit-cover">
                            <div class="card-body">
                                <h4 class="card-title"><?= $vendor['name'] ?></h4>
                            </div>
                            <a href="parts.php?id=<?= $vendor['id'] ?>"
                               class="card-link text-dark stretched-link text-decoration-none"><?= $vendor['description'] ?></a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
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
