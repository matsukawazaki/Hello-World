<!DOCTYPE html>
<meta charset='UTF-8'>
<link rel='stylesheet' href='style.css'>

<body>
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
    $str = $str . "<input type='checkbox' id='check_v'><label for='check_v'>眠前
</label>";
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
    $str = "<table><tr id='check_division'>";
    $str = $str . "<th><input type='checkbox' name='check_division' id='check_m' onchange='count_check();'><label for='check_m'>朝</label></th>";
    $str = $str . "<th><input type='checkbox' name='check_division' id='check_n' onchange='count_check()'><label for='check_n'>昼</label></th>";
    $str = $str . "<th><input type='checkbox' name='check_division' id='check_a' onchange='count_check()'><label for='check_a'>夕</label></th>";
    $str = $str . "<th><input type='checkbox' name='check_division' id='check_v' onchange='count_check()'><label for='check_v'>眠前</label></th></tr>";

  $str = $str . "<tr>";
  $str = $str . "<td><input type='text' style='width:" . $width . "px' class='amount_division' id='amount_d_m'></td>";
  $str = $str . "<td><input type='text' style='width:" . $width . "px' class='amount_division' id='amount_d_n'></td>";
  $str = $str . "<td><input type='text' style='width:" . $width . "px' class='amount_division' id='amount_d_a'></td>";
  $str = $str . "<td><input type='text' style='width:" . $width . "px' class='amount_division' id='amount_d_v'></td>";
  $str = $str . "</tr></table>";
  echo $str;
}
?>

  <div>
    <table id='tbl'>
    </table>
    <table id='rp_inputField'>
      <tr id='rp_inputField1'>
        <td><?php make_rptype(); ?></td>
        <td><?php make_rp1(); ?></td>
        <td><?php make_rp2(); ?></td>
        <td></td>
      </tr>
      <tr id='rp_inputField2'>
        <td><label>薬剤検索</label></td>
        <td colspan='3'><input type='text' id='rp_drugRetrieve'></td>
      </tr>
      <tr id='rp_inputField3'>
        <td><label>薬剤</label></td>
        <td colspan='3'><select id='rp_drugSelect'><option>oranzapine</option></select></td>
        <td><label>量</label></td>
        <td><input type='text' style='width:50px' id='rp_amount'></td>
        <td><select><option>mg</option></td>
        <td><select id='select_division'><option value='division_1'>１分服</option><option value='division_2'>２分服</option><option value='division_3'>３分服</option><option value='division_4'>４分服</option></select></td>
        <td rowspan='2'><label>日数</label></td>
        <td rowspan='2'><input type='text' style='width:50px'><label>日分</label></td>
        <td><label>submit</label><input type='button' id='btn' value='add'></td>
      </tr>
      <tr id='rp_inputField4'>
        <td><label>コメント</label></td>
        <td colspan='3'><input type='text'></td>
        <td colspan='3'><?php make_timingTable(30); ?></td>
        <td colspan='2'></td>
      </tr>
<!--
/        <td><label id='label'><select id='rp_section'><option value='rp_normal'>通常</option><option value='rp_tmp'>臨時</option></select></label></td>
/        <td><label>RP1</label><select id='rp1'></select></td>
/        <td><label>RP2</label><select id='rp2'></select></td>
/        <td><label>drug</label><input type='text' id='input1 -> rp_drugRetrieve'></td>
/        <td><label>amount</label><input type='text' id='input2 -> rp_amount'></td>
        <td><label>times</label><select id='rp_times'><option>1</option><option>2</option><option>3</option><option>4</option></select></td>
        <td><label>timing</label><select id='rp_timing'></select></td>
/        <td><label>submit</label><input type='button' id='btn' value='add'></td>
      </tr>
      <tr id='rp_inputField2'>
        <td colspan="3"></td>
        <td><select id='select_drugs'></select></td>
        <td><label>コメント</label><input type='text' id='rp_option'></td>
        <td><label>配分</label><input type='text' class='amounts'>-<input type='text' class='amounts'></td>
      </tr>
