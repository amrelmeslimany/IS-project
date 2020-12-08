<?php
ob_start();
session_start();
include "contactDB.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_SESSION["ID"];
    $pass = '';
    if (empty($_POST['Password'])) {
        $pass = $_POST['oldPass'];
    } else {
        $pass = sha1($_POST['Password']);
    }
    $stmt = $con->prepare("UPDATE student SET password= ? WHERE id = ?");
    $stmt->execute(array($pass, $id));
}
ob_end_flush();

