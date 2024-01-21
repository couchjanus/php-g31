<?php 
declare(strict_types=1);

namespace Controllers;

use Core\Http\{Request, BaseController};

class HomeController extends BaseController
{
    protected static string $layout = "app";
    // public function __construct(private Request $request)
    // {
    //     $this->request = $request;    
    // }

    public function index()
    {
        return $this->render('home/index');
    }

}
