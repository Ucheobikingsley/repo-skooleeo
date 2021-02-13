<?php
    require_once 'config.php';
  
    if(isset($_POST['name'])){
        $name= mysqli_real_escape_string($conn, htmlspecialchars($_POST['name']));
        $insert_query = mysqli_query($conn,"INSERT INTO `stories`(story) VALUES('$name')");
        if($insert_query){
            echo "<script>
            alert('Data inserted');
            window.location.href = 'index.php';
            </script>";
            exit;
        }else{
            echo "<h3>Opps something wrong!</h3>";
        }
        
    }  