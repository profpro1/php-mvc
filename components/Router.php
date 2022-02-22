<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routhPath = ROOT . '/config/routes.php';
        $this->routes = include($routhPath);


    }

    //return request string
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {

            return trim(($_SERVER['REQUEST_URI']), '/');

        }
    }

    public function run()
    {
        //получить строку запроса
        $uri = $this->getURI();


        //проверить наличие запроса в routes.php
        foreach ($this->routes as $uriPattern => $path) {

            //сравниваем $uriPattern and $uri

            if (preg_match("~$uriPattern~", $uri)) {
//                echo '<br>Где ищем (запрос , который ввел пользователь): '.$uri;
//                echo '<br>Что ищем (совпадение из правила): '.$uriPattern;
//                echo '<br>Кто обрабатывает: '.$path;

                //получаем внутренний путь из внешнего согласно праилу
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

//                echo '<br><br> Нужно сформировать: ' . $internalRoute;


                //определить какой контроллер и action обрабатывают запрос
                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));

                $parameters = $segments;



                //подключить файл класса-контроллера
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';


                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }
                //создать объект вызвать метод

                $controllerObject = new $controllerName;

                $result = call_user_func_array(array($controllerObject,$actionName), $parameters);

                if ($result != null) {
                    break;
                }

            }

        }


    }


}


