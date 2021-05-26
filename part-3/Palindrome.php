
<form action="Palindrome.php" method="POST">
  <input type="text" name="text">
  <input type="submit" name="submit" >

</form>

<?php
function palindrome(){
  $string=$_POST['text']; 
  $input =strtolower($string);
  if($input==strrev($input)){
    echo "true";
   return true ; 

  }
  else{
  echo "false";
  return false;
  }
  }
palindrome();


?>