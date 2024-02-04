<?php

namespace Controllers;

use Core\Http\{BaseController, Request};
use Models\User;
use Core\{Rule, Validator};
use Core\Traits\Helpers;

class RegisterController extends BaseController
{
    use Helpers;

    protected static string $layout = "app";

    private User $user;

    public function __construct(private Request $request)
    {
        parent::__construct();
        $this->request = $request;
        $this->user = new User();
        
    }

    public function index()
    {
        $this->render('auth/register');
    }

    private function checkEmail(string $email)
    {
        return $this->user->findBy("email='$email'") ? true : false;
    }

    private function firstError($errors)
    {
        $errors = array_pop($errors);
        return implode(array_values($errors));
    }

    public function signup()
    {
        if($this->checkEmail($this->request->email)) {
            $this->redirect('/login');
        }

        $validator = new Validator(['email'=>$this->request->email, 'password'=>$this->request->password]);
        $validator->addRule((new Rule('email'))->required()->email());

        $validator->addRule((new Rule('password'))->required()->passwoed($this->request->confirmpassword));

        if(!$validator->check()) {
            if($validator->getErrors('email')) {
                $this->request->flash()->message('danger', $this->firstError($validator->getErrors('email')));
            }elseif($validator->getErrors('password')) {
                $this->request->flash()->message('danger', $this->firstError($validator->getErrors('password')));
            }
            $this->back();
        }
        $username = explode("@", $this->request->email)[0];
        $this->user->name = $username;
        $this->user->email = $this->request->email;
        $this->user->role_id = 2;
        $this->user->status = $this->request->status ? 1 : 0;
        $this->user->password = $this->getHash($this->request->password);
        $this->user->first_name = $this->request->first_name;
        $this->user->last_name = $this->request->last_name;
        $this->user->phone_number = $this->request->phone_number;

        try {
            $this->user->save();
            $this->request->flash()->message('success', "Yuor profile created successfully.");
            $this->redirect('/login');
        } catch(\Exception $e) {
            $this->request->flash()->message('error', $e->getMessage());
            $this->back();
        }
    }

}