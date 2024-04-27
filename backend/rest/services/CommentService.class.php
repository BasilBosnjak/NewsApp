<?php
require_once __DIR__ . "/../dao/CommentDao.class.php";

class CommentService {
    private $comment_dao;
    public function __construct() {
        $this->comment_dao = new CommentDao();
    }
    public function add_Comment($comment, $article_id) {
        return $this->comment_dao->add_Comment($comment, $article_id);
    }

    public function get_Comments($article_id) {
        return $this->comment_dao->get_Comments($article_id);
    }
}

?>