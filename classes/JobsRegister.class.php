<?php

/* En klass vars uppgift är att hantera jobb i cv:et. */ 
class JobsRegister {
    private $db;

    function __construct() {
        //Anslutning till databasen
        $this->db = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBDATABASE); 

        //Felhantering
        if($this->db->connect_errno > 0) {
            die ("Fel vid anslutning: " . $this->db->connect_error);
        }
    }

    //Hämtar alla jobb
    function getJobs() {
        //SQL-fråga för att hämta alla jobb
        $sql = "SELECT * FROM cv_jobs order by id DESC";
        $result = $this->db->query($sql);                    
 
        //Retunerar resultatet som en array
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Hämtar ett specifikt jobb
    function getSpecificJob($id) {
        $id = intval($id);
        //SQL-fråga för att hämta ut ett specifikt jobb baserat på id
        $sql = "SELECT * FROM cv_jobs WHERE id = $id";
        $result = $this->db->query($sql);                    

        //Retunerar resultatet som en array
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function addJob($duration, $company, $role, $description) {
        //SQL-fråga för att lägga till värden i tabellen cv_jobs
        $sql = "INSERT INTO cv_jobs (duration, company, role, description) VALUES ('$duration', '$company', '$role', '$description');";

        return $this->db->query($sql);
    }

    //Uppdaterar ett jobb
    function updateJob($id, $duration, $company, $role, $description) {
        $id = intval($id);
        //SQL-fråga för att uppdatera ett jobb
        $sql = "UPDATE cv_jobs SET duration = '$duration', company = '$company', role = '$role',
                description = '$description' WHERE id = $id;";
        
        return $this->db->query($sql);
    }

    //Raderar ett jobb
    function deleteJob($id) {
        $id = intval($id);
        //SQL-fråga för att radera det jobb som är kopplat till id:et som är valt
        $sql = "DELETE FROM cv_jobs WHERE id = $id";
        
        return $this->db->query($sql);
    }
} 

?>