<?php
// echo "Hello there";

function url()
{
    return trim($_SERVER['REQUEST_URI'], '/');
}

$get_controller = fn($controller) => include_once dirname(__DIR__)."/app/Controllers/$controller.php";

$route = match(url()) {
    '' => $get_controller('HomeController'),
    'about' => $get_controller('AboutController'),
    'contact' => $get_controller('ContactController'),
    default => $get_controller('NotFoundController'),
};


function render(string $view, array $context = [])
{
    ob_start();
    $content = load($view, $context);
    require_once dirname(__DIR__)."/views/layouts/app.php";
    echo str_replace("{{ content }}", $content, ob_get_clean());

}

function load(string $view, array $context): string
{
    $path = dirname(__DIR__)."/views/";
    $file = $path.$view.".php";

    extract($context);

    ob_start();
    include($file);
    return ob_get_clean();
}