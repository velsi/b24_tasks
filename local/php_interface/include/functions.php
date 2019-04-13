<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/** вывод в на страницу
 * @param $ar
 */
function pre($ar)
{
    echo '<pre>';
    print_r($ar);
    echo '</pre>';
}

/** вывод в консоль браузера
 * @param $data
 */
function _cons($data)
{
    echo '<script>console.log(' . json_encode($data) . ')</script>';
}