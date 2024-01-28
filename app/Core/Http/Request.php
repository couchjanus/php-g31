<?php
declare(strict_types=1);

namespace Core\Http;
use Core\Session;


class Request 
{

    private array $request;
    private $session;
    private $messages = [];
    private $now = false;

    public function __construct()
    {
        $this->request = $this->prepare($_REQUEST, $_FILES);
    }

    public function __get($name)
    {
        if(isset($this->request[$name])) {
            return $this->request[$name];
        }
    }

    private function prepare(array $request, array $files)
    {
        $request = $this->clean($request);
        return array_merge($files, $request);
    }

    private function clean($data)
    {
        if (is_array($data)) {
            $cleaned = [];
            foreach($data as $key => $value) {
                $cleaned[$key] = $this->clean($value);
            }
            return $cleaned;
        }
        return trim(htmlspecialchars($data, ENT_QUOTES));
    }

    public function uri()
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }

    public function session()
    {
        return Session::instance();
    }

    public function flash()
    {
        $this->session = Session::instance();
        return $this;
    }
    public function now()
    {
        $this->now = true;
        return $this;
    }

    public function message($name, $message)
    {
        if($this->now) {
            $this->messages[] = array(
                'name' => $name,
                'message' => $message
            );
        }else{
            $_SESSION['flash_messages'][] = array(
                'name' => $name,
                'message' => $message
            );
        }
    }
}