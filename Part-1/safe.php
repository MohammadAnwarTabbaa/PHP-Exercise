<?php
session_start();
?>
<style>
table , th {
    border: 1px solid ; 
    width:50%;
    /* hi */
    }
    th{
        text-align: left;
    }

</style>
<?php
if($_SESSION['sIn'][0]==$_SESSION['sUp']['User-Name']&&$_SESSION['sIn'][1]==$_SESSION['sUp']['Password']){
?>
<table >
    <?php
    foreach($_SESSION['sUp'] as $kye =>$value){

    ?>
    <tr>
        <th style="background-color:gray"><?php echo $kye ?></th>
        <th><?php echo $value ?></th>
    </tr>

    <?php
    }
    ?>
</table>



  <?php
}


else{
    echo "you should signup first ";
    
}




?>