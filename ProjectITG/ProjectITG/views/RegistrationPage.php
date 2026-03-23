<?php
    session_start();
    require_once "../bl/userManager.php";
    require_once "../bl/HomeManager.php";

    $usermanager = new UserManager();
    // $users = $usermanager -> getUser();
    $advancedUsers = $usermanager->getAdvancedUser();

    $homeManager = new HomeManager();
    $homes = $homeManager-> getHome();


?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Document</title>
</head>
<body>
     <div class="row">
        <div class="col s4 m4 l4">
            <?php if(!empty($advancedUsers)) :   ?>
                <a class="col offset-s6 waves-effect waves-light #66bb6a green lighten-1 btn-large" onclick="redirectFunc(5)"><i class="material-icons left">brush</i>LOGIN</a>
            <?php endif ?>
        </div>
            <div class= "col s4 m4 l4">
                    <div class="row">
                    <div class="input-field col s6 m6 l6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="fName" type="text" class="validate">
                        <label for="fName">First Name</label>
                    </div>
                    <div class="input-field col s6 m6 l6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="lName" type="tel" class="validate">
                        <label for="lName">Last Name</label>
                    </div>
                    <!-- Dropdown menu -->
                    <div class="input-field col s12">
                            <select id="homeSelect">
                            <option value="" disabled selected>Choose your option</option>
                            <?php foreach($homes as $index => $home) : ?>
                            <option value="<?=$home['homeID']?>"><? $home['homeID']?><?= $home['homeName'] ?></option>
                            <?php endforeach; ?>
                            </select>
                            <label>Materialize Select</label>
                    </div>
                    <!-- -- -->
                    <div class="col s12 m12 l12">
                        <button class="btn-large waves-effect waves-light #388e3c green darken-2 " style="width: 100%;" type="submit" name="action" onclick="addFunc()">Add
                            <i class="material-icons right">send</i>
                    </button>
                </div>
                <br>
                <div class="col s12 m12 l12">
                    <table class="highlight centered striped">
                        <tr>
                            <th class ="#bbdefb blue lighten-4 ">User ID</th>
                            <th class ="#bbdefb blue lighten-4 ">First Name</th>
                            <th class ="#bbdefb blue lighten-4 ">Last name</th>
                            <th class ="#bbdefb blue lighten-4 ">Home</th>
                            <th class ="#bbdefb blue lighten-4 ">Actions</th>
                        </tr>

                        <?php
                        if(!empty($advancedUsers)):   ?>

                        <?php foreach($advancedUsers as $index => $user) :?>
                            <tr>
                                <td class ="#e3f2fd blue lighten-5"><?= $index + 1 ?></td>
                                <td class ="#e3f2fd blue lighten-5"><?= $user['firstName'] ?></td>
                                <td class ="#e3f2fd blue lighten-5"><?= $user['lastName'] ?></td>
                                <td class ="#e3f2fd blue lighten-5"><?= $user['homeName'] ?></td>
                                <td class ="#e3f2fd blue lighten-5">
                                    <button class="btn-small waves-effect waves-light #9575cd deep-purple lighten-2 " style="width: 80%; margin:5px" type="update" name="action" onclick="updateFunc(<?= $user['userID'] ?>)">Update
                                     <i class="material-icons right">update</i>
                                     <button class="btn-small waves-effect waves-light #b71c1c red darken-4 " style="width: 80%;margin:5px" type="submit" name="action" onclick="deleteFunc(<?= $user['userID'] ?>)">Delete
                                     <i class="material-icons right">backspace</i>
                                    
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                                <tr>
                                    <td>No data Found</td>
                                </tr>
                        <?php endif ?>
                    </table>
                </div>
            </div>
        </div>
            
            <div class="col s4 m4 l4"></div>
     </div>
    <br>
    <script src="../scripts/Service.js"></script>
</body>
</html>