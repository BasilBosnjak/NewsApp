<?php

require_once __DIR__ . "/rest/services/CommentService.class.php";

$commentService = new CommentService();

// Get comment from the request
$comment = $_GET ['comment'];
$article_id = $_GET ['article_id'];

// Pass comment data to the add_Comment method
$commentService->add_Comment($comment, $article_id);

echo json_encode(["status" => "success"])
?>