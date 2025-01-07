<?php
class user{
    private $pdo;
    public function __construct($pdo){
        $this->pdo = $pdo;
    }
    public function register($name, $email, $password){
        $stmt = $this->pdo->prepare("SELECT * FROM utilisateurs WHERE email=?");
        $stmt->execute([$email]);
        $myuser = $stmt->fetch();
        if ($myuser) {

            throw new Exception("the user is already registreed");
        }
        $hashedpassord = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO  utilisateurs (user_name, email, password, role) VALUES (?,?,?,'client')");
        $stmt->execute([$name, $email, $hashedpassord]);
    }
    public function loginFunc($email,$password){
        $stmt = $this->pdo->prepare("SELECT * FROM  utilisateurs WHERE email=?");
        $stmt->execute([$email]);
        $myuser = $stmt->fetch();
        if($myuser && password_verify($password,$myuser["password"])){
           $_SESSION["userid"]=$myuser["user_id"];
           $_SESSION["email"]=$myuser["email"];
           $_SESSION["role"]=$myuser["role"];
           if ($myuser["role"]==="admin") {
            header("location:../vue/dashboard.php");
            exit();
           }else{
            header("location:../vue/clien.php");
            exit();
           }
        }
    }
}