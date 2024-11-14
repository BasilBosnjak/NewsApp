<?php
require_once __DIR__ . "/BaseDao.class.php";

class CommentDao extends BaseDao {
    public function __construct() {
        parent::__construct("comments");
    } 

    public function add_Comment($comment, $article_id) {
        $this->insert("comments", ["comment" => $comment, "article_id" => $article_id]);
    }

    public function get_Comments($article_id) {
        return $this->query("SELECT * FROM comments WHERE article_id = :article_id", ["article_id" => $article_id]);
    }

    public function delete_comments_by_article_id($article_id) {
        $this->query("DELETE FROM comments WHERE article_id = :article_id", ["article_id" => $article_id]);
    }
}

?>