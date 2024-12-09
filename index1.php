<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>my first PHP page</h1>
    <?php
    echo "Hello World!";
    ?>

    <?php
        $title = 'php is awesome';
    ?>
    <h1><?php echo $title ?></h1>
    <h1></h1><?= $title;?></h1>
    <br>

<!--    --><?php
//    $title = 'php is awesome!';
//    require 'index.view.php';
//    echo "<br>";
//    ?>

    <?php
    const sales_tax = 0.085;
    $gross_price = 100;
    $net_price = $gross_price * (1 + sales_tax);
    echo $net_price;
    echo "<br>";
    ?>

    <?php
    $balance = 100;
    var_dump($balance);
    echo "<br>";
    ?>

    <?php
    $devices=['Mouse','Keyboard','Laptop'];
    var_dump($devices);
    echo "<pre>";
    var_dump($devices);
    echo "</pre>";
    echo "<br>";
    ?>

    <?php
    date_default_timezone_set("Europe/Amsterdam");
    $today = date("D d F Y");
    echo $today;
    echo "<br>";
    ?>

    <?php
    date_default_timezone_set("Europe/Amsterdam");
    $today = date("D d");
    echo "vnd is het: $today";
    echo "<br>";
    $time = date("H:i");
    echo "het is nu: $time uur";
    echo "<br>";
    $month = date("F");
    $daysInMonth = date("t");
    echo "deze maand, $month heeft $daysInMonth dagen";
    echo "<br>";
    $week = date("W");
    echo "Deze week is het week $week";
    $year = date("Y");
    echo "<br>";
    echo  "het is in $year geen schrikkeljaar";
    echo "<br>";
    ?>
</body>
</html>