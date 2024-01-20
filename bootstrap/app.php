<?php

define('ROOT', dirname(__DIR__));
const VIEW_PATH = ROOT.'/views';
const DB_CONFIG_FILE = ROOT.'/config/db.php';
const ROUTER_PATH = ROOT.'/config/routes.php';
require_once __DIR__.'/Autoloader.php';

(new Core\App())->run();


// 
// $get_controller = fn($controller) => include_once dirname(__DIR__)."/app/Controllers/$controller.php";

// $route = match(url()) {
//     '' => $get_controller('HomeController'),
//     'about' => $get_controller('AboutController'),
//     'contact' => $get_controller('ContactController'),
//     default => $get_controller('NotFoundController'),
// };

// switch(url()) {
//     case '': 
//         $get_controller('HomeController');
//         $controller = new HomeController();
//         $action = 'index';

//         if (method_exists($controller, 'index')) {
//             $controller->index();
//         }

//         break;

//     case 'about':
//         $get_controller('AboutController');
//         (new AboutController())->index();
//         break;
//     case 'contact':
//         $get_controller('ContactController');
//         (new ContactController())->index();
//         break;
//     default:
//         $get_controller('NotFoundController');
//         (new NotFoundController())->index();

// }
