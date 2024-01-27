<?php
declare(strict_types=1);

namespace Controllers\Admin;
 
use Core\Http\{Request, BaseController};
use Models\Section;

class SectionController extends BaseController
{
   protected static string $layout = "admin";
   private Section $section;

    public function __construct(private Request $request)
    {
        $this->request = $request;
        parent::__construct($this->request);
        $this->section = new Section();
    }

    public function index()
    {
        $sections = $this->section->all();
        return $this->render('admin/sections/index', ['sections' => $sections]);
    }
    
    public function create()
    {
        return $this->render('admin/sections/create');
    }

    public function store()
    {
        $this->section->name = $this->request->name;
        $this->section->save();
        $this->redirect('/admin/sections');
    }

    public function show($params)
    {
        extract($params);
    }

    public function edit($params)
    {
        extract($params);
        $section = $this->section->first($id);
        return $this->render('admin/sections/edit', ['section' => $section ]);
       
    }

    public function update1($params)
    {
        extract($params);
        $this->section->id = $id;
        $this->section->name = $this->request->name;
        $this->section->save();  
        $this->redirect('admin/sections');
    }

    public function update()
    {
        
        $this->section->id = $this->request->id;
        $this->section->name = $this->request->name;
        $this->section->save();  
    }


    public function destroy($params)
    {
        extract($params);
        $this->section->delete($id);
    }

}