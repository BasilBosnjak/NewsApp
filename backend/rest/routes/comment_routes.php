<?php
    require_once __DIR__ . '/../services/CommentService.class.php';

    Flight::route('GET /comments/@article_id', function($article_id){
        $commentService = new CommentService();
        $comments = $commentService->get_Comments($article_id);
        Flight::json($comments);
    });

    Flight::route('POST /comments', function(){
        $data = Flight::request()->data->getData();
        $commentService = new CommentService();
        $comment = $commentService->add_Comment($data['comment'], $data['article_id']);
        Flight::json($comment);
    });
?>