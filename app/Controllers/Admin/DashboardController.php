<?php
declare(strict_types=1);

namespace Controllers\Admin;
 
use Core\Http\{Response, Request};
use Core\Views\View;

class DashboardController
{
    private View $view;

    public function __construct(private Request $request)
    {
        $this->view = new View(VIEW_PATH);
        $this->request = $request;
        
    }

    public function index()
    {
        $content = $this->view->render('admin/index');
        return (new Response($content))->send();
    }
    
}