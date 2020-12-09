<?php
function getData($level)
{
    include 'contactDB.php';
    $stmt = $con->prepare("SELECT 
                                course.name,course.code,course.Credithours,department.name AS 'codpart',course.Prerequisite_code ,register.score
                            FROM 
                               ( course INNER JOIN department ON course.department = department.code)
                               left JOIN register ON course.Prerequisite_code = register.id_course
                                
                           WHERE
                               course.level = ?
                           ");
    $stmt->execute(array($level));
    return $stmt->fetchAll();
}

function getLevel($id){
    include 'contactDB.php';
    $stmt = $con->prepare("SELECT 
                                level
                            FROM 
                                students 
                           WHERE
                               id = ?
                               LIMIT 1
                           ");
    $stmt->execute(array($id));
    $level = $stmt -> fetch();
    return $level['level'];

}
function lastSubject($id){
    include 'contactDB.php';
    $stmt = $con->prepare("SELECT 
                                id_course
                            FROM 
                                register 
                           WHERE
                               id_student = ?
                           ");
    $stmt->execute(array($id));
     return $stmt -> fetchall();
}
