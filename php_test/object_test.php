<?php session_start(); ?>
<!DOCTYPE html>
<meta charset='UTF-8'>
<link rel='stylesheet' href='style.css'>

<body>
<div id='header'>
  <label> 日付 </label>
    <strong id='register_date'><?php echo date("Ymd"); ?></strong>
  <label> 患者ID </label>
    <strong><?php echo $_SESSION['patiant']['karte_id']; ?></strong>
  <label style='display:undisplay' id='register_p_id'><?php echo $_SESSION['patiant']['p_id']; ?></label>
  <label> 患者氏名 </label>
    <strong><?php echo $_SESSION['patiant']['kanji_f_name'] . ' ' . $_SESSION['patiant']['kanji_l_name'] ?></strong>
  <label> 医師 </label>
    <strong id='register_d_id'><?php echo $_SESSION['doctor']['d_id'] ?></strong></br>
  <label> 過去の処方 </label>
    <select></select>
  <label> 登録 </label>
    <input type='button' value='登録' id='btn_register'>
</div>

  <div id='tmp_field' class='undisplay'>
    <label>repair</label><label>RP1</label><label id="tmp_rp1"></label><label>RP2</label><label id="tmp_rp2"></label><input type='button' value='remove' id='rp_repair' onclick='remove_obj();'>
    <label>remove</label><input type='button' value='remove' id='rp_repair'>
  </div>
  <div>
    <table id='tbl_d'>
    </table>
    <table id='tbl_t'>
    </table>
    <table id='tbl_e'>
    </table>
    <table id='rp_inputField'>
      <tr id='rp_inputField1'>
        <td><?php make_rptype(); ?></td>
        <td><?php make_rp1(); ?></td>
        <td><?php make_rp2(); ?></td>
        <td></td>
      </tr>

      <tr id='rp_inputField2'>
        <td><label>薬剤検索 rp_drugRetrieve</label></td>
        <td colspan='3'><input type='text' id='rp_drugRetrieve'></td>
      </tr>

      <tr id='rp_inputField3'>
        <td><label>薬剤 rp_drugSelect</label></td>
        <td colspan='3'><select id='rp_drugSelect'><option>oranzapine</option></select></td>
        <td><label>量 rp_amount rp_unit rp_times</label></td>
        <td><input type='text' style='width:50px' id='rp_amount' onchange='count_check()'></td>
        <td><select id='rp_unit'>
          <option value='mg'>mg</option>
          <option value='g'>g</option>
          <option value='tab'>錠</option>
          <option value='bot'>本</option>
        </select></td>
        <td><select id='rp_times' class='tmp_drug'><option value='1'>１分服</option><option value='2'>２分服</option><option value='3'>３分服</option><option value='4'>４分服</option></select></td>
        <td rowspan='2'><label>日数 rp_days</label></td>
        <td rowspan='2'><input type='text' style='width:50px' id='rp_days' class='tmp_drug'><label class='tmp_drug'>日分</label></td>
<!--        <td><label>submit btn</label><input type='button' value='add'></td>
-->
      </tr>

      <tr id='rp_inputField4'>
        <td><label>コメント rp_option</label><br>
            <label>定型文 rp_option_ex</label></td>
        <td colspan='3'><input type='text' id='rp_option'><br>
                        <select id='rp_option_ex'>
                          <option value='0'></option>
                          <option value='1'>不穏時</option>
                          <option value='2'>疼痛時</option>
                        </select></td>
        <td colspan='3'><?php make_timingTable(30); ?></td>
        <td colspan='2'><table class='tmp_drug'><tr></tr><th><label>食前rp_before</label></th><tr><td><input type='checkbox' id='rp_before' class='tmp_drug'></td></tr></table></td>
      </tr>
    </table>

    <table id='tbl_submit'>
      <tr>
        <th>add</th>
        <th>insert_above</th>
        <th>insert_below</th>
        <th>remove</th>
        <th>repair</th>
        <th>cancel</th>
      </tr>
      <tr>
        <td><input type='button' value='add' id='btn_add'></td>
        <td><input type='button' value='insert_above' id='btn_above'></td>
        <td><input type='button' value='insert_below' id='btn_below'></td>
        <td><input type='button' value='remove' id='btn_remove' class='undisplay'></td>
        <td><input type='button' value='repair' id='btn_repair' class='undisplay'></td>
        <td><input type='button' value='cancel' id='btn_cancel' class='undisplay'></td>
      </tr>
    </table>
  </div>
  <br>
  <br>
  <div>
    <label>database</label>
    <table>
      <tr><th>database</th><th>input</th><th>object</th><th>table</th></tr>
      <tr><td>drug_id</td><td rowspan="5">rp_drugSelect<br></td>
                                <td rowspan="5">drug_info[0] -> id<br>
                                                drut_info[1] -> name<br>
                                                drug_info[2] -> type<br>
                                                drug_info[3] -> amount<br>
                                                drug_info[4] -> unit</td></tr>
      <tr><td>drug_name</td><td>tbl_drug -> drug_info[1]</td></tr>
      <tr><td>drug_amount 400</td><td> tbl_amount -> rp_amount</td></tr>
      <tr><td>drug_type t P</td><td>tbl_unit -> drug_info[3]</td></tr>
      <tr><td>unit       mg</td></tr>
      <tr><td></td><td>rp_times</td><td></td><td>tbl_times -> rp_times</td></tr>
      <tr><td></td><td>rp_division</td><td></td><td>tbl_division -> rp_division</td></tr>
      <tr><td></td><td>rp_before</td><td></td><td>tbl_before</td></tr>
      <tr><td></td><td>rp_days</td><td></td><td>tbl_dayt</td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td>clasificasion</td></tr>
      <tr><td>option</td></tr>
      <tr><td>max_dose</td></tr>
    </table>
  </div>

