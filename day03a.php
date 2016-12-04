<?php

$input = file_get_contents('day03.txt');
$lines = explode("\n", $input);

$count = 0;

foreach($lines as $line) {
  if($line == '') break;
  $sides = [];
  $parts = explode(' ', $line);

  foreach($parts as $part) {
    if($part != '') {
      $sides[] = $part;
    }
  }

  if(
    ($sides[0] + $sides[1] > $sides[2]) &&
    ($sides[1] + $sides[2] > $sides[0]) &&
    ($sides[0] + $sides[2] > $sides[1])) {
    $count++;
  }
}

var_dump($count);
