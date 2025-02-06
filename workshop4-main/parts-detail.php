<?php
require 'modules/database.php';
require 'modules/functions.php';
require 'modules/session.php';

if(isset($_POST['add-to-cart'])){
    //haal de part-id op van het hidden input meegestuurd in de post
    $partId = filter_input(INPUT_POST, 'part-id', FILTER_SANITIZE_SPECIAL_CHARS);
    //haal de part op uit de database
    $part = getPart($partId);
    //als er in de sessie nog helemaal geen shopping-cart is, voeg hem dan toe
    if(!isset($_SESSION['shopping-cart'])){
        $_SESSION['shopping-cart'] = [];
    }
    //haal de shopping-cart op uit de sessie
    $shoppingCart = $_SESSION['shopping-cart'];
    //we gaan er altijd van uit dat het part nog niet in de winkelwagen zit
    $partExist = false;
    $existingShoppingCartProduct = null;
    //daarna loopen we over alle shoppingCartProducts
    foreach($shoppingCart as $shoppingCartProduct){
        //zit er in de winkelwagen al een part met hetzelfde id? dan bestaat hij dus al in de winkelwagen
        if($shoppingCartProduct->getPart()->id === (int)$partId){
            //we zetten exists op true want hij bestaat
            $partExist = true;
            //we onthouden ook het shoppingCartProduct
            $existingShoppingCartProduct = $shoppingCartProduct;
        }
    }
    //als hij al bestaat, hoog dan de hoeveelheid op met 1, zo niet voeg een nieuwe toe met hoeveelheid 1
    if($partExist){
        $existingShoppingCartProduct->setQuantity($existingShoppingCartProduct->getQuantity() + 1);
    } else{
        $shoppingCart[] = new ShoppingCartProduct($part, 1);
    }
    //voeg de array opnieuw toe aan de sessie zodat deze is bijgewerkt
    $_SESSION['shopping-cart'] = $shoppingCart;

    //hier kun je eventueel nog een flash message toevoegen aan de sessie om te laten weten dat het is gelukt

    //redirect de gebruiker naar parts-detail.php
    header('Location: parts-detail.php?id=' . $partId);
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Parts4u Onderdeel details</title>
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
    ?>
    <div class="container-fluid ">
        <div class="row"></div>
    </div>
</header>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center pt-3">
                <p class="fw-bold display-4">Welkom bij Parts4u</p>

            </div>

        </div>
        <?php
        $partId = $_GET['id'];
        $part = getPart($partId);
        $vendor = getVendor($part->vendorId);
        ?>
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="vendor.php">Fabrikanten</a></li>
                    <li class="breadcrumb-item"><a href="parts.php?id=<?= $part->vendorId?>"><?=$vendor['name']?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?=$part->name?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-4 d-flex align-items-stretch mt-3 mb-4">
                <div class="card w-100">
                    <div class="card-body text-center">
                        <img src="img/<?= $part->image ?>" class="card-img-top flex-grow-1 object-fit-cover">
                        <div class="card-body">
                            <h4 class="card-title"><?= $part->name ?></h4>
                            <h3 class="card-text">€<?= $part->price ?></h3>
                            <p class="card-text"><?= $part->description ?></p>
                        </div>
                        <form method="post">
                            <input type="hidden" name="part-id" value="<?=$part->id?>">
                            <button type="submit" name="add-to-cart" class="btn btn-primary">Voeg aan winkelwagen toe</button>
                        </form>
                    </div>
                </div>
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