<?php
  function make_rptype(){
    $str = "<label>種類 rp_type</label>";
    $str = $str . "<select id='rp_type'><option value='0'>通常</option><option value='1'>頓服</option><option value='2'>その他</option></select>";
    echo $str;
  }
  
  function make_rp1(){
    $str = "<label>rp1</label>";
    $str = $str . "<select id='rp1'><option>1</option><option>2</option></select>";
    echo $str;
  }
  
  function make_rp2(){
    $str = "<label>rp2</label>";
    $str = $str . "<select id='rp2' class='tmp_drug_ex'><option>1</option><option>2</option></select>";
    echo $str;
  }

// rp_
  function make_checkbox(){
    $str = "<input type='checkbox' id='rp_check_m'><label for='check_m'>朝</label>";
    $str = $str . "<input type='checkbox' id='rp_check_n'><label for='check_n'>昼</label>";
    $str = $str . "<input type='checkbox' id='rp_check_a'><label for='check_a'>夕</label>";
    $str = $str . "<input type='checkbox' id='rp_check_v'><label for='check_v'>眠前</label>";
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
    $str = "<table class='tmp_drug'><tr id='check_division'>";
    $str = $str . "<th><input type='checkbox' name='check_division' id='rp_check_m' class='tmp_drug' onchange='count_check();' checked><label for='check_m'>朝 rp_check_m rp_amount_m</label></th>";
    $str = $str . "<th><input type='checkbox' name='check_division' id='rp_check_n' onchange='count_check()'><label for='check_n'>昼</label></th>";
    $str = $str . "<th><input type='checkbox' name='check_division' id='rp_check_a' onchange='count_check()'><label for='check_a'>夕</label></th>";
    $str = $str . "<th><input type='checkbox' name='check_division' id='rp_check_v' onchange='count_check()'><label for='check_v'>眠前</label></th></tr>";

  $str = $str . "<tr>";
  $str = $str . "<td><input type='text' style='width:" . $width . "px' class='amount_division' id='amount_d_m'></td>";
  $str = $str . "<td><input type='text' style='width:" . $width . "px' class='amount_division' id='amount_d_n'></td>";
  $str = $str . "<td><input type='text' style='width:" . $width . "px' class='amount_division' id='amount_d_a'></td>";
  $str = $str . "<td><input type='text' style='width:" . $width . "px' class='amount_division' id='amount_d_v'></td>";
  $str = $str . "</tr></table>";
  echo $str;
}
?>

<script>
// rp1 select を選択した時に rp2 select を変化させる
// rp1 に addEventListener をつける
// rp2 に addEventListener をつける
// variables
  var btn_add = document.getElementById('btn_add');
  var rp1 = document.getElementById('rp1');
  var rp2 = document.getElementById('rp2');
  var rp_drugRetrieve = document.getElementById('rp_drugRetrieve');
  var rp_amount = document.getElementById('rp_amount');
  var rp_times = document.getElementById('rp_times');
  var select_drugs = document.getElementById('rp_drugSelect');
  var check_division = document.getElementById('check_division');
  var rp_check_m = document.getElementById('rp_check_m');
  var rp_check_n = document.getElementById('rp_check_n');
  var rp_check_a = document.getElementById('rp_check_a');
  var rp_check_v = document.getElementById('rp_check_v');
  var amount_d_m = document.getElementById('amount_d_m');
  var amount_d_n = document.getElementById('amount_d_n');
  var amount_d_a = document.getElementById('amount_d_a');
  var amount_d_v = document.getElementById('amount_d_v');

// objects
  var obj = {'d':{},'t':{},'e':{}};
//  var obj_1 = {};
//  var obj_tmp = {};
//  var obj_ext = {};
  var d_obj_keys = {1:'drug_type',2:'tbl_drug',3:'tbl_amount',4:'tbl_unit',5:'tbl_times',6:'tbl_division',7:'tbl_before',8:'tbl_option',9:'tbl_days'};
  var t_obj_keys = {1:'drug_type',2:'tbl_drug',3:'tbl_amount',4:'tbl_unit',5:'tbl_option',6:'tbl_days'};
  var tl_obj_keys = {1:'drug_type',2:'tbl_drug',3:'tbl_amount',4:'tbl_unit',5:'tbl_option'};
  var e_obj_keys = {1:'drug_type',2:'tbl_drug',3:'tbl_amount',4:'tbl_unit',5:'tbl_option'};
  var obj_keys_type = {1:'通常',2:'臨時',3:'頓服'};
  var obj_times = {1:'1X',2:'2X',3:'3X',4:'4X'};
  var obj_drug_types = {
        'dt':{0:'錠'},
        'dP':{0:'包'},
        'dp':{0:'mg',1:'g'},
        'dP':{0:'包'},
        'dL':{0:{0:'p',1:'包'}},
        'dl':{0:{0:'mg',1:'mg'},1:{0:'ml',1:'ml'}},
        'ep':{0:'枚'},
        'tl':{0:'本'},
                       };
  var obj_drug_type = {'d':'0','t':'1','e':'2'};

