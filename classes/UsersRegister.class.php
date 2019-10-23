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

    //Hanterar inloggning
    function loginUser($username, $password) {
        //Kontrollerar värden
        if(!$this->setUsername($username)) {return false;}
        if(!$this->setPassword($password)) {return false;}

        //SQL-fråga för inloggning
        $sql = "SELECT password FROM cv_user WHERE cv_username = '" . $this->username . "'";
        
        $result = $this->db->query($sql);

        //Om det finns ett användarkonto där användarnamnet och lösenordet stämmer överens påbörjas en inloggning
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $storedpassword = $row["password"];

            if ($storedpassword == crypt($password, $storedpassword)) {
                $_SESSION["cv_username"] = $username;
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return false; 
        }
    }

    //Hanterar en del säkerhet
    function setUsername($username) {
        /* Om användarnamnet som matas in inte är tomt görs en escape på alla tecken så att ingen 
           kan skriva in exempelvis kod som på något sätt förstör databasen, SQL-frågorna eller liknande. */
        if($username != "") {
            $username = strip_tags($username); //Tar bort eventuell kod som skulle kunna vara farlig
            $this->username = $this->db->real_escape_string($username);
            return true;
        }
        else {
            return false;
        }
    }

    //Kontrollerar en del säkerhet
    function setPassword($password) {
        /* Om lösenordet som matas in inte är tomt görs en escape på alla tecken så att ingen 
          kan skriva in exempelvis kod som på något sätt förstör databasen, SQL-frågorna eller liknande. */
       if($password != "") {
           $password = strip_tags($password); //Tar bort eventuell kod som skulle kunna vara farlig
           $this->password = $this->db->real_escape_string($password);
           return true;
       }
       else {
           return false;
       }
   }
} 

?>