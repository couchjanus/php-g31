<?php
declare(strict_types=1);

namespace Controllers\Admin;
 
use Core\Http\{Request, BaseController};


class DashboardController extends BaseController
{
    protected static string $layout = "admin";
    // public function __construct(private Request $request)
    // {
    //     $this->request = $request;
        
    // }

    public function index()
    {
        return $this->render('admin/index');
    }
    
}