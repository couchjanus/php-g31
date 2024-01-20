<?php
declare(strict_types=1);

namespace Core;

use Core\Http\Request;

class Router
{
    private static array $rotes;

    public function __construct(private Request $request, string $routesPath = ROUTER_PATH)
    {
        $this->request = $request ?? new Request();
        self::$rotes = require_once $routesPath;
    }

    public function run()
    {
        if (array_key_exists($this->request->uri(), self::$rotes)) {
            return $this->init(self::$rotes[$this->request->uri()]);
        }else {
            foreach (self::$rotes as $key => $value) {
                $pattern ="%^".preg_replace('/{([a-zA-Z0-9]+)}/', '(?<$1>[0-9]+)', $key)."$%";
                preg_match($pattern, $this->request->uri(), $matches);

                array_shift($matches);
                if ($matches) {
                    $arr[] = $value;
                    $arr[] = $matches;
                    return $this->init(...$arr);
                }
            }
        }
    }

    private function init(string $path, $vars=[])
    {
        [$controller, $action] = explode('@', $path);
        $controller = new $controller($this->request);
        return $controller->$action($vars);
    }
}