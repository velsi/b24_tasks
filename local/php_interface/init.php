<?php

/** composer */
require_once $_SERVER['DOCUMENT_ROOT'].'/bitrix/vendor/autoload.php';

/** автозагрузка классов */
spl_autoload_register(function ($class_name) {
    $file = $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/lib/' . str_replace('\\', '/', $class_name) . '.php';
    if (is_file($file)) include $file;
});


\Bitrix\Main\Loader::includeModule('tasks');

require_once 'include/functions.php';
require_once 'include/eventHandlers.php';
