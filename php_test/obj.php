<!DOCTYPE html>
<meta charset='utf8'>
<link rel='stylesheet' href='style.css'>

<body id="body">

<div id='div'>
  <input type='text' id='text'>
  <input type='button' id='btn' value='test'>
</div>
  <input type='text' id='text2'>

  <script>
    var obj = {};
    var text = document.getElementById('text');
    var text2 = document.getElementById('text2');
    var btn2 = document.getElementById('btn');

    text2.addEventListener("focusout",function(){
      text2.focus();
    },true);

    btn.addEventListener('click',function(){
      var obj_1 = {'drug':text.value};
      obj[1]['drug'] = text.value;
      console.log(obj);
    });
  </script>

</body>
