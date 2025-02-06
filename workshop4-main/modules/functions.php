<?php

//in dit bestand kun je alle (database) functies opnemen die je nodig hebt en dan gebruiken op verschillende pagina's


//getVendors is een beginnetje, implementeer hier de logica om vendors op te halen uit je vendor tabel
function getVendors():array
{
    global $pdo;
    //we maken een query en voeren deze direct uit
    $query = $pdo->query('SELECT * FROM vendor');
    //we gebruiken fetchAll om alles terug te geven uit de functie in de vorm van een associatieve array (FETCH_ASSOC)
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getVendor(?int $vendorId)
{
    global $pdo;
    //we maken een query en voeren deze direct uit
    $query = $pdo->prepare('SELECT * FROM vendor WHERE id = :vendorId');
    //met bindparam voegen we de vendorId toe als parameter aan de query (is veilig tegen SQL injection)
    $query->bindParam('vendorId', $vendorId);
    //nu de parameter met binding in de query is gezet, voeren we de query ook echt uit
    $query->execute();
    //we gebruiken fetch om 1 row terug te geven uit de functie in de vorm van een associatieve array (FETCH_ASSOC)
    return $query->fetch(PDO::FETCH_ASSOC);
}

function getParts(?int $vendorId):array
{
    global $pdo;
    //we maken een query maar voeren deze nog niet uit
    $query = $pdo->prepare('SELECT * FROM part WHERE vendor_id= :vendorId ');
    //met bindparam voegen we de vendorId toe als parameter aan de query (is veilig tegen SQL injection)
    $query->bindParam('vendorId', $vendorId);
    //nu de parameter met binding in de query is gezet, voeren we de query ook echt uit
    $query->execute();
    //we gebruiken fetchAll om alles terug te geven uit de functie in de vorm van een associatieve array (FETCH_ASSOC)
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getPart(?int $partId):object
{
    global $pdo;
    $query = $pdo->prepare('SELECT id, name, description, image, price, vendor_id AS vendorId FROM part WHERE id = :partId LIMIT 1');
    $query->bindParam('partId', $partId);
    $query->execute();
    //we gebruiken fetchAll om alle rows terug te geven uit de functie in de vorm van een class (FETCH_CLASS)
    $parts = $query->fetchAll(PDO::FETCH_CLASS, 'Part');
    //omdat we er maar 1 selecteren geven we alleen het eerste element terug
    return $parts[0];
}
function getUser($email)
{
    global $pdo;
    $query = $pdo->prepare('SELECT id, email, password, role FROM user WHERE email = :email LIMIT 1');
    $query->bindParam('email', $email);
    $query->execute();
    $users = $query->fetchAll(PDO::FETCH_CLASS, 'User');
    $user = null;
    if(count($users) > 0) {
        $user = $users[0];
    }
    return $user;
}

function saveUser(array $inputs):bool
{
    global $pdo;
    $role = 'member';
    $hashedPassword = password_hash($inputs['password'], PASSWORD_DEFAULT);

    $query = $pdo->prepare('INSERT INTO user (email,password,role) VALUES (:email,:password,:role)');
    $query->bindParam(':email', $inputs['email']);
    $query->bindParam(':password', $hashedPassword);
    $query->bindParam(':role',$role);

    return $query->execute();
}

function savePurchase(array $cartItems)
{
    global $pdo;
    //zet de status naar besteld
    $status = 'Besteld';
    //haal de user id op uit de sessie
    $userId = $_SESSION['user']->id;
    //bereken de totaalprijs
    $totalPrice = 0;
    foreach ($cartItems as $shoppingCartProduct) {
        $totalPrice = $totalPrice + $shoppingCartProduct->getPrice();
    }

    //voeg het bestelling record toe aan de tabel
    $query = $pdo->prepare('INSERT INTO purchase (status,user_id,total_price) VALUES (:status,:user_id,:total_price)');
    $query->bindParam(':status', $status);
    $query->bindParam(':user_id', $userId);
    $query->bindParam(':total_price',$totalPrice);
    $query->execute();
    //haal de laatst toegevoegde id op zodat we die kunnen gebruiken bij het toevoegen van de purchase_part records
    $purchaseId = $pdo->lastInsertId();

    //voor elk shoppingCartProduct in de winkelwagen
    foreach ($cartItems as $shoppingCartProduct) {
        //we hebben het part id en de quantity nodig
        $partId = $shoppingCartProduct->getPart()->id;
        $quantity = $shoppingCartProduct->getQuantity();
        //voeg het purchase_part record toe aan de tabel
        $query = $pdo->prepare('INSERT INTO purchase_part (part_id,purchase_id,quantity) VALUES (:part_id,:purchase_id,:quantity)');
        $query->bindParam(':part_id', $partId);
        $query->bindParam(':purchase_id', $purchaseId);
        $query->bindParam(':quantity',$quantity);
        $query->execute();
    }
}

function findByCriteria(Criteria $criteria):array
{
    global $pdo;
    $queryString = $criteria->buildQuery();
    $query = $pdo->prepare($queryString);
    foreach ($criteria->getFilterFields() as $filterField) {
        $columnName = $filterField->getColumnName();
        $value = $filterField->getValue();
        $query->bindValue($columnName, $value);
    }
    $query->execute();
    $fromJoins = $criteria->getFromJoins();
    if(!isset($fromJoins)) {
        return $query->fetchAll(PDO::FETCH_CLASS, ucwords($criteria->getTable()));
    } else{
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
