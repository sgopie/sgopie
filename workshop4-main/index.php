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
    <title>Parts4u Home</title>
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
        <div class="container-fluid">
            <div class="row"></div>
        </div>
    </header>
    <main>
        <div class="container-fluid">
            <div class="row">
                <?php if(!empty($_SESSION['message'])): ?>
                    <div class="alert alert-success" role="alert">
                        <?=$_SESSION['message']?>
                        <?php $_SESSION['message']=null;?>
                    </div>
                <?php endif;?>
            </div>
            <div class="row">
                <div class="col-md-12 text-center pt-3">
                    <p class="fw-bold display-4"><?php
                        $currentTime = date('H:i');
                        switch ($currentTime){
                            case date("H") >= "6" && date("H") < "12": echo "Goedemorgen, welkom bij Parts4u";
                            break;
                            case date("H") >= "12" && date("H") < "18": echo "Goedemiddag, welkom bij Parts4u";
                            break;
                            case  date("H") >= "18" && date("H") < "24": echo "Goede avond, welkom bij Parts4u";
                            break;
                            default: echo "Goedenacht, welkom bij Parts4u";
                        }
                        ?></p>
                    <p class="fs-4">Wij zijn gespecialiseerd in computer onderdelen.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center pt-2">
                    <p class="fw-bold fs-4">
                        <?php
                        setlocale(LC_ALL, 'dutch');

                        echo "Vandaag " . strftime("%A %e %B %Y <br>");
                        $open_to = "";
                        $open_from = "";
                        $weekday = date('l');

                        if ($weekday == "Friday" || $weekday == "Saturday") {
                            $open_from = "15:00";
                            $open_to = "22:00";
                        } else {
                            $open_from = "16:00";
                            $open_to = "22:00";
                        }

                        if (date("H:i") < $open_from || date("H:i") > $open_to || $weekday == "Monday" || $weekday == "Sunday") {
                            echo "We zijn momenteel gesloten!";
                        } else {echo "Bezorgtijd vanaf nu: " . date('H:i', strtotime('5 hour'));}
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="container mb-4">
            <div class="row">
                <div class="col-md-6 d-flex align-items-stretch mt-3">
                    <div class="card w-100">
                        <img src="img/parts4u.png" class="card-img-top flex-grow-1 object-fit-cover" height="500">
                        <div class="card-body">
                            <a class="card-link text-dark stretched-link text-decoration-none" href="vendor.php">Bestel bij ons je nieuwe onderdelen</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-stretch mt-3">
                    <div class="card w-100">
                        <img src="img/customer.jpg" class="card-img-top flex-grow-1 object-fit-cover" height="500">
                        <div class="card-body">
                            <a class="card-link text-dark stretched-link text-decoration-none" href="vendor.php">Keuze uit verschillende soorten onderdelen</a>
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