<?php

namespace App\Core;

class Route
{
    public $url;
    public $nameController = "HomeController";
    public $nameMethod = "home";
    public $path = 'App\Controllers\\'; // Sửa lại đường dẫn namespaces
    public $controller;
    public $dbConnection;

    public function __construct(\PDO $dbConnection)
    {
        $this->dbConnection = $dbConnection;
        $this->request();
        $this->renderController();
        $this->renderMethod();
    }

    public function request()
    {
        $this->url = isset($_GET['url']) ? $_GET['url'] : null;

        if ($this->url != null) {
            $this->url = rtrim($this->url, '/');
            $this->url = explode('/', filter_var($this->url, FILTER_SANITIZE_URL));
        } else {
            unset($this->url);
        }
    }

    public function renderController()
    {
        if (!isset($this->url[0])) {
            $className = $this->path . $this->nameController;
            $this->controller = new $className($this->dbConnection);
            $this->controller->{$this->nameMethod}();
        } else {
            $this->nameController = $this->url[0];
            $file = __DIR__. '/../Controllers/'. $this->nameController . '.php';

            if (file_exists($file)) {
                require_once $file;
                $className = $this->path . $this->nameController;
                if (class_exists($className)) {
                    $this->controller = new $className($this->dbConnection);
                } else {
                    header('Location:' . ROOT_URL . 'HomeController/Error');
                }
            } else {
                header('Location:' . ROOT_URL . 'HomeController/Error');
            }
        }
    }

    public function renderMethod()
    {
        if (isset($this->url[2])) {
            $this->nameMethod = $this->url[1];
            if (method_exists($this->controller, $this->nameMethod)) {
                $this->controller->{$this->nameMethod}($this->url[2]);
            } else {
                header('Location:' . ROOT_URL . 'HomeController/Error');
            }
        } else {
            if (isset($this->url[1])) {
                $this->nameMethod = $this->url[1];
                if (method_exists($this->controller, $this->nameMethod)) {
                    $this->controller->{$this->nameMethod}();
                } else {
                    header('Location:' . ROOT_URL . 'HomeController/Error');
                }
            }
        }
    }
}
