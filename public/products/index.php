<?php
require_once '../../includes/dbh.php';
$search = $_POST['search']??'';

if($search){
    $statement = $pdo->prepare('SELECT * FROM products WHERE title LIKE :title');
    $statement -> bindValue(':title', "%$search%");
} else {
    $statement = $pdo->prepare('SELECT * FROM products');
}
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include_once("../../includes/views/header.php"); ?>

<body>
    <h1>Products CRUD</h1>

    <p>
        <a href="create.php" class="btn btn-success">Create Product</a>
    </p>

    <form method = 'post'>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search product" name="search" value="<?php echo $search ?>">
            <button class="btn btn-outline-secondary" type="submit">search</button>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">create date</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $i => $product) : ?>

                <tr>
                    <th scope="row"><?php echo $i + 1 ?></th>
                    <td><?php echo $product['image'] ?></td>
                    <td><?php echo $product['title'] ?></td>
                    <td><?php echo $product['price'] ?></td>
                    <td><?php echo $product['create_date'] ?></td>
                    <td>

                        <a class='btn btn-sm btn-outline-info' href="update.php?id=<?php echo $product['id'] ?>">Update</a>

                        <form style="display: inline-block;" action="delete.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                            <button type="submit" class="btn btn-sm btn-outline-danger">delete</button>
                        </form>
                    </td>
                </tr>

            <?php endforeach ?>

        </tbody>
    </table>
</body>

</html>