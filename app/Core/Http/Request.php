<?php
declare(strict_types=1);

namespace Core\Http;

class Request 
{

    private array $request;

    public function __construct()
    {
        $this->request = $_REQUEST;
    }

    public function uri()
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }
}