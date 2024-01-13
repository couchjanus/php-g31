<?php

require_once dirname(__DIR__)."/Core/Views/View.php";
require_once dirname(__DIR__)."/Core/Http/Response.php";

class AboutController
{
    private View $view;

    public function __construct()
    {
        $this->view = new View(VIEW_PATH);
        
    }

    public function index()
    {
        $content = $this->view->render('about/index');
        return (new Response($content))->send();
    }

}
// render('about/index');