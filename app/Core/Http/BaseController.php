<?php
declare(strict_types=1);

namespace Core\Http;

use Core\Views\View;

class BaseController
{
    private View $view;

    protected static string $layout;

    public function __construct(private Request $request)
    {
        $this->request = $request;
        $this->view = new View(VIEW_PATH, static::$layout);
    }

    public function render($content, array $context = [])
    {
        $rendered_content = $this->view->render($content, $context);
        return (new Response($rendered_content))->send();
    }

    public function redirect($location="")
    {
        return Response::redirect($location);
    }

}