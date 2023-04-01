<?php
  if(isset($_POST["submit"])){
      session_start();
    
      require_once("../database/model/user.php");
      $user = new UnoUser;
      $user->username = $_POST["username"];
      $user->password = $_POST["password"];
      $user->name = $_POST["name"];
      if($user->username == "" || $user->password == ""){
        echo "<script> alert( 'Username and password cannot be empty!' ); </script>";
      }
      else if( strlen($user->username) < 6 || strlen($user->password) < 6){
        echo "<script> alert( 'Username and password must have more than 5 character!' ); </script>";
      }
      else if( strlen($user->username) > 20 || strlen($user->password) > 20){
        echo "<script> alert( 'Username and password must have less than 20 character!' ); </script>";
      }
      else if($user->name == ""){
        echo "<script> alert( 'Your name cannot be empty!' ); </script>";
      }
      else if(strlen($user->name) > 20){
        echo "<script> alert( 'Your name must have less than 20 character!' ); </script>";
      }
      else if($user->password != $_POST["confirm-password"]){
        echo "<script> alert( 'Password and cofirm password did not match' ); </script>";
      }
      else{
        require_once("../controller/userController.php");
        $controller = new UserController();
        if( $controller->check_user_by_username($user))
        {
          echo "<script> alert( 'Username has been used, please choose a new one' ); </script>";
        }else{
          $controller->save_user_data($user);
          header("Location: http://localhost:3000/view/login.php");
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
        
            <h3>Register</h3>
            
            <p>Sign-up quick, the fun's await!</p>
            
        </div>
        
        <div class="sep"></div>

        <div class="inputs">
        
            <input type="email" name="username" placeholder="Username" autofocus />
        
            <input type="password" name="password" placeholder="Password" />

            <input type="password" name="confirm-password" placeholder="Confirm Password" />

            <input type="email" name="name" placeholder="Your In-game Name" />
            
            <button id="submit" type="submit" name="submit" href="#">SIGN-UP</button>

            <a id="submit" href="http://localhost:3000/view/login.php">Already have an account? Sign-in now</a>
        
        </div>

    </form>

</div>
​</body>
</html>

  



</body>
</html>
