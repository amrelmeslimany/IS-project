<?php
include '../function/contact DB.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashpass = sha1($password);

    $stmt = $con->prepare("SELECT
                          username,email,Password
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
        $_SESSION['username'] = $row['username'];
        $_SESSION['ID'] = $row['UserID'];
        header('Location:../student/profile.php');
        exit();

    }
}
