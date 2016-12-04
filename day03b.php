<?php

$input = file_get_contents('day03.txt');
$lines = explode("\n", $input);

$count = 0;

foreach($lines as $i => $line) {
  if($line == '') break;
  $parts = explode(' ', $line);

  $j = 0;
  foreach($parts as $part) {
    if($part != '') {
      $matrix[$i][$j] = $part;
      $j++;
    }
  }
}

$triangles = [];
$j = 0;

for($i=0;$i<3;$i++) {
  foreach($matrix as $row) {
    $triangles[$j/3][$j%3] = $row[$i];
    $j++;
  }
}

foreach($triangles as $sides) {
  if(
    ($sides[0] + $sides[1] > $sides[2]) &&
    ($sides[1] + $sides[2] > $sides[0]) &&
    ($sides[0] + $sides[2] > $sides[1])) {
    $count++;
  }
}

var_dump($count);
