<?php
ob_start();
session_start();
include "contactDB.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_SESSION["ID"];


    $targetDir = "../data/";

    $fileName = basename($_FILES["file"]["name"], date());

    $targetFilePath = $targetDir . $fileName;

    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

    if (in_array($fileType, $allowTypes)) {

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {

            $pass = '';
            if (empty($_POST['Password'])) {
                $pass = $_POST['oldPass'];
            } else {
                $pass = sha1($_POST['Password']);
            }
            $stmt = $con->prepare("UPDATE student SET password= ?,img=? WHERE id = ?");
            $stmt->execute(array($pass,$targetFilePath, $id));
        }
    }
}
header('location:../dashboard/profile.php');
ob_end_flush();

