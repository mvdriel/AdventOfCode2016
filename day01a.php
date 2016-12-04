<?php

$x = 0;
$y = 0;
$heading = 'U';

$directions = 'URDL';

$input = file_get_contents('day01.txt');
$input = explode(', ', $input);
foreach($input as $command) {
  $turn = substr($command, 0, 1);
  $steps = substr($command, 1);

  $index = strpos($directions, $heading);
  if ($turn == 'R') {
    $index++;
  } elseif($turn == 'L') {
    $index--;
  }
  $index %= 4;
  $heading = substr($directions, $index, 1);

  switch($heading) {
    case 'U':
      $y += $steps;
      break;
    case 'R':
      $x += $steps;
      break;
    case 'D':
      $y -= $steps;
      break;
    case 'L':
      $x -= $steps;
      break;
  }
}

var_dump(abs($x) + abs($y));
