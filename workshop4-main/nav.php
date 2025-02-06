<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-white fs-3" href="index.php">Parts4u</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active fs-5 text-white" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-secondary fs-5" href="vendor.php">Fabrikanten</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <?php
                if (!isset($_SESSION['user'])) {

                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Registeren</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Inloggen</a>
                    </li>
                    <?php
                } else{
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Uitloggen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php"><?=$_SESSION['user']->email ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="shopping-cart.php"><i class="bi bi-cart"></i>
                            <?php
                            if(!empty($_SESSION['shopping-cart'])){
                                ?>
                                <span class="badge bg-danger text-white"><?=count($_SESSION['shopping-cart'])?></span>
                                <?php
                            }
                            ?>

                        </a>

                    </li>

                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>