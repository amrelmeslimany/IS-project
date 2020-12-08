<?php
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