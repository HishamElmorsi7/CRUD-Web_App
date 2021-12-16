<?php

require_once '../../includes/dbh.php';

#id here is used for updating the specific product and initially set old values of the product in inputs sections

$id = $_GET['id'] ?? null;

if (!$id) {
    header('location: index.php');
    exit();
}

$statement = $pdo->prepare('SELECT * FROM products WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);

$errors = [];
$title = $product['title'];
$description = $product['description'];
$price = $product['price'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    #For validating the form
    include_once("../../includes/partials/validate.php");
  
    if (empty($errors)) {
        $statement = $pdo->prepare(
            " UPDATE products SET title = :title, description = :description, price = :price WHERE id = :id "
        );


        $statement->bindValue(':title', $title);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':id', $id);

        $statement->execute();

        header('location: index.php');
    }
}
?>

<?php include_once("../../includes/views/header.php"); ?>

<body>
    <p>
        <a href="index.php" class="btn btn-secondary"> Return to products</a>
    </p>

    <h1>Update product <b><?php echo $product['title'] ?></b></h1>

    <!-- form -->

    <?php include_once("../../includes/partials/form.php") ?>

</body>

</html>