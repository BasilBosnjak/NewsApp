<?php
    require_once __DIR__ . '/../services/ArticleService.class.php';

    Flight::route('GET /articles', function(){
        $articleService = new ArticleService();
        $articles = $articleService->get_all_articles();
        Flight::json($articles);
    }); 

    Flight::route('GET /articles/@id', function($id){
        $articleService = new ArticleService();
        $article = $articleService->get_article_by_id($id);
        Flight::json($article);
    });

?>