<?php

$doorId = 'abbhdwsy';
$index = 0;
$password = [];
while(true){
  $hash = md5($doorId . $index);
  if(substr($hash,0,5) === '00000'){
    $position = substr($hash,5,1);
    if(in_array($position, ['0','1','2','3','4','5','6','7'], true)){
      $position = intval($position);
      if(empty($password[$position])){
        $password[$position] = substr($hash,6,1);
        if(count($password) === 8){
          ksort($password);
          var_dump($password);
          var_dump(implode('',$password));
          exit;
        }
      }
    }
  }
  $index++;

}
