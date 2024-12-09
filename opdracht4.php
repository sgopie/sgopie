<?php
$db = new PDO("mysql:host=localhost;dbname=dierentuin",
    "root", "");
$id=$_GET['id'];
$query = $db->prepare("select * FROM dieren WHERE id=". $id);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $data){
    echo "Animal id: ". $data['id'] . "<br>";
    echo "Name: ". $data['name'] . "<br>";
    echo "Image: <img src=<?php echo 'img/vendors/'.$data['image'];?>" . $data['image'] . "<br>";
    echo "Description: ". $data['description'] . "<br>";
    echo "<br>";
}
?>
<br>
<a href="master_les4.php">Back to your cage monkey</a>