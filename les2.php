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
    $price = 150;
    if ($price <= 160){
    echo "oude prijs:€$price. na verhoging van 11% is de prijs:€".($price * 1.11);
    }
    echo "<br>";
    if ($price >= 55 && $price <= 150){
        echo "oude prijs:€$price. na de verhoging van 16% is de prijs:€".($price * 1.16);
    }
    echo "<br>";
    if ($price >= 150){
        echo "oude prijs:€$price. na de verhoging van 19% is de prijs:€".($price * 1.19);
    }
    echo "<br>";
    ?>

    <?php
    $table = 9;
    echo "<h1>tafel van $table</h1>";
    ?>
    <table>
        <?php
        for($i=1;$i<=10;$i=$i+1)
        {
            echo "<tr>";
            echo "<td>$i</td>";
            echo "<td>x</td>";
            echo "<td>$table</td>";
            echo "<td>=</td>";
            echo "<td>$i*$table</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <style>
        table,tr,td{
            border: 1px solid black;
        }
    </style>
</body>
</html>