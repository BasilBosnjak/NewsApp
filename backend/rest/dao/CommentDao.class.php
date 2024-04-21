<?php
require_once __DIR__ . "/BaseDao.class.php";

class CommentDao extends BaseDao {
    public function __construct() {
        parent::__construct("comments");
    } 

    public function add_Comment($comment) {
        $this->insert("comments", $comment);
    }
}

?>