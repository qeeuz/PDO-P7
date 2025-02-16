<?php 

    
    class Admin{

        private $pdo;

        public function __construct($dbConnection)
        {
        $this->pdo = $dbConnection;
        }


        //Select functie
        public function selectCars(){

        $selectQuery = $this->pdo->prepare("SELECT * FROM Cars");

        $selectQuery->execute();
        }

        //Insert functie
        public function insertCars($carModel, $seats, $KM, $price){
        $insertQuery = $this->pdo->prepare("INSERT INTO cars (carModel, seats, KM, price) VALUES (:carModel, :seats, :KM, :price);");

        $insertQuery->execute([
        ':carModel' => $carModel,
        ':seats' => $seats,
        ':KM'=> $KM,
        ':price'=> $price
        ]);

        }

}

}



  
?>

