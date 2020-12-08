<?php
session_start();
if(isset($_SESSION['ID'])){
    session_destroy();
    session_abort();
    header("location:../log-in/login.php");
}
