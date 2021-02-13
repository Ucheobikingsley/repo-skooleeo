<?php
     require_once 'config.php';
    $id = $_GET['id'];

    $query = "DELETE FROM `stories` where id = '$id' ";
    $result = mysqli_query($conn, $query);
    if( $result){
        echo "<script>
        alert('Blog Deleted');
        window.location.href = 'index.php';
        </script>";
        exit;
    }else{
        echo "<h3>Opps something wrong!</h3>";
    }
    
