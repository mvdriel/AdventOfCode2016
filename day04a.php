<?php

$input = file_get_contents('day04.txt');
$lines = explode("\n", $input);

$result = 0;
foreach($lines as $line) {
  if($line=='') break;
  $checksum = explode('[', $line)[1];
  $checksum = explode(']', $checksum)[0];

  $name = explode('[', $line)[0];
  $name = explode('-', $name);
  $sector = array_pop($name);


  $name = implode('', $name);
  $letters = str_split($name);

  $counts = [];
  foreach($letters as $letter) {
    if(empty($counts[$letter])) $counts[$letter] = 0;
    $counts[$letter]++;
  }

  $k = array_keys($counts);
  $v = array_values($counts);
  array_multisort($v, SORT_DESC, $k, SORT_ASC);
  $counts = array_combine($k, $v);

  $calc = '';
  $i = 0;
  foreach($k as $letter) {
    if($i>4) break;
    $calc .= $letter;
    $i++;
  }

  if($calc == $checksum) {
    $result += $sector;
  }

}

var_dump($result);
