<?php

$input=file_get_contents('day18.txt');
$input=trim($input);
$input=str_split($input);

$row=[];
foreach($input as $c){
  $row[]=($c==='.');
}

$count=0;
foreach($row as $cell){
  if($cell)$count++;
}
for($i=1;$i<400000;$i++){
  $nRow=[];
  for($j=0;$j<count($row);$j++){
    $left=isset($row[$j-1])?$row[$j-1]:true;
    $center=$row[$j];
    $right=isset($row[$j+1])?$row[$j+1]:true;

    $nRow[$j]=!(
      ($left===false&&$center===false&&$right===true)||
      ($left===true&&$center===false&&$right===false)||
      ($left===false&&$center===true&&$right===true)||
      ($left===true&&$center===true&&$right===false));
    if($nRow[$j])$count++;
  }
  $row=$nRow;
}

var_dump($count);
