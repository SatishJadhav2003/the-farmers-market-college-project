<!-- Form to add products -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products - Admin Dashboard</title>

    <!-- Bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS -->
    <link rel="stylesheet" href="../style.css">

    <!-- Connecting server -->
    <?php
    include('../includes/connect.php');
    ?>

</head>

<body class="bg-light">

    <div class="container mt-3 ">
        <h1 class="text-center bg-secondary mb-0 text-white">
            Insert Products
        </h1>

        <form action="" method="post" enctype="multipart/form-data" class="custom-navbar p-5">

            <!-- title -->
            <div class="form-outline  w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control mb-4"
                    placeholder="Enter Product Title" autocomplete="off" required>
            </div>

            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" name="product_description" id="product_description" class="form-control mb-4"
                    placeholder="Enter Product Description" autocomplete="off" required>
            </div>

            <!-- Keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control mb-4"
                    placeholder="Enter Product Keywords" autocomplete="off" required>
            </div>

            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" class="form-select mb-4" required>
                    <option value="">Select a category</option>
                    <!-- To get categoris from database -->
                    <?php
                    $select_cate = "select * from `category`";
                    $result_cate = mysqli_query($con, $select_cate);
                    while ($row_data = mysqli_fetch_assoc($result_cate)) {
                        $cate_title = $row_data['category_title'];
                        $cate_id = $row_data['category_id'];
                        echo "<option value='$cate_id' >$cate_title</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Images -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_img1" class="form-label">Product Image 1</label>
                <input type="file" name="product_img1" id="product_img1" class="form-control mb-4" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_img2" class="form-label">Product Image 2</label>
                <input type="file" name="product_img2" id="product_img2" class="form-control mb-4">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_img3" class="form-label">Product Image 3</label>
                <input type="file" name="product_img3" id="product_img3" class="form-control mb-4">
            </div>

            <!-- Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="number" name="product_price" id="product_price" class="form-control mb-4"
                    placeholder="Enter Product Price" autocomplete="off" required>
            </div>

            <!-- Button -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-4 px-3" value="Insert Products">
            </div>
        </form>
    </div>

</body>

</html>