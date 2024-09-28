<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-3">
        <h2>Update Product</h2>
        <?php flash_alert(); ?>
        <form action="<?=site_url('/product/update/' .segment(1));?>" method="POST">
            <div class="mb-3 mt-3">
            <label for="product_name">Product Name:</label>
            <input type="text" class="form-control" id="product_name" name="product_name" value="<?=$product['product_name'];?>">
            </div>
            <div class="mb-3">
            <label for="product_desc">Product Description:</label>
            <input type="text" class="form-control" id="product_desc" name="product_desc" value="<?=$product['product_desc'];?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div> 
</body>
</html>