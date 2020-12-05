<?php
ob_start();
session_start();
include "contactDB.php";
if (isset($_SESSION['ID'])) {
    if (isset($_GET['do'])) {
        $do = $_GET['do'];
    } else {

    }
    if ($do == 'updete') {//manage page
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = $_SESSION["ID"];
            $email = $_POST['email'];
            $name = $_POST['username'];
            $img = $_POST['img'];
            //password trick
            $pass = '';
            if (empty($_POST['newPass'])) {
                $pass = $_POST['oldPass'];
            } else {
                $pass = sha1($_POST['newPass']);
            }

            $stmt = $con->prepare("UPDATE student SET name = ?,password= ? , email = ? , img = ?  WHERE id = ?");
            $stmt->execute(array($name, $pass, $email,$img, $id));

        } else {

        }

    } elseif ($do == 'add') {//add members pag

    } else {

    }
}
ob_end_flush();

