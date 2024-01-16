<?php
    include 'BaseController.php';
    include 'DataBase.php'; 
    // require_once 'Controller.php';
  $obj = new BaseController();
  $records = $obj->index($con);

  if(isset($_GET['search-btn'])){
    $data = $_GET['search'];
    $records = $obj->index($con,$data);
  }

  // action => search

  if(isset($_POST['submit'])){
    $data = [];
    $data['name'] = $_POST['name'];
    $data['email']= $_POST['email'];
    $data['mobile'] = $_POST['mobile'];
    $data['password'] = $_POST['password'];
    $obj->add($con,$data);
  }
  if(isset($_POST['update'])){
    $id = $_GET['id'];
    $data =[];
    $data['name'] = $_POST['name'];
    $data['email']= $_POST['email'];
    $data['mobile'] = $_POST['mobile'];
    $data['password'] = $_POST['password'];
    $obj->update();
  }
  



?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
     crossorigin="anonymous">
     <!--fontawsomecdn-->
     <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
     integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
     crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>

    
  <div class="modal fade" id="usermodal" tabindex="-1" aria-labelledby="usermodal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="usermodal">add or update</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="addform" method="post" enctype="multipart/form-data">
      <div class="modal-body">
      <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">name</label>
    <input type="text" class="form-control" id="enter your name" name="name" autocomplete="off">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">email</label>
    <input type="text" class="form-control" id="enter your email" name="email" autocomplete="off">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">mobile</label>
    <input type="text" class="form-control" id="enter your number" name="mobile" autocomplete="off">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">password</label>
    <input type="text" class="form-control" id="enter your email" name="password" autocomplete="off">
  </div>
            <label>photo:</label>
            <div class="input-group">
                <label class="custom-file-label" for="userphoto"></label>
                <input type="file" class="custom-file-input"
                name="photo" id="userphoto">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">submit</button>
      </div>
      </form>
    </div>  
  </div>
</div>
    <div class="container py-3">
    <div class="row">
    <form action="index.php" method="get">
        <div class="col-10">
            <div class="input-group">
                
                <input type="text" class="form-control" placeholder="search user" name="search" id="search">                   
                   <button type="submit" name="search-btn" class="fa-solid fa-magnifying-glass text-light input-group-text bg-dark" >
                     </button>
            </div>
        </div>
        </form>

        <div class="col-10">
            <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#usermodal">
                add new user
            </button>
        </div>

        <br>
        <br>
        <br>

        <table class="table">
  <thead>
    <tr>
      <th scope="col">sl no</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">mobile</th>
      <th scope="col">operation</th>
    </tr>

  </thead>
  <tbody>
  <?php
    foreach($records as $record){
    ?>
         <tr>
            <td scope="col"><?php echo $record['id'] ?></td>
            <td scope="col"><?php echo $record['name'] ?></td>
            <td scope="col"><?php echo $record['email'] ?></td>
            <td scope="col"><?php echo $record['mobile'] ?></td>
            <td> 
             <button class = "btn btn-primary"><a href="update.php?id=<?php echo $record['id'] ?>" class="text-light">update</a></button>
             <!-- how to send id as a param on php and html  -->
             <button  name="update" class = "btn btn-danger"><a href="delete.php?id=<?php echo $record['id'] ?>"  class = "text-light">delete</a></button>
            </td>
        </tr> 
    <?php
     } 
    ?> 



  </tbody>
</table>
<nav aria-label="Page navigation example" id="pagination">
  <ul class="pagination justify-content-center" >
    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item active"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>

    </div>
    </div>
    



<!-- <i class="fa-solid fa-magnifying-glass"></i> -->
<!--JQUERYCDN-->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" 
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" 
  crossorigin="anonymous"></script>
<!--jslink -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
  integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" 
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
 integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
 crossorigin="anonymous"></script>
 <script src="js/scipt.js"></script>
  </body>
</html>