<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
                               data-bs-placement="right" data-bs-original-title="read">
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
            </div>
        </div>
    </div>
</header>

<footer></footer>
</body>

</html>