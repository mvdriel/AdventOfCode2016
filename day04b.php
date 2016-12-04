<?php

$input = file_get_contents('day04.txt');
$lines = explode("\n", $input);

$alphabet = 'abcdefghijklmnopqrstuvwxyz';

$result = 0;
foreach($lines as $line) {
  if($line=='') break;
  $checksum = explode('[', $line)[1];
  $checksum = explode(']', $checksum)[0];

  $name = explode('[', $line)[0];
  $name = explode('-', $name);
  $sector = array_pop($name);

  $name = implode('-', $name);
  $letters = str_split($name);

  $decrypted = '';
  foreach($letters as $letter) {
    if($letter == '-') $decrypted .= ' ';
    else {
      $pos = strpos($alphabet, $letter);
      $pos += $sector;
      $pos %= 26;
      $decrypted .= substr($alphabet, $pos, 1);
    }
  }

  if (strpos($decrypted, 'north') !== false) {
      var_dump($sector);
  }
}
