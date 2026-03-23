    function addFunc(){
        var firstName = document.getElementById("fName").value;
        var lastName = document.getElementById("lName").value;
        var select = document.getElementById("homeSelect").value;
        $.ajax({
            url: "../Controllers/Controller.php",
            type: "POST",
            data: {
                fName :firstName,
                lName :lastName,
                homeID :select
            },
            success: function(returnedData){
                Swal.fire({
                    title: "Successfully added a user!",
                    text: "You added a user! "+firstName +" " + lastName,
                    icon: "success",
                    confirmButtonText: "OK"
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        location.reload(true);
                    } 
                });;

              //  location.reload(true);
                
            },
            error: function(xhr){
                alert(xhr.status + " : " + xhr.responseText)
            }   
        });
    }
    function updateFunc(userID){
                var firstName = document.getElementById("fName").value;
                var lastName = document.getElementById("lName").value;
                var select = document.getElementById("homeSelect").value;
        $.ajax({
            url: "../Controllers/Controller.php",
            type: "POST",
            data: {
                fName :firstName,
                lName :lastName,
                homeID :select,
                uID : userID
            },
            success: function(returnedData){
                Swal.fire({
                    title: "Successfully updated a user!",
                    text: "You updated a user! "+firstName +" " + lastName,
                    icon: "refresh",
                    confirmButtonText: "OK"
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        location.reload(true);
                        echo("Reached");
                    } 
                });;
            },
            error: function(xhr){
                alert(xhr.status + " : " + xhr.responseText)
            }   
        });
    }
    function deleteFunc(index){
        $.ajax({
            url: "../Controllers/Controller.php",
            type: "POST",
            data: {
                indes : index
            },
            success: function(returnedData){
               Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                    if (result.isConfirmed) {
                       location.reload(true);
                        
                        ;
                    }
                    });
                
            },
            error: function(xhr){
                alert(xhr.status + " : " + xhr.responseText)
            }   
        });
    }

    function redirectFunc(redirectID) 
    {
        // if(redirectID == 1) 
        //     {
        //         window.location.href = "../views/LoginPage.php";
        //     }
        // else if(redirectID == 2)
        //     {
        //         window.location.href = "../views/DashboardPage.php";
        //     }
        // else if(redirectID == 3)
        //     {
        //         window.location.href = "../views/RegistrationPage.php";
        //     }

        if(redirectID == 1) 
            {
                window.location.href = "../views/Dashboards/RedHomeDash.php";
            }
        else if(redirectID == 2)
            {
                window.location.href = "../views/Dashboards/BlueHomeDash.php";
            }
        else if(redirectID == 3)
            {
                window.location.href = "../views/Dashboards/YellowHomeDash.php";
            }
        else if(redirectID == 4)
            {
                window.location.href = "../views/Dashboards/GreenHomeDash.php";
            }
        else if(redirectID == 5)
            {
                window.location.href = "../views/LoginPage.php";
            }

    }

    function loginFunc()
    {
        var LoginFirstName = document.getElementById("LFNAME").value;
        var LoginLastName = document.getElementById("LLNAME").value;
        var RawLoginSelect = document.getElementById("LhomeSelect").value;
        var LoginSelect;

        if(RawLoginSelect=="RedHome")
            {
                LoginSelect = 1;
            }
        else if(RawLoginSelect=="BlueHome")
            {
                LoginSelect = 2;
            }
        else if(RawLoginSelect=="YellowHome")
            {
                LoginSelect = 3;
            }
        else if(RawLoginSelect=="GreenHome")
            {
                LoginSelect = 4;
            }
            
        $.ajax({
            url: "../Controllers/Controller.php",
            type: "POST",
            data: {
                LFNAME :LoginFirstName,
                LLNAME :LoginLastName,
                LhomeSelect :LoginSelect
            },
            success: function(returnedData){
                // Swal.fire({
                //     title: "Successfully added a user!",
                //     text: "something",
                //     icon: "success",
                //     confirmButtonText: "OK"
                // })
                // .then((result) => {
                //     if (result.isConfirmed) {
                //         location.reload(true);
                //     } 
                // });;

                // if(returnedData == true) 
                //     {
                //         redirectFunc(2);
                //     }
                // else
                //     {
                //         alert("User Not Found");
                //     }

                if(returnedData == 1) 
                    {
                        redirectFunc(1);
                    }
                else if(returnedData == 2) 
                    {
                        redirectFunc(2);
                    }
                else if(returnedData == 3) 
                    {
                        redirectFunc(3);
                    }
                else if(returnedData == 4) 
                    {
                        redirectFunc(4);
                    }
                else 
                    {
                        alert("User Not Found");
                    }

              //  location.reload(true);
                
            },
            error: function(xhr){
                alert(xhr.status + " : " + xhr.responseText)
            }   
        });
    }
 $(document).ready(function(){
    $('select').formSelect();
  });