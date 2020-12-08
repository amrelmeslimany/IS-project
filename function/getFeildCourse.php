<?php
function getfaildCourse($studentId){
    include 'contactDB.php';
    $stmt = $con->prepare("SELECT
                                `id_course` AS 'code',score
                            FROM 
                            register
                            WHERE  
                            id_student=?                      
                            ");
    $stmt->execute(array($studentId));
    return $stmt->fetchAll();
}

