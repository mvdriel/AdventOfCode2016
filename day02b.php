<?php

$input = file_get_contents('day02.txt');
$lines = explode("\n", $input);

$positions = [[0,0,1,0,0], [0,2,3,4,0], [5,6,7,8,9],[0,'A','B','C',0],[0,0,'D',0,0]];

$x = 1;
$y = 3;

foreach($lines as $line) {
  if($line == '') break;
  $instructions = str_split($line);
  foreach($instructions as $instruction) {
    switch($instruction) {
      case 'U':
        if(!empty($positions[$y-1][$x])) $y--;
        break;
      case 'L':
        if(!empty($positions[$y][$x-1])) $x--;
        break;
      case 'D':
        if(!empty($positions[$y+1][$x])) $y++;
        break;
      case 'R':
        if(!empty($positions[$y][$x+1])) $x++;
        break;
    }
  }
  var_dump($positions[$y][$x]);
}
