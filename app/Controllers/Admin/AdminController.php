<?php
declare(strict_types=1);

namespace Controllers\Admin;
 
use Core\Http\{Request, BaseController};

use Core\Interfaces\AuthInterface;

use Core\{Session};
use Models\{User, Role};

class AdminController extends BaseController  implements AuthInterface
{
    protected static string $layout = 'admin';    

    protected $user;

    public function __construct(private Request $request){
        $this->request = $request;
        parent::__construct();
        $userId = Session::instance()->get('userId');

        if($userId) {
            $this->user = (new User)->first($userId);
            if (!$this->isGranted('admin')) {
                $this->redirect("/profile");
            } 
        } else {
            $this->redirect("/login");
        }
    }

    private function role()
    {
        if ($this->user) {
            $role = (new Role)->first($this->user->role_id);
            return $role->name;
        }
    }

    public function isGranted(string $name):bool
    {
        return ($this->role() === $name) ?? false;
    }

}