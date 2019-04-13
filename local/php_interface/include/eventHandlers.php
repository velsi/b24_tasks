<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$evenManager = \Bitrix\Main\EventManager::getInstance();

/** Принудительный перевод в статус "На оценке" */
$evenManager->addEventHandler(
    'tasks',
    'onBeforeTaskUpdate',
    '\\Site\\Events\\Tasks::setEvaluationStatus');