-->
    </table>
  </div>

<script>
// rp1 select を選択した時に rp2 select を変化させる
// rp1 に addEventListener をつける
// rp2 に addEventListener をつける
  var btn = document.getElementById('btn');
  var label = document.getElementById('label');
  var rp1 = document.getElementById('rp1');
  var rp2 = document.getElementById('rp2');
  var input1 = document.getElementById('rp_drugRetrieve');
  var input2 = document.getElementById('rp_amount');
  var select_division = document.getElementById('select_division');
  var select_drugs = document.getElementById('rp_drugSelect');
  var check_division = document.getElementById('check_division');
  var check_m = document.getElementById('check_m');
  var check_n = document.getElementById('check_n');
  var check_a = document.getElementById('check_a');
  var check_v = document.getElementById('check_v');
  var amount_d_m = document.getElementById('amount_d_m');
  var amount_d_n = document.getElementById('amount_d_n');
  var amount_d_a = document.getElementById('amount_d_a');
  var amount_d_v = document.getElementById('amount_d_v');
  var obj_1 = {};
  var obj_keys = {1:'drug',2:'amount'};
  console.log(obj_keys[1]);

// function

// now1
function db_access(type,str){
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 ) {
      if (xhr.status == 200 ) {
        var res = xhr.responseText;
        res = JSON.parse(res);
        select_drugs.innerHTML = '';
        for ( var i = 0; i < res.length; i++ ){
          var select = document.createElement('option');
          select.value = res[i]['drug_id'];
          select.innerText = res[i]['drug_name'] + '(' + res[i]['drug_amount'] + ')';
          select_drugs.appendChild(select);
        }
        console.log(res);
        console.log(res['drug_name']);
      }
    }
  }
  var xhr_get = 'php/db_search.php?sql_str="' + str + '"';
  console.log("xhr_get = " + xhr_get);
  xhr.open('GET', xhr_get);
  xhr.send(null);
}


  function reset_input(){
    input1.value = '';
    input2.value = '';
  }
  window.onload = reset_input;

function make_input(){
  input1.value = '';
  input2.value = '';
  btn.value = 'add';
}

function count_check(){
  var num = 0;
  if ( check_m.checked == true ) {
    num ++;
    amount_d_m.classList.remove('undisplay');
  } else {
    amount_d_m.classList.add('undisplay');
  }
  if ( check_n.checked == true ) {
    num ++;
    amount_d_n.classList.remove('undisplay');
  } else {
    amount_d_n.classList.add('undisplay');
  }
  if ( check_a.checked == true ) {
    num ++;
    amount_d_a.classList.remove('undisplay');
  } else {
    amount_d_a.classList.add('undisplay');
  }
  if ( check_v.checked == true ) {
    num ++;
    amount_d_v.classList.remove('undisplay');
  } else {
    amount_d_v.classList.add('undisplay');
  }
  select_division.options[num-1].selected = true;
}

rp1.addEventListener('change',function(){
  var rp_num = this.value;
  console.log('changed');
  make_select(rp_num,obj_1);
});

function make_select(rp1_num,obj){
  rp1.innerHTML = '';
  rp2.innerHTML = '';
  for ( var i = 1; i < Object.keys(obj).length + 2; i++) {
    var option1 = document.createElement('option');
    option1.innerText = i;
    option1.value = i;
    if ( i == rp1_num ) {
      option1.selected = true;
      console.log('selected');
    }
    rp1.appendChild(option1);
  }
  if ( obj[rp1_num] ) {
    for ( let l = 1; l < Object.keys(obj[rp1_num]).length + 2; l++) {
    var option2 = document.createElement('option');
    option2.innerText = l;
    option2.value = l;
    rp2.appendChild(option2);
    }
  } else {
    var option2 = document.createElement('option');
    option2.innerText = 1;
    option2.value = 1;
    rp2.appendChild(option2);
  }
}

