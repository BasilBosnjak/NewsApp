<?php
    require_once __DIR__ . '/../services/CommentService.class.php';

    /**
     * @OA\Get(path="/comments/{article_id}",
     * tags={"Comments"},
     * security={
     * {"ApiKey": {}}   
     * },
     * @OA\Parameter(@OA\Schema(type="integer"), in="path", name="article_id", default=1),
     * @OA\Response(response="200", description="Get comments by article id")
     * )
     */

    Flight::route('GET /comments/@article_id', function($article_id){
        $commentService = new CommentService();
        $comments = $commentService->get_Comments($article_id);
        Flight::json($comments);
    });

    /**
     * @OA\Post(path="/comments",
     * tags={"Comments"},
     * security={
     * {"ApiKey": {}}   
     * },
     * @OA\RequestBody(description="Comment object that needs to be added to the store", required=true,
     * @OA\MediaType(mediaType="application/json",
     * @OA\Schema(
     * @OA\Property(property="comment", type="string", example="This is a comment"),
     * @OA\Property(property="article_id", type="integer", example=1)
     * )
     * )
     * ),
     * @OA\Response(response="200", description="Add a new comment"),
     * )
     */

    Flight::route('POST /comments', function(){
        $data = Flight::request()->data->getData();
        $commentService = new CommentService();
        $comment = $commentService->add_Comment($data['comment'], $data['article_id']);
        Flight::json($comment);
    });
?>