<?php
if(!isset($_SESSION['email'])){
    session_start();
}
session_destroy();
header('location: index.php');

?>