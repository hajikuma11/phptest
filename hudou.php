<?php
$data = 0.8125;
$cnt=0;
$val = '0.';
while ($data != 0 || $cnt <= 15) {
  $data = $data * 2;
  if ($data >= 1) {
    $val .= '1';
    $data = $data - 1;
  } else {
    $val .= '0';
  }
  $cnt++;
  echo $data."\n";
} echo $val;
 ?>
