<?php 
include('../model./conn.php');
include("../model./authe.php");
$newRegesterOb=new User($pdo);
if (isset($_POST["submit"])) {
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];


try {
    $newRegesterOb->register($name,$email,$password);
} catch (Exception $th) {
  echo $th->getMessage();
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h1 {
            font-size: 28px;
            color: #333;
        }
        input[type="name"],
        input[type="email"],
        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #4CAF50;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h1>register</h1>
        <form action="" method="post">
            <input type="name" name="name" placeholder="Enter your name" required><br>

            <input type="email" name="email" placeholder="Enter your email" required><br>
            <input type="text" name="password" placeholder="Enter your password" required><br>

            <input type="submit" name="submit" value="submit">
        </form>
        <a href="login.php">go to login</a>
    </div>

</body>

</html>