<?php

require_once __DIR__ . "/rest/services/ArticleService.class.php";

$article_service = new ArticleService();
$article = $_POST;
$article_service->add_article([]);

?>