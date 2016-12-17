<?php

function containsTls($text){
  for($i=0;$i<strlen($text)-3;$i++){
    if(
      (substr($text,$i,1)===substr($text,$i+3,1)) &&
      (substr($text,$i+1,1)===substr($text,$i+2,1)) &&
      (substr($text,$i,1)!==substr($text,$i+1,1))){
      return true;
    }
  }
  return false;
}

$input = file_get_contents('day07.txt');
$lines = explode("\n", $input);

$count = 0;
foreach($lines as $line) {
  $contains=containsTls($line);
  preg_match_all("/\[[^\]]*\]/", $line, $matches);
  foreach($matches[0] as $match){
    if(containsTls($match)){
      $contains=false;
      break;
    }
  }
  if($contains)$count++;
}
var_dump($count);

