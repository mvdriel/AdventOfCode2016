<?php

$input=file_get_contents('day18.txt');
$input=trim($input);
$input=str_split($input);

$matrix=[];
foreach($input as $c){
  $matrix[0][]=($c==='.');
}

for($i=1;$i<count($input);$i++){
  for($j=0;$j<count($input);$j++){
    $left=isset($matrix[$i-1][$j-1])?$matrix[$i-1][$j-1]:true;
    $center=$matrix[$i-1][$j];
    $right=isset($matrix[$i-1][$j+1])?$matrix[$i-1][$j+1]:true;

    $matrix[$i][$j]=!(
      ($left===false&&$center===false&&$right===true)||
      ($left===true&&$center===false&&$right===false)||
      ($left===false&&$center===true&&$right===true)||
      ($left===true&&$center===true&&$right===false));
  }
}

$count=0;
for($i=0;$i<40;$i++){
  for($j=0;$j<count($matrix[$i]);$j++){
    if($matrix[$i][$j])$count++;
  }
}
var_dump($count);
