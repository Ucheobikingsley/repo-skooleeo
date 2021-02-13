
<?php
 require_once 'config.php';
 include 'inc/header.php';
 require_once 'visitor_couter.php';

$page_id = 2;
$visitor_ip = $_SERVER['REMOTE_ADDR'];
add_view($conn, $visitor_ip, $page_id);

?>
    
    



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Document</title>
</head>
<body>
<!-- navigation bar -->
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand">Skooleeo+</a>
  </div>
</nav>
<a href="http://"></a>

<div class="card w-25 view-width"  >
  <div class="card-body" >
   <?php
  $blogId = $_GET['id'];
    if(isset($blogId)){
      $query1 = "UPDATE `stories` SET viewCount = viewCount + 1 WHERE id = '$blogId'";
      $result1 = mysqli_query($conn, $query1);
    // $get_data = mysqli_query($conn,"SELECT * FROM `stories` where id = '$blogId'");
    $query2 = "SELECT * FROM `stories` where id = '$blogId'";
    $result2 = mysqli_query($conn, $query2);
      if(mysqli_num_rows($result2) > 0){
          while($row = mysqli_fetch_assoc($result2)){
          echo '<h1 class="card-top">Blog</h1>
          <br>
          <h6 class="blog-top">'.$row['story'].'</h6>
          <h6 class = "view-count"><small><strong>Views:</strong>'.$row['viewCount'].'</small></h6> 
         ';
          }
    }
  }
    ?>
  </div>
</div>
<a href="index.php"> <div class = "go-back-img">Click here to go back<img src="./img/back.png" alt="go back image" width="50" height="60"></div></a>


    
</body>
</head>