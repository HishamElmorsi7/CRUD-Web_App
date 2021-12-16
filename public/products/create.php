<?php
require_once '../../includes/dbh.php';

$errors = [];
$title = '';
$description = '';
$price = '';
$date = date('Y-m-d');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    #For validating the form
    include_once("../../includes/partials/validate.php");

    if (empty($errors)) {
        $statement = $pdo->prepare(
            "INSERT INTO products (title, description, price, create_date) VALUES (:title, :description, :price, :date ) "
        );

        $statement->bindValue(':title', $title);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':date', $date);

        $statement->execute();
    }
}
?>

<?php include_once("../../includes/views/header.php"); ?>

<body>
    
    <p>
        <a href="index.php" class="btn btn-secondary"> Return to products</a>
    </p>

    <h1>Create new product</h1>

    <!-- form -->
    <?php include_once("../../includes/partials/form.php") ?>
</body>


</html>