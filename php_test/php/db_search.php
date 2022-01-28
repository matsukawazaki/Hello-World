<?php
  $pdo = new PDO('mysql:host=localhost;dbname=denkaru2_test;charset=utf8','test','test');
  $request_str = $_REQUEST['sql_str'];
  $request_str = ltrim($request_str,'"');  // 前の"をはずす
  $request_str = rtrim($request_str,'"');  // 後の"をはずす
  $request_array = $pdo->query($request_str);
  $request_array = $request_array->fetchAll();

  $desc = $pdo->query('desc drugs');
  $desc = $desc->fetchAll();

  $array_all = [];

  for ( $i = 0; $i < count($request_array); $i++ ) {
    $array = [];
    for ( $l = 0; $l < count($desc); $l++) {
      $array[$desc[$l][0]] = $request_array[$i][$l];
// $array[$desc[$i][0] -> mysqlで desc drugs; をやってみたらわかる
    }
    $array_all[$i] = $array;
  }

  $array_str = json_encode($array_all,JSON_UNESCAPED_UNICODE);
  echo $array_str;

/*
php 文字列の最初の文字を切り取る ltrim()
php 文字列の最後の文字を切り取る rtrim()

配列
php(配列) -> javascript(JSON)
php側
json_encode($array,JSON_UNESCAPED_UNICODE); JSON文字列に変換 -> jsへ送信可
二つ目の引数は日本語の文字化けを避けるためのもの
js側
上記を受け取る（この段階では文字列）
JSON.parse(res); JSON形式に変換される

javascript(JSON) -> php(配列)
これは少し工夫が必要？
js側でJSONを文字列に変換することは簡単
しかし、phpに送った文字列を配列に戻すのが難しそう
単純な配列なら簡単だが、入れ子になっているような複雑な配列の場合
処理するのが大変そう
*/
?>
