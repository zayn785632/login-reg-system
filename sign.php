<?php
$success=0;
$user=0;


if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];

    

  
    $sql = "Select * from `registration` where
    username='$username'";

    $result=mysqli_query($con,$sql);
    if($result){
      $num=mysqli_num_rows($result);
      if($num>0){
        // echo "User already exist";
        $user=1;
      }else{
        $sql="insert into `registration`(username,password)
        values('$username','$password' )";
        $result=mysqli_query($con,$sql);
        if($result){
          $success=1;
          header('location:login.php');
        }else{
          die(mysqli_error($con));
        }
      }
    }
}


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>signup page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <style>
    body {
          background-image: url("dk.jpg");
          background-repeat: no-repeat;
          background-color: black;
          background-position: center;
          
          }
  </style>
  </head>
  <body>

  <?php 
  if($user){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Oh no sorry! </strong> User already exist.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  
  ?>

<?php 
  if($success){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>success </strong> You are successfully signed up.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  
  ?>

    <h1 class="text-center mt-5 text-light ">Sign up page</h1>
    <div class="container mt-5">
    <form action="sign.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label text-light ">Name</label>
    <input type="email" class="form-control" placeholder="Enter your username" name="username">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label text-light ">Password</label>
    <input type="password" class="form-control" placeholder="Enter your password" name="password">
  </div>
  <button type="submit" class="btn btn-danger w-100">Signup</button>
</form>
    </div>
  </body>
</html>