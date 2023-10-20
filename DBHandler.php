<?php
    class dbHandler
    {
        private $pdo;
        
        public function __construct()
        {
            $this->pdo = new PDO('mysql:host=localhost;dbname=ticketsystem','root','');
        }

        public function validateLogin($email,$password)
        {
            if(count(($result = $this->pdo->query("Select ID from users where email='$email' and password='$password'"))->fetchAll()) == 1)
            {
                $row = $result->fetch_assoc();
                return $row["id"];
            }
            
            return false;
        }

        public function checkForEmail($email)
        {
            if(count($this->pdo->query("Select email from users where email='$email'")->fetchAll()) == 1)
                return false;
            
            return true;
        }
    }
?>