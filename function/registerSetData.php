<?php
ob_start();
session_start();
include "contactDB.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idStudent = $_SESSION["ID"];
    $year=date('yy');
    $term='';
    if(date('m')==9|10){
        $term="1st";
    }elseif(date('m')==1|2){
        $term="2nd";
    }
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


ob_end_flush();

?>
