<?php
namespace Controllers\Admin;

use Core\Http\{Request, BaseController};

use Models\{Product, Brand, Badge, Category};
use Core\Traits\{Upload, Resizer};

class ProductController extends BaseController
{
    use Upload, Resizer;

    protected static string $layout = 'admin';
    
    private Product $product;

    public function __construct(protected Request $request)
    {
        $this->request = $request;
        parent::__construct();
        $this->product = new Product();
    }


    public function index()
    {
        $products = $this->product->all();
        $this->render('admin/products/index', compact('products'));
    }

    public function create()
    {
        $categories = (new Category())->all();
        $badges = (new Badge())->all();
        $brands = (new Brand())->all();
        $this->render('admin/products/create', ['categories'=> $categories, 'badges' => $badges, 'brands' => $brands]);
    }
    public function store()
    {

        $this->product->name = $this->request->name;
        $this->product->price = $this->request->price;
        $this->product->description = $this->request->description;
        $this->product->category_id = $this->request->category_id;
        $this->product->brand_id = $this->request->brand_id;
        $this->product->badge_id = $this->request->badge_id;
        $this->product->status = $this->request->status? 1 : 0;
        
        $imgObj = $this->load($this->request->image['tmp_name']);
        $image = $this->resize_width(300, $imgObj);
        $this->product->image = $this->save($image, "/products/", $imgObj->type, 75);
        unset($imgObj);

        if($this->product->save()) {
            $this->redirect('/admin/products');
        } else {
            $this->redirect('/errors');
        }
    }

    public function edit($params)
    {
        extract($params);
        $product = $this->product->first($id);
        $this->render('admin/products/edit', compact('product'));
    }

    public function update()
    {
        $this->product->id = $this->request->id;
        $this->product->name = $this->request->name;
        $this->product->category_id = $this->request->category_id;

        if($this->product->save()) {
            $this->redirect('/admin/products');
        } else {
            $this->redirect('/errors');
        }

    }
    public function show()
    {

    }
    public function destroy($params)
    {
        extract($params);
        if($_POST) {
            if ($this->product->delete($this->request->id)) {
                $this->redirect('/admin/products');
            } else {
                $this->redirect('/errors');
            }
        }

    }
}