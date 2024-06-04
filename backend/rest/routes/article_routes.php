<?php

    require_once __DIR__ . '/../services/ArticleService.class.php';

    /**
     * @OA\Get(path="/articles",
     * tags={"Articles"},
     * security={
     * {"ApiKey": {}}   
     * },
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
     * security={
     * {"ApiKey": {}}   
     * },
     * @OA\Parameter(@OA\Schema(type="integer"), in="path", name="id", default=1),
     * @OA\Response(response="200", description="Get article by id")
     * )
     */

    Flight::route('GET /articles/@id', function($id){
        $articleService = new ArticleService();
        $article = $articleService->get_article_by_id($id);
        Flight::json($article);
    });

    /**
     * @OA\Post(path="/articles",
     * tags={"Articles"},
     * security={
     * {"ApiKey": {}}   
     * },
     * @OA\RequestBody(description="Article info", required=true,
     *     @OA\MediaType(mediaType="application/json",
     *     @OA\Schema(
     *         @OA\Property(property="title", type="string", example="Article Title", description="Title of the article"),
     *         @OA\Property(property="category", type="string", example="Category", description="Category of the article"),
     *         @OA\Property(property="summary", type="string", example="Summary of the article", description="Summary of the article"),
     *         @OA\Property(property="text", type="string", example="Text of the article", description="Text of the article"),
     *         @OA\Property(property="image", type="string", example="image.jpg", description="Image of the article")
     *     )
     *   )
     * ),
     * @OA\Response(response="200", description="Add a new article")
     * )
     */

    Flight::route('POST /articles', function(){
        $request = Flight::request();
        $data = $request->data->getData();
        $articleService = new ArticleService();
        $article = $articleService->add_article($data);
        Flight::json($article);
    });

?>