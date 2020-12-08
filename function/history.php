<?php
function history($id){
    include "contactDB.php";
    $stmt = $con->prepare("SELECT
                                register.`id_course` AS 'code',course.name,course.Credithours AS'hours',
                                department.name,register.term,register.year
                            FROM
                                (register
                            INNER JOIN course 
                            ON register.id_course=course.code)
                            INNER JOIN department
                            ON course.department=department.code
                            WHERE 
                                register.id_student=1
                                
                           ");
    $stmt->execute(array($id));
    return $row = $stmt -> fetchall();
}
function since($id){
    include "contactDB.php";
    $stmt = $con->prepare("SELECT
                                since
                            FROM
                                students
                            where 
                                code=?
                           ");
    $stmt->execute(array($id));
    return $row = $stmt -> fetch();
}
print_r(since(1));