<?php

namespace Controllers\Admin;

use Core\Http\{Request, BaseController};
use Models\Role;

class RoleController extends BaseController
{
    protected static string $layout = 'admin';
    private Role $role;

    public function __construct(private Request $request){
        $this->request = $request;
        parent::__construct();
        $this->role = new Role();
    }

    public function index(){
        $role = $this->role->all();
        $this->render('admin/roles/index', ['roles' => $role]);
    }

    public function create()
    {
        $this->render('admin/roles/create');
    }

    public function store()
    {
        $this->role->name = $this->request->name;

        try {
                $this->role->save(); 
                $this->request->flash()->message('success', 'Role created successfully!');
                $this->redirect('/admin/roles');
        } catch(\Exception $e){
                $this->request->flash()->message('errors', $e->getMessage());
                $this->back();
        }
    }

    public function edit($params)
    {
        extract($params);
        $role = (new Role())->first($id);
        $this->render('admin/roles/edit', compact('role'));
    }

    public function update()
    {
        $role = new Role();

        if($this->request){
            $role->name = $this->request->name;
            $role->id = $this->request->id;

            if($role->save()){
                $this->request->flash()->message('success', 'Role updated successfully!');
                $this->redirect('/admin/roles');
            }else {
                $this->request->flash()->message('danger', 'Some errors occurred!');
                $this->back();
            }
        }
    }
}
