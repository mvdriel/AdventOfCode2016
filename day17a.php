<?php

$passcode='bwnlcvfs';
//$passcode='ihgpwlah';
//$passcode='kglvqrro';


$directions=['U','D','L','R'];

function open($path){
  global $passcode;
  global $directions;
  $result=[];
  $openCode=['b','c','d','e','f'];

  $hash=md5($passcode.$path);
  foreach($directions as $i => $direction){
    if(in_array(substr($hash,$i,1),$openCode)){
      $result[]=$direction;
    }
  }
  return $result;
}

function moves($state){
  $open=open($state['path']);
  $moves=[];
  if($state['x']>0)$moves[]='L';
  if($state['y']>0)$moves[]='U';
  if($state['x']<3)$moves[]='R';
  if($state['y']<3)$moves[]='D';
  return array_intersect($moves,$open);
}

$states=[];
$states[]=['path'=>'','x'=>0,'y'=>0];

$step=0;
while(true){
  $newStates=[];
  foreach($states as $state){
    $moves=moves($state);
    foreach($moves as $move){
      $x=$state['x'];
      $y=$state['y'];
      if($move==='L')$x--;
      if($move==='R')$x++;
      if($move==='U')$y--;
      if($move==='D')$y++;
      if($x===3&&$y===3){
        var_dump('FOUND');
        var_dump($state['path'].$move);
        exit;
      }
      $newStates[]=['path'=>$state['path'].$move,'x'=>$x,'y'=>$y];
    }
  }
  $states=$newStates;
  $step++;
}
