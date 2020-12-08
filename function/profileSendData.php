<?php
ob_start();
session_start();
include "contactDB.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_SESSION["ID"];

    $F1  = $_POST['img'];
        //upload and save image in database
    if (is_uploaded_file($F1)) {
        $ImageT = time();
        move_uploaded_file($F1, "../data/$ImageT");
        $instr = fopen("../data/$ImageT", "rb");
        $image = addslashes(fread($instr, filesize("../data/$ImageT")));
        unlink("../data/$ImageT");

        echo '<img src="' . $image . '"';
    }

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

