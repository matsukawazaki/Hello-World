<!DOCTYPE html>
<meta charset='utf8'>
<link rel='stylesheet' href='style.css'>

<body>
  <input name='test' type='text' id='text'>

<input type='button' id='btn'>

<table id='tbl' style='border:solid 1 black'>
</table>

<div id='input_field'>
</div>

<div id='field'>
</div>
<script>
  var obj_1 = {1:{1:{'a':'aaa','b':'bbb'},2:{'a':'ccc','b':'ddd'}},2:{1:{'a':'eee','b':'fff'},2:{'a':'ggg','b':'hhh'}}};
  console.log(obj_1[1][2]['a']);

  var tbl = document.getElementById('tbl');
  var str = "";
  for (var i =1; i < Object.keys(obj_1).length + 1 ; i++){
   for (var l = 1; l < Object.keys(obj_1[i]).length + 1 ; l++){
    str = str + "<tr><td>" + obj_1[i][l]['a'] + "</td><td>" + obj_1[i][l]['b'] + "</td></tr>";
    console.log(i + " : " + str);
   }
  }
  console.log(Object.keys(obj_1).length);
  tbl.innerHTML = str;

  var trs = document.getElementsByTagName('tr');
  var input_field = document.getElementById('input_field');
  for ( let i = 0; i < Object.keys(trs).length; i++ ) {
    console.log("i = " + i);
    trs[i].addEventListener('mouseover',function(){
      trs[i].classList.add('mouseover');
      console.log("mouseover");
    });
    trs[i].addEventListener('click',function(){
      var str_HTML = "<h5>input</h5><input type='text' id='tmp_text'><input type='button' id='tmp_btn'>";
      input_field.innerHTML = str_HTML;
      var tmp_text = document.getElementById('tmp_text');
      var tmp_btn = document.getElementById('tmp_btn');
      tmp_btn.addEventListener('click',function (){
        obj_1[i][1]['a'] = tmp_text.value;
        console.log(obj_1[i][1]['a']);
        input_field.classList.add('undisplay');
      });
    });
    trs[i].addEventListener('mouseout',function(){
      trs[i].classList.remove('mouseover');
      console.log("mouseout");
    });
  }
  var field = document.getElementById('field');
  var text = document.getElementById('text');
  var btn = document.getElementById('btn');
  btn.addEventListener('click',function(){
    console.log('test');
  });
  text.addEventListener('change',function(){
    var h3_child = document.createElement('h3');
    h3_child.innerText = text.value;
    field.appendChild(h3_child);
    }
  );
</script>
</body>