/* functions
db_access : データベースにアクセスする関数
reset_input
count_check : 薬の総量を分割回数で割り、それをinput内に代入する
make_checked_array : 分割投与を[1-0-1-0]の配列で返す
obj_check : btn_add などが押された時にフォームが正しいかチェックする
make_select
make_table
make_table_ii
rp_drugRetrieve -> make_rp_unit
rp_drugSelect -> make_rp_unit
db_access -> make_rp_unit
rp_type に関与 btn_add db_access
Rp に関与 make_select
select に関与 make_tmp_select
*/

// function

function db_access(type,str){
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 ) {
      if (xhr.status == 200 ) {
if ( type == 'register' ) {
  var res = xhr.responseText;
  if ( res == 0 ) {
    console.log("register OK!");
  } else {
    console.log("register MISS!");
  }
} else {
        var res = xhr.responseText;
console.log("res = " + res);
        res = JSON.parse(res);
        select_drugs.innerHTML = '';
        for ( var i = 0; i < res.length; i++ ){
          var select = document.createElement('option');
          select.value = res[i]['drug_id'] + '_' + res[i]['drug_name'] + '_' +res[i]['drug_type'] + '_' + res[i]['drug_amount'] + '_' + res[i]['drug_unit'] + '_' + res[i]['drug_Gname'];
//          select.innerText = res[i]['drug_name'] + '(' + res[i]['drug_amount'] + ')';  // drug_info
          select.innerText = res[i]['drug_name'];  // drug_info
          select_drugs.appendChild(select);
        }
// rp_type を再指定したい場合は db_access の後に行わないとこちらの指定が反映されてしまう
        var m_drug_type = res[0]['drug_type'].substr(0,1);
        var s_drug_type = res[0]['drug_type'].substr(1);
console.log('m_drug_type = ' + m_drug_type);
console.log('s_drug_type = ' + s_drug_type);
//        if ( res[0]['drug_type'] == 'p' ) {
/*        if ( m_drug_type = 'd' ) {
          rp_type.options[0].selected = true;
        } else if ( m_drug_type = 't' ) {
          rp_type.options[1].selected = true; 
        } else if ( m_drug_type = 'e' ) {
          rp_type.options[2].selected = true; 
        } else if ( res[0]['drug_type'] == 't' ) {
          rp_type.options[0].selected = true;
        } */
        make_rp_unit();
        make_tmp_select();
        return res;
//        break;
      }
}
    }
  }
  if ( type == 'register' ) {
    var xhr_get = 'php/db_register.php?sql_str="' + str + '"';
    xhr.open('GET', xhr_get);
    xhr.send(null);
  } else {
    var xhr_get = 'php/db_search.php?sql_str="' + str + '"';
    xhr.open('GET', xhr_get);
    xhr.send(null);
  }
}


  function reset_input(){
    rp_drugRetrieve.value = '';
    rp_amount.value = '';
  }
  window.onload = reset_input;

function make_input(){
  rp_drugRetrieve.value = '';
  rp_amount.value = '';
//  btn_add.value = 'add';
}

function count_check(){
  var num = 0;
  if ( rp_check_m.checked == true ) {
    num ++;
    amount_d_m.classList.remove('undisplay');
  } else {
    amount_d_m.classList.add('undisplay');
  }
  if ( rp_check_n.checked == true ) {
    num ++;
    amount_d_n.classList.remove('undisplay');
  } else {
    amount_d_n.classList.add('undisplay');
  }
  if ( rp_check_a.checked == true ) {
    num ++;
    amount_d_a.classList.remove('undisplay');
  } else {
    amount_d_a.classList.add('undisplay');
  }
  if ( rp_check_v.checked == true ) {
    num ++;
    amount_d_v.classList.remove('undisplay');
  } else {
    amount_d_v.classList.add('undisplay');
  }
  rp_times.options[num-1].selected = true;
  var check_array = make_checkedArray();
  var obj_key = {0:amount_d_m,1:amount_d_n,2:amount_d_a,3:amount_d_v};
  var d_num = parseInt(rp_amount.value) / num;
  for ( var d_i = 0; d_i < Object.keys(obj_key).length; d_i++ ) {
    if ( check_array[d_i] == 1 ) {
      obj_key[d_i].value = d_num;
    } else {
      obj_key[d_i].value = 0;
    }
  }
// now4
}

function make_checkedArray(){
  //まずはチェックのついた rp_check_? を [1,0,1,0] のような形にする
  var check_array = [];
  if ( rp_check_m.checked == true ) {
    check_array.push(1);
  } else {
    check_array.push(0);
  }
  if ( rp_check_n.checked == true ) {
    check_array.push(1);
  } else {
    check_array.push(0);
  }
  if ( rp_check_a.checked == true ) {
    check_array.push(1);
  } else {
    check_array.push(0);
  }
  if ( rp_check_v.checked == true ) {
    check_array.push(1);
  } else {
    check_array.push(0);
  }
  return check_array;
}

// now3
function obj_check(){
  if ( !rp_amount.value ) {
    console.log("empty!");
  }
// checkがうまく働いていない 要修正！
  var return_num = 0;
// 必要項目が入力されているか
console.log("check rp_amount.value = " + rp_amount.value);
console.log("check rp_amount.value isNaN = " + isNaN(rp_amount.value));
console.log("check rp_days.value isNaN = " + isNaN(rp_days.value));
console.log("check rp_days.value = " + rp_days.value );
  if ( rp_amount.value == undefined ) {
    return_num = 1;
  }
  if ( rp_days.value == '' ) {
    return_num = 1;
  } else if ( isNaN(rp_days.value) ) {
    return_num = 1;
  }
// 投与量と投与量の合計のチェック
  var check_array = make_checkedArray();
  var total = 0;
  var c_d = {0:amount_d_m.value,1:amount_d_n.value,2:amount_d_a.value,3:amount_d_v.value};
  for ( var i = 0; i < check_array.length; i++ ){
    if ( check_array[i] == 1 ) {
      total += parseFloat(Number(c_d[i]));
    }
  }
  if ( parseFloat(Number(rp_amount.value)) != total ) {
    alert('投与量と投与量の合計が違います');
    return_num = 1;
  }

  return return_num;
}

