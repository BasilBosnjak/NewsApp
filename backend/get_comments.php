<?php

require_once __DIR__ . "/rest/services/CommentService.class.php";

$commentService = new CommentService();

$article_id = $_GET['article_id'];

$comments = $commentService->get_Comments($article_id);

header('Content-Type: application/json');
echo json_encode($comments);
?>