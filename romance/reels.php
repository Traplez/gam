<?php

function GetRows($isBonus){

global $minwin;
global $bet;

if($minwin>=500*$bet){
$minwin=500*$bet;
$row[0]=array(9,10,11,12,14);
$row[1]=array(9,10,11,12,14);
$row[2]=array(9,10,11,12,14);
$row[3]=array(9,10,11,12,14);
$row[4]=array(9,10,11,12,14);	
}else if($minwin>=300*$bet){
$minwin=200*$bet;	
$row[0]=array(6,7,8,9,11,10,12);
$row[1]=array(6,7,8,9,11,10,12);
$row[2]=array(6,7,8,9,11,10,12);
$row[3]=array(6,7,8,9,11,10,12);
$row[4]=array(6,7,8,9,11,10,12);
}else{
$row[0]=array(1,2,3,4,5,6,7,8,10,9,11,12,14);
$row[1]=array(1,2,3,4,5,6,7,8,10,9,11,12,14);
$row[2]=array(1,2,3,4,5,6,7,8,10,9,11,12,14);
$row[3]=array(1,2,3,4,5,6,7,8,10,9,11,12,14);
$row[4]=array(1,2,3,4,5,6,7,8,9,11,10,12,14);	
}

shuffle($row);
shuffle($row[0]);
shuffle($row[1]);
shuffle($row[2]);
shuffle($row[3]);
shuffle($row[4]);
  
  return array($row[0][0],$row[0][1],$row[0][2],$row[1][0],$row[1][1],$row[1][2],$row[2][0],$row[2][1],$row[2][2],$row[3][0],$row[3][1],$row[3][2],$row[4][0],$row[4][1],$row[4][2]);
 }
  
  
 
function GetRows2($isBonus){

global $minwin;
global $bet;

if($minwin>=500*$bet){
$minwin=500*$bet;
$row[0]=array(9,10,11,12,14);
$row[1]=array(9,10,11,12,14);
$row[2]=array(9,10,11,12,14);
$row[3]=array(9,10,11,12,14);
$row[4]=array(9,10,11,12,14);	
}else if($minwin>=300*$bet){
$minwin=200*$bet;	
$row[0]=array(6,7,8,10,12);
$row[1]=array(6,7,8,10,12);
$row[2]=array(6,7,8,10,12);
$row[3]=array(6,7,8,10,12);
$row[4]=array(6,7,8,10,12);
}else{
$row[0]=array(1,2,3,4,5,6,7,8,10,12,14);
$row[1]=array(1,2,3,4,5,6,7,8,10,12,14);
$row[2]=array(1,2,3,4,5,6,7,8,10,12,14);
$row[3]=array(1,2,3,4,5,6,7,8,10,12,14);
$row[4]=array(1,2,3,4,5,6,7,8,10,12,14);	
}



if($_SESSION['romance_freeMode']==2 || $_SESSION['romance_freeMode']==4){

array_push($row[0],14);	
array_push($row[0],14);	
array_push($row[0],14);	
array_push($row[0],14);	
array_push($row[0],14);	
array_push($row[0],14);	
array_push($row[0],14);	
array_push($row[0],14);	
array_push($row[0],14);	
array_push($row[0],14);	
array_push($row[0],14);	
	
}



shuffle($row);
shuffle($row[0]);
shuffle($row[1]);
shuffle($row[2]);
shuffle($row[3]);
shuffle($row[4]);
  
  
  
  
  
  
  
  
  return array($row[0][0],$row[0][1],$row[0][2],$row[1][0],$row[1][1],$row[1][2],$row[2][0],$row[2][1],$row[2][2],$row[3][0],$row[3][1],$row[3][2],$row[4][0],$row[4][1],$row[4][2]);
 }
  
  
  
  
?>