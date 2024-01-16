<?php
        $dbserver ='localhost';
        $dbuser = 'root';
        $dbpassword = '123';
        $dbname =  'crud';


    try{
        $dsn ="mysql:host={$dbserver}; dbname={$dbname};";        
        $con = new PDO($dsn,$dbuser,$dbpassword);
    }catch(PDOexception $e){
        echo "connection error".$e->getMessage();
    }


?>