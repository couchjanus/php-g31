<?php
declare(strict_types=1);

namespace Controllers\Admin;
 
use Core\Http\{Response, Request};
use Core\Views\View;

class BrandController
{
    private View $view;

    public function __construct(private Request $request)
    {
        $this->view = new View(VIEW_PATH);
        $this->request = $request;
        
    }

    public function index()
    {
        $content = $this->view->render('admin/brands/index');
        return (new Response($content))->send();
    }
    
    public function create()
    {
        $content = $this->view->render('admin/brands/create');
        return (new Response($content))->send();
    }

    public function store()
    {
       
    }

    public function show($params)
    {
        extract($params);
       
    }

    public function edit($params)
    {
        var_dump($params);
        extract($params);
        var_dump($id);
        exit();
        $content = $this->view->render('admin/brands/edit');
        return (new Response($content))->send();
    }

    public function update()
    {
       
    }

    public function destroy($params)
    {
        extract($params);
       
    }

}