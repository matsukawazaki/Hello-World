<!DOCTYPE html>
<meta charset='utf8'>
<link rel='stylesheet' href='style.css'>

<body>
  <div>
    <table id='tbl'>
    </table>
    <label id='label'></label>
    <label>input1</label><input type='text' id='input1'>
    <label>input2</label><input type='text' id='input2'>
  </div>

  <div>
    <table id='tbl2'><tr><td>test</td></tr></table>
  </div>

<script>
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

</script>

</body>
