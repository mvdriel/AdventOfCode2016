<?php

$input='zpqevtbw';
//$input='abc';

$index=0;

$triplets=[];

$matches=[];

function triplet($text){
  for($i=0;$i<strlen($text)-2;$i++){
    if((substr($text,$i,1)===substr($text,$i+1,1)) &&
       (substr($text,$i,1)===substr($text,$i+2,1))){
      return substr($text,$i,1);
    }
  }
  return false;
}

function quintuple($text,$c){
  $offset=0;
  $count=0;
  while($count<5){
    $pos=strpos($text,$c,$offset);
    if($pos===false)return false;
    if($pos>$offset)$count=1;
    else $count++;
    $offset=$pos+1;
  }
  return true;
}

$count=0;
$last=0;
while(true){
  $hash=md5($input.$index);
  $c=triplet($hash);
  $q=false;
  foreach($triplets as $i=>$triplet){
    if($index>($triplet['index']+1000)){
      unset($triplets[$i]);
    }else{
      if(quintuple($hash,$triplet['char'])){
        $q=$triplet['char'];
        $count++;
        if($count===64){
          var_dump($triplet['index']);
          var_dump('FOUND');exit;
        }
        unset($triplets[$i]);
      }
    }
  }
  if($q !== $c && $c!==false){
    $triplets[]=['char'=>$c, 'index'=>$index];
  }
  $index++;
}
