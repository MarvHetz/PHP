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
            $result = $this->pdo->query("Select password from users where email='$email' and userrole != '2';");

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
            $result = $this->pdo->query("Select UserRole from users where id='$id';");
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
            $insert = $this->pdo->prepare("INSERT INTO users(`ID`, `Email`, `Password`, `UserRole`) VALUES (NULL,:email,:password,'0')");
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

        public function getUserEmailByTicketId($ticketID)
        {
            $select = $this->pdo->query("Select u.email, t.id, t.shortdescription from users u, tickets t where u.id = t.user and t.id = '$ticketID'");
            return $select;

        }

        public function markTicketAsSolved($id)
        {
            $update = $this->pdo->prepare("UPDATE `tickets` SET `Solved`='1' WHERE id = :id");
            $update->execute(['id' => $id]);

        }

        public function getAllUsers($id)
        {
            return $this->pdo->query("Select id, email, userrole from users where id != '$id' and UserRole != '2'");
        }

        public function manageAdminPriviliges($id)
        {
            $result = $this->userIsAdmin($id);
            if ($result == 1)
            {
                $update = $this->pdo->prepare("UPDATE `users` SET `UserRole` = '0' where id = :id");
                $update->execute(['id' => $id]);
            }
            else
            {
                $update = $this->pdo->prepare("UPDATE `users` SET `UserRole` = '1' where id = :id");
                $update->execute(['id' => $id]);
            }
        }

        public function deleteUser($id)
        {
            $delete = $this->pdo->prepare("UPDATE `users` SET `UserRole` = '2' where id = :id");
            $delete->execute(['id' => $id]);
        }
    }
?>