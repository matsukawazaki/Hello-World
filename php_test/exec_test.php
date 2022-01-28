<?php
  $string = 'firefox';
  exec($string,$return1,$return2);
  print_r($return1);
  echo "return2 = $return2";
?>
