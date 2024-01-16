<?php
    include 'index.php';
    $id = $_GET['id'];


    $sql = "DELETE FROM crud.crudoperation WHERE id=$id";
    $query = $con->prepare($sql);
    $query->execute();

    // var_dump($query);

?>