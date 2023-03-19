<?php

include('./includes/connect.php');

// Get Products from database
function getPrducts()
{
    global $con;
    // getting dynamic products 
    if (!isset($_GET['category'])) {
        $select_prod = "select * from `products` order by rand() limit 0,6";
        $result_prod = mysqli_query($con, $select_prod);
        while ($row_data = mysqli_fetch_assoc($result_prod)) {
            $product_title = ucfirst($row_data['product_title']);
            $product_id = $row_data['product_id'];
            $product_description = ucfirst($row_data['product_description']);
            $product_img1 = $row_data['product_img1'];
            $product_price = $row_data['product_price'];
            echo "<div class='col-md-4 mb-2'>
        <div class='card'><img class='card-img-top' src='./admin/product_images/$product_img1' alt='Card image cap'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <p class='card-text'> Price :- $product_price /- </p>
            <a href='index.php?add_to_cart=$product_id' class='btn custom-color'>Add to Cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
        </div></div>
        </div>";
        }
    }
}

// Get All Products from database
function get_all_prducts()
{
    global $con;
    // getting dynamic products 
    if (!isset($_GET['category'])) {
        $select_prod = "select * from `products` order by rand()";
        $result_prod = mysqli_query($con, $select_prod);
        while ($row_data = mysqli_fetch_assoc($result_prod)) {

            //ucfirst() is for capitalise first letter
            $product_title = ucfirst($row_data['product_title']);
            $product_id = $row_data['product_id'];
            $product_description = ucfirst($row_data['product_description']);
            $product_img1 = $row_data['product_img1'];
            $product_price = $row_data['product_price'];
            echo "<div class='col-md-4 mb-2'>
        <div class='card'><img class='card-img-top' src='./admin/product_images/$product_img1' alt='Card image cap'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <p class='card-text'> Price :- $product_price /- </p>
            <a href='index.php?add_to_cart=$product_id' class='btn custom-color'>Add to Cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
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
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center pl-3'>Sorry for inconvenience, <span class='text-danger'> There is No stock available for this Catgeory </span> </h2>";
        }
        while ($row_data = mysqli_fetch_assoc($result_prod)) {
            $product_title = ucfirst($row_data['product_title']);
            $product_id = $row_data['product_id'];
            $product_description = ucfirst($row_data['product_description']);
            $product_img1 = $row_data['product_img1'];
            $product_price = $row_data['product_price'];
            echo "<div class='col-md-4 mb-2'>
        <div class='card'><img class='card-img-top' src='./admin/product_images/$product_img1' alt='Card image cap'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <p class='card-text'> Price :- $product_price /- </p>
            <a href='index.php?add_to_cart=$product_id' class='btn custom-color'>Add to Cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
        </div></div>
        </div>";
        }
    }
}


// Getting categories
function getCategories()
{
    global $con;
    $select_cate = "select * from `category`";
    $result_cate = mysqli_query($con, $select_cate);

    while ($row_data = mysqli_fetch_assoc($result_cate)) {
        $cate_title = ucfirst($row_data['category_title']);
        $cate_id = $row_data['category_id'];

        echo "<li class='nav-item '>
                        <a href='index.php?category=$cate_id' class='nav-link text-light'>$cate_title</a>
                    </li>";
    }
}


// Searching products

function search_product()
{
    global $con;
    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $search_query = "select * from `products` where product_keywords like '%$search_data_value%' or product_title like '%$search_data_value%' ";
        $result_prod = mysqli_query($con, $search_query);
        $num_of_rows = mysqli_num_rows($result_prod);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center pl-3'>Sorry for inconvenience, <span class='text-danger'> There is No result found for $search_data_value </span> </h2>";
        }
        while ($row_data = mysqli_fetch_assoc($result_prod)) {
            $product_title = ucfirst($row_data['product_title']);
            $product_id = $row_data['product_id'];
            $product_description = ucfirst($row_data['product_description']);
            $product_img1 = $row_data['product_img1'];
            $product_price = $row_data['product_price'];
            echo "<div class='col-md-4 mb-2'>
        <div class='card'><img class='card-img-top' src='./admin/product_images/$product_img1' alt='Card image cap'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <p class='card-text'> Price :- $product_price /- </p>
            <a href='index.php?add_to_cart=$product_id' class='btn custom-color'>Add to Cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
        </div></div>
        </div>";
        }
    }
}


// view more detail
function view_more()
{

    global $con;
    // getting dynamic products 
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['category'])) {
            $product_id = $_GET['product_id'];
            $select_prod = "select * from `products` where product_id=$product_id";
            $result_prod = mysqli_query($con, $select_prod);
            while ($row_data = mysqli_fetch_assoc($result_prod)) {
                $product_title = ucfirst($row_data['product_title']);
                $product_id = $row_data['product_id'];
                $product_description = ucfirst($row_data['product_description']);
                $product_img1 = $row_data['product_img1'];
                $product_img2 = $row_data['product_img2'];
                $product_img3 = $row_data['product_img3'];
                $product_price = $row_data['product_price'];
                echo "<div class='col-md-4 mb-2'>
        <div class='card'><img class='card-img-top' src='./admin/product_images/$product_img1' alt='Card image cap'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <p class='card-text'> Price :- $product_price /- </p>
            <a href='index.php?add_to_cart=$product_id' class='btn custom-color'>Add to Cart</a>
            <a href='./' class='btn btn-danger'>Back</a>
        </div></div>
        </div> 
        <div class='col-md-8'>
                        <div class='row'>
                            <div class='col-md-12'>
                                <h4 class='text-center custom-navb mb-4' style='color:#51f5c4;'>
                                    Related Product
                                </h4>
                            </div>
                            <div class='col-md-6'>
                                <img class='card-img-top' src='./admin/product_images/$product_img2' alt='Card image cap'>
                            </div>
                            <div class='col-md-6'>
                                <img class='card-img-top' src='./admin/product_images/$product_img3' alt='Card image cap'>
                            </div>
                        </div>

                    </div>";
            }
        }
    }
}


// Get ip Address 
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


// Cart Function

function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $ip = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "select * from `cart_details` where ip_address='$ip' and product_id=$get_product_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows> 0) {
            echo "<script> alert('item alredy present inside cart') </script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert_query = "insert into `cart_details` (product_id,ip_address,quantity) values ('$get_product_id','$ip',1)";
            $result_query = mysqli_query($con, $insert_query);
            echo "<script> alert('Item added to cart') </script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}

?>