<?php
include 'products.php';

function url(){
    return sprintf(
        "%s://%s%s",
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
        $_SERVER['SERVER_NAME'],
        $_SERVER['REQUEST_URI']
    );
}
// var_dump();
// header('location:'.basename(__FILE__).'/../product_details.php');
// exit();
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
        #header1{
            text-decoration: underline;
        }
        
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a href="/month_1/" class="navbar-brand">Twinkle</a>
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
            <h1>Product Listings</h1>
        </div>
        <div class="clearfix" style="height: 20px;"></div>
        
        <table class="table table-striped">
            <thead class="thead-dark">
                <th class="text-center">#</th>
                <th class="text-center">Product Name</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Price</th>
                <th class="text-center">Action</th>
            </thead>
            <tbody>
                <?php
                    $string = '';
                    foreach($products as $k => $v){
                        $string .= '<tr>';
                        $string .= '<td class="text-center">'.$v['id'].'</td>';
                        $string .= '<td class="text-center"><a href="'.basename(__FILE__).'/../product_details.php?id='.$v['id'].'">'.$v['product_name'].'</a></td>';
                        $string .= '<td class="text-center">'.$v['quantity'].'</td>';
                        $string .= '<td class="text-center">$'.$v['price'].'</td>';
                        // $string .= '<td class="text-center"><a href="/product_details.php?id='.$v['id'].'" class="btn btn-primary btn-sm"><i class="fa fa-eye" style="color: #fff"></i></a></td>';
                        $string .= '<td class="text-center"><a href="'.basename(__FILE__).'/../product_details.php?id='.$v['id'].'" class="btn btn-primary btn-sm"><i class="fa fa-eye" style="color: #fff"></i></a></td>';
                        $string .= '</tr>';
                    }
                    echo $string;
                ?>
                <!-- <tr>
                    <td class="text-center">1</td>
                    <td class="text-center">Stick-O</td>
                    <td class="text-center">50</td>
                    <td class="text-center">$ 50.00</td>
                    <td class="text-center"><a class="btn btn-primary btn-sm"><i class="fa fa-eye" style="color: #fff"></i></a></td>
                </tr>
                <tr>
                    <td class="text-center">2</td>
                    <td class="text-center">Judge Bubble Gum</td>
                    <td class="text-center">100</td>
                    <td class="text-center">$ 2.00</td>
                    <td class="text-center"><a class="btn btn-primary btn-sm"><i class="fa fa-eye" style="color: #fff"></i></a></td>
                </tr>
                <tr>
                    <td class="text-center">3</td>
                    <td class="text-center">Cheese-It</td>
                    <td class="text-center">60</td>
                    <td class="text-center">$ 20.00</td>
                    <td class="text-center"><a class="btn btn-primary btn-sm"><i class="fa fa-eye" style="color: #fff"></i></a></td>
                </tr> -->
            </tbody>
        </table>
    </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>