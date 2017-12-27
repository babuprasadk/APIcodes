<?php
class Device{
 
    // database connection and table name
    private $conn;
    private $table_name = "devices";
 
    // object properties
    public $id;
    public $deviceId;
    public $deviceLabel;
    public $lastUpdatedOn;

 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }


// read devices
function read(){
 
    // select all devices
    $query = "SELECT * from devices";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}}
?>