<?php

namespace Controllers;

use Core\Http\{BaseController, Request};
use Core\{Rule, Validator, Session};
use Models\{User};
use Core\Traits\Helpers;

class LoginController extends BaseController {
   protected static string $layout = 'app';
   public $isAuth = false;
   protected User $user;

   public function __construct(private Request $request)
   {
       $this->request = $request;
       parent::__construct();
       $this->user = new User();
       $this->isAuth = $this->isLogged();
   }
   public function isLogged():bool   {
    if (Session::instance()->get('userId')) {
        return true;
    }
    return false;
}
public function checkCookie():array    {
    return [false, null];
}
protected function getUser(string $email)    {
    return $this->user->findBy("email='$email'");
}
public function index()   {
    if ($this->isAuth) {
        $this->redirect('/profile');   
    } else {
        $this->render('auth/login');   
    }
}

function signin()   {
    $user = $this->getUser($this->request->email);
    if ($user) {
        if (password_verify($this->request->password, $user->password)) {
            $this->isAuth = true;
            Session::instance()->set('userId', $user->id);
        }
    } else {
        $this->request->flash()->message('danger', 'Email address or password are incorrect.');
        $this->redirect('/login');
    }
    $this->redirect("/profile");
}

public function logout():bool   {
    $this->isAuth = false;
    Session::instance()->unset('userId');
    $this->redirect('/');   
}
}



