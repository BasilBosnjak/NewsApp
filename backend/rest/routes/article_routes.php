<?php

    require_once __DIR__ . '/../services/ArticleService.class.php';

    /**
     * @OA\Get(path="/articles",
     * tags={"Articles"},
     * @OA\Response(response="200", description="List all articles from database")
     * )
     */

    Flight::route('GET /articles', function(){
        $articleService = new ArticleService();
        $articles = $articleService->get_all_articles();
        Flight::json($articles);
    });

    /**
     * @OA\Get(path="/articles/{id}",
     * tags={"Articles"},
     * @OA\Parameter(@OA\Schema(type="integer"), in="path", name="id", default=1),
     * @OA\Response(response="200", description="Get article by id")
     * )
     */

    Flight::route('GET /articles/@id', function($id){
        $articleService = new ArticleService();
        $article = $articleService->get_article_by_id($id);
        Flight::json($article);
    });

?>