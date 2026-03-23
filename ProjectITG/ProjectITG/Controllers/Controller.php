<?php 
session_start();
require_once "../bl/UserManager.php";

    $usermanager = new UserManager();

    if(isset($_POST["fName"], $_POST["lName"]) && $_POST["homeID"] && !isset($_POST["uID"])){
        $usermanager -> addUserFunc($_POST["fName"], $_POST["lName"], $_POST["homeID"]);
        exit;
    }elseif (isset($_POST["fName"], $_POST["lName"],$_POST["uID"], $_POST["homeID"])){
        $usermanager -> updateUserFunc($_POST["fName"],$_POST["lName"],$_POST["uID"],$_POST["homeID"]);
    }elseif (isset($_POST["indes"])){ 
        $usermanager -> removeUserFunc($_POST["indes"]);
    }
    elseif (isset($_POST["LFNAME"], $_POST["LLNAME"], $_POST["LhomeSelect"])){
        $usermanager -> loginUserFunc($_POST["LFNAME"], $_POST["LLNAME"], $_POST["LhomeSelect"] );
    }
?>