<?php

class LoginDetails extends DataBoundObject {
        protected $Login_Details_Id;
        protected $User_Id;
        protected $Last_Activity;
        protected $Is_Type;

        protected function DefineTableName() {
                return("login_details");
        }

        protected function DefineRelationMap() {
                return(array(
                        "id" => "ID",
                        "login_details" => "Login_Details_Id",
                        "user_id" => "User_Id",
                        "last_activity" => "Last_Activity",
                        "is_type" => "Is_Type"));
        }
}


 ?>