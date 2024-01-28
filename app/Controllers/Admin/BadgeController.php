<?php
declare(strict_types=1);

namespace Controllers\Admin;
 
use Core\Http\{Request, BaseController};
use Models\Badge;
use Core\{Validator, Rule};

class BadgeController extends BaseController
{
   protected static string $layout = "admin";
   private Badge $badge;

    public function __construct(private Request $request)
    {
        $this->request = $request;
        parent::__construct($this->request);
        $this->badge = new Badge();
    }

    public function index()
    {

        $badges = $this->badge->all();
        return $this->render('admin/badges/index', ['badges' => $badges]);

    }
    
    public function create()
    {
        return $this->render('admin/badges/create');
    }

    public function store()
    {
        $validator = new Validator(['name'=>$this->request->title]);
        $validator->addRule((new Rule('name'))->required()->min(3));

        if(!$validator->check()) {
            $this->request->flash()->message('danger', $validator->firstError('name'));
            $this->back();
        }

        $this->badge->title = $this->request->title;
        $this->badge->type = $this->request->type;

        try {
            $this->badge->save();
            $this->request->flash()->message('success', 'Badge created syccessfully!');
            $this->redirect('/admin/badges');
        } catch(\Exception $e) {
            $this->request->flash()->message('errors', $e->getMessage());
            // throw new \Exception("Some Exception: ".$e->getMessage());
            $this->back();
        }
        
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