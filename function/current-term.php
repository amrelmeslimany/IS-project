<?php

function getCurrent($studentId,$term,$year){
    include 'contactDB.php';
    $stmt = $con->prepare("SELECT
                                register.`id_course` AS 'code',course.name,register.score,
                                course.Credithours AS 'hours',department.name as 'department'
                            FROM (
                            register
                                 INNER JOIN course 
                                 ON register.id_course=course.code)
                                 INNER JOIN department
                                 ON course.department=department.code
                            WHERE 
                                register.term=?
                                AND
                                register.year=?
                                AND
                                register.id_student=?                       
                            ");
    $stmt->execute(array($term,$year,$studentId));
    return $stmt->fetchAll();
}
