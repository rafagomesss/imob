<?php

declare(strict_types=1);

namespace System;

class Request
{
    private $controller;
    private $method;
    private $param = [];

    public function __construct()
    {
        $uri = $this->getUri();
        $this->setController(!empty($uri[0]) ? $uri[0] : 'home')
            ->setMethod(!empty($uri[1]) ? $uri[1] : 'main')
            ->setParam(!empty($uri[2]) ? $uri[2] : []);
    }

    private function getUri(): array
    {
        $uri = parse_url(substr($_SERVER['REQUEST_URI'], 1), PHP_URL_PATH);
        $uri = explode('/', $uri);
        return $uri ?? [];
    }

    public function getController(): string
    {
        return $this->controller;
    }

    public function setController($controller): Request
    {
        $this->controller = $controller;

        return $this;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function setMethod($method): Request
    {
        $this->method = $method;

        return $this;
    }

    public function getParam()
    {
        return $this->param;
    }

    public function setParam($param): Request
    {
        $this->param = $param;

        return $this;
    }
}
