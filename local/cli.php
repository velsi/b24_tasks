#!/usr/bin/php
<?php

$_SERVER['DOCUMENT_ROOT'] = '/home/bitrix/www';
require_once($_SERVER["DOCUMENT_ROOT"].'/local/php_interface/include/cli.php');


use Symfony\Component\Console\Application;
$application = new Application();

$application->add(new \Site\Cli\TaskEvaluationToComplete());


// run console
$application->run();




/**
 * Works as realpath(), but ignores symlinks
 * @param $path
 * @return string
 */
function bx_cli_absolute_path($path)
{
    $path = str_replace(DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR, $path);
    $parts = explode(DIRECTORY_SEPARATOR, $path);
    $validParts = [];

    foreach ($parts as $part)
    {
        if ($part == '.')
        {
            continue;
        }
        elseif ($part == '..')
        {
            array_pop($validParts);
        }
        else
        {
            $validParts[] = $part;
        }
    }

    return join(DIRECTORY_SEPARATOR, $validParts);
}