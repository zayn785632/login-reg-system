<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>welcome page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
    body {
          background-image: url("jog.jpg");
          background-repeat: no-repeat;
          background-color: black;
          background-position: center;
          
          }
  </style>
  </head>

  <body>
    <h1 class="text-center text-light mt-5">Welcome
        <?php echo $_SESSION['username'];?> </h1>

    <div class="container">
        <a href="logout.php" class="btn btn-danger mt-5 ">Logout</a>
    </div>
    
  </body>
</html>