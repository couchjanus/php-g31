<?php
declare(strict_types=1);

namespace Controllers\Admin;
 
use Core\Http\{Request, BaseController};
use Models\{Category, Section};
use Core\Traits\{Upload, Resizer};

class CategoryController extends BaseController
{
   use Upload;
   use Resizer;

   protected static string $layout = "admin";
   private Category $category;

    public function __construct(private Request $request)
    {
        $this->request = $request;
        parent::__construct($this->request);
        $this->category = new Category();
        
    }

    public function index()
    {
        $categories = $this->category->all();
        return $this->render('admin/categories/index', ['categories' => $categories]);
    }
    
    public function create()
    {
        $sections = (new Section())->all();
        return $this->render('admin/categories/create', compact('sections'));
    }

    public function store()
    {
        $this->category->name = $this->request->name;
        $this->category->section_id = $this->request->section_id;

        $imageObj = $this->load($this->request->cover['tmp_name']);
        $image = $this->resize_width(200, $imageObj);
        $this->category->cover = $this->save($image, "/categories/", $imageObj->type, 75);

        $this->category->save();
        $this->redirect('/admin/categories');
    }

    public function show($params)
    {
        extract($params);
    }

    public function edit($params)
    {
        extract($params);
        $category = $this->category->first($id);
        return $this->render('admin/categories/edit', ['category' => $category ]);
       
    }

    public function update()
    {
        
        $this->category->id = $this->request->id;
        $this->category->name = $this->request->name;
        $this->category->save();  
        $this->redirect('admin/categories');
    }


    public function destroy($params)
    {
        extract($params);
        $this->category->delete($id);
        $this->redirect('admin/categories');
    }

}