<?php

declare(strict_types=1);

use Kkigomi\Module\Debugbar\Src\DebugbarHelper;
use Symfony\Component\VarDumper\VarDumper;

if (!function_exists('ddd')) {
    /**
     * @param mixed $message
     * @param ?mixed ...$moreMessage
     */
    function ddd($message, ...$moreMessage): void
    {
        \Rhymix\Framework\Debug::addEntry($message);

        foreach ($moreMessage as $message) {
            \Rhymix\Framework\Debug::addEntry($message);
        }
    }
}

if (!function_exists('dump')) {
    /**
     * @author Nicolas Grekas <p@tchwork.com>
     * @param mixed $var
     * @param mixed ...$moreVars
     * @return mixed
     */
    function dump($var, ...$moreVars)
    {
        if (DebugbarHelper::dumpable()) {
            VarDumper::dump($var);

            foreach ($moreVars as $v) {
                VarDumper::dump($v);
            }
        }

        if (1 < func_num_args()) {
            return func_get_args();
        }

        return $var;
    }
}

if (!function_exists('dd')) {
    /**
     * @author Nicolas Grekas <p@tchwork.com>
     * @param mixed ...$vars
     * @return never|void
     */
    function dd(...$vars)
    {
        if (!DebugbarHelper::dumpable()) {
            return;
        }

        if (!in_array(\PHP_SAPI, ['cli', 'phpdbg'], true) && !headers_sent()) {
            header('HTTP/1.1 500 Internal Server Error');
        }

        foreach ($vars as $v) {
            VarDumper::dump($v);
        }

        exit(1);
    }
}
