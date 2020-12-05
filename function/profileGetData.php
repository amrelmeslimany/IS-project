<?php

function getDataFromStudentTable($id){
    include "contactDB.php";
    $stmt = $con->prepare("SELECT 
                                students.code,students.name,students.email,students.password,
                                students.level,students.img,register.score,
                                SUM(course.Credithours) AS 'hours',department.name AS 'StdDpart'
                            FROM 
                                (((students 
                            INNER JOIN 
                                register 
                            ON 
                                students.id = register.id_student)
                            INNER JOIN 
                                course 
                            ON 
                                register.id_course = course.code)
                            INNER JOIN 
                                department
                            ON 
                                students.department_id = department.code)
                                
                           WHERE
                                students.id=?
                           ");
    $stmt->execute(array($id));
    return $row = $stmt -> fetch();
}
function getGPA($id){

}
