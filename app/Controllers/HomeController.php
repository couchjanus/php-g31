<?php

require_once dirname(__DIR__)."/Core/Views/View.php";
require_once dirname(__DIR__)."/Core/Http/Response.php";

class HomeController
{
    private View $view;

    public function __construct()
    {
        // echo "hello OOP";
        // render('home/index');
        $this->view = new View(VIEW_PATH);
        
    }

    public function index()
    {
        $content = $this->view->render('home/index');
        // echo $this->view->render('home/index');
        return (new Response($content))->send();
    }

}
// render('home/index');