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
        if(redirectID == 1) 
            {
                window.location.href = "../views/LoginPage.php";
            }
        else if(redirectID == 2)
            {
                window.location.href = "../views/DashboardPage.php";
            }
        else if(redirectID == 3)
            {
                window.location.href = "../views/RegistrationPage.php";
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
                if(returnedData == true) 
                    {
                        redirectFunc(2);
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