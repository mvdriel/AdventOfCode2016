<?php

$screen=[];
for($i=0;$i<6;$i++){
  for($j=0;$j<50;$j++){
    $screen[$i][$j]=0;
  }
}

$input = file_get_contents('day08.txt');
$lines = explode("\n", $input);

foreach($lines as $line){
  $line=explode(' ',$line);
  if($line[0]==='rect'){
    $line=explode('x',$line[1]);
    $a=$line[0];
    $b=$line[1];
    for($i=0;$i<$b;$i++){
      for($j=0;$j<$a;$j++){
        $screen[$i][$j]=1;
      }
    }
  }
  if($line[0]==='rotate'){
    if($line[1]==='row'){
      $y=$line[2];
      $y=explode('=',$y)[1];
      $right=$line[4];
      $row=[];
      for($i=0;$i<count($screen[$y]);$i++){
        $x=($i-$right)%50;
        if($x<0)$x+=50;
        $row[]=$screen[$y][$x];
      }
      $screen[$y]=$row;
    }elseif($line[1]==='column'){
      $x=$line[2];
      $x=explode('=',$x)[1];
      $down=$line[4];
      $column=[];
      for($j=0;$j<count($screen);$j++){
        $y=($j-$down)%6;
        if($y<0)$y+=6;
        $column[]=$screen[$y][$x];
      }
      foreach($column as $i => $cell){
        $screen[$i][$x]=$cell;
      }
    }
  }
}


$count=0;
foreach($screen as $x => $row){
  $output=$x.' => ';
  foreach($row as $cell){
    if($cell===1){
      $count++;
      $output.='#';
    }else{
      $output.='.';
    }
  }
  var_dump($output);
}
var_dump('');

var_dump($count);
