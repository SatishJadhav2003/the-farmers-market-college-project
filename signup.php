<?php
$showAlert = false;
$showErr = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('partials/dbconnect.php');
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $mobile = $_POST['mobile'];
    $cpassword = $_POST["cpassword"];
    $exists = false;

    if ($username != "" && $password != "" && $email != "") {

        $select_query = "Select * from `users` where email='$email'";
        $out = mysqli_query($con, $select_query);
        $rows_count = mysqli_num_rows($out);
        if ($rows_count > 0) {
            echo "<script>alert('Email already exists')</script>";
        } else {
            if ($password == $cpassword && $exists == false) {
                $sql = "INSERT INTO `users` (`name`,`mobile`, `email`, `password`, `date`) VALUES ('$username','$mobile', '$email', '$password', current_timestamp())";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    echo "<script>alert('successfuly signup')</script>";
                    header('location:login.php');
                }
            } else {
                echo "<script>alert('Password do not match')</script>";
            }
        }
        # code...
    } else {
        echo "<script>alert('All fields are neccessary')</script>";
    }


}

?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="style.css">

    <style>
        #signup {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body class="bg-light">



    <div class="container signup col-md-6">
        <h2 class='text-center my-2' style="font-weight:bold; color:grey">Sign Up to Our Website</h2>

        <form class="signup_form" action="" method="post">
            <div class="mb-3">
                <label for="username" class="form-label col-md-6">Name</label>
                <input type="text" class="form-control" id="username" name='username' placeholder="">
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label col-md-6">Mobile</label>
                <input type="text" class="form-control" id="mobile" name='mobile' placeholder="">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label col-md-6">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label col-md-6">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="">
            </div>

            <div class="mb-3">
                <label for="cpassword" class="form-label col-md-6">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="">
                <small class='form-text text-muted'>Make sure to type the same password</small>
            </div>

            <button type='submit' class='btn btn-success col-md-12'>Sign Up</button>
            <p id="signup">Already have account ?<a href="login.php"> <b>login</b></a></p>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>