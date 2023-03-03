<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS File -->
    <link rel="stylesheet" href="../style.css">
</head>

<body>


    <!-- Nvvbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light  custom-navbar">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="not found" class="logo">
                <div>
                    <h3 class="text-center p-3">Manage Details</h3>
                </div>
                <nav class="navbar navbar-expand-md navbar-dark  ">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Welcome Satish</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>


    <!-- Admin access -->
    <section>
        <div class="row">
            <div class="col-md-12 bg-secondary p-2 d-flex align-items-center">
                <div class="p-3">
                    <a href="#">
                        <img src="../images/potato.jpg" alt=" img not found" class="admin-image">
                    </a>
                    <p class="text-center text-light">Admin name</p>
                </div>
                <div class="button text-center">
                    <button class="m-1"><a href="index.php" class="nav-link  custom-color m-1">Insert Products</a></button>
                    <button class="m-1"><a href="" class="nav-link  custom-color m-1">View Products</a></button>
                    <button class="m-1"><a href="index.php?insert_category" class="nav-link  custom-color m-1">Insert Categories</a></button>
                    <button class="m-1"><a href="" class="nav-link  custom-color m-1">View Categories</a></button>
                    <button class="m-1"><a href="index.php?insert_brand" class="nav-link  custom-color m-1">Insert Brands</a></button>
                    <button class="m-1"><a href="" class="nav-link  custom-color m-1">View Brands</a></button>
                    <button class="m-1"><a href="" class="nav-link  custom-color m-1">All Orders</a></button>
                    <button class="m-1"><a href="" class="nav-link  custom-color m-1">All Payments</a></button>
                    <button class="m-1"><a href="" class="nav-link  custom-color m-1">List Users</a></button>
                    <button class="m-1"><a href="" class="nav-link  custom-color m-1">Log Out</a></button>
                </div>
            </div>
        </div>
    </section>


    <!-- php code to display values of buttons -->
    <div class="container my-5">

        <?php
        //Insert Category
        if (isset($_GET['insert_category'])) {
            include('insert_categories.php');
        }

        //Insert Brands
        if (isset($_GET['insert_brand'])) {
            include('insert_brands.php');
        }
        ?>
    </div>




    <!-- bootstrap js link -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>