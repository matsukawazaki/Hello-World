<?php
  function make_rptype(){
    $str = "<label>種類</label>";
    $str = $str . "<select id='rp_typeSelect'><option>通常</option><option>頓服</option></select>";
    echo $str;
  }

  function make_rp1(){
    $str = "<label>Rp1</label>";
    $str = $str . "<select id='rp1'><option>1</option><option>2</option></select>";
    echo $str;
  }

  function make_rp2(){
    $str = "<label>Rp2</label>";
    $str = $str . "<select id='rp2'><option>1</option><option>2</option></select>";
    echo $str;
  }

  function make_checkbox(){
    $str = "<input type='checkbox' id='check_m'><label for='check_m'>朝</label>";
    $str = $str . "<input type='checkbox' id='check_n'><label for='check_n'>昼</label>";
    $str = $str . "<input type='checkbox' id='check_a'><label for='check_a'>夕</label>";
    $str = $str . "<input type='checkbox' id='check_v'><label for='check_v'>眠前</label>";
    echo $str;
  }

function make_old($width){
  $str = "<table><tr><th>朝</th><th>昼</th><th>夕</th><th>眠前</th></tr><tr>";
  $str = $str . "<td><input type='text' style='width:" . $width . "px'></td>";
  $str = $str . "<td><input type='text' style='width:" . $width . "px'></td>";
  $str = $str . "<td><input type='text' style='width:" . $width . "px'></td>";
  $str = $str . "<td><input type='text' style='width:" . $width . "px'></td>";
  $str = $str . "</table>";
  echo $str;
}

function make_timingTable($width){
    $str = "<table><tr>";
    $str = $str . "<th><input type='checkbox' id='check_m'><label for='check_m'>朝</label></th>";
    $str = $str . "<th><input type='checkbox' id='check_n'><label for='check_n'>昼</label></th>";
    $str = $str . "<th><input type='checkbox' id='check_a'><label for='check_a'>夕</label></th>";
    $str = $str . "<th><input type='checkbox' id='check_v'><label for='check_v'>眠前</label></th></tr>";

  $str = $str . "<tr>";
  $str = $str . "<td><input type='text' style='width:" . $width . "px'></td>";
  $str = $str . "<td><input type='text' style='width:" . $width . "px'></td>";
  $str = $str . "<td><input type='text' style='width:" . $width . "px'></td>";
  $str = $str . "<td><input type='text' style='width:" . $width . "px'></td>";
  $str = $str . "</tr></table>";
  echo $str;

}

?>

<table id='rp_inputField'>
 <tr id='rp_inputField1'><td><?php make_rptype(); ?></td><td><?php make_rp1(); ?></td><td><?php make_rp2(); ?></td><td></td></tr>
 <tr id='rp_inputField2'><td><label>薬剤検索</label></td><td colspan='3'><input type='text'></td></tr>
 <tr id='rp_inputField3'><td><label>薬剤</label></td><td colspan='3'><select><option>oranzapine</option></select></td><td><label>量</label></td><td><input type='text' style='width:50px'></td><td><select><option>mg</option></td><td><select><option>１分服</option></select></td><td rowspan='2'><label>日数</label></td><td rowspan='2'><input type='text' style='width:50px'><label>日分</label></td></tr>
 <tr id='rp_inputField4><td><label>コメント</label></td><td colspan='3'><input type='text'></td><td colspan='3'><?php make_timingTable(30); ?></td><td colspan='2'></td></tr>
</table>

