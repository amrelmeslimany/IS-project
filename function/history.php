<?php
function since($id){
    include "contactDB.php";
    $stmt = $con->prepare("SELECT
                                since
                            FROM
                                students
                            where 
                                id=?
                           ");
    $stmt->execute(array($id));
    return $row = $stmt -> fetch();
}
