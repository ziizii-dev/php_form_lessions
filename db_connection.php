<?php
$connection = mysqli_connect('localhost','root','123456','php');
if(!$connection){
    echo("success");
}else{
    echo('failed');
}
?>