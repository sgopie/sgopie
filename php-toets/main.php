<?php

$db = new PDO("mysql:host=localhost;dbname=phptoets", "root", "");

$query = $db->prepare("SELECT * FROM vendor");
$query->execute();

$vendors = $query->fetchAll(PDO::FETCH_ASSOC);

?>
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
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link text-white" href="register.php"><h6>Register</h6></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="login.php"><h6>Login</h6></a>
                </li>
            </ul>
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
                <table class="table">
                    <thead>
                    <tr>
                        <th style="background-color: var(--columbia-blue)" scope="col">#</th>
                        <th style="background-color: var(--columbia-blue)" scope="col">Name</th>
                        <th style="background-color: var(--columbia-blue)" scope="col">Description</th>
                        <th style="background-color: var(--columbia-blue)" scope="col">Details</th>
                        <th style="background-color: var(--columbia-blue)" scope="col">Update</th>
                        <th style="background-color: var(--columbia-blue)" scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($vendors as $vendor) {
                        ?>
                        <tr>
                            <th style="background-color: var(--columbia-blue)"><?= $vendor['id'] ?></th>
                            <th style="background-color: var(--columbia-blue)"><?= $vendor['name'] ?></th>
                            <td style="background-color: var(--columbia-blue)"><?= $vendor['description'] ?></td>
                            <td style="background-color: var(--columbia-blue)"><a class="btn btn-success"
                                                                                  href="<?= "vendor_review.php?id=" . $vendor['id'] ?>">details</a>
                            </td>
                            <td style="background-color: var(--columbia-blue)"><a class="btn btn-warning"
                                                                                  href="<?= "vendor_update.php?id=" . $vendor['id'] ?>">update</a>
                            </td>
                            <td style="background-color: var(--columbia-blue)"><a class="btn btn-danger"
                                                                                  href="<?= "vendor_delete.php?id=" . $vendor['id'] ?>">delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</header>

<footer></footer>
</body>

</html>