<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/Config/functions.php';

// Load .env if present
if (class_exists('Dotenv\\Dotenv')) {
    $dotenv = Dotenv\Dotenv::createUnsafeImmutable(dirname(__DIR__));
    $dotenv->safeLoad();
}

