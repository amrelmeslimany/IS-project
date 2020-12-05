<?php
include 'contactDB.php';

function getData($level)
{
    include 'contactDB.php';
    $stmt = $con->prepare("SELECT 
                                course.name,course.code,course.Credithours,department.name AS 'codpart'
                            FROM 
                                course INNER JOIN department ON course.department = department.code
                                
                           WHERE
                               course.level = ?
                           ");
    $stmt->execute(array($level));
    return $stmt->fetch();
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