rp1.addEventListener('change',function(){
  var rp_num = this.value;
  if ( rp_type.selectedIndex == 0 ) {
    make_select(rp_num,obj['d']);
  } else if ( rp_type.selectedIndex == 1 ) {
    make_select(rp_num,obj['t']);
  } else if ( rp_type.selectedIndex == 2 ) {
    make_select(rp_num,obj['e']);
  }
});

rp_option_ex.addEventListener('change',function(){
  console.log("rp_option_ex.innerText = " + this.options[this.selectedIndex].innerText);
  rp_option.value = this.options[this.selectedIndex].innerText;
});

rp_drugSelect.addEventListener('change',make_rp_unit);

function make_rp_unit(){
// drugtypeによりrp_unitのoptionを変更する  
  var a_rp_type = rp_drugSelect.options[rp_drugSelect.options.selectedIndex].value.split('_')[2];
  var m_rp_type = rp_drugSelect.options[rp_drugSelect.options.selectedIndex].value.split('_')[2].substr(0,1);
  var s_rp_type = rp_drugSelect.options[rp_drugSelect.options.selectedIndex].value.split('_')[2].substr(1);
  if ( m_rp_type == 'd' ) {
//    make_unit();
    console.log('tab');
    rp_unit.innerHTML = '';
    for ( var i = 0; i < Object.keys(obj_drug_types[a_rp_type]).length; i++ ) {
      var option = document.createElement('option');
      option.value = a_rp_type + i; // obj_drug_types['dt'][i][0];
      option.innerText = obj_drug_types[a_rp_type][i]; // obj_drug_types['t'][i][1];
      rp_unit.appendChild(option);
console.log(obj_drug_types[a_rp_type][i]);
    }
    if ( btn_remove.classList.contains('undisplay') ) {
      rp_type.options[0].selected = true;
    }
  } else if ( m_rp_type  == 't' ) {
    if ( btn_remove.classList.contains('undisplay') ) {
      rp_type.options[1].selected = true;
    }
    rp_unit.innerHTML = '';
    for ( var i = 0; i < Object.keys(obj_drug_types[a_rp_type]).length; i++ ) {
      var option = document.createElement('option');
      option.value = a_rp_type + i;
      option.innerText = obj_drug_types[a_rp_type][i];
      rp_unit.appendChild(option);
    }
  } else if ( m_rp_type  == 'e' ) {
    if ( btn_remove.classList.contains('undisplay') ) {
      rp_type.options[2].selected = true;
    }
    rp_unit.innerHTML = '';
    for ( var i = 0; i < Object.keys(obj_drug_types[a_rp_type]).length; i++ ) {
      var option = document.createElement('option');
      option.value = a_rp_type + i;
      option.innerText = obj_drug_types[a_rp_type][i];
      rp_unit.appendChild(option);
    }
  }
}  


rp_type.addEventListener('change',make_tmp_select);

function make_tmp_select(){
// tmp_drug は classname tmp_drug classはまとめて処理
// rp2 は tmp_drug_ex 塗り薬以外は rp2 = 1 で固定
  var tmp_drugs = document.getElementsByClassName('tmp_drug');
if ( rp_type.options.selectedIndex == 0 ) {
  make_select(Object.keys(obj['d']).length+1,obj['d']);
  for ( let i = 0; i<tmp_drugs.length; i++ ){
    tmp_drugs[i].classList.remove('undisplay');
  }
} else if ( rp_type.options.selectedIndex == 1 ) {
  make_select(Object.keys(obj['t']).length+1,obj['t']);
  for ( let i = 0; i<tmp_drugs.length; i++ ){
    tmp_drugs[i].classList.add('undisplay');
  }
} else if ( rp_type.options.selectedIndex == 2 ) {
  make_select(Object.keys(obj['e']).length+1,obj['e']);
  for ( let i = 0; i<tmp_drugs.length; i++ ){
    tmp_drugs[i].classList.add('undisplay');
  }
}
}

// make_obj で obj_t を追加できるようにする
// 通常drug の後に obj_t を追加していく
// rp1 のカウントを通常drugの後の数字のみ選択できるようにする

function make_select(rp1_num,obj){ // rp1,rp2 を作るfunction
// obj['d'] の時は rp1_num = 入力中のrp1_num
// obj['t'] の時は rp1_num = obj['t'].length + 1
  rp1.innerHTML = '';
  rp2.innerHTML = '';
  for ( var i = 0; i < Object.keys(obj).length + 1; i++) {
    var option1 = document.createElement('option');
    option1.innerText = i + 1;
    option1.value = i + 1;
    if ( i == rp1_num -1 ) {
      option1.selected = true;
    }
    rp1.appendChild(option1);
  }
  if ( obj[rp1_num-1] ) {
    for ( let l = 0; l < Object.keys(obj[rp1_num-1]).length + 1; l++) {
    var option2 = document.createElement('option');
    option2.innerText = l+1;
    option2.value = l+1;
    rp2.appendChild(option2);
    }
  } else {
    var option2 = document.createElement('option');
    option2.innerText = 1;
    option2.value = 1;
    rp2.appendChild(option2);
  }
}

