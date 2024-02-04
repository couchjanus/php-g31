<?php 
declare(strict_types=1);

namespace Controllers;

use Core\Http\{Request, BaseController};
use Models\{Brand, Category, Badge, Product};

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

    public function getProducts()
    {
        $products = (new Product())->select(["products.*", "categories.name as category", "categories.id as categoryId", "brands.name as brand", "brands.id as brandId", "badges.title", "badges.type"])->join(["categories"=>"category_id", "brands"=>"brand_id", "badges"=>"badge_id"])->get();

        echo json_encode($products);
    }

}
