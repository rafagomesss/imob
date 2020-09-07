<?php

declare(strict_types=1);

namespace Imob\View;

use System\Router;

class View
{
    private $view;
    private $menu;
    private const EXT_VIEW = '.view.php';

    public function __construct($view, $menu = false)
    {
        $this->view = VIEWS_PATH . DIRECTORY_SEPARATOR . $view . self::EXT_VIEW;
        $this->menu = $menu;
    }

    public function __set($index, $value)
    {
        $this->{$index} = $value;
    }

    public function __get($index)
    {
        return $this->{$index};
    }

    public function render()
    {
        ob_start();
        if (is_file($this->view)) {
            require VIEWS_INCLUDES_PATH . 'header.view.php';
            require $this->view;
            require VIEWS_INCLUDES_PATH . 'footer.view.php';
        } else {
            Router::notFound();
        }
        return ob_get_clean();
    }
}
