<!DOCTYPE html>
<meta charset='utf8'>
<link rel='stylesheet' href='style.css'>

<body>
  <div>
    <table id='tbl'>
    </table>
    <table id='rp_inputField'>
      <tr id='rp_inputField1'>
        <td><label id='label'><select id='rp_section'><option value='rp_normal'>通常</option><option value='rp_tmp'>臨時</option></select></label></td>
        <td><label>RP1</label><select id='rp1'></select></td>
        <td><label>RP2</label><select id='rp2'></select></td>
        <td><label>drug</label><input type='text' id='input1'></td>
        <td><label>amount</label><input type='text' id='input2'></td>
        <td><label>times</label><select id='rp_times'><option>1</option><option>2</option><option>3</option><option>4</option></select></td>
        <td><label>timing</label><select id='rp_timing'></select></td>
        <td><label>submit</label><input type='button' id='btn' value='add'></td>
      </tr>
      <tr id='rp_inputField2'>
        <td colspan="3"></td>
        <td><select></select></td>
        <td><label>コメント</label><input type='text' id='rp_option'></td>
        <td><label>配分</label><input type='text' class='amounts'>-<input type='text' class='amounts'></td>
      </tr>
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
  var input1 = document.getElementById('input1');
  var input2 = document.getElementById('input2');
  var obj_1 = {};
  var obj_keys = {1:'drug',2:'amount'};
  console.log(obj_keys[1]);

// function
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
        var input1 = document.getElementById('input1');
        var input2 = document.getElementById('input2');
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

// btn click時の動作
  btn.addEventListener('click',function(){
    var obj_2 = {'drug':input1.value,'amount':input2.value};
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
