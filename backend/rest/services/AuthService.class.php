<?php
    require_once __DIR__ . '/../dao/AuthDao.class.php';

    class AuthService {
        private $authDao;

        public function __construct() {
            $this->authDao = new AuthDao();
        }

        public function add_user($user) {
            $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);
            return $this->authDao->add_user($user);
        }

        public function login($email, $password) {
            $user = $this->authDao->get_user_by_email($email);
            if ($user && password_verify($password, $user['password'])) {
                return $user;
            } else {
                throw new Exception("Invalid email or password");
            }
        }


    }

?>