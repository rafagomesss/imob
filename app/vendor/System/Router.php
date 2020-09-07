<?php

declare(strict_types=1);

namespace System;

class Router
{
    private $controller;
    private $method;
    private $param = [];

    public function run(Request $request)
    {
        $this->controller = $request->getController();
        $this->method = $request->getMethod();
        $this->param = $request->getParam();
        $this->validateRoute();
    }

    private function validateRoute()
    {
        if (!$this->classExistsRouter() || !$this->methodExistsRouter()) {
            self::notFound();
        }

        $response = call_user_func_array(
            [
                new $this->controller,
                $this->method
            ],
            [$this->param]
        );

        print $response;
    }

    private function classExistsRouter()
    {
        return class_exists($this->controller = "Imob\Controller\\" . ucfirst($this->controller) . 'Controller');
    }

    private function methodExistsRouter()
    {
        return method_exists($this->controller, $this->method);
    }

    public static function notFound()
    {
        print (new \Imob\View\View('404'))->render();
        exit();
    }
}
