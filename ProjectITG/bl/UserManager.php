<?php 
require_once "../model/database.php";
require_once "../model/userModel.php";
    class UserManager 
    {
            private $userModel;
            public function __construct()
            {
                $database = new Database();
                $db = $database->connectDB();
                $this -> userModel = new UserModel($db);
            }
            public function getUser()
            {
                $response = $this->userModel->readUser();
                return $response->fetchAll(PDO::FETCH_ASSOC);
            } 
           

            public function getAdvancedUser()
            {
                 $response = $this->userModel->readAdvancedUser();
                return $response->fetchAll(PDO::FETCH_ASSOC);
            }

            public function addUserFunc($firstName, $lastName, $homeID): void{
                try{
                    if($this->userModel->createUser($firstName,$lastName, $homeID)){
                        echo "New User Has Been Added";
                    }
                    else{
                        echo "Errror is encountered while adding value to the database";
                    }
                   
                }catch(InvalidArgumentException $ex){
                    http_response_code(501);
                    echo $ex -> getMessage();
                    exit;
                }
            }



            public function updateUserFunc($firstName, $lastName,$userID, $homeID ): void{
                try{
                    if($this->userModel->updateUser($userID,$firstName,$lastName, $homeID))
                        {
                            echo"user has been updated";
                        }
                    else{
                        echo"error has occured while updating user";
                    }
                }catch(PDOException $ex)
                {
                    http_response_code(501);
                    echo $ex -> getMessage();
                    exit;
                }
            }

            public function removeUserFunc($userID): void{
                try{
                    if($this->userModel->deleteUser($userID))
                        {
                            echo"User has been deleted";
                        }

                }catch(PDOException $ex) 
                {
                    http_response_code(501);
                    echo $ex -> getMessage();
                    exit;
                }
            }

            public function loginUserFunc($LoginFirstName, $LoginLastName, $LoginSelect)
            {
                $users = $this->getAdvancedUser(); 
                $fNameColumn = array_column($users,"firstName");
                $fNameResult = array_search($LoginFirstName , $fNameColumn);

                $lNameColumn = array_column($users,"lastName");
                $lNameResult = array_search($LoginLastName , $lNameColumn);

                $lHomeNameColumn = array_column($users,"homeID");
                $lHomeName = array_search($LoginSelect , $lHomeNameColumn);
                

                if($fNameResult != "" && $lNameResult != "" && $lHomeName !="")
                    {
                       echo true;
                    }else {
                        echo false;
                    }
            }
    }








?>