function make_repair_select(num_1,num_2,obj_2,type_obj){ // tr click時のみ使用
  rp1.innerHTML = '';
  rp2.innerHTML = '';
  var option1 = document.createElement('option');
  var option2 = document.createElement('option');
  option1.innerText = num_1;
  option1.value = num_1;
  option2.innerText = num_2;
  option2.value = num_2;
  rp1.appendChild(option1);
  rp2.appendChild(option2);
// make_rpDrugSelect(obj_2['rp_drug'][1]);
// str = "select * from drugs where drug_Gname=obj_2['rp_drug'][5]";
// db_access(type,str);
  var str = "select * from drugs where drug_Gname = '" + obj_2['rp_drug'][5] + "'";
  var type = "p";
  db_access(type,str);
  rp_amount.value = obj_2['rp_amount'];
  rp_times.options[obj_2['rp_times']-1].selected = true;
  var division_array = obj_2['rp_division'].split('_');
  if ( division_array[0] != 0 ) {
    rp_check_m.checked = true;
    amount_d_m.value = division_array[0];
    amount_d_m.classList.remove('undisplay');
  } else {
    rp_check_m.checked = false;
    amount_d_m.value = 0;
    amount_d_m.classList.add('undisplay');
  }
  if ( division_array[1] != 0 ) {
    rp_check_n.checked = true;
    amount_d_n.value = division_array[1];
    amount_d_n.classList.remove('undisplay');
  } else {
    rp_check_n.checked = false;
    amount_d_n.value = 0;
    amount_d_n.classList.add('undisplay');
  }
  if ( division_array[2] != 0 ) {
    rp_check_a.checked = true;
    amount_d_a.value = division_array[2];
    amount_d_a.classList.remove('undisplay');
  } else {
    rp_check_a.checked = false;
    amount_d_a.value = 0;
    amount_d_a.classList.add('undisplay');
  }
  if ( division_array[3] != 0 ) {
    rp_check_v.checked = true;
    amount_d_v.value = division_array[3];
    amount_d_v.classList.remove('undisplay');
  } else {
    rp_check_v.checked = false;
    amount_d_v.value = 0;
    amount_d_v.classList.add('undisplay');
  }

  btn_add.classList.add('undisplay');
  btn_above.classList.add('undisplay');
  btn_below.classList.add('undisplay');
  btn_remove.classList.remove('undisplay');
  btn_repair.classList.remove('undisplay');
  btn_cancel.classList.remove('undisplay');
}

function test(object){
  console.log(Object.keys(object['d']).length);
}

