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
<!-- Input Shit -->
  <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="LFNAME" type="text" class="validate">
          <label for="LFNAME">First Name</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="LLNAME" type="tel" class="validate">
          <label for="LLNAME">Last Name</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="LhomeSelect" type="tel" class="validate">
          <label for="LhomeSelect">Home ID</label>
        </div>
      </div>
    </form>
  </div>

<!-- Button Shit -->
  <a class="col offset-s6 waves-effect waves-light #66bb6a green lighten-1 btn-large" onclick="loginFunc()" ><i class="material-icons left">brush</i>Login</a>


<!-- Link -->
  <script src="../scripts/Service.js"></script>
</body>
</html>