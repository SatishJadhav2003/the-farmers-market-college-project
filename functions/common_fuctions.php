<?php

include('./includes/connect.php');

// Get all Products from database
function getPrducts()
{
    global $con;
    // getting dynamic products 
    if (!isset($_GET['category'])) {
        $select_prod = "select * from `products` order by rand() limit 0,6";
        $result_prod = mysqli_query($con, $select_prod);
        while ($row_data = mysqli_fetch_assoc($result_prod)) {
            $product_title = $row_data['product_title'];
            $product_description = $row_data['product_description'];
            $product_img1 = $row_data['product_img1'];
            $product_price = $row_data['product_price'];
            echo "<div class='col-md-4 mb-2'>
        <div class='card'><img class='card-img-top' src='./admin/product_images/$product_img1' alt='Card image cap'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <p class='card-text'> Price :- $product_price /- </p>
            <a href='#' class='btn custom-color'>Add to Cart</a>
            <a href='#' class='btn btn-secondary'>View more</a>
        </div></div>
        </div>";
        }
    }
}


// Getting Unique category data

function get_unique_categories()
{
    global $con;
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $select_prod = "select * from `products` where category_id=$category_id";
        $result_prod = mysqli_query($con, $select_prod);
        $num_of_rows = mysqli_num_rows($result_prod);
        if($num_of_rows == 0)
        {
            echo "<h2 class='text-center pl-3'>Sorry for inconvenience, <span class='text-danger'> There is No stock available for this Catgeory </span> </h2>";
        }
        while ($row_data = mysqli_fetch_assoc($result_prod)) {
            $product_title = $row_data['product_title'];
            $product_description = $row_data['product_description'];
            $product_img1 = $row_data['product_img1'];
            $product_price = $row_data['product_price'];
            echo "<div class='col-md-4 mb-2'>
        <div class='card'><img class='card-img-top' src='./admin/product_images/$product_img1' alt='Card image cap'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <p class='card-text'> Price :- $product_price /- </p>
            <a href='#' class='btn custom-color'>Add to Cart</a>
            <a href='#' class='btn btn-secondary'>View more</a>
        </div></div>
        </div>";
        }
    }
}

function getCategories()
{
    global $con;
    $select_cate = "select * from `category`";
    $result_cate = mysqli_query($con, $select_cate);

    while ($row_data = mysqli_fetch_assoc($result_cate)) {
        $cate_title = $row_data['category_title'];
        $cate_id = $row_data['category_id'];

        echo "<li class='nav-item '>
                        <a href='index.php?category=$cate_id' class='nav-link text-light'>$cate_title</a>
                    </li>";
    }
}



?>