// ??? ここから修正 obj の構造を変えたため
function make_table(tbl,obj_type,obj_keys){
  var object = obj[obj_type];
  var str = "<tr><th>RP1</th><th>RP2</th>";
  for ( var i = 0; i < Object.keys(obj_keys).length; i++ ) {
    str += "<th>" + obj_keys[i+1] + "</th>";
  }
  str += "</tr>";
  tbl.innerHTML = str;
  if ( Object.keys(object).length == 0 ) {
    var tr = document.createElement('tr');
    str = '<td></td><td>新規追加</td><td></td><td></td>';
    tr.innerHTML = str;
    tbl.appendChild(tr);
  } else {
    for ( let i = 0; i < Object.keys(object).length; i++ ) {
      for ( let l = 0; l < Object.keys(object[i]).length; l++ ) {
        var tr = document.createElement('tr');
        if ( l == 0 ) {  // Rp2 の 一番上の空白の行
          var str1 = '<td rowspan="' + (Object.keys(object[i]).length + 1 )  + '">' + (i+1) + '</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>';
console.log("length + 1 = " + Object.keys(object[i]).length + 1 );
          var tr1 = document.createElement('tr');
          tr1.innerHTML = str1;
          tbl.appendChild(tr1);
          var str = '<td>' + (l+1) + '</td>';
// obj[obj_type][i][l]['drug_type'] により場合分けが必要か
// 2T 不穏時 14回分 'tl'  1本   14枚 など
// 場合わけは make_table_ii の中で行う
          for ( var ii = 0; ii < Object.keys(obj_keys).length; ii++) {
            str = make_table_ii(obj_type,str,i,l,ii);
          }
        //make_table_ii();
        } else {  // Rp2 の薬の表示のための for loop
          var str = '<td>' + (l+1) + '</td>';
          for ( var ii = 0; ii < Object.keys(obj_keys).length; ii++) {
            str = make_table_ii(obj_type,str,i,l,ii);
          }
        }
        tr.id = i + '_' + l;
        tr.addEventListener('click',function(){
          tmp_field.classList.remove('undisplay');
remove_pikapika();
          var pikapika_id = i + '_' + l;
          var pikapika = document.getElementById(pikapika_id);
          this.classList.add('pikapika');
console.log("this = " + this);
// ここにmake_selectを入れてclick時はremoveとrepairのみ表示されるようにする
          make_repair_select(i+1,l+1,object[i][l],obj_type);
console.log("type = " + obj_drug_type[obj_type]);
// 引数に rp_type を指定する
          make_rp_type(obj_drug_type[obj_type]);
          tmp_rp1.innerText = (i+1);
          tmp_rp2.innerText = (l+1);
setInterval(console.log("tr.add obj_type = " + obj_type),0.5);
          if ( obj_type == 'd' ) {
            rp_type.options[0].selected = true;
          } else if ( obj_type == 't' ) {
            rp_type.options[1].selected = true;
          } else {
            rp_type.options[2].selected = true;
          }
        });
        tr.addEventListener('mouseover',function(){
          this.classList.add('mouseover');
        });
        tr.addEventListener('mouseout',function(){
          this.classList.remove('mouseover');
        });
        tr.innerHTML = str;
        tbl.appendChild(tr);
      }
    }
  }
}
function make_table_t(){
// obj['t'] ????
console.log("obj['d'] = " + JSON.stringify(obj['d']));
  var obj_t = obj['t'];
  var num_t = Object.keys(obj['d']).length;
  for ( let i = 0; i < Object.keys(obj_t).length; i++ ){
      for ( let l = 0; l < Object.keys(obj_t[i]).length; l++ ) {
        var tr = document.createElement('tr');
        if ( l == 0 ) {  // Rp2 の 一番上の空白の行
          var str1 = '<td rowspan="' + (Object.keys(obj_t[i]).length + 1 )  + '">' + (num_t+i+1) + '</td><td></td><td></td><td></td>';
          var tr1 = document.createElement('tr');
          tr1.innerHTML = str1;
          tbl_t.appendChild(tr1);
          var str = '<td>' + (l+1) + '</td>';
          for ( var ii = 0; ii < Object.keys(obj_keys).length; ii++) {
//          str += '<td>' + obj_t[i][l][obj_keys[ii]] + '</td>';
            str = make_table_ii('t',str,i,l,ii);
          }
        //make_table_ii();
        } else {  // Rp2 の薬の表示のための for loop
          var str = '<td>' + (l+1) + '</td>';
          for ( var ii = 0; ii < Object.keys(tbl_obj_keys).length; ii++) {
            str = make_table_ii('t',str,i,l,ii);
          }
        }
        tr.id = i + '_' + l;
// 以下は ２個目の for loop の内部
//  この中に修正点あり
        tr.addEventListener('click',function(){
          tmp_field.classList.remove('undisplay');
//          tr.classList.add('pikapika');  // click中の要素がわかるように光らせる
          var table_elems = tbl_t.rows;
          for ( var k = 0; k < table_elems.length; k++) {
            table_elems[k].classList.remove('pikapika');
          }
          var pikapika_id = i + '_' + l;
          var pikapika = document.getElementById(pikapika_id);
//          pikapika.classList.add('pikapika');
          this.classList.add('pikapika');
// この中で rp_repair に addEventListener を付けると
// make_table() がどんどん入れ子になっていき複雑化する
// repair_obj() については、外部でaddEventListenerして
// 外部で make_table() して新たにtableを作り直した方が良さそう
// その場合、必要な情報(rp1,rp2)だけを rp_repair に渡せば良いと思われる。
//          rp_repair.addEventListener('click',function repair_obj(){});
console.log("i+1 = " + (i+1));
console.log(i+1);
// ???
// ここにmake_selectを入れてclick時はremoveとrepairのみ表示されるようにする
/*          make_repair_select(i+1,l+1,obj_t[i][l]);
          tmp_rp1.innerText = (i+1);
          tmp_rp2.innerText = (l+1);  obj_t[i][l] は存在しない！*/
        });
        tr.addEventListener('mouseover',function(){
          this.classList.add('mouseover');
        });
        tr.addEventListener('mouseout',function(){
          this.classList.remove('mouseover');
        });
        tr.innerHTML = str;
        tbl_t.appendChild(tr);
      }
  }
}

function make_table_ii(type,str,i,l,ii){
var obj_keys;
if ( type == 'd' ) {
  obj_keys = d_obj_keys;
} else if ( type == 't' ) {
  if ( obj[type][i][l]['drug_type'] == 'tl' ) {
    obj_keys = tl_obj_keys;
  } else {
    obj_keys = t_obj_keys;
  }
} else if ( type == 'e' ) {
  obj_keys = d_obj_keys;
}
// ??? 要修正
// if ( obj_keys[ii] == 'drug_type' ) としなければならない?
// if ( ii == 0 ) のパターンが良いか検討が必要
var object = obj[type];
  if ( ii == 0 ) {
if ( object[i][l]['rp_type'] == 0 ) {
    str += '<td>通常</td>';
} else if ( object[i][l]['rp_type']  == 1 ) {
    str += '<td>頓服</td>';
} else if ( object[i][l]['rp_type'] == 2 ) {
    str += '<td>外用</td>';
}
  } else if ( ii == 1 ) {
    str += '<td>' + object[i][l]['rp_drug'][1] + '</td>';
  } else if ( ii == 2 ) {
    str += '<td>' + object[i][l]['rp_amount'] + '</td>';
  } else if ( ii == 3 ) {
if ( object[i][l]['rp_drug'][2] == 't' ) {
    str += '<td>錠</td>';
} else if ( object[i][l]['rp_drug'][2] == 'mg' ) {
    str += '<td>mg</td>';
} else if ( object[i][l]['rp_drug'][2] == 'g' ) {
    str += '<td>g</td>';
}
  } else if ( ii == 4 ) {
if ( type == 'd' ) {
    str += '<td>' + object[i][l]['rp_times'] + '</td>';
} else {
    str += '<td></td>';
}
  } else if ( ii == 5 ) {
if ( type == 'd' ) {
    str += '<td>' + object[i][l]['rp_division'] + '</td>';
} else {
    str += '<td></td>';
}
  } else if ( ii == 6 ) {
if ( type = 'd' ) {
if ( object[i][l]['rp_before'] == 0 ) {
    str += '<td>食後</td>';
} else if ( object[i][l]['rp_before'] == 0 ) {
    str += '<td>食前</td>';
}
} else {
    str += '<td></td>';
}
  } else if ( ii == 7 ) {
    str += '<td>' + object[i][l]['rp_option'] + '</td>';
  } else if ( ii == 8 ) {
    str += '<td>' + object[i][l]['rp_days'] + ' 日分</td>';
  }
  return str;
}

