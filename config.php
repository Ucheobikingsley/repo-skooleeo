<?php

    $conn = mysqli_connect("localhost","root","","db_skooleeo");

    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }