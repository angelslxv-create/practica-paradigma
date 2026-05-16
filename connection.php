<?php
function conection(){
    $host = "localhost";
    $user = "root";
    $pass = "";
    $bd = "users_crud_php";
    
    
    $connect = mysqli_connect($host, $user, $pass, $bd);
    
    return $connect;
}
?>