<?php
include('../includes/connect.php');


// if (isset($_POST['view_products']))
// {
//       echo "<h1>Hello</h1>";    
// }
?>

<style>
        .cart_img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
    </style>


<div class="container mt-3">
        <div class="row">

                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">Product Title</th>
                            <th scope="col">Product Image</th>
                            <th scope="col">Category</th>
                            <th scope="col">Product Description</th>
                            <th scope="col">Keywords</th>
                            <th scope="col">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php  
                        global $con;
                        // getting dynamic products 
                            $select_prod = "select * from `products` ";
                            $result_prod = mysqli_query($con, $select_prod);
                            while ($row_data = mysqli_fetch_assoc($result_prod)) {
                                $product_title = ucfirst($row_data['product_title']);
                                $product_description = ucfirst($row_data['product_description']);
                                $product_img1 = $row_data['product_img1'];
                                $product_keywords = $row_data['product_keywords'];
                                $category_id = $row_data['category_id'];
                                  $get_category = "select * from `category` where category_id=$category_id";
                                  $result_category = mysqli_query($con, $get_category);
                                  while ($category = mysqli_fetch_assoc($result_category)) {
                                $category_title = $category['category_title'];

                        ?>
                                <tr>
                                    <td scope="row">
                                        <?php echo $product_title ?>
                                    </td>
                                    <td><img src="../images/<?php echo $product_img1 ?>" class="cart_img"> </td>
                                    <td><?php echo $category_title; ?></td>
                                    <td><?php echo $product_description ?> </td>
                                    <td><?php echo $product_keywords ?> </td>
                                    <td>
                                        <input type="submit" value="remove" class="bg-danger py-2 px-3 mx-3 mb-5 border-0"
                                            name="remove">
                                    </td>
                                </tr>
                                <?php } } ?>
                    </tbody>
                </table>
        </div>
    </div>