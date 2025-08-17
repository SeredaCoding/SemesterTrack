<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/app/controllers/AvaliacaoController.php';

$controller = new AvaliacaoController();
$controller->index();
