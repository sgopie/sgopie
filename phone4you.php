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
            <div class="col-md-12 text-center pt-3">
                <p class="fw-bold display-4">Toon hier Goedemiddag, goedemorgen of goedenavond</p>
                <p class="fs-4">Wij zijn gespecialiseerd in in telefoons van Samsung en Apple</p>
                <p class="fs-4 fst-italic">De betekenis van dit Engelse woord SmartPhone is 'slimme telefoon'. Het is een mobiele telefoon met extra functies. </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center pt-2">
                <p class="fw-bold fs-4">
                <h2>Vandaag, laat de huidige datum zien</h2>
                <h2>Bepaal hier of de winkel open of dicht is</h2>
                </p>
            </div>
        </div>
    </div>
    <div class="container mb-4">
        <div class="row">
            <div class="col-md-6 mt-3">
                <div class="card w-100">
                    <a href="vendor.php"><img src="img/home1.png" class="card-img-top" style="object-fit: cover; height: 24rem"></a>
                    <div class="card-body">
                        <a class="card-link text-dark text-decoration-none" href="vendor.php">Bestel bij ons je nieuwe smartphone</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="card w-100">
                    <a href="vendor.php"><img src="img/home2.png" class="card-img-top" style="object-fit: cover; height: 24rem"></a>
                    <div class="card-body">
                        <a class="card-link text-dark text-decoration-none" href="vendor.php">Keuze uit verschillende soorten smartphones</a>
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
    <style>
        input, textarea{
            background-color:white;
            color: black;
        }
    </style>
</footer>
</body>
</html>
