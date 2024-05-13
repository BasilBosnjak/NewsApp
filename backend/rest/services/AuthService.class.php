<?php
    require_once __DIR__ . '/../dao/AuthDao.class.php';

    class AuthService {

        private $auth_Dao;

        public function __construct() {
            $this->auth_Dao = new AuthDao();
        }
    }
?>