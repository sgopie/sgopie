<!doctype html>
<?php
require 'modules/database.php';
require 'modules/functions.php';
require 'modules/session.php';
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Winkelwagen</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <!-- JavaScript -->
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>

</head>

<body>
<?php
include 'nav.php';

if(isset($_POST['place-order'])){
    //is er een shopping cart aanwezig in de sessie
    if(isset($_SESSION['shopping-cart'])) {
        //haal dan de inhoud op van de winkelwagen
        $cartItems = $_SESSION['shopping-cart'];

        //geef de winkelwagen mee aan de savePurchase() functie
        savePurchase($cartItems);
        //gooi de winkelwagen leeg
        $_SESSION['shopping-cart'] = [];

        //redirect de user terug naar de shopping cart pagina.
        header('Location: shopping-cart.php');
        exit();
    }
}
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
                <li class="breadcrumb-item active" aria-current="page">Winkelwagen</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">

        </div>
        <?php
        if(!empty($_SESSION['shopping-cart'])){
            ?>
            <div class="row px-2">
                <div class="col-md-12">
                    <table class="table table-primary table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Naam</th>
                            <th scope="col">Aantal</th>
                            <th scope="col">Prijs per stuk</th>
                            <th scope="col">Prijs</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $totalPrice = 0;
                        $cartItems = $_SESSION['shopping-cart'];
                        foreach ($cartItems as $shoppingCartProduct) {
                            $totalPrice = $totalPrice + $shoppingCartProduct->getPrice();
                            ?>
                            <tr>
                                <td><?= $shoppingCartProduct->getPart()->id ?></td>
                                <td><?= $shoppingCartProduct->getPart()->name ?></td>
                                <td><?= $shoppingCartProduct->getQuantity() ?></td>
                                <td><?= number_format($shoppingCartProduct->getPart()->price, 2) ?></td>
                                <td><?= number_format($shoppingCartProduct->getPrice(), 2) ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tr>
                            <td colspan="3"></td>
                            <td class="fw-bold">Total price:</td>
                            <td><?=number_format($totalPrice, 2)?></td>
                        </tr>
                        </tbody>

                    </table>



                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post">
                                <button type="submit" name="place-order" class="btn btn-primary">Plaats bestelling</button>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
            <?php
        }
        else{
            ?>
            <div class="row mt-1">
                <div class="alert alert-warning" role="alert">
                    Winkelwagen is leeg.
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