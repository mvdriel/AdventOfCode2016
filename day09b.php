<?php

$input = file_get_contents('day09.txt');
$input=trim($input);

//$input='(25x3)(3x3)ABC(2x3)XY(5x2)PQRSTX(18x9)(3x2)TWO(5x7)SEVEN';


$count=0;

function size($input){
  $count=0;
  while(strlen($input)>0){
    $c=substr($input,0,1);
    $input=substr($input,1);
    if($c==='('){
      $command='';
      while(substr($input,0,1)!==')'){
        $command.=substr($input,0,1);
        $input=substr($input,1);
      }
      $input=substr($input,1);
      $command=explode('x',$command);
      $s=substr($input,0,$command[0]);
      $count+=($command[1]-1)*size($s);
    }else{
      $count++;
    }
  }
  return $count;
}

$count=size($input);

var_dump($count);

