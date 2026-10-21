<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../src/birdSighting.php';
require_once __DIR__ . '/../src/SightingRepository.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header('location: /report.php');
    exit;
}

$name = trim($_POST["name"]) ?? '';
$email = trim($_POST["email"]) ?? '';
$phone = trim($_POST["phone"]) ?? '';
$sightingDate = trim($_POST["sightingDate"]) ?? '';
$sightingTime = trim($_POST["sightingTime"]) ?? '';
$location = trim($_POST["location"]) ?? '';
$species = trim($_POST["species"]) ?? '';
$description = trim($_POST["description"]) ?? '';

$errors = [];

if( $sightingDate === '' || $sightingTime === '' ||
    $location === '' || $species === '' ||
    $description === '') {
    $errors[] = 'Please complete all the required fields.';
}

if($email !== '' && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address.';
}

if($phone !== '' && strlen(preg_replace('/\D/', '', $phone)) !== 10) {
    $errors[] = 'Please enter a valid phone number.';
}

$dateTime = DateTime::createFromFormat('!Y-m-d H:i',
    $sightingDate . ' ' . $sightingTime);

if(!$dateTime ||
    $dateTime->format("Y-m-d H:i") !== $sightingDate . ' ' . $sightingTime ||
    $dateTime > new DateTime()) {
    $errors[] = 'Please enter a valid date.';
}

if(!empty($errors)) {
    http_response_code(422);
    foreach ($errors as $error) {
        echo htmlspecialchars($error);
    }
    exit;
}

$sighting = new BirdSighting(
    $name ?: null,
    $email ?: null,
    $phone ?: null,
    $sightingDate,
    $sightingTime,
    $location,
    $species,
    $description
);

$repository = new SightingRepository($pdo);

try {
    $repository->save($sighting);
}catch (PDOException $e) {
    error_log($e->getMessage());
    http_response_code(500);
    exit('Unable to save sighting.');
}

header('location: /report.php?success=1');
exit;