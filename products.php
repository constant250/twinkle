<?php
    include 'sql.php';
    if(isset($_GET['get_id'])){
        $q = 'SELECT * FROM products WHERE id = '.$_GET['get_id'];
    }else{
        $q = 'SELECT * FROM products';
    }

    $result = mysqli_query($conn, $q);
    $products = [];
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
    }
?>