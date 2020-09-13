<?php

declare(strict_types=1);

namespace System;

class Router extends Request
{

    public function __construct()
    {
        parent::__construct();
    }

    private function restrictRoute()
    {
        if (in_array($this->getController(), Constants::RULE_ROUTE_SESSION) && !Session::validateSessionUser()) {
            self::notFound();
        }
        $this->controlRestrictedRoutes();
    }

    private function controlRestrictedRoutes()
    {
        if (Session::validateSessionUser() && isset(Constants::RESTRICT_USER_ROUTE[Session::get('ACCESS_LEVEL')])) {
            if (in_array($this->getController(), array_keys(Constants::RESTRICT_USER_ROUTE[Session::get('ACCESS_LEVEL')]['controller'])) && in_array($this->action, Constants::RESTRICT_USER_ROUTE[Session::get('ACCESS_LEVEL')]['controller'][$this->getController()]['action'])) {
                self::notFound();
            }
        }
        $this->controlNotSessionRouteAccess();
    }

    private function controlNotSessionRouteAccess()
    {
        if (Session::has('USER') && in_array($this->getController(), array_keys(Constants::ONLY_NOT_SESSION)) && !in_array($this->action, Constants::ONLY_NOT_SESSION[$this->getController()]['exceptionActions'])) {
            Common::redirect('/');
        }
        $this->validateRoute();
    }

    private function validateRoute()
    {
        if (!$this->checkControllerExists() || !$this->checkMethodExists()) {
            self::notFound();
        }
        $controller = $this->getController();
        $response = call_user_func_array([new $controller, $this->getAction()], [$this->getArgs()]);
        print $response;
    }

    private function checkControllerExists(): bool
    {
        $this->setController(['Imob\Controller\\' . ucfirst($this->getController()) . 'Controller']);
        return class_exists($this->getController());
    }

    private function checkMethodExists(): bool
    {
        return method_exists($this->getController(), $this->getAction());
    }

    public function run()
    {
        $this->restrictRoute();
    }

    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    public function getRequest(): Request
    {
        return $this->request;
    }

    public static function notFound()
    {
        $view = (new \Imob\View\View('404'));
        $view->controller = '404';
        print $view->render();
        exit();
    }
}
