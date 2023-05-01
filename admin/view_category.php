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
                            <th scope="col">Category Title</th>
                            <th scope="col">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php  
                        global $con;
                        // getting dynamic products 
                            
                        $get_category = "select * from `category`";
                        $result_category = mysqli_query($con, $get_category);
                        while ($category = mysqli_fetch_assoc($result_category)) {
                        $category_title = $category['category_title'];

                        ?>
                                <tr>
                                    <td scope="row">
                                        <?php echo $category_title ?>
                                    </td>
                                    <td>
                                        <input type="submit" value="remove" class="bg-danger py-2 px-3 mx-3 border-0"
                                            name="remove">
                                    </td>
                                </tr>
                                <?php } ?>
                    </tbody>
                </table>
        </div>
    </div>