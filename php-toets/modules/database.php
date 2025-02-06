<?php
//change these variables to your liking
$host = '127.0.0.1';
$db   = 'parts4u';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

//connection string containing host, database name and character set
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    //use the $pdo variable as a global on your pages
    $pdo = new PDO($dsn, $user, $pass, $options);

    //uncomment these lines if you want to fetch classes, don't forget to define the classes
    include_once('classes/FilterField.php');
    include_once('classes/Criteria.php');
    include_once('classes/AbstractCriteria.php');
    include_once('classes/User.php');
    include_once('classes/Part.php');
    include_once('classes/ShoppingCartProduct.php');
    include_once('classes/VendorCriteria.php');
    include_once('classes/PartCriteria.php');

} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
