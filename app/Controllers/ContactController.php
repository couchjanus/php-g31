<?php

require_once dirname(__DIR__)."/Core/Views/View.php";
require_once dirname(__DIR__)."/Core/Http/Response.php";
require_once dirname(__DIR__)."/Core/Models/DB.php";

class ContactController
{
    private View $view;
    protected $connect;

    public function __construct()
    {
        $this->view = new View(VIEW_PATH);
        $this->connect = DB::connect();
        
    }

    private function fetchAll(string $query): ?array 
    {
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    private function insert($query): ?bool 
    {
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
        return true;
    }

    public function index()
    {
       
        if ($_POST) {

           
                $name = htmlspecialchars($_POST['name']);
                $surname =  htmlspecialchars($_POST['surname']);
                $email =  htmlspecialchars($_POST['email']);
                $message = htmlspecialchars($_POST['message']);

            $sql = "INSERT INTO feedback (name, surname, email, message) VALUES ('$name', '$surname', '$email', '$message')";

            $this->insert($sql);
      
        
        }
        $messages = $this->fetchAll("select * from feedback");

        $content = $this->view->render('contact/index', ['messages' => $messages]);
        return (new Response($content))->send();
    }

}
