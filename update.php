<?php
    include 'BaseController.php';
    $id = $_GET['id'];
  if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email= $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    try{
        $sql = "UPDATE crud.crudoperation SET id='$id', name='$name', email='$email', mobile='$mobile', password='$password' WHERE id=$id";
        $query= $con->prepare($sql);
        // $query->execute([$id, $name, $email, $mobile, $password]);
             $query->execute();
    echo "update created successfully";
    // header('location:display.php'); 
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }  
  }

  
?>
