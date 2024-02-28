<?php

    $conn=mysqli_connect('localhost','root','','datatable');
     if(!$conn)
    {
        die("Error : ".mysqli_error($conn));
    }

?>