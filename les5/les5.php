<?php
$db = new PDO("mysql:host=localhost;dbname=school",
    "root", "");
$query = $db->prepare("select * FROM classes");
$query->execute();

$classes = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<table>
    <tr>
        <th>Naam</th>
        <th>Mentor</th>
        <th>Leerlingen</th>
    </tr>
    <?php
    foreach ($classes as $class) {
        echo "<tr>";
        echo "<td>" . $class['name'] . "</td>";
        echo "<td>" . $class['mentor'] . "</td>";
        echo "<td><a href='leerlingen.php?id=" . $class['id']. "'>";
        echo "Leerlingen</a>";
        echo "</tr>";
    }
    ?>
</table>
<style>
    table,tr,th, td{
        border: 1px solid black;
    }
</style>
