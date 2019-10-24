<?php

/* En klass vars uppgift är att hantera personuppgifterna i cv:et. */ 
class UsersRegister {
    private $db;

    function __construct() {
        //Anslutning till databasen
        $this->db = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBDATABASE); 

        //Felhantering
        if($this->db->connect_errno > 0) {
            die ("Fel vid anslutning: " . $this->db->connect_error);
        }
    }

    //Hämtar alla personuppgifter
    function getUserInfo() {
        //SQL-fråga för att hämta allt innehåll i tabellen cv_user
        $sql = "SELECT id, name, personal_id, address, zip_code, city, email, phone FROM cv_user";
        $result = $this->db->query($sql);                    
 
        //Retunerar resultatet som en array
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Uppdaterar personuppgifterna
    function updateUserInfo($name, $address, $zip_code, $city, $email, $phone) {
        //SQL-fråga för att uppdatera personuppgifter
        $sql = "UPDATE cv_user SET name = '$name', address = '$address', zip_code = '$zip_code',
                city = '$city', email = '$email', phone = '$phone' WHERE id = 1;";
        
        return $this->db->query($sql);
    }
} 

?>