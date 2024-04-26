<?php

require_once __DIR__ . "/rest/services/ArticleService.class.php";

$articleService = new ArticleService();
$articles = $articleService->get_all_articles();

header('Content-Type: application/json');
echo json_encode($articles);
?>