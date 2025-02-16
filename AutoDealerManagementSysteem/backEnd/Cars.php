<?php


include_once '../backEnd/db.php';

$db = new Database();



class Car{

    private $pdo;

    public function __construct($dbConnection)
    {
        $this->pdo = $dbConnection;
    }

    //Insert functie
    public function insertCars($carModel, $seats, $KM, $price, $photo)
    {
        $insertQuery = $this->pdo->prepare("INSERT INTO cars (carModel, seats, KM, price, photo) VALUES (:carModel, :seats, :KM, :price, :photo);");

        $insertQuery->execute([
            ':carModel' => $carModel,
            ':seats' => $seats,
            ':KM' => $KM,
            ':price' => $price,
            ':photo' => $photo
        ]);
    }
    public function selectCars()
    {
        $selectQuery = $this->pdo->prepare("SELECT * FROM Cars");
        $selectQuery->execute();

        echo '<div class="admin-car-list">';
        echo '<h2>Alle auto\'s in ons assortiment:</h2>';

        while ($row = $selectQuery->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="admin-car-card">';
            echo '<div class="car-info">';
            echo '<div class="car-detail"><span class="detail-label">Auto-ID:</span> ' . $row['id'] . '</div>';
            echo '<div class="car-detail"><span class="detail-label">Model:</span> ' . $row['carModel'] . '</div>';
            echo '<div class="car-detail"><span class="detail-label">Zitplekken:</span> ' . $row['seats'] . '</div>';
            echo '<div class="car-detail"><span class="detail-label">Kilometerstand:</span> ' . $row['KM'] . ' km</div>';
            echo '<div class="car-detail"><span class="detail-label">Prijs:</span> €' . $row['price'] . '</div>';

            if (!empty($row['photo'])) {
                echo '<div class="car-image-container">';
                echo '<img src="../cars/' . $row['photo'] . '" alt="Auto foto" class="car-image">';
                echo '</div>';
            } else {
                echo '<p class="no-photo">Geen foto beschikbaar</p>';
            }

            echo '<div class="car-actions">';
            echo '<button class="btn-edit">Bewerken</button>';
            echo '<button class="btn-delete">Verwijderen</button>';
            echo '</div>';

            echo '</div></div>';
        }
        echo '</div>';
    }


    public function updateCar($id, $carModel, $seats, $KM, $price, $photo){
        $updateProcess = $this->pdo->prepare("UPDATE cars SET 
        carModel = :carModel, seats = :seats, KM = :KM, price = :price, photo = :photo 
        WHERE id = :id");

        $updateProcess->execute([
            ':id' => $id,
            ':carModel' => $carModel,
            ':seats' => $seats,
            'KM' => $KM,
            ':price' => $price,
            'photo' => $photo
        ]);
    }


    
}
?>