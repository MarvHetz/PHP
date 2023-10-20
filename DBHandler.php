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
            if($result = $this->pdo->query("Select ID from userers where email='$email' and password='$password'")->num_rows == 1)
            {
                $row = $result->fetch_assoc();
                return $row["id"];
            }
            
            return false;
        }

        public function checkForEmail($email)
        {
            if($this->pdo->query("Select $email from userers where email='$email'")->num_rows == 1)
                return false;
            
            return true;
        }
    }
?>