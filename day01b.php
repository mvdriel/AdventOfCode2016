<?php

$positions = [];
$positions[] = '0,0';
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

  for($i=0;$i<$steps;$i++) {
    switch($heading) {
      case 'U':
        $y++;
      break;
    case 'R':
      $x++;
      break;
    case 'D':
      $y--;
      break;
    case 'L':
      $x--;
      break;
    }
    $new = $x . ',' . $y;
    if (in_array($new, $positions)) {
      var_dump(abs($x) + abs($y));
      exit;
    }

    $positions[] = $x . ',' . $y;
  }

}

