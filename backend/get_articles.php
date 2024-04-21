<?php
require_once __DIR__ . "/rest/services/ArticleService.class.php";

$article_id = $_REQUEST['id'];

$article_service = new ArticleService();

$article = $article_service->get_article_by_id($article_id);

header('Content-Type: application/json');
echo json_encode($article);
?>