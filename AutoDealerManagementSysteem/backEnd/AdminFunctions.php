<?php 
include_once './db.php';

$db = new Database();
$pdo = $db->getConnection();


if($_SERVER["REQUEST_METHOD"] ==  "POST"){

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);


    class Account{

        private $pdo;

        public function __construct($dbConnection)
        {
            $this->pdo = $dbConnection;
        }


        // public function adminMaken($username, $password){

        //     $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        //     $inProcessAdmin = $this->pdo->prepare("INSERT INTO admin (username, password) VALUES (:username, :password)");

        //     $inProcessAdmin->execute([
        //         ':username' => $username,
        //         ':password' => $hashedPassword,
        //     ]);

        //     header('location: adminDashboard.php');

        //     exit();
        // }

        public function adminInloggen($username, $wachtwoord)
        {
            session_start();

            $inProcessInlog = $this->pdo->prepare("SELECT username, password FROM admin WHERE username = :username");


            $inProcessInlog->execute([
                ':username' => $username
            ]);

            // Haal het resultaat op als associatieve array
            $user = $inProcessInlog->fetch(PDO::FETCH_ASSOC);

            // Controleer of de gebruiker bestaat en verifieer het wachtwoord
            if ($user && password_verify($wachtwoord, $user['password'])) {

                $_SESSION['admin'] = $user['username'];

                header("Location: adminDashboard.php");
            } else {
                echo "alert(Hello! I am an alert box!!);";
            }

        }


}
    $account = new Account($pdo);
    $account->adminInloggen($username, $password);


}

?>