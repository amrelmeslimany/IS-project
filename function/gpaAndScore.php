<?php
function getscore($id)
{
    include 'contactDB.php';
    $stmt = $con->prepare("SELECT 
                                register.score,course.Credithours
                            FROM 
                                register 
                            INNER JOIN 
                                course
                            ON 
                                register.id_course = course.code
                           
                           WHERE
                              register.id_student = ?
                           AND 
                              register.score != -1
                           ");
    $stmt->execute(array($id));
    $rows=$stmt->fetchAll();
    return $rows;
}
function GPA($id){
    $sumGPA1=0;
    $sumhours=0;
    $scours= getscore($id);
    foreach ($scours as $score){
        if($score['score'] <= 100 && $score['score']>=90){
            $gpaH=4*$score['Credithours'];
        }elseif ($score['score'] <90 && $score['score']>=85){
            $gpaH=3.7*$score['Credithours'];
        }elseif ($score['score'] <85 && $score['score']>=80){
            $gpaH=3.3*$score['Credithours'];
        }elseif ($score['score'] <80 && $score['score']>=75){
            $gpaH=3*$score['Credithours'];
        }elseif ($score['score'] <75 && $score['score']>=70){
            $gpaH=2.7*$score['Credithours'];
        }elseif ($score['score'] <70 && $score['score']>=65){
            $gpaH=2.3*$score['Credithours'];
        }elseif ($score['score'] <65 && $score['score']>=60){
            $gpaH=2*$score['Credithours'];
        }elseif ($score['score'] <60 && $score['score']>=55){
            $gpaH=1.7*$score['Credithours'];
        }elseif ($score['score'] <55 && $score['score']>=50){
            $gpaH=1.3*$score['Credithours'];
        }elseif ($score['score'] <50 && $score['score']>=45) {
            $gpaH = 1 * $score['Credithours'];
        }else{
            $gpaH=0;
        }
        $sumGPA1+=$gpaH;
        $sumhours+=$score['Credithours'];
    }
    return $sumGPA1/$sumhours;
}

