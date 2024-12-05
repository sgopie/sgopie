<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
$db = new PDO("mysql:host=localhost;dbname=fietsenmaker",
    "root", "");
$query = $db->prepare("select * FROM fietsen ");
//$query->bindParam(":id", $id);
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

</body>
</html>
