<?php

$input='01110110101001000';
$length=35651584;

$data=$input;

while(strlen($data)<$length){
  $b=$data;
  $b=strrev($b);
  $b=str_replace('0','[',$b);
  $b=str_replace('1','0',$b);
  $b=str_replace('[','1',$b);
  $data.='0'.$b;
}


$data=substr($data,0,$length);

$checksum='';

while(strlen($checksum)%2===0) {
  $checksum='';
  for($i=0;$i<strlen($data);$i+=2){
    if(substr($data,$i,1)===substr($data,$i+1,1)){
      $checksum.='1';
    }else{
      $checksum.='0';
    }
  }
  $data=$checksum;
}
var_dump($checksum);
