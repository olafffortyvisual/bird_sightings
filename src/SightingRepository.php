<?php

class SightingRepository{
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function save(BirdSighting $birdSighting): bool{
        $sql = "INSERT INTO sighting (
                       name, 
                       email, 
                       phone, 
                       sighting_date, 
                       sighting_time, 
                       location, 
                       species, 
                       description)
                    VALUES (:name,:email,:phone,:sightingDate,:sightingTime,:location,:species,:description);";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':name' => $birdSighting->name,
            ':email' => $birdSighting->email,
            ':phone' => $birdSighting->phone,
            ':sightingDate' => $birdSighting->sightingDate,
            ':sightingTime' => $birdSighting->sightingTime,
            ':location' => $birdSighting->location,
            ':species' => $birdSighting->species,
            ':description' => $birdSighting->description,
        ]);
    }
}