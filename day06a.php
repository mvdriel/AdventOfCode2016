<?php

$input = file_get_contents('day07.txt');
$lines = explode("\n", $input);

$result = '';
for($i=0;$i<strlen($lines[0]);$i++){
  $letters=[];
  foreach($lines as $line) {
    $l=substr($line,$i,1);
    if(empty($letters[$l])) $letters[$l] = 0;
    $letters[$l]++;
  }

  $k = array_keys($letters);
  $v = array_values($letters);
  array_multisort($v, SORT_DESC, $k, SORT_ASC);
  $letters = array_combine($k, $v);

  $result .= array_keys($letters)[0];
}
var_dump($result);
