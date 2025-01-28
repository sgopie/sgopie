<?php
$db = new PDO("mysql:host=localhost;dbname=fietsenmaker",
    "root", "");
$query = $db->prepare("select * FROM fietsen");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $data){
    echo "<a href='les4.php?id=" . $data['id'] . "'>";
    echo $data['merk'] . " " . $data['type'];
    echo "</a>";
    echo "<br>";
}
?>