<?php
include_once 'modules/database.php';

$errorName="";
$errorFileUpload = "";

// Check if submit is pressed
if(isset($_POST["submit"])) {

    $name=filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
    if(empty($name)) {
        $errorName="Naam invullen";
    }
    //Check if file is selected
    if(!empty($_FILES["image"]["name"])){

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check === false) {
            $errorFileUpload.="File is not an image.";
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $errorFileUpload.= "Sorry, file already exists.";
        }
        // Check file size
        if ($_FILES["image"]["size"] > 1400000) {
            $errorFileUpload.="Sorry, your file is too large.";
        }
        // Allow certain file formats
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            $errorFileUpload .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }

        if (empty($errorFileUpload) && empty($errorName))  {

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
                $query = $db->prepare('INSERT INTO smartphone (name,image) VALUES(:name,:image)');
                $query->bindParam(':name', $_POST['name']);
                $query->bindParam(':image', $target_file);
                $query->execute();

                header("Location: read.php");

            } else {
                $errorFileUpload .= "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        $errorFileUpload.="Select an image.";
    }
}
?>



<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Fileupload</title>
</head>
<body>
<div class="container">
    <h2>Smartphone</h2>
    <form enctype="multipart/form-data" action="" method="post">
        <div class="mb-3">
            <label class="form-label">Product name</label>
            <input type="text" class="form-control" name="name" value="<?=$name ?? ''?>">
            <div class=" text-danger"><?=$errorName?></div>
        </div>+
        <div class="mb-3">
            <label class="form-label">Kies afbeelding van telefoon</label>
            <input class="form-control" name="image" type="file" >
            <div class=" text-danger"><?=$errorFileUpload?><br></div>
        </div>
        <input type="submit" name="submit" value="add" class="btn btn-primary">
    </form>
</div>
</body>
</html>