<?php

function getDataFromStudentTable($id){
    include "contactDB.php";
    $stmt = $con->prepare("SELECT
                                students.username,students.email,students.name,students.Password,students.level,students.img,department.name as 'StdDepart'
                           FROM
                                students
                           JOIN 
                                department
                           ON 
                                students.department_id = department.code 
                           WHERE
                                id=?
                           ");
    $stmt->execute(array($id));
    return $row = $stmt -> fetch();
}

