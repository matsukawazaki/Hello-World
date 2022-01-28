test

<?php
  echo 'oreore';

$json_str = "{'id':1,'drug_name':'オランザピン'}";
$json_array = json_encode($json_str,true);
echo gettype($json_array);

/*
  $pdo = new PDO('mysql:host=localhost;dbname=denkaru2_test;charset=utf8','test','test');
//  $array = $pdo->query($_REQUEST['sql_str']);
  $str_test = 'select * from drugs where drug_id = 1';
  $array = $pdo->query($str_test);
//  echo $_REQUEST['sql_str'];
  echo $array;
//  $array = $array->fetchAll();
//  echo $array[0]['name'];
//  echo $_REQUEST['sql_str'];
  $array = $_REQUEST['sql_str'];
  $str = explode(',',$array);
//  echo $str[1];
*/
?>
