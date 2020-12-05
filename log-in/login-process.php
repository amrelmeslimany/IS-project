<?php
session_start();
include '../function/contactDB.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashpass = sha1($password);

    $stmt = $con->prepare("SELECT 
                          id,username,email,Password
                           FROM
                            students
                           WHERE
                             email = ?
                           AND
                              Password = ?
                           LIMIT  1");
    $stmt->execute(array($email , $hashpass));
    $row = $stmt -> fetch();
    $count = $stmt->rowCount();

    if($count > 0){
        $_SESSION['ID'] = $row['id'];
        header('Location:../dashboard/profile.php');
        exit();

    }
}
