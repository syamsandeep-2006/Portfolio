<?php

    // Database Connection
    // ("hostname","user","password","database")
    $db = mysqli_connect("localhost","root","","myyblogs");
    if($db){
        // echo "Success";
    }
    else{
        die("Failed".mysqli_connect_error());
    }

?>