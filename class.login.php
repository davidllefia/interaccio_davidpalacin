<?php
class Login extends DataBoundObject {
        protected $User_Id;
        protected $Username;
        protected $Password;

        protected function DefineTableName() {
                return("login");
        }

        protected function DefineRelationMap() {
                return(array(
                        "id" => "ID",
                        "user_id" => "User_Id",
                        "username" => "Username",
                        "password" => "Password"));
        }
        public function encontrarID($connect){
                $query = "
                   SELECT * FROM login 
                    WHERE username = :username
                 ";
                 $statement = $connect->prepare($query);
                 $statement->execute(
                    array(
                      ':username' => $_POST["username"]
                     )
                  );
                 $result = $statement->fetchAll();
                 foreach($result as $row)
                    {
                       $this->setUser_Id($row['user_id']);
                       $this->setPassword($row['password']);
                    }
        }

}


 ?>