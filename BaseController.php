<?php
class BaseController {

public function index($con,$data = null){
    $sql = "SELECT * FROM crud.crudoperation";
    if($data != null){
        $sql="SELECT * FROM crud.crudoperation WHERE name LIKE '%$data%' ";
    }
    $query = $con->prepare($sql);
    $query->execute();
    $records = $query->fetchAll();
    return $records;
}
public function add($con,$data){
    if(!empty($data)){
    
        try{
            $sql = "insert into crud.crudoperation (name, email, mobile, password) 
            values ( :name, :email, :mobile, :password )";
            $st= $con->prepare($sql);
            $st->execute([
                ':name' => $data['name'],
                ':email' => $data['email'],
                ':mobile' => $data['mobile'],
                ':password' => $data['password'],
                
            ]);
            echo "New record created successfully"; 
          } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
          }  
          };
    }
    public function update(){
        if(!empty($data)){
    
            try{
                $sql = "insert into crud.crudoperation (name, email, mobile, password) 
                values ( :name, :email, :mobile, :password )";
                $st= $con->prepare($sql);
                $st->execute([
                    ':name' => $data['name'],
                    ':email' => $data['email'],
                    ':mobile' => $data['mobile'],
                    ':password' => $data['password'],
                    
                ]);
                echo "New record created successfully"; 
              } catch(PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
              }  
              };
    }
}




//create index ---> get all records



//create store function to store data to data base


 
//create update function to update specific record *remember , you'll get it by id




//create delete function to delete specific record like update
?>