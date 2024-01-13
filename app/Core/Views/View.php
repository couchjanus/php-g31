<?php
declare(strict_types=1);

class View
{
    private string $path;
    private array $parameters;

    public function __construct(string $path, array $parameters=[])
    {
        $this->path = rtrim($path, '/').'/';
        $this->parameters = $parameters;
    }

    public function render(string $view, array $context = [])
    {
        ob_start();
        $content = $this->load($view, $context);
        require_once VIEW_PATH."/layouts/app.php";
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