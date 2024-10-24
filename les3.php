<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello world example</title>
</head>
<body>
    <?php
    echo "Hello World";
    echo "<br>";
    ?>

    <?php
    $text = 'Hello World Again'; //string
    $age = 17; //integer
    $price = 99.99; //float
    $check = true; //boolean
    echo "<br>";
    echo "deze tekst lees je opnieuw: $text <br>";
    ?>

    <?php
//    normal array
    echo "<br>";
    $cars = array('Lamborghini','Bugatti','Mercedes','Toyota','Porsche');
    print_r($cars);
    echo "<br>";
    echo "<br>";
    print_r($cars[0]);
    echo "<br>";
    print_r($cars[1]);
    echo "<br>";
    print_r($cars[2]);
    echo "<br>";
    print_r($cars[3]);
    echo "<br>";
    print_r($cars[4]);
    echo "<br>";
    echo "Mijn fav car is: $cars[4]";
    echo "<br>";
    echo "<br>";
//    array with loop
    $arrlength = count($cars);
    for ($x = 0; $x < $arrlength; $x++){
        echo $cars[$x];
        echo "<br>";
    }
    ?>

    <?php
    $ages = array(
            'Peter' => 35,
            'Ben' => 37,
            'Klaas' => 26,
    );
    print_r($ages);
    echo "<br>";
    echo 'de leeftijd van ben is ' .$ages['Ben']. ' jaar';
    ?>
</body>
</html>