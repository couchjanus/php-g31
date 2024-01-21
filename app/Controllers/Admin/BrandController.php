<?php
declare(strict_types=1);

namespace Controllers\Admin;
 
use Core\Http\{Request, BaseController};
use Models\Brand;

class BrandController extends BaseController
{
   protected static string $layout = "admin";
   private Brand $brand;

    public function __construct(private Request $request)
    {
        $this->request = $request;
        parent::__construct($this->request);
        $this->brand = new Brand();
    }

    public function index()
    {

        $brands = $this->brand->all();
        return $this->render('admin/brands/index', ['brands' => $brands]);

    }
    
    public function create()
    {
        return $this->render('admin/brands/create');
    }

    public function store()
    {
        $this->brand->name = $this->request->name;
        $this->brand->description = $this->request->description;

        // var_dump($this->brand->name, $this->brand->description);
        // exit();
        $this->brand->save();
    }

    public function show($params)
    {
        extract($params);
       
    }

    public function edit($params)
    {

        extract($params);
        $brand = $this->brand->first($id);
        return $this->render('admin/brands/edit', ['brand' => $brand ]);
       
    }

    public function update1($params)
    {
        extract($params);
        $this->brand->id = $id;
        $this->brand->name = $this->request->name;
        $this->brand->description = $this->request->description;
        $this->brand->save();  
    }

    public function update()
    {
        
        $this->brand->id = $this->request->id;
        $this->brand->name = $this->request->name;
        $this->brand->description = $this->request->description;
        $this->brand->save();  
    }


    public function destroy($params)
    {
        extract($params);
        $this->brand->delete($id);
    }

}