<?php

$doorId = 'abbhdwsy';
$index = 0;
$password = '';
while(true){

  $hash = md5($doorId . $index);
  if(substr($hash,0,5) === '00000'){
    $password .= substr($hash,5,1);
    if(strlen($password) === 8){
      var_dump($password);
      exit;
    }
  }
  $index++;

}
