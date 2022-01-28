<!DOCTYPE html>
<meta charset='utf8'>
<link rel='stylesheet' href='style.css'>

<body>
  <div>
    <table id='tbl'>
      <tr><th>RP1</th><th>RP2</th><th>drug</th><th>amount</th></tr>
    </table>
    <label id='label'></label>
    <label>input1</label><input type='text' id='input1'>
    <label>input2</label><input type='text' id='input2'>
    <label>submit</label><input type='button' id='btn'>
  </div>

  <div>
    <table id='tbl2'><tr><td>test</td></tr></table>
  </div>

<script>
  var btn = document.getElementById('btn');
  var label = document.getElementById('label');
  var input1 = document.getElementById('input1');
  var input2 = document.getElementById('input2');
  var obj_1 = {};

  function reset_input(){
    input1.value = '';
    input2.value = '';
  }
  window.onload = reset_input;

  var tbl = document.getElementById('tbl');
  var obj_1 = {1:{1:{'drug':'oranza','amount':1},2:{'drug':'aripi','amount':2}},2:{1:{'drug':'amuro','amount':4}}};
  console.log(obj_1[1][2]['drug']);
  if ( Object.keys(obj_1).length == 0 ) {
    var tr = document.createElement('tr');
    str = '<td></td><td></td><td></td><td></td>';
    tr.innerHTML = str;
    tbl.appendChild(tr);
  } else {
    for ( let i = 1; i < Object.keys(obj_1).length + 1; i++) {
      for ( let l = 1; l < Object.keys(obj_1[i]).length + 1; l++) {
        var tr = document.createElement('tr');
        if ( l == 1 ) {
          var str1 = '<td rowspan="' + (Object.keys(obj_1[i]).length + 1 )  + '">' + i + '</td><td></td><td></td><td></td>';
          var tr1 = document.createElement('tr');
          tr1.innerHTML = str1;
          tbl.appendChild(tr1);
          var str = '<td>' + l + '</td><td>' + obj_1[i][l]['drug'] + '</td><td>' + obj_1[i][l]['amount'] + '</td>';
        } else {
          var str = '<td>' + l + '</td><td>' + obj_1[i][l]['drug'] + '</td><td>' + obj_1[i][l]['amount'] + '</td>';
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
          label.innerText = i + '_' + l;
          input1.value = this.childNodes[1].innerText;
          input2.value = this.childNodes[2].innerText;
        });
        tr.innerHTML = str;
        tbl.appendChild(tr);
      }
    }
  }

  btn.addEventListener('click',function(){
    var num_1 = label.innerText.substr(0,1);
    var num_2 = label.innerText.substr(2,1);
    console.log(num_1 + '&' + num_2);
    console.log(input1.value);
    console.log(input2.value);
    obj_1[num_1][num_2]['drug'] = input1.value;
    obj_1[num_1][num_2]['amount'] = input2.value;
  });

/*
  var obj_1 = {1:{1:{'a':'aaa','b':'bbb'},2:{'a':'ccc','b':'ddd'}},2:{1:{'a':'eee','b':'fff'}}};
  var tbl = document.getElementById('tbl');
  var input1 = document.getElementById('input1');
  var input2 = document.getElementById('input2');
  var label = document.getElementById('label');

function make_table_str(obj_1){
  var str = '';
  for ( let i = 1; i < Object.keys(obj_1).length + 1; i++ ) {
    for ( let l = 1; l < Object.keys(obj_1[i]).length + 1; l++ ) {
      str = str + '<tr><td>' + i + '_' + l + '</td><td>' + obj_1[i][l]['a'] + '</td><td>' + obj_1[i][l]['b'] + '</td></tr>';
    }
  }
  return str;
}
  var return_str = make_table_str(obj_1);

  tbl.innerHTML = return_str;

  var trs = document.getElementsByTagName('tr');
  for ( var m = 0; m < trs.length; m++ ) {
    trs[m].addEventListener('click',function(e){
      label.innerText = this.childNodes[0].innerText;
    });
  }

  input1.addEventListener('click',function(){
    var rp1 = trs[0].childNodes[0].innerText.substr(0,1);
    var rp2 = trs[0].childNodes[0].innerText.substr(0,1);
    console.log(obj_1[rp1][rp2]['a']);
    obj_1[rp1][rp2]['a'] = input1.value;
    console.log(obj_1[rp1][rp2]['a']);
    var return_str1 = make_table_str(obj_1);
    tbl.innerHTML = '';
    tbl2.innerHTML = return_str1;
  });
*/
</script>

</body>
