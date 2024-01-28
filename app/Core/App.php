<?php 
namespace Core;

use Core\Http\Request;

class App 
{
    private Request $request;

    public function __construct()
    {
        Session::instance();
    }

    public function run()
    {
        $this->request = new Request();
        (new Router($this->request, ROUTER_PATH))->run();

    }

}
