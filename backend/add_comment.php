<?php

require_once __DIR__ . "/rest/services/CommentService.class.php";

$commentService = new CommentService();

// Get comment from the request
$comment = $_GET ['comment'];

// Pass comment data to the add_Comment method
$commentService->add_Comment(['comment' => $comment]);


?>