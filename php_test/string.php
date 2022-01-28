ba$$

<?php

echo $_REQUEST['str'] . '<br>';

$str = '%ba%';
echo $str . " = " . bin2hex($str);

$str_con = mb_convert_encoding($str,'sjis-win');

echo $str_con;


?>
