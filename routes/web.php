<?php

use App\Config\Router\Router;

// Router::prefix('/api/v1');

Router::get('/', 'HomeController:home');
Router::get('/blog', 'PostController:blog');
Router::get('/blog/{id}/{slug}', 'PostController:read');

Router::get('/contact', 'ContactController:index');
Router::post('/contact', 'ContactController:store');
Router::get('/thank-you-contact', 'ContactController:thankYou');

Router::get('/privacy-policy', fn() => view('privacy-policy'));
Router::get('/terms-of-use', fn() => view('terms-of-use'));

Router::get('/about', fn() => view('about'));

Router::get('/newsletter', 'NewsletterController:index');
Router::post('/newsletter', 'NewsletterController:create');
Router::get('/unsubscribe', 'NewsletterController:delete');
Router::get('/unsubscribe-newsletter', 'NewsletterController:unsubscribe');
Router::get('/thank-you-newsletter', 'NewsletterController:thankYou');


Router::run();

if (Router::error()) {
    http_response_code(404);
    view('404');
}
