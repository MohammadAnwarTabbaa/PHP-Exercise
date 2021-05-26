<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
.c1{
    background-color:gray;
    
}
.c2{
    background-color:yellow;
}
.head{
    background-color:red;
}
.flex{
    display:grid;
    grid-template-columns: 1fr 1fr ;
}
</style>

</head>
<body>
<fieldset>
    <form  class="taxx" name="tax" action="tax.php" method="post" >
    <label>
    Enter your salary (USD):
    <input type="number" name="salary" >
    </label>
    <p></p>
    
    <fieldset>
        <label>
        Yearly
    <input type="radio" name="type" id="yearly" value="yearly" >
</label>

<label>
  Monthly
    <input type="radio" name="type" id="monthly" value="monthly" >
</label>
    <fieldset>
    <p></p> 

    <label>
    Tax Free Allowance (USD)
    <input type="number" name="taxfree" >
    </label>

    <input type="submit" name="calculate" value="calculate" >
    </form>
</fieldset>
</body>
</html>
<?php


$salary=$_POST['salary'];
$taxFree=$_POST['taxfree'];
$radio=$_POST['type'];
$mainSalary;
$tax;
$ssf;

//validation


//calculate the tax 
if($radio=="monthly"){
    $salary = $salary*12; 
}
if($salary<10000){
    $tax = 0 ; 
}
elseif($salary>=10000 && $salary<25000){
    $tax= ($salary*11)/100; 
}
elseif($salary>=25000 && $salary<50000){
$tax= ($salary*30)/100;
}
else{
    $tax= ($salary*45)/100;
} 

//calculate social security fee 
if($salary>10000){
    $ssf=($salary*4)/100;
}
else{
    $ssf=0;
}


$mainSalary=$salary-$tax-$ssf+$taxFree;


if(isset($_REQUEST["calculate"])){
    $arr=array("Total Salary","Tax amount" , "Social security fee" , "Salary after tax");
    $arr2=[$salary,$tax,$ssf,$mainSalary];
    $arr3=[$salary/12,$tax/12,$ssf/12,$mainSalary/12];
    $count=0;
    $count3=0;
?>
<div class="flex">
<table>
<th class="head"> Yearly </th> 
<?php

foreach ($arr as $val){
    ?>
         <tr>
        <th class="c1"><?php echo $val; ?></th>     
        <th class="c2" ><?php echo $arr2[$count]; ?></th>
    </tr>
<?php
$count = $count+1;
}
?>

</table>

<table>
<th class="head"> Monthly </th> 
<?php

foreach ($arr as $val){
    ?>
         <tr>
        <th class="c1"><?php echo $val; ?></th>     
        <th class="c2"><?php echo ($arr2[$count3])/12; ?></th>
    </tr>
<?php
$count3 = $count3+1;
}
?>
</table>
</div>

<?php
}
?>