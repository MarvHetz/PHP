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
            $result = $this->pdo->query("Select password from users where email='$email';");

            if (password_verify($password,$result->fetchColumn()))
            {
                $result = $this->pdo->query("Select id from users where email='$email';");
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

        public function addNewUser($email, $password)
        {
            $insert = $this->pdo->prepare("INSERT INTO users(`ID`, `Email`, `Password`, `Admin`) VALUES (NULL,:email,:password,'false')");
            $password = password_hash($password,PASSWORD_DEFAULT);
            $insert->execute(['email' => $email, 'password' => $password]);
        }

        public function getAllTickets()
        {
            return $this->pdo->query("Select t.id,u.email,t.shortdescription,t.longdescription from tickets t, users u where u.id = t.user and solved = false;");
        }

        public function addTicket($userid, $shortdescription, $longdescription)
        {
            $insert = $this->pdo->prepare("INSERT INTO `tickets`(`ID`, `User`, `Shortdescription`, `Longdescription`, `Solved`) VALUES (NULL,:userid,:shortdescription,:longdescription,'false')");
            $insert->execute(['userid' => $userid,'shortdescription' => $shortdescription,'longdescription' => $longdescription]);
        }
    }
?>