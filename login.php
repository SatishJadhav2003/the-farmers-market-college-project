<?php
$login = false;
$showErr = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include('partials/dbconnect.php');
  $username = $_POST["username"];
  $password = $_POST["password"];
  $exists = false;

  $sql = "Select * from `users` where username='$username' AND password='$password'";
  $result = mysqli_query($con, $sql);
  $num = mysqli_num_rows($result);
  if ($num == 1) {
    echo "<script>alert('You are logged in')</script>";
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION ['username'] = $username;
    header('location:index.php');
  } else {
    echo "<script>alert('Invalid Credentials')</script>";
  }


}

?>



<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">

    <style>
      #login{
        text-align: center;
        margin-top: 10px;
      }
    </style>
</head>

<body class="bg-light">


  <div class="container col-md-6">
    <h2 class='text-center my-5' style="color:grey; font-weight: bold">Login to Our Website</h2>

    <form class="login_form" action="" method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name='username' autocomplete="off" placeholder="Enter Username">
      </div>


      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" autocomplete="off" placeholder="Enter your password">
      </div>

      <button type='submit' class='btn btn-success col-md-12'>Login</button>
      <p id="login">Don't have account ? <span><a href="signup.php"><b>signUp</b></a></span></p>
    </form>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>