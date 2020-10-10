<?php
// evitar problema com cache
opcache_reset();

//load environment variable
require_once __DIR__ . '/../App/Config/_env.php';

//set custom error handler
set_error_handler([new \App\Classes\ErrorHandler(), 'handleErrors'], E_ALL);

require_once __DIR__ . '/../App/Routing/routes.php';

new \App\Routing\RouteDispatcher($router);
