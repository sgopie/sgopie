<?php
$db = new PDO("mysql:host=localhost;dbname=fietsenmaker",
    "root", "");
$id=$_GET['id'];
$query = $db->prepare("select * FROM fietsen WHERE id=". $id);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $data){
    echo "Artikelnummer: ". $data['id'] . "<br>";
    echo "Merk: ". $data['merk'] . "<br>";
    echo "Type: ". $data['type'] . "<br>";
    echo "Prijs EUR: ". $data['prijs'] . "<br>";
    echo "<br>";
}
?>
<br>
<a href="index.php">Back to your cage monkey</a>