<?php
include_once 'main.php';
include 'products.php';

if (!isset($products[0])) {
    echo 'Product is not available';
    exit();
}

if (isset($_POST['submit'])) {
    $validate = 0;
    foreach ($_POST as $key => $value) {
        // print_r($key. '<br>');
        if ($key != 'submit' && in_array($value, ['', null])) {
            $validate = 1;
        }
    }
    // echo $validate;
    if ($validate == 0 ) {

        if($_FILES['img']['name'] != ''){
            // file upload validation
            $target_dir = "img/";
            $target_file = $target_dir . basename($_FILES["img"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["img"]["tmp_name"]);
                if ($check !== false) {
                    // echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    $error = "File is not an image.";
                    $uploadOk = 0;
                }
            }
            // Allow certain file formats
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk != 0) {
                if (!move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                    $error = "Sorry, there was an error uploading your file.";
                }
            }
        // end fileupload validation
        }
        

        if (!isset($error)) {
            include 'sql.php';
            $_POST['description'] = addslashes($_POST['description']);
            if(isset($uploadOk) && $uploadOk == 1){
                $img = ", img = '". $_FILES['img']['name']. "'";
            }else{
                $img = '';
            }
            $q = "UPDATE products SET product_code = '{$_POST['product_code']}', product_name = '{$_POST['product_name']}', quantity = '{$_POST['quantity']}', price = '{$_POST['price']}', description = '{$_POST['description']}' {$img} WHERE id = ".$_GET['get_id'];

            // echo $q;
            // exit();

            if (mysqli_query($conn, $q)) {
                $_SESSION['success'] = 'Product was successfully updated!';
                header('Location: ourProducts.php');
            } else {
                $error = "Error: Data cannot be saved. please contact administrator";
            }
        }
    } else {
        $error = 'All inputs are required...';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Listings</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <style>
        #header1 {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a href="#" class="navbar-brand">Twinkle</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">PRODUCTS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">CONTACT</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li> -->
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="clearfix" style="height: 20px;"></div>
        <div class="page-header">
            <a href="<?php echo basename(__FILE__) . '/../ourProducts.php' ?>" class="btn btn-danger"><i class="fa fa-chevron-left"></i> Go Back</a>
        </div>
        <div class="clearfix" style="height: 20px;"></div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h3 class="black"><u>Edit Product</u></h3>
                <div class="clearfix" style="height: 20px;"></div>
                <?php
                if (isset($error)) {
                    echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                }
                ?>
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="productCode">Product Code</label>
                                <input type="text" name="product_code" value="<?php echo isset($_POST['product_code']) ? $_POST['product_code'] : $products[0]['product_code']; ?>" class="form-control" id="productCode" placeholder="Code">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="productName">Product Name</label>
                                <input type="text" name="product_name" value="<?php echo isset($_POST['product_name']) ? $_POST['product_name'] : $products[0]['product_name']; ?>" class="form-control" id="productName" placeholder="Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" class="form-control" id="quantity" value="<?php echo isset($_POST['quantity']) ? $_POST['quantity'] : $products[0]['quantity']; ?>" placeholder="Quantity">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" name="price" class="form-control" id="price" value="<?php echo isset($_POST['price']) ? $_POST['price'] : $products[0]['price']; ?>" placeholder="Price">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantity">Image</label>
                                <input type="file" name="img" class="" id="img">
                            </div>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="description" cols="20" rows="10" style="height:80px"><?php echo isset($_POST['description']) ? $_POST['description'] : stripcslashes($products[0]['description']); ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button name="submit" type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>

    </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<?php
session_destroy();
?>