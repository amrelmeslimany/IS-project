<?php
ob_start();
session_start();
include "contactDB.php";
include "termAndYear.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idStudent = $_SESSION["ID"];
    $year=year();
    $term=term();
    $subjects=$_POST['select'];
    foreach ($subjects as $subject) {

        $stmt = $con->prepare("INSERT INTO 
                                        register (id_student,id_course,term , year )
                                        VALUES   (:zstudent, :zsubject,:zterm,:zyear )
                                        ");
        $stmt->execute(array(
            'zstudent'=>$idStudent,
            'zsubject'=>$subject,
            'zterm'=>$term,
            'zyear'=>$year
        ));
    }
}
header('location:../dashboard/register.php');


ob_end_flush();

?>
