<?php
$db = new PDO("mysql:host=localhost;dbname=fietsenmaker",
    "root", "");
$query = $db->prepare("select * FROM review");
$query->execute();

$classes = $query->fetchAll(PDO::FETCH_ASSOC);

const NAME_REQUIRED = 'Naam invullen';
const REVIEW_REQUIRED = 'Review invullen';
const AGREEMENT_REQUIRED = 'Voorwaarden accepteren';

$errors = [];
$inputs = [];

if (isset($_POST['send'])) {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $name = trim($name);
    if (empty($name)) {
        $errors['name'] = NAME_REQUIRED;
    } else {
        $inputs['name'] = $name;
    }

    $review = filter_input(INPUT_POST, 'review' ,FILTER_SANITIZE_SPECIAL_CHARS);
    $review = trim($review);
    if (empty($review)) {
    $errors['review'] = REVIEW_REQUIRED;
    } else {
        $inputs['review'] = $review;
    }

    $agree = filter_input( INPUT_POST,'agree', FILTER_SANITIZE_SPECIAL_CHARS);
    $agree = trim($agree);
    if (empty($agree)) {
        $errors['agree'] = AGREEMENT_REQUIRED;
    } else {
        $inputs['agree'] = $agree;
    }

    if (count($errors) === 0) {
        global $db;

        $sth = $db->prepare('INSERT INTO review (name, content) VALUES (:name, :review)');
        $sth->bindValue(':name', $inputs['name']);
        $sth->bindValue(':review', $inputs['review']);
        $result = $sth->execute();

        header('Location: master.php');
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="    https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <title>les 7</title>
</head>
<body>
<div class="container">
    <h2>review</h2>
    <form method="post" action="">
        <div class="mb-3">
            <label for="n" class="form-label">Naam</label>
            <input type="text" class="form-control" id="n" name="n"
                   value="<?php echo $inputs['name'] ?? '' ?>">
            <div class="form-text text-danger">
                <?= $errors['name'] ?? '' ?>
            </div>
            <div class="mb-3">
                <label for="b">Review</label>
                <textarea name="review" id="b" class="form-control"><?php echo $inputs['review'] ?? '' ?></textarea>
                <div class="form-text text-danger">
                    <?= $errors['review'] ?? '' ?>
                </div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="a" name="agree" value="agree"
                    <?php echo(isset($inputs['agree']) ? 'checked=checked"' : '') ?>>
                <label class="form-checker-label" for="a">accepteer voorwaarde</label>
                <div class="form-text text-danger">
                    <?= $errors['agree'] ?? '' ?>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" name="send" value="verzenden">
        </div>
    </form>
</div>
</body>
</html>
