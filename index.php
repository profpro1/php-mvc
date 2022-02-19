<?php


//$string = '21-11-2015';
//
//$pattern = '/([0-9]{2})-([0-9]{2})-([0-9]{4})/';
//
//$replacement = 'Год $3, месяц $2, день $1';
//
//echo preg_replace($pattern,$replacement,$string);
//
//die;
//front controller


//1. Общие настройки
ini_set('display_errors',1);
error_reporting(E_ALL);
//2. Подключение файлов и системы
define('ROOT', dirname(__FILE__));
require_once ROOT . "/components/Router.php";
require_once ROOT.'/components/Db.php';


//3. Установка соединения с бд

//4. Вызов Router
$router = new Router();
$router ->run();
//