function remove_pikapika(){
  for ( var i = 0; i < 3; i++ ) {
      var tbl_id = "tbl_" + Object.keys(obj_drug_type)[i];
      console.log("table_id = " + tbl_id);
      var rp_table = document.getElementById(tbl_id);
      var table_elems = rp_table.rows;
      for ( var k = 0; k < table_elems.length; k++) {
        table_elems[k].classList.remove('pikapika');
      }
  }
}

function subustitusion(obj,rp1,rp2){
  
}

function make_obj(method){
    drug_info = select_drugs.options[select_drugs.selectedIndex].value.split('_');  // drug_info[drug_id,drug_name,drug_type,drug_amount,drug_unit]
    // drug_type t:tab p:pow l:liq

    var c_a = make_checkedArray();
    var obj_key = {0:amount_d_m,1:amount_d_n,2:amount_d_a,3:amount_d_v};
    var obj_d = obj['d'];
    var obj_t = obj['t'];
    var obj_e = obj['e'];
    var amount_str = "";
if ( rp_type.selectedIndex == 0 ) {
    for (var i = 0; i < c_a.length; i++ ) {
      if ( c_a[i] == 1 ) {
        amount_str += obj_key[i].value + "_";
      } else {
        amount_str += 0 + "_";
      }
    }
    amount_str = amount_str.slice(0,-1);
}

    var before = 0;
    var value_rp_days = rp_days.value;
    if ( rp_before.checked == true ) {
      before = 1;
    }
if ( !rp_type.selectedIndex == 0 ) {
      before = 2;
      value_rp_days = "";
}

    if ( drug_info[2] == 'P' ) {
      var obj_2_rp_unit = rp_unit.options[rp_unit.selectedIndex].innerText;
    } else {
      var obj_2_rp_unit = drug_info[2];
    }
var rp_change;
if ( method == 'add' ) {
      rp_change = 'a';
} else if ( method == 'repair' ) {
      rp_change = 'r';
}
    var obj_2 = {
      'rp_type':rp_type.options[rp_type.selectedIndex].value,
//      'rp_drug_id':drug_info[0],
//      'rp_drug':select_drugs.options[select_drugs.selectedIndex].innerText,
      'rp_drug':[drug_info[0],drug_info[1],rp_unit.value,drug_info[3],drug_info[4],drug_info[5]],
      'rp_amount':rp_amount.value,  // mg
//      'rp_unit':rp_unit.value,  //mg
      'rp_times':rp_times.options[rp_times.selectedIndex].value,
      'rp_check':null,
      'rp_division':amount_str,    // 200-200-100-200
      'rp_before':before,  //rp_before,
      'rp_option':rp_option.value,
      'rp_days':value_rp_days,  //rp_days
      'rp_change':rp_change,
    };
console.log("this.value = " + this.value);
// ここは関数にしたいところ！！
    if ( method == 'add' ) { // add_below
      var num_1 = rp1.value;
      var num_2 = rp2.value;
if ( rp_type.options[rp_type.selectedIndex].value == 0 ) {
      add_obj(obj_d,obj_2,num_1,num_2);
} else if ( rp_type.options[rp_type.selectedIndex].value == 1 ) {
      add_obj(obj_t,obj_2,num_1,num_2);
} else if ( rp_type.options[rp_type.selectedIndex].value == 2 ) {
      add_obj(obj_e,obj_2,num_1,num_2);
}
    } else if ( method == 'repair' ) {
      var num_1 = rp1.value;
      var num_2 = rp2.value;
      obj_d[num_1-1][num_2-1] = obj_2;
    } else if ( method == 'remove' ) {
      var num_1 = tmp_rp1.innerText;
      var num_2 = tmp_rp2.innerText;
      if ( rp_type.options[rp_type.selectedIndex].value == 0 ) {
        remove_obj('d',num_1,num_2);
      } else if ( rp_type.options[rp_type.selectedIndex].value == 1 ) {
        remove_obj('t',num_1,num_2);
      } else if ( rp_type.options[rp_type.selectedIndex].value == 2 ) {
        remove_obj('e',num_1,num_2);
      }
    }
console.log("obj = " + JSON.stringify(obj));
}

function add_obj(object,obj_2,num_1,num_2){
  if ( object[num_1-1] ) {
    if ( object[num_1-1][num_2-1] ) {
      var num_obj = Object.keys(object[num_1-1]).length;
      for ( let i = num_obj; i > (num_2 - 2); i-- ) {
        object[num_1-1][i] = object[num_1-1][i-1];
      }
    }
    object[num_1-1][num_2-1] = obj_2;
console.log("obj_d(add) = " + JSON.stringify(object));
  } else {
    object[num_1-1] = {};
    object[num_1-1][num_2-1] = obj_2;
console.log("obj_d = " + JSON.stringify(object));
  }
}

