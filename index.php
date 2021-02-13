<?php
    require_once 'config.php';
    require_once 'visitor_couter.php';

    $page_id = 1;
    $visitor_ip = $_SERVER['REMOTE_ADDR'];
    add_view($conn, $visitor_ip, $page_id);
    function get_all_data($conn){ 
        $get_data = mysqli_query($conn,"SELECT * FROM `stories`");
        if(mysqli_num_rows($get_data) > 0){
            while($row = mysqli_fetch_assoc($get_data)){
            echo '<div class="toast-card"> <div class="toast blog" role="alert" aria-live="assertive" aria-atomic="true"  data-autohide="false">
            <div class="toast-header">
             
              <strong class="me-auto">BLOGS</strong>
              <small class="text-muted">&nbsp;<small>posted at:</small>&nbsp;'.$row['currentTime'].'</small>
              &nbsp;<small class="del-blog">
              <a href="delete.php?id='.$row['id'].'"><button  class =" btn btn-danger">del</button></a></small>
            </div>
            <div class="toast-body">
              '.$row['story'].'
            </div>
            <a class = "blog-an" href="view.php?id='.$row['id'].'"> <small class="text-muted">&nbsp;<small>click here to read more</small></a><small class="total-views">'.$row['viewCount'].' view</small>
          </div></div>';
            }
        }
        else{
            echo ' <div class="toast" role="alert" aria-live="assertive" aria-atomic="true"  data-autohide="false">
            <div class="toast-header">
             
              <strong class="me-auto">BLOG</strong> &nbsp;
              <small class="text-muted">just now</small>
             
            </div>
            <div class="toast-body">
              No Blog avaliable.
            </div>
          </div>';
        }
}
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/index.css">
    <title>Document</title>
</head>
<body>
<!-- navigation bar -->
<nav class=" navbar navbar-dark bg-dark scrolling-navbar">
  <div class="container-fluid">
    <a class="navbar-brand">Skooleeo+</a>
  </div>
</nav>
<a href="http://"></a>
<!-- navigation end -->

<!-- side card -->
<div aria-live="polite" aria-atomic="true" class="position-relative">
  <!-- Position it: -->
  <!-- - `.toast-container` for spacing between toasts -->
  <!-- - `.position-absolute`, `top-0` & `end-0` to position the toasts in the upper right corner -->
  <!-- - `.p-3` to prevent the toasts from sticking to the edge of the container  -->
  <div class="toast-container position-absolute top-0 end-0 p-3">
    <?php
        get_all_data($conn);
    ?>
  </div>
</div>



<!-- alert -->

<div class="card w-25 view-width"  >
  <div class="card-body" >
    <h5 class="card-title card-top">Views</h5>
    <p class="card-text card-top" > <?php echo total_views($conn, $page_id)?></p>
    
  </div>
</div>


<!-- input Field -->
<div class="view-placement">
    <form action="insert.php" method="post" >
        <input class="form-control w-25 view-placement" type="text" name="name" placeholder="Enter Blog...">
        <input type="submit" value="submit" class="btn btn-success  form-control views-placement">
    </form>
</div>





<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
  $('.toast').toast('show');
});
</script>
</body>
</html>