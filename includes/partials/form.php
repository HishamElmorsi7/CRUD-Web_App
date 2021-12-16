<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger" role="alert">
        <?php foreach ($errors as $error) : ?>

            <div><?php echo $error ?></div>

        <?php endforeach ?>
    </div>
<?php endif ?>


<form method="post">
    <div class="mb-3">
        <label class="form-label">Product Image</label>
        <br> <br>
        <input name="image" type="file">
    </div>
    <div class="mb-3">
        <label class="form-label">Product title</label>
        <input type="text" name="title" class="form-control" value="<?php echo $title ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Product description</label>
        <textarea class="form-control" name="description">  <?php echo $description ?> </textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Product price</label>
        <input type="number" name=price step=".01" class="form-control" value="<?php echo $price ?>">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>