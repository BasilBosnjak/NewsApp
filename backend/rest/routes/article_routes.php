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

    /**
     * @OA\Delete(path="/articles/{id}",
     * tags={"Articles"},
     * security={
     * {"ApiKey": {}}   
     * },
     * @OA\Parameter(@OA\Schema(type="integer"), in="path", name="id", default=1),
     * @OA\Response(response="200", description="Delete an article by id")
     * )
     */

    Flight::route('DELETE /articles/@id', function($id){
        $commentService = new CommentService();
        $articleService = new ArticleService();
        try {
            $commentService->delete_comments_by_article_id($id);
            
            $result = $articleService->delete_article($id);
            Flight::json(['message' => 'Article deleted successfully']);
        } catch (Exception $e) {
            Flight::halt(500, 'Internal Server Error: ' . $e->getMessage());
        }
    });

    /**
     * @OA\Put(path="/articles/{id}",
     * tags={"Articles"},
     * security={
     * {"ApiKey": {}}
     * },
     * @OA\Parameter(@OA\Schema(type="integer"), in="path", name="id", default=1),
     * @OA\RequestBody(description="Basic article info", required=true,
     *    @OA\MediaType(mediaType="application/json",
     *       @OA\Schema(
     *          @OA\Property(property="title", required="true", type="string", example="My First Article",	description="Title of the article" ),
     *          @OA\Property(property="category", required="true", type="string", example="News",	description="Category of the article" ),
     *          @OA\Property(property="summary", required="true", type="string", example="This is a summary of my first article.",	description="Summary of the article" ),
     *          @OA\Property(property="text", required="true", type="string", example="This is the content of my first article.",	description="Text of the article" ),
     *          @OA\Property(property="image", type="string", example="https://example.com/image.jpg",	description="Image URL of the article" )
     *       )
     *    )
     * ),
     * @OA\Response(response="200", description="Update an article by id")
     * )
     */

    Flight::route('PUT /articles/@id', function($id){
        $data = Flight::request()->data->getData();
        $articleService = new ArticleService();
        $result = $articleService->update_article($id, $data);
        Flight::json(['message' => 'Article updated successfully']);
    });

    /**
     * @OA\Get(path="/articles/category/{category}",
     * tags={"Articles"},
     * security={
     * {"ApiKey": {}}   
     * },
     * @OA\Parameter(@OA\Schema(type="string"), in="path", name="category", default="News"),
     * @OA\Response(response="200", description="Get articles by category")
     * )
     */

    Flight::route('GET /articles/category/@category', function($category){
        $articleService = new ArticleService();
        $articles = $articleService->get_articles_by_category($category);
        Flight::json($articles);
    });

    /**
     * @OA\Get(path="/articles/search/{query}",
     * tags={"Articles"},
     * security={
     * {"ApiKey": {}}   
     * },
     * @OA\Parameter(@OA\Schema(type="string"), in="path", name="query", default="News"),
     * @OA\Response(response="200", description="Search articles by query")
     * )
     */

    Flight::route('GET /articles/search/@query', function($query){
        $articleService = new ArticleService();
        $articles = $articleService->search_articles($query);
        if ($articles === false) {
            $articles = [];
        }
        Flight::json($articles);
    });

?>