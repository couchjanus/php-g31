<?php
declare(strict_types=1);
namespace Core\Views;

class View
{
    private string $path;

    public function __construct(string $path, protected string $layout="app", protected array $parameters=[])
    {
        $this->path = rtrim($path, '/').'/';
        $this->parameters = $parameters;
        $this->layout =  $layout;
    }

    public function render(string $view, array $context = [])
    {
        ob_start();
        $content = $this->load($view, $context);
        require_once VIEW_PATH."/layouts/$this->layout.php";
        return str_replace("{{ content }}", $content, ob_get_clean());
    }

    private function load(string $view, array $context): string
    {
        // $path = dirname(__DIR__)."/views/";
        $file = $this->path.$view.".php";

        extract($context);

        ob_start();
        include($file);
        return ob_get_clean();
    }
}