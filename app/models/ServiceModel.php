<?php
class ServiceModel{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // public function service($data){
    //     $this->addService($data);
    // }

    // public function addService($data){
    //   $this->db->query("INSERT INTO services (sName, sPrice, status) VALUES(,:sName, :sPrice, 'active')");
    
    //   $this->db->bind(':sName', $data['sName']);
    //   $this->db->bind(':sPrice', $data['sPrice']);

    //   $this->db->execute();
    // }
}