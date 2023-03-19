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
    include('./functions/common_fuctions.php')
        ?>

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
                            <a class="nav-link" href="#">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/online-vegitable/admin/index.php">admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: 100/-</a>
                        </li>

                    </ul>
                    <form class="form-inline my-2 my-lg-0" action="search_product.php" method="get">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input class="btn btn-outline-light my-2 my-sm-0" value="search" type="submit" name="search_data_product">
                    </form>
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

    <!-- Product cart -->
    <section>
        <div class="row"style="padding-right: 1.2rem;padding-left:1.2rem">

            <!-- Products -->
            <div class="col-md-10">
                <div class="row m-0">
                    <?php
                    // getting dynamic products
                    search_product();
                    get_unique_categories();
                    ?>
                </div>
            </div>

            <!-- Sidenav -->
            <div class="col-md-2 bg-secondary p-0">
                <!-- Category -->
                <ul class="navbar-nav me-auto  text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h5>Categories</h5>
                        </a>
                    </li>
                    <?php
                    // getting category from database
                    getCategories();
                    ?>
                </ul>
            </div>
        </div>
    </section>




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