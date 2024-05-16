<?php

require_once __DIR__ . "/BaseDao.class.php";

class UserDao extends BaseDao {
    public function __construct() {
        parent::__construct("users");
    } 

    public function get_user_by_id($id) {
        return $this->query_unique("SELECT * FROM users WHERE id = :id", ["id" => $id]);
    }

    public function add_user($user) {
        $this->insert("users", $user);
    }

    public function update_user($id, $user) {
        $this->update("users", $id, $user, "id");
    }

    public function get_users($search, $offset, $limit, $order) {
        list($order_column, $order_direction) = self::parse_order($order);
        return $this->query("SELECT * FROM users
                             WHERE LOWER(name) LIKE CONCAT('%', :name, '%')
                             ORDER BY ${order_column} ${order_direction}
                             LIMIT ${limit} OFFSET ${offset}", 
                             ["name" => strtolower($search)]);
    }
}


?>