<?php
    session_start();
    include('signup.php')

     $error = array()
    
    if(isset($_POST['reg_user'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);







    }
?>
