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
                            <th scope="col">User name</th>
                            <th scope="col">Mobile</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php  
                        global $con;
                        // getting dynamic products 
                            
                        $get_category = "select * from `users`";
                        $result_category = mysqli_query($con, $get_category);
                        while ($category = mysqli_fetch_assoc($result_category)) {
                        $name = $category['name'];
                        $mobile = $category['mobile'];
                        ?>
                                <tr>
                                    <td scope="row">
                                        <?php echo $name ?>
                                    </td>
                                    <td scope="row">
                                        <?php echo $mobile ?>
                                    </td>
                                </tr>
                                <?php } ?>
                    </tbody>
                </table>
        </div>
    </div>