function make_table(obj,obj_keys){
  var tbl = document.getElementById('tbl');
//  var obj_keys = {1:'drug',2:'amount'};
  tbl.innerHTML = "<tr><th>RP1</th><th>RP2</th><th>" + obj_keys[1] + "</th><th>"+ obj_keys[2] + "</th></tr>";
  if ( Object.keys(obj).length == 0 ) {
    var tr = document.createElement('tr');
    str = '<td></td><td>新規追加</td><td></td><td></td>';
    tr.innerHTML = str;
    tbl.appendChild(tr);
  } else {
    for ( let i = 1; i < Object.keys(obj).length + 1; i++) {
      for ( let l = 1; l < Object.keys(obj[i]).length + 1; l++) {
        var tr = document.createElement('tr');
        if ( l == 1 ) {
          var str1 = '<td rowspan="' + (Object.keys(obj[i]).length + 1 )  + '">' + i + '</td><td></td><td></td><td></td>';
          var tr1 = document.createElement('tr');
          tr1.innerHTML = str1;
          tbl.appendChild(tr1);
          var str = '<td>' + l + '</td>';
for ( var ii = 1; ii < Object.keys(obj_keys).length + 1; ii++) {
          str += '<td>' + obj[i][l][obj_keys[ii]] + '</td>';
}
//          var str = '<td>' + l + '</td><td>' + obj[i][l]['drug'] + '</td><td>' + obj[i][l]['amount'] + '</td>';
        } else {
          var str = '<td>' + l + '</td><td>' + obj[i][l]['drug'] + '</td><td>' + obj[i][l]['amount'] + '</td>';
        }
        tr.addEventListener('mouseover',function(){
          this.classList.add('mouseover');
        });
        tr.addEventListener('mouseout',function(){
          this.classList.remove('mouseover');
        });
        var label = document.getElementById('label');
//        var input1 = document.getElementById('input1');
//        var input2 = document.getElementById('input2');
        tr.addEventListener('click',function(){
          rp1.options[i-1].selected = true;
          label.innerText = i + '_' + l;
          btn.value = 'replace';
          input1.value = this.childNodes[1].innerText;
          input2.value = this.childNodes[2].innerText;
        });
        tr.innerHTML = str;
        tbl.appendChild(tr);

      }
    }
  }
}

// init
  make_select(1,obj_1);
  make_table(obj_1,obj_keys);

// now2
  input1.addEventListener('keypress',function(e){
    if ( e.keyCode == 13 ){
      var type = 'p';
//      var str = "select * from drugs where drug_name = 'オランザピン'";
      var str = "select * from drugs where search_word like %27%25" + input1.value + "%25%27";
// '%barupuro%' -> %ba ~ %bf %da ~ %df はGET送信時に%encodeにひっかかる
// ' -> %27   % -> %25 と記載することで ' と % を送信できる
      db_access(type,str);
      console.log(this.value);
    }
  });

// btn click時の動作
  btn.addEventListener('click',function(){
    var obj_2 = {'drug_id':select_drugs.options[select_drugs.selectedIndex].value,'drug':select_drugs.options[select_drugs.selectedIndex].innerText,'amount':input2.value};
    if ( this.value == 'add' ) {
      var num_1 = rp1.value;
      var num_2 = rp2.value;
      if ( obj_1[num_1] ) {
        if ( obj_1[num_1][num_2] ) {
          var num_obj = Object.keys(obj_1[num_1]).length;
          for ( let i = num_obj; i > (num_2 - 1); i-- ) {
            obj_1[num_1][i+1] = obj_1[num_1][i];
          }
        }
        obj_1[num_1][num_2] = obj_2;
console.log(JSON.stringify(obj_1));
      } else {
        obj_1[num_1] = {};
        obj_1[num_1][num_2] = obj_2;
      }
    } else if ( this.value = 'replace' ) {
      var num_1 = rp1.value;
      var num_2 = rp2.value;
      if ( obj_1[num_1] ) {
        obj_1[num_1][num_2] = obj_2;
      } else {
        obj_1[num_1] = {};
        obj_1[num_1][num_2] = obj_2;
      }
    }
    make_select(num_1,obj_1);
    make_table(obj_1,obj_keys);
  });

</script>

</body>
