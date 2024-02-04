<?php
namespace Controllers;

use Core\Interfaces\AuthInterface;
use Core\Http\{BaseController, Request};
use Core\{Session};
use Models\{User, Order};

class ProfileController extends BaseController implements AuthInterface
{

    protected static string $layout = 'app';    

    protected $user;

    public function __construct(private Request $request){
        $this->request = $request;
        parent::__construct();
        $userId = Session::instance()->get('userId');

        if($userId) {
            $this->user = (new User)->first($userId);
        } 

        $this->isGranted();
    }


    public function isGranted(string $name = 'customer'):bool
    {
        if (!$this->user) {
            $this->redirect('/login');
        }
        return true;
    }

    public function index()
    {
        $this->render('profile/index', ['user' => $this->user]);
    }


    public function orders()
    {
        $uid = $this->user->id;
        $orders = (new Order)->select()->where("user_id='$uid'")->get();
        $this->render('profile/orders', ['user' => $this->user, 'orders'=>$orders]);
    }

}