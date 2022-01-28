<!DOCTYPE html>
<meta charset='utf8'>
<link rel='stylesheet' href='style.css'>

<body>
  <input type='text' id='text'>
  <input type='button' id='btn' value='test'>

  <script>
    var obj = {};
    var text = document.getElementById('text');
    var btn2 = document.getElementById('btn');
    btn.addEventListener('click',function(){
      var obj_1 = {'drug':text.value};
      obj[1]['drug'] = text.value;
      console.log(obj);
    });
  </script>

</body>
