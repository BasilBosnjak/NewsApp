<?php
require_once __DIR__ . "/../dao/CommentDao.class.php";

class CommentService {
    private $comment_dao;
    public function __construct() {
        $this->comment_dao = new CommentDao();
    }
    public function add_Comment($comment, $article_id, $full_name) {
        return $this->comment_dao->add_Comment($comment, $article_id, $full_name);
    }

    public function get_Comments($article_id) {
        return $this->comment_dao->get_Comments($article_id);
    }

    public function delete_comments_by_article_id($article_id) {
        return $this->comment_dao->delete_comments_by_article_id($article_id);
    }
}

?>