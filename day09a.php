<?php

$input = file_get_contents('day09.txt');
$input=trim($input);

$result='';
while(strlen($input)>0){
var_dump(strlen($input));
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
    for($i=0;$i<$command[1];$i++){
      $result.=substr($input,0,$command[0]);
    }
    $input=substr($input,$command[0]);
  }else{
    $result.=$c;
  }
}

$result=str_replace(' ','',$result);
var_dump(strlen($result));

