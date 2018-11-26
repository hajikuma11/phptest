<?php
$text = "2進数0.12";

$pos = strpos($text,'数');
$s_text = substr($text,$pos+3);

if ($s_text >= 1) {
  if (strstr($s_text,'.')) {
    $messageData = [
     'type' => 'text',
     'text' => "エラー\n1以上の小数点形式には対応していません。\n'2'or'10'進数0.'～～'\nのように入力してください"
    ];
  }

  if (strstr($text,'2進数')) {//２進数から
    $ten =bindec($s_text);
    $eig =decoct($ten);
    $sixt =dechex($ten);

    $messageData = [
     'type' => 'text',
     'text' => "[8]$eig\n[10]$ten\n[16]$sixt"
    ];
  }

  elseif (strstr($text,'8進数')) {//８進数から
    $ten =octdec($s_text);
    $sec =decbin($ten);
    $sixt =dechex($ten);

    $messageData = [
     'type' => 'text',
     'text' => "[2]$sec\n[10]$ten\n[16]$sixt"
    ];
  }

  elseif (strstr($text,'16進数')) {//１６進数から
    $ten =hexdec($s_text);
    $sec =decbin($ten);
    $eig =decoct($ten);

    $messageData = [
     'type' => 'text',
     'text' => "[2]$sec\n[8]$eig\n[10]$ten"
    ];
  }

  elseif (strstr($text,'進数') or strstr($text,'10進数')) {//１０進数から
    $sec =decbin($s_text);
    $eig =decoct($s_text);
    $sixt =dechex($s_text);

    $messageData = [
     'type' => 'text',
     'text' => "[2]$sec\n[8]$eig\n[16]$sixt"
    ];
  }

} else { echo "else\n";

$data = $s_text;

if (strstr($text,'2進数')) { echo "2sin\n";

  $val = '0.';
  while ($data != 0) {
    $data = $data * 2;
    if ($data >= 1) {
      $val .= '1';
      $data = $data - 1;
    } else {
      $val .= '0';
    }
  }
  $messageData = [
   'type' => 'text',
   'text' => "[10]$val"
  ];
  echo $val;

} elseif (strstr($text,'10進数')) {

  $reData = 0;
  for ($i=1;$i<=strlen(substr($val,2));$i++) {
    if ($val[$i+1] == 1) {
      $sum2 = 1;
      for ($j=0;$j<$i;$j++) {
        $sum2 = $sum2 / 2;
      }
      $reData += $sum2;
    }
  }
  $messageData = [
   'type' => 'text',
   'text' => "[2]$reData"
  ];

} else {
  $messageData = [
   'type' => 'text',
   'text' => "エラー\n2進数'0.～'\n10進数'0.～'\nの2種類が対応しています。"
  ];
}

}

echo $messageData[text];
