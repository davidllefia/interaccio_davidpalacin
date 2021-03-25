<?php

class ChatMessage extends DataBoundObject {
        protected $Chat_Message_Id;
        protected $To_User_Id;
        protected $From_User_Id;
        protected $Chat_Message;
        protected $Timestamp;
        protected $Status;
        

        protected function DefineTableName() {
                return("chat_message");
        }

        protected function DefineRelationMap() {
                return(array(
                        "id" => "ID",
                        "chat_message_id" => "Chat_Message_Id",
                        "to_user_id" => "To_User_Id",
                        "from_user_id" => "From_User_Id",
                        "chat_message" => "Chat_Message",
                        "timestamp" => "Timestamp",
                        "status" => "Status"));
        }
}


 ?>