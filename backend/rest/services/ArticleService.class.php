<?php

require_once __DIR__ . "/../dao/ArticleDao.class.php";

class ArticleService {
    private $article_dao;
    public function __construct() {
        $this->article_dao = new ArticleDao();
    }   

    public function add_article($article) {
        return $this->article_dao->add_article($article);
    }

    public function get_all_articles() {
        return $this->article_dao->get();
    }

    public function get_article_by_id($id) {
        return $this->article_dao->get_by_id($id);
    }

    public function delete_article($id) {
        return $this->article_dao->delete_article($id);
    }

    public function update_article($id, $data) {
        return $this->article_dao->update_article($id, $data);
    }

    public function get_articles_by_category($category) {
        return $this->article_dao->get_by_category($category);
    }

    public function search_articles($query) {
        return $this->article_dao->search_articles($query);
    }
}

?>