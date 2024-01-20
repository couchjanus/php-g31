<?php

declare(strict_types=1);

namespace Controllers;

// use Core\Models\DB;
use Core\Views\View;
use Core\Http\{Response, Request};

// require_once dirname(__DIR__)."/Core/Views/View.php";
// require_once dirname(__DIR__)."/Core/Http/Response.php";

class AboutController
{
    private View $view;

    public function __construct(private Request $request)
    {
        $this->view = new View(VIEW_PATH);
        $this->request = $request;
        
    }

    public function index()
    {
        $content = $this->view->render('about/index');
        return (new Response($content))->send();
    }

}
// render('about/index');