<?php

class BirdSighting{
    public function __construct(
        public ?string $name,
        public ?string $email,
        public ?string $phone,
        public string $sightingDate,
        public string $sightingTime,
        public string $location,
        public string $species,
        public string $description
    ){
    }
}