<?php
if(! isset($_SESSION['user_id']) || $_SESSION['user_id'] ==0 ){

    header('location: input.php');
    die();
};

if(isset($_GET['logout'])){
    unset($_SESSION['user_id']);
    session_destroy();
    header('location: input.php');
    die();
}
?>
