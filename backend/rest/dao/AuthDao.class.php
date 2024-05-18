<?php
require_once __DIR__ . '/BaseDao.class.php';

class AuthDao extends BaseDao {
    
        public function __construct() {
            parent::__construct("users");
        }
    
        public function add_user($user) {
            $sql = "INSERT INTO users (full_name, email, password) VALUES (:full_name, :email, :password)";
            $stmt= $this->connection->prepare($sql);
            $stmt->execute($user);
            $user['id'] = $this->connection->lastInsertId();
            return $user;
        }

        public function get_user_by_email($email) {
            return $this->query_unique("SELECT * FROM users WHERE email = :email", ["email" => $email]);
        }
    
}

?>