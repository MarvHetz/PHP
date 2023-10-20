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
            $result = $this->pdo->query("Select count(*) from users where email='$email' and password='$password';");

            if ($result->fetchColumn() == 1)
            {
                $result = $this->pdo->query("Select id from users where email='$email' and password='$password';");
                return $result->fetchColumn();
            }
            else
                return false;

        }

        public function userIsAdmin($id)
        {
            $result = $this->pdo->query("Select admin from users where id='$id';");
            return $result->fetchColumn();
        }

        public function checkForEmail($email)
        {
            $result = $this->pdo->query("Select count(*) from users where email='$email';");
            if ($result->fetchColumn() == 1)
                return false;
            else
                return true;
        }

        public function getAllTickets()
        {
            return $this->pdo->query("Select t.id,u.email,t.shortdescriptio,t.longdescription from tickets t, users u where u.id = t.user and solved = false;");
        }
    }
?>