<?php
function term(){
    if(date('m')==9|10|11|12|1){
        $term="1st";
    }elseif(date('m')==2|3|4|5){
        $term="2nd";
    }elseif (date('m')==6|7|8){
        $term="summer";
    }
    return $term;
}
function year(){
    if(date('m')==9|10|11|12){
        $year=date("yy")+1;
    }else{
        $year=date("yy");
    }
    return $year;
}
function term1($t){
    if($t==1){
        $term='1st';
    }elseif ($t==2){
        $term='2nd';
    }else{
        $term='summer';
    }
    return $term;
}