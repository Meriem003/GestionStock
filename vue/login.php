<!DOCTYPE html>
<html lang="en">
<?php
include'../model./conn.php';
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="../public/css/style2.css">
  <title>Modern Login Page</title>
</head>

<body>

  <div class="container" id="container">
    <div class="form-container sign-up">
      <form>
        <h1>Create Account</h1>
        <div class="social-icons">
          <a href="https://plus.google.com/imtahirnaseer" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
          <a href="https://facebook.com/imtahirnaseer" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="https://github.com/imtahirnaseer" class="icon"><i class="fa-brands fa-github"></i></a>
          <a href="https://linkedin.com/in/imtahirnaseer" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
        <span>or use your email for registration</span>
        <input type="text" placeholder="Name">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button>Sign Up</button>
      </form>
    </div>
    <div class="form-container sign-in">
      <form>
        <h1>Sign In</h1>
        <div class="social-icons">
          <a href="https://plus.google.com/imtahirnaseer" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
          <a href="https://facebook.com/imtahirnaseer" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="https://github.com/imtahirnaseer" class="icon"><i class="fa-brands fa-github"></i></a>
          <a href="https://linkedin.com/in/imtahirnaseer" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
        <span>or use your email password</span>
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <a href="#">Forget Your Password?</a>
        <button>Sign In</button>
      </form>
    </div>
    <div class="toggle-container">
      <div class="toggle">
        <div class="toggle-panel toggle-left">
          <h1>Welcome Back!</h1>
          <p>Enter your personal details to use all of site features</p>
          <button class="hidden" id="login">Sign In</button>
        </div>
        <div class="toggle-panel toggle-right">
          <h1>Hello, Friend!</h1>
          <p>Register with your personal details to use all of site features</p>
          <button class="hidden" id="register">Sign Up</button>
        </div>
      </div>
    </div>
  </div>
<?php
include'../model./authe.php';
include'../model./conn.php';
session_start();
$newObjLogin=new user($pdo);
if (isset($_POST['submit'])) {
    $email = $_POST["email"];
    $password = $_POST["password"]; 
    $newObjLogin->loginFunc($email, $password);
}


$newRegesterOb=new user($pdo);

if (isset($_POST["submit"])) {
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];


try {
    $newRegesterOb->signin($name,$email,$password);
} catch (Exception $th) {
  echo $th->getMessage();
}
}
?>
  <script src="../public/js/main.js"></script>
</body>

</html>