<?php
$file = 'test.txt';
file_put_contents($file,"");

require './vendor/autoload.php';

$DATE = date("Ymd",time());

$url = 'test.html';

$html = file_get_contents($url);
$doc = phpQuery::newDocument($html);

$file = 'test.txt';
$current = file_get_contents($file);

$cont = $doc[".min"]->text();

$conts = explode("\n", $cont);

$Hcnt = 5;
$mtxt = $DATE."\n".$Hcnt."時\n";
$tmp = 0;
for ($i=0;$i<count($conts);$i++) {
  if ($tmp >= $conts[$i] && $i != count($conts)-1) {
    $Hcnt++;
    $mtxt .= $Hcnt."時\n";
    if ($Hcnt == 24) {
      $Hcnt = 0;
    }
  }
  if ($i == count($conts)-1) {
    $mtxt .= $conts[$i];
  } else {
    $mtxt .= $conts[$i]."\n";
  }
  file_put_contents($file,$mtxt);
  $tmp = $conts[$i];
}
echo count($conts);
