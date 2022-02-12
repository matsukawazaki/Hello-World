<script>
  var num = 0;

  var num_1 = 1;
  var num_2 = 0.5
  var obj = {1:num_1,2:num_2};
for ( var i = 0; i<Object.keys(obj).length; i++) {
  num += obj[i+1];
}
  console.log(num);
</script>
