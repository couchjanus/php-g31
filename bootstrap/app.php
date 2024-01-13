<?php
// echo "Hello there";

define('ROOT', dirname(__DIR__));
const VIEW_PATH = ROOT.'/views';

function url()
{
    return trim($_SERVER['REQUEST_URI'], '/');
}
// 
$get_controller = fn($controller) => include_once dirname(__DIR__)."/app/Controllers/$controller.php";

// $route = match(url()) {
//     '' => $get_controller('HomeController'),
//     'about' => $get_controller('AboutController'),
//     'contact' => $get_controller('ContactController'),
//     default => $get_controller('NotFoundController'),
// };

switch(url()) {
    case '': 
        $get_controller('HomeController');
        $controller = new HomeController();
        $action = 'index';

        if (method_exists($controller, 'index')) {
            $controller->index();
        }

        break;

    case 'about':
        $get_controller('AboutController');
        (new AboutController())->index();
        break;
    case 'contact':
        $get_controller('ContactController');
        (new ContactController())->index();
        break;
    default:
        $get_controller('NotFoundController');
        (new NotFoundController())->index();

}

// function render(string $view, array $context = [])
// {
//     ob_start();
//     $content = load($view, $context);
//     require_once dirname(__DIR__)."/views/layouts/app.php";
//     echo str_replace("{{ content }}", $content, ob_get_clean());

// }

// function load(string $view, array $context): string
// {
//     $path = dirname(__DIR__)."/views/";
//     $file = $path.$view.".php";

//     extract($context);

//     ob_start();
//     include($file);
//     return ob_get_clean();
// }