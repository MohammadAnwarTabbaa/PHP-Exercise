
<?php
session_start();
if(isset($_REQUEST['sUp'])){
    signup();
}
if(isset($_REQUEST['sIn'])){
    signin();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    body{
        display:grid;
        grid-template-columns:50% 50%;
    }
    .SIGNUP{
        grid-column:1/1 ; 
        background-color:gray;
        padding:20px;
    }
    .SIGNIN{
        grid-column:2/3 ; 
        background-color:yellow;
        height: 100%;
        padding-top:8px;
        padding-left:8px;
        
    }
</style>

</head>
<body>
<fieldset>
<form class="SIGNUP"name="signUp" action="home.php" method="post" >
    <label>
     Full Name
     <input type="text" name="name" >
    </label>
      <p></p>
    <label>
    User Name 
    <input type="text" name="userName" required>
    </label>
    <p></p>
    <label>
    Password
    <input type="password" name="password" required>
    </label>
    <p></p>
    <label>
    Confirm Password
    <input type="password" name="confirmPassword" required>
    </label>
    <p></p>
    <label>
    Email
    <input type="email" name="email" required>
    </label>
    <p></p>
    <label>
    Phone Number 
    <input type="tel" name="tel" required>
    </label>
    <p></p>
    <label>
    Birthday
    <input type="date" name="birthday" required>
    </label>
    <p></p>
    <label>
    Social Security Number
    <input type="number" name="sd" required>
    </label>
    <input type="submit" name="sUp" value="SignUp" >
    </form>
</fieldset>


<fieldset>
    <form  class="SIGNIN" name="signIn" action="home.php" method="post" >
    <label>
    User Name 
    <input type="text" name="signInUserName" required>
    </label>
    <p></p>
    <label>
    Password
    <input type="password" name="signInPassword" required>
    </label>
    <p></p> 
    <input type="submit" name="sIn" value="SignIn" >
    </form>
</fieldset>
</body>
</html>

<?php



function signup(){ 
 $name = $_POST['name'];
 $userName = $_POST['userName'];
 $password = $_POST['password'];
 $confirmPassword = $_POST['confirmPassword']; 
 $email = $_POST['email']; 
 $tel = $_POST['tel'];
 $birthday = $_POST['birthday'];
 $sd = $_POST['sd'];
 
  if(!empty($name)&&!empty($userName)&&!empty($password)&&!empty($confirmPassword)&&!empty($email)&&!empty($tel)&&!empty($birthday)&&!empty($sd)){
  $arr=array("Name"=>$name,"User-Name"=>$userName,"Password"=>$password,"Eamil"=>$email,"Phone"=>$tel,"Birthday"=>$birthday,"Security"=>$sd);
  
  if(!preg_match("/^([a-zA-Z' ]+)$/",$name)){
    die("Invalid name given.");

}
      if($password!=$confirmPassword){
      die(" password and Confirm Password not equal") ; 
    }
    
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }
    


    $_SESSION['sUp']=$arr;
  }
  
    else{
        die("you should fill all the fields");
    }

}
function signin(){
$userName2= $_POST["signInUserName"] ; 
$password2= $_POST["signInPassword"] ; 

if(isset($userName2)&&isset($password2)){
    $arr2=[$userName2,$password2];
    $_SESSION['sIn']=$arr2;
    header("Location: http://localhost:8000/safe.php");
   
}


}


?>
