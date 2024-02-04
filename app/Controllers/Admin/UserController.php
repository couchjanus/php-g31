<?php

namespace Controllers\Admin;

use Core\Http\{BaseController, Request, Rule, Validator};

use Models\{Role, User};

use Core\Traits\Helpers;

class UserController extends BaseController
{
    use Helpers;

    protected static string $layout = 'admin';

    private int $cost = 12;
    
    private User $user;

    public function __construct(private Request $request)
    {
        $this->request = $request;
        parent::__construct();
        $this->user = new User();
    }


    public function index(){
        $users = $this->user->all();
        $this->render('admin/users/index', ['users' => $users]);
    }

    public function create()
    {
        $roles = (new Role())->all();
        $this->render('admin/users/create', ['roles' => $roles]);
    }

    public function store()
    {
        $this->user->name = $this->request->name;
        $this->user->email = $this->request->email;
        $this->user->role_id = $this->request->role_id;
        $this->user->status = $this->request->status ? 1 : 0;

        $this->user->password = $this->getHash($this->request->password, $this->cost);

        try {
                $this->user->save(); 
                $this->request->flash()->message('success', 'User created successfully!');
                $this->redirect('/admin/users');
        } catch(\Exception $e){
                $this->request->flash()->message('errors', $e->getMessage());
                $this->back();
        }

    }

    public function edit($params)
    {
        extract($params);
        
        $user = $this->user->first($id);
        $roles = (new Role())->all();
        $this->render('admin/users/edit', compact('roles', 'user'));
    }

    public function update()
    {
        $this->user->id = $this->request->id;
        $this->user->name = $this->request->name;
        $this->user->email = $this->request->email;
        
        $this->user->role_id = $this->request->role_id;
        $this->user->status = $this->request->status ? 1 : 0;

     

        try {
            $this->user->save(); 
            $this->request->flash()->message('success', 'User updated successfully!');
            $this->redirect('/admin/users');
        } catch(\Exception $e){
            $this->request->flash()->message('errors', $e->getMessage());
            $this->back();
        }

    }
}
