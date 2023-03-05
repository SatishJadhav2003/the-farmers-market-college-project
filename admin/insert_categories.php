<?php
include('../includes/connect.php');

// inserting categories to database
if (isset($_POST['insert_cat'])) {
    $category_title = $_POST['categories'];

    // checking is category alredy present or not
    $select_query = "Select * from `category` where category_title='$category_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);

    if ($number > 0) {
        echo "<script>alert('Category alredy present in database')</script>";
    } else {

        // inserting in database
        $insert_query = "insert into `category` (category_title) values ('$category_title')";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
            echo "<script>alert('Category added successfully')</script>";
        }
    }

}
?>


<h2 class="text-center m-2">Insert Categories</h2>

<form action="" method="post" class="mb-2">
    <div class="input-group mb-2 w-90 ">
        <span class="input-group-text custom-navbar" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="categories" placeholder="Insert Categories"
            aria-label="categories" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-2 w-10 ">
        <input type="submit" class="p-2 border-0 my-3 custom-color" name="insert_cat" value="Insert Categories"
            aria-label="categories" aria-describedby="basic-addon1">
        <!-- <button class="custom-color p-2 my-3 border-0">Insert Category</button> -->
    </div>
</form>