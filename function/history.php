<?php
function since($id){
    include "contactDB.php";
    $stmt = $con->prepare("SELECT
                                since
                            FROM
                                students
                            where 
                                id=?
                                LIMIT 1;
                           ");
    $stmt->execute(array($id));
     $row = $stmt -> fetch();
     return $row[0];
}
