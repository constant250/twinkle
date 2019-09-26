<?php
include 'main.php';
include 'products.php';
$detail = null;
foreach ($products as $k => $v) {
    if ($_GET['id'] == $v['id']) {
        $detail = $v;
    }
}
if ($detail == null) {
    echo "No product details avalable...";
    exit();
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
            <!-- <div class="col-md-3"></div> -->
            <div class="col-md-6">
                <img src="<?php echo basename(__FILE__) . '/../img/' . $detail['img'] ?>" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="col-md-6">
                <div class="row details">
                    <div class="col-md-3 width"><b>Code:</b></div>
                    <div class="col-md-9 width"><?php echo $detail['product_code'] ?></div>
                    <div class="clearfix"></div>
                    <div class="col-md-3 width"><b>Name:</b></div>
                    <div class="col-md-9 width"><?php echo $detail['product_name'] ?></div>
                    <div class="clearfix"></div>
                    <div class="col-md-3 width"><b>Quantity:</b></div>
                    <div class="col-md-9 width"><?php echo $detail['quantity'] ?></div>
                    <div class="clearfix"></div>
                    <div class="col-md-3 width"><b>Price:</b></div>
                    <div class="col-md-9 width">$ <?php echo number_format($detail['price'], 2); ?></div>
                    <div class="clearfix"></div>
                    <div class="col-md-3 width"><b>Description:</b></div>
                    <div class="col-md-12 width"><?php echo stripcslashes ($detail['description']) ?></div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>