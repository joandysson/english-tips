<?php

use App\Config\Router\Router;

// Router::prefix('/api/v1');

Router::get('/', 'HomeController:home');
Router::get('/blog', 'PostController:blog');
Router::get('/blog/{id}/{slug}', 'PostController:read');
Router::get('/contact', fn() => view('contact'));
Router::get('/tools', fn() => view('tools'));
Router::get('/privacy-policy', fn() => view('privacy-policy'));
Router::get('/terms-of-use', fn() => view('terms-of-use'));
Router::get('/about', fn() => view('about'));

Router::get('/newsletter', fn() => view('newsletter'));

Router::run();

if (Router::error()) {
    http_response_code(404);
    view('404');
}
