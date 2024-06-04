<?php

require_once __DIR__ . "/BaseDao.class.php";

class ArticleDao extends BaseDao {
    public function __construct() {
        parent::__construct("articles");
    }

    public function add_article($article){
        return $this->insert("articles", $article);
    }

    public function get(){
        return $this->get_all(0, 100000);
    }

    public function get_by_id($article_id){
        return $this->query_unique("SELECT * FROM articles WHERE id = :id", ["id" => $article_id]);
    }

    public function delete_article($id) {
        return $this->delete($id);
    }

    public function update_article($id, $data){
        $this->update($id, $data);
    }
    
}

?>