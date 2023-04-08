<?php
  if(isset($_POST["submit"])){
    session_start();
    require_once("../database/model/user.php");
    $user = new UnoUser;
    $user->username = $_POST["username"];
    $user->password = $_POST["password"];
    if($user->username == "" || $user->password == ""){
      echo "<script> alert( 'Username and password cannot be empty!' ); </script>";
    }else{
      require_once("../controller/userController.php");
      $controller = new UserController;
      if($controller->check_user_by_username_password($user)){
        header("Location: http://localhost:3000/view/menu.php");
      }
    }      
  }
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../css/login_register.css">
</head>
<body><div class="container">

    <form id="signup" method="post">

        <div class="header">
        
            <h3>Sign Up</h3>
            
            <p>You want to fill out this form</p>
            
        </div>
        
        <div class="sep"></div>

        <div class="inputs">
        
            <input type="email" name="username" placeholder="Username" autofocus />
        
            <input type="password" name="password" placeholder="Password" />
            
            <button id="submit" type="submit" name="submit" href="#">SIGN UP FOR INVITE NOW</button>

            <a id="submit" href="http://localhost:3000/view/register.php">Don't have an account? Sign-up</a>

        
        </div>

    </form>

</div>
​</body>
</html>