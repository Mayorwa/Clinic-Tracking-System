<?php
require_once('Database.php');
class question {

    private $database;
    public function __construct(){
        $this->database = new Database();
    }

    public function create($data){
        $this->database->query('INSERT INTO car_details (car_id, owner_id, car_name, car_brand, car_chassis, car_plate_no, car_image, car_status)VALUES (null, :owner_id, :carName, :carBrand, :chasis, :plate_no, :imagePath, :status)');

        $this->database->bind(':owner_id', $data['id']);
        $this->database->bind(':carName', $data['car_name']);
        $this->database->bind(':carBrand',$data['car_brand']);

        if($this->database->execute()){
            return true;
        }
        else{
            return false;
        }
    }
}