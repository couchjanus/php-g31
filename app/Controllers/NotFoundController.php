<?php


require_once dirname(__DIR__)."/Core/Views/View.php";
require_once dirname(__DIR__)."/Core/Http/Response.php";

class NotFoundController
{
    private View $view;

    public function __construct()
    {
        $this->view = new View(VIEW_PATH);
        
    }

    public function index()
    {
        $content = $this->view->render('errors/404');
        return (new Response($content))->send();
    }

}
// render('errors/404');