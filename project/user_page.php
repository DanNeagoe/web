<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<div class="container">  
   <div class="content">
      <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <a href="logout.php" class="btn">logout</a>
      <a href="reservation.php" class="btn">book</a>
      <a href="slideshow.php" class="btn">photos</a>
   </div>

</div>

</body>
</html>