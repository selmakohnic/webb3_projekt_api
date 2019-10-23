<?php

/* En klass vars uppgift är att hantera webbplatser i cv:et. */ 
class WebsitesRegister {
    private $db;

    function __construct() {
        //Anslutning till databasen
        $this->db = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBDATABASE); 

        //Felhantering
        if($this->db->connect_errno > 0) {
            die ("Fel vid anslutning: " . $this->db->connect_error);
        }
    }

    //Hämtar alla webbplatser
    function getWebsites() {
        //SQL-fråga för att hämta alla webbplatser
        $sql = "SELECT * FROM cv_websites";
        $result = $this->db->query($sql);                    
 
        //Retunerar resultatet som en array
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Hämtar en specifik webbplats
    function getSpecificWebsite($id) {
        $id = intval($id);
        //SQL-fråga för att hämta ut en specifik webbplats baserat på id
        $sql = "SELECT * FROM cv_websites WHERE id = $id";
        $result = $this->db->query($sql);                    

        //Retunerar resultatet som en array
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Lägger till en webbplats
    function addWebsite($title, $url, $description, $image) {
        //SQL-fråga för att lägga till värden i tabellen cv_websites
        $sql = "INSERT INTO cv_websites (title, url, description, image) VALUES ('$title', '$url', '$description', '$image');";

        return $this->db->query($sql);
    }

    //Uppdaterar en webbplats
    function updateWebsite($id, $title, $url, $description, $image) {
        $id = intval($id);
        //SQL-fråga för att uppdatera en webbplats
        $sql = "UPDATE cv_websites SET title = '$title', url = '$url', description = '$description',
                image = '$image' WHERE id = $id;";
        
        return $this->db->query($sql);
    }

    //Raderar en webbplats
    function deleteWebsite($id) {
        $id = intval($id);
        //SQL-fråga för att radera den webbplats som är kopplad till id:et som är valt
        $sql = "DELETE FROM cv_websites WHERE id = $id";
        
        return $this->db->query($sql);
    }
} 

?>