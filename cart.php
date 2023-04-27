<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce website for Vegetables</title>

    <!-- Bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Connecting server -->
    <?php
    include('./includes/connect.php');
    include('./functions/common_fuctions.php');

    ?>

    <style>
        .cart_img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
    </style>

</head>

<body>
    <section>
        <!-- Navbar -->
        <div class="navbar-fluid p-0 ">
            <nav class="navbar navbar-expand-md navbar-light custom-navbar">
                <img src="./images/logo.png" alt="Logo not found" class="logo">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./display_all.php">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./admin/index.php">admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>
                                    <?php cart_item() ?>
                                </sup></a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>

        <!-- Calling cart function -->
        <?php
        cart();
        ?>

        <!-- second nav bar  -->
        <nav class="navbar navbar-expand-md navbar-dark bg-secondary ">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
        </nav>


        <!-- Heading -->
        <div class="bg-light p-3">
            <h1 class="text-center">
                Welcome to Farmer's Market
            </h1>
        </div>
    </section>

    <!-- Cart Item -->
    <div class="container mt-3">
        <div class="row">
            <form action="" method="post">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">Product Title</th>
                            <th scope="col">Product Image</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Remove</th>
                            <th scope="col">Operations</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- PHP code to get dynamic data -->
                        <?php
                        global $con;
                        $ip = getIPAddress();
                        $cart_query = "select * from `cart_details` where ip_address='$ip'";
                        $result_query = mysqli_query($con, $cart_query);
                        $total = 0;
                        while ($row_data = mysqli_fetch_array($result_query)) {
                            $product_id = $row_data['product_id'];
                            $select_products = "select * from `products` where product_id=$product_id";
                            $result_products = mysqli_query($con, $select_products);
                            while ($row_products = mysqli_fetch_array($result_products)) {

                                $product_price1 = array($row_products['product_price']);
                                $product_price = $row_products['product_price'];
                                $product_title = $row_products['product_title'];
                                $product_img1 = $row_products['product_img1'];
                                $product_value = array_sum($product_price1);
                                $total += $product_value;

                                ?>

                                <tr>
                                    <th scope="row">
                                        <?php echo $product_title ?>
                                    </th>
                                    <td><img src="./images/<?php echo $product_img1 ?>" class="cart_img"> </td>
                                    <td> <input type="text" name="qty" class="form-input w-50"> </td>
                                    <td>
                                        <?php echo $product_price ?>
                                    </td>
                                    <?php
                                    $ip = getIPAddress();
                                    if (isset($_POST['update_cart'])) {
                                        $quantity = $_POST['qty'];
                                        $update_cart = "update `cart_details` set quantity=$quantity where ip_address = '$ip'";
                                        $result_products_quantity = mysqli_query($con, $update_cart);
                                        $total = $total * $quantity;
                                    }
                                    ?>


                                    <td> <input type="checkbox" name="removeitem[]" vlaue=" <?php echo $product_id ?> "> </td>
                                    <td>
                                        <!-- <button class="bg-info py-2 px-3 mx-3 mb-5 border-0">
                                        Update
                                    </button> -->
                                        <input type="submit" value="update cart" class="bg-info py-2 px-3 mx-3 mb-5 border-0"
                                            name="update_cart">
                                        <!-- <button class="bg-danger py-2 px-3 mx-3 mb-5 border-0">
                                            Remove
                                        </button> -->
                                        <input type="submit" value="remove cart" class="bg-danger py-2 px-3 mx-3 mb-5 border-0"
                                            name="remove_cart">
                                    </td>
                                </tr>

                            <?php }
                        } ?>
                    </tbody>
                </table>
            </form>

            <?php  
                function remove_cart_item()
                {
                    global $con;
                    if(isset($_POST['remove_cart']))
                    {
                            foreach ($_POST['removeitem'] as $remove_id) {
                                echo $remove_id;
                                $delete_query = "Delete from `cart_details` where product_id='$remove_id' ";
                                $run_delete = mysqli_query($con,$delete_query);
                                if($run_delete)
                                {
                                    echo "<script> window.open('cart.php','_self')</script>";
                                }
                            }
                    }
                }

                echo $remove_item = remove_cart_item();
            ?>





            <!-- Subtotal -->
            <div class="d-flex">
                <h4 class="px-3"> Subtotal :
                    <strong class="text-info">
                        <?php echo $total ?> /-
                    </strong>
                </h4>
                <a href="index.php">
                    <button class="bg-info px-3 py-2 mb-5 border-0">
                        Continue Shopping
                    </button>
                </a>
                <a href="#">
                    <button class="bg-secondary py-2 px-3 mx-3 mb-5 border-0">
                        Chcekout
                    </button>
                </a>
            </div>

        </div>
    </div>


    <!-- Footer -->

    <div class="custom-navbar text-center ">

        <p>All rights reserved by VIP Group &#128526;</p>
    </div>


    <!-- bootstrap js link -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>