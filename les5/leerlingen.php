<?php
$db = new PDO("mysql:host=localhost;dbname=school",
    "root", "");
$query = $db->prepare("select * FROM leerlingen WHERE class_id=". $_GET['id']);
$query->execute();
$leerlingen = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<table>
    <tr>
        <th>Voornaam</th>
        <th>tussenvoegsel</th>
        <th>achternaam</th>
    </tr>
    <?php
    foreach ($leerlingen as $leerling) {
        echo "<tr>";
        echo "<td>".$leerling['firstname']."</td>";
        echo "<td>".$leerling['infix']."</td>";
        echo "<td>".$leerling['lastname']."</td>";
        echo "</tr>";
    }
    ?>
</table>
<br>
<a href="les5.php">Go back to class page</a>
<style>
    table,tr,th,td{
        border: 1px solid black;
    }
</style>
