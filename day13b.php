<?php

$input=1362;

function wall($x,$y){
  global $input;
  $result = $x*$x + 3*$x + 2*$x*$y + $y + $y*$y;
  $result += $input;
  $result=decbin($result);
  $result=substr_count($result,'1');
  return ($result%2===1);
}

$visited=[];
$visited[1][1]=1;

$states=[];
$states[]=[1,1];

$step=0;
while($step<50){
  $step++;
  $nStates = $states;
  foreach($nStates as $state){
    $x=$state[0];
    $y=$state[1];
    $moves=[];
    if($x>0)$moves[]=[$x-1,$y];
    $moves[]=[$x+1,$y];
    if($y>0)$moves[]=[$x,$y-1];
    $moves[]=[$x,$y+1];
    foreach($moves as $move){
      $x=$move[0];
      $y=$move[1];
      if(empty($visited[$x][$y])){
        if(!wall($x,$y)){
          $visited[$x][$y]=1;
          $states[]=[$x,$y];
          if($x===31&&$y===39){
var_dump('FOUND!');
var_dump($step);
exit;
          }
        }
      }
    }
  }
}

$count=0;
foreach($visited as $vis){
  foreach($vis as $v){
    $count++;
  }
}
var_dump($count);
