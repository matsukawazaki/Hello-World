<!DOCTYPE html>
<meta charset='utf8'>
<link rel='stylesheet' href='style.css'>

<body>
  <input name='test' type='text' id='text'>

<input type='button' id='btn'>

<div id='field'>
</div>
<script>
  var obj_keys = {1:'drug',2:'amount'};
  console.log("obj_keys[1] = " + obj_keys[1]);

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
