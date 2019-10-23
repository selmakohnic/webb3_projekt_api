<?php

/* En klass vars uppgift är att hantera utbildningar i cv:et. */ 
class EducationsRegister {
    private $db;

    function __construct() {
        //Anslutning till databasen
        $this->db = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBDATABASE); 

        //Felhantering
        if($this->db->connect_errno > 0) {
            die ("Fel vid anslutning: " . $this->db->connect_error);
        }
    }

    //Hämtar alla utbildningar
    function getEducations() {
        //SQL-fråga för att hämta alla utbildningar
        $sql = "SELECT * FROM cv_educations order by id DESC";
        $result = $this->db->query($sql);                    
 
        //Retunerar resultatet som en array
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Hämtar en specifik utbildning
    function getSpecificEducation($id) {
        $id = intval($id);
        //SQL-fråga för att hämta ut en specifik utbildning baserat på id
        $sql = "SELECT * FROM cv_educations WHERE id = $id";
        $result = $this->db->query($sql);                    

        //Retunerar resultatet som en array
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Lägger till en utbildning
    function addEducation($duration, $name, $type, $description) {
        //SQL-fråga för att lägga till värden i tabellen cv_educations
        $sql = "INSERT INTO cv_educations (duration, name, type, description) VALUES ('$duration', '$name', '$type', '$description');";

        return $this->db->query($sql);
    }

    //Uppdaterar en utbildning
    function updateEducation($id, $duration, $name, $type, $description) {
        $id = intval($id);
        //SQL-fråga för att uppdatera en utbildning
        $sql = "UPDATE cv_educations SET duration = '$duration', name = '$name', type = '$type',
                description = '$description' WHERE id = $id;";
        
        return $this->db->query($sql);
    }

    //Raderar en utbildning
    function deleteEducation($id) {
        $id = intval($id);
        //SQL-fråga för att radera den utbildning som är kopplad till id:et som är valt
        $sql = "DELETE FROM cv_educations WHERE id = $id";
        
        return $this->db->query($sql);
    }
} 

?>