function remove_obj(type_obj,num_1,num_2){
      var removeObj = obj[type_obj];
console.log("remove was called!");
console.log("removeObj = " + JSON.stringify(removeObj));
console.log("num_1 = " + num_1);
console.log("num_2 = " + num_2);
      var obj_len = Object.keys(removeObj).length;
      if ( removeObj[num_1-1] ) {
        var obj_i_len = Object.keys(removeObj[num_1-1]).length;
console.log("obj_i_len = " + obj_i_len);
      }
console.log("obj_i_len = " + obj_i_len);
      if ( obj_len == 0 ) {
console.log("obj is empty! anything is error!");
      } else if ( obj_len ==1 && obj_i_len == 1 ) {
        removeObj = {};
      } else if ( obj_i_len == 1 ) {
        for ( var ii = num_1-1; ii < obj_len; ii++ ) {
          if ( ii == obj_len -1 ) {
            delete removeObj[ii];
          } else {
            removeObj[num_1-1] = removeObj[num_1];
          }
        }
      } else {
        for ( var ll = num_2-1; ll < obj_i_len; ll++ ) {
          if ( ll ==  obj_i_len -1 ) {
            delete removeObj[num_1-1][ll];
          } else {
            removeObj[num_1-1][ll] = removeObj[num_1-1][ll+1];
          }
        } 
      }
      obj[type_obj] = removeObj;
console.log("removeObj = " + JSON.stringify(removeObj));
}

// init
  make_select(1,obj['d']);
  make_table(tbl_d,'d',d_obj_keys);
  make_table(tbl_t,'t',t_obj_keys);
  make_table(tbl_e,'e',e_obj_keys);

// now2
  rp_drugRetrieve.addEventListener('keypress',function(e){
    if ( e.keyCode == 13 ){
      var type = 'p';
//      var str = "select * from drugs where drug_name = 'オランザピン'";
      var str = "select * from drugs where search_word like %27%25" + rp_drugRetrieve.value + "%25%27";
// '%barupuro%' -> %ba ~ %bf %da ~ %df はGET送信時に%encodeにひっかかる
// ' -> %27   % -> %25 と記載することで ' と % を送信できる
      db_access(type,str);
      make_rp_unit();
    }
  });

function make_rp_type(type_obj){
//  var HTML = "<option value='0'>通常</option><option value='1'>頓服</option><option value='2'>その他</option>";
//  rp_type.innerHTML = HTML;
console.log("type_obj in make_rp_type is = " + type_obj);
  if ( type_obj ) {
    rp_type.options[type_obj].selected = true;
  }
}

// btn click時の動作
  btn_remove.addEventListener('click',function(event){
//    if ( obj_check() == 1 ) {
//      event.stopPropagation();
//      event.preventDefault();
//      alert("error!");
//    } else {
console.log("btn_remove was called");
console.log("btn_remove this.value = " + this.value);
      var method = 'remove';
      make_obj(method);
      make_select(rp1.value,obj['d']);
    make_table(tbl_d,'d',d_obj_keys);
    make_table(tbl_t,'t',t_obj_keys);
    make_table(tbl_e,'e',e_obj_keys);
      btn_add.classList.remove('undisplay');
      btn_above.classList.remove('undisplay');
      btn_below.classList.remove('undisplay');
      btn_remove.classList.add('undisplay');
      btn_repair.classList.add('undisplay');
      btn_cancel.classList.add('undisplay');
//    }
  });

  btn_repair.addEventListener('click',function(){
//    if ( obj_check() == 1 ) {
//      event.stopPropagation();
//      event.preventDefault();
//      alert("error!");
//    } else {
console.log("btn_repair was called");
console.log("btn_repair this.value = " + this.value);
      make_obj(this.value);
      make_select(rp1.value,obj['d']);
    make_table(tbl_d,'d',d_obj_keys);
    make_table(tbl_t,'t',t_obj_keys);
    make_table(tbl_e,'e',e_obj_keys);
      btn_add.classList.remove('undisplay');
      btn_above.classList.remove('undisplay');
      btn_below.classList.remove('undisplay');
      btn_remove.classList.add('undisplay');
      btn_repair.classList.add('undisplay');
      btn_cancel.classList.add('undisplay');
//    }
  });

  btn_cancel.addEventListener('click',function(){
    make_select(1,obj['d']);
    make_table(tbl_d,'d',d_obj_keys);
    make_table(tbl_t,'t',t_obj_keys);
    make_table(tbl_e,'e',e_obj_keys);
      btn_add.classList.remove('undisplay');
      btn_above.classList.remove('undisplay');
      btn_below.classList.remove('undisplay');
      btn_remove.classList.add('undisplay');
      btn_repair.classList.add('undisplay');
      btn_cancel.classList.add('undisplay');
  });

  btn_add.addEventListener('click',function(event){
//    if ( obj_check() == 1 ) {
//      event.stopPropagation();
//      event.preventDefault();
//      alert("error!");
//    } else {
    var method = 'add';
    make_obj(method);  // this.value でいける？
    make_select(rp1.value,obj['d']);
//    rp_type.options[0].selected = true;
    make_table(tbl_d,'d',d_obj_keys);
    make_table(tbl_t,'t',t_obj_keys);
    make_table(tbl_e,'e',e_obj_keys);
//    }
  });

  btn_register.addEventListener('click',function(){
    var type = 'register';
    var d_id = register_d_id.innerText;
    var p_id = register_p_id.innerText;
    var date = register_date.innerText;
    var drugs = JSON.stringify(obj);
    var str = "insert into prescription_2022 values(null,";
    str += d_id + ",";
    str += p_id + ",";
    str += date + ",'";
    str += drugs + "')";
console.log("str = " + str);
    db_access(type,str);
  });
</script>

</body>
