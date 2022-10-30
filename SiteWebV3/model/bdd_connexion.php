<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=sitesedia;charset=utf8;','root',''); 
}
catch(Exception $e)
    {
        die('DATABSE ERROR!' .$e->getMessage());
        echo "<script>alert('DATABASE ERROR')</script>";
    } 

?>