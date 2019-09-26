<?php
    include 'main.php';
    include 'sql.php';
    include 'products.php';

    if (!isset($products[0])) {
        echo 'Product is not available';
        exit();
    }

    $q = "DELETE FROM products WHERE id=".$product[0]['id'];

    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Product was successfully deleted!';
        header('Location: ourProducts.php');
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

?>